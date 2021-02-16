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

    /* Adicionando suporte ao tema */
    $args = array(
        'height'    => 225,
        'width'     => 1920
    );
    add_theme_support( 'custom-header', $args );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'post-formats', array( 'video', 'image' ) );
}
add_action( 'after_setup_theme', 'wpcurso_config', 0);

add_action( 'widgets_init', 'wpcurso_sidebars' );

function wpcurso_sidebars(){
    register_sidebar(
        array(
            'name' => 'Home Page Sidebar',
            'id' => 'sidebar-1',//? id tem que ser único
            'description' => 'Sidebar to be used on Home Page',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'sidebar-2', //? id tem que ser único
            'description' => 'Sidebar to be used on Blog Page',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
}