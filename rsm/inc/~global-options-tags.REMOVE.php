<?php
/*
 * Global Options Tags
 *
 * Global parts that use the custom options panel data form the WP admin.
 * These are all based on data stored from Advanced Custom Fields. ( this is why the get_field() function is required in all)
 */

/*
 Add custom <meta robots> tag
 */
/*if(!function_exists('rsm_core_robots_tag')):
function rsm_core_robots_tag() {
	//page options data
	if(function_exists('get_field')):
		$custom_robots = get_field( 'custom_robots');

		if($custom_robots == 'on') { ?> 
			<meta name="robots" content="noindex, nofollow, noarchive, noodp, noydir" />
		<?php }
	endif;	
}
endif;*/


/*
 GTM <head> snippet
 */
/*if(!function_exists('rsm_core_gtm_head_snippet')):
function rsm_core_gtm_head_snippet() {
	//theme options data
	if(function_exists('get_field')):
		$gtm_id = get_field('gtm_id', 'option');

		if($gtm_id): ?>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?php _e($gtm_id); ?>');</script>
		<!-- End Google Tag Manager -->
		<?php
		endif;
	endif;
}
endif;*/

/*
 GTM <body> snippet
 */
/*if(!function_exists('rsm_core_gtm_body_snippet')):
function rsm_core_gtm_body_snippet() {
	//theme options data
	if(function_exists('get_field')):
		$gtm_id = get_field('gtm_id', 'option');

		if($gtm_id): ?>
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php _e($gtm_id); ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<?php
		endif;
	endif;
}
endif;
*/

/*
 Google Analytics (disabled in lieu of GTM)
 */
/*if(!function_exists('rsm_core_google_analytics')):
function rsm_core_google_analytics() {
	//theme options data
	if(function_exists('get_field')):
		$ga_id = get_field('google_analytics_id', 'option'); 

		if($ga_id) { ?>
			<script>
			  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			  ga('create', '<?php echo $ga_id; ?>', 'auto');
			  ga('send', 'pageview');

			</script>
		<?php }
	endif;	
}
endif;*/

/*
 List of social channels
 */
/*if(!function_exists('rsm_core_social_icons')):
function rsm_core_social_icons() {
	
	if(function_exists('get_field')):
		//SOCIAL NETWORKS & TRACKING
		$facebook = get_field('facebook', 'option');
		$instagram = get_field('instagram', 'option');
		$linkedIN = get_field('linkedin', 'option');
		$twitter = get_field('twitter', 'option');
		$pinterest = get_field('pinterest', 'option');
		$google_plus = get_field('google_plus', 'option');
		$yelp = get_field('yelp', 'option');
		$trip_advisor = get_field('trip-advisor', 'option');
		$youtube = get_field('youtube', 'option');
		?>
		
		<span itemscope itemtype="http://schema.org/Organization">
			<link itemprop="url" href="<?php echo get_site_url(); ?>">
			<ul class="social-links">
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
						<i class="fa fa-facebook"></i><span class="fallback-text">facebook</span>
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
	<?php	
	endif; ?>

	<?php
}
endif;*/

/*
 Business address in schema format
 */
/*if(!function_exists('rsm_core_contact_schema_address')):
function rsm_core_contact_schema_address() {
	if(function_exists('get_field')):
		//theme options data
		$organization_type = get_field('organization_type', 'option');
		$address_company_name = get_field('address_company_name', 'option');
		$address_street = get_field('address_street', 'option');
		$address_city = get_field('address_city', 'option');
		$address_region = get_field('address_region', 'option');
		$address_country = get_field('address_country', 'option');
		$address_postal = get_field('address_postal', 'option');
		$map_link = get_field('map_link', 'option');
		$additional_addresses = get_field('additional_addresses', 'option');
		$show_addresses = get_field('show_addresses', 'option');
		$address_section_title = get_field('address_section_title', 'option');
		
		if($show_addresses != 'none'): ?>
			<div id="business-address" class="widget">
				
				<?php if($address_section_title){
					echo '<h3 class="widget-title">'.$address_section_title.'</h3>';
				} ?>
				
				<?php if($show_addresses != 'additional_only'): ?>
					<?php if($address_street): ?>
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
					
					<?php endif; ?>
				<?php endif; ?>
				
				<?php if($show_addresses != 'primary_only'): ?>
					<?php if($additional_addresses){
						echo '<ul id="additional-addresses" class="key-value-list">';
							foreach($additional_addresses as $a) {
								echo '<li>';
									if($a['address_label']){
										echo '<span class="key">'.$a['address_label'].'</span>';
									}
									echo '<span class="value">'.$a['address_string'];
										if($a['address_map_link']) {
											echo ' <a href="'.$a['address_map_link'].'" target="_blank">View Map</a>';
										}
									echo '</span>';
								echo '</li>';
							}
						echo '</ul>';
					}?>
				<?php endif; ?>
				
			</div><!-- #business-address -->
			<?php
		endif;
	
	endif;
	
}
endif;*/

/*
 Business phone number(s) list
 */
