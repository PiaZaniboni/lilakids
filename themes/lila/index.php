<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lila
 */

get_header();
?>
	<div id="primary" class="content-area productos">
		<main id="main" class="site-main">

		<?php

		// WP_Query arguments
		$args = array (
		'nopaging'               => true,
		'order'                  => 'DESC'
		);

		// The Query
		$productos = new WP_Query( $args );

				while( $productos->have_posts() ) : $count=0;
		          $productos->the_post();
		          ?>

				<?php
					if($count==0){
						$color = '#D8B6B6';
					}else if($count==1){
						$color = '#A9802B';
					}else if ($count==2){
						$color = '#8498A1';
					}else{
						$color = '#C2AAAA';
					}
				?>



				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>  style="background-color: <?php echo $color; ?>;">
					<a href="<?php echo get_permalink(); ?>" class="ver-mas post-thumbnail" style="background-image:url(<?php echo get_the_post_thumbnail_url();?>);"></a>

					<div class="entry-content">
						<h2 class="title"><?php the_title(); ?></h2>
						<p class="sub-title"><?php echo CFS()->get( 'sub_titulo' ); ?></p>
						<a href="javascript:vodi(0);" class="ver-mas producto-mostrar">¡consultar!</a>
					</div><!-- .entry-content -->
				</div><!-- #post-<?php the_ID(); ?> -->

			<?php  if($count==3){ $count=0;}else{ $count++; }
				endwhile;

		      		wp_reset_postdata();
				 ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="formulario-producto">
		<div class="caja">
			<a href="javascript:void(0);" class="producto-salir"><img src="<?php echo get_template_directory_uri() . '/img/producto-equis.svg' ?>" alt="Producto salir"/></a>
			<?php echo do_shortcode( '[contact-form-7 id="5" title="Productos"]' ); ?>
		</div>
	</div>
<?php

get_footer();
