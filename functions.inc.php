<?php

function generateLink($url, $label, $class) {
    return '<a href="' . $url . '" class="' . $class . '">' . $label . '</a>';
}

function outputStarRating($numStars) {
    $fullStar = '<img src="images/star-gold.svg" width="16" />';
    $emptyStar = '<img src="images/star-white.svg" width="16" />';
    
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $numStars) {
            echo $fullStar;
        } else {
            echo $emptyStar;
        }
    }
}

function outputPostRow($post) {
    $postId = $post['postId'];
    $userId = $post['userId'];
    $title = $post['title'];
    $excerpt = $post['excerpt'];
    $imageFile = $post['thumb'];
    $date = date('F j, Y', strtotime($post['date']));
    $rating = $post['reviewsRating'];

    // generate links
    $postLink = generateLink("post.php?id=$postId", "", "");
    $userLink = generateLink("user.php?id=$userId", $post['userName'], "");
    $readMoreLink = generateLink("post.php?id=$postId", "Read more", "btn btn-primary btn-sm");

    // output post row
    echo '<div class="row">';
    echo '<div class="col-md-4">';
    echo $postLink . '<img src="images/' . $imageFile . '" alt="' . $title . '" class="img-responsive"/>' . '</a>';
    echo '</div>';
    echo '<div class="col-md-8">';
    echo '<h2>' . $title . '</h2>';
    echo '<div class="details">';
    echo 'Posted by ' . $userLink;
    echo '<span class="pull-right">' . $date . '</span>';
    echo '<p class="ratings">' . outputStarRating($rating) . '</p>';
    echo '</div>';
    echo '<p class="excerpt">' . $excerpt . '</p>';
    echo '<p class="pull-right ">' . $readMoreLink . '</p>';
    echo '</div>';
    echo '</div>';
    echo '<hr/>';
}

?>