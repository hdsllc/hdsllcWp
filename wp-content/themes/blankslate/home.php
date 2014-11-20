<?php
/*
Template Name: Home
*/ 
?>
<?php get_template_part('headerHome'); ?>

<div class="row">
	<div class="col-md-12 home-page">
		<?php the_post() ?>

		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			
		<section id="content" role="main">
			<?php the_content(); ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>
