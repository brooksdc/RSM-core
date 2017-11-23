<?php
/**
 * full screen modal marhup
 */

/*
 Button markup example:

 <button class="btn btn-primary modal-launch-button" type="button" data-toggle="modal" data-target="#uniqueID">Launch Modal <i class="btn-icon fa fa-angle-up"></i></button>
 
 *
 * Modal markup needs unique ID to match buttons data-target, aria-labelledy attributes.
 */
?>
<button class="btn btn-primary modal-launch-button" type="button" data-toggle="modal" data-target="#uniqueID">Launch Modal <i class="btn-icon fa fa-angle-up"></i></button>

<div class="modal modal-fullscreen fade" id="uniqueID" tabindex="-1" role="dialog" aria-labelledby="uniqueLabel">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>

	<div class="modal-dialog">
		<div class="modal-content">
			<div class="container container--narrow">
		
				<?php // your content here ?>
				<div class="text-center">
					<h1>The Modal Content!</h1>
				</div>

			</div><!-- .container -->
		</div><!-- .modal-content -->
	</div><!-- .modal-dialog -->
</div><!-- .modal -->