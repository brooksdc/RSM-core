<?php
/**
 * rsm_core_ functions and definitions
 *
 * @package rsm_core_
 */

/**
 * Disable WP theme text editor for security.
 */
define( 'DISALLOW_FILE_EDIT', true );

/**
 Define common section grid classes
 */
$primary_classes = 'col-sm-16';
$secondary_classes = 'col-sm-7 col-sm-offset-1';

// for reversed desktop layout
$primary_classes_rev = 'col-sm-16 col-sm-push-8';
$secondary_classes_rev = 'col-sm-7 col-sm-pull-16';

/**
 * Set the content width based on the theme's design and stylesheet.
 * WP uses this info to handle image and media embeds better.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'rsm_core_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rsm_core_setup() {

	// Various theme support options
	load_theme_textdomain( 'quantus', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'quantus' ),
		'footer' => __( 'Footer Menu', 'quantus' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5.
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Enable shortcodes in text widgets
	add_filter('widget_text','do_shortcode');

	// Custom image sizes
	add_image_size( 'fullscreen', 1900, 1200, array( 'center', 'center' ) );
	add_image_size( 'masthead', 1900, 600, array( 'center', 'center' ) );
	//add_image_size( 'content-feature', 750, 480, array( 'center', 'center' ) ); //set as default MEDIUM.
	//add_image_size( 'aside-image', 300, 200, array( 'center', 'center' ) ); //set as default THUMBNAIL.
	add_image_size( 'entry-point', 600, 400, array( 'center', 'center' ) );

	// update WP default image dimensions
	update_option( 'thumbnail_size_w', 300 );
	update_option( 'thumbnail_size_h', 300 );
	update_option( 'thumbnail_crop', 1 );

	update_option( 'medium_size_w', 750 );
	update_option( 'medium_size_h', 750 );
	update_option( 'medium_crop', 1 );
}
endif; // rsm_core_setup
add_action( 'after_setup_theme', 'rsm_core_setup' );

/**
 * Register widget area.
 */
function rsm_core_widgets_init() {
	
	register_sidebar( array(
		'name'          => __( 'Blog INDEX Sidebar', 'quantus' ),
		'id'            => 'blog-sidebar',
		'description'   => 'These widgets will be used on the blog sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Blog SINGLE Sidebar', 'quantus' ),
		'id'            => 'blog-single-sidebar',
		'description'   => 'These widgets will be used on the single blog sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'quantus' ),
		'id'            => 'page-sidebar',
		'description'   => 'These widgets will be used on the standard page sidebar.',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	) );
		
	//---
	// The following header/footer widget areas have been designed to give flexibility when developing new themes.
	// You can use arbitrary text or content by "dropping in widgets" to the provided areas, then accounting for them
	// in the theme code.
	//---

	// header widget areas
	register_sidebar( array(
		'name'          => __( 'Header Drop-in Area 1', 'quantus' ),
		'id'            => 'header-dropin-1',
		'description'   => '** Use this area to drop-in arbitrary content to the website header. Be sure to check the current theme template (header.php) to see if this widget area is being used. **',
		'before_widget' => '<div id="%1$s" class="site-header__dropin-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => __( 'Header Drop-in Area 2', 'quantus' ),
		'id'            => 'header-dropin-2',
		'description'   => '** Use this area to drop-in arbitrary content to the website header. Be sure to check the current theme template (header.php) to see if this widget area is being used. **',
		'before_widget' => '<div id="%1$s" class="site-header__dropin-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => __( 'Header Drop-in Area 3', 'quantus' ),
		'id'            => 'header-dropin-3',
		'description'   => '** Use this area to drop-in arbitrary content to the website header. Be sure to check the current theme template (header.php) to see if this widget area is being used. **',
		'before_widget' => '<div id="%1$s" class="site-header__dropin-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );



	// footer widget areas
	register_sidebar( array(
		'name'          => __( 'Footer Drop-in Area 1', 'quantus' ),
		'id'            => 'footer-dropin-1',
		'description'   => '** Be sure to check the theme template (footer.php) to see if this widget area is being used. **',
		'before_widget' => '<div id="%1$s" class="site-footer__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget__title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Drop-in Area 2', 'quantus' ),
		'id'            => 'footer-dropin-2',
		'description'   => '** Be sure to check the theme template (footer.php) to see if this widget area is being used. **',
		'before_widget' => '<div id="%1$s" class="site-footer__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget__title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer Drop-in Area 3', 'quantus' ),
		'id'            => 'footer-dropin-3',
		'description'   => '** Be sure to check the theme template (footer.php) to see if this widget area is being used. **',
		'before_widget' => '<div id="%1$s" class="site-footer__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget__title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Drop-in Area 4', 'quantus' ),
		'id'            => 'footer-dropin-4',
		'description'   => '** Be sure to check the theme template (footer.php) to see if this widget area is being used. **',
		'before_widget' => '<div id="%1$s" class="site-footer__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget__title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Drop-in Area 5', 'quantus' ),
		'id'            => 'footer-dropin-5',
		'description'   => '** Be sure to check the theme template (footer.php) to see if this widget area is being used. **',
		'before_widget' => '<div id="%1$s" class="site-footer__widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget__title">',
		'after_title'   => '</h4>',
	) );
	
}
add_action( 'widgets_init', 'rsm_core_widgets_init' );

