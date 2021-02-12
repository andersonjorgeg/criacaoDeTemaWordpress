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
			<?php if (is_page(get_option('page_for_posts'))) : ?>

				<?php if (!is_null(get_queried_object())) : ?>
					<h1><?php echo esc_html(get_the_title(get_option('page_for_posts')) . ': ' . $queried_object->name); ?></h1>
				<?php else : ?>
					<h1><?php echo esc_html(get_the_title(get_option('page_for_posts'))); ?></h1>
				<?php endif; ?>

			<?php else: ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>
			<canvas class="so-intro-shape"></canvas>
		</div>
	</div>
</div>

<div class="so-page" id="so-main">

	<?php if (is_page(get_option('page_for_posts'))) : ?>

		<?php if (have_posts()) : ?>
				
		<?php
			while ( have_posts() ) :

				the_post();

				echo '<div class="so-content"><div class="so-row-main so-row">';

				if (get_theme_mod('choco_wp_page_sidebar_show') && get_theme_mod('choco_wp_page_sidebar_side') === 'left') {
					echo "<div class='so-page-sidebar-left so-page-sidebar'>";
					get_sidebar();
					echo "</div>";
				}

				echo "<div class='so-page-main'>";
				the_content();
				echo "</div>";

				if (get_theme_mod('choco_wp_page_sidebar_show') && get_theme_mod('choco_wp_page_sidebar_side') === 'right') {
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

	<?php else: ?>

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

					<div class="so-blog_archive-list">

						<?php if (have_posts()) : ?>

						<?php while ( have_posts() ) : the_post(); ?>

							<?php if (!get_theme_mod('choco_wp_archive_excerpt_length')) : ?>
								
								<div class="so-blog_archive-single">
									<a href="<?php the_permalink(); ?>" class="so-blog_archive-single-image">
										<?php if (get_post_thumbnail_id($post->ID)) : ?>
											<img src="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' )); ?>">
										<?php else : ?>
											<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/default_post.png">
										<?php endif; ?>
										<span>Read More</span>
									</a>
									<a href="<?php the_permalink(); ?>" class="so-blog_archive-single-title">
										<h6><?php the_title(); ?></h6>
									</a>
									<span class="so-blog_archive-single-date"><?php echo esc_html(get_the_date()); ?></span>
									<p><?php echo esc_html(choco_wp_so_cut_words(55, get_the_excerpt())); ?></p>
									<a href="<?php the_permalink(); ?>" class="so-blog_archive-single-more so-link">Read More</a>
								</div>

							<?php else : ?>

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

							<?php endif; ?>

						<?php endwhile; ?>

							<?php 
								the_posts_pagination(array(
									'next_text' => '→',
									'prev_text' => '←',
									'screen_reader_text' => ' '
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

	<?php endif; ?>

</div>

<?php get_footer(); ?>