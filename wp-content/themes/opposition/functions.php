<?php
/**
 * opposition functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package opposition
 */

if ( ! function_exists( 'opposition_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function opposition_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on opposition, use a find and replace
	 * to change 'opposition' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'opposition', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'opposition' ),
		'action' => esc_html__( 'Action Bar', 'opposition' ),
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
	add_theme_support( 'custom-background', apply_filters( 'opposition_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'opposition_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function opposition_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'opposition_content_width', 640 );
}
add_action( 'after_setup_theme', 'opposition_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function opposition_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'opposition' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'opposition' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'opposition_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function opposition_scripts() {
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20160805' );
	wp_enqueue_style( 'opposition-css', get_template_directory_uri() . '/css/opposition.css', array(), '20160805' );
	// wp_enqueue_script( 'opposition-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'opposition-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'opposition-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js', array(), '20160805', true );
	wp_enqueue_script( 'opposition-velocity', get_template_directory_uri() . '/js/velocity.min.js', array(), '20160805', true );
	wp_enqueue_script( 'opposition-sticky', get_template_directory_uri() . '/js/jquery.sticky.js', array(), '20160805', true );
	wp_enqueue_script( 'opposition-fa', 'https://use.fontawesome.com/e9939d5625.js', array(), '20160805', true );
	wp_enqueue_script( 'opposition-boostrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20160805', true );
	wp_enqueue_script( 'opposition-app-js', get_template_directory_uri() . '/js/opposition.js', array(), '20160805', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'opposition_scripts' );
add_image_size( 'member-image', 117, 117, true );
function op_get_featured_count() {
	$meta_query   = WC()->query->get_meta_query();
	$meta_query[] = array(
	    'key'   => '_featured',
	    'value' => 'yes'
	);
	$args = array(
	    'post_type'   =>  'product',
	    'stock'       =>  1,
	    'showposts'   =>  6,
	    'meta_query'  =>  $meta_query,
	);

	$featured_products = new WP_Query( $args );

	return $featured_products->found_posts;
}

/* redirect users to front page after login */
function redirect_to_front_page() {
	global $redirect_to;
	if (!isset($_GET['redirect_to'])) {
		$redirect_to = get_option('siteurl');
	}
}
add_action('login_form', 'redirect_to_front_page');
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="embed-responsive embed-responsive-16by9 post-embed">' . $html . '</div>';
}
function give_linked_images_class($html, $id, $caption, $title, $align, $url, $size, $alt = '' ){
  $classes = 'img'; // separated by spaces, e.g. 'img image-link'

  // check if there are already classes assigned to the anchor
  if ( preg_match('/<a.*? class=".*?">/', $html) ) {
    $html = preg_replace('/(<a.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
  } else {
    $html = preg_replace('/(<a.*?)>/', '$1 class="' . $classes . '" >', $html);
  }
  return $html;
}
add_filter('image_send_to_editor','give_linked_images_class',10,8);
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
