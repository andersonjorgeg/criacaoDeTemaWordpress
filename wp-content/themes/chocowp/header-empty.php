<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="so-wrapper">
		<div id="wrapper"></div>

		<a class="so-skip-link" href="#so-main"><?php esc_html_e('Skip to main content', 'chocowp'); ?></a>