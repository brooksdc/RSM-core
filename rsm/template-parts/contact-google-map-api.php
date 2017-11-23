<?php
if(function_exists('get_field')){
	//map embed (Needs Google API Key)
	//theme options -  Google Map API data
	$gm_api_key = get_field('google_map_api_key', 'options');
	$gm_theme_style = get_field('google_map_theme_style', 'options');
	$gm_zoom = get_field('google_map_zoom', 'options');
	$gm_lat = get_field('google_map_lat', 'options');
	$gm_long = get_field('google_map_long', 'options');
	$gm_show_marker = get_field('google_map_show_marker', 'options');
	$show_map = get_field('show_map', 'options');

	$address_street = get_field('address_street', 'options');
	$address_city = get_field('address_city', 'options');
	$address_region = get_field('address_region', 'options');
}

//build the map marker string
$map_marker_string = '<span class="marker--name"><b>'.get_bloginfo('name').'</b></span>';

if( !empty( $address_street ) || !empty( $address_city ) || !empty( $address_region ) ) {
	
	if($address_street) {
		$map_marker_string .= '<span class="marker--street">'.$address_street.'</span>';

		if($address_city) {
			$map_marker_string .= '<span class="marker--separator">, </span>';
		}	
	}
	if($address_city) {
		$map_marker_string .= '<span class="marker--city">'.$address_city.'</span>';

		if($address_region) {
			$map_marker_string .= '<span class="marker--separator">, </span>';
		}	
	}
	if($address_region) {
		$map_marker_string .= '<span class="marker--region">'.$address_region.'</span>';	
	}
}


/*
 BASIC VERSION -- iFrame Only (not tested recently...)
 
if($show_map == 'yes' && !empty($gm_api_key)):
	if($gm_lat && $gm_long){
		echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2602.5737549702285!2d'.$gm_long.'!3d'.$gm_lat.'!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDnCsDE3JzA0LjEiTiAxMjPCsDA1JzQ2LjAiVw!5e0!3m2!1sen!2sca!4v1462925426346" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
	}
endif;
*/ ?>


<?php if($show_map == 'yes'): ?>
<div id="google-api-map"></div>


<?php if( !empty($gm_lat) && !empty($gm_long) ): ?>
<script type="text/javascript">
	
jQuery(document).ready(function($){
	//setup dynamic variables
	<?php
	if($gm_show_marker) {
		echo 'var center_map_lat = 0;';
		echo 'var center_map_long = 0;';
		echo 'var show_marker = true;';
	} else {
		echo 'var center_map_lat = '.$gm_lat.';';
		echo 'var center_map_long = '.$gm_long.';';
		echo 'var show_marker = false;';
	}
	if($gm_zoom) {
		echo 'var custom_zoom = '.$gm_zoom.';';
		echo 'var custom_zoom_set = true;';
	} else {
		echo 'var custom_zoom = 12;';
		echo 'var custom_zoom_set = false;';
	}
	if($gm_theme_style) {
		echo 'var custom_theme = '.$gm_theme_style.';';
	} else {
		echo 'var custom_theme = false;';
	}
	?>

	// When the window has finished loading create our google map below
	google.maps.event.addDomListener(window, 'load', initMap);
 	
 	// Main init function. Calls on other functions below.
  	function initMap() {
		var myOptions = {
			zoom: custom_zoom,
			center: new google.maps.LatLng(center_map_lat, center_map_long),
			scrollwheel:  false,
			styles: custom_theme,
			//mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var mapElement = document.getElementById('google-api-map');

		var map = new google.maps.Map(mapElement, myOptions);
		
		setMarkers(map, locations);

	}

	// Build info for markers
	var contentString_1 = '<div><?php echo json_encode($map_marker_string); ?></div>';
	var contentString_2 = '<div>example popup content 2</div>';
	var contentString_3 = '<div>example popup content 3</div>';
	var contentString_4 = '<div>example popup content 4</div>';
	var contentString_5 = '<div>example popup content 5</div>';

	//you can add locations to this array
	var locations = [
		['Location 1', <?php echo $gm_lat; ?>, <?php echo $gm_long; ?>, 1, contentString_1],
		//['Coogee location', -33.923036, 161.259052, 5, contentString_2],
		//['Cronulla location', -36.028249, 153.157507, 3, contentString_3],
		//['Manly location', -31.80010128657071, 151.38747820854187, 2,contentString_4],
		//['Maroubra location', -33.950198, 151.159302, 1, contentString_5]
	];
	
	// Set markers using info above
	function setMarkers(map, locations) {
		//var image = new google.maps.MarkerImage('images/locationflag.png',
		//	new google.maps.Size(20, 32),
		//	new google.maps.Point(0,0),
		//	new google.maps.Point(0, 32));
		//var shadow = new google.maps.MarkerImage('images/locationflag_shadow.png',
		//	new google.maps.Size(37, 32),
		//	new google.maps.Point(0,0),
		//	new google.maps.Point(0, 32));
		//var shape = {
		//	coord: [1, 1, 1, 20, 18, 20, 18 , 1],
		//	type: 'poly'
		//};

		var bounds = new google.maps.LatLngBounds();
		var infowindow = new google.maps.InfoWindow();

		// Loop through each marker.
		if(show_marker === true) {
			for (var i = 0; i < locations.length; i++) {
				var location = locations[i];
				
				var myLatLng = new google.maps.LatLng(location[1], location[2]);
				
				var marker = new google.maps.Marker({
				  position: myLatLng,
				  map: map,
				  //shadow: shadow,
				  //icon: image,
				  //shape: shape,
				  title: location[0],
				  zIndex: location[3],
				  content: location[4]
				});

				// open info window on click
				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(this.content);
					infowindow.open(map, this);
				});

			bounds.extend(myLatLng);
			}

			// Fit the map to the bounds of the markers
			
			map.fitBounds(bounds);

			zoomChangeBoundsListener = 
			    google.maps.event.addListenerOnce(map, 'bounds_changed', function(event) {
			        if (this.getZoom()){
			            this.setZoom(custom_zoom);
			        }
			});
			setTimeout(function(){google.maps.event.removeListener(zoomChangeBoundsListener)}, 2000);
			
		}
		
	}
});

</script>
<?php endif; //$gm_lat, $gm_long ?>
<?php endif; //$show_map ?>

