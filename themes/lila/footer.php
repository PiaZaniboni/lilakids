<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lila
 */

?>

	</div><!-- #content -->

	<div class="formulario-suscriptor">
		<div class="caja">
			<a href="javascript:void(0);" class="suscribite-salir"><img src="<?php echo get_template_directory_uri() . '/img/suscribite-equis.svg' ?>" alt="Suscribite salir"/></a>
			<img src="<?php echo get_template_directory_uri() . '/img/suscribite.png' ?>" alt="Suscribite"/>
			<?php echo do_shortcode( '[contact-form-7 id="5" title="Suscribite"]' ); ?>
		</div>
	</div>

	<footer id="colophon" class="site-footer">
		<div class="site-description mobile"><span>from</span>Buenos Aires</div>

		<div class="redes-sociales">
			<a href="https://www.instagram.com/lilacasadeco/" class="instagram" alt="instagram lila" title="instagram lila" target="_blank"><i class="fab fa-instagram"></i></a>
			<a href="https://www.facebook.com/lilacasadeco/" class="facebook" alt="facebook lila" title="facebook lila" target="_blank"><i class="fab fa-facebook-f"></i></a>
			<a href="https://www.youtube.com" class="youtube" alt="youtube lila" title="youtube lila" target="_blank"><i class="fab fa-youtube"></i></a>
		</div>

		<a href="javascript:void(0);" alt="suscribe us!" title="suscribe us!" class="suscripbite-mostrar"><i class="far fa-heart"></i><span>suscribe us!</span></a>

		<div class="site-description desktop"><span>from</span>Buenos Aires</div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
