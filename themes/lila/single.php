<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lila
 */

get_header();
?>
	<div id="primary" class="content-area post-producto">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php lila_post_thumbnail('full'); ?>
				<div class="entry-content">
					<h2 class="title"><?php the_title();?></h2>
					<?php the_content();?>
				</div><!-- .entry-content -->
			</article><!-- #post-<?php the_ID(); ?> -->

		<?php	endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
