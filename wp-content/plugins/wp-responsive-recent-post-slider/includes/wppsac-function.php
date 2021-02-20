<?php
/**
 * Plugin generic functions file
 *
 * @package WP Responsive Recent Post Slider
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Function to get plugin image sizes array
 * 
 * @package WP Responsive Recent Post Slider
 * @since 1.2.2
 */
function wppsac_get_unique() {
    static $unique = 0;
    $unique++;

    // For Elementor & Beaver Builder
    if( ( defined('ELEMENTOR_PLUGIN_BASE') && isset( $_POST['action'] ) && $_POST['action'] == 'elementor_ajax' )
    || ( class_exists('FLBuilderModel') && ! empty( $_POST['fl_builder_data']['action'] ) )
    || ( function_exists('vc_is_inline') && vc_is_inline() ) ) {
        $unique = current_time('timestamp') . '-' . rand();
    }

    return $unique;
}

/**
 * Function to get post featured image
 * 
 * @package WP Responsive Recent Post Slider
 * @since 1.2.5
 */
function wppsac_get_post_featured_image( $post_id = '', $size = 'full') {
    $size   = ! empty( $size ) ? $size : 'full';
    $image  = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );

    if( ! empty( $image ) ) {
        $image = isset($image[0]) ? $image[0] : '';
    }
    return $image;
}

/**
 * Function to get Taxonomies list 
 * 
 * @package WP Responsive Recent Post Slider
 * @since 1.3.3
 */
function wppsac_get_category_list( $post_id = 0, $taxonomy = '' ) {
    $output = '';
    $terms  = get_the_terms( $post_id, $taxonomy );

    if( $terms && ! is_wp_error( $terms ) && ! empty( $taxonomy ) ) {
        $output .= '<ul class="wppsac-post-categories-list">';
        foreach ( $terms as $term ) {
             $output .= '<li><a href="'.get_term_link($term).'" rel="'.$taxonomy.'"> '.$term->name.' </a></li>';
        }
        $output .= '</ul>';
    }
    return $output;
}


/**
 * Sanitize Multiple HTML class
 * 
 * @package WP Responsive Recent Post Slider
 * @since 2.3
 */
function wppsac_sanitize_html_classes($classes, $sep = " ") {
    $return = "";

    if( ! is_array( $classes ) ) {
        $classes = explode($sep, $classes);
    }

    if( ! empty( $classes ) ) {
        foreach($classes as $class){
            $return .= sanitize_html_class($class) . " ";
        }
        $return = trim( $return );
    }

    return $return;
}

/**
 * Function to get shortcode designs
 * 
 * @package WP Responsive Recent Post Slider
 * @since 1.2.5
 */
function wppsac_slider_designs() {
    $design_arr = array(
        'design-1'  => __('Design 1', 'wp-responsive-recent-post-slider'),
        'design-2'  => __('Design 2', 'wp-responsive-recent-post-slider'),
        'design-3'  => __('Design 3', 'wp-responsive-recent-post-slider'),
        'design-4'  => __('Design 4', 'wp-responsive-recent-post-slider'),
	);
	return apply_filters('wppsac_slider_designs', $design_arr );
}

/**
 * Function to get carousel shortcode designs
 * 
 * @package WP Responsive Recent Post Slider
 * @since 2.2
 */
function wppsac_carousel_designs() {
    $design_arr = array(
        'design-1' => __('Design 1', 'wp-responsive-recent-post-slider'),
	);
	return apply_filters('wppsac_carousel_designs', $design_arr );
}

/**
 * Function to add array after specific key
 * 
 * @package wp-responsive-recent-post-slider
 * @since 1.2.5
 */
function wppsac_add_array(&$array, $value, $index, $from_last = false) {

    if( is_array( $array ) && is_array( $value ) ) {

        if( $from_last ) {
            $total_count    = count($array);
            $index          = ( ! empty( $total_count ) && ( $total_count > $index ) ) ? ( $total_count - $index ): $index;
        }

        $split_arr  = array_splice($array, max(0, $index));
        $array      = array_merge( $array, $value, $split_arr);
    }
    return $array;
}

/**
 * Function to Manage conetnt limit
 * 
 * @package wp-responsive-recent-post-slider
 * @since 1.2.5
 */
function wprps_limit_words($string, $word_limit) {
    if( ! empty( $string ) ) {
        $content = strip_shortcodes( $string ); // Strip shortcodes
        $content = wp_trim_words( $string, $word_limit, '...' );
        return $content;
    }
}