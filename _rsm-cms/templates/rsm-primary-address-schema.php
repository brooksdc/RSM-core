<?php
/**
 * Primary Address Shortcode Template using SCHEMA markup.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

if( !isset($args['custom_class']) ) {
	$custom_class = null; 
} else {
	$custom_class = $args['custom_class'];
}

$organization_type = get_field('organization_type', 'option');
$address_company_name = get_field('address_company_name', 'option');
$address_street = get_field('address_street', 'option');
$address_city = get_field('address_city', 'option');
$address_region = get_field('address_region', 'option');
$address_country = get_field('address_country', 'option');
$address_postal = get_field('address_postal', 'option');
$map_link = get_field('map_link', 'option');

if($address_street): ?>
	<div class="rsm-primary-address <?php echo esc_attr($custom_class); ?>">
		<span class="schema-address" itemscope itemtype="http://schema.org/<?php _e($organization_type); ?>">
		<meta itemprop="url" href="<?php echo get_site_url(); ?>">
		<?php if($address_company_name){
			echo '<span class="address-name" itemprop="name">'.$address_company_name.'</span>';
		} else {
			echo '<span class="address-name" itemprop="name">'.get_bloginfo('site_name').'</span>';
		} ?>
		
		<span class="address-group" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<?php if($address_street) { ?>
				<span class="address-street" itemprop="streetAddress"><?php _e($address_street); ?></span>
			<?php } ?>
			<?php if($address_city) { ?>
				<span class="address-city" itemprop="addressLocality"><?php _e($address_city); ?></span>
			<?php } ?>
			<?php if($address_region) { ?>
				<span class="address-region" itemprop="addressRegion"><?php _e($address_region); ?></span>
			<?php } ?>
			<?php if($address_country) { ?>
				<span class="address-country" itemprop="addressCountry"><?php _e($address_country); ?></span>
			<?php } ?>
			<?php if($address_postal) { ?>
				<span class="address-postal" itemprop="postalCode"><?php _e($address_postal); ?></span>
			<?php } ?>
		</span>
		</span><!--schema-address-->
		<?php if($map_link){
			echo '<a class="address-map" href="'.$map_link.'">View Map</a>';
		} ?>
	</div><!-- .rsm-primary-address -->
<?php endif; ?>