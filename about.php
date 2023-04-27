<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
// Set page title
$page_title = "About Us";
// Include header
require_once "header.php";
?>
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
<main>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>About Us</h1>
        <p>We are a farm-to-table restaurant dedicated to sourcing our ingredients locally from small, family-owned farms in the area. Our goal is to provide our customers with fresh, healthy, and delicious meals while supporting local agriculture and strengthening our community.</p>
        <p>Our menu changes frequently based on what is in season and available from our farmers. We believe in using only the highest quality ingredients and preparing them simply to let their natural flavors shine through. We also offer vegetarian, vegan, and gluten-free options for our customers with dietary restrictions.</p>
        <p>Come visit us and taste the difference that locally sourced ingredients make!</p>
      </div>
      <div class="col-md-4">
        <h2>Our Mission</h2>
        <p>Our mission is to provide fresh, healthy, and delicious meals while supporting local agriculture and strengthening our community.</p>

        <h2>Our Story</h2>
        <p>Our restaurant was founded in 2010 by John and Jane Smith, who wanted to create a place where people could enjoy delicious food made from locally sourced ingredients. Over the years, we have grown to become one of the most popular farm-to-table restaurants in the area.</p>

        <h2>Our Team</h2>
        <p>Our team consists of experienced chefs, servers, and bartenders who are passionate about providing our customers with the best possible dining experience.</p>
      </div>
    </div>
  </div>
  <?php
// Include footer
require_once "footer.php";
?>
</main>
