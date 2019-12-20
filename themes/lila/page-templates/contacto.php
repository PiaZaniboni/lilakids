<?php /* Template Name: Contacto */ get_header();
?>

	<div id="primary" class="content-area contacto">
		<img class="cosita-0 cosa" src="<?php echo get_template_directory_uri() . '/img/cosita.svg' ?>" alt="cosita"/>
		<img class="cosita-1 cosa" src="<?php echo get_template_directory_uri() . '/img/cosita1.svg' ?>" alt="cosita"/>
		<img class="cosita-2 cosa" src="<?php echo get_template_directory_uri() . '/img/cosita2.svg' ?>" alt="cosita"/>
		<img class="cosita-3 cosa" src="<?php echo get_template_directory_uri() . '/img/cosita3.svg' ?>" alt="cosita"/>
		<img class="cosita-4 cosa" src="<?php echo get_template_directory_uri() . '/img/cosita.svg' ?>" alt="cosita"/>
		<img class="cosita-5 cosa" src="<?php echo get_template_directory_uri() . '/img/cosita.svg' ?>" alt="cosita"/>
		<img class="cosita-6 cosa" src="<?php echo get_template_directory_uri() . '/img/cosita.svg' ?>" alt="cosita"/>
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
				<div class="redes">
					<a href="https://www.instagram.com/lilacasadeco/" alt="instagram lila" title="instagram lila" target="_blank"><span>Instagram</span></a>
					<a href="https://www.youtube.com"><span>Youtube</span></a>
					<a href="https://www.facebook.com/lilacasadeco/" alt="facebook lila" title="facebook lila" target="_blank"><span>Facebook</span></a>
				</div>
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
