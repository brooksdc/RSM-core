<?php
 /**
  * Main Mobile Menu Panels
  */

$rsm_primary_menu_use_alternate_logo = get_field('rsm_primary_menu_use_alternate_logo', 'option');
$rsm_primary_menu_alternate_logo = get_field('rsm_primary_menu_alternate_logo', 'option');
$rsm_primary_menu_text_below_logo = get_field('rsm_primary_menu_text_below_logo', 'option');
$rsm_primary_menu_arbitrary_content = get_field('rsm_primary_menu_arbitrary_content', 'option');
$rsm_secondary_menu_include_options = get_field('rsm_secondary_menu_include_options', 'option');
?>

<div id="primary-menu-slide-out" class="side-nav">
	<div class="side-nav__header side-nav__block">
		<a class="anchor" href="<?php echo esc_attr( get_site_url() ); ?>">
			<?php
			// Determine logo to use in mobbile menu panel
			if($rsm_primary_menu_use_alternate_logo) {

				// alternate logo
				echo '<img src="'.$rsm_primary_menu_alternate_logo['url'].'" itemprop="logo" alt="'.get_bloginfo('name').'" class="side-nav__header__alt-logo" width="'.$rsm_primary_menu_alternate_logo['width'].'" height="'.$rsm_primary_menu_alternate_logo['height'].'">';

			} else {
			
				// default header options panel data
				$rsm_logo_image_standard = get_field('rsm_logo_image_standard', 'option');
				$rsm_logo_image_retina = get_field('rsm_logo_image_retina', 'option');
				$rsm_use_text_only = get_field('rsm_use_text_only', 'option');
				$rsm_use_svg_logo = get_field('rsm_use_svg_logo', 'option');
				$rsm_logo_svg_code = get_field('rsm_logo_svg_code', 'option');
				//$rsm_svg_logo_path = get_field('rsm_svg_logo_path', 'option');

				if($rsm_use_svg_logo != null && $rsm_logo_svg_code != null) {

					//echo '<img src="'.$rsm_svg_logo_path.'" itemprop="logo" alt="'.get_bloginfo('name').'" class="side-nav__header__svg-logo">';
					echo '<span itemprop="logo" alt="'.get_bloginfo('name').'" class="site-header__logo-img site-header__svg-logo">'.$rsm_logo_svg_code.'</span>';

				} elseif ($rsm_logo_image_retina != null) {

					echo '<img src="'.$rsm_logo_image_retina['url'].'" itemprop="logo" alt="'.get_bloginfo('name').'" class="side-nav__header__retina-logo" width="'.($rsm_logo_image_retina['width'] / 2).'" height="'.($rsm_logo_image_retina['height'] / 2).'">';

				} elseif ($rsm_logo_image_standard != null) {

					echo '<img src="'.$rsm_logo_image_standard['url'].'" itemprop="logo" alt="'.get_bloginfo('name').'" class="side-nav__header__standard-logo" width="'.$rsm_logo_image_standard['width'].'" height="'.$rsm_logo_image_standard['height'].'">';
				} else {

					// text only if no logos uploaded
					echo '<span class="side-nav__header__text-logo" itemprop="name">'.get_bloginfo('name').'</span>';

				}
			}

			if($rsm_primary_menu_text_below_logo) {
				echo '<span class="side-nav__header__tagline">'.$rsm_primary_menu_text_below_logo.'</span>';
			}
			?>
		</a><!-- .anchor -->
	</div><!-- .side-nav__header -->

	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => '', 'menu_class' => 'side-nav-menu', 'container' => 'nav' ) ); ?>
	
	<?php if($rsm_primary_menu_arbitrary_content): ?>
		<div class="side-nav__bottom side-nav__block">
			<?php echo $rsm_primary_menu_arbitrary_content; ?>
		</div>
	<?php endif; ?>

</div><!-- #primary-menu-slide-out -->


<?php
 /**
  * Secondary Mobile Menu Panel
  */

$phone = get_field('primary_phone_number','option');
$phone_link = preg_replace("/[^0-9]/","", $phone);

if(!empty($rsm_secondary_menu_include_options)):?>

	<div id="utility-slide-out" class="side-nav side-nav--alternate">
		
		<?php foreach($rsm_secondary_menu_include_options as $option) {
			
			if($option == 'phone-btn' && $phone) {
				echo '<div class="side-nav__block side-nav__block--phone">';
					echo '<a class="anchor" href="tel:'.$phone_link.'">';
						echo '<span class="side-nav__block__label">Call Us</span>';
						echo '<span class="side-nav__block__content">'.$phone.'</span>';
					echo '</a>';
				echo '</div>';
			}

			if($option == 'address') {
				echo '<div class="side-nav__block">';
					echo '<span class="anchor">';
						echo '<span class="side-nav__block__label">Address</span>';
						echo '<span class="side-nav__block__content">'.do_shortcode('[rsm_primary_address]').'</span>';
					echo '</span>';
				echo '</div>';
			}

			if($option == 'hours') {
				echo '<div class="side-nav__block">';
					echo '<span class="anchor">';
						echo '<span class="side-nav__block__label">Business Hours</span>';
						echo '<span class="side-nav__block__content">'.do_shortcode('[rsm_business_hours]').'</span>';
					echo '</span>';
				echo '</div>';
			}

			if($option == 'social-channels') {
				echo '<div class="side-nav__block">';
					echo '<span class="anchor">';
						echo '<span class="side-nav__block__label">Follow Us</span>';
						echo '<span class="side-nav__block__content">'.do_shortcode('[rsm_social_networks]').'</span>';
					echo '</span>';
				echo '</div>';
			}

		} ?>

	</div>

	<?php
endif;
?>