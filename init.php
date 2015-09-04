<?php
/*
Plugin Name: YITH WooCommerce Questions and Answers
Plugin URI: http://yithemes.com
Description: YITH WooCoomerce Questions And Answers offers a rapid way to manage dynamic discussions about the products of your shop.
Author: Yithemes
Text Domain: ywqa
Version: 1.0.4
Author URI: http://yithemes.com/
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! function_exists( 'is_plugin_active' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

function yith_ywqa_install_woocommerce_admin_notice() {
	?>
	<div class="error">
		<p><?php _e( 'YITH WooCommerce Questions & Answers is enabled but not effective. It requires WooCommerce in order to work.', 'yit' ); ?></p>
	</div>
<?php
}

function yith_ywqa_install_free_admin_notice() {
	?>
	<div class="error">
		<p><?php _e( 'You can\'t activate the free version of YITH WooCommerce Questions & Answers while you are using the premium one.', 'yit' ); ?></p>
	</div>
<?php
}

if ( ! function_exists( 'yith_plugin_registration_hook' ) ) {
	require_once 'plugin-fw/yit-plugin-registration-hook.php';
}
register_activation_hook( __FILE__, 'yith_plugin_registration_hook' );

//region    ****    Define constants

if ( ! defined( 'YITH_YWQA_FREE_INIT' ) ) {
	define( 'YITH_YWQA_FREE_INIT', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'YITH_YWQA_VERSION' ) ) {
	define( 'YITH_YWQA_VERSION', '1.0.4' );
}

if ( ! defined( 'YITH_YWQA_FILE' ) ) {
	define( 'YITH_YWQA_FILE', __FILE__ );
}

if ( ! defined( 'YITH_YWQA_DIR' ) ) {
	define( 'YITH_YWQA_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'YITH_YWQA_URL' ) ) {
	define( 'YITH_YWQA_URL', plugins_url( '/', __FILE__ ) );
}

if ( ! defined( 'YITH_YWQA_ASSETS_URL' ) ) {
	define( 'YITH_YWQA_ASSETS_URL', YITH_YWQA_URL . 'assets' );
}

if ( ! defined( 'YITH_YWQA_TEMPLATE_PATH' ) ) {
	define( 'YITH_YWQA_TEMPLATE_PATH', YITH_YWQA_DIR . 'templates' );
}

if ( ! defined( 'YITH_YWQA_TEMPLATE_DIR' ) ) {
	define( 'YITH_YWQA_TEMPLATE_DIR', YITH_YWQA_DIR . '/templates/' );
}

if ( ! defined( 'YITH_YWQA_ASSETS_IMAGES_URL' ) ) {
	define( 'YITH_YWQA_ASSETS_IMAGES_URL', YITH_YWQA_ASSETS_URL . '/images/' );
}
//endregion

function yith_ywqa_init() {

	/**
	 * Load text domain and start plugin
	 */
	load_plugin_textdomain( 'ywqa', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	require_once( YITH_YWQA_DIR . 'class.yith-woocommerce-question-answer.php' );
	require_once( YITH_YWQA_DIR . 'lib/class.ywqa-plugin-fw-loader.php' );
	require_once( YITH_YWQA_DIR . 'lib/class.ywqa-discussion.php' );
	require_once( YITH_YWQA_DIR . 'lib/class.ywqa-question.php' );
	require_once( YITH_YWQA_DIR . 'lib/class.ywqa-answer.php' );
	require_once( YITH_YWQA_DIR . 'functions.php' );

	YWQA_Plugin_FW_Loader::get_instance();

	global $YWQA;
	$YWQA = YITH_WooCommerce_Question_Answer::get_instance();
}

add_action( 'yith_ywqa_init', 'yith_ywqa_init' );


function yith_ywqa_install() {

	if ( ! function_exists( 'WC' ) ) {
		add_action( 'admin_notices', 'yith_ywqa_install_woocommerce_admin_notice' );
	} elseif ( defined( 'YITH_YWQA_PREMIUM' ) ) {
		add_action( 'admin_notices', 'yith_ywqa_install_free_admin_notice' );
		deactivate_plugins( plugin_basename( __FILE__ ) );
	} else {
		do_action( 'yith_ywqa_init' );
	}
}

add_action( 'plugins_loaded', 'yith_ywqa_install', 11 );