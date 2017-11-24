<?php
/**
 * Payment Types Shortcode Template.
 *
 * This template can be overriden by copying this file to your-theme/rsm-templates/
 *
 * @author 		RSM
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Don't allow direct access

//data
$rsm_payment_types = get_field('rsm_payment_types', 'option');

if($rsm_payment_types): ?>

<ul class="rsm-payment-types list--inline">

	<?php foreach($rsm_payment_types as $type) {

		if ($type == 'visa') {
			$payment_icon_class = 'fa fa-cc-visa';
		}
		elseif ($type == 'amex') {
			$payment_icon_class = 'fa fa-cc-amex';
		}
		elseif ($type == 'mc') {
			$payment_icon_class = 'fa fa-cc-mastercard';
		}
		elseif ($type == 'bank') {
			$payment_icon_class = 'fa fa-exchange';
		}
		elseif ($type == 'cash') {
			$payment_icon_class = 'fa fa-money';
		}

		echo '<li class="rsm-payment-type--'.$type.'">';
			echo '<i class="'.$payment_icon_class.'"></i>';
			echo '<span class="sr-only">'.$type.'</span>';
		echo '</li>';
	} ?>

</ul>

<?php endif; ?>