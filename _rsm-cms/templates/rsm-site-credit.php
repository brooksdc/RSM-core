<?php
/**
 * Site Credit Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

//data
$rsm_site_credit = get_field('rsm_site_credit', 'option');

if($rsm_site_credit):

// replace dynamic tags with data	
$the_year = date('Y');
$site_name = get_bloginfo('name');
$credit_step_1 = str_replace( '%the_year%', $the_year, $rsm_site_credit );
$credit_step_2 = str_replace( '%site_name%', $site_name, $credit_step_1 );
?>

<span class="rsm-site-credit">
	<?php echo $credit_step_2 ?>
</span>

<?php endif; ?>