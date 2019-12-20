<?php
/**
 * The template for displaying archive pages
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
		if ( have_posts() ) : $count=0;
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();  ?>

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

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<div class="formulario-producto">
		<div class="caja">
			<a href="javascript:void(0);" class="producto-salir"><img src="<?php echo get_template_directory_uri() . '/img/producto-equis.svg' ?>" alt="Producto salir"/></a>
			<?php echo do_shortcode( '[contact-form-7 id="68" title="Productos"]' ); ?>
		</div>
	</div>

<?php
get_footer();
