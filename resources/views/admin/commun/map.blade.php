@php
	$id = rand(1,100);
@endphp
	<input id="search-input" class="form-control" type="text" placeholder="البحث ...">

	<div id="map-holder-{{ $id }}" style="width:100%; height:500px; margin-bottom: 20px;"></div>

	{!! Form::hidden('lng', null, ['id' => 'lng']) !!}
        
    {!! Form::hidden('lat', null, ['id' => 'lat']) !!}

@section('js')

@if (!isset($notLoaded))
	<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyDx9QoathuBFQzzhyYJwN59ee4k1R7TLRc&libraries=places"></script>
@endif

<script>

	$(document).ready(function() {

	    var title = "";
	    var type = "";
	    var number = "";
	    var region = "";
	    var latlng = new google.maps.LatLng({{ $lat }}, {{ $lng }});

	    var options = {
	        center: latlng,
	        mapTypeId: google.maps.MapTypeId.ROADMAP,
	        zoom: 16,
	    };

	    map = new google.maps.Map(document.getElementById("map-holder-{{ $id }}"), options);

	    marker = new google.maps.Marker({
	        position: latlng,
	        map: map,
	        draggable: true
	    });

	    google.maps.event.addListener(map, 'click', function(event) {
			latlng = event.latLng;
			marker.setPosition(latlng);

			map.panTo(marker.getPosition());

			document.getElementById("lat").value = marker.getPosition().lat() + "";
			document.getElementById("lng").value = marker.getPosition().lng() + "";

	    });

	    google.maps.event.addListener(marker, 'dragend', function(event) {
			latlng = event.latLng;
			map.panTo(marker.getPosition());

			document.getElementById("lat").value = marker.getPosition().lat() + "";
			document.getElementById("lng").value = marker.getPosition().lng() + "";
	    });

		// Create the search box and link it to the UI element.
		var input = document.getElementById('search-input');
		var searchBox = new google.maps.places.SearchBox(input);
		// map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

		// Bias the SearchBox results towards current map's viewport.
		map.addListener('bounds_changed', function() {
			searchBox.setBounds(map.getBounds());
		});

		var markers = [];
		// Listen for the event fired when the user selects a prediction and retrieve
		// more details for that place.
		searchBox.addListener('places_changed', function() {
			var places = searchBox.getPlaces();

			if (places.length == 0) {
				return;
			}

			// Clear out the old markers.
			markers.forEach(function(marker) {
				marker.setMap(null);
			});
			markers = [];

			// For each place, get the icon, name and location.
			var bounds = new google.maps.LatLngBounds();
			places.forEach(function(place) {
				console.log(place.geometry.location);
				latlng = place.geometry.location
				marker.setPosition(latlng);

	            map.panTo(marker.getPosition());

	            document.getElementById("lat").value = marker.getPosition().lat() + "";
				document.getElementById("lng").value = marker.getPosition().lng() + "";
				
			});
		});

	    $("#lng, #lat").keyup(function(){
	    	modifyMarker();
	    });
	});

	function modifyMarker() {

	    if (document.getElementById("lat").value != "" && document.getElementById("lng").value != "") {
	        lat = document.getElementById("lat").value;
	        lng = document.getElementById("lng").value;

	        latlng = new google.maps.LatLng(lat, lng);
	        marker.setPosition(latlng);

	        map.panTo(marker.getPosition());

	    }
	}

</script>
	
@parent
@stop