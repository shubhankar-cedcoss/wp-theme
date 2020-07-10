<?php
/**
 * This is plugin template file
 *
 * @package WordPress
 * @subpackage poca
 *
 * Plugin Name: Poca Plugin
 * Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
 * Description: Basic WordPress Plugin Header Comment
 * Version:    14.06.2020
 * Author:      WordPress.org
 * Author URI:  https://developer.wordpress.org/
 * Text Domain: wporg
 * Domain Path: /languages
 * License:     GPL2
 */

/**
 * Activate the plugin.
 */
function plugin_activate() {
	// to show option .
	add_option( 'installed on' );
}
register_activation_hook( __FILE__, 'plugin_activate' );

/**
 * Deactivation hook.
 */
function plugin_deactivate() {
	// delete the option .
	delete_option( 'installed on' );
}
register_deactivation_hook( __FILE__, 'plugin_deactivate' );


/**
 * Create post type
 */
function custom_post_type_podcast() {
	$labels = array(
		'name'               => 'Podcasts',
		'singular_name'      => 'podcasts',
		'add_new'            => 'Add Podcasts',
		'all_items'          => 'All Podcasts',
		'add_new_item'       => 'Add Podcast',
		'edit_item'          => 'Edit Podcast',
		'new_item'           => 'New Podcast',
		'view_item'          => 'View Podcast',
		'search_item'        => 'Search Podcast',
		'not_found'          => 'No podcast found',
		'not_found_in_trash' => 'No podcast found in trash',
		'parent_item_colon'  => 'Parent Podcast',
	);
	$args   = array(
		'labels'          => $labels,
		'public'          => true,
		'has_archive'     => true,
		'capability_type' => 'post',
		'menu_position'   => 4,
		'show_in_rest'    => true,
		'supports'        => array(
			'editor',
			'thumbnail',
			'excerpt',
			'title',
			'comments',
		),
		'rewrite'         => array( 'slug' => 'podcast' ),
	);
	register_post_type( 'podcast', $args );
}
add_action( 'init', 'custom_post_type_podcast' );

/**
 * Creating custom taxonomies
 */
function custom_taxonomy() {
	$labels = array(
		'name'               => 'Categories',
		'singular_name'      => 'Category',
		'all_items'          => 'All Categories',
		'add_new_item'       => 'Add Category',
		'edit_item'          => 'Edit Category',
		'new_item_name'      => 'New Category',
		'view_item'          => 'View Category',
		'search_items'       => 'Search Category',
		'not_found'          => 'No category found',
		'not_found_in_trash' => 'No category found in trash',
		'parent_item_colon'  => 'Parent Category',
		'parent_item'        => 'Parent Category:',
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical .
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'category' ),
	);
	register_taxonomy( 'Category_taxonomy', array( 'podcast' ), $args );

	$args = array(
		'hierarchical'      => false,
		'labels'            => 'Tags',
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'rewrite'           => array( 'slug' => 'tag' ),
	);
	register_taxonomy( 'Tag_taxonomy', array( 'podcast' ), $args );
}
add_action( 'init', 'custom_taxonomy' );

// Customize widget.
require plugin_dir_path( __FILE__ ) . 'inc/class-categories.php';

// Customize widgets.
require plugin_dir_path( __FILE__ ) . 'inc/class-recent-post.php';




