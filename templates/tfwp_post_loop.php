<?php
/**
 * Template file for post loop
 *
 * @var WP_Post $post
 *
 * @since 1.0.0
 */
?>
<div class="tfwp tfwp-entry">
	<h2><?php echo $post->post_title; ?></h2>
	<p><?php echo $post->post_excerpt; ?></p>
</div>