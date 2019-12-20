<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lila
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<meta property="og:title" content="Lila" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="http://www.lilakids.com.ar" />
	<meta property="og:image" content="http://c1660960.ferozo.com/wp-content/uploads/2019/10/slide01.jpg" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php echo get_template_directory_uri() . '/img/logo.svg' ?>" alt="<?php bloginfo( 'name' ); ?>"/> </a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php echo get_template_directory_uri() . '/img/logo.svg' ?>" alt="<?php bloginfo( 'name' ); ?>"/> </a></p>
				<?php
			endif; ?>
		</div><!-- .site-branding -->
		<img class="btn-cerrar" src="<?php echo get_template_directory_uri().'/img/icon-close.svg'?>" title="menu responsive" alt="menu responsive">

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" style="display:none;" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'lila' ); ?></button>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
				'link_before' => '<span>',
				'link_after'  => '</span>'
			) );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div class="header-responsive">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php echo get_template_directory_uri() . '/img/logo.svg' ?>" alt="<?php bloginfo( 'name' ); ?>"/> </a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php echo get_template_directory_uri() . '/img/logo.svg' ?>" alt="<?php bloginfo( 'name' ); ?>"/> </a></p>
				<?php
			endif; ?>
		</div><!-- .site-branding -->
		<img class="btn-abrir" src="<?php echo get_template_directory_uri().'/img/icon-bar.svg'?>" title="menu responsive" alt="menu responsive">
	</div>

	<div id="content" class="site-content">
