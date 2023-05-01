<?php
$db_host = 'db-mysql-nyc1-74817-do-user-13891110-0.b.db.ondigitalocean.com';
$db_port = '25060';
$db_name = 'defaultdb';
$db_user = 'doadmin';
$db_password = 'AVNS_TiObYQOBYOU5Klx6sf8';

// Create a database connection
$conn = mysqli_connect($db_host . ':' . $db_port, $db_user, $db_password, $db_name);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get all businesses
$query = "SELECT * FROM businesses";
$result = mysqli_query($conn, $query);

$businesses = array();

// Fetch the businesses and store them in an array
while ($row = mysqli_fetch_assoc($result)) {
    $businesses[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Output the businesses as a JSON object
header('Content-Type: application/json');
echo json_encode($businesses);
?>
