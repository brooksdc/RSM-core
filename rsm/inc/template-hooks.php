<?php
// Initialize customizable hooks for use within the templates.
// Using hooks so they can be worked with easily in a child theme to this if needed.

//---
// Header layout
//--
if( !function_exists('rsm_header_layout') ):
	function rsm_header_layout() {
		do_action('rsm_header_layout');
	}
endif;

// Define which header layout to use
if( !function_exists('rsm_select_header_layout') ) {
	function rsm_select_header_layout() {
		
		//get selection from options panel
		$rsm_header_layout_select = get_field('rsm_header_layout_select', 'option');
		if($rsm_header_layout_select) {
			$rsm_header_template = $rsm_header_layout_select;
		} else {
			$rsm_header_template = 'header-layout-1'; //default
		}

		get_template_part( '/template-parts/layouts/'.$rsm_header_template );
	}
	add_action('rsm_header_layout', 'rsm_select_header_layout', 5);
}


//---
// Mobile Menu Panels
//--
if( !function_exists('rsm_mobile_menus') ):
	function rsm_mobile_menus() {
		do_action('rsm_mobile_menus');
	}
endif;

// Define mobile menu template
if( !function_exists( 'rsm_select_mobile_menus' ) ) {
	function rsm_select_mobile_menus() {
		get_template_part('/template-parts/mobile-menu-panels');
	}
	add_action('rsm_mobile_menus', 'rsm_select_mobile_menus', 5);
}


//---
// Footer layout
//--
if( !function_exists('rsm_footer_layout') ):
	function rsm_footer_layout() {
		do_action('rsm_footer_layout');
	}
endif;

// Define which footer layout to use
if( !function_exists( 'rsm_select_footer_layout' ) ) {
	function rsm_select_footer_layout() {
		
		//get selection from options panel
		$rsm_footer_layout_select = get_field('rsm_footer_layout_select', 'option');
		if($rsm_footer_layout_select) {
			$rsm_footer_template = $rsm_footer_layout_select;
		} else {
			$rsm_footer_template = 'footer-layout-1'; //default
		}

		get_template_part( '/template-parts/layouts/'.$rsm_footer_template );

	}
	add_action('rsm_footer_layout', 'rsm_select_footer_layout', 5);
}

