<?php /* Template Name: Prensa */ get_header();
?>

<div id="primary" class="content-area post-producto">
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
			'post_type'   => 'prensa',
			'nopaging'               => true,
			'order'                  => 'DESC'
			);

			// The Query
			$eventos = new WP_Query( $args );

      while( $eventos->have_posts() ) :
        $eventos->the_post();
        ?>
		<!--<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>  style="background-color: <?php echo $color; ?>;">
			<a href="<?php echo get_permalink(); ?>" class="ver-mas post-thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);"></a>
			<div class="entry-content">
				<h2 class="title"><?php the_title(); ?></h2>
				<p class="sub-title"><?php echo CFS()->get( 'sub_titulo' ); ?></p>
				<a href="<?php echo get_permalink(); ?>" class="ver-mas"><img src="<?php echo get_template_directory_uri() . '/img/ver-mas.svg' ?>" alt="ver mas" title="ver mas" /></a>
			</div>
		</div> -->

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<div class="entry-content">
				<?php lila_post_thumbnail('full'); ?>
				<h2 class="title"><?php the_title();?></h2>
				<?php the_content();?>
			</div><!-- .entry-content -->
		</article><!-- #post-<?php the_ID(); ?> -->

		<?php
      		endwhile;
      		wp_reset_postdata();
		 ?>



	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
