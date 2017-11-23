<?php
/*
 Requires JS Socials plugin
 Config Docs: http://js-socials.com/docs/#configuration
 */
?>

<div id="share-bar">
	<div class="share-bar__title">Share this</div>
	<div id="share"></div>
</div><!-- #share-bar -->

<!-- adding the event listener allows this to be compatible with 'defered' scripts -->
<script type="text/javascript">
 	window.addEventListener('DOMContentLoaded', function() {
        (function($) {
		    $(document).ready(function($){
			    $("#share").jsSocials({
			        shares: ["email", "twitter", "facebook", "googleplus", "linkedin"],
			        showCount: false,
			        showLabel: false,
			        shareIn: "popup",
			    });
			});
		})(jQuery);
	});
</script>