// Replace with your Google Maps Geocoding API key
const apiKey = 'AIzaSyBCDWFYiYv7q_100zAFF0_H0DahOVLRM34';

$("#search-form").submit(async (e) => {
    e.preventDefault();
    const address = $("#address").val();
    const distance = $("#distance").val();
    const geocodeUrl = `https://maps.googleapis.com/maps/api/geocode/json?address=${encodeURIComponent(address)}&key=${apiKey}`;

    try {
        const response = await fetch(geocodeUrl);
        const data = await response.json();
        if (data.status !== 'OK') {
            alert('Error: ' + data.status);
            return;
        }

        const location = data.results[0].geometry.location;
        const nearbyBusinesses = await searchNearbyBusinesses(location.lat, location.lng, distance);
        displayResults(nearbyBusinesses);
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
});

async function searchNearbyBusinesses(lat, lng, distance) {
    const url = `/search?lat=${lat}&lng=${lng}&distance=${distance}`;
    const response = await fetch(url);
    return await response.json();
}

function displayResults(businesses) {
    const resultsDiv = $("#results");
    resultsDiv.empty();
    if (businesses.length === 0) {
        resultsDiv.append('<p>No nearby businesses found.</p>');
        return;
    }

    const list = $('<ul></ul>');
    businesses.forEach(business => {
        list.append(`<li><strong>${business.name}</strong> - ${business.address} (${business.distance.toFixed(1)} miles)</li>`);
    });
    resultsDiv.append(list);
}