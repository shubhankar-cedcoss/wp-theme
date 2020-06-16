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
 * Activate the plugin.
 */
function pluginprefix_activate() {
	// to show option .
	hello_world_activation();
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );

/**
 * Deactivation hook.
 */
function pluginprefix_deactivate() {
	// delete the option .
	hello_world_deactivation();
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );

/**
 * Creating option in activation
 */
function hello_world_activation() {
	add_option( 'installed on' );
}

/**
 * Delete an option
 */
function hello_world_deactivation() {
	delete_option( 'installed on' );
}

/**
 *Uninstall plugin
 */
register_uninstall_hook( __FILE__, 'pluginprefix_function_to_run' );