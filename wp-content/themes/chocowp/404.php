<?php get_header('empty'); ?>

<div class="so-404" id="so-main">
	<div class="so-content">
		<div class="so-row">
			
			<img src="<?php echo esc_url(get_theme_mod('choco_wp_ill_404')); ?>">
			<h1><?php echo esc_html(get_theme_mod('choco_wp_text_404')); ?></h1>
			<a href="<?php echo esc_url(get_home_url()); ?>" class="so-button"><?php esc_html_e('Back to Homepage', 'chocowp'); ?></a>

		</div>
	</div>
</div>

<?php get_footer('empty'); ?>