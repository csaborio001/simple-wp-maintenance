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
		?>
		<style>
			body {
				background-color: red;
			}
		</style>
		<div class="under-construction">
			<h1>Under Construction</h1>
		</div>
	<?php
	}
}