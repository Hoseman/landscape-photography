<?php
/**
 * Landscape Photography functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Landscape_Photography
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'landscape_photography_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function landscape_photography_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Landscape Photography, use a find and replace
		 * to change 'landscape-photography' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'landscape-photography', get_template_directory() . '/languages' );

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
        set_post_thumbnail_size( 2000, 1356 );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'landscape-photography' ),
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
				'landscape_photography_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'landscape_photography_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function landscape_photography_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'landscape_photography_content_width', 640 );
}
add_action( 'after_setup_theme', 'landscape_photography_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function landscape_photography_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'landscape-photography' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'landscape-photography' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'landscape_photography_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function landscape_photography_scripts() {
	wp_enqueue_style( 'landscape-photography-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'landscape-photography-style', 'rtl', 'replace' );

	wp_enqueue_script( 'landscape-photography-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'landscape-photography-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

    wp_enqueue_script( 'jquery3.5.1', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js');

//    wp_enqueue_script('my-jquery-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', array('jquery'), 1.0, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'landscape_photography_scripts' );

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

/* custom widget */

// The widget class
class ah_recent_posts extends WP_Widget {

    // Main constructor
    public function __construct() {
        parent::__construct(
            'ah_recent_posts',
            __( 'Recent Posts With Thumbnails', 'text_domain' ),
            array(
                'customize_selective_refresh' => true,
            )
        );
    }

    // The widget form (for the backend )
    public function form( $instance) {}

    // Update widget settings
    public function update($new_instance, $old_instance) {}

    public function recentPostsDisplay(){
        $recent_posts = wp_get_recent_posts();
        echo "<ul>";
        foreach( $recent_posts as $recent ){

            $post_slug = get_post_field( 'post_name', get_post() );



            if($recent['post_status']=="publish"){

//                if($recent["post_title"] != the_title()) {
//                    echo $post_slug;
//                }

                $recent_posts_title = "<span class='recent-post-title'>" . $recent["post_title"] . "</span>";


                if ( has_post_thumbnail($recent["ID"])) {
                    echo '<li>
		                <a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   get_the_post_thumbnail($recent["ID"], 'medium'). $recent_posts_title .'</a></li> ';
                }else{
                    echo '<li>
		                <a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent_posts_title .'</a></li> ';
                }
            }
        }
        echo "</ul>";
    }

    // Display the widget
    public function widget( $args, $instance ) {
        $this->recentPostsDisplay();
    }
}

// Register the widget
function my_register_custom_widget() {
    register_widget( 'ah_recent_posts' );
}
add_action( 'widgets_init', 'my_register_custom_widget' );

/* custom widget */

/* custom login details */
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'ACH Creative Photography';
}
add_filter( 'login_headertext', 'my_login_logo_url_title' );

function my_login_logo() {
?>
    <style type="text/css">
        body {
            background:#212326 !important;
        }
        #nav {
            text-align:center !important;
            margin-right: 7px !important;
        }
        #backtoblog {
            text-align:center !important;
            margin: 8px 7px 8px 0px !important;
        }
        #nav a, #backtoblog a {
            color:#999 !important;
        }
        .login #login h1 a {
            background-image:url("https://photography.achcreative.info/wp-content/uploads/2020/06/cropped-ach-logo-300x71.png");
            background-size: 240px;
            margin: 0 auto;
            width:100%;
        }
        .wp-core-ui .button-primary {
            background:#212326 !important;
            border: 0px solid #212326 !important;
            color:#fff !important;
        }
        input {
            border-radius:0px !important;
        }
        .wp-core-ui .button-secondary {
            color: #212326 !important;
        }
        .login #login_error, .login .message, .login .success {
            border-left: 0px solid #212326 !important;

        }
    </style>
<?php
}
add_action('login_enqueue_scripts','my_login_logo');

/* custom login details */

/* Remove default jquery */
//add_filter( 'wp_enqueue_scripts', 'change_default_jquery', PHP_INT_MAX );
//
//function change_default_jquery( ){
//	if ( !is_admin() ) {
//		wp_dequeue_script( 'jquery');
//		wp_deregister_script( 'jquery');
//	}
//}
/* Remove default jquery */

