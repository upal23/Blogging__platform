<?php
session_start();
require_once __DIR__ . '/../models/Message.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($message) < 10) {
        $_SESSION['error'] = "Please fill out all fields correctly.";
        header("Location: ../views/contact.php");
        exit;
    }

    if (Message::save($name, $email, $message)) {
        $_SESSION['success'] = "Thank you! Your message has been received.";
        header("Location: ../views/contact-success.php");
    } else {
        $_SESSION['error'] = "Something went wrong. Try again.";
        header("Location: ../views/contact.php");
    }
}
