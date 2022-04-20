<?php
/*
Plugin Name: UniPayment for WooCommerce
Description: UniPayment Gateway for WooCommerce
Version: 1.2.4
Author: UniPayment
Author URI: https://www.unipayment.io
WC requires at least: 3.0
WC tested up to: 4.4.1
License: 
 */

require_once dirname(__FILE__).'/vendor/autoload.php';

add_action('plugins_loaded', 'woocommerce_unipayment_init', 0);

function woocommerce_unipayment_init() {
    if ( !class_exists( 'WC_Payment_Gateway' ) ) return;     
	

    /**
     * Gateway class
     */

    class WC_UniPayment extends WC_Payment_Gateway {

    protected $spmsg = array();

        public function __construct(){
            $this -> id = 'unipayment';
            $this -> method_title = __('UniPayment', 'unipayment');
            $this -> icon = '';
            $this -> has_fields = false;
            $this -> init_form_fields();
            $this -> init_settings();
            $this -> title = $this -> settings['title'];
            $this -> description = $this -> settings['description'];
			$this -> method_description = 'UniPayment Gateway for Woocommerce';
			$this -> app_id = $this -> settings['app_id'];						
            $this -> api_key = $this -> settings['api_key'];			
			$this -> confirm_speed = $this -> settings['confirm_speed'];			
			$this -> pay_currency = $this -> settings['pay_currency'];						
			
			$this -> processing_status = $this -> settings['processing_status'];			
			$this -> environment = $this -> settings['environment'];							
			$this -> lang = str_replace('_', '-', get_locale());				
			$this -> unipay_url = ($this -> environment == 'live') ? 'https://unipayment.io' : 'https://sandbox.unipayment.io';						
			
			$this -> currency_code = get_woocommerce_currency();			
			
	 		$this -> uniPaymentClient = new \UniPayment\Client\UniPaymentClient();
			$this -> uniPaymentClient->getConfig()->setDebug(false);
			$this -> uniPaymentClient->getConfig()->setApiHost($this -> unipay_url);

			
            $this->log = new WC_Logger();
            

            add_action('valid-unipayment-request', array(&$this, 'successful_request'));				
			

          	if ( version_compare( WOOCOMMERCE_VERSION, '3.0.0', '>=' ) ) {
                add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( &$this, 'process_admin_options' ) );
             } else {
                add_action( 'woocommerce_update_options_payment_gateways', array( &$this, 'process_admin_options' ) );
            } 		
			
            add_action( 'woocommerce_api_' . strtolower( get_class( $this ) ), array( $this, 'check_unipayment_response' ) );	
			
        }

		

        function init_form_fields(){	
			$env_list =  array('test'=>'SandBox', 'live' => 'Live');
			$confirm_speeds = array('low'=>'low', 'medium'=>'medium', 'high'=>'high');					
			$processing_statuses = array('Confirmed'=>'Confirmed', 'Complete'=>'Complete');				
			$pay_currencies = array_merge(array('-'=>'---'),$this->get_currencies());
			
			
            $this -> form_fields = array(

                'enabled' => array(
                    'title' => __('Enable/Disable', 'unipayment'),
                    'type' => 'checkbox',
                    'label' => __('Enable UniPayment Payment Module.', 'unipayment'),
                    'default' => 'no'
				),

                'title' => array(
                    'title' => __('Title:', 'unipayment'),
                    'type'=> 'text',
                    'description' => __('This controls the title which the user sees during checkout.', 'unipayment'),
                    'default' => __('UniPayment', 'unipayment')
				),

                'description' => array(
                    'title' => __('Description:', 'unipayment'),
                    'type' => 'textarea',
                    'description' => __('This controls the description which the user sees during checkout.', 'unipayment'),
                    'default' => __('Pay securely by UniPayment.', 'unipayment')
				),				

                'app_id' => array(
                    'title' => __('App ID', 'unipayment'),
                    'type' => 'text',
                    'description' => __('Enter App ID Given by UniPayment')
				),	
                
				'api_key' => array(
                    'title' => __('API Key', 'unipayment'),
                    'type' => 'text',
                    'description' => __('Enter API Key Given by UniPayment')
				),					 				
								
				'confirm_speed' => array(
					'title'       => __( 'Confirm Speed', 'unipayment' ),
					'type'        => 'select',
					'default'     => 'medium',										
					'description' => '',
					'options'     => $confirm_speeds,
				),
				
				'pay_currency' => array(
					'title'       => __( 'Pay Currency', 'unipayment' ),
					'type'        => 'select',
					'default'     => '-',										
					'description' => '',
					'options'     => $pay_currencies,
				),
				
				'processing_status' => array(
					'title'       => __( 'Processing Status', 'unipayment' ),
					'type'        => 'select',
					'default'     => 'Confirmed',										
					'description' => 'select which status is confirmed payment is done',
					'options'     => $processing_statuses,
				),				
				
				'environment' => array(
					'title'       => __( 'Environment', 'unipayment' ),
					'type'        => 'select',
					'default'     => 'test',										
					'description' => '',
					'options'     => $env_list,
				)				
           );
        }

        
        public function admin_options(){

            echo '<h3>'.__('UniPayment Payment Gateway', 'unipayment').'</h3>';
            echo '<p>'.__('UniPayment is most popular payment gateway').'</p>';
            echo '<table class="form-table">';
            $this -> generate_settings_html();
            echo '</table>';
        }

		 

    public function payment_fields()
    {

        if($this -> description) echo wpautop(wptexturize($this -> description));
		$pay_currencies = $this->get_currencies();							
		if ($this -> pay_currency == '-') {
	?>	
	<fieldset>
		<div class="clear"></div>
		<p class="form-row form-row-first">
			<label for="pay_currency"><?php _e("Pay Currency", 'unipayment') ?> <span class="required">*</span></label>
				<select name="pay_currency" id="pay_currency" class="wc-credit-card-form-card-cvc" style="width: auto;">						
						<?php
							foreach($pay_currencies as $key => $vale)	
								
								printf('<option value="%s">%s</option>', $key, $vale);							
						?>
					</select> 				
		</p>
		<div class="clear"></div>				
	</fieldset>				
	<?php
		}

    }
		
	public  function get_currencies ($fiat = false)		
    {		
	  if (empty($this -> uniPaymentClient))	 {
		  	$this -> unipay_url = ($this -> environment == 'live') ? 'https://unipayment.io' : 'https://sandbox.unipayment.io';									$this -> uniPaymentClient = new \UniPayment\Client\UniPaymentClient();
			$this -> uniPaymentClient->getConfig()->setDebug(false);
			$this -> uniPaymentClient->getConfig()->setApiHost($this -> unipay_url);		  
	  };
	  $currencies = array();	  		  	
	  $apires = $this->uniPaymentClient->getCurrencies();
	  if ($apires['code'] == 'OK') {
		 foreach ($apires['data'] as $crow){
			if ($crow['is_fiat'] == $fiat) $currencies[$crow['code']] = $crow['code'];			 
		 }		
	  }
	  return $currencies;        

    }		
 		
		
		 
        /**

         * Process the payment and return the result

         **/

        function process_payment($order_id){                        
            
			global $woocommerce;

            $order = new WC_Order($order_id);			
			$amount = $order->calculate_totals();						
			$amount = number_format($amount, 2, '.', '');;		
			$desc = 'Order No : '.$order_id;
			$RedirectUrl = $this->get_return_url( $order );
			$setNotifyUrl = get_site_url().'/index.php?wc-api=wc_unipayment&act=notify';			
			if ($this -> pay_currency == '-') $pay_currency = $_POST['pay_currency'];

			else $pay_currency = $this->pay_currency;
		
			
			$this->uniPaymentClient->getConfig()->setAppId($this->app_id);
        	$this->uniPaymentClient->getConfig()->setApiKey($this->api_key);
			
			$createInvoiceRequest = new \UniPayment\Client\Model\CreateInvoiceRequest();

        	$createInvoiceRequest->setPriceAmount($amount);
        	$createInvoiceRequest->setPriceCurrency($this->currency_code);
        	$createInvoiceRequest->setPayCurrency($pay_currency);
        	$createInvoiceRequest->setOrderId($order_id);
        	$createInvoiceRequest->setConfirmSpeed($this->confirm_speed);
        	$createInvoiceRequest->setRedirectUrl($RedirectUrl);
        	$createInvoiceRequest->setNotifyUrl($setNotifyUrl);
        	$createInvoiceRequest->setTitle($desc);
        	$createInvoiceRequest->setDescription($desc);
        	$createInvoiceRequest->setLang($this->lang);
        	$response = $this->uniPaymentClient->createInvoice($createInvoiceRequest);
			
			
			
			if ($response['code'] == 'OK'){
				$payurl = $response->getData()->getInvoiceUrl();	
				return array('result' => 'success', 'redirect' => $payurl);		
			}
			else {
				$errmsg = $response['msg'];
				
				wc_add_notice( __( 'Gateway request failed - '.$errmsg, 'woocommerce' ) ,'error');	
				return array('result' => 'failed');			
			}           		
					
        }
        
        
        function check_unipayment_response(){
			global $woocommerce, $wpdb;
			
           if($_GET['wc-api']== 'wc_unipayment'){			   
			   
			   $notify_json = file_get_contents('php://input');
			   $notify_ar = json_decode($notify_json, true);
			   $order_id =  $notify_ar['order_id'];
			   $this->log->add('unipayment log:', 'order_id: '.$order_id.' notify: '.$notify_json);
				   
			   
			   
			   $queryInvoiceRequest = new \UniPayment\Client\Model\QueryInvoiceRequest();
			   $queryInvoiceRequest->setOrderId($order_id);
			   
			   $this->uniPaymentClient->getConfig()->setAppId($this->app_id);
			   $this->uniPaymentClient->getConfig()->setApiKey($this->api_key);
			   
			   $status = 'New';
			   $invoice_id = '';
			   $response = $this->uniPaymentClient->queryInvoices($queryInvoiceRequest);
			   
			   if ($response['code'] == 'OK'){
				   $trans = $response['data']['models'][0];
				   $status = $trans['status'];
				   $invoice_id  = $trans['invoice_id'];
				   $this->log->add('unipayment log:',  'invoice of order: '.$order_id.' : '.$response);
			   }
			   
                
				 $order = new WC_Order($order_id);				 
		   		
			   
				 switch($status)
				{
					case 'New':
					{
						//$order -> add_order_note('Invoice : '.$invoice_id.' created');	
						break;
					}
					case 'Paid':
					{
						$order -> add_order_note('Invoice : '.$invoice_id.' transaction detected on blockchain');	
						break;
					}

					case 'Confirmed':
					{
						$order -> add_order_note('Invoice : '.$invoice_id.' has changed to confirmed');
						if($this -> processing_status == $status)
						{
							$order -> payment_complete();		
							$order -> add_order_note('Payment Completed');		
							$woocommerce -> cart -> empty_cart();		
						}
						break;
					}
					case 'Complete':
					{
						$order -> add_order_note('Invoice : '.$invoice_id.' has changed to complete');
						if($this -> processing_status == $status)
						{
							$order -> payment_complete();		
							$order -> add_order_note('Payment Completed');		
							$woocommerce -> cart -> empty_cart();		
						}
						break;
					}
					case 'Expired':
					{
						$order -> add_order_note('Invoice : '.$invoice_id.' has chnaged to expired');
						$order->update_status('failed', __('Payment Expired', 'unipayment'));
						break;
					}
					case 'Invalid':
					{
						$order -> add_order_note('Invoice : '.$invoice_id.' has changed to invalid because of network congestion, please check the dashboard');
						$order->update_status('failed', __('Payment Invalid', 'unipayment'));	
						break;
					}


					default:
            				break;
				}

				
			   echo "SUCCESS";				
			   exit;


		  }
        }								        
        
        
		
	}

	

    /**

     * Add the Gateway to WooCommerce

     **/

    function woocommerce_add_unipayment_gateway($methods) {

        $methods[] = 'WC_UniPayment';

        return $methods;

    }

    add_filter('woocommerce_payment_gateways', 'woocommerce_add_unipayment_gateway' );
	

  }
?>