<?php
/**
 * Plugin Name: YITH Donations for WooCommerce
 * Plugin URI: http://yithemes.com/themes/plugins/yith-woocommerce-donations/
 * Description: YITH Donations for WooCommerce allows you to add donation in your orders.
 * Version: 1.0.9
 * Author: YITHEMES
 * Author URI: http://yithemes.com/
 * Text Domain: yith-donations-for-woocommerce
 * Domain Path: /languages/
 *
 * @author Your Inspiration Themes
 * @package YITH Donations for WooCommerce
 * @version 1.0.9
 */

/*  Copyright 2013  Your Inspiration Themes  (email : plugins@yithemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( !defined( 'ABSPATH' ) ){
    exit;
}

if( !function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}


    function yith_ywcds_install_woocommerce_admin_notice() {
        ?>
        <div class="error">
            <p><?php _e( 'YITH Donations for WooCommerce is enabled but not effective. It requires WooCommerce in order to work.', 'yith-donations-for-woocommerce' ); ?></p>
        </div>
    <?php
    }


    function yith_ywcds_install_free_admin_notice() {
        ?>
        <div class="error">
            <p><?php _e( 'You can\'t activate the free version of YITH Donations for WooCommerce while you are using the premium one.', 'yith-donations-for-woocommerce' ); ?></p>
        </div>
    <?php
    }


if ( !defined( 'YWCDS_VERSION' ) ) {
    define( 'YWCDS_VERSION', '1.0.9' );
}

if ( !defined( 'YWCDS_FREE_INIT' ) ) {
    define( 'YWCDS_FREE_INIT', plugin_basename( __FILE__ ) );
}

if ( !defined( 'YWCDS_FILE' ) ) {
    define( 'YWCDS_FILE', __FILE__ );
}

if ( !defined( 'YWCDS_DIR' ) ) {
    define( 'YWCDS_DIR', plugin_dir_path( __FILE__ ) );
}

if ( !defined( 'YWCDS_URL' ) ) {
    define( 'YWCDS_URL', plugins_url( '/', __FILE__ ) );
}

if ( !defined( 'YWCDS_ASSETS_URL' ) ) {
    define( 'YWCDS_ASSETS_URL', YWCDS_URL . 'assets/' );
}

if ( !defined( 'YWCDS_TEMPLATE_PATH' ) ) {
    define( 'YWCDS_TEMPLATE_PATH', YWCDS_DIR . 'templates/' );
}

if ( !defined( 'YWCDS_INC' ) ) {
    define( 'YWCDS_INC', YWCDS_DIR . 'includes/' );
}

if( !defined('YWCDS_SLUG' ) ){
    define( 'YWCDS_SLUG', 'yith-woocommerce-donations' );
}



if ( !function_exists( 'yith_plugin_registration_hook' ) ) {
    require_once 'plugin-fw/yit-plugin-registration-hook.php';
}
register_activation_hook( __FILE__, 'yith_plugin_registration_hook' );

/* Plugin Framework Version Check */
if( ! function_exists( 'yit_maybe_plugin_fw_loader' ) && file_exists( YWCDS_DIR . 'plugin-fw/init.php' ) )
    require_once( YWCDS_DIR . 'plugin-fw/init.php' );

yit_maybe_plugin_fw_loader( YWCDS_DIR  );

if( !function_exists( 'YITH_Donations_Init' ) ) {

    /**
     * Unique access to instance of YITH_WC_Donations class
     *
     * @return  YITH_WC_Donations
     * @since 1.0.3
     */
    function YITH_Donations_Init()
    {
        load_plugin_textdomain( 'yith-donations-for-woocommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

        require_once( YWCDS_INC . 'functions.yith-wc-donations.php' );
        require_once( YWCDS_INC .'widgets/class.yith-wc-donations-form-widget.php' );
        require_once( YWCDS_INC . 'classes/class.yith-woocommerce-donations.php' );

       global $YITH_Donations;

        $YITH_Donations = YITH_WC_Donations::get_instance();
    }
}

add_action('yith_wc_donations_init', 'YITH_Donations_Init' );

if( !function_exists( 'yith_donations_install' ) ){
    /**
     * install donations
     * @author YITHEMES
     * @since 1.0.3
     */
    function yith_donations_install(){

        if( !function_exists( 'WC' ) ){
            add_action( 'admin_notices', 'yith_ywcds_install_woocommerce_admin_notice' );
        }elseif( defined( 'YWCDS_PREMIUM' ) ){
            add_action( 'admin_notices', 'yith_ywcds_install_free_admin_notice' );
            deactivate_plugins( plugin_basename( __FILE__ ) );
        }
        else
            do_action( 'yith_wc_donations_init' );

    }
}

add_action( 'plugins_loaded', 'yith_donations_install', 11 );