/*if(!function_exists('rsm_core_contact_phone')):
function rsm_core_contact_phone() {
	if(function_exists('get_field')){
		$primary_phone_number = get_field('primary_phone_number','option');
		$primary_phone_number_link = preg_replace("/[^0-9]/","",$primary_phone_number);
		$primary_phone_label = get_field('primary_phone_label','option');
		$additional_phone_numbers = get_field('additional_phone_numbers','option');
		$show_phone_number = get_field('show_phone_numbers_contact','option');
		$phone_section_title = get_field('phone_section_title','option');

		if($show_phone_number != 'none'):
			if($primary_phone_number || $additional_phone_numbers):
				
				echo '<div id="phone-numbers" class="contact-details widget">';
					if($phone_section_title) {
						echo '<h3 class="widget-title">'.$phone_section_title.'</h3>';
					}
					echo '<ul class="key-value-list">';
					
					if($show_phone_number != 'additional_only'):
						if($primary_phone_number) {
							echo '<li class="phone-numbers__primary">';
								if($primary_phone_label) {
									echo '<span class="key">'.$primary_phone_label.'</span>';
								}
								echo '<span class="value">'.$primary_phone_number.'</span>';
							echo '</li>';
						}
					endif;

					if($show_phone_number != 'primary_only'):
						if($additional_phone_numbers) {
							foreach($additional_phone_numbers as $p) {
								echo '<li>';
									if($p['phone_label']) {
										echo '<span class="key">'.$p['phone_label'].'</span>';
									}
									echo '<span class="value">'.$p['phone_number'].'</span>';
								echo '</li>';
							}
						}
					endif;
					
					echo '</ul>';
				echo '</div>';
			endif;
		endif;
	}

}
endif;*/

/*
 Business email address list
 */
/*if(!function_exists('rsm_core_contact_email')):
function rsm_core_contact_email() {
	if(function_exists('get_field')){
		//theme options - phone data
		$primary_email_address = get_field('primary_email_address', 'option');
		$primary_email_label = get_field('primary_email_label', 'option');
		$additional_email_addresses = get_field('additional_email_addresses', 'option');
		$show_email_address = get_field('show_email_addresses_contact', 'option');
		$email_section_title = get_field('email_section_title', 'option');

		if($show_email_address != 'none'):
			if($primary_email_address || $additional_email_addresses):
				echo '<div id="email-addresses" class="contact-details widget">';
					if($email_section_title) {
						echo '<h3 class="widget-title">'.$email_section_title.'</h3>';
					}
					echo '<ul class="key-value-list">';
					
					if($show_email_address != 'additional_only'):
						if($primary_email_address) {
							echo '<li class="email-addresses__primary">';
								if($primary_email_label) {
									echo '<span class="key">'.$primary_email_label.'</span>';
								}
								echo '<span class="value">'.obfuscate($primary_email_address).'</span>';
							echo '</li>';
						}
					endif;

					if($show_email_address != 'primary_only'):
						if($additional_email_addresses != null) {
							foreach($additional_email_addresses as $e) {
								if(!empty($e)){
									echo '<li class="additional-email">';
										if($e['email_label']) {
											echo '<span class="key">'.$e['email_label'].'</span>';
										}
										echo '<span class="value">'.obfuscate($e['email_address']).'</span>';
									echo '</li>';
								}
							}
						}
					endif;
					
					echo '</ul>';
				echo '</div>';
			endif;
		endif;
	}

}
endif;*/

/*
 Business hours list
 */
/*if(!function_exists('rsm_core_contact_business_hours')):
function rsm_core_contact_business_hours() {
	if(function_exists('get_field')){
		//theme options - business hours
		$business_hours = get_field('business_hours', 'option');
		$show_business_hours = get_field('show_business_hours', 'option');
		$business_hours_section_title = get_field('business_hours_section_title', 'option');

		if( $show_business_hours == 'yes' && !empty($business_hours) ):
			echo '<div id="business-hours" class="widget">';
			if($business_hours_section_title){
				echo '<h3 class="widget-title">'.$business_hours_section_title.'</h3>';
			}
				echo '<ul id="business-hours" class="key-value-list">';
				foreach($business_hours as $hours){
					echo '<li>';
					echo '<span class="key">'.$hours['hours_label'].'</span>';
					echo '<span class="value">'.$hours['hours_time'].'</span>';
					echo '</li>';
				}
				echo '</ul>';
			echo '</div>';
		endif;
	}
	
}
endif;*/

/*
 Contact form for contact page
 */
/*if(!function_exists('rsm_core_contact_form')):
function rsm_core_contact_form() {
	if(function_exists('get_field')){
		//theme options – contact form data
		$contact_form_embeds = get_field('contact_form_embeds', 'option');
		$contact_form_section_title = get_field('contact_form_section_title', 'option');

		if(!empty($contact_form_embeds)):
			echo '<div id="contact-form" class="widget">';
				if($contact_form_section_title){
					echo '<h3 class="widget-title">'.$contact_form_section_title.'</h3>';
				}
				foreach($contact_form_embeds as $form) {
					echo '<div class="contact-form__single">';
						if($form['form_title']){
							echo '<div class="contact-form__single-title">'.$form['form_title'].'</div>';
						}
						echo apply_filters('the_content', $form['form_embed']);
					echo '</div>';
				}
				
			echo '</div><!-- .widget -->';
		endif;
	}
	
}
endif;*/

