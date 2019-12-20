<?php /* Template Name: Festejemos */ get_header();
?>

<img class="festejemos-textura item-1" src="<?php echo get_template_directory_uri() . '/img/festejemos-textura.svg' ?>" alt="textura festjemos"/>
<img class="festejemos-textura item-2" src="<?php echo get_template_directory_uri() . '/img/festejemos-textura-2.svg' ?>" alt="textura festjemos"/>
<img class="festejemos-textura item-3" src="<?php echo get_template_directory_uri() . '/img/festejemos-textura-3.svg' ?>" alt="textura festjemos"/>
<img class="festejemos-textura item-4" src="<?php echo get_template_directory_uri() . '/img/festejemos-textura-4.svg' ?>" alt="textura festjemos"/>

<div id="primary" class="content-area productos festejemos">
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
			'post_type'   => 'festejos',
			'nopaging'               => true,
			'order'                  => 'DESC'
			);

			// The Query
			$eventos = new WP_Query( $args );

      while( $eventos->have_posts() ) :
        $eventos->the_post();

			$color = '#CEB5B4';

        ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>  style="background-color: <?php echo $color; ?>;">
			<div class="ver-mas post-thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);"></div>
			<div class="entry-content">
				<h2 class="title"><?php the_title(); ?></h2>
				<p class="sub-title"><?php echo CFS()->get( 'sub_titulo' ); ?></p>
				<a href="<?php echo get_permalink(); ?>" class="ver-mas"><img src="<?php echo get_template_directory_uri() . '/img/ver-mas.svg' ?>" alt="ver mas" title="ver mas" /></a>
			</div><!-- .entry-content -->
		</div><!-- #post-<?php the_ID(); ?> -->

		<?php
      		endwhile;
      		wp_reset_postdata();
		 ?>



	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
