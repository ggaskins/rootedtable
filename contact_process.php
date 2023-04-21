<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Send an email
    $to = 'gaskingt@dukes.jmu.edu'; // Replace this with your own email address
    $subject = 'Contact form submission from Rooted Table';
    $headers = "From: {$name} <{$email}>\r\n";
    $headers .= "Reply-To: {$email}\r\n";
    $headers .= "Content-type: text/plain;charset=UTF-8\r\n";

    if (mail($to, $subject, $message, $headers)) {
        // Redirect to a thank you page or display a success message
        header('Location: thank_you.php');
        exit();
    } else {
        // Show an error message if the email could not be sent
        echo 'There was an error sending your message. Please try again later.';
    }
} else {
    // Redirect to the contact form if the request is not a POST
    header('Location: contact.php');
    exit();
}
