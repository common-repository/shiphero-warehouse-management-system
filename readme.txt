=== Plugin Name ===
Contributors: Shiphero
Tags: woocommerce, shiphero, shipping, warehouse, inventory, sales, returns, 3pl, ups, dhl, fedex, usps, canada post, xero
Requires at least: 3.0.1
Tested up to: 4.4.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This plugin will allow you to connect your woocommerce store to your Shiphero App. https://app.shiphero.com
This will allow you to manage your orders and inventory with Shiphero.
Plugin Requires woocommerce plugin. https://wordpress.org/plugins/woocommerce/

== Description ==

    Shiphero Plugin allows you to connect your woocommerce store to our Shiphero App. https://app.shiphero.com

    When orders are recieved in your woocommerce store, we download the orders into shiphero, allowing you to fulfill them using shiphero on the warehouse floor.

    When an order is fulfilled in shiphero we push back order status to woocommerce.

    When inventory is updated in Shiphero App, this plugin allows us to return important information to your woocommerce store such as on hand amounts.

    Read more about Shiphero App here http://www.shiphero.com

    If you have any questions or would like to disconnect your store contact us at support@shiphero.com.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/shiphero-wp` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Click on WooCommerce Tab, if its not there install WooCommerce plug-in https://wordpress.org/plugins/woocommerce/.
4. Click on Settings Tab under WooCommerce
5. Click on API tab
6. Click on Keys/Apps
7. Click Add Key
8. Name it and Set Permissions to Read/Write
9. Click Generate API Key
10. Login to your Shiphero Account, if you don't have one sign up at https://app.shiphero.com/account/register
11. Go to https://app.shiphero.com/dashboard/stores
12. Click Add A New Store button and then click WooCommerce
13. Copy Consumer Key and Secret into Shiphero Form then Connect


== Frequently Asked Questions ==

= Does Shiphero Cost Money? =

Yes, our pricing plan can be found here http://www.shiphero.com/pricing/.

== Screenshots ==

1. `/assets/screenshot-1.png`

== Changelog ==

= 1.0 =
* Inital Release

= 1.01 =
* Fixed Bug - Order not found error

= 1.1 =
* Updated order status url