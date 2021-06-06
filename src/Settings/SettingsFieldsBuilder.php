<?php
/**
 * Sets up the settings fields for the plugins.
 */
namespace ScorpioTek\SimpleWPMaintenance\Settings;

use ScorpioTek\WPUtil\ACF\SubOptionsBuilder;

class SettingsFieldsBuilder extends SubOptionsBuilder {
	public function add_options_fields() {
		$this->add_message(
			'on_off',
			'<h1>Enable/Disable</h1>',
			''
		);
		$this->add_control(
			'truefalse',
			'Maintenance Mode Active',
			array(
				'width' => 50,
			),
			array(
				'ui'            => 1,
				'default_value' => 0,
				'instructions'  => 'If activated, only visitors of the site will see the maintenance screen.',
			)
		);

		$this->add_message(
			'images',
			'<h1>Images/Colours</h1>',
			''
		);

		$this->add_control(
			'colorpicker',
			'Webpage Background Color',
			array(
				'width' => 50,
			),
			array(
				'instructions' => 'If you select a background image, the colour will be overridden.',
			)
		);
		$this->add_control(
			'image',
			'Background Image',
			array(
				'width' => 50,
			),
			array(
				'instructions' => 'The background image, use a large file (i.e.: 2560 by 1920 pixels), it will be sized to fit the screen.',
			)
		);
		$this->add_control(
			'colorpicker',
			'Text Container Colour',
			array(
				'width' => 50,
			),
			array(
				'instructions'  => 'The background colour for the text container that is centered on screen.',
				'default_value' => '#2b2b2c',
			)
		);
		$this->add_control(
			'range',
			'Text Container Opacity',
			array(
				'width' => 50,
			),
			array(
				'instructions' => 'The transparency of the text container, 100 = no opacity',
				'step'         => 1,
				'min'          => 0,
				'max'          => 100,
			)
		);
		$this->add_message(
			'logo_display',
			'<h1>Logo</h1>',
			''
		);
		$this->add_control(
			'image',
			'Logo',
			array(
				'width' => 33,
			),
			array(
				'instructions' => 'The logo to display at the top, hopefully PNG with transparency.',
			)
		);
		$this->add_message(
			'text',
			'<h1>Text</h1>',
			''
		);
		$this->add_control(
			'text',
			'Header Text',
			array(
				'width' => 50,
			),
			array(
				'instructions' => 'The header that you would like to display at the top',
			)
		);
		$this->add_wysiwyg(
			'Message',
			array(
				'width' => 100,
			),
			'The text you want to display to your users'
		);
		$this->add_message(
			'social_media',
			'<h1>Social Media</h1>',
			''
		);
		$this->get_fields_builder()
		->addRepeater(
			'repeater_social_media',
			array(
				'label'        => 'Social Media Icons',
				'instructions' => 'Add social icons to link your pages.',
				'layout'       => 'table',
				'wrapper'      => array(
					'width' => 100,
				),
				'button_label' => 'Add Social Media',
			),
		)
			->addSelect(
				'social_media_selection',
				array(
					'label'        => 'Social Media Selection',
					'instructions' => 'Select the social media to include',
					'choices'      => array(
						'facebook'    => 'Facebook',
						'twitter'     => 'Twitter',
						'google'      => 'Google Plus',
						'instagram'   => 'Instagram',
						'blog'        => 'Blog',
					),
					'wrapper'      => array(
						'width' => 30,
					),
				)
			)
			->addURL(
				'social_media_link',
				array(
					'label'        => 'Social Media Link',
					'instructions' => 'Type or paste the related social media link',
					'required'     => 1,
					'wrapper'      => array(
						'width' => 70,
					),
				)
			);
	}
}
