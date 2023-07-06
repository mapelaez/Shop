var html;

function getLocation(x) {
	html = x;
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	} else { 
		html.innerHTML = "Este navegador no soporta la geolocalización.";
	}
}

function showPosition(position) {
	var latlon = position.coords.latitude + "," + position.coords.longitude;

	var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=200x150&sensor=false&key=AIzaSyBXG_u3OAgmolWq2iKbZiJ-hIJpr6W9OCU";

	html.innerHTML = "<img class='mapa' src='"+img_url+"'>";
}
