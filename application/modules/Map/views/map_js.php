<script>
	var map;
	var x = document.getElementById("demo");
	var markers = [];
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 12
		});

		var infoWindow = new google.maps.InfoWindow({map: map});

		// Try HTML5 geolocation.
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};
				var marker = new google.maps.Marker({
					position: pos,
					map: map,
					icon: "https://maps.gstatic.com/intl/en_us/mapfiles/markers2/measle_blue.png",
					title: 'Hello World!'
				});
				map.setCenter(pos);
			}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
			});
		} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
		}

		setMarkers(map);
	}

	function setMarkers(map){
		window.jQuery.get('<?= @base_url(); ?>Map/getPharmacies', function(res){
			var contentString = [];
			for(var i in res){
				var pharmacy = res[i];
				var iconBase = '<?= @$this->config->item("assets_url"); ?>icons/';

				var location = new google.maps.LatLng(pharmacy.latitude, pharmacy.longitude);
				var infowindow = new google.maps.InfoWindow();
				contentString[i] = pharmacy.content_string;
				var marker = new google.maps.Marker({
					position : location,
					map: map,
					title: pharmacy.name,
					icon: iconBase + "hospital.png"
				});

				google.maps.event.addListener(marker, 'click', (function(marker, i) {					
					return function() {
						map.setZoom(20);
						map.setCenter(marker.getPosition());
						infowindow.setContent(contentString[i]);
						infowindow.open(map, marker);
					}
				})(marker, i));
				markers.push(marker);
			}
		});
	}

	window.jQuery(document).ready(function(){
		window.jQuery('body').removeClass("no-page-heading fluid-width no-top-content-padding no-bottom-content-padding");
		window.jQuery('body').addClass("no-page-heading fluid-width no-top-content-padding");
		// no-page-heading fluid-width no-top-content-padding
	});
</script>