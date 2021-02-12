<?php
function ap_theme_styles(){
    wp_enqueue_style('theme_css', get_template_directory_uri().'/assets/css/theme.css'); //? serve para adicionar css

    wp_enqueue_script('theme_js', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '', true); //? serve para adicionar js
}

add_action('wp_enqueue_scripts', 'ap_theme_styles');

?>