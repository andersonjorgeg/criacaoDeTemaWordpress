<?php 

get_header();

global $wp_query;
$intro_image_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );

if (!$intro_image_url) {
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

<div <?php post_class('so-page'); ?> id="so-main">

	<?php if (have_posts()) : ?>
			
		<?php
			while ( have_posts() ) :
				the_post();

				echo '<div class="so-content"><div class="so-row-main so-row">';

				if (function_exists('is_product') && is_product()) {

					if (get_theme_mod('choco_wp_woo_sidebar_show') && get_theme_mod('choco_wp_woo_sidebar_side') === 'left') {
						echo "<div class='so-page-sidebar-left so-page-sidebar'>";
						get_sidebar('product');
						echo "</div>";
					}

				}
				elseif (get_theme_mod('choco_wp_blog_sidebar_show') && get_theme_mod('choco_wp_blog_sidebar_side') === 'left') {
					echo "<div class='so-page-sidebar-left so-page-sidebar'>";
					get_sidebar();
					echo "</div>";
				}
				
				echo "<div class='so-page-main'>";
				the_content();

				wp_link_pages();

				if (is_singular('post')) {
					get_template_part( 'templates/parts/author', '' );
				}

				echo "</div>";

				if (function_exists('is_product') && is_product()) {

					if (get_theme_mod('choco_wp_woo_sidebar_show') && get_theme_mod('choco_wp_woo_sidebar_side') === 'right') {
						echo "<div class='so-page-sidebar-left so-page-sidebar'>";
						get_sidebar('product');
						echo "</div>";
					}

				}
				elseif (get_theme_mod('choco_wp_blog_sidebar_show') && get_theme_mod('choco_wp_blog_sidebar_side') === 'right') {
					echo "<div class='so-page-sidebar-right so-page-sidebar'>";
					get_sidebar();
					echo "</div>";
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
</div>

<?php 
$next_post = get_next_post();
$prev_post = get_previous_post();
$single_nav = '';

if ($next_post === '' || $prev_post === '') {
	$single_nav = 'single-nav';	
}

if ($next_post != '') {
	$next_post_id = $next_post->ID;
}
if ($prev_post != '') {
	$prev_post_id = $prev_post->ID;
}

?>

<div class="so-single-nav <?php echo esc_html($single_nav); ?>">
	<div class="so-content">
		<div class="so-row">

			<?php if ($prev_post != '') : ?>

				<?php
					$image_url = esc_url(wp_get_attachment_url( get_post_thumbnail_id($prev_post_id), 'thumbnail' ));

					if (!$image_url) {
						$image_url = esc_url(get_template_directory_uri()) . '/assets/img/default_intro.jpg';
					}
				?>
				
				<a href="<?php the_permalink($prev_post_id); ?>" class="so-col" style="background-image: url(<?php echo esc_url($image_url); ?>);">
					<div>
						<?php if (is_singular('product')) : ?>
							<span><?php esc_html_e('Previous Product', 'chocowp'); ?></span>
						<?php else : ?>
							<span><?php esc_html_e('Previous Post', 'chocowp'); ?></span>
						<?php endif; ?>
						<h4><?php echo get_the_title($prev_post_id); ?></h4>
					</div>
				</a>

			<?php endif; ?>

			<?php if ($next_post != '') : ?>

				<?php
					$image_url = esc_url(wp_get_attachment_url( get_post_thumbnail_id($next_post_id), 'thumbnail' ));

					if (!$image_url) {
						$image_url = esc_url(get_template_directory_uri()) . '/assets/img/default_intro.jpg';
					}
				?>

				<a href="<?php the_permalink($next_post_id); ?>" class="so-col" style="background-image: url(<?php echo esc_url($image_url); ?>);">
					<div>
						<?php if (is_singular('product')) : ?>
							<span><?php esc_html_e('Next Product', 'chocowp'); ?></span>
						<?php else : ?>
							<span><?php esc_html_e('Next Post', 'chocowp'); ?></span>
						<?php endif; ?>
						<h4><?php echo get_the_title($next_post_id); ?></h4>
					</div>
				</a>

			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>