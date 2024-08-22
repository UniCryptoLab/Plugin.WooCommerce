<?php

use Automattic\WooCommerce\Blocks\Payments\Integrations\AbstractPaymentMethodType;

final class WC_UniPayment_Blocks extends AbstractPaymentMethodType 
{
    private $gateway;
    protected $name = 'unipayment';

    public function initialize() {
		$this->settings = get_option( 'woocommerce_unipayment_settings', [] );
		$gateways       = WC()->payment_gateways->payment_gateways();
		$this->gateway  = $gateways[ $this->name ];
	}

    public function is_active() {
		return true;
	}

    public function get_payment_method_script_handles()
    {
        wp_register_script(
            'unipayment-blocks',
            plugin_dir_url(__FILE__) . 'checkout_block.js',
            [
                'wc-blocks-registry',
                'wc-settings',
                'wp-element',
                'wp-html-entities',
                'wp-i18n',
            ],
            null,
            true
        );

        if (function_exists('wp_set_script_translations')) 
        {
            wp_set_script_translations('unipayment-blocks');
        }

        return ['unipayment-blocks'];
    }

    public function get_payment_method_data()
    {
        return [
            'title' => $this->get_setting( 'title' ),
            'description' => $this->get_setting( 'description' ),
        ]; 
    }
}
