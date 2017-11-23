<?php
/* 
 * Default WooCommerce Setup
 * Setting up WC hooks, as documeted here: http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
 */

// set up the wrapper you want to use...
function custom_theme_wrapper_start() {
  echo '<div id="primary" class="content-area"><main id="main" class="site-main"><div class="container">';
}
function custom_theme_wrapper_end() {
	echo '</div></main></div>';
}

// remove standard wrapper elements...
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
// add in new ones
add_action('woocommerce_before_main_content', 'custom_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'custom_theme_wrapper_end', 10);

//declare this theme is supported on the admin side...
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'woocommerce_support' );


/*
 * Update cart count after AJAX call
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'custom_cart_count_fragments', 10, 1 );

function custom_cart_count_fragments( $fragments ) {
    
    $fragments['.header-cart-count'] = '<span class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
    
    return $fragments;
    
}

/*
 * Remove Sidebar added in by woocommerce
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );