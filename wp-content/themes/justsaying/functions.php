<?php
/**
 * justsaying functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package justsaying
 */

if ( ! function_exists( 'justsaying_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function justsaying_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on justsaying, use a find and replace
	 * to change 'justsaying' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'justsaying', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'justsaying' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
        // following commented out by Justin (as per lynda tut
//	add_theme_support( 'custom-background', apply_filters( 'justsaying_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
}
endif; // justsaying_setup
add_action( 'after_setup_theme', 'justsaying_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function justsaying_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'justsaying_content_width', 600 );
}
add_action( 'after_setup_theme', 'justsaying_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function justsaying_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'justsaying' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'justsaying_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function justsaying_scripts() {
	
        wp_enqueue_style( 'justsaying-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css');
    
        wp_enqueue_style( 'justsaying-style', get_stylesheet_uri() );
        
	wp_enqueue_style( 'justsaying-googlefonts', 'http://fonts.googleapis.com/css?family=Lato:400,100,400italic,700,900,900italic|PT+Serif:400,400italic,700,700italic');
        
	wp_enqueue_style( 'justsaying-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
        
	 wp_enqueue_style('bxslider-style', get_template_directory_uri() . '/jquery.bxslider.css');
        
	

	wp_enqueue_script( 'justsaying-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
        
        // enqueue function call - handle of the function - url of the script_____________________________ -                 - version - true=load in footer //                
    wp_enqueue_script('justsaying-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20150810', true);

    wp_enqueue_script('justsaying-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('justsaying-superfish'), '20150810', true);

    wp_enqueue_script('justsaying-masonry-settings', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20150810', true);
    
    wp_enqueue_script('justsaying-bxslider-settings', get_template_directory_uri() . '/js/bxslider.js', array(), '20150816', true);

	wp_enqueue_script( 'justsaying-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150810', true );
	
        wp_enqueue_script( 'justsaying-bootstrapjs', get_template_directory_uri() . 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array(), '20150807', true );

        
        
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

function create_Hotel_review() {
    register_post_type( 'Hotel-reviews',
        array('labels' => array('name' => 'Hotel Reviews','singular_name' => 'Hotel Reviewsie',
                'add_new' => 'Add New Review','add_new_item' => 'Add New Hotel Review','edit' => 'Edit',
                'edit_item' => 'Edit Hotel Review',
                'new_item' => 'New Hotel Review',
                'view' => 'View',
                'view_item' => 'View Hotel Review',
                'search_items' => 'Search Hotel Reviews',
                'not_found' => 'No Hotel Reviews found',
                'not_found_in_trash' => 'No Hotel Reviews found in Trash',
                'parent' => 'Parent Hotel Review'
            ),
 
            'public' => true,
            'menu_position' => 5,
            'supports' => array('custom-fields' ),
            'taxonomies' => array( '' ),
            'menu_icon' => 'dashicons-schedule',
            'has_archive' => true
        )
    );
}


add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query )   {

	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'page', 'album', 'movie', 'quote' ) );

	return $query;
}


add_action( 'wp_enqueue_scripts', 'justsaying_scripts' );

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

require_once('wp_bootstrap_navwalker.php');