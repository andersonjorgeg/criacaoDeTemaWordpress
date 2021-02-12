</div>

<footer class="so-footer">
	<div class="so-content">

		<?php if (get_theme_mod('custom_logo') || get_theme_mod('choco_wp_footer_setting_inst_link') || get_theme_mod('choco_wp_footer_setting_fb_link') || get_theme_mod('choco_wp_footer_setting_tw_link') || get_theme_mod('choco_wp_footer_setting_text') || get_theme_mod('choco_wp_footer_menu_header_1') || get_theme_mod('choco_wp_footer_menu_header_2') || get_theme_mod('choco_wp_footer_menu_header_3')) : ?>

		<div class="so-row">

			<div class="so-col">
				<?php if (get_theme_mod('custom_logo')) : ?>
					<img class="so-footer-logo" src="<?php echo esc_url(wp_get_attachment_image_src(get_theme_mod('custom_logo') ,'full')[0]); ?>">
				<?php endif; ?>
				<p class="so-footer-text"><?php echo esc_html(get_theme_mod('choco_wp_footer_setting_text')); ?></p>

				<ul class="so-footer-soc">
					<?php if (get_theme_mod('choco_wp_footer_setting_inst_link')) : ?>
						<li>
							<a href="<?php echo esc_url(get_theme_mod('choco_wp_footer_setting_inst_link')); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
						</li>
					<?php endif; ?>

					<?php if (get_theme_mod('choco_wp_footer_setting_fb_link')) : ?>
						<li>
							<a href="<?php echo esc_url(get_theme_mod('choco_wp_footer_setting_fb_link')); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
						</li>
					<?php endif; ?>

					<?php if (get_theme_mod('choco_wp_footer_setting_tw_link')) : ?>
						<li>
							<a href="<?php echo esc_url(get_theme_mod('choco_wp_footer_setting_tw_link')); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
						</li>
					<?php endif; ?>
				</ul>

			</div>

			<div class="so-col">
				<h6><?php echo esc_html(get_theme_mod('choco_wp_footer_menu_header_1')); ?></h6>
				<?php choco_wp_menu('footer-menu-1'); ?>
			</div>

			<div class="so-col">
				<h6><?php echo esc_html(get_theme_mod('choco_wp_footer_menu_header_2')); ?></h6>
				<?php choco_wp_menu('footer-menu-2'); ?>
			</div>

			<div class="so-col">
				<h6><?php echo esc_html(get_theme_mod('choco_wp_footer_menu_header_3')); ?></h6>
				<?php choco_wp_menu('footer-menu-3'); ?>
			</div>

		</div>

		<?php endif; ?>

		<div class="so-row">
			<p><?php echo esc_html(get_theme_mod('choco_wp_footer_setting_cc')); ?></p>

			<?php if (is_front_page()) : ?>
				<p><?php esc_html_e('Made By', 'chocowp'); ?> <a href="https://zenith.team/">Zenith</a></p>
			<?php else : ?>
				<p><?php esc_html_e('Made By', 'chocowp'); ?> <a href="https://zenith.team/" rel="nofollow">Zenith</a></p>
			<?php endif; ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>