/*
 * Google Maps documentation: http://code.google.com/apis/maps/documentation/javascript/basics.html
 * Geolocation documentation: http://dev.w3.org/geo/api/spec-source.html
 */



//Load Map
$(document).on("pagebeforeshow", function () {
	$(document).on('pageshow', '#page2', function (e, data) {
		eksekusi();
		initialize();
		getLocation();
	});
});

//fungsi persiapan map
function initialize() {
	var mapOptions = {
		zoom : 12,
		center : new google.maps.LatLng(-6.945891, 107.595500),
		mapTypeId : google.maps.MapTypeId.ROADMAP,
		panControl : false,
		streetViewControl : false,
		mapTypeControl : false,
		navigationControl : false,
	}

	map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

	// start download url
	
	downloadUrl("bussekolah.xml", function (data) {
		var bounds = new google.maps.LatLngBounds();
		var DATA = data.documentElement.getElementsByTagName("BUS");

		for (var i = 0; i < DATA.length; i++) {
			var latlng = new google.maps.LatLng(parseFloat(DATA[i].getAttribute("lat")), parseFloat(DATA[i].getAttribute("long")));
			bounds.extend(latlng);
			var marker = createMarker("Nomor Polisi : " + DATA[i].getAttribute("nopol") + ", " + "Kecepatan Bus : " + DATA[i].getAttribute('kecepatan') + " Km/H, " + "Update Terakhir : "+ DATA[i].getAttribute('datetime'), latlng);
		} //finish loop
		
		map.fitBounds(bounds);
	}); //end downloadurl
} // end function initialize()

//fungsi pembuatan marker
function createMarker(information, latlng) {
	var marker = new google.maps.Marker({
			position : latlng,
			map : map,
			icon : busicon
		});
	google.maps.event.addListener(marker, "click", function () {
		if (infowindow)
			infowindow.close();
		infowindow = new google.maps.InfoWindow({
				content : information
			});
		infowindow.open(map, marker);
	});
	return marker;
} // end function create marker

//fungsi refresh XML
function eksekusi() {
	$.get("xmlmap.php");
	return false;
} //end function ekseskusi

var x = document.getElementById("geo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        alert( "Geolocation is not supported by this browser.");
		x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
	var latlnguser2 = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
	alert(latlnguser2);
    //alert("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);	
	x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;	
}