<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Set up the recipient email address (change this to your desired email address)
    $to = "your-email@example.com";
    $subject = "Message from RentEasy Contact Form";
    $body = "Name: $name\nEmail: $email\n\n$message";

    // Send email
    if (mail($to, $subject, $body)) {
        echo "<script>alert('Your message has been sent. We will get back to you soon.');</script>";
    } else {
        echo "<script>alert('Failed to send your message. Please try again later.');</script>";
    }
} else {
    header("Location: contact.php");
    exit();
}
?>