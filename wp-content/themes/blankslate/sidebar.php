<aside id="sidebar" role="complementary">
	<div id="custom-sidebar">
		<ul class="image-column">
			<li><img src="<?php echo get_post_meta($post->ID, 'image1', true); ?>" /></li>
			<li><img src="<?php echo get_post_meta($post->ID, 'image2', true); ?>" /></li>
			<li><img src="<?php echo get_post_meta($post->ID, 'image3', true); ?>" /></li>
		</ul>
	</div>

	<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
	<div id="primary" class="widget-area">
	<ul class="xoxo">
	<?php dynamic_sidebar( 'primary-widget-area' ); ?>
	</ul>
	</div>
	<?php endif; ?>
</aside>