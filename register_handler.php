<?php
// Connect to database
$db_host = 'db-mysql-nyc1-74817-do-user-13891110-0.b.db.ondigitalocean.com';
$db_name = 'defaultdb';
$db_user = 'doadmin';
$db_pass = 'AVNS_TiObYQOBYOU5Klx6sf8 hide';

// Create a database connection
$link = mysqli_connect($db_host . ':' . $db_port, $db_user, $db_password, $db_name);

// Check connection
if (!$link) {
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
$stmt = mysqli_prepare($link, "INSERT INTO users (user_email, user_password, user_fname, user_lname, user_type, user_image, user_status) VALUES (?, ?, ?, ?, 'user', 'default.jpg', 'Active')");
mysqli_stmt_bind_param($stmt, "ssss", $email, $password_hash, $fname, $lname);

// Execute statement and check for errors
if (mysqli_stmt_execute($stmt)) {
  echo "User registered successfully!";
} else {
  echo "Error registering user: " . mysqli_error($link);
}

// Close statement and connection
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