/**
 * Add custom meta, etc to top of wp_head
 */
function rsm_core_add_head_tags() {
?>
	
	<?php
	//GTM Snippet activated via theme options.
	if(function_exists('get_field')):
		$gtm_id = get_field('gtm_id', 'option');

		if($gtm_id): ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php _e($gtm_id); ?>');</script>
		<!-- End Google Tag Manager -->
		<?php
		endif;
	endif;
	?>

	<?php
	// ask robots NOT to index the style guide page if it exists
	if(is_page_template('page-style-guide.php')) { ?>
		<meta name="robots" content="noindex, nofollow, noarchive, noodp, noydir" />
	<?php }
	?>

	<?php
	//Custom robots tag for current page
	if(function_exists('get_field')):
		$custom_robots = get_field( 'custom_robots');

		if($custom_robots == 'on') { ?> 
			<meta name="robots" content="noindex, nofollow, noarchive, noodp, noydir" />
		<?php }
	endif;	
	?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php /* using FAVICON Genertaor plugin instead.
	<link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/images/favicon.png" type="image/x-icon" />
	<!--[if IE]><link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/images/favicon.ico" type="image/x-icon" /><![endif]-->
	<link href="<?php echo bloginfo('template_directory'); ?>/images/apple-touch-icon.png" rel="apple-touch-icon" />
	<link href="<?php echo bloginfo('template_directory'); ?>/images/apple-touch-icon-76x76.png" rel="apple-touch-icon" sizes="76x76" />
	<link href="<?php echo bloginfo('template_directory'); ?>/images/apple-touch-icon-120x120.png" rel="apple-touch-icon" sizes="120x120" />
	<link href="<?php echo bloginfo('template_directory'); ?>/images/apple-touch-icon-152x152.png" rel="apple-touch-icon" sizes="152x152" />
	*/ ?>

	<!--[if lt IE 9]>
	<script src="//ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
	<![endif]-->

<?php }
add_action('wp_head', 'rsm_core_add_head_tags', 0);



/**
 * Enqueue scripts and styles.
 */

// FIRST PRIORITY SCRIPTS
function priority_scripts() {

	wp_enqueue_style( 'googlefont', "http://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700|Muli:200,300");
	
	wp_enqueue_style( 'bootstrap-NoGrid-css', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/assets/css/animate.min.css' );
	
	// UPDATED: 2017-11-04. Loading all SCSS components and compiling via the child theme now.
	// This is a base though and can be either loded or NOT using DEQUEUE in the child theme functions.
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.min.css' );
	
	wp_enqueue_style( 'quantus-style', get_stylesheet_uri() );
	wp_enqueue_script( 'modernizr-respond-js', get_template_directory_uri() . '/assets/js/utilities/modernizr-2.8.3-respond-1.4.2.min.js', array(), '', false );
	wp_enqueue_script( 'ie10-viewport-js', get_template_directory_uri() . '/assets/js/utilities/ie10-viewport-bug-workaround.js', array(), '', false );

	// Determine if using IE so we can load in some fixes.
	preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $matches);
	if(count($matches)<2){
		preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
	}
	if(count($matches)>1) { $version = $matches[1];
		//we're using IE. Now conditionally load based on version you need to target.
		if($version<=9) {
			wp_enqueue_style( 'ie9-and-lower', get_template_directory_uri() . '/assets/css/ie9.css' );
		}
	}

	if(function_exists('get_field')):
		$gm_api_key = get_field('google_map_api_key', 'option'); //google maps API
		if($gm_api_key) {  wp_enqueue_script( 'google-map-api-js', 'https://maps.googleapis.com/maps/api/js?key='.$gm_api_key, array(), NULL, false ); }
	endif;

}
add_action( 'wp_enqueue_scripts', 'priority_scripts', 0 );

