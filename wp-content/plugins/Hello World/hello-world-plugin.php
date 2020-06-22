<?php
/**
 * This is plugin template file
 *
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
	add_option( 'installed on' );
}
register_activation_hook( __FILE__, 'pluginprefix_activate' );

/**
 * Deactivation hook.
 */
function pluginprefix_deactivate() {
	// delete the option .
	delete_option( 'installed on' );
}
register_deactivation_hook( __FILE__, 'pluginprefix_deactivate' );

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
		$link    = '<a href ="https://twitter.com/intent/tweet?url=' . rawurlencode( $url ) . '">Twitter Link</a>';
		$content = $link . $content;
	}
	return $content;
}
add_filter( 'the_content', 'filter_content' );

/**
 * To count number of charcaters in post
 * With (wp_strip_all_tags) you get rid of all the HTML tags.
 *
 * @param [string] $content is a string .
 */
function count_character( $content ) {
	if ( is_single() ) {
		global $post;
		$count = strlen( wp_strip_all_tags( $post->post_content ) );
	}
	return $content . $count;
}
add_filter( 'the_content', 'count_character' );


/**
 * This is plugin template file
 *
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * Custom option and settings
 */
function wporg_settings_init() {
	// register a new setting for "wporg" page .
	register_setting( 'wporg', 'wporg_options' );

	// register a new section in the "wporg" page .
	add_settings_section(
		'wporg_section_developers',
		__( /*'The Matrix has you.'*/ 'Socila Media Icons -', 'wporg' ),
		'wporg_section_developers_cb',
		'wporg'
	);

	// register a new field in the "wporg_section_developers" section, inside the "wporg" page .

	add_settings_field(
		'wporg_field_fb', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback .
		__( 'Facebook :', 'wporg' ),
		'wporg_field_fb_cb',
		'wporg',
		'wporg_section_developers',
		array(
			'label_for'         => 'wporg_field_fb',
			'class'             => 'wporg_row',
			'wporg_custom_data' => 'custom',
		)
	);

	add_settings_field(
		'wporg_field_twitter', // as of WP 4.6 this value is used only internally
		// use $args' label_for to populate the id inside the callback .
		__( 'Twitter :', 'wporg' ),
		'wporg_field_twitter_cb', // callback funciton .
		'wporg',
		'wporg_section_developers',
		array(
			'label_for'         => 'wporg_field_twitter',
			'class'             => 'wporg_row',
			'wporg_custom_data' => 'custom',
		)
	);

}
/**
* Register our wporg_settings_init to the admin_init action hook .
*/
add_action( 'admin_init', 'wporg_settings_init' );

/**
 * Custom option and settings:
 * callback functions
 */

// developers section cb .

/** Section callbacks can accept an $args parameter, which is an array.
 *
 * @param [string] $args have the following keys defined: title, id, callback.
 * the values are defined at the add_settings_section() function.
 */
function wporg_section_developers_cb( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Follow the white rabbit.', 'wporg' ); ?></p>
	<?php
}

// facebook field cb .

/**  Field callbacks can accept an $args parameter, which is an array.
 *
 * @param [string] $args is defined at the add_settings_field() function.
 * WordPress has magic interaction with the following keys: label_for, class.
 * the "label_for" key value is used for the "for" attribute of the <label>.
 * the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * you can add custom key value pairs to be used inside your callbacks.
 */
function wporg_field_fb_cb( $args ) {
	?>
		<textarea id="<?php echo esc_attr( $args['label_for'] ); ?>" name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]"></textarea>
	<?php
}

// twitter field cb .

/**  Field callbacks can accept an $args parameter, which is an array.
 *
 * @param [string] $args is defined at the add_settings_field() function.
 * WordPress has magic interaction with the following keys: label_for, class.
 * the "label_for" key value is used for the "for" attribute of the <label>.
 * the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * you can add custom key value pairs to be used inside your callbacks.
 */
