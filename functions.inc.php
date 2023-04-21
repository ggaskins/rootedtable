<?php
include("database_connection.php");
function generateLink($url, $label, $class) {
    return '<a href="' . $url . '" class="' . $class . '">' . $label . '</a>';
}

function outputStarRating($numStars) {
    $fullStar = '<img src="star-gold.svg" width="16" />';
    $emptyStar = '<img src="star-white.svg" width="16" />';
    
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $numStars) {
            echo $fullStar;
        } else {
            echo $emptyStar;
        }
    }
}

function outputPostRow($business) {
    $address = $business['address'];
    $info = $business['info_snippet'];
    $name = $business['name'];
    $imageFile = $business['image'];
    $rating = $business['rating'];
    $phone = $business['phone'];
    $webpage = $business['website'];
    $mapLink = '<a href="https://www.google.com/maps/search/?api=1&query=' . urlencode($address) . '">' . $address . '</a>';

    // check if image exists, if not use default image
    if (empty($imageFile)) {
        $imageFile = "genericfarm.webp"; // replace with your default image file name
    }

    // generate links
    $businessLink = generateLink("$webpage", "", "");
    $readMoreLink = generateLink("$webpage", "Read more", "btn btn-primary btn-sm");

    // output post row
    echo '<div class="row">';
    echo '<div class="col-md-4">';
    echo $businessLink . '<img src="' . $imageFile . '" alt="' . $name . '" class="img-responsive"/>' . '</a>';
    echo '</div>';
    echo '<div class="col-md-8">';
    echo '<h2>' . $name . '</h2>';
    echo '<div class="details">';
    echo 'Address: ' . $mapLink;
    echo '<span class="pull-right">' . $phone . '</span>';
    echo '<p class="ratings">' . outputStarRating($rating) . '</p>';
    echo '</div>';
    echo '<p class="excerpt">' . $info . '</p>';
    echo '<p class="pull-right ">' . $readMoreLink . '</p>';
    echo '</div>';
    echo '</div>';
    echo '<hr/>';
}

?>