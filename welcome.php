<?php
// Set page title
$page_title = "Rooted Table";

// Include header file
require_once "header.php";
?>

<!DOCTYPE html>
<html>
  <style>
    body {
      background-color: #F5F5F5;
    }

    .center {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 50vh;
    }

    h2 {
      font-size: 3rem;
      color: #4CAF50;
      text-align: center;
      margin: 0 0 2rem;
    }

    p {
      font-size: 1.2rem;
      color: #555;
      text-align: center;
      margin: 0 0 1rem;
    }

    a {
      color: #555;
      text-decoration: none;
      transition: color 0.2s ease;
    }

    a:hover {
      color: #555;
    }
  </style>
<body>
  <div class="center">
    <h2>Welcome to Rooted Table</h2>
    <p>Thank you for visiting our farm to table website.</p>
    <p>Here, you can learn about local farms and browse selections of fresh, locally-sourced produce.</p>
    <ul>
    	<li><a href="local_farms.php" >View Farms</a></li>
        <li><a href="nearby_farms.php">Local Farm Map</a></li>
    </ul>
  </div>
</body>
</html>


<?php
// Include footer file
require_once "footer.php";
?>
