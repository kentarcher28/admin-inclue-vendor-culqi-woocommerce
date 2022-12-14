<?php
/*
Plugin Name: Culqi
Plugin URI:https://wordpress.org/plugins/wp-culqi-integration
Description: Culqi acepta pago con tarjetas, pagoefectivo, billeteras móviles y cuotéalo desde tu tienda virtual.
Version: 3.0.0
Author: Culqi
Author URI: https://culqi.com/
Developer: Juan Ysen
Developer URI: https://culqi.com/
Text Domain: culqi, woocommerce, method payment
Requires at least: 5.0
Tested up to: 6.0
Stable tag: 5.6
Requires PHP: 5.6
WC requires at least: 2.6.11
WC tested up to:
*/
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'MPCULQI_FILE' , __FILE__ );
define( 'MPCULQI_DIR' , plugin_dir_path(__FILE__) );
define( 'MPCULQI_URL' , plugin_dir_url(__FILE__) );
define( 'MPCULQI_BASE' , plugin_basename( __FILE__ ) );

define('MPCULQI_URLAPI_INTEG', 'https://integ-panel.culqi.com');
define('MPCULQI_URLAPI_PROD', 'https://panel.culqi.com');

define('MPCULQI_URLAPI_INTEG_3DS', 'https://3ds.culqi.com');
define('MPCULQI_URLAPI_PROD_3DS', 'https://3ds.culqi.com');

define('MPCULQI_URLAPI_ORDERCHARGES_INTEG', 'https://api.culqi.com/v2');
define('MPCULQI_URLAPI_CHECKOUT_INTEG', 'https://checkout.culqi.com/js/v4');

define('MPCULQI_URLAPI_LOGIN_INTEG', MPCULQI_URLAPI_INTEG.'/user/login');
define('MPCULQI_URLAPI_MERCHANT_INTEG', MPCULQI_URLAPI_INTEG.'/secure/merchant/');
define('MPCULQI_URLAPI_MERCHANTSINGLE_INTEG', MPCULQI_URLAPI_INTEG.'/secure/keys/?merchant=');
define('MPCULQI_URLAPI_WEBHOOK_INTEG', MPCULQI_URLAPI_INTEG.'/secure/events');

define('MPCULQI_URLAPI_ORDERCHARGES_PROD', 'https://api.culqi.com/v2');
define('MPCULQI_URLAPI_CHECKOUT_PROD', 'https://checkout.culqi.com/js/v4');

define('MPCULQI_URLAPI_LOGIN_PROD', MPCULQI_URLAPI_PROD.'/user/login');
define('MPCULQI_URLAPI_MERCHANT_PROD', MPCULQI_URLAPI_PROD.'/secure/merchant/');
define('MPCULQI_URLAPI_MERCHANTSINGLE_PROD', MPCULQI_URLAPI_PROD.'/secure/keys/?merchant=');
define('MPCULQI_URLAPI_WEBHOOK_PROD', MPCULQI_URLAPI_PROD.'/secure/events');

define('TIME_EXPIRATION_DEFAULT', 24);

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once MPCULQI_DIR . 'includes/class-fullculqi.php';


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fullculqi-activator.php
 */
function fullculqi_activate() {
	require_once MPCULQI_DIR . 'includes/class-fullculqi-activator.php';
	fullculqi_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fullculqi-deactivator.php
 */
//function culqi_deactivate() {
//	require_once MPCULQI_DIR . 'includes/class-fullculqi-deactivator.php';
//	fullculqi_Deactivator::deactivate();
//}


register_activation_hook( __FILE__, 'fullculqi_activate' );
//register_deactivation_hook( __FILE__, 'fullculqi_deactivate' );

/**
 * Store the plugin global
 */
global $fullculqi;

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 */

function fullculqi() {
	return FullCulqi::instance();
}

$fullculqi = fullculqi();
?>
