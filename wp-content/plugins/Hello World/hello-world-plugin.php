<?php
/**
 * @package WordPress
 * @subpackage mytheme
 *
 * Plugin Name: Hello World
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
 * Register the "book" custom post type
 */
function pluginprefix_setup_post_type() {
	register_post_type(
		'book',
		array(
			'public' => true,
			'label'  => 'Book',
		)
	);
}
add_action( 'init', 'pluginprefix_setup_post_type' );


/**
 * Activate the plugin.
 */
function pluginprefix_activate() {
	// Trigger our function that registers the custom post type plugin.
	pluginprefix_setup_post_type();
	// Clear the permalinks after the post type has been registered.
	flush_rewrite_rules();
	// to show option .
	hello_world_activation();
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );

/**
 * Deactivation hook.
 */
function pluginprefix_deactivate() {
	// Unregister the post type, so the rules are no longer in memory.
	unregister_post_type( 'book' );
	// Clear the permalinks to remove our post type's rules from the database.
	flush_rewrite_rules();
	// delete the option .
	hello_world_deactivation();
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );

/**
 * Creating option in activation
 */
function hello_world_activation() {
	add_option( 'installed_on' );
}

/**
 * Delete an option
 */
function hello_world_deactivation() {
	delete_option( 'installed_on' );
}

/**
 *Uninstall plugin
 */
register_uninstall_hook( __FILE__, 'pluginprefix_function_to_run' );
