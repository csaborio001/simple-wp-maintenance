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
		$background_image = 'https://static.cdn.responsys.net/i5/responsysimages/content/shutters/pref_background_confirmation2.jpg';
		$font_uri         = \plugin_dir_url( dirname( __FILE__, 2) ) . 'dist/fonts/OPTIFranklinGothic-Medium.otf';
		?>
		<link rel="preconnect" href="https://fonts.gstatic.com"> 
		<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@500&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;500&display=swap" rel="stylesheet">
		<style>
			@font-face {
				font-family: "Franklin Gothic Medium";
				src: url(<?php echo $font_uri; ?>);
			}
			body {
				background-color: red;
				background: url( <?php echo $background_image; ?>) no-repeat center center fixed;
				background-size: cover;
			}
			.content {
				position: absolute;
				min-width: 50%;
				max-width: 90%;
				left: 50%;
				top: 50%;
				background: rgba(51,51,51,0.7);
				text-align: center;
				color: white;
				font-family: 'Roboto', sans-serif;
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
			}
			logo {
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
			}
			.inner span {
				display: block;
				padding: 25px 0 35px 0;
			}
			.inner span a img {
				width: 41px;
				height: 41px;
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
					<img src="https://bigstock-public.s3.amazonaws.com/crm-team/logo_new.png" />
					<h2>Under Construction!!!</h2>
					<h4>We might not be sending updates to your inbox, but we'd love to stay in touch. Connect with us!</h4>
					<span>
						<a href="https://www.facebook.com/Shutterstock"><img src="https://static.cdn.responsys.net/i5/responsysimages/shutters/contentlibrary/email_preference_center_2014_q3/img/facebook.png" alt="facebook" title="facebook"></a>
						<a href="https://twitter.com/Shutterstock"><img src="https://static.cdn.responsys.net/i5/responsysimages/shutters/contentlibrary/email_preference_center_2014_q3/img/twitter.png" alt="twitter" title="twitter"></a>
						<a href="https://plus.google.com/+shutterstock/posts"><img src="https://static.cdn.responsys.net/i5/responsysimages/shutters/contentlibrary/email_preference_center_2014_q3/img/google.png" alt="google+" title="google+"></a>
						<a href="http://instagram.com/shutterstock"><img src="https://static.cdn.responsys.net/i5/responsysimages/shutters/contentlibrary/email_preference_center_2014_q3/img/instagram.png" alt="instagram" title="instagram"></a>
						<a href="http://www.shutterstock.com/blog/"><img src="https://static.cdn.responsys.net/i5/responsysimages/shutters/contentlibrary/email_preference_center_2014_q3/img/blog.png" alt="blog" title="blog"></a>
					</span>
				</div>

			</div>
		</div>
	<?php
	}
}