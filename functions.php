<?php
/**
 * business-plus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package business-plus
 */

if ( ! function_exists( 'business_plus_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function business_plus_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on business-plus, use a find and replace
	 * to change 'business-plus' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'business-plus', get_template_directory() . '/languages' );

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
    register_nav_menu ('main-nav', 'header-menu');
    register_nav_menu ('foot-nav', 'footer-menu');

    add_theme_support( 'custom-logo', array(
        'height'      => 34,
        'width'       => 164,
        'flex-height' => true,
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
	add_theme_support( 'custom-background', apply_filters( 'business_plus_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'business_plus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function business_plus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'business_plus_content_width', 640 );
}
add_action( 'after_setup_theme', 'business_plus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function business_plus_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'business-plus' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'business-plus' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'business_plus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function business_plus_scripts() {
	wp_enqueue_style( 'business-plus-style', get_stylesheet_uri());
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css');
	wp_enqueue_style( 'carousel-style', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.css');
	wp_enqueue_style( 'carousel-style', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick-theme.css');

	wp_enqueue_script( 'business-plus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js');
    wp_enqueue_script( 'business-plus-script', get_template_directory_uri() . '/js/index.js');
    wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js');
	wp_enqueue_script( 'carousel-script', get_template_directory_uri() . '/node_modules/slick-carousel/slick/slick.min.js');

	wp_enqueue_script( 'business-plus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'business_plus_scripts' );

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

// Creates Movie Reviews Custom Post Type
function about_post_type() {
    $args = array(
        'label' => 'About us',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'about-us'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'about-us', $args );
}
add_action( 'init', 'about_post_type' );

function services_reviews_init() {
    $args = array(
        'label' => 'Services',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'services-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'services-reviews', $args );
}
add_action( 'init', 'services_reviews_init' );

function slider_post_type() {
    $args = array(
        'label' => 'Clients slider',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'slides'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'slides', $args );
}
add_action( 'init', 'slider_post_type' );
