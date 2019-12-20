<?php
/**
 * lila functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lila
 */

if ( ! function_exists( 'lila_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lila_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lila, use a find and replace
		 * to change 'lila' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lila', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'lila' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'lila_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'lila_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lila_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'lila_content_width', 640 );
}
add_action( 'after_setup_theme', 'lila_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lila_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lila' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lila' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lila_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lila_scripts() {
	wp_enqueue_style( 'lila-style', get_stylesheet_uri() );
	wp_enqueue_style( 'lila-font', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700&display=swap' );
	wp_enqueue_style( 'lila-style-slick', get_template_directory_uri() . '/js/slick.css' );
	wp_enqueue_script( 'lila-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'lila-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	//Funciones
	wp_enqueue_script( 'lila-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js' );
	wp_enqueue_script( 'lila-slick', get_template_directory_uri() . '/js/slick.min.js' );
	wp_enqueue_script( 'lila-awesome', 'https://kit.fontawesome.com/2281c0abb6.js' );
	wp_enqueue_script( 'lila-funciones', get_template_directory_uri() . '/js/funciones.js' );

}
add_action( 'wp_enqueue_scripts', 'lila_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*--------------------------------------------------------------
# Sacar barra wordpress
--------------------------------------------------------------*/
add_filter( 'show_admin_bar', '__return_false' );

/*--------------------------------------------------------------
# Editar panel editor wordpress
--------------------------------------------------------------*/
////
// Customizes 'Editor' role to have the ability to modify menus, add new users
// and more.
class Custom_Admin {
    // Add our filters
    public function __construct(){
        // Allow editor to edit theme options (ie Menu)
        add_action('init', array($this, 'init'));
        add_filter('editable_roles', array($this, 'editable_roles'));
    }
    public function init() {
        if ($this->is_client_admin()) {
            // Disable access to the theme/widget pages if not admin
            add_action('admin_head', array($this, 'modify_menus'));
            add_action('load-themes.php', array($this, 'wp_die'));
            add_action('load-widgets.php', array($this, 'wp_die'));
            add_action('load-customize.php', array($this, 'wp_die'));
            add_filter('user_has_cap', array($this, 'user_has_cap'));
        }
    }
    public function wp_die() {
        _default_wp_die_handler(__('You do not have sufficient permissions to access this page.'));
    }
    public function modify_menus()
    {
        remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
        remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu
        remove_menu_page('edit-comments.php'); // Removemos el ítem comentarios
        remove_menu_page('customizer.php'); // Removemos el ítem comentarios
        remove_menu_page('upload.php'); // Medios
        remove_menu_page( 'tools.php' );                  //Herramientas
        remove_menu_page( 'edit.php?post_type=cfs' );//CFS
        remove_menu_page( 'admin.php?page=wpcf7' );//Contact Foms
    }
    // Remove 'Administrator' from the list of roles if the current user is not an admin
    public function editable_roles( $roles ){
        if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
            unset( $roles['administrator']);
        }
        return $roles;
    }
    public function user_has_cap( $caps ){
        $caps['list_users'] = true;
        $caps['create_users'] = true;
        $caps['edit_users'] = true;
        $caps['promote_users'] = true;
        $caps['delete_users'] = true;
        $caps['remove_users'] = true;
       // $caps['edit_theme_options'] = true;
        return $caps;
    }
    // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
    public function map_meta_cap( $caps, $cap, $user_id, $args ){
        // $args[0] == other_user_id
        foreach($caps as $key => $capability)
        {
            switch ($cap)
            {
                case 'edit_user':
                case 'remove_user':
                case 'promote_user':
                    if(isset($args[0]) && $args[0] == $user_id) {
                        break;
                    }
                    else if(!isset($args[0])) {
                        $caps[] = 'do_not_allow';
                    }
                    // Do not allow non-admin to edit admin
                    $other = new WP_User( absint($args[0]) );
                    if( $other->has_cap( 'administrator' ) ){
                        if(!current_user_can('administrator')){
                            $caps[] = 'do_not_allow';
                        }
                    }
                    break;
                case 'delete_user':
                case 'delete_users':
                    if( !isset($args[0])) {
                        break;
                    }
                    // Do not allow non-admin to delete admin
                    $other = new WP_User(absint($args[0]));
                    if( $other->has_cap( 'administrator' ) ){
                        if(!current_user_can('administrator')){
                            $caps[] = 'do_not_allow';
                        }
                    }
                    break;
                break;
            }
        }
        return $caps;
    }
    // If current user is called admin or administrative and is an editor
    protected function is_client_admin() {
        $current_user = wp_get_current_user();
        $is_editor = isset($current_user->caps['editor']) ? $current_user->caps['editor'] : false;
        return ($is_editor);
    }
}
new Custom_Admin();
//MODIFICAR MENÚ DE ADMINISTRACIÓN DE WORDPRESS
add_action( 'admin_menu', 'apk_eliminar_admin_menu_links' );
function apk_eliminar_admin_menu_links() {
    $user = wp_get_current_user(); //Obtenemos los datos del usuario actual
    if ( ! $user->has_cap( 'manage_options' ) ) { // Si es que el usuario no tiene rol de administrador
        remove_menu_page('customizer.php'); // Removemos el ítem comentarios
        remove_menu_page('edit-comments.php'); // Removemos el ítem comentarios
        remove_menu_page('upload.php'); // Medios
        remove_menu_page( 'tools.php' );                  //Herramientas
        remove_menu_page( 'edit.php?post_type=cfs' );//CFS
        remove_menu_page( 'wpcf7' );
    }
}
