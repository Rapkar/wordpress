<?php
/*
 * @wordpress-plugin
 * Plugin Name:     checkoutpage-except
 * Plugin URI:        https://php-tutorial.ir/
 * Requires Plugins: woocommerce
 * Description:       New checkout page
 * Version:           1.0
 * Requires at least: 5
 * Requires PHP:      5.6
 * Author:            Hossein Soltanian
 * Author URI:        https://php-tutorial.ir/
 * Text Domain:       login-verify-plm
 * Domain Path:       /languages
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 *
HTML Forms
Copyright (C) 2017-2020,hossein soltanian, hosseinbidar7@gmail.com
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */

if (!defined('ABSPATH')) {
    exit();
}
 if (!class_exists('WooCommerce')) {
require_once( ABSPATH . '/wp-content/plugins/woocommerce/woocommerce.php');
 }



function checkoutpage_except_plugin_css()
{
    $plugin_url = plugin_dir_url(__FILE__);
    
    wp_enqueue_style('checkoutpage_except_bootstrap', $plugin_url . '/assets/css/bootstrap.min.css');
    wp_enqueue_style('checkoutpage_except_bootstrap', $plugin_url . '/assets/css/font-awesome.min.css');
    wp_enqueue_style('checkoutpage_except_style', $plugin_url . 'assets/css/style.min.css');
    wp_enqueue_style('checkoutpage_except_rtl', $plugin_url . '/assets/css/rtl.min.css');
    wp_enqueue_style('checkoutpage_except_v2_rtl', $plugin_url . '/assets/css/v2-rtl.min.css');
    wp_enqueue_style('checkoutpage_except_font_awesome', $plugin_url . '/assets/css/font-awesome.min.css');

    wp_enqueue_style('checkoutpage_except_mams', $plugin_url . 'assets/css/mams.css');
   

    wp_enqueue_script('checkoutpage_except_jquery', $plugin_url . 'assets/jquery.min.js' );
    wp_enqueue_script('checkoutpage_except_jquery_2_4', $plugin_url . 'assets/jquery-2.2.4.min.js' );
    wp_enqueue_script('checkoutpage_except_bootstrap', $plugin_url . 'assets/bootstrap.min.js',['checkoutpage_except_jquery','checkoutpage_except_jquery_2_4'] );
    wp_enqueue_script('main', $plugin_url . '/assets/main.js', array('checkoutpage_except_jquery'), '3.3.7', true);

    wp_enqueue_script('main', $plugin_url . '/assets/main.js', array('jquery'), '3.3.7', true);
    wp_localize_script('main', 'ajax_posts', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}


add_action('wp_enqueue_scripts', 'checkoutpage_except_plugin_css');



add_action('wp_ajax_shipping_post_ajax', 'shipping_post_ajax');
add_action('wp_ajax_nopriv_shipping_post_ajax', 'shipping_post_ajax');


function shipping_post_ajax()
{
    if (isset($_POST['action']) && $_POST['action'] == 'shipping_post_ajax') {
        update_user_meta(get_current_user_id(), 'shipping_first_name', $_POST['newaddress']['firstname']);
        update_user_meta(get_current_user_id(), 'shipping_last_name', $_POST['newaddress']['lastname']);
        update_user_meta(get_current_user_id(), 'shipping_address_1', $_POST['newaddress']['adress']);
        update_user_meta(get_current_user_id(), 'shipping_city', $_POST['newaddress']['city']);
        update_user_meta(get_current_user_id(), 'shipping_state', $_POST['newaddress']['state']);
        update_user_meta(get_current_user_id(), 'shipping_postcode', $_POST['newaddress']['postcode']);
    }

    $adress =   get_user_meta(get_current_user_id(), 'shipping_address_1', true);
    #$var=json_encode( $woocommerce->customer);
    $name = get_user_meta(get_current_user_id(), 'shipping_first_name', true) . ' ' . get_user_meta(get_current_user_id(), 'shipping_last_name', true);

    #die($_POST['newaddress']);
    #var_dump( );
    $data = array('address' => $adress, 'name' => $name);
    wp_die(json_encode($data));
}

add_action('wp_ajax_shipping_post_bimeh_ajax', 'shipping_post_bimeh_ajax');
add_action('wp_ajax_nopriv_shipping_post_bimeh_ajax', 'shipping_post_bimeh_ajax');



function shipping_post_bimeh_ajax()
{
    if (isset($_POST['cost'])) {
        global $woocommerce;
        $weight = WC()->cart->cart_contents_weight;
        session_start();
        $_SESSION['val_bimeh_ajax'] = $_POST['cost'];
    }

    #  WC()->cart->add_fee('Donation Amount',5432);	

    die($_POST['cost']);
}
add_action('woocommerce_cart_calculate_fees', 'shipping_post_bimeh_ajax_f');
function shipping_post_bimeh_ajax_f()
{
    session_start();
    $extracost = $_SESSION['val_bimeh_ajax'];
    WC()->cart->add_fee('هزینه بیمه', $extracost, false, 'd-none');
}

add_action('wp_ajax_shipping_post_terminaladdressvalue_ajax', 'shipping_post_terminaladdressvalue_ajax');
add_action('wp_ajax_nopriv_shipping_post_terminaladdressvalue_ajax', 'shipping_post_terminaladdressvalue_ajax');



function shipping_post_terminaladdressvalue_ajax()
{
    if (isset($_POST['url'])) {
        session_start();
        $_SESSION['shipping_post_terminaladdressvalue_ajax'] = $_POST['url'];
        update_user_meta(get_current_user_id(), 'shipping_post_terminaladdressvalue_ajax', $_POST['url']);
    }
    die(get_user_meta(get_current_user_id(), 'shipping_post_terminaladdressvalue_ajax', true));
}
add_action('woocommerce_checkout_order_processed', 'wh_pre_paymentcall');

function wh_pre_paymentcall($order_id)
{

    update_post_meta($order_id, 'shipping_post_terminaladdressvalue_ajax',  $_SESSION['shipping_post_terminaladdressvalue_ajax']);
}


add_action('wp_ajax_shipping_post_terminal_user', 'shipping_post_terminal_user');
add_action('wp_ajax_nopriv_shipping_post_terminal_user', 'shipping_post_terminal_user');



function shipping_post_terminal_user()
{
    if (isset($_POST['type'])) {
        # session_start();	
        #$_SESSION['val_bimeh_ajax']=$_POST['bimeh'];
        if ($_POST['type'] == 'privacydelivery') {
            $data_general = $_POST['user'];
            $data =   get_user_meta(get_current_user_id(), 'shipping_post_terminal_user', true);
            if (is_array($data)) {
                $data = array_merge($data, [$_POST['user']]);
            } else {
                $data = [$_POST['user']];
            }
            update_user_meta(get_current_user_id(), 'shipping_post_terminal_user',  $data);
        } elseif ($_POST['type'] == 'registereddelivery') {
            $data_general  = $_POST['user'];
        } elseif ($_POST['type'] == 'deliveryrtypes') {
            $data_general = 'پیک عمومی';
        }
        session_start();
        $_SESSION['shipping_post_terminal_user'] =  $data_general;
    }
    die(get_user_meta(get_current_user_id(), 'shipping_post_terminal_user', true));
}
add_action('woocommerce_checkout_order_processed', 'wh_pre_paymentcall_shipping_post_terminal_user');

function wh_pre_paymentcall_shipping_post_terminal_user($order_id)
{

    update_post_meta($order_id, 'wh_pre_paymentcall_shipping_post_terminal_user',  $_SESSION['shipping_post_terminal_user']);
}

#$se=new WC(get_current_user_id());

#var_dump(WC()->shipping->get_shipping_methods());
#WC()->session = new WC_Session_Handler();
#WC()->session->init();
#var_dump(WC()->session->get( 'chosen_shipping_methods' ));

add_action('woocommerce_init', 'shipping_instance_form_fields_filters');

function shipping_instance_form_fields_filters()
{
    $shipping_methods = WC()->shipping->get_shipping_methods();
    foreach ($shipping_methods as $shipping_method) {
        add_filter('woocommerce_shipping_instance_form_fields_' . $shipping_method->id, 'shipping_instance_form_add_extra_fields');
    }
}

function shipping_instance_form_add_extra_fields($settings)
{
    $settings['shipping_min_bime'] = [
        'title' => 'حداقل بیمه',
        'type' => 'text',
        'placeholder' => '2000',
        'description' => ''
    ];


    return $settings;
}
add_filter('woocommerce_cart_item_name', 'ywp_product_image_on_checkout', 10, 3);
function ywp_product_image_on_checkout($name, $cart_item, $cart_item_key)
{

    if (!is_checkout())
        return $name;

    $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

    $thumbnail = $_product->get_image();

    $image = '<div class="ywp-product-image"  >'
        . $thumbnail .
        '</div>';

    return $image . $name;
}


add_action('wp_ajax_shipping_quantity_product', 'shipping_quantity_product');
add_action('wp_ajax_nopriv_shipping_quantity_product', 'shipping_quantity_product');



function shipping_quantity_product()
{
    $cart_item_key = $_POST['hash'];

    // Get the array of values owned by the product we're updating
    $threeball_product_values = WC()->cart->get_cart_item($cart_item_key);

    // Get the quantity of the item in the cart
    $threeball_product_quantity = apply_filters('woocommerce_stock_amount_cart_item', apply_filters('woocommerce_stock_amount', preg_replace("/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT))), $cart_item_key);

    // Update cart validation
    $passed_validation  = apply_filters('woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity);

    // Update the quantity of the item in the cart
    if ($passed_validation) {
        WC()->cart->set_quantity($cart_item_key, $_POST['count']);
    }




    die($threeball_product_values);
}
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments)
{
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count() + 1;
?>
    <div id="mini-cart-count"><?php echo $items_count ? $items_count : '&nbsp;'; ?></div>
<?php
    $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}
// add_filter('manage_edit-shop_order_columns', 'bbloomer_add_new_order_admin_list_column');

// function bbloomer_add_new_order_admin_list_column($columns)
// {
//     $columns['billing_country'] = 'Country';
//     return $columns;
// }

// add_action('manage_shop_order_posts_custom_column', 'bbloomer_add_new_order_admin_list_column_content');

// function bbloomer_add_new_order_admin_list_column_content($column)
// {

//     global $post;

//     if ('billing_country' === $column) {

//         $order = wc_get_order($post->ID);
//         echo get_post_meta($post->ID, 'shipping_post_terminaladdressvalue_ajax', true);
//     }
// }
add_action('woocommerce_admin_order_data_after_order_details', 'custom_woocommerce_admin_order_data_after_order_details');
function custom_woocommerce_admin_order_data_after_order_details($order)
{
?>
    <br class="clear" />

    <?php
    /*
         * get all the meta data values we need
         */
    $custom_field_value = get_post_meta($order->id, 'shipping_post_terminaladdressvalue_ajax', true);
    ?>
    <div class="custom_field">
        <p><strong>>آدرس باربری و ترمینال:</strong> <input style="width:100%" type="text" readonly value="<?= $custom_field_value ?>"></p>
    </div>


<?php
}
add_action('woocommerce_admin_order_data_after_order_details', 'woocommerce_admin_order_dataـshipping_post_terminal_user');
function woocommerce_admin_order_dataـshipping_post_terminal_user($order)
{
?>
    <br class="clear" />

    <?php
    /*
         * get all the meta data values we need
         */
    $custom_field_value = get_post_meta($order->id, 'wh_pre_paymentcall_shipping_post_terminal_user', true);
    ?>
    <div class="custom_field">

        <p><strong>مشخصات پیک:</strong> <input style="width:100%" type="text" readonly value="<?= $custom_field_value ?>"></p>
    </div>


<?php
}


add_filter('woocommerce_order_needs_shipping_address', '__return_true');
