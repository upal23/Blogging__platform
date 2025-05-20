<?php
session_start();
require_once __DIR__ . '/../models/Post.php';

$archive = Post::getArchiveGrouped();
require_once __DIR__ . '/../views/archive.php';
