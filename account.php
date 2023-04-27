<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
// Include header file
require_once "header.php";
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
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

// Get user information from the database
$sql = "SELECT user_email, user_fname, user_lname, user_image FROM users WHERE user_id = ?";

if($stmt = mysqli_prepare($conn, $sql)){
  // Bind variables to the prepared statement as parameters
  mysqli_stmt_bind_param($stmt, "i", $param_id);

  // Set parameters
  $param_id = $_SESSION["id"];

  // Attempt to execute the prepared statement
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);

    // Check if the user exists
    if(mysqli_stmt_num_rows($stmt) == 1){
      // Bind result variables
      mysqli_stmt_bind_result($stmt, $email, $fname, $lname, $image);
      if(mysqli_stmt_fetch($stmt)){
        // Store user information in session variables
        $_SESSION["username"] = $email;
        $_SESSION["name"] = $fname;
        $_SESSION["lname"] = $lname;
        $_SESSION["image"] = $image;
      }
    } else{
      // Redirect to login page if user does not exist
      header("location: login.php");
      exit;
    }
  } else{
    echo "Oops! Something went wrong. Please try again later.";
  }

  // Close statement
  mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account</title>
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
    <h2>Account Information</h2>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?>!</p>
    <div class="form-group">
      <label>Email:</label>
      <p><?php echo htmlspecialchars($_SESSION["username"]); ?></p>
    </div>
    <div class="form-group">
      <label>First Name:</label>
      <p><?php echo htmlspecialchars($_SESSION["name"]); ?></p>
    </div>
    <div class="form-group">
      <label>Last Name:</label>
      <p><?php echo htmlspecialchars($_SESSION["lname"]); ?></p>
    </div>
    <?php if(!empty($_SESSION["image"])): ?>
      <div class="form-group">
        <label>Image:</label>
        <img src="<?php echo htmlspecialchars($_SESSION["image"]); ?>" alt="User Image">
      </div>
    <?php endif; ?>
    <p>
      <a href="edit_account.php" class="btn btn-primary">Edit Account</a>
      <a href="logout.php" class="btn btn-danger">Log Out</a>
    </p>
  </div>
</body>
</html>
