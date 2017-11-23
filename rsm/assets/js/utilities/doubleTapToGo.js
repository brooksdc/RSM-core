/*
 This is a plugin that was discover here: https://osvaldas.info/drop-down-navigation-responsive-and-touch-friendly.

 It allows you to identify elements that might have a hover effect to be used on mobile (ideally for dropdown navigations)

 Should be used within a wrapper to determine if on a mobile device or not:

	if( isMobile.any() ) {
		$( '.mainmenu-new > li.menu-item-has-children' ).doubleTapToGo();
	} 
 
 *
 */

;(function( $, window, document, undefined )
{
	$.fn.doubleTapToGo = function( params )
	{
		if( !( 'ontouchstart' in window ) &&
			!navigator.msMaxTouchPoints &&
			!navigator.userAgent.toLowerCase().match( /windows phone os 7/i ) ) return false;

		this.each( function()
		{
			var curItem = false;

			$( this ).on( 'click', function( e )
			{
				var item = $( this );
				if( item[ 0 ] != curItem[ 0 ] )
				{
					e.preventDefault();
					curItem = item;
				}
			});

			$( document ).on( 'click touchstart MSPointerDown', function( e )
			{
				var resetItem = true,
					parents	  = $( e.target ).parents();

				for( var i = 0; i < parents.length; i++ )
					if( parents[ i ] == curItem[ 0 ] )
						resetItem = false;

				if( resetItem )
					curItem = false;
			});
		});
		return this;
	};
})( jQuery, window, document );