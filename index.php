<?php
/*
Plugin Name: UniPayment Gateway for WooCommerce
Description: UniPayment Gateway for WooCommerce
Version: 1.0.2
Author: UniPayment
Author URI: https://www.unipayment.io
WC requires at least: 3.0
WC tested up to: 6.9.2
License:
 */

require_once dirname(__FILE__).'/vendor/autoload.php';

add_action('plugins_loaded', 'woocommerce_unipayment_init', 0);

function woocommerce_unipayment_init()
{
    if (!class_exists('WC_Payment_Gateway')) return;


    /**
     * Gateway class
     */
    class WC_UniPayment extends WC_Payment_Gateway
    {

        protected $spmsg = array();

        public function __construct()
        {
            $this->log = new WC_Logger();
            $this->log->add('unipayment log:', 'wc unpayment gateway init');
            $this->id = 'unipayment';
            $this->method_title = __('UniPayment', 'unipayment');
            $this->icon = '';
            $this->has_fields = false;

            $this->init_settings();
            $this->title = $this->settings['title'];
            $this->description = $this->settings['description'];
            $this->method_description = 'UniPayment Gateway for Woocommerce';
            $this->client_id = $this->settings['client_id'];
            $this->client_secret = $this->settings['client_secret'];
            $this->app_id = $this->settings['app_id'];
            $this->confirm_speed = $this->settings['confirm_speed'];
            $this->pay_currency = $this->settings['pay_currency'];

            $this->processing_status = $this->settings['processing_status'];
            $this->handle_expired_status = $this->settings['handle_expired_status'];
            $this->environment = $this->settings['environment'];
            $this->lang = str_replace('_', '-', get_locale());

            $this->currency_code = get_woocommerce_currency();

            $this->uniPaymentClient = new \UniPayment\Client\UniPaymentClient();
            $this->uniPaymentClient->getConfig()->setDebug(false);
            $this->uniPaymentClient->getConfig()->setIsSandbox($this->environment == 'test');

            //init form fields after client is inited
            $this->init_form_fields();

            add_action('valid-unipayment-request', array(&$this, 'successful_request'));


            if (version_compare(WOOCOMMERCE_VERSION, '3.0.0', '>=')) {
                add_action('woocommerce_update_options_payment_gateways_' . $this->id, array(&$this, 'process_admin_options'));
            } else {
                add_action('woocommerce_update_options_payment_gateways', array(&$this, 'process_admin_options'));
            }

            add_action('woocommerce_api_' . strtolower(get_class($this)), array($this, 'handel_ipn_notify'));

        }


        function init_form_fields()
        {
            $env_list = array('test' => 'SandBox', 'live' => 'Live');
            $confirm_speeds = array('low' => 'low', 'medium' => 'medium', 'high' => 'high');
            $processing_statuses = array('Confirmed' => 'Confirmed', 'Complete' => 'Complete');
            $pay_currencies = array_merge(array('-' => '---'), $this->get_currencies());


            $this->form_fields = array(

                'enabled' => array(
                    'title' => __('Enable/Disable', 'unipayment'),
                    'type' => 'checkbox',
                    'label' => __('Enable UniPayment Payment Module.', 'unipayment'),
                    'default' => 'no'
                ),

                'title' => array(
                    'title' => __('Title:', 'unipayment'),
                    'type' => 'text',
                    'description' => __('This controls the title which the user sees during checkout.', 'unipayment'),
                    'default' => __('UniPayment', 'unipayment')
                ),

                'description' => array(
                    'title' => __('Description:', 'unipayment'),
                    'type' => 'textarea',
                    'description' => __('This controls the description which the user sees during checkout.', 'unipayment'),
                    'default' => __('Pay securely by UniPayment.', 'unipayment')
                ),

                'client_id' => array(
                    'title' => __('Client ID', 'unipayment'),
                    'type' => 'text',
                    'description' => __('Enter Client ID Given by UniPayment')
                ),

                'client_secret' => array(
                    'title' => __('Client Secret', 'unipayment'),
                    'type' => 'text',
                    'description' => __('Enter Client Secret Given by UniPayment')
                ),

                'app_id' => array(
                    'title' => __('Payment App ID', 'unipayment'),
                    'type' => 'text',
                    'description' => __('Enter Payment App ID Given by UniPayment')
                ),

                'confirm_speed' => array(
                    'title' => __('Confirm Speed', 'unipayment'),
                    'type' => 'select',
                    'default' => 'medium',
                    'description' => __('This is a risk parameter for the merchant to configure how they want to fulfill orders depending on the number of block confirmations.', 'unipayment'),
                    'options' => $confirm_speeds,
                ),

                'pay_currency' => array(
                    'title' => __('Pay Currency', 'unipayment'),
                    'type' => 'select',
                    'default' => '-',
                    'description' => __('Select the default pay currency used by the invoice, If not set customer will select on invoice page.', 'unipayment'),
                    'options' => $pay_currencies,
                ),

                'processing_status' => array(
                    'title' => __('Processing Status', 'unipayment'),
                    'type' => 'select',
                    'default' => 'Confirmed',
                    'description' => __('Which status will be considered the order is paid.', 'unipayment'),
                    'options' => $processing_statuses,
                ),
                'handle_expired_status' => array(
                    'title' => __('Handel Expired Status', 'unipayment'),
                    'type' => 'select',
                    'description' => __('If set to <b>Yes</b>, the order will set to failed when the invoice has expired and has been notified by the UniPayment IPN.', 'unipayment'),

                    'options' => array(
                        '0' => 'No',
                        '1' => 'Yes'
                    ),
                    'default' => '0',
                ),


                'environment' => array(
                    'title' => __('Environment', 'unipayment'),
                    'type' => 'select',
                    'default' => 'test',
                    'description' => __('Select which enviroment the plugin is connected with.', 'unipayment'),
                    'options' => $env_list,
                )
            );
        }


        public function admin_options()
        {
            echo '<h3>' . __('UniPayment Payment Gateway', 'unipayment') . '</h3>';
            echo '<p>' . __('Accept online crypto payments by integrating the robust, modern, and multi-functional cryptocurrency payment gateway- UniPayment.') . '</p>';
            echo '<table class="form-table">';
            $this->generate_settings_html();
            echo '</table>';
        }


        public function payment_fields()
        {
            if ($this->description) echo wpautop(wptexturize($this->description));
        }

        public function get_currencies($fiat = false)
        {
            $currencies = array();
            $apires = $this->uniPaymentClient->getCurrencies();
            if ($apires['code'] == 'OK') {
                foreach ($apires['data'] as $crow) {
                    if ($crow['is_fiat'] == $fiat) $currencies[$crow['code']] = $crow['code'];
                }
            }
            return $currencies;
        }


        /**
         * Process the payment and return the result
         **/

        function process_payment($order_id)
        {

            global $woocommerce;

            $order = new WC_Order($order_id);
            $amount = $order->calculate_totals();
            $amount = number_format($amount, 2, '.', '');;
            $desc = 'Order No : ' . $order_id;
            $RedirectUrl = $this->get_return_url($order);
            $setNotifyUrl = get_site_url() . '/index.php?wc-api=wc_unipayment&act=notify';


            $this->uniPaymentClient->getConfig()->setClientId($this->client_id);
            $this->uniPaymentClient->getConfig()->setClientSecret($this->client_secret);

            $createInvoiceRequest = new \UniPayment\Client\Model\CreateInvoiceRequest();

            $createInvoiceRequest->setAppId($this->app_id);
            $createInvoiceRequest->setPriceAmount($amount);
            $createInvoiceRequest->setPriceCurrency($this->currency_code);

            // if we set pay_currency, fill pay_currency in request
            if ($this->pay_currency != '-') {
                $this->log->add('unipayment log:', 'pay_currency value:' . $this->pay_currency);
                $createInvoiceRequest->setPayCurrency($this->pay_currency);
            }

            $createInvoiceRequest->setOrderId($order_id);
            $createInvoiceRequest->setConfirmSpeed($this->confirm_speed);
            $createInvoiceRequest->setRedirectUrl($RedirectUrl);
            $createInvoiceRequest->setNotifyUrl($setNotifyUrl);
            $createInvoiceRequest->setTitle($desc);
            $createInvoiceRequest->setDescription($desc);
            $createInvoiceRequest->setLang($this->lang);
            $response = $this->uniPaymentClient->createInvoice($createInvoiceRequest);

            $this->log->add('unipayment log:', 'create invoice:' . $createInvoiceRequest);

            if ($response['code'] == 'OK') {
                $payurl = $response->getData()->getInvoiceUrl();
                return array('result' => 'success', 'redirect' => $payurl);
            } else {
                $errmsg = $response['msg'];

                wc_add_notice(__('Gateway request failed - ' . $errmsg, 'woocommerce'), 'error');
                return array('result' => 'failed');
            }

        }

        //https://woocommerce.com/document/managing-orders/#troubleshooting

        function handel_ipn_notify()
        {
            global $woocommerce, $wpdb;
            if ($_GET['wc-api'] == 'wc_unipayment') {

                $notify_json = file_get_contents('php://input');
                $notify_ar = json_decode($notify_json, true);
                $order_id = $notify_ar['order_id'];
                $invoice_id = $notify_ar['invoice_id'];
                $this->log->add('unipayment log:', 'order: ' . $order_id . ' / ' . $invoice_id . ' notify: ' . $notify_json);

                $this->uniPaymentClient->getConfig()->setClientId($this->client_id);
                $this->uniPaymentClient->getConfig()->setClientSecret($this->client_secret);

                //check ipn result
                $response = $this->uniPaymentClient->checkIpn($notify_json);
                $this->log->add('unipayment log:', 'checkIpn result: ' . $response);

                $status = 'New';

                if ($response['code'] == 'OK') {
                    $error_status = $notify_ar['error_status'];
                    $status = $notify_ar['status'];


                    $order = new WC_Order($order_id);
                    $this->log->add('unipayment log:', 'order local status:' . $order->status . ' remote status:' . $status . ' error_status:' . $error_status . ' handle expire config:' . $this->handle_expired_status);

                    switch ($status) {
                        case 'New':
                        {
                            //$order -> add_order_note('Invoice : '.$invoice_id.' created');
                            break;
                        }
                        case 'Paid':
                        {
                            $order->add_order_note('Invoice : ' . $invoice_id . ' payment detected');
                            break;
                        }

                        case 'Confirmed':
                        {
                            $order->add_order_note('Invoice : ' . $invoice_id . ' has changed to confirmed');

                            break;
                        }
                        case 'Complete':
                        {
                            $order->add_order_note('Invoice : ' . $invoice_id . ' has changed to complete');
                            break;
                        }
                        case 'Expired':
                        {
                            $order->add_order_note('Invoice : ' . $invoice_id . ' has changed to expired');
                            if ($this->handle_expired_status == 1) {
                                $order->update_status('failed', __('Payment Expired', 'unipayment'));
                            }
                            break;
                        }
                        case 'Invalid':
                        {
                            $order->add_order_note('Invoice : ' . $invoice_id . ' has changed to invalid because of network congestion, please check the dashboard');
                            $order->update_status('failed', __('Payment Invalid', 'unipayment'));
                            break;
                        }


                        default:
                            break;
                    }

                    if ($this->processing_status == $status && ($order->status == 'pending' || $order->status == 'failed')) {
                        $order->payment_complete();
                        $woocommerce->cart->empty_cart();
                    }

                    echo "SUCCESS";
                } else {
                    echo "Fail";
                }
                exit;


            }
        }


    }


    /**
     * Add the Gateway to WooCommerce
     **/

    function woocommerce_add_unipayment_gateway($methods)
    {

        $methods[] = 'WC_UniPayment';

        return $methods;

    }

    add_filter('woocommerce_payment_gateways', 'woocommerce_add_unipayment_gateway');


}
?>
