<?php
//register.php

include("database_connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $parts = explode(" ", $name);
  if(count($parts) > 1) {
    $lastname = array_pop($parts);
    $firstname = implode(" ", $parts);
  }
  else
  {
    $firstname = $name;
    $lastname = " ";
  }
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  // Check if email address is already in use
  $query = "SELECT * FROM users WHERE user_email = :email";
  $statement = $connect->prepare($query);
  $statement->execute([
    ':email' => $email,
  ]);
  $user = $statement->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    $message = "This email address is already in use. Please use a different email address.";
  } else {
    $query = "INSERT INTO users (user_fname, user_lname, user_email, user_password) VALUES (:firstname, :lastname, :email, :password)";
    $statement = $connect->prepare($query);
    $statement->execute([
      ':firstname' => $firstname,
      ':lastname' => $lastname,
      ':email' => $email,
      ':password' => $password,
    ]);

    header('Location: index.html');
    exit();
  }
}
?>
