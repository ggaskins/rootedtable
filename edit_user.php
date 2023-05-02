<?php
session_start(); 
// Include header file
require_once "header.php";
// Check if the user is logged in and is a master type, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["type"] !== "master"){
  header("location: login.php");
  exit;
}

// Check if user_id parameter is set in the URL
if(!isset($_GET["id"])){
  header("location: admin.php");
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

// Get the user's information from the database
$sql = "SELECT user_email, user_fname, user_lname, user_image, user_type FROM users WHERE user_id = ?";

if($stmt = mysqli_prepare($conn, $sql)){
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "i", $param_id);

  // Set parameters
  $param_id = $_GET["id"];

  // Attempt to execute the prepared statement
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);

    // Check if the user exists
    if(mysqli_stmt_num_rows($stmt) == 1){
      // Bind result variables
      mysqli_stmt_bind_result($stmt, $email, $fname, $lname, $image, $type);
      if(mysqli_stmt_fetch($stmt)){
        // Store user information in session variables
        $user_email = $email;
        $user_fname = $fname;
        $user_lname = $lname;
        $user_image = $image;
        $user_type = $type;
      }
    } else{
      // Redirect to admin page if user does not exist
      header("location: admin.php");
      exit;
    }
  } else{
    echo "Oops! Something went wrong. Please try again later.";
  }

  // Close statement
  mysqli_stmt_close($stmt);
}

// Check if the user has submitted the form to update the user's information
if($_SERVER["REQUEST_METHOD"] == "POST"){
  // Validate form data
  $user_email = trim($_POST["user_email"]);
  $user_fname = trim($_POST["user_fname"]);
  $user_lname = trim($_POST["user_lname"]);
  $user_type = $_POST["user_type"] === "master" ? "master" : "user";
  $user_id = $_GET["id"];

  // Update the user's information in the database
  $sql = "UPDATE users SET user_email=?, user_fname=?, user_lname=?, user_type=? WHERE user_id=?";

  if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ssssi", $param_email, $param_fname, $param_lname, $param_type, $param_id);

    // Set parameters
    $param_email = $user_email;
    $param_fname = $user_fname;
    $param_lname = $user_lname;
    $param_type = $user_type;
    $param_id = $user_id;

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
      // Redirect to the admin page after successful update
      header("location: admin.php");
      exit;
    } else {
      echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .wrapper {
      width: 500px;
      margin: 0 auto;
    }
    img {
      max-width: 100%;
      height: auto;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h2>Edit User</h2>
    <form method="post">
      <div class="form-group">
        <label>Email:</label>
        <input type="email" name="user_email" class="form-control" value="<?php echo htmlspecialchars($user_email); ?>">
      </div>
      <div class="form-group">
        <label>First Name:</label>
        <input type="text" name="user_fname" class="form-control" value="<?php echo htmlspecialchars($user_fname); ?>">
      </div>
      <div class="form-group">
        <label>Last Name:</label>
        <input type="text" name="user_lname" class="form-control" value="<?php echo htmlspecialchars($user_lname); ?>">
      </div>
      <div class="form-group">
        <label>Type:</label>
        <select name="user_type" class="form-control">
          <option value="user" <?php if($user_type == "user") echo "selected"; ?>>User</option>
          <option value="master" <?php if($user_type == "master") echo "selected"; ?>>Master</option>
        </select>
      </div>
      <input type="submit" class="btn btn-primary" value="Submit">
      <a href="admin.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>
</body>
</html>
