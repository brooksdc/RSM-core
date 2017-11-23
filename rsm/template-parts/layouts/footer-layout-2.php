<?php

/**
 Footer layout 2
 */
?>

<footer class="site-footer footer-layout-2" id="colophon" role="contentInfo">
	
	<?php /* Widgetized footer areas */ ?>
	
	<div class="site-footer__top">
		<div class="container">
			
			<?php if( is_active_sidebar( 'footer-dropin-1' ) ): ?>
				<div class="site-footer__col footer-dropin-1">
					<?php dynamic_sidebar( 'footer-dropin-1' ); ?>
				</div>
			<?php endif; ?>

			<?php if( is_active_sidebar( 'footer-dropin-2' ) ): ?>
				<div class="site-footer__col footer-dropin-2">
					<?php dynamic_sidebar( 'footer-dropin-2' ); ?>
				</div>
			<?php endif; ?>
			
		</div><!-- .container -->
	</div><!-- .site-footer__top -->
	
	<div class="site-footer__bottom">
		<div class="container">
			<div class="row">
				
				<?php if( is_active_sidebar( 'footer-dropin-3' ) ): ?>
					<div class="col-sm-12 left-block">
						<?php dynamic_sidebar( 'footer-dropin-3' ); ?>
					</div>
				<?php endif; ?>

				<div class="col-sm-12 right-block">
					<?php echo do_shortcode('[rsm_site_credit]'); ?>
				</div>

			</div><!-- .row -->
		</div><!-- .container -->	
	</div><!-- .site-footer__bottom -->
	
</footer><!-- .site-footer -->