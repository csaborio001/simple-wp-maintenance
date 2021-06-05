<?php
/**
 * Hooks up events in the front.
 */

namespace ScorpioTek\SimpleWPMaintenance\Hooks;

use ScorpioTek\SimpleWPMaintenance\FrontEnd\MaintenanceDisplay;
use ScorpioTek\SimpleWPMaintenance\Assets\AssetLoader;

class FrontEndHooker {
	public static function init() {
		self::setup_page_load_hooks();
	}
	
	public static function setup_page_load_hooks() {
		\add_action(
			'wp_head',
			array( AssetLoader::class, 'load_front_end_assets' )
		);
		\add_action(
			'wp_loaded',
			array( MaintenanceDisplay::class, 'display_maintenance' )
		);
	}
}