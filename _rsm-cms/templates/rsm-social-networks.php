<?php
/**
 * Social Networks Shortcode Template.
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

//data
$facebook = get_field('facebook', 'option');
$instagram = get_field('instagram', 'option');
$linkedIN = get_field('linkedin', 'option');
$twitter = get_field('twitter', 'option');
$pinterest = get_field('pinterest', 'option');
$google_plus = get_field('google_plus', 'option');
$yelp = get_field('yelp', 'option');
$youtube = get_field('youtube', 'option');
?>

<?php if( $facebook || $instagram || $linkedIN || $twitter || $pinterest || $google_plus || $yelp || $youtube): ?>
<span itemscope itemtype="http://schema.org/Organization">
	<link itemprop="url" href="<?php echo get_site_url(); ?>">
	<ul class="rsm-social-links <?php echo esc_attr($custom_class); ?>">
		<?php if($yelp) { ?>
			<li><a itemprop="sameAs" href="<?php _e($yelp); ?>" target="_blank" class="yelp">
				<i class="fa fa-yelp"></i><span class="fallback-text">yelp</span>
			</a></li>
		<?php } ?>
		<?php if($pinterest) { ?>
			<li><a itemprop="sameAs" href="<?php _e($pinterest); ?>" target="_blank" class="pinterest">
				<i class="fa fa-pinterest"></i><span class="fallback-text">pinterest</span>
			</a></li>
		<?php } ?>
		<?php if($linkedIN) { ?>
			<li><a itemprop="sameAs" href="<?php _e($linkedIN); ?>" target="_blank" class="linkedin">
				<i class="fa fa-linkedin"></i><span class="fallback-text">linkedin</span>
			</a></li>
		<?php } ?>
		<?php if($facebook) { ?>
			<li><a itemprop="sameAs" href="<?php _e($facebook); ?>" target="_blank" class="facebook">
				<i class="fa fa-facebook-square"></i><span class="fallback-text">facebook</span>
			</a></li>
		<?php } ?>
		<?php if($twitter) { ?>
			<li><a itemprop="sameAs" href="<?php _e($twitter); ?>" target="_blank" class="twitter">
				<i class="fa fa-twitter"></i><span class="fallback-text">twitter</span>
			</a></li>
		<?php } ?>
		<?php if($google_plus) { ?>
			<li><a itemprop="sameAs" href="<?php _e($google_plus); ?>" target="_blank" class="google-plus">
				<i class="fa fa-google-plus"></i><span class="fallback-text">google-plus</span>
			</a></li>
		<?php } ?>
		<?php if($instagram) { ?>
			<li><a itemprop="sameAs" href="<?php _e($instagram); ?>" target="_blank" class="instagram">
				<i class="fa fa-instagram"></i><span class="fallback-text">instagram</span>
			</a></li>
		<?php } ?>
		<?php if($youtube) { ?>
			<li><a itemprop="sameAs" href="<?php _e($youtube); ?>" target="_blank" class="youtube">
				<i class="fa fa-youtube"></i><span class="fallback-text">youtube</span>
			</a></li>
		<?php } ?>
	</ul>
</span>
<?php endif; ?>