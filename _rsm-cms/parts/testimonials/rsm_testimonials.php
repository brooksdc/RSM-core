<?php
/*
 * Part: Testimonials
 * Ver: 1.0
 */

//---
// Custom Post Type
//---

add_action( 'init', 'register_custom_rsm_testimonial' );

function register_custom_rsm_testimonial() {

    $cpt_name_plural = 'Testimonials';
    $cpt_name_singular = 'Testimonial';
    $cpt_key = 'rsm_testimonial';

    $labels = array( 
        'name' => _x( $cpt_name_plural, $cpt_key ),
        'singular_name' => _x( $cpt_name_singular, $cpt_key ),
        'add_new' => _x( 'Add New', $cpt_key ),
        'add_new_item' => _x( 'Add New '.$cpt_name_singular, $cpt_key ),
        'edit_item' => _x( 'Edit '.$cpt_name_singular, $cpt_key ),
        'new_item' => _x( 'New '.$cpt_name_singular, $cpt_key ),
        'view_item' => _x( 'View '.$cpt_name_singular, $cpt_key ),
        'search_items' => _x( 'Search '.$cpt_name_plural, $cpt_key ),
        'not_found' => _x( 'No '.$cpt_name_plural.' found', $cpt_key ),
        'not_found_in_trash' => _x( 'No '.$cpt_name_plural.' found in Trash', $cpt_key ),
        'parent_item_colon' => _x( 'Parent '.$cpt_name_singular.':', $cpt_key ),
        'menu_name' => _x( $cpt_name_plural, $cpt_key ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'thumbnail' ),
        //'taxonomies' => array( 'category' ),
        
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => '',
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => false,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'capabilities' => array(
            'edit_post'          => 'update_core',
            'read_post'          => 'update_core',
            'delete_post'        => 'update_core',
            'edit_posts'         => 'update_core',
            'edit_others_posts'  => 'update_core',
            'delete_posts'       => 'update_core',
            'publish_posts'      => 'update_core',
            'read_private_posts' => 'update_core'
        ),
    );

    register_post_type( $cpt_key, $args );
}

//---
// Change Post Title Placeholder Text
//---
if(!function_exists('change_rsm_testimonial_title_text')) {
    function change_rsm_testimonial_title_text( $title ){
         $screen = get_current_screen();
     
         if  ( 'rsm_testimonial' == $screen->post_type ) {
              $title = 'Enter Testimonial Source / Client Name';
         }
     
         return $title;
    }
     
    add_filter( 'enter_title_here', 'change_rsm_testimonial_title_text' );
}

