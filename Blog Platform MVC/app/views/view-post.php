<?php
require_once __DIR__ . '/../models/Post.php';
require_once __DIR__ . '/../models/Tag.php';

if (!isset($_GET['id'])) {
    echo "Invalid post ID.";
    exit;
}

$post = Post::find($_GET['id']);
$tags = Tag::getTagsForPost($_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
  <title><?= htmlspecialchars($post['title']) ?></title>
  <link rel="stylesheet" href="../public/css/post.css">
</head>
<body>
  <div class="container">
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($post['body'])) ?></p>
    <div class="tags">
      <?php foreach ($tags as $tag): ?>
        <span class="tag">#<?= htmlspecialchars($tag) ?></span>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
