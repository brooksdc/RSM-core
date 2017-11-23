
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<input type="hidden" name="post_type" value="post" />
	<div class="form-group">
		<label class="sr-only"><?php echo _x( 'Search for:', 'label' ) ?></label>
		<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search the site...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
		
		<button type="submit" class="search-submit btn"><i class="fa fa-search search-icon-overlay"></i></button>
	</div>
</form>
