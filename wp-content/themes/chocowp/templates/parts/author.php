<?php 
	$cats = get_the_category();
	if (!empty($cats)) : 
?>

	<div class="so-single-cats">
		<?php
			foreach ($cats as $single_cat) {
				echo "<a href='" . esc_url(get_tag_link($single_cat->term_id)) . "'>" . esc_html($single_cat->name) . "</a>";
			}
		?>
	</div>

<?php endif; ?>

<?php 
	$tags = get_the_tags(); 
	if (!empty($tags)) : 
?>

	<div class="so-single-tags">
		<?php esc_html_e('Tags:', 'chocowp'); ?>
		<?php
			foreach ($tags as $single_tag) {
				echo "<a href='" . esc_url(get_tag_link($single_tag->term_id)) . "'>#" . esc_html($single_tag->name) . "</a>";
			}
		?>
	</div>

<?php endif; ?>

<?php 

global $post;
$user_id = $post->post_author;
$meta_id = get_the_author_meta( 'user_email', $user_id );
$last_name = get_user_meta( $user_id, 'last_name', true );
$first_name = get_user_meta( $user_id, 'first_name', true );
$url = get_avatar_url($meta_id);
$img = '<img alt="" src="'. esc_url($url) .'">';

?>

<?php if ($first_name != '' || $last_name != '') : ?>

<div class="so-single-user">
	<?php echo $img; ?>
	<div class="so-single-user-data">
		<span><?php echo esc_html($first_name . ' ' . $last_name); ?></span>
	</div>
</div>

<?php endif; ?>