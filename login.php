<?php

//login.php

include("database_connection.php");

if(isset($_COOKIE["type"]))
{
   header("location:index.html");
}

$message = '';

if(isset($_POST["login"]))
{
   if(empty($_POST["user_email"]) || empty($_POST["user_password"]))
   {
      $message = "<div class='alert alert-danger'>Both Fields are required</div>";
  }
  else
  {
      $query = "
      SELECT * FROM user_details 
      WHERE user_email = :user_email
      ";
      $statement = $connect->prepare($query);
      $statement->execute(
         array(
            'user_email' => $_POST["user_email"]
        )
     );
      $count = $statement->rowCount();
      if($count > 0)
      {
         $result = $statement->fetchAll();
         foreach($result as $row)
         {
            if(password_verify($_POST["user_password"], $row["user_password"]))
            {
               setcookie("type", $row["user_type"], time()+3600);
               header("location:index.html");
           }
           else
           {
               $message = '<div class="alert alert-danger">Wrong Password</div>';
           }
       }
   }
   else
   {
       $message = "<div class='alert alert-danger'>Wrong Email Address</div>";
   }
}
}


?>

<!DOCTYPE html>
<html>
<head>
  <title>How to create PHP Login Script using Cookies</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    body {
      background: #00b4ff;
      color: #333;
      font: 100% Arial, Sans Serif;
      height: 100vh;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
  }

  #background-wrap {
      bottom: 0;
      left: 0;
      padding-top: 50px;
      position: fixed;
      right: 0;
      top: 0;
      z-index: -1;
  }

/* KEYFRAMES */

@-webkit-keyframes animateCloud {
  0% {
    margin-left: -1000px;
}
100% {
    margin-left: 100%;
}
}

@-moz-keyframes animateCloud {
  0% {
    margin-left: -1000px;
}
100% {
    margin-left: 100%;
}
}

@keyframes animateCloud {
  0% {
    margin-left: -1000px;
}
100% {
    margin-left: 100%;
}
}

/* ANIMATIONS */

.x1 {
  -webkit-animation: animateCloud 35s linear infinite;
  -moz-animation: animateCloud 35s linear infinite;
  animation: animateCloud 35s linear infinite;
  
  -webkit-transform: scale(0.65);
  -moz-transform: scale(0.65);
  transform: scale(0.65);
}

.x2 {
  -webkit-animation: animateCloud 20s linear infinite;
  -moz-animation: animateCloud 20s linear infinite;
  animation: animateCloud 20s linear infinite;
  
  -webkit-transform: scale(0.3);
  -moz-transform: scale(0.3);
  transform: scale(0.3);
}

.x3 {
  -webkit-animation: animateCloud 30s linear infinite;
  -moz-animation: animateCloud 30s linear infinite;
  animation: animateCloud 30s linear infinite;
  
  -webkit-transform: scale(0.5);
  -moz-transform: scale(0.5);
  transform: scale(0.5);
}

.x4 {
  -webkit-animation: animateCloud 18s linear infinite;
  -moz-animation: animateCloud 18s linear infinite;
  animation: animateCloud 18s linear infinite;
  
  -webkit-transform: scale(0.4);
  -moz-transform: scale(0.4);
  transform: scale(0.4);
}

.x5 {
  -webkit-animation: animateCloud 25s linear infinite;
  -moz-animation: animateCloud 25s linear infinite;
  animation: animateCloud 25s linear infinite;
  
  -webkit-transform: scale(0.55);
  -moz-transform: scale(0.55);
  transform: scale(0.55);
}

/* OBJECTS */