function wporg_field_twitter_cb( $args ) {
	?>
		<textarea id="<?php echo esc_attr( $args['label_for'] ); ?>" name="wporg_options[<?php echo esc_attr( $args['label_for'] ); ?>]"></textarea>

	<?php
}

/**
 * Top level menu
 */
function wporg_options_page() {
	// add top level menu page .
	add_menu_page(
		'WPOrg',
		'WPOrg Options',
		'manage_options',
		'wporg',
		'wporg_options_page_html'
	);
}

/**
* Register our wporg_options_page to the admin_menu action hook
*/
add_action( 'admin_menu', 'wporg_options_page' );

/**
 * Top level menu:
 * callback functions
 */
function wporg_options_page_html() {
	// check user capabilities .
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// add error/update messages .

	// check if the user have submitted the settings
	// WordPress will add the "settings-updated" $_GET parameter to the url .
	if ( isset( $_GET['settings-updated'] ) ) {
		// add settings saved message with the class of "updated" .
		add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
	}

	// show error/update messages .
	settings_errors( 'wporg_messages' );
	?>
	<div class="wrap">
		<h1>
			<?php echo esc_html( get_admin_page_title() ); ?>
		</h1>
		<form action="options.php" method="post">
		<?php
		// output security fields for the registered setting "wporg" .
		settings_fields( 'wporg' );
		// output setting sections and their fields
		// (sections are registered for "wporg", each field is registered to a specific section) .
		do_settings_sections( 'wporg' );
		// output save settings button .
		submit_button( 'Save Settings' );
		?>
		</form>
	</div>
	<?php
}

/**
 * Create post type
 */
function custom_post_type() {
	$labels = array(
		'name'               => 'Services',
		'singular_name'      => 'services',
		'add_new'            => 'Add Service',
		'all_items'          => 'All Services',
		'add_new_item'       => 'Add Service',
		'edit_item'          => 'Edit Service',
		'new_item'           => 'New Service',
		'view_item'          => 'View Service',
		'search_item'        => 'Search Service',
		'not_found'          => 'No service found',
		'not_found_in_trash' => 'No service found in trash',
		'parent_item_colon'  => 'Parent Service',
	);
	$args   = array(
		'labels'          => $labels,
		'public'          => true,
		'has_archive'     => true,
		'rewrite'         => true,
		'capability_type' => 'post',
		'menu_position'   => 4,
		'show_in_rest'    => true,
		'supports'        => array(
			'editor',
			'thumbnail',
			'excerpt',
		),
		'taxonomies'      => array( 'category', 'post_tag' ),
	);
	register_post_type( 'service', $args );
}
add_action( 'init', 'custom_post_type' );


/**
 * Description: A short example showing how to add a taxonomy called Course.
 */
function register_taxonomy_course() {
	$labels = array(
		'name'              => _x( 'Course', 'taxonomy general name', 'course' ),
		'singular_name'     => _x( 'Course', 'taxonomy singular name', 'course' ),
		'search_items'      => __( 'Search Courses' ),
		'all_items'         => __( 'All Courses' ),
		'parent_item'       => __( 'Parent Course' ),
		'parent_item_colon' => __( 'Parent Course:' ),
		'edit_item'         => __( 'Edit Course' ),
		'update_item'       => __( 'Update Course' ),
		'view_item'         => __( 'View Course' ),
		'add_new_item'      => __( 'Add New Course' ),
		'seacrh_item'       => __( 'Search Course' ),
		'not_found'         => __( 'No course found' ),
		'new_item_name'     => __( 'New Course Name' ),
		'menu_name'         => __( 'Course' ),
	);
	$args   = array(
		'hierarchical'      => true, // make it hierarchical (like categories) .
		'labels'            => $labels,
		'show_ui'           => true,
		'show_in_rest'      => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'course' ),
	);
	register_taxonomy( 'Course', array( 'service' ), $args );

}

add_action( 'init', 'register_taxonomy_course', 0 );
