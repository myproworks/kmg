<?php

if ( ! function_exists( 'kmg_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kmg_setup() {
		/**
		 * Load up our required theme files.
		 */
		require( get_template_directory() . '/frameworks/widgets/widget_about.php' );
		require( get_template_directory() . '/frameworks/widgets/widget_contact.php' );


		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replace
		 * to change 'kmg' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kmg', get_template_directory() . '/languages' );

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
		set_post_thumbnail_size( 1568, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'kmg' ),
				'footer' => __( 'Footer Menu', 'kmg' ),
				'social' => __( 'Social Links Menu', 'kmg' ),
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
				'script',
				'style',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 190,
				'width'       => 190,
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		
	}
endif;

add_action( 'after_setup_theme', 'kmg_setup' );
/**
 * Enqueue scripts and styles.
 */
function kmg_scripts() { 
    wp_enqueue_style( 'style-animate',  get_template_directory_uri() . '/css/animate.min.css' );  
    wp_enqueue_style( 'style-bootstrap',  get_template_directory_uri() . '/css/bootstrap.min.css' ); 
    wp_enqueue_style( 'style-cubeportfolio',  get_template_directory_uri() . '/css/cubeportfolio.min.css' ); 
    wp_enqueue_style( 'style-fawesome',  get_template_directory_uri() . '/css/font-awesome.css' ); 
    wp_enqueue_style( 'style-fancybox',  get_template_directory_uri() . '/css/jquery.fancybox.min.css' );  
    wp_enqueue_style( 'style-magnific',  get_template_directory_uri() . '/css/magnific-popup.min.css' );  
    wp_enqueue_style( 'style-owlcss',  get_template_directory_uri() . '/css/owl-carousel.min.css' );
    wp_enqueue_style( 'style-slicknav',  get_template_directory_uri() . '/css/slicknav.min.css' );
    wp_enqueue_style( 'style-reset',  get_template_directory_uri() . '/css/reset.css' );
    wp_enqueue_style( 'style-responsive',  get_template_directory_uri() . '/css/responsive.css' );
	wp_enqueue_style( 'style',  get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ));
	
	wp_enqueue_script( 'jquery-js', get_template_directory_uri(). '/js/jquery.min.js', array(), '1.12.4', true );
	wp_enqueue_script( 'migrate-js', get_template_directory_uri(). '/js/jquery-migrate-3.0.0.js', array(), '3.0.0', true );
	wp_enqueue_script( 'popper-js', get_template_directory_uri(). '/js/popper.min.js', array(), '', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true );
	

	wp_enqueue_script( 'cubeportfolio-js', get_template_directory_uri() . '/js/cubeportfolio.min.js', array(), '', true );
	wp_enqueue_script( 'magnific-js', get_template_directory_uri() . '/js/magnific-popup.min.js', array(), '', true );
	wp_enqueue_script( 'modernizr-js', get_template_directory_uri() . '/js/modernizr.min.js', array(), '', true );
	wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/js/popper.min.js', array(), '', true );
	wp_enqueue_script( 'scrollup-js', get_template_directory_uri() . '/js/scrollup.js', array(), '', true );
	wp_enqueue_script( 'slicknav-js', get_template_directory_uri() . '/js/slicknav.min.js', array(), '', true );
	wp_enqueue_script( 'waypoints-js', get_template_directory_uri() . '/js/waypoints.min.js', array(), '', true );
	wp_enqueue_script( 'owl-carousel-js', get_template_directory_uri() . '/js/owl-carousel.min.js', array(), '', true );
	wp_enqueue_script( 'easing-js', get_template_directory_uri() . '/js/easing.min.js', array(), '', true );
	wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/js/jquery-fancybox.min.js', array(), '', true );
	wp_enqueue_script( 'custom', get_template_directory_uri(). '/js/active.js', array(), '', true );

}
add_action( 'wp_enqueue_scripts', 'kmg_scripts' );

/**
 * Add custom class to all <li> in parent type menu.
 * In wp_nav_menu()-> args need to add: 
 * 'add_li_class' => 'name_of_class'
 * 
 */
// function add_additional_class_on_li($classes, $item, $args) {
//     if(isset($args->add_li_class)) {
//         $classes[] = $args->add_li_class;
//     }
//     return $classes;
// }
// add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// Add custom class to a tag <a> if it has an inner <ul>.
// function add_classname_to_parent_nav_link($atts, $item) {

//     // add class only on parent
//     if($item->menu_item_parent == 0) {
//         $atts['class'] = 'icon-active';
//     }   
//     return $atts;   
// }
// add_filter('nav_menu_link_attributes', 'add_classname_to_parent_nav_link', 10, 2);

/**
 * Add custom class to <li> if it is a parent.
 * all elements of field "classes" of a menu item get join together and render to class attribute of element in HTML
 */

