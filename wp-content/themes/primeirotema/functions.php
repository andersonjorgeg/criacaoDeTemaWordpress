<?php

//? está pegando as funções que estão na pasta include
require get_template_directory().'/include/setup.php'; 

//? hooks
add_action('wp_enqueue_scripts', 'ap_theme_styles');
add_action('after_setup_theme', 'ap_after_setup');
add_action('widgets_init', 'ap_widgets');

?>