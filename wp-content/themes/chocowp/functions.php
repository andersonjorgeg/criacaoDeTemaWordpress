<?php

$theme_data = wp_get_theme();
define( 'THEME_VERSION', $theme_data->Version );

if (!isset($content_width)) {
    $content_width = 1180;
}

if (!function_exists('is_plugin_active'))
    require_once(ABSPATH . '/wp-admin/includes/plugin.php');

if (!function_exists('choco_wp_register_custom_menu_page')) {
    function choco_wp_register_custom_menu_page() {
        add_menu_page(__('ChocoWP Theme', 'chocowp'), __('ChocoWP Theme', 'chocowp'), 'manage_options', 'chocowp', 'choco_wp_so_custom_menu_page', 'dashicons-heart', 3);
        add_submenu_page('chocowp', __('How To Import Demo', 'chocowp'), __('How To Import Demo', 'chocowp'), 'manage_options', 'chocowp-import', 'choco_wp_so_custom_menu_page_import');
    }
}

if (!function_exists('choco_wp_so_custom_menu_page')) {
    function choco_wp_so_custom_menu_page(){
        echo "<h2>" . __('ChocoWP Theme', 'chocowp') . "</h2>
            <div>
                <p>" . __('Download <b>Extended Theme Plugin</b>', 'chocowp') . " - <a target='_blank' href='https://zenith.team/chocowp-extended-plugin/'>" . __('click here', 'chocowp') . "</a></p>
                <p>" . __('Check theme demo with <b>Extended Plugin</b>', 'chocowp') . " - <a target='_blank' href='https://www.zenith.team/choco/'>" . __('click here', 'chocowp') . "</a></p>
                <p>" . __('Check theme <b>FAQ</b>', 'chocowp') . " - <a target='_blank' href='https://zenith.team/faq/'>" . __('click here', 'chocowp') . "</a></p>
                <p>" . __('For custom development <b>contact us</b>', 'chocowp') . " - <a target='_blank' href='https://zenith.team/contact/'>" . __('click here', 'chocowp') . "</a></p>
            </div>";
    }
}

if (!function_exists('choco_wp_so_custom_menu_page_import')) {
    function choco_wp_so_custom_menu_page_import(){
        echo "<h2>" . __('ChocoWP Import Demo', 'chocowp') . "</h2>
            <div>
                <p>" . __('Step 1: Install and <b>activate</b> all recommended plugins', 'chocowp') . "</p>
                <img style='max-width: 95%; border: 3px solid #000;' src='" . esc_url(get_template_directory_uri()) . "/import_steps/step_0.png' />
                <p>" . __('Step 2: download <b>Extended Theme Plugin</b>', 'chocowp') . " - <a target='_blank' href='https://zenith.team/chocowp-extended-plugin/'>" . __('click here', 'chocowp') . "</a></p>
                <p>" . __('Step 3: install downloaded plugin, to do it you need to navigate to <strong>Plugins -> Add New -> Upload Plugin</strong>, select Extended Theme Plugin and click <strong>Install Now</strong>', 'chocowp') . "</p>
                <img style='max-width: 95%; border: 3px solid #000;' src='" . esc_url(get_template_directory_uri()) . "/import_steps/step_1.png' />
                <p>" . __('Step 4: Install <strong>One Click Demo Import</strong> plugin', 'chocowp') . "</p>
                <img style='max-width: 95%; border: 3px solid #000;' src='" . esc_url(get_template_directory_uri()) . "/import_steps/step_2.png' />
                <p>" . __('Step 5: Activate both plugins you installed', 'chocowp') . "</p>
                <p>" . __('Step 6: Navigate to <strong>Appearance -> Import Demo Data</strong> and click <strong>Import Demo Data</strong> button', 'chocowp') . "</p>
                <img style='max-width: 95%; border: 3px solid #000;' src='" . esc_url(get_template_directory_uri()) . "/import_steps/step_3.png' />
            </div>";  
    }
}

if (!function_exists('choco_wp_mySearchFilter')) {
    function choco_wp_mySearchFilter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        };
        return $query;
    }
}

if (!function_exists('choco_wp_so_cut_words')) {
    function choco_wp_so_cut_words($maxPos, $text) {
        
        if (strlen($text) > $maxPos + 4) {
            $lastPos = ($maxPos - 3) - strlen($text);
            $text = substr($text, 0, strrpos($text, ' ', $lastPos)) . '...';
        }

        return esc_html($text);
    }
}

if (!function_exists('choco_wp_theme_setup')) {
    function choco_wp_theme_setup() {

    	add_action('wp_enqueue_scripts', 'choco_wp_frontend_enqueue', 9000);

    	add_theme_support('post-thumbnails', array('post'));
    	add_theme_support('post-thumbnails');
    	add_theme_support('widgets');
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');

    	add_action('init', 'choco_wp_register_theme_menus');
        add_action('widgets_init', 'choco_wp_register_theme_sidebars');
        add_action('init', 'choco_wp_my_theme_customize_kirki');
        add_action('woocommerce_single_product_summary', 'choco_wp_product_title', 1);
        add_action('wp_head', 'choco_wp_customizer_style_tag' );
        add_action('admin_menu', 'choco_wp_register_custom_menu_page', 1);
        add_action('customize_register', 'choco_wp_theme_customize_register');
        add_action('after_setup_theme', 'choco_wp_load_language');

    	choco_wp_prefix_setup();

        add_filter('pre_get_posts','choco_wp_mySearchFilter');

    	require get_parent_theme_file_path('/admin/class-tgm-plugin-activation.php');
    	add_action('tgmpa_register', 'choco_wp_register_required_plugins');

    }
    add_action('after_setup_theme', 'choco_wp_theme_setup');
}

if (!function_exists('choco_wp_load_language')) {
    function choco_wp_load_language(){
        load_theme_textdomain('chocowp', esc_url(get_template_directory_uri()) . '/languages');
    }
}

if (!function_exists('choco_wp_frontend_enqueue')) {
    function choco_wp_frontend_enqueue() {

    	// CSS
    	wp_enqueue_style('choco_wp_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@200;600&family=Open+Sans&family=Poppins:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap');
    	wp_enqueue_style('choco_wp_fonts_awesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');

    	// Javascript Files
    	wp_enqueue_script('jquery');

    	wp_enqueue_style('choco_wp_css', get_template_directory_uri() . '/assets/style.css');
        wp_enqueue_style('choco_wp_selectric_css', get_template_directory_uri() . '/assets/css/selectric.css');

        if (is_singular()) {
            wp_enqueue_script("comment-reply");
        }

        wp_enqueue_script('choco_wp_selectric_js', get_template_directory_uri() . '/assets/js/jquery.selectric.js', array(), false, THEME_VERSION);
        wp_enqueue_script('choco_wp_waterwave_js', get_template_directory_uri() . '/assets/js/jquery.waterwave.js', array(), false, THEME_VERSION);

    	wp_register_script('choco_wp_main_js', get_template_directory_uri() . '/assets/js/main.js', array(), false, THEME_VERSION);
    	wp_localize_script( 'choco_wp_main_js', 'ex_loadmore_params', array(
    		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php',
    		'sort' => 'newness',
    		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
    		'page_url' => get_site_url(),
    		'home_url' => get_home_url(),
    		'page_name' => get_the_title(),
    		'user_id' => get_current_user_id(),
    		'template_path' => esc_url(get_template_directory_uri())
    	) );

    	wp_enqueue_script( 'choco_wp_main_js' );

    }
}

