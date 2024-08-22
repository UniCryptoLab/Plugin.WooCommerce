<?php
/*
Plugin Name: UniPayment Gateway for WooCommerce
Description: UniPayment Gateway for WooCommerce
Version: 2.2.4
Author: UniPayment
Author URI: https://www.unipayment.io
WC requires at least: 3.0
WC tested up to: 9.1.4
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
            $this->id = 'unipayment';
            $this->method_title = __('UniPayment', 'unipayment');
            $this->icon = '';
            $this->has_fields = false;

            $this->init_settings();
            $this->title = isset($this->settings['title']) ? $this->settings['title'] : '';
            $this->description = isset($this->settings['description']) ? $this->settings['description'] : '';
            $this->method_description = 'UniPayment Gateway for Woocommerce';
            $this->client_id = isset($this->settings['client_id']) ? $this->settings['client_id'] : '';
            $this->client_secret = isset($this->settings['client_secret']) ? $this->settings['client_secret'] : '';
            $this->app_id = isset($this->settings['app_id']) ? $this->settings['app_id'] : '';
            $this->webhook_secret = isset($this->settings['webhook_secret']) ? $this->settings['webhook_secret'] : '';                        
            $this ->environment = isset($this->settings['environment']) ? $this -> settings['environment'] : '';
            

            $this->processing_status = isset($this->settings['processing_status']) ? $this->settings['processing_status'] : '';
            $this->handle_expired_status = isset($this->settings['handle_expired_status']) ? $this->settings['handle_expired_status'] : '';
            $this->lang = str_replace('_', '-', get_locale());

            $this->currency_code = get_woocommerce_currency();

            $this->uniPaymentConfig = new \UniPayment\SDK\Configuration();
            
            
		    $this->supports = array(
			    'products',
			    'subscriptions',			    
		    );
            

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
            
            $confirm_speeds = array('low' => 'low', 'medium' => 'medium', 'high' => 'high');
            $processing_statuses = array('Confirmed' => 'Confirmed', 'Complete' => 'Complete');
            $env_list =  array('test'=>'SandBox', 'live' => 'Live');            
            

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
                'webhook_secret' => array(
                    'title' => __('Webhook Secret Key', 'unipayment'),
                    'type' => 'text',
                    'description' => __('Enter Webhook Secret Key Given by UniPayment')
                ),
                'processing_status' => array(
                    'title' => __('Processing Status', 'unipayment'),
                    'type' => 'select',
                    'default' => 'Confirmed',
                    'description' => __('Which status will be considered the order is paid.', 'unipayment'),
                    'options' => $processing_statuses,
                ),
                'environment' => array(
					'title'       => __( 'Environment', 'unipayment' ),
					'type'        => 'select',
					'default'     => 'test',										
					'description' => '',
					'options'     => $env_list,
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
            $NotifyUrl = get_site_url() . '/index.php?wc-api=wc_unipayment&act=notify';
            
            
            $configuration = new \UniPayment\SDK\Configuration();
            $configuration->setClientId($this->client_id);
        	$configuration->setClientSecret($this->client_secret);
            $configuration->setAppId($this->app_id);            
            
            if ($this->environment == 'test') $configuration->setIsSandbox(true);
            else $configuration->setIsSandbox(false);            
            
            $createInvoiceRequest = new \UniPayment\SDK\Model\CreateInvoiceRequest();
	        $createInvoiceRequest->setAppId($this->app_id);
            $createInvoiceRequest->setOrderId($order_id );            
	        $createInvoiceRequest->setPriceAmount($amount);
	        $createInvoiceRequest->setPriceCurrency($this->currency_code);
           
	        $createInvoiceRequest->setNotifyUrl($NotifyUrl);
	        $createInvoiceRequest->setRedirectUrl($RedirectUrl);
	        
	        $createInvoiceRequest->setTitle($desc);
	        $createInvoiceRequest->setDescription($desc);   
            
            $billingAPI  = new \UniPayment\SDK\BillingAPI($configuration);

            $response = $billingAPI->createInvoice($createInvoiceRequest);    
                       
            //$this->log->add('unipayment log:', 'create invoice:' . $createInvoiceRequest);

            if ($response->getCode() == 'OK') {
                $payurl = $response->getData()->getInvoiceUrl();
                
                return array('result' => 'success', 'redirect' => $payurl);
            } else {
                $errmsg = $response['msg'];

                wc_add_notice(__('Gateway request failed - ' . $errmsg, 'woocommerce'), 'error');
                return array('result' => 'failed');
            }

        }

        
        function handel_ipn_notify()
        {
            global $woocommerce, $wpdb;
            if ($_GET['wc-api'] == 'wc_unipayment') {
                $header = apache_request_headers();
                $this->log->add('unipayment log:', 'header: ' . json_encode($header));
                $notify_json = file_get_contents('php://input');
                
                $notify_ar = json_decode($notify_json, true);
                $order_id = $notify_ar['order_id'];
                $invoice_id = $notify_ar['invoice_id'];
                $this->log->add('unipayment log:', 'header'.json_encode($header));
                $this->log->add('unipayment log:', 'order: ' . $order_id . ' / ' . $invoice_id . ' notify: ' . $notify_json);

                $hmac_signature  = '';
                if (array_key_exists('hmac-signature', $header)) $hmac_signature = $header['hmac-signature'];                
                if (array_key_exists('Hmac-Signature', $header)) $hmac_signature = $header['Hmac-Signature'];  
                if (array_key_exists('HMAC-SIGNATURE', $header)) $hmac_signature = $header['HMAC-SIGNATURE']; 

                if (empty($hmac_signature))  {              
                    echo "hmac-signature not found";
                    $this->log->add('unipayment log:', 'hmac signature not found');
                    exit;
                }
			    $decoded_secret = html_entity_decode($this->webhook_secret);

			    $local_signature = \UniPayment\SDK\Utils\WebhookSignatureUtil::generateSignature($notify_json, $decoded_secret);
                $this->log->add('unipayment log:', 'hmac signature: ' . $hmac_signature . ' local signature: '. $local_signature);


                //Webhook Signature verification
				
                $valid = \UniPayment\SDK\Utils\WebhookSignatureUtil::isValid($notify_json, $decoded_secret, $hmac_signature);


                if ($valid) {
                    $this->log->add('unipayment log:', 'hmac signature are verified');
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
                        $woocommerce->cart->empty_cart(true);
                    }

                    echo "SUCCESS";
                } else {
                    $this->log->add('unipayment log:', 'invalid hmac-signature');
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

    // Registers WooCommerce Blocks integration.
    add_action('woocommerce_blocks_loaded', 'woocommerce_unipayment_support');
    function woocommerce_unipayment_support() {
        if ( class_exists( 'Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType' ) ) {
            require_once 'checkout-block.php';
            add_action(
                'woocommerce_blocks_payment_method_type_registration',
                function( Automattic\WooCommerce\Blocks\Payments\PaymentMethodRegistry $payment_method_registry ) {
                    $payment_method_registry->register( new WC_UniPayment_Blocks() );
                }
            );
        }
    }    




}
?>
