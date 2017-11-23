<?php

// setup column classes for this layout
if ( rsm_footer_col_count() == 1 ) {
	$footer_col_class = 'col-sm-24';
}
elseif ( rsm_footer_col_count() == 2 ) {
	$footer_col_class = 'col-sm-12';
}
elseif ( rsm_footer_col_count() == 3 ) {
	$footer_col_class = 'col-sm-8';
}
elseif ( rsm_footer_col_count() == 4 ) {
	$footer_col_class = 'col-sm-6';
}
else {
	$footer_col_class = null;
}
?>


<footer class="site-footer footer-layout-1" id="colophon" role="contentInfo">
	
	<?php /* Widgetized footer area */ ?>
	<?php if( rsm_footer_col_count() >= 1 ) : ?>
		<div class="site-footer__top">
			<div class="container">
				<div class="row">
					<?php if( is_active_sidebar( 'footer-dropin-1' ) ): ?>
						<div class="site-footer__col footer-dropin-1 <?php _e($footer_col_class); ?>">
							<?php dynamic_sidebar( 'footer-dropin-1' ); ?>
						</div>
					<?php endif; ?>

					<?php if( is_active_sidebar( 'footer-dropin-2' ) ): ?>
						<div class="site-footer__col footer-dropin-2 <?php _e($footer_col_class); ?>">
							<?php dynamic_sidebar( 'footer-dropin-2' ); ?>
						</div>
					<?php endif; ?>

					<?php if( is_active_sidebar( 'footer-dropin-3' ) ): ?>
						<div class="site-footer__col footer-dropin-3 <?php _e($footer_col_class); ?>">
							<?php dynamic_sidebar( 'footer-dropin-3' ); ?>
						</div>
					<?php endif; ?>

					<?php if( is_active_sidebar( 'footer-dropin-4' ) ): ?>
						<div class="site-footer__col footer-dropin-4 <?php _e($footer_col_class); ?>">
							<?php dynamic_sidebar( 'footer-dropin-4' ); ?>
						</div>
					<?php endif; ?>
				</div><!-- .row -->
			</div><!-- .container -->
		</div><!-- .site-footer__top -->
	<?php endif; ?>

	
	<div class="site-footer__bottom">
		<div class="container">
			<div class="row">
				
				<div class="col-sm-12">
					<?php echo do_shortcode('[rsm_site_credit]'); ?>
				</div>

				<?php if( is_active_sidebar( 'footer-dropin-5' ) ): ?>
					<div class="col-sm-12 footer-dropin-5">
						<?php dynamic_sidebar( 'footer-dropin-5' ); ?>
					</div>
				<?php endif; ?>
				
			</div><!-- .row -->

		</div><!-- .container -->	
	</div><!-- .site-footer__bottom -->
	
</footer><!-- .site-footer -->