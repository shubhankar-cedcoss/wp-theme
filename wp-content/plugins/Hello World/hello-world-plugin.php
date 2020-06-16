<?php
/**
 * @package WordPress
 * @subpackage mytheme
 *
 * Plugin Name: Hello World
 * Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
 * Description: Basic WordPress Plugin Header Comment
 * Version:     20160911
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
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );

/**
 *Uninstall plugin
 */
register_uninstall_hook( __FILE__, 'pluginprefix_function_to_run' );
