<?php
function ap_theme_styles()
{
    wp_enqueue_style('theme_css', get_template_directory_uri().'/assets/css/theme.css'); //? serve para adicionar css

    wp_enqueue_script('theme_js', get_template_directory_uri().'/assets/js/script.js', array('jquery'), '', true); //? serve para adicionar js
}


function ap_after_setup() {
    //? habilitando o menu
    add_theme_support('menus');

    //? registrando o local do menu.
    register_nav_menu('primary', __('Primary Menu', 'primeirotema'));
}

function ap_widgets(){
    //? registrar sidebar
    register_sidebar(array(
        'name' => __('Meu Primeiro Sidebar', 'primeirotema'),
        'id' => 'ap_sidebar',
        'description' => __('Sidebar para o tema', 'primeirotema'),

        //? alterar titulo do sidebar
        'before_title' => '<h4 class="widget_title">',
        'after_title' => '</h4>',

        //? altera o <li> do sidebar
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>'
    ));
}

?>