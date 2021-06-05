<?php
/**
 * Sets up the settings fields for the plugins.
 * 
 */
namespace ScorpioTek\SimpleWPMaintenance\Settings;

use ScorpioTek\WPUtil\ACF\SubOptionsBuilder;

class SettingsFieldsBuilder extends SubOptionsBuilder {
	public function add_options_fields() {

		$this->add_control(
			'truefalse',
			'Maintenance Mode Active',
			array(
				'width' => 50,
			),
			array(
				'ui'            => 1,
				'default_value' => 0,
			)
		);

		$this->add_control(
			'colorpicker',
			'Background Color',
			array(
				'width' => 50,
			)
		);

		$this->add_control(
			'image',
			'Background Image',
			array(
				'width' => 50,
			)
		);
	}
}