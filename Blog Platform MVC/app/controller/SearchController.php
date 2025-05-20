<?php
session_start();
require_once __DIR__ . '/../models/Post.php';

$query    = isset($_GET['q']) ? trim($_GET['q']) : '';
$category = isset($_GET['cat']) ? trim($_GET['cat']) : '';

$results = Post::search($query, $category);
$categories = Post::allCategories();

require_once __DIR__ . '/../views/search.php';
