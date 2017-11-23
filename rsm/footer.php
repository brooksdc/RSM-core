<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rsm_core_
 */
?>
				<?php get_template_part('template-parts/part-related-content'); ?>
			
			</div><!-- #content -->

		</main><!-- #main -->

		<?php
		/**
		 * Change the footer template used by modifying the rsm_select_footer_layout() function 
		 * located in /inc/template-hooks.php
		 *
		 * Paste that function into your child theme to use a different template there as well.
		 *
		 */
		rsm_footer_layout(); ?>

	</div><!-- #page -->
	
	
	
	<?php
	/**
	 * Change the mobile menu template used by modifying the rsm_select_mobile_menus() function 
	 * located in /inc/template-hooks.php
	 *
	 * Paste that function into your child theme to use a different template there as well.
	 *
	 */
	//rsm_mobile_menus(); ?>
	
	<?php
	/**
	 * Include the structured business data from the options panel.
	 * Function can be modified here: /inc/custom-functions.php
	 */
	rsm_structured_business_data();
	rsm_structured_website_data(); ?>
	

	<?php wp_footer(); ?>

</body>
</html>
