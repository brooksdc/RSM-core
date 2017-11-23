
<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html dir="ltr" <?php language_attributes(); ?> class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html dir="ltr" <?php language_attributes(); ?> class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7 ]>    <html dir="ltr" <?php language_attributes(); ?> class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8 ]>    <html dir="ltr" <?php language_attributes(); ?> class="no-js ie8 oldie"> <![endif]-->
<!--[if IE 9 ]>    <html dir="ltr" <?php language_attributes(); ?> class="no-js ie9 oldie"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html dir="ltr" <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
<!-- switch no-js if browser has JS -->
<script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
<?php wp_head(); ?>
</head>


<body <?php body_class();?>>

	<?php
	// GTM body snippet - Set in options panel.
	if(function_exists('get_field')):
		$gtm_id = get_field('gtm_id', 'option');

		if($gtm_id): ?>
		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=<?php _e($gtm_id); ?>"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<?php
		endif;
	endif;
	?>

	<div id="page" class="hfeed site">
		
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'quantus' ); ?></a>

		<?php
		/**
		 * Change the header template used by modifying the rsm_select_header_layout() function 
		 * located in /inc/template-hooks.php
		 *
		 * Paste that function into your child theme to use a different template there as well.
		 *
		 */
		rsm_header_layout(); ?>
		
		<?php
		/*
		 * Load approproate masthead template or hero section
		 */
		if( !is_front_page() ):
			// masthead setup
			if( is_archive() || is_home() || is_search() || is_404() ) {
				get_template_part('template-parts/masthead','archive');
			
			} else {
			
				get_template_part('template-parts/masthead');

			} 
		else:
			// load hero section on homepage
			get_template_part('template-parts/part-hero-banner');

		endif;
		?>

		<main id="main" class="site-main" role="main">

			<div id="content" class="site-content">
		
			<!--[if IE 9]>
				<div class="alert alert-warning" rol="alert">Your browser is no longer supported. Please update to the latest version or use a different browser, like <a href="https://www.google.com/chrome/browser/desktop/">Google Chrome</a></div>
			<![endif]-->
			<!--[if lt IE 9]>
				<div class="alert alert-warning" rol="alert">Your browser is no longer supported. Please update to the latest version or use a different browser, like <a href="https://www.google.com/chrome/browser/desktop/">Google Chrome</a></div>
			<![endif]-->
			
