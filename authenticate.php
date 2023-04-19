<?php
// authenticate.php
require_once 'database_connection.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = :email";
    $statement = $connect->prepare($query);
    $statement->execute([':email' => $email]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // The email and password are correct, start a session and redirect to a logged-in area
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit;
    } else {
        // The email or password is incorrect, redirect back to the login page with an error message
        header('Location: login.php?error=Invalid email or password');
        exit;
    }
} else {
    // The form was not submitted correctly, redirect back to the login page with an error message
    header('Location: login.php?error=Please fill in all required fields');
    exit;
}
?>
