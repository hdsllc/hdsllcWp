<?php get_header(); ?>
<div class="row">
	<div class="col-md-9">
		<section id="content" role="main">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class="entry-content">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
					<?php the_content(); ?>
					<div class="entry-links"><?php wp_link_pages(); ?></div>
				</section>
			</article>
			<?php endwhile; endif; ?>
		</section>
	</div>
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>