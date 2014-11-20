<?php
/*
Template Name: Services
*/ 
?>

<?php get_header(); ?>
<div class="row">
	<div class="col-md-12">
		<section id="content" role="main">
		<?php the_post(); the_content(); ?>
		<?php
			$query = new WP_Query( array( 'post_parent' => $post->ID, 'post_type' => 'page', 'nopaging' => true, 'orderby' => 'title', 'order' => 
				'asc') );
			if ( $query->have_posts() ) {
				echo '<div class="services row">';
					$i = 1;
					while ( $query->have_posts() ) {	
						echo '<a>';
							echo '<div class="service col-lg-3 col-md-4 col-sm-6 col-xs-12" data-service-id='.$i.'>';
								$query->the_post();
								if ( has_post_thumbnail() ) {
									?><div class="service-thumb"><?php
									echo '' . the_post_thumbnail()
									?></div><?php	
								}
								echo '<div class="service-title">' . get_the_title() . '</div>';
							echo '</div>';
						
							echo '<div class="service-content col-xs-12" data-service-id="'.$i.'">' . get_the_content() . '</div>';
						echo '</a>';
						$i += 1;
					}
					
				echo '</div>';
			} else {
				echo 'Sorry, couldn\'t find any services.';
			}
			/* Restore original Post Data */
			wp_reset_postdata();
		?>
  	</section>
	</div>
</div>
<?php get_footer(); ?>




