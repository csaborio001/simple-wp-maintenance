<?php
/**
* Plugin Name: Simple WP Maintenance
* Plugin URI: https://www.scorpiotek.com.au/plugins/simple-wp-maintenance
* Description: Easy maintenance plugin
* Version: 0.0.0.1
* Author: Christian Saborio
* Author URI: https://scorpiotek.com/
**/

/** Exit if file is called directly. */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
require_once( 'vendor/autoload.php' );

// use ScorpioTek\WPUtil\Logging\StreamLogger;
use ScorpioTek\SimpleWPMaintenance\Hooks\AdminHooker;

// if ( ! class_exists( StreamLogger::class ) ) {
// 	try {
// 		if ( ! @include_once 'vendor/autoload.php' ) {
// 			throw new Exception ('autoload.php does not exist');
// 		} else {
// 			require_once( 'vendor/autoload.php' );
// 			if ( !class_exists( StreamLogger::class ) ) {
// 				throw new Exception ('ScorpioTek Utilities not loaded');
// 			}
// 		}
// 	} catch (\Exception $e) {
// 		error_log( 'SimpleWPMaintenance Error: ScorpioTek Utilities could not be loaded, exiting.');
// 		return -1;
// 	}
// 	/** Sets up all the required hooks for the plugin. */
// }
AdminHooker::init();
