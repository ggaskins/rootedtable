<?php
session_start(); 
$page_title = "Rooted Table - Admin";
// Include header file
require_once "header.php";
// Check if the user is logged in and is a master type, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["type"] !== "master"){
  header("location: login.php");
  exit;
}

// Database configuration
$db_host = 'db-mysql-nyc1-74817-do-user-13891110-0.b.db.ondigitalocean.com';
$db_port = '25060';
$db_name = 'defaultdb';
$db_user = 'doadmin';
$db_password = 'AVNS_TiObYQOBYOU5Klx6sf8';

// Create a database connection
$conn = mysqli_connect($db_host . ':' . $db_port, $db_user, $db_password, $db_name);

// Get all user information from the database
$sql = "SELECT user_id, user_email, user_fname, user_lname, user_image, user_type FROM users";

// Attempt to execute the SQL statement
$result = mysqli_query($conn, $sql);

// Check if there are any users in the database
if(mysqli_num_rows($result) > 0){
  // Display a table of all users with edit and delete buttons
  echo "<table class='table'>";
  echo "<thead><tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Type</th><th>Actions</th></tr></thead>";
  echo "<tbody>";
  while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row["user_id"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["user_email"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["user_fname"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["user_lname"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["user_type"]) . "</td>";
    echo "<td>";
    echo "<a href='edit_user.php?id=" . htmlspecialchars($row["user_id"]) . "' class='btn btn-primary'>Edit</a> ";
    echo "<a href='delete_user.php?id=" . htmlspecialchars($row["user_id"]) . "' class='btn btn-danger'>Delete</a>";
    echo "</td>";
    echo "</tr>";
  }
  echo "</tbody></table>";
} else {
  // Display a message if there are no users in the database
  echo "<p>No users found.</p>";
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Admin Panel</h2>
    <a href="create_user.php" class="btn btn-primary">Create User</a>
    <a href="logout.php" class="btn btn-danger">Log Out</a>
  </div>
</body>
</html>
