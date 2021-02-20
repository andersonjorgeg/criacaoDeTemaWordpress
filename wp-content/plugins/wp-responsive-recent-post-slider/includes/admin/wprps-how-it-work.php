<?php
/**
 * Plugin Getting Started Page
 *
 * @package WP Responsive Recent Post Slider
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="wrap wprpsm-wrap">
<h2><?php _e( 'How It Works', 'wp-responsive-recent-post-slider' ); ?></h2>
	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box.postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wprpsm-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wprpsm-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
		.upgrade-to-pro{font-size:18px; text-align:center; margin-bottom:15px;}
		.wpos-copy-clipboard{-webkit-touch-callout: all; -webkit-user-select: all; -khtml-user-select: all; -moz-user-select: all; -ms-user-select: all; user-select: all;}
		.wpos-new-feature{ font-size: 10px; color: #fff; font-weight: bold; background-color: #03aa29; padding:1px 4px; font-style: normal; }
	</style>

	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">

			<!--How it workd HTML -->
			<div id="post-body-content">
				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'How It Works - Display and shortcode', 'wp-responsive-recent-post-slider' ); ?></span>
							</h2>
						</div>

						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('Getting Started with Post Slider', 'wp-responsive-recent-post-slider'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. This plugin create a menu "Recent Post Slider".', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-2. This plugin get all the latest POST from WordPress Post section with a simple shortcode', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-3. If you need a <b>Featured Post</b> OR <b>Trending/Popular Post</b> plugin then try our plugins', 'wp-responsive-recent-post-slider'); ?> <a href="https://wordpress.org/plugins/featured-post-creative/" target="_blank"><?php _e( 'Featured Post', 'wp-responsive-recent-post-slider' ); ?></a> and <a href="https://wordpress.org/plugins/wp-trending-post-slider-and-widget/" target="_blank"><?php _e( 'Trending/Popular Post', 'wp-responsive-recent-post-slider' ); ?></a></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('How Shortcode Works', 'wp-responsive-recent-post-slider'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Create a page like Latest Post OR add the shortcode in a page.', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-2. Put below shortcode as per your need.', 'wp-responsive-recent-post-slider'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('All Shortcodes', 'wp-responsive-recent-post-slider'); ?>:</label>
										</th>
										<td>
											<span class="wpos-copy-clipboard wprpsm-shortcode-preview">[recent_post_slider design="design-1"]</span> – <?php _e('Post slider Shortcode. Where you can use 4 designs.', 'wp-responsive-recent-post-slider'); ?> <br />
											<span class="wpos-copy-clipboard wprpsm-shortcode-preview">[recent_post_carousel design="design-1"]</span> – <?php _e('Post carousel Shortcode. Where you can use 1 designs.', 'wp-responsive-recent-post-slider'); ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Gutenberg Support', 'wp-responsive-recent-post-slider' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('How it Work', 'wp-responsive-recent-post-slider'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Go to the Gutenberg editor of your page.', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-2. Search "recent" keyword in the Gutenberg block list.', 'wp-responsive-recent-post-slider'); ?></li>
												<li><?php _e('Step-3. Add any block of recent and you will find its relative options on the right end side.', 'wp-responsive-recent-post-slider'); ?></li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Need Support?', 'wp-responsive-recent-post-slider' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<td>
											<p><?php _e('Check plugin document for shortcode parameters and demo for designs.', 'wp-responsive-recent-post-slider'); ?></p> <br/>
											<a class="button button-primary" href="https://docs.wponlinesupport.com/wp-responsive-recent-post-slider/" target="_blank"><?php _e('Documentation', 'wp-responsive-recent-post-slider'); ?></a>
											<a class="button button-primary" href="https://demo.wponlinesupport.com/recent-post-slider-demo/" target="_blank"><?php _e('Demo for Designs', 'wp-responsive-recent-post-slider'); ?></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<!-- Help to improve this plugin! -->
				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Help to improve this plugin!', 'wp-responsive-recent-post-slider' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<p><?php _e( 'Enjoyed this plugin? You can help by rate this plugin ', 'wp-responsive-recent-post-slider' ); ?><a href="https://wordpress.org/support/plugin/wp-responsive-recent-post-slider/reviews/" target="_blank"><?php _e( '5 stars!', 'wp-responsive-recent-post-slider' ); ?></a></p>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-body-content -->

			<!--Upgrad to Pro HTML -->
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox wpos-pro-box">
						<h3 class="hndle">
							<span><?php _e( 'Upgrate to Pro', 'wp-responsive-recent-post-slider' ); ?></span>
						</h3>
						<div class="inside">
							<ul class="wpos-list">
								<li><?php _e( '60+ designs', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'Recent Post Slider with 25 designs', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'Recent Post Carousel with 30 designs', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'Recent gridbox slider with 8 designs', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( '3 Widgets (Post slider, Post List/Slider-1, Post List/Slider-2)', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'Drag & Drop order change', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'Custom CSS option', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'WPBakery Page Builder Supports', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'Gutenberg, Elementor, Bevear and SiteOrigin Page Builder Support. <span class="wpos-new-feature">New</span>', 'wp-responsive-recent-post-slider'); ?></li>
								<li><?php _e( 'Divi Page Builder Native Support. <span class="wpos-new-feature">New</span>', 'wp-responsive-recent-post-slider'); ?></li>
								<li><?php _e( 'Fusion Page Builder (Avada) native support.<span class="wpos-new-feature">New</span>', 'wp-responsive-recent-post-slider'); ?></li>
								<li><?php _e( 'WP Templating Features', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'Slider RTL support', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( 'Fully responsive', 'wp-responsive-recent-post-slider' ); ?></li>
								<li><?php _e( '100% Multi language', 'wp-responsive-recent-post-slider' ); ?></li>
							</ul>
							<div class="upgrade-to-pro"><?php echo __( 'Gain access to <strong>Responsive Recent Post Slider</strong> included in <br /><strong>Essential Plugin Bundle', 'wp-responsive-recent-post-slider' ); ?></div>
							<a class="button button-primary wpos-button-full" href="https://www.wponlinesupport.com/wp-plugin/wp-responsive-recent-post-slider/?ref=WposPratik&utm_source=WP&utm_medium=Post-Slider&utm_campaign=Upgrade-PRO" target="_blank"><?php _e('Go Premium ', 'wp-responsive-recent-post-slider'); ?></a>
							<p><a class="button button-primary wpos-button-full" href="https://demo.wponlinesupport.com/prodemo/post-slider-pro/" target="_blank"><?php _e('View PRO Demo ', 'wp-responsive-recent-post-slider'); ?></a></p>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-container-1 -->
		</div><!-- #post-body -->
	</div><!-- #poststuff -->
</div>