<?php
// Start session
session_start();
// Set page title
$page_title = "Nearby Farms - Map";
// Include header
require_once "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Map of Virginia with Business Markers</title>
  <style>
    #map {
      height: 100%;
      width: 100%;
    }
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
  </style>
</head>
<body>
  <div id="map"></div>
  <script>
  async function initMap() {
    // Fetch the businesses data from the PHP file
    const response = await fetch('fetch_businesses.php');
    const businesses = await response.json();

    // Coordinates of Virginia
    const virginia = { lat: 37.769, lng: -78.170 };

    // Create the map centered on Virginia
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 7,
      center: virginia
    });

    // Array to store the markers
    const markers = [];

    // Function to create markers
    function createMarkers() {
      // Remove existing markers
      markers.forEach(marker => marker.setMap(null));
      markers.length = 0;
      let currentInfoWindow = null;
      // Check if the zoom level is 10 or greater
      if (map.getZoom() >= 10) {
        // Iterate through the businesses and add markers to the map
        businesses.forEach(business => {
          // Get latitude and longitude directly from the database
          const position = {
            lat: parseFloat(business.latitude),
            lng: parseFloat(business.longitude)
          };

          // Create a marker for the business
          const marker = new google.maps.Marker({
            position: position,
            map: map,
            title: business.name
          });

          // Add an info window for the marker with the business details
          const infoWindow = new google.maps.InfoWindow({
            content: `
            <h3>${business.name}</h3>
            <p>Address: ${business.address}</p>
            <p>Phone: ${business.phone}</p>
            ${ business.website != "\r" ? `<a href="${business.website.trim()}">Visit website</a>` : ""}`
          });

          // Open the info window when the marker is clicked
          marker.addListener("click", () => {
            if (currentInfoWindow) {
          currentInfoWindow.close();
        }
        infoWindow.open(map, marker);
        currentInfoWindow = infoWindow;
          });

          // Add the marker to the markers array
          markers.push(marker);
        });
      }
    }

    // Add a listener for the zoom_changed event
    map.addListener("zoom_changed", createMarkers);

    // Call the createMarkers function on map load
    createMarkers();
  }
</script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCDWFYiYv7q_100zAFF0_H0DahOVLRM34&callback=initMap"></script>
</body>
</html>
