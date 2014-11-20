<?php
/*
Template Name: Customers
*/ 
?>
<?php get_header(); ?>
<div class="row">
	<div class="col-md-12">
		<section id="content" role="main">
		<?php the_post(); the_content(); ?>
		<?php
			$query = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'nopaging' => true, 'order' => asc) );
			if ( $query->have_posts() ) {
				
				$i = 0;

				
				while ( $query->have_posts() ) {
					if ($i == 0) {
						echo '<div class="row customer">';
					} else if ($i % 2 == 0) {
						echo '</div>'; // end the previous row
						echo '<div class="row customer">';
					}
					$query->the_post();
					echo '<div class="col-sm-1">';
						if ( has_post_thumbnail() ) {
								echo '<div class="customer-thumb">' . the_post_thumbnail() . '</div>';	
							}
					echo '</div>';
					echo '<div class="col-sm-5">';
						echo '<ul class="customer-type">';
							echo '<li class="customer customer-title">' . get_the_title() . '</li>';
							echo '<li class="customer customer-content">' . get_the_content() . '</li>';
						echo '</ul>';
					echo '</div>';
					$i += 1;
				}
			} else {
				echo 'Sorry, no posts matched your criteria.';
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		?>
		</section>
	</div>
</div>












<div class="row">
	<div class="col-md-12">
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
</div>
<?php get_footer(); ?>