if (!function_exists('choco_wp_prefix_setup')) {
    function choco_wp_prefix_setup() {

    	add_theme_support( 'custom-logo', array(
    		'height' => 45,
    		'width' => 180,
    		'flex-width' => true,
    		'flex-height' => true
    	) );

    }
}

if (!function_exists('choco_wp_theme_prefix_the_custom_logo')) {
    function choco_wp_theme_prefix_the_custom_logo() {

    	if ( function_exists( 'the_custom_logo' ) ) {
    		the_custom_logo();
    	}

    }
}

if (!function_exists('choco_wp_current_url')) {
    function choco_wp_current_url() {
    	global $wp;
    	$current_url = home_url( add_query_arg( array(), $wp->request ) );
    	echo esc_url($current_url);
    }
}

if (!function_exists('choco_wp_menu')) {
    function choco_wp_menu($placement) {
    	
    	if ($placement === 'header-menu') {
    		wp_nav_menu(array(
    			'theme_location'  => 'header-menu',
    			'menu'            => '', 
    			'container'       => '', 
    			'container_class' => '', 
    			'container_id'    => '',
    			'menu_class'      => '', 
    			'menu_id'         => '',
    			'echo'            => 1,
    			'fallback_cb'     => '__return_false',
    			'before'          => '',
    			'after'           => '',
    			'link_before'     => '',
    			'link_after'      => '',
    			'items_wrap'      => '<ul>%3$s</ul>',
    			'depth'           => 0
    		));
    	}
    	else if ($placement === 'footer-menu-1') {
    		wp_nav_menu(array(
    			'theme_location'  => 'footer-menu-1',
    			'menu'            => '', 
    			'container'       => '', 
    			'container_class' => '', 
    			'container_id'    => '',
    			'menu_class'      => '', 
    			'menu_id'         => '',
    			'echo'            => 1,
    			'fallback_cb'     => '__return_false',
    			'before'          => '',
    			'after'           => '',
    			'link_before'     => '',
    			'link_after'      => '',
    			'items_wrap'      => '<ul class="so-footer-menu">%3$s</ul>',
    			'depth'           => 0
    		));
    	}
    	else if ($placement === 'footer-menu-2') {
    		wp_nav_menu(array(
    			'theme_location'  => 'footer-menu-2',
    			'menu'            => '', 
    			'container'       => '', 
    			'container_class' => '', 
    			'container_id'    => '',
    			'menu_class'      => '', 
    			'menu_id'         => '',
    			'echo'            => 1,
    			'fallback_cb'     => '__return_false',
    			'before'          => '',
    			'after'           => '',
    			'link_before'     => '',
    			'link_after'      => '',
    			'items_wrap'      => '<ul class="so-footer-menu">%3$s</ul>',
    			'depth'           => 0
    		));
    	}
    	else if ($placement === 'footer-menu-3') {
    		wp_nav_menu(array(
    			'theme_location'  => 'footer-menu-3',
    			'menu'            => '', 
    			'container'       => '', 
    			'container_class' => '', 
    			'container_id'    => '',
    			'menu_class'      => '', 
    			'menu_id'         => '',
    			'echo'            => 1,
    			'fallback_cb'     => '__return_false',
    			'before'          => '',
    			'after'           => '',
    			'link_before'     => '',
    			'link_after'      => '',
    			'items_wrap'      => '<ul class="so-footer-menu">%3$s</ul>',
    			'depth'           => 0
    		));
    	}

    }
}

if (!function_exists('choco_wp_register_theme_menus')) {
	function choco_wp_register_theme_menus() {
		register_nav_menus(array(
			'header-menu' => 'Header Menu',
			'footer-menu-1' => 'Footer Menu #1',
			'footer-menu-2' => 'Footer Menu #2',
			'footer-menu-3' => 'Footer Menu #3',
		));
	}
}

