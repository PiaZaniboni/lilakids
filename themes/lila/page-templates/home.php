<?php /* Template Name: Home */ get_header('home');
?>

	<div id="primary" class="content-area home">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<div class="slider-home">
				<?php
					$fields = CFS()->get( 'slider_home' );

					foreach ( $fields as $field ) {?>
						<div class="caja" style="background-image:url('<?php echo $field['foto']; ?>');"></div>
					<?php }
				?>
			</div>

		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
