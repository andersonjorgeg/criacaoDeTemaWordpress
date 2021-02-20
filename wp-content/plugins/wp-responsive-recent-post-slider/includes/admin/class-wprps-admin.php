<?php
/**
 * Admin Class
 *
 * Handles the admin functionality of plugin
 *
 * @package WP Responsive Recent Post Slider
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Wprps_Admin {

	function __construct() {

		// Action to add admin menu
		add_action( 'admin_menu', array( $this, 'wprps_register_menu') );

		// Admin init process
		add_action( 'admin_init', array( $this, 'wprps_admin_init_process') );

		// Action to add custom column to post listing
		add_filter('manage_edit-category_columns', array( $this, 'wppsac_category_manage_columns' ) ); 

		// Action to add custom column data to post listing
		add_filter('manage_category_custom_column', array( $this, 'wppsac_category_columns' ), 10, 3);
	}

	/**
	 * Function to add menu
	 * 
	 * @package WP Responsive Recent Post Slider
	 * @since 1.0.0
	 */
	function wprps_register_menu() {

		// Getting Started page
		add_menu_page( __('Recent Post Slider', 'wp-responsive-recent-post-slider'), __('Recent Post Slider', 'wp-responsive-recent-post-slider'), 'manage_options', 'wprps-about', array($this, 'wprps_getting_started_page'), 'dashicons-sticky', 6 );

		// Register plugin premium page
		add_submenu_page( 'wprps-about', __('Upgrade to PRO - Recent Post Slider', 'wp-responsive-recent-post-slider'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'wp-responsive-recent-post-slider').'</span>', 'edit_posts', 'wprps-premium', array($this, 'wprps_premium_page') );
	}

	/**
	 * Getting Started Page Html
	 * 
	 * @since 1.0
	 */
	function wprps_getting_started_page() {
		include_once( WPRPS_DIR . '/includes/admin/wprps-how-it-work.php' );
	}

	/**
	 * Premium Page Html
	 * 
	 * @package WP Responsive Recent Post Slider
	 * @since 1.0.0
	 */
	function wprps_premium_page() {
		include_once( WPRPS_DIR . '/includes/admin/settings/premium.php' );
	}

	/**
	 * Function to notification transient
	 * 
	 * @package WP Responsive Recent Post Slider
	 * @since 1.4.3
	 */
	function wprps_admin_init_process() {
		// If plugin notice is dismissed
	    if( isset($_GET['message']) && $_GET['message'] == 'wprps-plugin-notice' ) {
	    	set_transient( 'wprps_install_notice', true, 604800 );
	    }
	}

	/**
	 * Add custom column to Logo listing page
	 * 
	 * @package WP Responsive Recent Post Slider
	 * @since 1.0.0
	 */
	function wppsac_category_manage_columns($columns) {
	    $new_columns['wpos_shortcode'] = __( 'Category ID', 'wp-responsive-recent-post-slider' );
		$columns = wppsac_add_array( $columns, $new_columns, 2 );
		return $columns;
	}

	/**
	 * Add custom column data to Logo listing page
	 * 
	 * @package WP Responsive Recent Post Slider
	 * @since 1.0.0
	 */
	function wppsac_category_columns($ouput, $column_name, $tax_id) {
		if( $column_name == 'wpos_shortcode' ) {
			$ouput .= $tax_id;
		}
	    return $ouput;
	}
}

$wprps_admin = new Wprps_Admin();