if (!function_exists(('choco_wp_register_theme_sidebars'))) {
    function choco_wp_register_theme_sidebars() {

        register_sidebar(array(
            'name'          => __( 'Blog Sidebar', 'chocowp' ),
            'id'            => 'blog-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));

        register_sidebar(array(
            'name'          => __( 'Shop Sidebar', 'chocowp' ),
            'id'            => 'shop-sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));

    }
}

if (!function_exists('choco_wp_register_required_plugins')) {

    function choco_wp_register_required_plugins() {

        $plugins = array(
            array(
                'name' => esc_html('Contact Form 7'),
                'slug' => 'contact-form-7',
                'required' => false
            ),
            array(
                'name' => esc_html('Woocommerce'),
                'slug' => 'woocommerce',
                'required' => false
            ),
            array(
                'name' => esc_html('Elementor'),
                'slug' => 'elementor',
                'required' => false
            ),
            array(
                'name' => esc_html('Rotate for Elementor'),
                'slug' => 'rotate-for-elementor',
                'required' => false
            ),
            array(
                'name' => esc_html('WP Instant Feeds'),
                'slug' => 'wp-my-instagram',
                'required' => false
            ),
            array(
                'name' => esc_html('Woocommerce Ajax Cart'),
                'slug' => 'woocommerce-ajax-cart',
                'required' => false
            ),
            array(
                'name' => esc_html('WooCommerce Stripe Gateway'),
                'slug' => 'woocommerce-gateway-stripe',
                'required' => false
            ),
            array(
                'name' => esc_html('Kirki Customizer Framework'),
                'slug' => 'kirki',
                'required' => false
            )
        );

        $config = array(
            'id' => 'chocowp',
            'default_path' => '',
            'menu' => 'tgmpa-install-plugins',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => false,
            'message' => '',
        );

        tgmpa($plugins, $config);
    }

}

if (!function_exists(('choco_wp_theme_slug_sanitize_radio'))) {
    function choco_wp_theme_slug_sanitize_radio( $input, $setting ){
        //radio box sanitization function
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible radio box options 
        $choices = $setting->manager->get_control( $setting->id )->choices;

        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                

    }
}

if (!function_exists(('choco_wp_theme_slug_sanitize_checkbox'))) {
    function choco_wp_theme_slug_sanitize_checkbox( $checked ) {
    // Boolean check.
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
}

// CUSTOMIZER KIRKI
if (!function_exists(('choco_wp_my_theme_customize_kirki'))) {
    function choco_wp_my_theme_customize_kirki() {

        if (is_plugin_active('kirki/kirki.php')) {

            Kirki::add_config( 'theme_config_id', array(
                'capability'    => 'edit_theme_options',
                'option_type'   => 'theme_mod',
            ) );

            if (is_plugin_active('woocommerce/woocommerce.php')) {

                $orderby = 'name';
                $order = 'asc';
                $hide_empty = false ;
                $cat_args = array(
                    'orderby'    => $orderby,
                    'order'      => $order,
                    'hide_empty' => $hide_empty,
                );

                $product_categories = get_terms( 'product_cat', $cat_args );
                $cats_select_arr = array();

                foreach ($product_categories as $key => $category) {
                    $cats_select_arr[$category->term_id] = $category->name;
                }

                $orderby = 'name';
                $order = 'asc';
                $hide_empty = false ;
                $cat_args = array(
                    'orderby'    => $orderby,
                    'order'      => $order,
                    'hide_empty' => $hide_empty,
                );

                $product_tags = get_terms( 'product_tag', $cat_args );
                $tags_select_arr = array();

                foreach ($product_tags as $key => $tag) {
                    $tags_select_arr[$tag->term_id] = $tag->name;
                }

                Kirki::add_field( 'theme_config_id', [
                    'type'        => 'repeater',
                    'label'       => esc_html__( 'Product Categories', 'chocowp' ),
                    'section'     => 'choco_wp_woo_cats',
                    'priority'    => 10,
                    'row_label' => [
                        'type'  => 'text',
                        'value' => esc_html__( 'Category', 'chocowp' ),
                    ],
                    'settings'     => 'choco_wp_woo_cats_repeater',
                    'button_label' => esc_html__('Add New', 'chocowp' ),
                    'fields' => [
                        'cat_image' => [
                            'type'        => 'image',
                            'label'       => esc_html__( 'Intro Background', 'chocowp' ),
                            'description' => esc_html__( 'Will be used for intro section on the category page', 'chocowp' ),
                            'default'     => '',
                        ],
                        'cat_id' => [
                            'type'        => 'select',
                            'label'       => esc_html__( 'Category', 'chocowp' ),
                            'placeholder' => esc_html__( 'Select category...', 'chocowp' ),
                            'multiple'    => false,
                            'choices'     => $cats_select_arr,
                        ]
                    ]
                ] );

                Kirki::add_field( 'theme_config_id', [
                    'type'        => 'repeater',
                    'label'       => esc_html__( 'Product Tags', 'chocowp' ),
                    'section'     => 'choco_wp_woo_tags',
                    'priority'    => 11,
                    'row_label' => [
                        'type'  => 'text',
                        'value' => esc_html__( 'Tag', 'chocowp' ),
                    ],
                    'settings'     => 'choco_wp_woo_tags_repeater',
                    'button_label' => esc_html__('Add New', 'chocowp' ),
                    'fields' => [
                        'cat_image' => [
                            'type'        => 'image',
                            'label'       => esc_html__( 'Intro Background', 'chocowp' ),
                            'description' => esc_html__( 'Will be used for intro section on the tag page', 'chocowp' ),
                            'default'     => '',
                        ],
                        'cat_id' => [
                            'type'        => 'select',
                            'label'       => esc_html__( 'Tag', 'chocowp' ),
                            'placeholder' => esc_html__( 'Select tag...', 'chocowp' ),
                            'multiple'    => false,
                            'choices'     => $tags_select_arr,
                        ]
                    ]
                ] );

            }

        }

    }
}

// CUSTOMIZER DEFAULT
if (!function_exists(('choco_wp_theme_customize_register'))) {
    function choco_wp_theme_customize_register( WP_Customize_Manager $wp_customize ) {

        // 404 Page

        $wp_customize->add_section('choco_wp_404_section', array(
            'title'    => esc_html__( '404 Page', 'chocowp' ),
            'priority' => 33
        ) );

        $wp_customize->add_setting( 'choco_wp_ill_404', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ) );

        $wp_customize->add_control(
            new WP_Customize_Image_Control( $wp_customize, 'choco_wp_ill_404', [
                'label'    => esc_html__( '404 Page Image', 'chocowp' ),
                'section'  => 'choco_wp_404_section',
                'settings' => 'choco_wp_ill_404'
            ] )
        );

        $wp_customize->add_setting('choco_wp_text_404', array(
            'default'   => esc_html__( 'Oops! Page Not Found', 'chocowp' ),
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_text_404', array(
            'label' => esc_html__( '404 Page Text', 'chocowp' ),
            'section' => 'choco_wp_404_section',
            'settings' => 'choco_wp_text_404',
            'type' => 'text',
        ));

        if (is_plugin_active('woocommerce/woocommerce.php')) {

            // Woocommerce - Other

            $wp_customize->add_section( 'choco_wp_woo_other' , array(
                'title' => esc_html__( 'Other', 'chocowp' ),
                'panel' => 'woocommerce',
            ) );

            $wp_customize->add_setting( 'choco_wp_ill_empty_cart', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw'
            ) );

            $wp_customize->add_control(
                new WP_Customize_Image_Control( $wp_customize, 'choco_wp_ill_empty_cart', [
                    'label'    => esc_html__( 'Empty Cart Image', 'chocowp' ),
                    'section'  => 'choco_wp_woo_other',
                    'settings' => 'choco_wp_ill_empty_cart'
                ] )
            );

            // Woocommerce - Categories and Tags

            if (is_plugin_active('kirki/kirki.php')) {

                $wp_customize->add_section( 'choco_wp_woo_cats' , array(
                    'title' => esc_html__( 'Product Categories', 'chocowp' ),
                    'panel' => 'woocommerce',
                ) );

                $wp_customize->add_section( 'choco_wp_woo_tags' , array(
                    'title' => esc_html__( 'Product Tags', 'chocowp' ),
                    'panel' => 'woocommerce',
                ) );

            }

            // Woocommerce - Order Received

            $wp_customize->add_section( 'choco_wp_woo_thankyou' , array(
                'title' => esc_html__( 'Order Received Page', 'chocowp' ),
                'panel' => 'woocommerce',
            ) );

            $wp_customize->add_setting( 'choco_wp_ill_success_order', array(
                'default' => '',
                'sanitize_callback' => 'esc_url_raw'
            ) );

            $wp_customize->add_control(
                new WP_Customize_Image_Control( $wp_customize, 'choco_wp_ill_success_order', [
                    'label'    => esc_html__( 'Order Success Image', 'chocowp' ),
                    'section'  => 'choco_wp_woo_thankyou',
                    'settings' => 'choco_wp_ill_success_order'
                ] )
            );

            // Woocommerce - Thank You

            $wp_customize->add_setting( 'choco_wp_woo_thankyou_info', array(
                'default' => true,
                'capability' => 'edit_theme_options',
                'sanitize_callback' => 'choco_wp_theme_slug_sanitize_checkbox'
            ) );

            $wp_customize->add_control( 'choco_wp_woo_thankyou_info', array(
                'label'      => esc_html__( 'Show Order Details', 'chocowp' ),
                'section'    => 'choco_wp_woo_thankyou',
                'settings'   => 'choco_wp_woo_thankyou_info',
                'type'       => 'checkbox',
            ) );

            // Woocommerce - Sidebar

            $wp_customize->add_section('choco_wp_woo_sidebar', array(
                'panel' => 'woocommerce',
                'title'    => esc_html__( 'Sidebar', 'chocowp' ),
                'priority' => 1
            ) );

            $wp_customize->add_setting( 'choco_wp_woo_sidebar_show', [
                'default'    =>  'true',
                'transport'  =>  'refresh',
                'sanitize_callback' => 'choco_wp_theme_slug_sanitize_checkbox'
            ] );

            $wp_customize->add_control( 'choco_wp_woo_sidebar_show', [
                'section' => 'choco_wp_woo_sidebar',
                'label'   => esc_html__( 'Show sidebar?', 'chocowp' ),
                'type'    => 'checkbox',
            ] );

            $wp_customize->add_setting( 'choco_wp_woo_sidebar_side', [
                'default'    =>  'right',
                'transport'  =>  'refresh',
                'sanitize_callback' => 'choco_wp_theme_slug_sanitize_radio'
            ] );

            $wp_customize->add_control( 'choco_wp_woo_sidebar_side', [
                'section' => 'choco_wp_woo_sidebar',
                'label'   => esc_html__( 'Sidebar position', 'chocowp' ),
                'type'    => 'radio',
                'choices' => array(
                    'left' => esc_html__( 'Left', 'chocowp' ),
                    'right' => esc_html__( 'Right', 'chocowp' ),
                ),
            ] );

        }

    	// Header [Mobile]

    	$wp_customize->add_section('choco_wp_header_mob_section', array(
            'title'    => esc_html__( 'Header [Mobile]', 'chocowp' ),
            'priority' => 31
        ) );

        // Header Mob - BG Color

    	$wp_customize->add_setting( 'choco_wp_header_mob_bg', [
    		'default'     => '#5A3F2E',
    		'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
    	] );

    	$wp_customize->add_control(
    		new WP_Customize_Color_Control( $wp_customize, 'choco_wp_header_mob_bg', [
    			'label'    => esc_html__( 'Background Color', 'chocowp' ),
    			'section'  => 'choco_wp_header_mob_section',
    			'settings' => 'choco_wp_header_mob_bg'
    		] )
    	);

    	// Header Button

    	$wp_customize->add_setting('choco_wp_header_mob_btn_link', array(
            'default'   => '#',
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_header_mob_btn_link', array(
        	'label' => esc_html__( 'Button Link', 'chocowp' ),
        	'section' => 'choco_wp_header_mob_section',
        	'settings' => 'choco_wp_header_mob_btn_link',
        	'type' => 'text',
        ));

        $wp_customize->add_setting('choco_wp_header_mob_btn_text', array(
            'default'   => esc_html__( 'Cart', 'chocowp' ),
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_header_mob_btn_text', array(
        	'label' => esc_html__( 'Button Text', 'chocowp' ),
        	'section' => 'choco_wp_header_mob_section',
        	'settings' => 'choco_wp_header_mob_btn_text',
        	'type' => 'text',
        ));

        // Color Palette 

        $wp_customize->add_section('choco_wp_color_section', array(
            'title'    => esc_html__( 'Color Palette [Inner pages]', 'chocowp' ),
            'priority' => 29
        ) );

        $wp_customize->add_setting( 'choco_wp_color_main', [
            'default'     => '#5A3F2E',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ] );

        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'choco_wp_color_main', [
                'label'    => esc_html__( 'Main Color', 'chocowp' ),
                'description' => esc_html__( 'Used for buttons, headers, prices, etc', 'chocowp' ),
                'section'  => 'choco_wp_color_section',
                'settings' => 'choco_wp_color_main'
            ] )
        );

        $wp_customize->add_setting( 'choco_wp_color_second', [
            'default'     => '#905B2E',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ] );

        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'choco_wp_color_second', [
                'label'    => esc_html__( 'Secondary Color', 'chocowp' ),
                'description' => esc_html__( 'Used for small details, dates etc. Should be similar to the main color.', 'chocowp' ),
                'section'  => 'choco_wp_color_section',
                'settings' => 'choco_wp_color_second'
            ] )
        );

        $wp_customize->add_setting( 'choco_wp_color_text', [
            'default'     => '#34302C',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ] );

        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'choco_wp_color_text', [
                'label'    => esc_html__( 'Text Color', 'chocowp' ),
                'description' => esc_html__( 'Used for big text blocks like posts and products content', 'chocowp' ),
                'section'  => 'choco_wp_color_section',
                'settings' => 'choco_wp_color_text'
            ] )
        );

        $wp_customize->add_setting( 'choco_wp_color_bg_menu', [
            'default'     => '#5A3F2E',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ] );

        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'choco_wp_color_bg_menu', [
                'label'    => esc_html__( 'Mobile Menu Background Color', 'chocowp' ),
                'section'  => 'choco_wp_color_section',
                'settings' => 'choco_wp_color_bg_menu'
            ] )
        );

        $wp_customize->add_setting( 'choco_wp_color_bg_menu_second', [
            'default'     => '#4d3627',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ] );

        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'choco_wp_color_bg_menu_second', [
                'label'    => esc_html__( 'Mobile Menu Background Color [Submenus]', 'chocowp' ),
                'section'  => 'choco_wp_color_section',
                'settings' => 'choco_wp_color_bg_menu_second'
            ] )
        );

        $wp_customize->add_setting( 'choco_wp_color_main_menu', [
            'default'     => '#ffffff',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ] );

        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'choco_wp_color_main_menu', [
                'label'    => esc_html__( 'Mobile Menu Links/Buttons Color', 'chocowp' ),
                'section'  => 'choco_wp_color_section',
                'settings' => 'choco_wp_color_main_menu'
            ] )
        );

    	// Footer

    	$wp_customize->add_section('choco_wp_footer_section', array(
            'title'    => esc_html__( 'Footer', 'chocowp' ),
            'priority' => 30
        ) );

    	// Footer - BG Color

    	$wp_customize->add_setting( 'choco_wp_footer_bg', [
    		'default'     => '#5A3F2E',
    		'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
    	] );

    	$wp_customize->add_control(
    		new WP_Customize_Color_Control( $wp_customize, 'choco_wp_footer_bg', [
    			'label'    => esc_html__( 'Background Color', 'chocowp' ),
    			'section'  => 'choco_wp_footer_section',
    			'settings' => 'choco_wp_footer_bg'
    		] )
    	);

        // Footer - Text Color

        $wp_customize->add_setting( 'choco_wp_footer_text_bg', [
            'default'     => '#fff',
            'transport'   => 'refresh',
            'sanitize_callback' => 'sanitize_hex_color'
        ] );

        $wp_customize->add_control(
            new WP_Customize_Color_Control( $wp_customize, 'choco_wp_footer_text_bg', [
                'label'    => esc_html__( 'Text Color', 'chocowp' ),
                'section'  => 'choco_wp_footer_section',
                'settings' => 'choco_wp_footer_text_bg'
            ] )
        );

    	// Footer - Text

        $wp_customize->add_setting('choco_wp_footer_setting_text', array(
            'default'   => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'chocowp' ),
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_setting_text', array(
        	'label' => esc_html__( 'Footer Text', 'chocowp' ),
        	'section' => 'choco_wp_footer_section',
        	'settings' => 'choco_wp_footer_setting_text',
        	'type' => 'textarea',
        ));

        $wp_customize->add_setting('choco_wp_footer_setting_cc', array(
            'default'   => esc_html__('© 2020 ChocoWP.', 'chocowp'),
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_setting_cc', array(
            'label' => esc_html__( 'Footer Copyright', 'chocowp' ),
            'section' => 'choco_wp_footer_section',
            'settings' => 'choco_wp_footer_setting_cc',
            'type' => 'text',
        ));

        // Footer - Soc Links

        $wp_customize->add_setting('choco_wp_footer_setting_inst_link', array(
            'default'   => '',
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_setting_inst_link', array(
        	'label' => esc_html__( 'Footer Instagram Link', 'chocowp' ),
        	'section' => 'choco_wp_footer_section',
        	'settings' => 'choco_wp_footer_setting_inst_link',
        	'type' => 'text',
        ));

        $wp_customize->add_setting('choco_wp_footer_setting_fb_link', array(
            'default'   => '',
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_setting_fb_link', array(
        	'label' => esc_html__( 'Footer Facebook Link', 'chocowp' ),
        	'section' => 'choco_wp_footer_section',
        	'settings' => 'choco_wp_footer_setting_fb_link',
        	'type' => 'text',
        ));

        $wp_customize->add_setting('choco_wp_footer_setting_tw_link', array(
            'default'   => '',
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_setting_tw_link', array(
        	'label' => esc_html__( 'Footer Twitter Link', 'chocowp' ),
        	'section' => 'choco_wp_footer_section',
        	'settings' => 'choco_wp_footer_setting_tw_link',
        	'type' => 'text',
        ));

        $wp_customize->add_setting('choco_wp_footer_setting_tw_link', array(
            'default'   => '',
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_setting_tw_link', array(
        	'label' => esc_html__( 'Footer Twitter Link', 'chocowp' ),
        	'section' => 'choco_wp_footer_section',
        	'settings' => 'choco_wp_footer_setting_tw_link',
        	'type' => 'text',
        ));

        // Footer - Menu Headers

        $wp_customize->add_setting('choco_wp_footer_menu_header_1', array(
            'default' => esc_html__( 'Navigation', 'chocowp' ),
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_menu_header_1', array(
        	'label' => esc_html__( 'Footer Header #1', 'chocowp' ),
        	'section' => 'choco_wp_footer_section',
        	'settings' => 'choco_wp_footer_menu_header_1',
        	'type' => 'text',
        ));

        $wp_customize->add_setting('choco_wp_footer_menu_header_2', array(
            'default' => esc_html__( 'Shop', 'chocowp' ),
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_menu_header_2', array(
        	'label' => esc_html__( 'Footer Header #2', 'chocowp' ),
        	'section' => 'choco_wp_footer_section',
        	'settings' => 'choco_wp_footer_menu_header_2',
        	'type' => 'text',
        ));

        $wp_customize->add_setting('choco_wp_footer_menu_header_3', array(
            'default' => esc_html__( 'Help', 'chocowp' ),
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_footer_menu_header_3', array(
        	'label' => esc_html__( 'Footer Header #3', 'chocowp' ),
        	'section' => 'choco_wp_footer_section',
        	'settings' => 'choco_wp_footer_menu_header_3',
        	'type' => 'text',
        ));

        // Blog

        $wp_customize->add_panel('choco_wp_blog_panel', array(
            'title'    => esc_html__( 'Single Post', 'chocowp' ),
            'priority' => 34
        ) );

        // Blog - Settings

        $wp_customize->add_section('choco_wp_blog_sidebar', array(
            'panel' => 'choco_wp_blog_panel',
            'title'    => esc_html__( 'Settings', 'chocowp' ),
            'priority' => 1
        ) );

        $wp_customize->add_setting( 'choco_wp_blog_sidebar_show', [
            'default'    =>  'true',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_checkbox'
        ] );

        $wp_customize->add_control( 'choco_wp_blog_sidebar_show', [
            'section' => 'choco_wp_blog_sidebar',
            'label'   => esc_html__( 'Show sidebar?', 'chocowp' ),
            'type'    => 'checkbox',
        ] );

        $wp_customize->add_setting( 'choco_wp_blog_sidebar_side', [
            'default'    =>  'right',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_radio'
        ] );

        $wp_customize->add_control( 'choco_wp_blog_sidebar_side', [
            'section' => 'choco_wp_blog_sidebar',
            'label'   => esc_html__( 'Sidebar position', 'chocowp' ),
            'type'    => 'radio',
            'choices' => array(
                'left' => esc_html__( 'Left', 'chocowp' ),
                'right' => esc_html__( 'Right', 'chocowp' ),
            ),
        ] );

        // Pages

        $wp_customize->add_panel('choco_wp_page_panel', array(
            'title'    => esc_html__( 'Simple Page', 'chocowp' ),
            'priority' => 34
        ) );

        // Pages - Sidebar

        $wp_customize->add_section('choco_wp_page_sidebar', array(
            'panel' => 'choco_wp_page_panel',
            'title'    => esc_html__( 'Sidebar', 'chocowp' ),
            'priority' => 1
        ) );

        $wp_customize->add_setting( 'choco_wp_page_sidebar_show', [
            'default'    =>  'true',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_checkbox'
        ] );

        $wp_customize->add_control( 'choco_wp_page_sidebar_show', [
            'section' => 'choco_wp_page_sidebar',
            'label'   => esc_html__( 'Show sidebar?', 'chocowp' ),
            'type'    => 'checkbox',
        ] );

        $wp_customize->add_setting( 'choco_wp_page_sidebar_side', [
            'default'    =>  'right',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_radio'
        ] );

        $wp_customize->add_control( 'choco_wp_page_sidebar_side', [
            'section' => 'choco_wp_page_sidebar',
            'label'   => esc_html__( 'Sidebar position', 'chocowp' ),
            'type'    => 'radio',
            'choices' => array(
                'left' => esc_html__( 'Left', 'chocowp' ),
                'right' => esc_html__( 'Right', 'chocowp' ),
            ),
        ] );

        // Archives

        $wp_customize->add_panel('choco_wp_archive_panel', array(
            'title'    => esc_html__( 'Archive', 'chocowp' ),
            'priority' => 34
        ) );

        // Archives - Sidebar

        $wp_customize->add_section('choco_wp_archive_sidebar', array(
            'panel' => 'choco_wp_archive_panel',
            'title'    => esc_html__( 'Settings', 'chocowp' ),
            'priority' => 1
        ) );

        $wp_customize->add_setting( 'choco_wp_archive_sidebar_show', [
            'default'    =>  'true',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_checkbox'
        ] );

        $wp_customize->add_control( 'choco_wp_archive_sidebar_show', [
            'section' => 'choco_wp_archive_sidebar',
            'label'   => esc_html__( 'Show sidebar?', 'chocowp' ),
            'type'    => 'checkbox',
        ] );

        $wp_customize->add_setting( 'choco_wp_archive_sidebar_side', [
            'default'    =>  'right',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_radio'
        ] );

        $wp_customize->add_control( 'choco_wp_archive_sidebar_side', [
            'section' => 'choco_wp_archive_sidebar',
            'label'   => esc_html__( 'Sidebar position', 'chocowp' ),
            'type'    => 'radio',
            'choices' => array(
                'left' => esc_html__( 'Left', 'chocowp' ),
                'right' => esc_html__( 'Right', 'chocowp' ),
            ),
        ] );

        $wp_customize->add_setting( 'choco_wp_archive_image', array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw'
        ) );

        $wp_customize->add_control(
            new WP_Customize_Image_Control( $wp_customize, 'choco_wp_archive_image', [
                'label'    => esc_html__( 'Intro Image', 'chocowp' ),
                'section'  => 'choco_wp_archive_sidebar',
                'settings' => 'choco_wp_archive_image'
            ] )
        );

        $wp_customize->add_setting('choco_wp_archive_read_text', array(
            'default'   => esc_html__( 'Read More', 'chocowp' ),
            'sanitize_callback'  => 'sanitize_text_field',
            'transport' => 'refresh',
        ) );

        $wp_customize->add_control('choco_wp_archive_read_text', array(
            'label' => esc_html__( '"Read More" Text', 'chocowp' ),
            'section' => 'choco_wp_archive_sidebar',
            'settings' => 'choco_wp_archive_read_text',
            'type' => 'text',
        ));

        $wp_customize->add_setting( 'choco_wp_archive_show_date', [
            'default'    =>  'true',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_checkbox'
        ] );

        $wp_customize->add_control( 'choco_wp_archive_show_date', [
            'section' => 'choco_wp_archive_sidebar',
            'label'   => esc_html__( 'Show post date?', 'chocowp' ),
            'type'    => 'checkbox',
        ] );

        $wp_customize->add_setting( 'choco_wp_archive_show_excerpt', [
            'default'    =>  'true',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_checkbox'
        ] );

        $wp_customize->add_control( 'choco_wp_archive_show_excerpt', [
            'section' => 'choco_wp_archive_sidebar',
            'label'   => esc_html__( 'Show post short description?', 'chocowp' ),
            'type'    => 'checkbox',
        ] );

        $wp_customize->add_setting( 'choco_wp_archive_excerpt_length', [
            'default'    =>  80,
            'transport'  =>  'refresh',
            'sanitize_callback' => 'absint'
        ] );

        $wp_customize->add_control( 'choco_wp_archive_excerpt_length', [
            'section' => 'choco_wp_archive_sidebar',
            'label'   => esc_html__( 'Post short description length', 'chocowp' ),
            'type'    => 'number',
        ] );

        $wp_customize->add_setting( 'choco_wp_archive_show_more', [
            'default'    =>  'true',
            'transport'  =>  'refresh',
            'sanitize_callback' => 'choco_wp_theme_slug_sanitize_checkbox'
        ] );

        $wp_customize->add_control( 'choco_wp_archive_show_more', [
            'section' => 'choco_wp_archive_sidebar',
            'label'   => esc_html__( 'Show "Read More"?', 'chocowp' ),
            'type'    => 'checkbox',
        ] );

    }
}

