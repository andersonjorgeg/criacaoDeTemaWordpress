<?php 

get_header();

global $wp_query;
$intro_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );

if (is_plugin_active('kirki/kirki.php') && is_plugin_active('woocommerce/woocommerce.php')) {

	if (is_product_category() || is_product_tag()) {
		$intro_image_url = get_theme_mod('choco_wp_archive_image');
	}

	if (is_product_category()) {
		$queried_object = get_queried_object();
		$bg_kirki_repeater = get_theme_mod( 'choco_wp_woo_cats_repeater' );

		foreach ($bg_kirki_repeater as $single_cat) {

			if ($queried_object->term_id === (int)$single_cat['cat_id']) {
				$intro_image_url = wp_get_attachment_url( (int)$single_cat['cat_image'], 'full' );
			}

		}
	}

	if (is_product_tag()) {
		$queried_object = get_queried_object();
		$bg_kirki_repeater = get_theme_mod( 'choco_wp_woo_tags_repeater' );

		foreach ($bg_kirki_repeater as $single_tag) {

			if ($queried_object->term_id === (int)$single_tag['cat_id']) {
				$intro_image_url = wp_get_attachment_url( (int)$single_tag['cat_image'], 'full' );
			}

		}
	}

}

if ($intro_image_url === '' || !$intro_image_url) {
	$intro_image_url = esc_url(get_template_directory_uri()) . '/assets/img/default_intro.jpg';
}

?>

<div class="so-intro" style="background-image: url(<?php echo esc_url($intro_image_url); ?>);">
	<div class="so-content">
		<div class="so-row">
			<h1><?php the_title(); ?></h1>
			<canvas class="so-intro-shape"></canvas>
		</div>
	</div>
</div>

<div class="so-page" id="so-main">

	<?php if (have_posts()) : ?>
			
	<?php
		while ( have_posts() ) :

			the_post();

			echo '<div class="so-content"><div class="so-row-main so-row">';

			if (is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page()) {
				if (get_theme_mod('choco_wp_woo_sidebar_show') && get_theme_mod('choco_wp_woo_sidebar_side') === 'left') {
					echo "<div class='so-page-sidebar-left so-page-sidebar'>";
					get_sidebar('product');
					echo "</div>";
				}
			}
			else {
				if (get_theme_mod('choco_wp_page_sidebar_show') && get_theme_mod('choco_wp_page_sidebar_side') === 'left') {
					echo "<div class='so-page-sidebar-left so-page-sidebar'>";
					get_sidebar();
					echo "</div>";
				}
			}

			echo "<div class='so-page-main'>";
			the_content();

			wp_link_pages();

			echo "</div>";

			if (is_woocommerce() && !is_cart() && !is_checkout() && !is_account_page()) {
				if (get_theme_mod('choco_wp_woo_sidebar_show') && get_theme_mod('choco_wp_woo_sidebar_side') === 'right') {
					echo "<div class='so-page-sidebar-right so-page-sidebar'>";
					get_sidebar('product');
					echo "</div>";
				}
			}
			else {
				if (get_theme_mod('choco_wp_page_sidebar_show') && get_theme_mod('choco_wp_page_sidebar_side') === 'right') {
					echo "<div class='so-page-sidebar-right so-page-sidebar'>";
					get_sidebar();
					echo "</div>";
				}
			}

			echo '</div></div>';

			if ( comments_open() || get_comments_number() ) {
				echo '<div class="so-content-comment so-content"><div class="so-row-comment so-row">';
				comments_template();
				echo '</div></div>';
			}

		endwhile;
	?>

	<?php endif; ?>

</div>

<?php get_footer(); ?>