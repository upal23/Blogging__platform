<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $message = trim($_POST['message']);

    $errors = [];

    if (strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (strlen($message) < 10) {
        $errors[] = "Message must be at least 10 characters.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $_POST;
        header("Location: ../views/form-validation.php");
    } else {
        $_SESSION['success'] = "Form submitted successfully!";
        header("Location: ../views/form-success.php");
    }

    exit;
}
