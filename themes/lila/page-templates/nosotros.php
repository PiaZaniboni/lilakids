<?php /* Template Name: Nosotros */ get_header();
?>

	<div id="primary" class="content-area nosotros">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

				<?php lila_post_thumbnail(); ?>

				<div class="entry-content">
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
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php lila_entry_footer(); ?>
				</footer><!-- .entry-footer -->

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
