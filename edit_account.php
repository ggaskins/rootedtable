<?php
// Initialize session
session_start();

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

// Define variables and initialize with empty values
$email = $fname = $lname = $password = "";
$email_err = $fname_err = $lname_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Validate email
  if(empty(trim($_POST["email"]))){
    $email_err = "Please enter an email.";
  } else{
    // Check if email is already taken
    $sql = "SELECT user_id FROM users WHERE user_email = ? AND user_id != ?";

    if($stmt = mysqli_prepare($conn, $sql)){
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "si", $param_email, $param_id);

      // Set parameters
      $param_email = trim($_POST["email"]);
      $param_id = $_SESSION["id"];

      // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);

        if(mysqli_stmt_num_rows($stmt) == 1){
          $email_err = "This email is already taken.";
        } else{
          $email = trim($_POST["email"]);
        }
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
  }

  // Validate first name
  if(empty(trim($_POST["fname"]))){
    $fname_err = "Please enter your first name.";
  } else{
    $fname = trim($_POST["fname"]);
  }

  // Validate last name
  if(empty(trim($_POST["lname"]))){
    $lname_err = "Please enter your last name.";
  } else{
    $lname = trim($_POST["lname"]);
  }

  // Validate password
  if(!empty(trim($_POST["password"]))){
    if(strlen(trim($_POST["password"])) < 6){
      $password_err = "Password must have at least 6 characters.";
    } else{
      $password = trim($_POST["password"]);
    }
  }

  // Check input errors before updating the database
  if(empty($email_err) && empty($fname_err) && empty($lname_err) && empty($password_err)){
    // Prepare an update statement
    $sql = "UPDATE users SET user_email = ?, user_fname = ?, user_lname = ?";

    // Update password if not empty
    if(!empty($password)){
      $sql .= ", user_password = ?";
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }

    $sql .= " WHERE user_id = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
      // Bind variables to the prepared statement as parameters
      if(!empty($password)){
        mysqli_stmt_bind_param($stmt, "ssssi", $email, $fname, $lname, $hashed_password, $_SESSION["id"]);
      } else{
        mysqli_stmt_bind_param($stmt, "sssi", $email, $fname, $lname, $_SESSION["id"]);
      }
       // Attempt to execute the prepared statement
      if(mysqli_stmt_execute($stmt)){
    // Update session variables
        $_SESSION["username"] = $email;
        $_SESSION["name"] = $fname;

    // Redirect to account page
        header("location: account.php");
      } else{
        echo "Oops! Something went wrong. Please try again later.";
      }

  // Close statement
      mysqli_stmt_close($stmt);
    }
  }
// Close connection
mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Account</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    .wrapper {
      width: 500px;
      margin: 0 auto;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <h2>Edit Account</h2>
    <p>Please fill in the fields to update your account.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION["username"]); ?>">
        <span class="help-block"><?php echo $email_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($fname_err)) ? 'has-error' : ''; ?>">
        <label>First Name</label>
        <input type="text" name="fname" class="form-control" value="<?php echo htmlspecialchars($_SESSION["name"]); ?>">
        <span class="help-block"><?php echo $fname_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
        <label>Last Name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo htmlspecialchars($_SESSION["lname"]); ?>">
        <span class="help-block"><?php echo $lname_err; ?></span>
      </div>
      <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="">
        <span class="help-block"><?php echo $password_err; ?></span>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Submit">
        <a class="btn btn-link" href="account.php">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>