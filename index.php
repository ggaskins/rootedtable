<?php
//index.php

include("database_connection.php");

session_start();

if (!isset($_SESSION['user_id'])) {
  header("location:login.php");
  exit;
}

$user_id = $_SESSION['user_id'];
$user_type = $_SESSION['user_type'];

if(!isset($_COOKIE["type"]))
{
 header("location:login.php");
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Lab4: Authentication Using Cookies</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Add some custom styles here */
    nav {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      display: flex;
      justify-content: space-between;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin-left: 20px;
    }

    footer {
      background-color: #ddd;
      color: #333;
      padding: 10px;
      text-align: center;
    }

    .user-info {
      display: flex;
      align-items: center;
    }

    .user-info img {
      border-radius: 50%;
      margin-right: 10px;
    }

    .dropdown-menu {
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 10px;
      position: absolute;
      right: 20px;
      top: 60px;
      z-index: 100;
      display: none;
    }

    .dropdown-toggle {
      cursor: pointer;
    }

    .dropdown-toggle:hover + .dropdown-menu {
      display: block;
    }

    .social-media {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .social-media a {
      display: inline-block;
      margin: 0 10px;
      font-size: 24px;
      color: #333;
    }

    .social-media a:hover {
      color: #666;
    }
  </style>
 </head>
 <body>
  <nav>
    <div class="logo">
      <a href="#">My Website</a>
    </div>
    <div class="menu">
      <a href="#">Home</a>
      <a href="#">About</a>
      <a href="#">Contact</a>
      <div class="user-info">
        <img src="https://via.placeholder.com/50x50" alt="User Avatar">
        <div class="dropdown">
          <a class="dropdown-toggle" href="#">Welcome, <?php echo $_COOKIE["type"] ?></a>
          <div class="dropdown-menu">
            <a href="#">My Profile</a>
            <a href="#">Settings</a>
            <a href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">
   <h2 align="center">How to create PHP Login Script using Cookies</h2>
   <br />
   <?php
     if ($user_type === "admin") {
       echo '<h3 align="center">Welcome Admin</h3>';
     }
?>

   <div class="content">
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam hendrerit posuere elit, vel scelerisque nibh eleifend non. In nec metus velit. Fusce maximus dolor vel elit tincidunt, eu bibendum nisi tempor. Nulla luctus, magna vel dictum maximus, nulla lacus viverra felis, sit amet convallis nisl metus id felis. Donec malesuada lectus nisi, id molestie velit iaculis eget. Sed a sapien tellus. Integer varius, enim eu accumsan varius, eros dui volutpat mauris, at tincidunt velit velit in libero. Etiam malesuada sit amet felis vel consectetur. Donec quis nunc sapien.</p>
     <p>Nunc luctus euismod mi, vel facilisis purus. Nullam sollicitudin urna eu nisl volutpat, nec suscipit nunc efficitur. In hac habitasse platea dictumst. Aliquam a ex enim. In hac habitasse platea dictumst. Proin pellentesque ante vel quam tristique pretium. Fusce dignissim hendrerit nunc vel consectetur. Sed commodo odio sit amet justo vestibulum convallis.</p>
     <p>Quisque placerat nibh quis velit venenatis, ut pharetra justo commodo. Duis ut libero mauris. Donec scelerisque luctus aliquam. Integer non elit sagittis, maximus elit at, blandit mi. Maecenas eget sapien urna. Integer commodo justo et diam varius, sed commodo lorem vestibulum. Fusce viverra, ex at faucibus placerat, sem augue dictum libero, quis consequat felis augue et ipsum. Nullam fringilla diam ac mauris porttitor laoreet. Fusce euismod quis ante sit amet bibendum. Morbi consectetur placerat commodo. Vivamus commodo, ipsum eu vestibulum consectetur, arcu quam pellentesque arcu, vel blandit odio justo vitae nulla. Aenean dictum dui in elit rhoncus, vitae malesuada nulla bibendum. Praesent eget mi euismod, suscipit arcu ut, hendrerit neque.</p>
   </div>
  </div>
  <footer>
    &copy; 2023 My Website. All rights reserved.
    <div class="social-media">
      <a href="#"><i class="fab fa-facebook-square"></i></a>
      <a href="#"><i class="fab fa-twitter-square"></i></a>
      <a href="#"><i class="fab fa-instagram-square"></i></a>
    </div>
  </footer>
 </body>
</html>