=== UniPayment Gateway for WooCommerce ===
Contributors: UniPayment
Tags: unipayment, bitcoin, ethereum, usdt, usc, busd, payment, cryptocurrency, woocommerce
Requires at least: 4.9
Tested up to: 6.0.2
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin implements a payment gateway for WooCommerce to let buyers pay with Bitcoin, Ethereum, USDT, and other cryptocurrencies via UniPayment.io.

== Description ==

This plugin implements a payment gateway for WooCommerce to let buyers pay with Bitcoin, Ethereum, USDT, and other cryptocurrencies via UniPayment.io.

= Key features =

* Accept online crypto payments from your customers, such as Bitcoin, Ethereum, USDT, USDC.
* Multiple fiat currency supported.
* Get settled in  BTC, ETH or USD stable coins (USDT, USDC, BUSD, USDP).
* Free setup and integration, no maintenance cost.
* Manage payments via your [UniPayment dashboard](https://console.unipayment.io)

== Installation ==

= Requirements =

* This plugin requires [WooCommerce](https://wordpress.org/plugins/woocommerce/).
* A UniPayment account ([Sandbox](https://sandbox-console.unipayment.io) and [Production](https://console.unipayment.io))


= Plugin installation =

1. Start from signing up for a [UniPayment account](http://console.unipayment.io)
2. Look for the UniPayment plugin via the [WordPress Plugin Manager](https://wordpress.org/support/article/plugins-add-new-screen/). From your WordPress admin panel, go to Plugins > Add New > Search plugins and type **UniPayment**
3. Select **UniPayment Gateway for WooCommerce** and click on **Install Now** and then on **Activate Plugin**

After the plugin is activated, UniPayment will appear in the WooCommerce > Settings > Payments section.

= Plugin configuration =

After you have installed the UniPayment plugin, the configuration steps are:

1. Create a Payment App from your UniPayment dashboard:
	* Login to UniPayment dashboard and go to the [Payment -> App](https://console.unipayment.io/#/payment/app)
	* click on the **Add** button: fill basic information of your store, click on the **Save** button.
	* Go to tab **ApiKey**, copy AppId and ApiKey.
2. Log in to your WordPress admin panel, select WooCommerce > Payments and click on the **Set up** button next to the UniPayment Payment methods
	* Paste the AppId and ApiKey value into the appropriate field.
	* Click "Save changes" at the bottom of the page.


= Order Status Handle =

UniPayment will send IPN (Instant Payment Notification) to plugin when status of invoice changed. An order note will automatically be added to WooCommerce order.

* When the buyer checkout with UniPayment, he is redirected to the invoice page while WooCommerce order is "Pending".
* The status of the WooCommerce order will change to **Processing**  when UniPayment invoice is confirmed or completed via the plugin settings.
* If UniPayment invoice expires before the buyer completed the payment, the WooCommerce order will be marked  as **Failed** via the plugin settings.

== Screenshots ==

1. UniPayment dashboard - create payment app
2. UniPayment dashboard - copy AppId and ApiKey
3. WordPress WooCommerce admin dashboard - UniPayment plugin settings
4. WordPress website - UniPayment checkout option
5. UniPayment hosted checkout - cryptocurrency selected
6. UniPayment hosted checkout - blockchain network selected
7. UniPayment hosted checkout - display payment information **Amount** and **Address***
8. UniPayment hosted checkout - buyer make the payment then UniPayment detected
9. UniPayment hosted checkout - UniPayment mark the invoice as paid after some confirmations
10. UniPayment dashboard - the invoice previously paid is listed under the "Invoice" section
11. UniPayment dashboard - the invoice details
12. WordPress WooCommerce admin dashboard - order view


== Changelog ==
= 1.0.1 =
* fix some issues under wordpress GuildLines.

= 1.0.0 =
* Initial release.
