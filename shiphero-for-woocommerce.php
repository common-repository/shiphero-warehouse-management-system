<?php

/*
Plugin Name: ShipHero
Plugin URI: http://www.shiphero.com
Description: ShipHero
Version: 1.1
Author: ShipHero
Author URI: http://www.shiphero.com
License:
*/

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    add_action('woocommerce_admin_order_data_after_order_details', 'shiphero_woocommerce_admin_order_data_after_order_details_function');

    function shiphero_woocommerce_admin_order_data_after_order_details_function($order) {

        try {
            $wc_shiphero_key = get_option( 'wc_shiphero_key');
            if (!$wc_shiphero_key) {
                return;
            }

            $url = get_site_url();

            $orderId = $order->id;
            $url = "https://app-endpoints.shiphero.com/channel/woocommerce/order/status/?wc_order_id=$orderId&wc_shiphero_key=$wc_shiphero_key";
            $response = wp_remote_get($url);

            if ($response["response"]["code"] != 200) {
                return;
            }

            $data = json_decode($response["body"], true);

            if (@array_key_exists("status", $data)) {

                $status = $data["status"];
                $shipheroOrderId = $data["order_id"];

                $html = "<p class='form-field form-field-wide'><label for='order_status'>ShipHero Order Status: <b>$status</b>";
                $html .= "<br><a target='_blank' href='https://app.shiphero.com/dashboard/orders/details/$shipheroOrderId'>On Shiphero</a></label></p>";
                echo $html;
            }

        } catch(Exception $ex) {

        }
    }

    function shiphero_woocommerce_woocommerce_general_settings_function( $settings ) {

        $updated_settings = array();

        foreach ( $settings as $section ) {

            // at the bottom of the General Options section
            if ( isset( $section['id'] ) && 'general_options' == $section['id'] && isset( $section['type'] ) && 'sectionend' == $section['type'] ) {

                $updated_settings[] = array(
                    'name'     => __( 'Shiphero Woocommerce Key', 'wc_shiphero' ),
                    'desc_tip' => __( 'After you add your Woocommerce store to your ShipHero account, you will see the Shiphero Woocommerce Key. Enter that here..', 'wc_shiphero' ),
                    'id'       => 'wc_shiphero_key',
                    'type'     => 'text',
                    'css'      => 'min-width:300px;',
                    'std'      => '',  // WC < 2.0
                    'default'  => '',  // WC >= 2.0
                    'desc'     => __( '', 'wc_shiphero' ),
                );
            }

            $updated_settings[] = $section;
        }

        return $updated_settings;
    }
    add_filter( 'woocommerce_general_settings', 'shiphero_woocommerce_woocommerce_general_settings_function' );
}
?>