.cloud {
  background: #fff;
  background: -moz-linear-gradient(top,  #fff 5%, #f1f1f1 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(5%,#fff), color-stop(100%,#f1f1f1));
  background: -webkit-linear-gradient(top,  #fff 5%,#f1f1f1 100%);
  background: -o-linear-gradient(top,  #fff 5%,#f1f1f1 100%);
  background: -ms-linear-gradient(top,  #fff 5%,#f1f1f1 100%);
  background: linear-gradient(top,  #fff 5%,#f1f1f1 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff', endColorstr='#f1f1f1',GradientType=0 );
  
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;
  
  -webkit-box-shadow: 0 8px 5px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 8px 5px rgba(0, 0, 0, 0.1);
  box-shadow: 0 8px 5px rgba(0, 0, 0, 0.1);

  height: 120px;
  position: relative;
  width: 350px;
  z-index: 1; /* Add a z-index to move the clouds to the background */
}

.cloud:after, .cloud:before {
  background: #fff;
  content: '';
  position: absolute;
  z-indeX: 1;
}

.cloud:after {
  -webkit-border-radius: 100px;
  -moz-border-radius: 100px;
  border-radius: 100px;

  height: 100px;
  left: 50px;
  top: -50px;
  width: 100px;
  z-indeX: 1;
}

.cloud:before {
  -webkit-border-radius: 200px;
  -moz-border-radius: 200px;
  border-radius: 200px;

  width: 180px;
  height: 180px;
  right: 50px;
  top: -90px;
  z-indeX: 1;
}
.container {
  max-width: 400px; /* set the maximum width to 400 pixels */
  margin: 0 auto; /* center the container horizontally */
}
.hills {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 200px;
    overflow: hidden;
    z-index: 1;
  }
  .hill {
    position: absolute;
    bottom: -20px; /* Adjust this value to adjust the height of the hill */
    left: -50%;
    right: -100%;
    width: 300%;
    height: 150px; /* Adjust this value to adjust the width of the hill */
    border-radius: 50%;
    background-color: #8BC34A;
    transform: skewX(-60deg); /* This property skews the hill to create the peak */
}
.sun {
    position: absolute;
    top: 50px;
    left: 80%;
    width: 100px;
    height: 100px;
    transform: translateX(-50%);
    background-color: #FFEB3B;
    border-radius: 50%;
    z-index: -1000; /* Set the z-index to ensure that the farm is on top of the hill */
    box-shadow: 0px 0px 30px 10px rgba(255, 235, 59, 0.5);
    animation: sun 4s linear infinite;
  }
  @keyframes sun {
    0% {
      background-color: #FFEB3B;
      box-shadow: 0px 0px 30px 10px rgba(255, 235, 59, 0.5);
    }
    50% {
      background-color: #FFFDE7;
      box-shadow: 0px 0px 30px 10px rgba(255, 253, 231, 0.5);
    }
    100% {
      background-color: #FFEB3B;
      box-shadow: 0px 0px 30px 10px rgba(255, 235, 59, 0.5);
    }
  }
</style>
</head>
<div class="sun"></div>
<div id="background-wrap">
  <div class="x1">
    <div class="cloud"></div>
</div>

<div class="x2">
    <div class="cloud"></div>
</div>

<div class="x3">
    <div class="cloud"></div>
</div>

<div class="x4">
    <div class="cloud"></div>
</div>

<div class="x5">
    <div class="cloud"></div>
</div>
<div class="hills">
    <div class="hill"></div>
</div>
</div>
<body>
  <br />
  <div class="container">
     <h2 align="center" style="font-size: 60px; font-weight: bold; text-shadow: 2px 2px 4px #000000; color: white;">Rooted Table</h2>
     <br />
     <div class="panel panel-default" style="border-radius: 20px;">
        <div class="panel-body">
           <span><?php echo $message; ?></span>
           <form method="post">
              <div class="form-group">
                 <label style="font-size: 20px; font-weight: bold; text-shadow: 2px 2px 4px #000000; color: blanchedalmond;" >User Email</label>
                 <input type="text" name="user_email" id="user_email" class="form-control" />
             </div>
             <div class="form-group">
                 <label style="font-size: 20px; font-weight: bold; text-shadow: 2px 2px 4px #000000; color: blanchedalmond;">Password</label>
                 <input type="password" name="user_password" id="user_password" class="form-control" />
             </div>
             <div class="form-group" style="text-align: center;">
                 <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
             </div>
             <p>Don't have an account? <a href="registration.php">Register</a></p>
         </form>
     </div>
 </div>
 <br />
</div>
</body>
</html>