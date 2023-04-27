<?php
// Start session
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <style>
      body {
        font-family: Arial, sans-serif;
        font-size: 1.2rem;
        line-height: 1.5;
        color: #333;
        background-color: #f8f8f8;
        margin: 0;
        padding: 0;
      }
    
      header {
        background-color: #fff;
        box-shadow: 0 2px 2px rgba(0,0,0,0.1);
        padding: 1rem;
      }

      header::after {
        content: '';
        display: table;
        clear: both;
      }

      nav {
        float: right;
        margin-top: 1rem;
      }

      nav ul {
        margin: 0;
        padding: 0;
        list-style: none;
      }

      nav li {
        display: inline-block;
        margin-left: 1rem;
      }

      nav a {
        color: #333;
        text-decoration: none;
        font-size: 1.2rem;
      }

      nav a:hover {
        color: #000;
      }

      .logo {
        font-family: Arial, sans-serif;
        font-size: 2rem;
        color: #333;
        text-transform: uppercase;
        letter-spacing: 0.5rem;
        text-align: left;
        margin: 0;
        padding: 0;
      }

      main {
        margin: 2rem auto;
        max-width: 800px;
        padding: 1rem;
        background-color: #fff;
        box-shadow: 0 2px 2px rgba(0,0,0,0.1);
      }

      h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 1rem;
      }

      p {
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
        line-height: 1.6;
        color: #555;
      }

      a {
        color: #4CAF50;
        text-decoration: none;
      }

      a:hover {
        color: #333;
      }
    </style>
  </head>
  <body>
    <header>
      <div class="logo">Rooted Table</div>
      <nav>
        <ul>
           <?php if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true): ?>
          <li><a href="edit_account.php">Welcome, <?php echo htmlspecialchars($_SESSION["name"]); ?></a></li>
          <li><a href="account.php">Account</a></li>
          <li><a href="/cart.php"><i class="fa fa-shopping-cart"></i> Cart (0)</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="local_farms.php">Farms</a></li>
          <li><a href="nearby_farms.php">Map</a></li>
          <li><a href="logout.php">Logout</a></li>
          <?php else: ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </header>
  </body>
  </html>
