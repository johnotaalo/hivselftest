<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<style type="text/css">
	#map {
		height: 90%;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?= @$this->config->item('assets_url'); ?>map-icons/css/map-icons.css">
<script type="text/javascript" src="<?= @$this->config->item('assets_url'); ?>map-icons/js/map-icons.js"></script>
<div id="demo"></div>
<div id="map"></div>

<script>
	var map;
	var x = document.getElementById("demo");
	var markers = [];
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 8
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
		$.get('<?= @base_url(); ?>Map/getPharmacies', function(res){
			var contentString = [];
			for(var i in res){
				var pharmacy = res[i];
				var iconBase = '<?= @$this->config->item("assets_url"); ?>icons/';

				var location = new google.maps.LatLng(pharmacy.latitude, pharmacy.longitude);
				var infowindow = new google.maps.InfoWindow();
				contentString[i] = pharmacy.name;
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
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?= @$this->config->item('key'); ?>&callback=initMap"
    async defer></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script> -->