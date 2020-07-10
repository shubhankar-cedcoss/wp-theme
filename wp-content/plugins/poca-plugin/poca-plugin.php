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
 * Enqueuing scripts
 *
 * @param [string] $hook stores current files .
 */
function poca_enqueue_script() {
	wp_enqueue_script(
		'poca-load',
		plugins_url( '/js/poca.js', __FILE__ ),
		array( 'jquery' ),
		_S_VERSION,
		true
	);
	$title_nonce = wp_create_nonce( 'title_example' );
	wp_localize_script(
		'poca-load',
		'poca_ajax_obj',
		array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce'    => $title_nonce,
		)
	);
}

add_action( 'wp_enqueue_scripts', 'poca_enqueue_script' );


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


function poca_load_more( $post ) {
	$page_per_post = $_POST['post_per_page'];
	$page          = $_POST['page'];
	$args          = array(
		'post_type'      => 'podcast',
		'post_status'    => 'publish',
		'posts_per_page' => $page_per_post,
		'paged'          => $page,
	);

	$loop = new WP_Query( $args );?>
	<div class="row poca-portfolio">
	<?php

	while ( $loop->have_posts() ) {
		$loop->the_post();
		?>
		<div class="col-12 col-md-6 single_gallery_item entre wow fadeInUp" data-wow-delay="0.2s"> 
		<!-- Welcome Music Area -->
			<div class="poca-music-area style-2 d-flex align-items-center flex-wrap">
				<div class="poca-music-thumbnail">
					<?php the_post_thumbnail(); ?>
				</div>
				<div class="poca-music-content text-center">
					<span class="music-published-date mb-2"><?php echo get_the_date(); ?></span>
					<h2><?php the_title(); ?></h2>
				<?php
				$list = wp_get_post_terms( $post->ID, 'Category_taxonomy', array( 'fields' => 'all' ) );
				// print_r($list) .
				foreach ( $list as $taxonomies ) {
					?>   
					<div class="music-meta-data">
						<p>By <a href="#" class="music-author"><?php the_author(); ?></a> | <a href="<?php echo $taxonomies->slug; ?>" class="music-catagory"><?php echo $taxonomies->name; ?></a> | <a href="#" class="music-duration">00:02:56</a></p>
					</div>
				<?php } ?>
					<!-- Music Player -->
					<div class="poca-music-player">
						<audio preload="auto" controls>
						<source src="<?php echo get_template_directory_uri(); ?>/audio/dummy-audio.mp3">
						</audio>
					</div>
					<!-- Likes, Share & Download -->
					<div class="likes-share-download d-flex align-items-center justify-content-between">
						<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Like (29)</a>
						<div>
							<a href="#" class="mr-4"><i class="fa fa-share-alt" aria-hidden="true"></i> Share(04)</a>
							<a href="#"><i class="fa fa-download" aria-hidden="true"></i> Download (12)</a>
						</div>
					</div>
				</div>                    
			</div>
		</div>
		<?php
		wp_reset_postdata();
	}
	?>
	</div>
	<?php
}

add_action( 'wp_ajax_poca_request', 'poca_load_more' );

