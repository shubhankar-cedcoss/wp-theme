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
 * @package WordPress
 * @subpackage mytheme
 */

/**
 * Enqueing javascript and style.
 */
function themeslug_enqueue_style() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '1.1', 'all' );

	wp_enqueue_style( 'blog-home', get_template_directory_uri() . '/css/blog-home.css', array(), '1.1', 'all' );
}
/**
 * Enqueing javascript and style.
 */
function themeslug_enqueue_script() {
	wp_enqueue_script( 'jquery', '', array(), '1.1', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '1.1', false );
}
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'themeslug_enqueue_script' );

/**
 * Menubar
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'extra-menu'  => __( 'Extra Menu' ),
		)
	);
}
add_action( 'init', 'register_my_menus' );

/**
*Thumbnail
*/
add_theme_support( 'post-thumbnails' );

/**
 * Post format
 */
function themename_post_formats_setup() {
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );
}
add_action( 'after_setup_theme', 'themename_post_formats_setup' );

/**
*Custom-header
*/
add_theme_support( 'custom-header' );

/**
*Custom-background
*/
add_theme_support( 'custom-background' );

/**
 * Custom-logo
 */
add_theme_support( 'custom-logo' );

/**
 * Automatic-link
 */
add_theme_support( 'automatic-feed-links' );

/**
 * Sidebar support.
 */
function my_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( 'Primary Sidebar' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'my_register_sidebars' );


/**
 * Content-width
 */
global $content_width;
if ( ! isset( $content_width ) ) {
	$content_width = 600;
}

/**
 * Html5
 */
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

/**
 * Title-tag
 */
add_theme_support( 'title-tag' );


/**
 * Editor-style
 */
add_editor_style( 'css/custom-editor-style.css' );
