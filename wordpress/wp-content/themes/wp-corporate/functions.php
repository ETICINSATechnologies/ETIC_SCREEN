<?php
/**
 * WP Corporate functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WP_Corporate
 */

if ( ! function_exists( 'wp_corporate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_corporate_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Corporate, use a find and replace
	 * to change 'wp-corporate' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-corporate', get_template_directory() . '/languages' );

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
	add_image_size('wp-corporate-feature-image', 600, 600, true);
	add_image_size('wp-corporate-portfolio-image', 800, 600, true);
	add_image_size('wp-corporate-fullwidth-image', 1170, 600, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wp-corporate' ),
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
	add_theme_support( 'custom-background', apply_filters( 'wp_corporate_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-logo' , array(
	 	'header-text' => array( 'site-title', 'site-description' ),
	 	));

	add_theme_support('woocommerce');

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	if(is_admin()):
		//load js to control function of switch
	function wp_corporate_custom_admin_style($hook){
        if ( 'customize.php' == $hook || 'widgets.php' == $hook ) {

			wp_enqueue_style( 'wp-corporate-custom-control-admin-css', get_template_directory_uri() . '/inc/css/admin-control.css');
			wp_enqueue_script( 'wp-corporate-custom-control-admin-js', get_template_directory_uri().'/inc/js/admin-control.js', array( 'jquery', 'jquery-ui-sortable' ), '20160714', true );
		}
	}
	add_action( 'admin_enqueue_scripts', 'wp_corporate_custom_admin_style' );
	endif;


}

endif;
add_action( 'after_setup_theme', 'wp_corporate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_corporate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_corporate_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_corporate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_corporate_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sidebar', 'wp-corporate' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wp-corporate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) 
		);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Right Sidebar', 'wp-corporate' ),
			'id'            => 'wp-corporate-right-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'wp-corporate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) 
		);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Left Sidebar', 'wp-corporate' ),
			'id'            => 'wp-corporate-left-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'wp-corporate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) 
		);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer One', 'wp-corporate' ),
			'id'            => 'wp-corporate-footer-one',
			'description'   => esc_html__( 'Add widgets here.', 'wp-corporate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) 
		);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer Two', 'wp-corporate' ),
			'id'            => 'wp-corporate-footer-two',
			'description'   => esc_html__( 'Add widgets here.', 'wp-corporate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) 
		);
	register_sidebar( 
		array(
		'name'          => esc_html__( 'Footer Three', 'wp-corporate' ),
		'id'            => 'wp-corporate-footer-three',
		'description'   => esc_html__( 'Add widgets here.', 'wp-corporate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
			) 
		);
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Footer Four', 'wp-corporate' ),
			'id'            => 'wp-corporate-footer-four',
			'description'   => esc_html__( 'Add widgets here.', 'wp-corporate' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
			) 
		);
}
add_action( 'widgets_init', 'wp_corporate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wp_corporate_scripts() {

	wp_enqueue_style('wp-corporate-fonts','//fonts.googleapis.com/css?family=Lobster|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Poppins:300,400,500,600,700|Lato:300,300i,400,400i,700,700i,900,900i');

	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');

	wp_enqueue_style( 'isotope-css', get_template_directory_uri() . '/css/isotope-docs.css');

	wp_enqueue_style('owl-css', get_template_directory_uri() . '/css/owl.carousel.css' );
	
	wp_enqueue_style('animate-css', get_template_directory_uri() . '/css/animate.css' );
	
	wp_enqueue_style( 'wp-corporate-style', get_stylesheet_uri() );
	
	wp_enqueue_style('wp-corporate-responsive-css', get_template_directory_uri() . '/css/responsive.css' );

	if( is_rtl() ) {

		wp_enqueue_style('wp-corporate-rtl-css', get_template_directory_uri() . '/rtl.css' );

	}

	wp_enqueue_script( 'wp-corporate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wp-corporate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'isotope-js', get_template_directory_uri() . '/js/isotope.pkgd.js', array('jquery'), '2.2.2', true );

	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.js', array('jquery'), '3.1.8', true );

	wp_enqueue_script( 'waypoint-js', get_template_directory_uri() . '/js/waypoint.js', array('jquery'), '2.0.3', true );

	wp_enqueue_script( 'counterup-js', get_template_directory_uri() . '/js/jquery.counterup.js', array('jquery'), '2.0.3', true );
	
	wp_enqueue_script( 'classyloader-js', get_template_directory_uri() . '/js/jquery.classyloader.js', array('jquery'), '1.2.3', true );
	
	wp_enqueue_script( 'wp-corporate-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_corporate_scripts' );

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

/**
 * Load Custom Customizer file.
 */
require get_template_directory() . '/inc/wp-corporate-customizer.php';

/**
 * Load Custom function file.
 */
require get_template_directory() . '/inc/wp-corporate-functions.php';

/**
 * Load Custom active callback file.
 */
require get_template_directory() . '/inc/wp-corporate-activecallback.php';

/**
 * Load Custom Switch.
 */
require get_template_directory() . '/inc/controls/custom-switch.php';

/**
 * Load Custom Reorder.
 */
require get_template_directory() . '/inc/controls/custom-section-reorder.php';

/**
 * Load Custom metabox.
 */
require get_template_directory() . '/inc/wp-corporate-metabox.php';
/**
 * Load woo.
 */
require get_template_directory() . '/inc/wp-corporate-woo.php';

/**
 * Load woo.
 */
require get_template_directory() . '/welcome/wp_corporate_about.php';