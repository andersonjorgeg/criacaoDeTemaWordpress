<?php 

if (!is_active_sidebar('blog-sidebar')) {
	return;
}

?>

<?php dynamic_sidebar( 'blog-sidebar' ); ?>