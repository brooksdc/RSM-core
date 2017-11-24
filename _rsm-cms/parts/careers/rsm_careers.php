<?php
/*
 * Part: Careers
 * Ver: 1.0
 */

//--- 
// Custom Post Type -- Job Posting / Careers
//---

add_action( 'init', 'register_cpt_rsm_job_posting' );

function register_cpt_rsm_job_posting() {

    $cpt_name_plural = 'Job Postings';
    $cpt_name_singular = 'Job Posting';
    $cpt_key = 'rsm_job_posting';

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
        
        'supports' => array( 'title' ),
        //'taxonomies' => array( 'category' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_icon' => '',
        
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 'with_front' => false, 'slug' => 'careers' ),
        'capability_type' => 'post'
    );

    register_post_type( $cpt_key, $args );
}


//---
// Custom Taxonomy - Job Posting Categories
//---

add_action( 'init', 'register_taxonomy_rsm_job_posting_dept' );

function register_taxonomy_rsm_job_posting_dept() {

	$tax_name_plural = 'Departments';
    $tax_name_singular = 'Department';
    $tax_key = 'rsm_job_posting_dept';
    $linked_post_type = 'rsm_job_posting';

    $labels = array( 
        'name' => _x( $tax_name_plural, $tax_key ),
        'singular_name' => _x( $tax_name_singular, $tax_key ),
        'search_items' => _x( 'Search '.$tax_name_plural, $tax_key ),
        'popular_items' => _x( 'Popular '.$tax_name_plural, $tax_key ),
        'all_items' => _x( 'All '.$tax_name_plural, $tax_key ),
        'parent_item' => _x( 'Parent '.$tax_name_singular, $tax_key ),
        'parent_item_colon' => _x( 'Parent '.$tax_name_singular.':', $tax_key ),
        'edit_item' => _x( 'Edit '.$tax_name_singular, $tax_key ),
        'update_item' => _x( 'Update '.$tax_name_singular, $tax_key ),
        'add_new_item' => _x( 'Add New '.$tax_name_singular, $tax_key ),
        'new_item_name' => _x( 'New '.$tax_name_singular, $tax_key ),
        'separate_items_with_commas' => _x( 'Separate '.$tax_name_plural.' with commas', $tax_key ),
        'add_or_remove_items' => _x( 'Add or remove '.$tax_name_plural, $tax_key ),
        'choose_from_most_used' => _x( 'Choose from most used '.$tax_name_plural, $tax_key ),
        'menu_name' => _x( $tax_name_plural, $tax_key ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => false,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,

        'rewrite' => true,
        'query_var' => true
    );

    register_taxonomy( $tax_key, array( $linked_post_type ), $args );
}
