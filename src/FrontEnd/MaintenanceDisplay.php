<?php
/**
 * Renders the maintenance page.
 */

namespace ScorpioTek\SimpleWPMaintenance\FrontEnd;

class MaintenanceDisplay {
	public static function display_maintenance() {
		global $pagenow;
		// die($pagenow);
		$display_maintenance = \get_field( 'truefalse_maintenance_mode_active', 'options' );
		if ( '0' === $display_maintenance || 'wp-login.php' === $pagenow  || current_user_can( 'manage_options' ) ) {
			return;
		}
		self::render_construction_page();
		die();
	}

	private static function render_construction_page() {
		header( $_SERVER["SERVER_PROTOCOL"] . ' 503 Service Temporarily Unavailable', true, 503 );
		header( 'Content-Type: text/html; charset=utf-8' );
		$logo                            = \wp_get_attachment_url( \get_option( 'options_image_logo' ) );
		$font_uri                        = \plugin_dir_url( dirname( __FILE__, 2) ) . 'dist/fonts/OPTIFranklinGothic-Medium.otf';
		$header_text                     = \get_option( 'options_text_header_text' );
		$message                         = \get_option( 'options_wysiwyg_message' );
		$background_css                  = self::get_background_css();
		$text_container_background_color = \get_option( 'options_colorpicker_text_container_colour' );
		$text_container_opacity          = \get_option( 'options_range_text_container_opacity' );
		if ( \is_numeric( $text_container_opacity ) ) {
			$text_container_background_color = $text_container_background_color . self::get_hex_from_decimal( 2.55 * $text_container_opacity );
		}
		?>
		<link rel="preconnect" href="https://fonts.gstatic.com"> 
		<style>
			@font-face {
				font-family: "Franklin Gothic Medium";
				src: url(<?php echo $font_uri; ?>);
			}
			body {
				<?php echo $background_css; ?>
			}
			.content {
				position: absolute;
				min-width: 50%;
				max-width: 90%;
				left: 50%;
				top: 50%;
				background: <?php echo $text_container_background_color; ?>;
				text-align: center;
				color: white;
				width: 300px;
			}
			.inner {
				padding: 30px;
			}
			h1, h2, h3, h4, h5, h6 {
				margin: 10px 0;
				font-family: "Franklin Gothic Medium", "FranklinGothicMedium", "Helvetica Neue", Helvetica, Arial, sans-serif;
				font-weight: normal;
				line-height: 20px;
				color: inherit;
				text-rendering: optimizelegibility;
			}
			h2 {
				line-height: 34px !important;
				color: #ffffff;
				font-size: 30px;
			}
			.logo {
				margin-bottom: 20px;
			}
			h4 {
				display: block;
				margin-block-start: 1.33em;
				margin-block-end: 1.33em;
				margin-inline-start: 0px;
				margin-inline-end: 0px;
				font-size: 20px;
				line-height: 24px;
				font-family: "Helvetica Neue",Helvetica;
			}
			.inner span {
				display: block;
				padding: 25px 0 35px 0;
			}
			.inner span a img {
				width: 41px;
				height: 41px;
			}
			span.social-media img {
				padding: 0 5px;
			}

		</style>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
		<script>
			jQuery(document).ready(function () {
			jQuery(document).ready(function () {
				jQuery(window).resize(function () {
				jQuery('.content').css({
					left: (jQuery(window).width() - jQuery('.content').outerWidth()) / 2,
					top: (jQuery(window).height() - jQuery('.content').outerHeight()) / 2
				});
				});
				// To initially run the function:
				jQuery(window).resize();
			});
			});
		</script>
		<div class="under-construction">
			<div class="content">
				<div class="inner">
					<div class="logo">
						<img src="<?php echo $logo; ?>" />
					</div>
					<h2><?php echo $header_text; ?></h2>
					<h4><?php echo $message; ?></h4>
					<span class="social-media">
					<?php
						$repeater_size = \get_option( 'options_repeater_social_media' );
						$image_folder  = \plugin_dir_url( dirname( __FILE__, 2 ) ) . 'dist/images/';

						for( $i = 0; $i < $repeater_size; $i++ ) {
							$kind = \get_option( "options_repeater_social_media_{$i}_social_media_selection" );
							$link = \get_option( "options_repeater_social_media_{$i}_social_media_link" );
							echo( "<a href=\"${link}\"><img src=\"{$image_folder}/{$kind}.png\" alt=\"{$kind}\" title=\"{$kind}\"></a>" );
						}
					?>
					</span>
				</div>

			</div>
		</div>
	<?php
	}

	private static function get_background_css() {
		$background_image =  wp_get_attachment_url( \get_option( 'options_image_background_image') );
		$background_color = \get_option( 'options_colorpicker_webpage_background_color' );
		if ( ! empty( $background_image ) ) {
			return "background: url( ${background_image}) no-repeat center center fixed;\n
			background-size:cover;";
		} elseif ( ! empty( $background_color) ) {
			return "background-color: ${background_color}";
		}
		else return '';
	}

	private static function get_hex_from_decimal( $number ) {
		$hex_table = array(
			0 => '0',
			1 => '1',
			2 => '2',
			3 => '3',
			4 => '4',
			5 => '5',
			6 => '6',
			7 => '7',
			8 => '8',
			9 => '9',
			10 => 'A',
			11 => 'B',
			12 => 'C',
			13 => 'D',
			14 => 'E',
			15 => 'F',
		);
		if ( $number >= 0 && $number <= 15 ) {
			return $hex_table[$number];
		}

		while ( $number >= 16 ) {
			$result    = intval( $number / 16 ); // No remainder.
			$remainder = $number % 16;
			// echo ("Result: {$result} Remainder: {$remainder} <br/>");
			$number = $result;
			return self::get_hex_from_decimal( $result ) . $hex_table[$remainder];
		}
	}
}