/* enqueue custom styles */
function ah_enqueue(){
    $uri = get_template_directory_uri();
    wp_register_style('ah_google_fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;500&display=swap');
    wp_register_style('ah_bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
    wp_register_style('ah_font_awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_register_style('ah_hamburger', $uri . '/css/hamburgers.css');
    wp_register_style('ah_main', $uri . '/css/main.css');

    wp_enqueue_style('ah_google_fonts');
    wp_enqueue_style('ah_bootstrap');
    wp_enqueue_style('ah_font_awesome');
    wp_enqueue_style('ah_hamburger');
    wp_enqueue_style('ah_main');

    wp_register_script('ah_jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js', [], false, true);
    wp_register_script('ah_popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
    wp_register_script('ah_bootstrapjs', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', [], false, true);
    wp_register_script('ah_mainjs', $uri . '/js/main.js', [], false, true);

    wp_enqueue_script('ah_jquery');
    wp_enqueue_script('ah_popper');
    wp_enqueue_script('ah_bootstrapjs');
    wp_enqueue_script('ah_mainjs');
}

add_action( 'wp_enqueue_scripts', 'ah_enqueue' );
/* enqueue custom styles */



/* custom post types */

function cptui_register_my_cpts() {

    /**
     * Post Type: Home Page Sliders.
     */

    $labels = [
        "name" => __( "Home Page Sliders", "landscape-photography" ),
        "singular_name" => __( "Home Page Slider", "landscape-photography" ),
        "menu_name" => __( "Home Page Slider", "landscape-photography" ),
        "featured_image" => __( "Add a new image for the slider", "landscape-photography" ),
        "set_featured_image" => __( "Click to add new image", "landscape-photography" ),
    ];

    $args = [
        "label" => __( "Home Page Sliders", "landscape-photography" ),
        "labels" => $labels,
        "description" => "Add images to the main Home Page Slider",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "home_page_slider", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-format-gallery",
        "supports" => [ "title", "thumbnail" ],
    ];

    register_post_type( "home_page_slider", $args );

    /**
     * Post Type: Gallery Images.
     */

    $labels = [
        "name" => __( "Gallery Images", "landscape-photography" ),
        "singular_name" => __( "Gallery Image", "landscape-photography" ),
        "menu_name" => __( "Gallery", "landscape-photography" ),
    ];

    $args = [
        "label" => __( "Gallery Images", "landscape-photography" ),
        "labels" => $labels,
        "description" => "Add images to the gallery",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "photography_gallery", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-format-video",
        "supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
        "taxonomies" => [ "category", "post_tag" ],
    ];

    register_post_type( "photography_gallery", $args );

    /**
     * Post Type: Box Menus.
     */

    $labels = [
        "name" => __( "Box Menus", "landscape-photography" ),
        "singular_name" => __( "Box Menu", "landscape-photography" ),
        "menu_name" => __( "Box Menu", "landscape-photography" ),
    ];

    $args = [
        "label" => __( "Box Menus", "landscape-photography" ),
        "labels" => $labels,
        "description" => "Create a new box menu",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "box_menu", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-star-filled",
        "supports" => [ "title", "thumbnail" ],
    ];

    register_post_type( "box_menu", $args );

    /**
     * Post Type: Box Menu Alt.
     */

    $labels = [
        "name" => __( "Box Menu Alt", "landscape-photography" ),
        "singular_name" => __( "Box Menu Alt", "landscape-photography" ),
    ];

    $args = [
        "label" => __( "Box Menu Alt", "landscape-photography" ),
        "labels" => $labels,
        "description" => "Add an alternative box menu",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "box_menu_alt", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-star-filled",
        "supports" => [ "title", "thumbnail" ],
    ];

    register_post_type( "box_menu_alt", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_cpts_home_page_slider() {

    /**
     * Post Type: Home Page Sliders.
     */

    $labels = [
        "name" => __( "Home Page Sliders", "landscape-photography" ),
        "singular_name" => __( "Home Page Slider", "landscape-photography" ),
        "menu_name" => __( "Home Page Slider", "landscape-photography" ),
        "featured_image" => __( "Add a new image for the slider", "landscape-photography" ),
        "set_featured_image" => __( "Click to add new image", "landscape-photography" ),
    ];

    $args = [
        "label" => __( "Home Page Sliders", "landscape-photography" ),
        "labels" => $labels,
        "description" => "Add images to the main Home Page Slider",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "home_page_slider", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-format-gallery",
        "supports" => [ "title", "thumbnail" ],
    ];

    register_post_type( "home_page_slider", $args );
}

add_action( 'init', 'cptui_register_my_cpts_home_page_slider' );


function cptui_register_my_cpts_photography_gallery() {

    /**
     * Post Type: Gallery Images.
     */

    $labels = [
        "name" => __( "Gallery Images", "landscape-photography" ),
        "singular_name" => __( "Gallery Image", "landscape-photography" ),
        "menu_name" => __( "Gallery", "landscape-photography" ),
    ];

    $args = [
        "label" => __( "Gallery Images", "landscape-photography" ),
        "labels" => $labels,
        "description" => "Add images to the gallery",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "photography_gallery", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-format-video",
        "supports" => [ "title", "editor", "thumbnail", "custom-fields" ],
        "taxonomies" => [ "category", "post_tag" ],
    ];

    register_post_type( "photography_gallery", $args );
}

add_action( 'init', 'cptui_register_my_cpts_photography_gallery' );

function cptui_register_my_cpts_box_menu() {

    /**
     * Post Type: Box Menus.
     */

    $labels = [
        "name" => __( "Box Menus", "landscape-photography" ),
        "singular_name" => __( "Box Menu", "landscape-photography" ),
        "menu_name" => __( "Box Menu", "landscape-photography" ),
    ];

    $args = [
        "label" => __( "Box Menus", "landscape-photography" ),
        "labels" => $labels,
        "description" => "Create a new box menu",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "box_menu", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-star-filled",
        "supports" => [ "title", "thumbnail" ],
    ];

    register_post_type( "box_menu", $args );
}

add_action( 'init', 'cptui_register_my_cpts_box_menu' );



function cptui_register_my_cpts_box_menu_alt() {

    /**
     * Post Type: Box Menu Alt.
     */

    $labels = [
        "name" => __( "Box Menu Alt", "landscape-photography" ),
        "singular_name" => __( "Box Menu Alt", "landscape-photography" ),
    ];

    $args = [
        "label" => __( "Box Menu Alt", "landscape-photography" ),
        "labels" => $labels,
        "description" => "Add an alternative box menu",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "box_menu_alt", "with_front" => true ],
        "query_var" => true,
        "menu_icon" => "dashicons-star-filled",
        "supports" => [ "title", "thumbnail" ],
    ];

    register_post_type( "box_menu_alt", $args );
}

add_action( 'init', 'cptui_register_my_cpts_box_menu_alt' );




/* custom post types */


/* Advanced Custom Fields */

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5ed7f78ca1c04',
        'title' => 'Box Menu',
        'fields' => array(
            array(
                'key' => 'field_5ed7f7a326143',
                'label' => 'Box URL',
                'name' => 'box_url',
                'type' => 'url',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'http://',
                'placeholder' => 'Add a URL here',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'box_menu',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5ee28f2d6e1ec',
        'title' => 'Box Menu Alternative',
        'fields' => array(
            array(
                'key' => 'field_5ee28f41a3abe',
                'label' => 'Box URL',
                'name' => 'box_url',
                'type' => 'url',
                'instructions' => 'Add a URL',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'box_menu_alt',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5ed981b28552d',
        'title' => 'Gallery',
        'fields' => array(
            array(
                'key' => 'field_5ee39721ddc16',
                'label' => 'Camera Exif Data',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5ed981c37de12',
                'label' => 'Camera Make',
                'name' => 'camera_make',
                'type' => 'select',
                'instructions' => 'Select camera make',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'Nikon D850' => 'Nikon D850',
                    'Nikon D5500' => 'Nikon D5500',
                ),
                'default_value' => 'Nikon D5500',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5ed982437de13',
                'label' => 'Camera Lens',
                'name' => 'camera_lens',
                'type' => 'select',
                'instructions' => 'Select Camera Lens',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    '18.0-70.0 mm f/3.5-4.5' => '18.0-70.0 mm f/3.5-4.5',
                    '24.0-70.0 mm f2.8' => '24.0-70.0 mm f2.8',
                ),
                'default_value' => '18.0-70.0 mm f/3.5-4.5',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_5ed982bb7de14',
                'label' => 'Aperture',
                'name' => 'aperture',
                'type' => 'text',
                'instructions' => 'Add aperture settings',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5ed982dd7de15',
                'label' => 'Shutter Speed',
                'name' => 'shutter_speed',
                'type' => 'text',
                'instructions' => 'Add shutter speed settings',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5ed9830f7de16',
                'label' => 'Focal Length',
                'name' => 'focal_length',
                'type' => 'text',
                'instructions' => 'Add focal length',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5ed983257de17',
                'label' => 'ISO',
                'name' => 'iso',
                'type' => 'text',
                'instructions' => 'Add ISO settings',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5ed9852c66c77',
                'label' => 'Date',
                'name' => 'date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'display_format' => 'd/m/Y',
                'return_format' => 'd/m/Y',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_5ee3975addc17',
                'label' => 'Gallery Single Page Image',
                'name' => '',
                'type' => 'tab',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'placement' => 'top',
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_5ee3968bddc15',
                'label' => 'Single Page Gallery Image',
                'name' => 'single_page_gallery_image',
                'type' => 'image',
                'instructions' => 'Upload an image (1500 x 1030px). This is for the gallery single page. Image must be premium quality',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'full',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'photography_gallery',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5ed51e2cdbfcb',
        'title' => 'Main Slider',
        'fields' => array(
            array(
                'key' => 'field_5ed51f02c7d86',
                'label' => 'Slider Subtitle',
                'name' => 'slider_subtitle',
                'type' => 'text',
                'instructions' => 'Add a subtitle',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'By Andrew Hosegood',
                'placeholder' => 'Add subtitle here...',
                'prepend' => '',
                'append' => '',
                'maxlength' => 100,
            ),
            array(
                'key' => 'field_5ed51f69c7d87',
                'label' => 'Slider Button Text',
                'name' => 'slider_button_text',
                'type' => 'text',
                'instructions' => 'Add slider button text',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 'View Gallery',
                'placeholder' => 'Add text here...',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'home_page_slider',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5edce6ea66587',
        'title' => 'Posts',
        'fields' => array(
            array(
                'key' => 'field_5edce6f38c3e7',
                'label' => 'Short Description',
                'name' => 'short_description',
                'type' => 'text',
                'instructions' => 'Add a short description here',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_5edfb5489b317',
                'label' => 'Post Banner',
                'name' => 'post_banner',
                'type' => 'image',
                'instructions' => 'Add the main banner for your posts here...',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'large',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;
/* Advanced Custom Fields */