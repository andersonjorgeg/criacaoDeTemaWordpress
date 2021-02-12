<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php

if (function_exists('wp_body_open')) {
	wp_body_open();
}
else {
	do_action('wp_body_open');
}

?>

<div id="so-wrapper">
	<div id="wrapper"></div>

	<a class="so-skip-link" href="#so-main"><?php esc_html_e('Skip to main content', 'chocowp'); ?></a>

	<header class="so-header">
		<div class="so-content">
			<div class="so-row">
				<a href="<?php echo esc_url(get_home_url()); ?>">
					<?php if (get_theme_mod('custom_logo')) : ?>
						<img class="so-header-logo" src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo') ,'full')[0]); ?>">
					<?php endif; ?>
				</a>

				<?php choco_wp_menu('header-menu'); ?>

				<a class="so-trigger" href="#">
					<i></i>
					<i></i>
					<i></i>
				</a>
			</div>
		</div>
	</header>

	<div class="so-header-mob_slide">
		<div class="so-header-mob_slide-wrapper">
			<div class="so-header-mob_slide-menu">
				<?php choco_wp_menu('header-menu'); ?>

				<a class="so-header-button" href="<?php echo esc_url(get_theme_mod('choco_wp_header_mob_btn_link')); ?>"><?php echo esc_html(get_theme_mod('choco_wp_header_mob_btn_text')); ?></a>
			</div>
		</div>
	</div>


