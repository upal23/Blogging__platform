<?php
session_start();
require_once __DIR__ . '/../models/Draft.php';

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $draft = Draft::getByUser($user);
    echo json_encode($draft);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    Draft::saveOrUpdate($user, $title, $content);
    echo json_encode(['status' => 'saved']);
    exit;
}
