<?php 

get_header();

$intro_image_url = get_theme_mod('choco_wp_archive_image');

if (!$intro_image_url) {
	$intro_image_url = esc_url(get_template_directory_uri()) . '/assets/img/default_intro.jpg';
}

?>

<div class="so-intro" style="background-image: url(<?php echo esc_url($intro_image_url); ?>);">
	<div class="so-content">
		<div class="so-row">
			<h1><?php esc_html_e('Search', 'chocowp'); ?><?php echo esc_html(': ' . $_GET['s']); ?></h1>
			<canvas class="so-intro-shape"></canvas>
		</div>
	</div>
</div>

<div class="so-page" id="so-main">
	<div class="so-content">
		<div class="so-row-main so-row">

			<?php 
				if (get_theme_mod('choco_wp_archive_sidebar_show') && get_theme_mod('choco_wp_archive_sidebar_side') === 'left') {
					echo "<div class='so-page-sidebar-left so-page-sidebar'>";
					get_sidebar();
					echo "</div>";
				}
			?>
			
			<div class='so-page-main'>

				<?php if (isset($_GET['s'])) {
				
					if ($wp_query->found_posts > 1) {
						echo esc_html('<p class="so-blog_archive-results">' . $wp_query->found_posts . esc_html_e(' results found: "', 'chocowp') . $_GET['s'] . '"</p>');
					}
					else {
						echo esc_html('<p class="so-blog_archive-results">' . $wp_query->found_posts . esc_html_e(' result found: "', 'chocowp') . $_GET['s'] . '"</p>');
					}

				} ?>

				<div class="so-blog_archive-list">

					<?php if (have_posts()) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
							
							<div class="so-blog_archive-single">
								<a href="<?php the_permalink(); ?>" class="so-blog_archive-single-image">
									<?php if (get_post_thumbnail_id($post->ID)) : ?>
										<img src="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' )); ?>">
									<?php else : ?>
										<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/default_post.png">
									<?php endif; ?>
									<span><?php echo esc_html(get_theme_mod('choco_wp_archive_read_text')); ?></span>
								</a>
								<a href="<?php the_permalink(); ?>" class="so-blog_archive-single-title">
									<h6><?php the_title(); ?></h6>
								</a>

								<?php if (get_theme_mod('choco_wp_archive_show_date')) : ?>
									<span class="so-blog_archive-single-date"><?php echo esc_html(get_the_date()); ?></span>
								<?php endif; ?>

								<?php if (get_theme_mod('choco_wp_archive_show_excerpt')) : ?>
									<p><?php echo esc_html(choco_wp_so_cut_words(get_theme_mod('choco_wp_archive_excerpt_length'), get_the_excerpt())); ?></p>
								<?php endif; ?>

								<?php if (get_theme_mod('choco_wp_archive_show_more')) : ?>
									<a href="<?php the_permalink(); ?>" class="so-blog_archive-single-more so-link">
										<?php echo esc_html(get_theme_mod('choco_wp_archive_read_text')); ?>
									</a>
								<?php endif; ?>
							</div>

					<?php endwhile; ?>

						<?php 
							the_posts_pagination(array(
								'next_text' => '→',
								'prev_text' => '←'
							)); 
						?>

					<?php endif; ?>

				</div>
			</div>

			<?php 
				if (get_theme_mod('choco_wp_archive_sidebar_show') && get_theme_mod('choco_wp_archive_sidebar_side') === 'right') {
					echo "<div class='so-page-sidebar-right so-page-sidebar'>";
					get_sidebar();
					echo "</div>";
				}
			?>

		</div>
	</div>
</div>

<?php get_footer(); ?>