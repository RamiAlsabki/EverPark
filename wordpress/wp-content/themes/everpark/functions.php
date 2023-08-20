<?php
/**
 * EverPark functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EverPark
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function everpark_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on EverPark, use a find and replace
		* to change 'everpark' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'everpark', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'everpark' ),
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
			'everpark_custom_background_args',
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
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'everpark_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function everpark_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'everpark_content_width', 640 );
}
add_action( 'after_setup_theme', 'everpark_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function everpark_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'everpark' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'everpark' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'everpark_widgets_init' );

/**
 * Enqueue scripts and styles.
 */



function everpark_scripts() {
	wp_enqueue_style( 'everpark-style', get_stylesheet_uri(), array(), _S_VERSION );

	/* OPTION 1 (NOT-IN-USE): enqueue bootstrap through CDN */
	// wp_enqueue_style('bootstrap_styles', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css');
	// wp_enqueue_script('bootstrap_scripts', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', array(), '5.3.1', true);
	
	/* OPTION 2 (IN-USE): enqueue bootstrap files */
	wp_enqueue_style('everpark-bootstrap', get_template_directory_uri() . '/style/main.css');

	/* Boostrap icons */
	wp_enqueue_style('bs-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css');

	wp_style_add_data( 'everpark-style', 'rtl', 'replace' );

	wp_enqueue_script( 'everpark-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'everpark_scripts' );


/* Add fonts */

function enqueue_custom_font() {
	wp_register_style('work_sans', 'https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
	wp_enqueue_style('work_sans');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_font');

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


// // Allow SVG in case needed to add crisp clear logo (comes with security concerns)

// add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
// 	global $wp_version;
// 	if ( $wp_version !== '4.7.1' ) {
// 	   return $data;
// 	}

// 	$filetype = wp_check_filetype( $filename, $mimes );
// 	return [
// 		'ext'             => $filetype['ext'],
// 		'type'            => $filetype['type'],
// 		'proper_filename' => $data['proper_filename']
// 	];
//   }, 10, 4 );
  
//   function cc_mime_types( $mimes ){
// 	$mimes['svg'] = 'image/svg+xml';
// 	return $mimes;
//   }
//   add_filter( 'upload_mimes', 'cc_mime_types' );
  
//   function fix_svg() {
// 	echo '<style type="text/css">
// 		  .attachment-266x266, .thumbnail img {
// 			   width: 100% !important;
// 			   height: auto !important;
// 		  }
// 		  </style>';
//   }
//   add_action( 'admin_head', 'fix_svg' );



function custom_theme_customizer( $wp_customize ) {
    // Add a custom section
    $wp_customize->add_section( 'buy_button_section', array(
        'title'    => __( 'Buy Button', 'everpark' ),
        'priority' => 30,
    ) );

    // Add a setting for button text
    $wp_customize->add_setting( 'buy_button_text', array(
        'default'           => 'Buy Now',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    // Add a control for button text
    $wp_customize->add_control( 'buy_button_text', array(
        'label'    => __( 'Button Text', 'your_theme_textdomain' ),
        'section'  => 'buy_button_section',
        'settings' => 'buy_button_text',
        'type'     => 'text',
    ) );

    // Add a setting for button link
    $wp_customize->add_setting( 'buy_button_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    // Add a control for button link
    $wp_customize->add_control( 'buy_button_link', array(
        'label'    => __( 'Button Link', 'everpark' ),
        'section'  => 'buy_button_section',
        'settings' => 'buy_button_link',
        'type'     => 'url',
    ) );

	$wp_customize->add_section( 'video_section', array(
        'title'    => __( 'Video Section', 'your_theme_textdomain' ),
        'priority' => 30,
    ) );

    // Add a setting for video link
    $wp_customize->add_setting( 'video_link', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    // Add a control for video link
    $wp_customize->add_control( 'video_link', array(
        'label'    => __( 'Video Link', 'your_theme_textdomain' ),
        'section'  => 'video_section',
        'settings' => 'video_link',
        'type'     => 'url',
    ) );
	
}
add_action( 'customize_register', 'custom_theme_customizer' );