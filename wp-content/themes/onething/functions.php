<?php

/**
 * oneThing functions and definitions
 *
 * @package oneThing
 */
if (!function_exists('onething_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function onething_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on oneThing, use a find and replace
         * to change 'onething' to the name of your theme in all the template files
         */
        load_theme_textdomain('onething', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        add_image_size('large-thumb', 1060, 650, true);
        add_image_size('index-thumb', 780, 250, true);


        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'primary' => esc_html__('Primary Menu', 'onething'),
            'social' => __('Social Menu', 'onething'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('onething_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));
    }

endif; // onething_setup
add_action('after_setup_theme', 'onething_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onething_content_width() {
    $GLOBALS['content_width'] = apply_filters('onething_content_width', 640);
}

add_action('after_setup_theme', 'onething_content_width', 0);

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function onething_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'onething'),
        'id' => 'sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer-Widgets', 'onething'),
        'description' => __('footer widgets area appears in the footer of the site.', 'onething'),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}

add_action('widgets_init', 'onething_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function onething_scripts() {
    wp_enqueue_style('onething-style', get_stylesheet_uri());

    if (is_page_template('page-templates/page-no-sidebar.php')) {
        wp_enqueue_style('onething-layout-style', get_template_directory_uri() . '/layouts/no-sidebar.css');
    } else {
        wp_enqueue_style('onething-layout-style', get_template_directory_uri() . '/layouts/content-sidebar.css');
    }

    wp_enqueue_style('my_onething_google_fonts', 'http://fonts.googleapis.com/css?family=Lato:100,400,700,900,400italic,900italic|PT+Serif:400,700,400italic,700italic');

    wp_enqueue_style('my_onething_font_awesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

    wp_enqueue_script('onething-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    // enqueue function call - handle of the function - url of the script_____________________________ -                 - version - true=load in footer //                
    wp_enqueue_script('my-onething-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20150718', true);

    wp_enqueue_script('my-onething-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('my-onething-superfish'), '20140328', true);

    wp_enqueue_script('my-onething-masonry-settings', get_template_directory_uri() . '/js/masonry-settings.js', array('masonry'), '20140328', true);

    wp_enqueue_script('onething-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'onething_scripts');

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
