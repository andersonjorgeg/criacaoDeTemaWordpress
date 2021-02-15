<?php

// carregando nossos scripts e folhas de estilos
function load_scripts() {
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js', array(), '5.0.0', true );
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css', array(), '5.0.0', 'all' );
    wp_enqueue_style( 'template', get_template_directory_uri() . '/css/template.css', array(), '1.0', 'all' );
}

add_action( 'wp_enqueue_scripts', 'load_scripts');


// Função de configuração do Tema 
function wpcurso_config(){
    //registrando nosso menu
    register_nav_menus(
        array(
            'my_main_menu' => 'Main Menu',
            'footer_menu' => 'Footer Menu'
        )
    );

    $args = array(
        'height'    => 225,
        'width'     => 1920
    );
    add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'wpcurso_config', 0);