if (!function_exists(('choco_wp_customizer_style_tag'))) {
    function choco_wp_customizer_style_tag(){

    	$style = [];

    	$style[] = '.so-footer { background-color: ' . esc_html(get_theme_mod( 'choco_wp_footer_bg' )) . '; }';
        $style[] = '.so-footer *, .so-footer h6, .so-footer .so-footer-menu li a, .so-footer .so-row:last-child p {color: ' . esc_html(get_theme_mod( 'choco_wp_footer_text_bg' )) . ' !important; }';
        $style[] = '.so-footer .so-footer-menu li a:after {background-color: ' . esc_html(get_theme_mod( 'choco_wp_footer_text_bg' )) . ' !important; }';
    	$style[] = '.so-header-mob_slide { background-color: ' . esc_html(get_theme_mod( 'choco_wp_header_mob_bg' )) . '; }';
    	$style[] = '.so-plus i { background-color: ' . esc_html(get_theme_mod( 'choco_wp_header_mob_bg' )) . '; }';

        $style[] = '.so-footer-soc a {border-color: ' . esc_html(get_theme_mod( 'choco_wp_footer_text_bg' )) . ' !important; }';
        $style[] = '.so-footer-soc a:hover, .so-footer-soc a:focus {background-color: ' . esc_html(get_theme_mod( 'choco_wp_footer_text_bg' )) . ' !important; }';
        $style[] = '.so-footer-soc a:hover i, .so-footer-soc a:focus i {color: ' . esc_html(get_theme_mod( 'choco_wp_footer_bg' )) . ' !important; }';

        $style[] = 'body:not(.elementor-page) .woocommerce-product-details__short-description *, body:not(.elementor-page) .product_meta *, .woocommerce-Tabs-panel p *, .woocommerce-Tabs-panel li *, .woocommerce-Tabs-panel p, .woocommerce-Tabs-panel li, body .so-page .so-row-comment .comment-form > p *:not(.submit), input:not(.submit), textarea, .woocommerce table.shop_attributes th, .woocommerce div.product form.cart .woocommerce-variation-description p, .woocommerce div.product form.cart .variations label, body .woocommerce table.shop_attributes th, body .woocommerce table.shop_attributes td, .woocommerce-checkout-payment *:not(.button), .woocommerce-error *:not(.button), .woocommerce-info *:not(.button), .woocommerce-message *:not(.button), .woocommerce .checkout .col2-set .select2-container--default .select2-selection--single .select2-selection__rendered, .woocommerce-store-notice, .woocommerce-store-notice *, .so-page-sidebar button, .so-page-sidebar input[type="submit"] { color: ' . esc_html(get_theme_mod( 'choco_wp_color_text' )) . ' !important; }';

        $style[] = 'body:not(.elementor-page) .so-page-main div, body:not(.elementor-page) .so-page-main span, body:not(.elementor-page) .so-page-main applet, body:not(.elementor-page) .so-page-main object, body:not(.elementor-page) .so-page-main iframe, body:not(.elementor-page) .so-page-main p, body:not(.elementor-page) .so-page-main blockquote, body:not(.elementor-page) .so-page-main pre, body:not(.elementor-page) .so-page-main a, body:not(.elementor-page) .so-page-main abbr, body:not(.elementor-page) .so-page-main acronym, body:not(.elementor-page) .so-page-main address, body:not(.elementor-page) .so-page-main big, body:not(.elementor-page) .so-page-main cite, body:not(.elementor-page) .so-page-main code, body:not(.elementor-page) .so-page-main del, body:not(.elementor-page) .so-page-main dfn, body:not(.elementor-page) .so-page-main em, body:not(.elementor-page) .so-page-main img, body:not(.elementor-page) .so-page-main ins, body:not(.elementor-page) .so-page-main kbd, body:not(.elementor-page) .so-page-main q, body:not(.elementor-page) .so-page-main s, body:not(.elementor-page) .so-page-main samp, body:not(.elementor-page) .so-page-main small, body:not(.elementor-page) .so-page-main strike, body:not(.elementor-page) .so-page-main strong, body:not(.elementor-page) .so-page-main sub, body:not(.elementor-page) .so-page-main sup, body:not(.elementor-page) .so-page-main tt, body:not(.elementor-page) .so-page-main var, body:not(.elementor-page) .so-page-main b, body:not(.elementor-page) .so-page-main u, body:not(.elementor-page) .so-page-main center, body:not(.elementor-page) .so-page-main dl, body:not(.elementor-page) .so-page-main dt, body:not(.elementor-page) .so-page-main dd, body:not(.elementor-page) .so-page-main ol, body:not(.elementor-page) .so-page-main ul, body:not(.elementor-page) .so-page-main li, body:not(.elementor-page) .so-page-main fieldset, body:not(.elementor-page) .so-page-main form, body:not(.elementor-page) .so-page-main label, body:not(.elementor-page) .so-page-main legend, body:not(.elementor-page) .so-page-main table, body:not(.elementor-page) .so-page-main caption, body:not(.elementor-page) .so-page-main tbody, body:not(.elementor-page) .so-page-main tfoot, body:not(.elementor-page) .so-page-main thead, body:not(.elementor-page) .so-page-main tr, body:not(.elementor-page) .so-page-main th, body:not(.elementor-page) .so-page-main td, body:not(.elementor-page) .so-page-main article, body:not(.elementor-page) .so-page-main aside, body:not(.elementor-page) .so-page-main canvas, body:not(.elementor-page) .so-page-main details, body:not(.elementor-page) .so-page-main embed, body:not(.elementor-page) .so-page-main figure, body:not(.elementor-page) .so-page-main figcaption, body:not(.elementor-page) .so-page-main footer, body:not(.elementor-page) .so-page-main header, body:not(.elementor-page) .so-page-main hgroup, body:not(.elementor-page) .so-page-main menu, body:not(.elementor-page) .so-page-main nav, body:not(.elementor-page) .so-page-main output, body:not(.elementor-page) .so-page-main ruby, body:not(.elementor-page) .so-page-main section, body:not(.elementor-page) .so-page-main summary, body:not(.elementor-page) .so-page-main time, body:not(.elementor-page) .so-page-main mark, body:not(.elementor-page) .so-page-main audio, body:not(.elementor-page) .so-page-main video, body:not(.elementor-page) .so-page-main input, body:not(.elementor-page) .so-page-main textarea, body:not(.elementor-page) .so-content-comment * {color: ' . esc_html(get_theme_mod( 'choco_wp_color_text' )) . '; } ';

        if (get_theme_mod( 'choco_wp_color_main' )) {
            $main_rgba = choco_wp_hex2rgb(get_theme_mod( 'choco_wp_color_main' ));
            $style[] = '.woocommerce .woocommerce-cart-form table.shop_table .product-remove a.remove, .selectric, .selectric-items li.selected, .selectric-items li.highlighted, .woocommerce div.product .woocommerce-tabs ul.tabs li:not(.active), .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce-checkout-payment, .woocommerce-checkout-payment .payment_box, .woocommerce .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .woocommerce-MyAccount-navigation ul li a:focus, .woocommerce-pagination .current, .woocommerce-pagination a:hover, .nav-links .current, .nav-links *:hover, body .so-page-sidebar, .so-single-cats a, body .so-page .so-content-comment, .so-header ul li .sub-menu li a:hover, .so-header ul li .sub-menu li a:focus, .so-page-sidebar ul li a:hover, .so-page-sidebar ul li a:focus {background-color: rgba(' . $main_rgba[0] . ',' . $main_rgba[1] . ',' . $main_rgba[2] . ', 0.2) !important; } ';

            $style[] = '.selectric, .selectric-items, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs ul.tabs::before, .woocommerce div.product .woocommerce-tabs ul.tabs li::after, .woocommerce div.product .woocommerce-tabs ul.tabs li::before, .select2-container--default .select2-selection--single {border-color: rgba(' . $main_rgba[0] . ',' . $main_rgba[1] . ',' . $main_rgba[2] . ', 0.2) !important; } ';
        }

        $style[] = '.woocommerce button.button, .woocommerce a.button, body .woocommerce .product .onsale, .woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce a.button:hover, .woocommerce a.button:focus, body .so-page .comment-respond .submit, .so-button, .woocommerce .woocommerce-cart-form table.shop_table .quantity .wac-qty-button, .select2-container--default .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-results__option--highlighted[data-selected],
.select2-container--default .select2-results__option[aria-selected=true], .select2-container--default .select2-results__option[data-selected=true], body:not(.elementor-page) .so-blog_archive-single-more:before, .wpcf7-response-output, .woocommerce-store-notice, .so-page-sidebar button, .so-page-sidebar input[type="submit"] { background-color: ' . esc_html(get_theme_mod( 'choco_wp_color_main' )) . ' !important; }';

        $style[] = 'body .woocommerce .product .price *, body .woocommerce .product .price, body .woocommerce .product h2, .woocommerce-result-count, .woocommerce-error:before, .woocommerce-info:before, .woocommerce-message:before, .woocommerce-error, .woocommerce-info, .woocommerce-message, body:not(.elementor-page) .so-page .h1, body:not(.elementor-page) .so-page h2, body:not(.elementor-page) .so-page h3, body:not(.elementor-page) .so-page h4, body:not(.elementor-page) .so-page h5, body:not(.elementor-page) .so-page h6, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce table.shop_table th, .woocommerce-cart-form__cart-item .product-price:before, .woocommerce-cart-form__cart-item .product-price *, .woocommerce-cart-form__cart-item .product-quantity:before, .woocommerce-cart-form__cart-item .product-subtotal:before, .woocommerce-cart-form__cart-item .product-subtotal *, .woocommerce-cart-form__cart-item .product-name:before, .woocommerce-cart-form__cart-item .product-name *, .woocommerce .cart_totals h2, .woocommerce .woocommerce-cart-form table.shop_table .quantity .wac-qty-button, .woocommerce .woocommerce-cart-form table.shop_table .product-remove a.remove, .cart_totals td *, .cart_totals td:before, .selectric .label, .selectric .button, .selectric-items li, .woocommerce-checkout #order_review_heading, .woocommerce-checkout .shop_table *, .col2-set label, .col2-set h3, .so-checkout-order-done *:not(.so-button), .so-header ul li .sub-menu li a, .woocommerce-MyAccount-content *, .woocommerce-MyAccount-navigation *, .woocommerce-account .woocommerce *:not(.button), body:not(.elementor-page) .so-blog_archive-single p, body:not(.elementor-page) .so-blog_archive-single-more, .woocommerce-pagination *, .nav-links *, body.single-post:not(.elementor-page) .so-page-main h1, body.single-post:not(.elementor-page) .so-page-main h2, body.single-post:not(.elementor-page) .so-page-main h3, body.single-post:not(.elementor-page) .so-page-main h4, body.single-post:not(.elementor-page) .so-page-main h5, body.single-post:not(.elementor-page) .so-page-main h6, body.page:not(.elementor-page) .so-page-main h1, body.page:not(.elementor-page) .so-page-main h2, body.page:not(.elementor-page) .so-page-main h3, body.page:not(.elementor-page) .so-page-main h4, body.page:not(.elementor-page) .so-page-main h5, body.page:not(.elementor-page) .so-page-main h6, .so-single-cats *, .so-single-tags, .so-single-tags *, .so-single-user-data *, .so-form-row label, .so-form h1, .so-form h2, .so-form h3, .so-form h4, .so-form h5, .so-form h6, .so-page-sidebar ul li a, .so-page-sidebar ul li { color: ' . esc_html(get_theme_mod( 'choco_wp_color_main' )) . ' !important; }';

        $style[] = '.so-single-cats a:hover, .so-single-cats a:focus { color: #fff !important; background-color: ' . esc_html(get_theme_mod( 'choco_wp_color_main' )) . ' !important; }';

        $style[] = '.select2-container--default .select2-results__option, .select2-container--default .select2-results__option { color: ' . esc_html(get_theme_mod( 'choco_wp_color_main' )) . '; }';

        $style[] = '.woocommerce-error, .woocommerce-info, .woocommerce-message { border-top-color: ' . esc_html(get_theme_mod( 'choco_wp_color_main' )) . ' !important; }';

        $style[] = 'input, textarea, .select2-container--open .select2-dropdown--below, body.single-post .so-page .so-row .so-page-main .wp-block-quote, body.single-post .so-page .so-row .so-page-main blockquote, body.single-post .so-page .so-row .so-page-main q, body.single-post .so-page .commentlist .comment-body .wp-block-quote, body.single-post .so-page .commentlist .comment-body blockquote, body.single-post .so-page .commentlist .comment-body q, body.single-recipe .so-page .so-row .so-page-main .wp-block-quote, body.single-recipe .so-page .so-row .so-page-main blockquote, body.single-recipe .so-page .so-row .so-page-main q, body.single-recipe .so-page .commentlist .comment-body .wp-block-quote, body.single-recipe .so-page .commentlist .comment-body blockquote, body.single-recipe .so-page .commentlist .comment-body q, body.page-template-default .so-page .so-row .so-page-main .wp-block-quote, body.page-template-default .so-page .so-row .so-page-main blockquote, body.page-template-default .so-page .so-row .so-page-main q, body.page-template-default .so-page .commentlist .comment-body .wp-block-quote, body.page-template-default .so-page .commentlist .comment-body blockquote, body.page-template-default .so-page .commentlist .comment-body q, body .so-page-sidebar .recentcomments a { border-color: ' . esc_html(get_theme_mod( 'choco_wp_color_main' )) . ' !important; }';

        $style[] = 'body:not(.elementor-page) .so-blog_archive-single-date { color: ' . esc_html(get_theme_mod( 'choco_wp_color_second' )) . ' !important; }';

        $style[] = '.so-header-mob_slide, .so-header-mob_slide-menu ul li a .so-plus i { background-color: ' . esc_html(get_theme_mod( 'choco_wp_color_bg_menu' )) . ' !important; } ';

        $style[] = '.so-header-mob_slide-menu .sub-menu, .so-header-mob_slide-menu .sub-menu li a { background-color: ' . esc_html(get_theme_mod( 'choco_wp_color_bg_menu_second' )) . ' !important; } ';

        $style[] = '.so-header-button  { color: ' . esc_html(get_theme_mod( 'choco_wp_color_bg_menu' )) . ' !important; } ';

        $style[] = '.so-header-mob_slide-menu ul li a  { color: ' . esc_html(get_theme_mod( 'choco_wp_color_main_menu' )) . ' !important; } ';

        $style[] = '.so-header-button, .so-header-mob_slide-menu ul li a .so-plus { background-color: ' . esc_html(get_theme_mod( 'choco_wp_color_main_menu' )) . ' !important; } ';

    	echo "<style>\n" . implode( "\n", $style ) . "\n</style>\n";
    }
}


// Woocommerce
if (!function_exists(('choco_wp_product_title'))) {
    function choco_wp_product_title() {
        echo '<h2>' . esc_html(get_the_title()) . '</h2>';
    }
}

if (!function_exists(('choco_wp_hex2rgb'))) {
    function choco_wp_hex2rgb($hex) {
        $hex = str_replace("#", "", $hex);

         if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
        } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
        }
        return array($r, $g, $b); // RETURN ARRAY INSTEAD OF STRING
    }
}


?>