<?php
/**
 * RSM Hero Banner
 */

$rsm_select_hero_style = get_field('rsm_select_hero_style');

if( $rsm_select_hero_style == 'hero-banner-a' ) {

	// hero banner a
	get_template_part('template-parts/layouts/hero-banner-a');

}
elseif ( $rsm_select_hero_style == 'hero-banner-b' ) {

	// hero banner b
	get_template_part('template-parts/layouts/hero-banner-b');
	
}
elseif ( $rsm_select_hero_style == 'none' ) {

	// use default masthead (if active)
	get_template_part('template-parts/masthead');
	
}
	
	