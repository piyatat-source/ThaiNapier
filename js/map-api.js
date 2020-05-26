var marker = null;
function initMap() {
  var start = { lat: 13.736717, lng: 100.523186 };
  var map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: start,
    streetViewControl: false,
  });
  map.addListener("click", function (mapsMouseEvent) {
    if (marker) {
      marker.setMap(null);
    }
    marker = new google.maps.Marker({
      position: mapsMouseEvent.latLng,
      title: "You are here!",
    });
    marker.setMap(map);

    var x = mapsMouseEvent.latLng.toString();
    var latlong = x;
    latlong = latlong.slice(1, latlong.length - 1);
    var info = latlong.split(",");
    var lat = info[0];
    var long = info[1];

    document.getElementById("ll").innerHTML = lat + "," + long;
    document.getElementById("input-lat").value = lat.trim();
    document.getElementById("input-lng").value = long.trim();
  });

  //Event Search button
  var geocoder = new google.maps.Geocoder();
  document.getElementById("find").addEventListener("click", function () {
    geocodeAddress(geocoder, map);
  });
}

function geocodeAddress(geocoder, resultsMap) {
  var search = document.getElementById("search").value;
  geocoder.geocode({ address: search }, function (results, status) {
    if (status === "OK") {
      resultsMap.setCenter(results[0].geometry.location);
    } else {
      Swal.fire({
        position: "center",
        icon: "error",
        title: "ไม่พบข้อมูลบนแผนที่",
        showConfirmButton: false,
        timer: 1600,
      });
    }
  });
}
