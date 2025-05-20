<?php
session_start();
require_once __DIR__ . '/../models/User.php';

if (!isset($_SESSION['user'])) {
    header("Location: ../views/login.php");
    exit;
}

$currentUser = User::find($_SESSION['user']);
if ($currentUser['role'] !== 'admin') {
    echo "Access denied. Admins only.";
    exit;
}

// Handle form actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_role'])) {
        User::updateRole($_POST['user_id'], $_POST['role']);
    }
    if (isset($_POST['delete_user'])) {
        User::delete($_POST['user_id']);
    }
    header("Location: ../views/admin.php");
    exit;
}
