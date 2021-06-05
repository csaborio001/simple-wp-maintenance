<?php
/**
 * Sets up the required hooks for the plugin.
 */

namespace ScorpioTek\SimpleWPMaintenance\Hooks;

use ScorpioTek\SimpleWPMaintenance\Settings\SettingsFieldsBuilder;

class AdminHooker {
	public static function init() {
		self::setup_website_options();
	}

	public static function setup_website_options() {
		$settings_fields_builder = new SettingsFieldsBuilder(
			'options-general.php',
			'Simple WP Maintenance Options'
		);
		\add_filter(
			'acf/init',
			array( $settings_fields_builder, 'init_options' )
		);
	}
}