//SECOND PRIORITY SCRIPTS
function rsm_core_scripts() {

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome-4.6.3/css/font-awesome.min.css' );
	
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), false, true );
	
	//core scripts (touch events (hammer), animation accelleration (velocity), side nav )
	wp_enqueue_script( 'core-initialize-js',  get_template_directory_uri() . '/assets/js/core/initial.js', array(), false, true );
	wp_enqueue_script( 'core-jquery-easing-js',  get_template_directory_uri() . '/assets/js/core/jquery.easing.1.3.js', array('jquery'), false, true );
	wp_enqueue_script( 'core-velocity-js',  get_template_directory_uri() . '/assets/js/core/velocity.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'core-velocity-ui-js',  get_template_directory_uri() . '/assets/js/core/velocity.ui.min.js', array('jquery', 'core-velocity-js'), false, true );
	wp_enqueue_script( 'core-hammer-js',  get_template_directory_uri() . '/assets/js/core/hammer.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'core-hammer-init-js',  get_template_directory_uri() . '/assets/js/core/jquery.hammer.js', array('jquery', 'core-hammer-js'), false, true );
	wp_enqueue_script( 'core-side-nav-js',  get_template_directory_uri() . '/assets/js/core/sideNav.js', array('jquery', 'core-velocity-ui-js', 'core-hammer-init-js'), false, true );

	//utility scripts
	wp_enqueue_script( 'jquery-placeholder',  get_template_directory_uri() . '/assets/js/utilities/jquery.placeholder/jquery.placeholder.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'rem-min',  get_template_directory_uri() . '/assets/js/utilities/rem.min.js', array(), false, true );
	wp_enqueue_script( 'skip-link-focus',  get_template_directory_uri() . '/assets/js/utilities/skip-link-focus-fix.js', array(), false, true );
	wp_enqueue_script( 'jquery-lazy',  get_template_directory_uri() . '/assets/js/utilities/jquery.lazy/jquery.lazy.min.js', array('jquery'), false, true );

	//wp_enqueue_script( 'jquery-sticky-kit',  get_template_directory_uri() . '/assets/js/utilities/jquery.sticky-kit.min.js', array('jquery'), false, true );

	//Here for testing only. These should just be registered, then enqueued as need with a shortcode
	wp_enqueue_style( 'twentytwenty-css', get_template_directory_uri() . '/assets/js/plugins/twentytwenty/twentytwenty-no-compass.css' );
	wp_enqueue_script( 'jquery-event-move',  get_template_directory_uri() . '/assets/js/plugins/twentytwenty/jquery.event.move.js', array('jquery'), false, true );
	wp_enqueue_script( 'twentytwenty-js',  get_template_directory_uri() . '/assets/js/plugins/twentytwenty/jquery.twentytwenty.js', array('jquery'), false, true );

	//other scripts
	wp_enqueue_style( 'owl-carousel-css', get_template_directory_uri() . '/assets/js/plugins/owl/assets/owl.carousel.css' );
	wp_enqueue_script( 'owl-carousel',  get_template_directory_uri() . '/assets/js/plugins/owl/owl.carousel.min.js', array('jquery'), false, true );
	
	wp_enqueue_script( 'rellax-js',  get_template_directory_uri() . '/assets/js/plugins/rellax.min.js', array('jquery'), false, true );
	//wp_enqueue_script( 'parascroll-js',  get_template_directory_uri() . '/assets/js/plugins/parascroll.min.js', array('jquery'), false, true );

	wp_enqueue_style( 'chocolat-css', get_template_directory_uri() . '/assets/js/plugins/chocolat/css/chocolat.css' );
	wp_enqueue_script( 'chocolat-js',  get_template_directory_uri() . '/assets/js/plugins/chocolat/js/jquery.chocolat.min.js', array('jquery'), false, true );

	wp_enqueue_script( 'jquery-waypoints',  get_template_directory_uri() . '/assets/js/plugins/jquery.waypoints.min.js', array('jquery'), false, true );

	wp_enqueue_script( 'imagesloaded',  get_template_directory_uri() . '/assets/js/plugins/masonry/imagesloaded.pkgd.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'jquery-masonry',  get_template_directory_uri() . '/assets/js/plugins/masonry/masonry.pkgd.min.js', array('jquery'), false, true );

	wp_enqueue_script( 'custom-js',  get_template_directory_uri() . '/assets/js/custom.js', array('jquery', 'jquery-lazy', 'rellax-js', 'chocolat-js', 'imagesloaded', 'jquery-masonry', 'jquery-waypoints'), false, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rsm_core_scripts', 5 );



/**
 * Include extra functions, utilities and custom hooks
 */

// Custom login screen 
require get_template_directory() . '/inc/custom_login_screen.php';

// Custom functions
require get_template_directory() . '/inc/custom-functions.php';

// Custom WooCommerce functions
require get_template_directory() . '/inc/custom-woocommerce-functions.php';

// Custom shortcodes
require get_template_directory() . '/inc/custom-shortcodes.php';

// Custom template hooks for this theme.
require get_template_directory() . '/inc/template-hooks.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom WP functions
require get_template_directory() . '/inc/extras.php';

// Customizer additions.
//require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
//require get_template_directory() . '/inc/jetpack.php';
