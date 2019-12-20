<?php /* Template Name: Campania */ get_header();
?>

<div id="primary" class="content-area productos campania">
	<main id="main" class="site-main">


		<?php
		while ( have_posts() ) :
			the_post(); ?>

					<?php
					the_content( sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lila' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						get_the_title()
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lila' ),
						'after'  => '</div>',
					) );
					?>

		<?php endwhile; // End of the loop.
		?>


		<?php
			// WP_Query arguments
			$args = array (
			'post_type'   => 'post_campanias',
			'nopaging'               => true,
			'order'                  => 'DESC'
			);

			// The Query
			$eventos = new WP_Query( $args ); $count=0;

      while( $eventos->have_posts() ) :
        $eventos->the_post();

		if($count==0){
			$color = '#D8B6B6';
		}else if($count==1){
			$color = '#8498A1';
		}else if ($count==2){
			$color = '#A9802B';
		}else{
			$color = '#C2AAAA';
		}


        ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>  style="background-color: <?php echo $color; ?>;">
			<a href="<?php echo get_permalink(); ?>" class="ver-mas post-thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);"></a>
			<div class="entry-content">
				<h2 class="title"><?php the_title(); ?></h2>
				<p class="sub-title"><?php echo CFS()->get( 'sub_titulo' ); ?></p>
				<a href="<?php echo get_permalink(); ?>" class="ver-mas"><img src="<?php echo get_template_directory_uri() . '/img/ver-mas.svg' ?>" alt="ver mas" title="ver mas" /></a>
			</div><!-- .entry-content -->
		</div><!-- #post-<?php the_ID(); ?> -->

		<?php  if($count==3){ $count=0;}else{ $count++; }
      		endwhile;
      		wp_reset_postdata();
		 ?>



	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
