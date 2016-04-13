// take the comments out before using 

function enter_google_map()
{
	global $themeum;


	global $post;
	ob_start();

		if (isset($themeum)) {
			$lat 		= (isset($themeum['map_lat']))?$themeum['map_lat']:'';
			$lng 		= (isset($themeum['map_log']))?$themeum['map_log']:'';
			$zoom 		= (isset($themeum['map_zoom']))?$themeum['map_zoom']:'';
			$map_logo 	= (isset($themeum['map_logo']))?$themeum['map_logo']:'';

			if ($map_logo !='') {
				$map_logo = $map_logo;
			} else {
				$map_logo = get_template_directory_uri()."/images/map-icon.png";
			}
		?>
			<script type="text/javascript">
				(function(){

					var map;

					map = new GMaps({
						el: '#gmap',
						lat: <?php echo $lat; ?>,
						lng: <?php echo $lng; ?>,
						scrollwheel:false,
						zoom: <?php echo $zoom; ?>,
						zoomControl : false,
						panControl : false,
						streetViewControl : false,
						mapTypeControl: false,
						overviewMapControl: false,
						clickable: false
					});

					
					map.addMarker({
						lat: <?php echo $lat; ?>,
						lng: <?php echo $lng; ?>,
						icon: "<?php echo $map_logo; ?>",
						animation: google.maps.Animation.DROP,
						verticalAlign: 'bottom',
						horizontalAlign: 'center',
						<?php if(isset($themeum['map_address'])) {?>
						infoWindow: {
						  content: "<div><?php echo $themeum['map_address']; ?></div>"
						}
						<?php } ?>
					});

					<?php 
						$road_color 	= '#b4b4b4';
						$water_color 	= '#d8d8d8';
						$land_color 	= '#f1f1f1';
						$fill_color 	= '#000000';
						$poi_color 		= '#d9d9d9';
						$text_color 	= '#000000';

						if ( isset($themeum['skin'] ) && ($themeum['skin'] == 'skin2')) {
							$road_color 	= '#000000';
							$water_color 	= '#333333';
							$land_color 	= '#141414';
							$fill_color 	= '#050505';
							$poi_color 		= '#161616';
							$text_color 	= '#7f8080';
						}

					?>


					var styles = [ 

					{
						"featureType": "road",
						"stylers": [
						{ "color": "<?php echo $road_color; ?>" }
						]
					},{
						"featureType": "water",
						"stylers": [
						{ "color": "<?php echo $water_color; ?>" }
						]
					},{
						"featureType": "landscape",
						"stylers": [
						{ "color": "<?php echo $land_color; ?>" }
						]
					},{
						"elementType": "labels.text.fill",
						"stylers": [
						{ "color": "<?php echo $fill_color; ?>" }
						]
					},{
						"featureType": "poi",
						"stylers": [
						{ "color": "<?php echo $poi_color; ?>" }
						]
					},{
						"elementType": "labels.text",
						"stylers": [
						{ "saturation": 1 },
						{ "weight": 0.1 },
						{ "color": "<?php echo $text_color; ?>" }
						]
					}

					];

					map.addStyle({
						styledMapName:"Styled Map",
						styles: styles,
						mapTypeId: "map_style"  
					});

					map.setStyle("map_style");
				}());
			</script>
		<?php
//		}


	$output = ob_get_contents();
	ob_end_clean();

	echo $output;
//}

add_action('wp_footer','enter_google_map',101);