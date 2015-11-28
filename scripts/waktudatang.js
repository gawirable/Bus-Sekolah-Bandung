/*
 * Google Maps documentation: http://code.google.com/apis/maps/documentation/javascript/basics.html
 * Geolocation documentation: http://dev.w3.org/geo/api/spec-source.html
 */


//Load Map
$(document).on("pagebeforecreate", "#page4", function () {
	var defaultLatLng = new google.maps.LatLng(34.0983425, -118.3267434); // Default to Hollywood, CA when no geolocation support
	if (navigator.geolocation) {
		
		function success(pos) {
			// Location found, show map with these coordinates
			var latuser = pos.coords.latitude;
			var lnguser = pos.coords.longitude;
			var latlnguser = new google.maps.LatLng(latuser, lnguser);
			glat = latuser;
			glng = lnguser;
			glatlng = latlnguser;
			eksekusi();
			initialize2();
			callback();

		}
		
		function fail(error) {
			drawMap(defaultLatLng); // Failed to find location, show default map
			alert("Failed to find location!!!");
		}
		
		// Find the users current position.  Cache the location for 5 minutes, timeout after 6 seconds
		navigator.geolocation.getCurrentPosition(success, fail, {
			maximumAge : 500000,
			enableHighAccuracy : true,
			timeout : 6000
		});
	}else {
		drawMap(defaultLatLng); // No geolocation support, show default map
		alert("No geolocation support!!!");
	} // end dc function

	function drawMap(latlnguser) {
		var myOptions = {
			zoom : 12,
			center : latlnguser,
			mapTypeId : google.maps.MapTypeId.ROADMAP,
			panControl : false,
			streetViewControl : false,
			mapTypeControl : false,
			navigationControl : false,
		};
		
		var map = new google.maps.Map(document.getElementById("map_canvas2"), myOptions);
		
		// Add an overlay to the map of current lat/lng
		var marker = new google.maps.Marker({
				position : latlnguser,
				map : map,
				icon : busicon
			});
	}// end drawmap
}); 

//deklarasi fungsi min
Array.prototype.min = function () {
	return Math.min.apply(null, this);
};

//fungsi persiapan maps
function initialize2() {
	geocoder = new google.maps.Geocoder();
	var mapOptions = {
		zoom : 12,
		center : new google.maps.LatLng(glat, glng),
		mapTypeId : google.maps.MapTypeId.ROADMAP,
		panControl : false,
		streetViewControl : false,
		mapTypeControl : false,
		navigationControl : false,

	}
	
	map2 = new google.maps.Map(document.getElementById('map_canvas2'), mapOptions);

	// jalur
	var myTrip = [antld1, antld2, antld3, antld4, antld5, antld6, antld7, antld8, antld9, antld10, antld11, antld12, antld13, antld14, antld15, antld16, antld17, antld18, antld19, antld20, antld21, antld22, antld23, antld24, antld25, antld26];
	var flightPath = new google.maps.Polyline({
			path : myTrip,
			strokeColor : "#FF0000",
			strokeOpacity : 0.8,
			strokeWeight : 1.5
		});
		
	flightPath.setMap(map2);

	// start download url
	downloadUrl("bussekolah.xml", function (data) {
		var bounds = new google.maps.LatLngBounds();
		var DATA = data.documentElement.getElementsByTagName("BUS");

		for (var i = 0; i < DATA.length; i++) {
			
			var val2 = $("input[name='radio-choice']:checked").val();
			if (i == val2) {
				var latlngbus = new google.maps.LatLng(parseFloat(DATA[i].getAttribute("lat")), parseFloat(DATA[i].getAttribute("long")));
				bounds.extend(latlngbus);

				var jarbuskamu = hitungjarakbuskamu(parseFloat(DATA[i].getAttribute("lat")), parseFloat(DATA[i].getAttribute("long")));
				document.getElementById("jarak").innerHTML = "Sekitar " + Math.round(jarbuskamu) + " Km.";

				var jarbus = hitungjarakbus(parseFloat(DATA[i].getAttribute("lat")), parseFloat(DATA[i].getAttribute("long")));
				document.getElementById("jarakbus").innerHTML = "Sekitar " + Math.round(jarbus) + " Km.";

				var kecepatan = DATA[i].getAttribute('kecepatan');
				var waktutempuh = (jarbus / kecepatan) * 60
				if(kecepatan==0){
					document.getElementById("waktu").innerHTML = "Bus Sedang Berhenti";
				}
				else{
					document.getElementById("waktu").innerHTML = "Sekitar " + waktutempuh.toFixed(2) + " Menit";
				}
				

				var marker2 = createMarker2("Nomor Polisi : " + DATA[i].getAttribute("nopol") + ", " + "Kecepatan Bus : " + DATA[i].getAttribute('kecepatan') + " Km/H, " + "Update Terakhir : "+ DATA[i].getAttribute('datetime'), latlngbus, busicon);
				if(DATA[i].getAttribute('kecepatan')==0){
					document.getElementById("kecepatan").innerHTML = "Bus Sedang Berhenti";
				}
				else{
					document.getElementById("kecepatan").innerHTML = DATA[i].getAttribute('kecepatan') + " Km/H";
				}
				
				var marker2 = createMarker2("Posisi kamu disini!", glatlng, usericon);
				
				//kondisi switch pulper
				var val = $("input[name='radio-choice-h-1']:checked").val();
				if (val == "pergi") {
					var marker2 = createMarker2("Berangkat dari : Terminal Antapani", antld1, starticon);
					var marker2 = createMarker2("Tujuan : Terminal Ledeng", antld26, finishicon);
				} else if (val == "pulang") {
					var marker2 = createMarker2("Tujuan : Terminal Antapani", antld1, finishicon);
					var marker2 = createMarker2("Berangkat dari : Terminal Ledeng", antld26, starticon);
				}
				
				callback();
				var marker2 = createMarker2("Titik terdekat dari lokasi kamu yang akan dilalui bus sekolah.", kordterdekat, terdekaticon);
				return;
			}

		} //finish loop

		map2.fitBounds(bounds);
	}); //end downloadurl

} // end function initialize()

