<?php
/**
 * poca functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package poca
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'poca_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function poca_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on poca, use a find and replace
		 * to change 'poca' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'poca', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'poca' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'poca_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'    => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'poca_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function poca_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'poca_content_width', 640 );
}
add_action( 'after_setup_theme', 'poca_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function poca_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'poca' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'poca' ),
			'before_widget' => '<div class="sidebar-area mt-5">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'poca_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function poca_scripts() {
	wp_enqueue_script( 'poca-jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-popper', get_template_directory_uri() . '/js/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-images', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-jarallax-video', get_template_directory_uri() . '/js/jarallax-video.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-jarallax', get_template_directory_uri() . '/js/jarallax.min.js', array(), _S_VERSION, true );	
	wp_enqueue_script( 'poca-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-bundle', get_template_directory_uri() . '/js/poca.bundle.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-wow', get_template_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-active', get_template_directory_uri() . '/js/default-assets/active.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-audioplayer', get_template_directory_uri() . '/js/default-assets/audioplayer.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-console', get_template_directory_uri() . '/js/default-assets/avoid.console.error.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'poca-scrollup', get_template_directory_uri() . '/js/default-assets/jquery.scrollup.min.js', array(), _S_VERSION, true );

	

	wp_style_add_data( 'poca-style', 'rtl', 'replace' );
	

	wp_enqueue_style( 'poca-audioplayer', get_template_directory_uri() . '/css/default-assets/audioplayer.css' , array(), _S_VERSION );
	wp_enqueue_style( 'poca-classy', get_template_directory_uri() . '/css/default-assets/classy-nav.css' , array(), _S_VERSION );
	wp_enqueue_style( 'poca-fonts', get_template_directory_uri() . '/css/default-assets/hkgrotesk-fonts.css' , array(), _S_VERSION );
	wp_enqueue_style( 'poca-animate', get_template_directory_uri() . '/css/animate.css' , array(), _S_VERSION );
	wp_enqueue_style( 'poca-min', get_template_directory_uri() . '/css/bootstrap.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'poca-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'poca-carousel', get_template_directory_uri() . '/css/owl.carousel.min.css' , array(), _S_VERSION );
	wp_enqueue_style( 'poca-style', get_template_directory_uri(). '/style.css' , array(), _S_VERSION );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'poca_scripts' );

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

// Customize widgets .
/**require get_stylesheet_directory() . '/inc/class-recent-post.php';
new Recent_Post(); */

// Customize widgets .
/**require get_stylesheet_directory() . '/inc/class-categories.php';
new WP_Custom_Categories(); */


//using callback to change just html output on a comment
//html5 comment
function my_comments_callback($comment, $args, $depth){
	//checks if were using a div or ol|ul for our output
	
	?>
	<li class="single_comment_area">
		<!-- Comment Content -->
		<?php 
			if($comment->comment_approved == '0') {

			}
		?>
		<div class="comment-content d-flex">
			<!-- Comment Author -->
			<div class="comment-author">
				<?php echo get_avatar($comment, $size='60'); ?>
			</div>
			<!-- Comment Meta -->
			<div class="comment-meta">
				<a href="#" class="post-date"><?php comment_date(); ?></a>
				<h5><?php comment_author(); ?></h5>
				<p><?php comment_text(); ?></p>
				<a href="#" class="like">Like</a>
				<!-- <a href="#" class="reply">Reply</a> -->
				<?php comment_reply_link( array_merge($args, array(
					'reply_text' => __('Reply', 'textdomain'),
					'depth'      => $depth,
					)
				));?>
			</div>
		</div>
	
	</li>
		<?php 
}

/**
 * Code to reorder input field
 */
function wpb_move_comment_field_to_bottom( $fields ) {
	$comment = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment;

	$cookie = $fields['cookies'];
	unset( $fields['cookies']);
	$fields['cookies'] = $cookie;

	return $fields;

	}
	 
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

/**
 * Code to add div with class row in comment form
 */
function comment_before_fields() {
    echo '<div class="row">';
}
add_action('comment_form_before_fields', 'comment_before_fields');

function comment_after_fields() {
    echo '</div>';
}
add_action('comment_form_after_fields', 'comment_after_fields');

?>