add_filter('wp_nav_menu_objects', function ($items) {
    $hasSub = function ($menu_item_id, &$items) {
        foreach ($items as $item) {
            if ($item->menu_item_parent && $item->menu_item_parent==$menu_item_id) {
                return true;
            }
        }
        return false;
    };

    foreach ($items as &$item) {
        if ($hasSub($item->ID, $items)) {
            $item->classes[] = 'icon-active';
        }
    }
    return $items;
});

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kmg_widgets_init(){
	$args = array( 
		'name'          => esc_html__( 'Sidebar', 'kmg' ),
		'id'            => "sidebar-1",
		'description'   => '',
		'class'         => '',	
//		'before_widget' => '<li id="%1$s" class="widget %2$s">',
//		'after_widget'  => "</li>\n",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => "</h3>\n",
		'before_sidebar' => '', 
		'after_sidebar'  => '', 
	 );

	register_sidebar( $args );

	$args = array( 
		'name'          => esc_html__( 'Footer', 'kmg' ),
		'id'            => 'footer-1',
		'description'   => '',
		'class'         => '',	
//		'before_widget' => '<li id="%1$s" class="widget %2$s">',
//		'after_widget'  => "</li>\n",
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => "</h3>\n",
		'before_sidebar' => '', 
		'after_sidebar'  => '', 
	 );

	register_sidebar( $args );
}
add_action( 'widgets_init', 'kmg_widgets_init' );
<<<<<<<
/**
 *
 */
function mainSliderOnHomePage(){

	$args = array (
		'label'  => null,
		'labels' => [
			'name'               => __( 'Slider on the home page', 'kmg' ),
			'singular_name'      => __( 'Slider', 'kmg' ),
			'add_new'            => __( 'Add a slide', 'kmg' ),
			'add_new_item'       => __( 'Adding a new slide', 'kmg' ),
			'edit_item'          => __( 'Edit slide', 'kmg' ),
			'new_item'           => __( 'New Slide', 'kmg' ),
			'view_item'          => __( 'View slide', 'kmg' ),
			'search_items'       => __( 'Search slide', 'kmg' ),
			'not_found'          => __( 'Not found', 'kmg' ),
			'not_found_in_trash' => __( 'Not found in trash', 'kmg' ),
			'menu_name'          => __( 'Main Slider', 'kmg' ),
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => null,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-format-video',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail','excerpt' ],
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	);

	register_post_type( 'mainSlider', $args );
}
add_action( 'init', 'mainSliderOnHomePage' );

function portfolio(){
	$args = array(
		'label'  => null,
		'labels' => [
			'name'               => __( 'Pictures of your portfolio', 'kmg' ),
			'singular_name'      => __( 'Picture', 'kmg' ),
			'add_new'            => __( 'Add a picture', 'kmg' ),
			'add_new_item'       => __( 'Adding a new picture', 'kmg' ),
			'edit_item'          => __( 'Edit work', 'kmg' ),
			'new_item'           => __( 'New picture', 'kmg' ),
			'view_item'          => __( 'View picture', 'kmg' ),
			'search_items'       => __( 'Search picture', 'kmg' ),
			'not_found'          => __( 'Not found', 'kmg' ),
			'not_found_in_trash' => __( 'Not found in trash', 'kmg' ),
			'menu_name'          => __( 'Portfolio', 'kmg' ),
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => null,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-images-alt',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail','excerpt' ],
		'taxonomies'          => ['portfolio'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	);
	register_post_type( 'our_work', $args );

	$taxonomy_args = array(
		'label'                 => '', 
		'labels'                => [
			'name'              => __( 'Categories', 'kmg' ),
			'singular_name'     => __( 'Genre', 'kmg' ),
			'search_items'      => __( 'Search Genres', 'kmg' ),
			'all_items'         => __( 'All Genres', 'kmg' ),
			'view_item '        => __( 'View Genre', 'kmg' ),
			'parent_item'       => 'Parent Genre',
			'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => __( 'Edit Genre', 'kmg' ),
			'update_item'       => __( 'Update Genre', 'kmg' ),
			'add_new_item'      => __( 'Add New Genre', 'kmg' ),
			'new_item_name'     => __( 'New Genre Name', 'kmg' ),
			'menu_name'         => __( 'Categories', 'kmg' ),
		],
		'description'           => '', 
		'public'                => true,
		'hierarchical'          => true,
	);

	register_taxonomy( 'portfolio', 'our_work', $taxonomy_args );
}
add_action( 'init', 'portfolio' );
=======
/**
 *
 */
function mainSliderOnHomePage(){

	$args = array (
		'label'  => null,
		'labels' => [
			'name'               => __( 'Slider on the home page', 'kmg' ),
			'singular_name'      => __( 'Slider', 'kmg' ),
			'add_new'            => __( 'Add a slide', 'kmg' ),
			'add_new_item'       => __( 'Adding a new slide', 'kmg' ),
			'edit_item'          => __( 'Edit slide', 'kmg' ),
			'new_item'           => __( 'New Slide', 'kmg' ),
			'view_item'          => __( 'View slide', 'kmg' ),
			'search_items'       => __( 'Search slide', 'kmg' ),
			'not_found'          => __( 'Not found', 'kmg' ),
			'not_found_in_trash' => __( 'Not found in trash', 'kmg' ),
			'menu_name'          => __( 'Main Slider', 'kmg' ),
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => null,
		'menu_position'       => 10,
		'menu_icon'           => 'dashicons-format-video',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail','excerpt' ],
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	);

	register_post_type( 'mainSlider', $args );
}
add_action( 'init', 'mainSliderOnHomePage' );
>>>>>>>