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

/**
 * To filter content
 *
 * @param [string] $content is a string .
 */
function filter_content( $content ) {
	if ( is_single() ) {
		$url     = get_permalink();
		$link    = '<a href ="https://twitter.com/intent/tweet?url=' . urlencode( $url ) . '">Twitter Link</a>';
		$content = $link . $content;
	}
	return $content;
}
add_filter( 'the_content', 'filter_content' );

/**
 * To count number of charcaters in post
 * With (wp_strip_all_tags) you get rid of all the HTML tags.
 */
function count_character( $content ) {
	if ( is_single() ) {
		global $post;
		$count = strlen( wp_strip_all_tags( $post->post_content ) );
	}
	return $content . $count;
}
add_filter( 'the_content', 'count_character' );
