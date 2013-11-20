var map;

function initialize(){
	var myLatlng = new google.maps.LatLng(-25.73134, 28.21837);
	var mapOptions = {
		zoom: 3,
		center: myLatlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}

	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

	google.maps.event.addListener(map, 'click',function(event){
		placeMarker(event.latLng);
	});
}


function placeMarker(location){
	var marker = new google.maps.Marker({
		position: location,
		map: map
	});

	map.setCenter(location);
}