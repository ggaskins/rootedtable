<?php
// Database configuration
$db_host = 'db-mysql-nyc1-74817-do-user-13891110-0.b.db.ondigitalocean.com';
$db_port = '25060';
$db_name = 'defaultdb';
$db_user = 'doadmin';
$db_password = 'AVNS_TiObYQOBYOU5Klx6sf8';

// Create a database connection
$conn = mysqli_connect($db_host . ':' . $db_port, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

// Hash and salt the password
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Prepare and bind SQL statement
$stmt = mysqli_prepare($conn, "INSERT INTO users (user_email, user_password, user_fname, user_lname, user_type, user_image, user_status) VALUES (?, ?, ?, ?, 'user', 'default.jpg', 'Active')");
mysqli_stmt_bind_param($stmt, "ssss", $email, $password_hash, $fname, $lname);

// Execute statement and check for errors
if (mysqli_stmt_execute($stmt)) {
  header("location: login.php");
} else {
  echo "Error registering user: " . mysqli_error($conn);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
