<?php 

if (!is_active_sidebar('shop-sidebar') || !get_theme_mod('choco_wp_woo_sidebar_show')) {
	return;
}

?>

<?php dynamic_sidebar( 'shop-sidebar' ); ?>