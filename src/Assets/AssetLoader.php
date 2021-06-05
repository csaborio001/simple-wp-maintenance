<?php
/**
 * Loads the CSS and Javascript needed for the website, also hooks up the communication between
 * the PHP files and the Javascript files.
 *
 * @package doggie-rescue
 */

namespace ScorpioTek\SimpleWPMaintenance\Assets;

class AssetLoader {
	public static function load_front_end_assets() {
		// $this->load_st_scripts();
		self::load_st_stylesheets();
	}

	public static function load_st_stylesheets() {
		\wp_die( var_dump( \plugins_url( '', dirname( __DIR__ ) ) . '/dist/css/simple-wp-maintenance.css' ) );
		\wp_register_style(
			'simple_wp_maintenance',
			\plugins_url( '', dirname( __DIR__ ) ) . '/dist/css/simple-wp-maintenance.css'
		);
		\wp_enqueue_style( 'st-styles' );
	}
}
