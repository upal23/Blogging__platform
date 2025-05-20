<?php
session_start();
require_once __DIR__ . '/../models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'register') {
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        if (User::find($username)) {
            $error = "Username already exists.";
        } else {
            if (User::create($username, $email, $password)) {
                $_SESSION['user'] = $username;
                header("Location: ../views/dashboard.php");
                exit;
            } else {
                $error = "Registration failed.";
            }
        }

    } elseif ($action === 'login') {
        $username = trim($_POST['username']);
        $password = $_POST['password'];
        $user = User::find($username);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $username;
            setcookie("user", $username, time() + (86400 * 30), "/"); // 30 days
            header("Location: ../views/dashboard.php");
            exit;
        } else {
            $error = "Invalid credentials.";
        }
    }

    $_SESSION['error'] = $error;
    header("Location: ../views/" . ($action === 'login' ? "login.php" : "register.php"));
    exit;
}
