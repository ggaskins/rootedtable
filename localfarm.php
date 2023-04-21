<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>RootedTable - Find Local Farms</title>
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCDWFYiYv7q_100zAFF0_H0DahOVLRM34"></script>
    <script>
        var map;
        var geocoder;
        var infowindow;
        var markers = [];
        async function initMap() {
            //@ts-ignore
            const { Map } = await google.maps.importLibrary("maps");
            var center = new google.maps.LatLng(37.0902, -95.7129);
            map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 7
            });

            geocoder = new google.maps.Geocoder();
            infowindow = new google.maps.InfoWindow();

            document.getElementById('search-form').addEventListener('submit', function(e) {
                e.preventDefault();
                clearMarkers();

                var address = document.getElementById('address-input').value;

                geocoder.geocode({ 'address': address }, function(results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        var location = results[0].geometry.location;
                        map.setCenter(location);
                        map.setZoom(10);

                        var marker = new google.maps.Marker({
                            map: map,
                            position: location
                        });
                        markers.push(marker);

                        var distance = parseInt(document.getElementById('distance-input').value);
                        if (isNaN(distance) || distance <= 0) {
                            distance = 10;
                        }

                        var request = {
                            location: location,
                            radius: distance * 1609.34, // convert to meters
                            types: ['farmers_market', 'grocery_or_supermarket']
                        };

                        var service = new google.maps.places.PlacesService(map);
                        service.nearbySearch(request, function(results, status) {
                            if (status === google.maps.places.PlacesServiceStatus.OK) {
                                for (var i = 0; i < results.length; i++) {
                                    createMarker(results[i]);
                                }
                            }
                        });
                    } else {
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });
            });
        }

        function createMarker(place) {
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });

            markers.push(marker);

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                    place.vicinity + '</div>');
                infowindow.open(map, this);
            });
        }

        function clearMarkers() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = [];
        }
    </script>
</head>
<body onload="initMap()">
    <h1>RootedTable - Find Local Farms</h1>
    <form id="search-form">
        <div>
            <label for="address-input">Enter your zip code:</label>
            <input type="text" id="address-input" required>
        </div>
        <div>
            <label for="distance-input">Search radius (in miles):</label>
            <input type="number" id="distance-input" value="10">
        </div>
        <div>
            <button type="submit">Search</button>
        </div>
    </form>
    <div id="map"></div>

</body>
</html>