//fungsi membuat marker
function createMarker2(information, latlngbus, icon) {
	var marker2 = new google.maps.Marker({
			position : latlngbus,
			map : map2,
			icon : icon
		});

	google.maps.event.addListener(marker2, "click", function () {
		if (infowindow2)
			infowindow2.close();
		infowindow2 = new google.maps.InfoWindow({
				content : information
			});
		infowindow2.open(map2, marker2);
	});
	
	return marker2;
}

//hitung jarak terdekat
function hitungjarak() {
	var jarak = [];
	var terpendek;
	var koor = [antld1, antld2, antld3, antld4, antld5, antld6, antld7, antld8, antld9, antld10, antld11, antld12, antld13, antld14, antld15, antld16, antld17, antld18, antld19, antld20, antld21, antld22, antld23, antld24, antld25, antld26];
	var lat1 = glat;
	var lon1 = glng;
	terpendek = 0;
	//seleksi jarak terpendek dari user-ways point
	for (i = 0; i < koor.length; i++) {
		var lat2 = koor[i].lat();
		var lon2 = koor[i].lng();
		var R = 6371; // Radius of the earth in km
		var dLat = (lat2 - lat1) * Math.PI / 180; // deg2rad below
		var dLon = (lon2 - lon1) * Math.PI / 180;
		var a = 0.5 - Math.cos(dLat) / 2 + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * (1 - Math.cos(dLon)) / 2;
		var d = R * 2 * Math.asin(Math.sqrt(a));
		jarak[i] = d;
	}
	terpendek = jarak.min();

	//mencari kordinat
	for (i = 0; i < koor.length; i++) {
		var lat2 = koor[i].lat();
		var lon2 = koor[i].lng();
		var R = 6371; // Radius of the earth in km
		var dLat = (lat2 - lat1) * Math.PI / 180; // deg2rad below
		var dLon = (lon2 - lon1) * Math.PI / 180;
		var a = 0.5 - Math.cos(dLat) / 2 + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * (1 - Math.cos(dLon)) / 2;
		var d = R * 2 * Math.asin(Math.sqrt(a));
		if (d == terpendek) {
			return [terpendek, koor[i]];
		}
	}

}

//hitung jarak bus
function hitungjarakbuskamu(latbus, lngbus) {
	var lat1 = latbus;
	var lon1 = lngbus;
	var lat2 = glat;
	var lon2 = glng;
	var R = 6371; // Radius of the earth in km
	var dLat = (lat2 - lat1) * Math.PI / 180; // deg2rad below
	var dLon = (lon2 - lon1) * Math.PI / 180;
	var a = 0.5 - Math.cos(dLat) / 2 + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * (1 - Math.cos(dLon)) / 2;
	var d = R * 2 * Math.asin(Math.sqrt(a));

	return d;
}

//hitung jarak bus ke tempat kamu
function hitungjarakbus(latbus, lngbus) {
	var lat1 = latbus;
	var lon1 = lngbus;
	var lat2 = kordterdekat.lat();
	var lon2 = kordterdekat.lng();
	var R = 6371; // Radius of the earth in km
	var dLat = (lat2 - lat1) * Math.PI / 180; // deg2rad below
	var dLon = (lon2 - lon1) * Math.PI / 180;
	var a = 0.5 - Math.cos(dLat) / 2 + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * (1 - Math.cos(dLon)) / 2;
	var d = R * 2 * Math.asin(Math.sqrt(a));
	
	return d;
}

//fungsi untuk menampilkan ke HTML
function callback() {
	var ht = hitungjarak();
	//var htbus = hitungjarakbus();
	var pdk = ht[0];
	kordterdekat = ht[1];

	document.getElementById("jarak").innerHTML = "Sekitar " + Math.round(pdk) + " Km.";
	codeLatLng();
	var val = $("input[name='radio-choice-h-1']:checked").val();
	//seleksi switch pulper
	if (val == "pergi") {
		document.getElementById("keberangkatan").innerHTML = "Terminal Antapani"
		document.getElementById("tujuanakhir").innerHTML = "Terminal Ledeng"
	} else if (val == "pulang") {
		document.getElementById("keberangkatan").innerHTML = "Terminal Ledeng"
		document.getElementById("tujuanakhir").innerHTML = "Terminal Antapani"
	}

}

//fungsi menampilkan jalan ke HTML
function processAddress(address) {
	document.getElementById("terdekat").innerHTML = address; // write address to field

}

//fungsi riverse geocode / konversi dari kordinat ke nama jalan
function codeLatLng() {
	var latlng = new google.maps.LatLng(kordterdekat);
	geocoder.geocode({
		'latLng' : kordterdekat
	}, function (results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			if (results[0]) {

				// processAddress(latlng);
				processAddress(results[0].formatted_address);
			} else {
				alert("No results found");
			}
		} else {
			alert("Geocoder failed due to: " + status);
		}
	});
}
