<?php
  // Start session
  session_start();
  ini_set('session.cookie_secure', 1);
  // Check if user is already logged in, if yes then redirect to welcome page
  if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <style>
    /* Position video background */
    #video-background {
      position: fixed;
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      z-index: -1;
    }

/* Center login page elements */
.center {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

/* Style login page form */
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 300px; /* Set fixed height */
}

input[type="text"],
input[type="password"] {
  width: 15rem;
  padding: 0.5rem;
  font-size: 1rem;
  border: 2px solid #ccc;
  border-radius: 4px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  margin-bottom: 0.5rem; /* Adjust margin bottom */
}

input[type="text"]:focus::placeholder,
input[type="password"]:focus::placeholder {
  color: transparent;
}

input[type="submit"] {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-top: 1rem; /* Add margin top */
}
label {
  font-weight: bold;
}

input[type="text"], input[type="password"] {
  padding: 0.5rem;
  font-size: 1rem;
}

input[type="submit"] {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

/* Style header */
.header {
  height: 8rem;
  display: block;
  margin-right: 20rem;
}

.logo {
  font-family: Arial, sans-serif;
  font-size: 4rem;
  color: white;
  text-shadow: 0 0 10px #000;
  text-transform: uppercase;
  letter-spacing: 0.5rem;
  text-align: right;
  margin: 0;
  padding: 0;
  border: 2px solid #000;
  border-radius: 1rem;
  padding: 1rem;
  box-shadow: 0 0 10px #000;
}

span {
  color: red;
}
</style>
</head>
<video autoplay muted loop id="video-background">
  <source src="farm-video.mp4" type="video/mp4">
    Your browser does not support HTML5 video.
  </video>
  <div class="center">
    <body>
      <div class="header">
        <h1 class="logo">Rooted Table</h1>
      </div>

      <?php
  // Initialize database connection parameters
      $db_host = 'db-mysql-nyc1-74817-do-user-13891110-0.b.db.ondigitalocean.com';
      $db_port = '25060';
      $db_name = 'defaultdb';
      $db_user = 'doadmin';
      $db_password = 'AVNS_TiObYQOBYOU5Klx6sf8';

// Check if the user is already logged in, if yes then redirect to welcome page
      if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
      }

// Define variables and initialize with empty values
      $username = $password = "";
      $username_err = $password_err = "";

// Processing form data when form is submitted
      if($_SERVER["REQUEST_METHOD"] == "POST"){

  // Check if username is empty
        if(empty(trim($_POST["username"]))){
          $username_err = "Please enter username.";
        } else{
          $username = trim($_POST["username"]);
        }

  // Check if password is empty
        if(empty(trim($_POST["password"]))){
          $password_err = "Please enter your password.";
        } else{
          $password = trim($_POST["password"]);
        }

  // Validate credentials
        if(empty($username_err) && empty($password_err)){
    // Attempt to connect to MySQL database
          $link = mysqli_connect($db_host . ':' . $db_port, $db_user, $db_password, $db_name);

          if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
          }

    // Prepare a select statement
          $sql = "SELECT user_id, user_email, user_password, user_fname FROM users WHERE user_email = ?";

          if($stmt = mysqli_prepare($link, $sql)){
      // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

      // Set parameters
            $param_username = $username;

      // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
        // Store result
              mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then verify password
              if(mysqli_stmt_num_rows($stmt) == 1){                    
          // Bind result variables
                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $user_fname);
                if(mysqli_stmt_fetch($stmt)){
                  if(password_verify($password, $hashed_password)){
                    
              // Store data in session variables
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $id;
                    $_SESSION["username"] = $username;
                    $_SESSION["name"] = $user_fname;                   

              // Redirect user to welcome page
                    header("location: welcome.php");
                  } else{
              // Display an error message if password is not valid
                    $password_err = "The password you entered was not valid.";
                  }
                }
              } else{
                      // Display an error message if username doesn't exist
                $username_err = "No account found with that username.";
              }
            } else{
              echo "Oops! Something went wrong. Please try again later.";
            }

              // Close statement
            mysqli_stmt_close($stmt);
          }

          // Close connection
          mysqli_close($link);
        }
      }
      ?>
      <div class="center">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div>
            <label for="username"></label>
            <input type="text" id="username" name="username"  placeholder="Username" value="<?php echo $username; ?>">
            <span><?php echo $username_err; ?></span>
          </div>    
          <div>
            <label for="password"></label>
            <input type="password" id="password"  placeholder="Password" name="password">
            <span><?php echo $password_err; ?></span>
          </div>
          <div>
            <input type="submit" value="Login">
          </div>
          <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        </form>
      </div>
      <script>
        const video = document.getElementById('video-background');
        let isPlayingBackwards = false;

    // Play the video backwards or forwards when it reaches the end
        video.addEventListener('ended', () => {
          if (!isPlayingBackwards) {
            isPlayingBackwards = true;
        video.playbackRate = -1; // Play backwards
      } else {
        isPlayingBackwards = false;
        video.playbackRate = 1; // Play forwards
      }
      video.play();
    });
  </script>
</body>
</div>
</html>
<?php
// Include footer file
require_once "footer.php";
?>
