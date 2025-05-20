<?php
session_start();
require_once __DIR__ . '/../models/Subscriber.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $consent = isset($_POST['consent']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email address.";
        header("Location: ../views/newsletter.php");
        exit;
    }

    if (!$consent) {
        $_SESSION['error'] = "You must accept GDPR consent to subscribe.";
        header("Location: ../views/newsletter.php");
        exit;
    }

    if (Subscriber::find($email)) {
        $_SESSION['error'] = "You are already subscribed.";
        header("Location: ../views/newsletter.php");
        exit;
    }

    if (Subscriber::create($email)) {
        $_SESSION['success'] = "You’ve been subscribed successfully!";
        header("Location: ../views/newsletter-success.php");
    } else {
        $_SESSION['error'] = "Something went wrong. Please try again.";
        header("Location: ../views/newsletter.php");
    }

    exit;
}
