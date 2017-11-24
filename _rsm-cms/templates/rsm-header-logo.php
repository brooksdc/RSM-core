<?php
/**
 * Header Logo Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/rsm-header-logo.php
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

// options panel data
$rsm_logo_image_standard = get_field('rsm_logo_image_standard', 'option');
$rsm_logo_image_retina = get_field('rsm_logo_image_retina', 'option');
$rsm_use_text_only = get_field('rsm_use_text_only', 'option');
$rsm_use_svg_logo = get_field('rsm_use_svg_logo', 'option');
$rsm_logo_svg_code = get_field('rsm_logo_svg_code', 'option');
//$rsm_svg_logo_path = get_field('rsm_svg_logo_path', 'option'); //removed in lieu of svg code
$rsm_logo_max_width = get_field('rsm_logo_max_width', 'option');
$rsm_logo_seo_settings = get_field('rsm_logo_seo_settings', 'option');

/**
 Setup Conditionals
 */

// Determine H1 for home and blog based on options.
if( is_front_page() || is_home() ){
	
	if($rsm_logo_seo_settings == 'logo'){
		$logo_tag = 'h1';	
	} else {
		$logo_tag = 'div';
	}
	
} else {
	
	$logo_tag = 'div';
}

// Determine if there is a max-width specified
if( $rsm_logo_max_width != null ) {
	$logo_style = 'style="max-width: '.$rsm_logo_max_width.'px;"';
} else {
	$logo_style = null;
}

/**
 Begin Markup
 */
echo '<'.$logo_tag.' class="site-header__logo" itemscope itemtype="http://schema.org/Organization" '.$logo_style.'>';
	echo '<a class="anchor" itemprop="url" href="'.esc_url( home_url( '/' ) ).'" rel="home" title="'. esc_attr( get_bloginfo( 'name' ) ).'" >';
		?>
		
		<?php
		if ($rsm_use_text_only == true):
			
			/**
			 Markup for TEXT ONLY logo	
			 */
			echo '<span class="site-header__text-logo" itemprop="name">'.get_bloginfo('name').'</span>';

		else:

			/**
			 Markup for STANDARD / RETINA / SVG logo
			 */
			if($rsm_use_svg_logo != null && $rsm_logo_svg_code != null) {

				//echo '<img src="'.$rsm_svg_logo_path.'" itemprop="logo" alt="'.get_bloginfo('name').'" class="site-header__logo-img site-header__svg-logo">';
				echo '<span itemprop="logo" alt="'.get_bloginfo('name').'" class="site-header__logo-img site-header__svg-logo">'.$rsm_logo_svg_code.'</span>';

			} elseif ($rsm_logo_image_retina != null) {

				echo '<img src="'.$rsm_logo_image_retina['url'].'" itemprop="logo" alt="'.get_bloginfo('name').'" class="site-header__logo-img site-header__retina-logo" width="'.($rsm_logo_image_retina['width'] / 2).'" height="'.($rsm_logo_image_retina['height'] / 2).'">';

			} elseif ($rsm_logo_image_standard != null) {

				echo '<img src="'.$rsm_logo_image_standard['url'].'" itemprop="logo" alt="'.get_bloginfo('name').'" class="site-header__logo-img site-header__standard-logo" width="'.$rsm_logo_image_standard['width'].'" height="'.$rsm_logo_image_standard['height'].'">';
			} else {

				// text only if no logos uploaded
				echo '<span class="site-header__text-logo" itemprop="name">'.get_bloginfo('name').'</span>';

			}
			 
			echo '<span class="sr-only" itemprop="name">'.get_bloginfo('name');
				if(is_home()) {
					echo ' Blog';
				} else {
					echo ' | '.get_bloginfo('description');
				}
			echo '</span>'; 

		endif;
		
	echo '</a>';
echo '</'.$logo_tag.'><!--site-header__logo-->';



