<?php
session_start();
require_once __DIR__ . '/../models/Post.php';

if (!isset($_GET['id'])) {
    header("Location: ../views/errors/404.php");
    exit;
}

$id = intval($_GET['id']);
$post = Post::find($id);

if (!$post) {
    header("Location: ../views/errors/404.php");
    exit;
}

require_once __DIR__ . '/../views/post.php';
