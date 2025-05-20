<?php
$postUrl = "http://localhost/blog-platform/controllers/PostController.php?id=" . urlencode($post['id']);
?>
<!DOCTYPE html>
<html>
<head>
  <title><?= htmlspecialchars($post['title']) ?></title>
  <link rel="stylesheet" href="../public/css/post.css">
</head>
<body>
  <div class="post-container">
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p class="meta">By <?= htmlspecialchars($post['author']) ?> | Category: <?= htmlspecialchars($post['category']) ?></p>
    <div class="content"><?= nl2br(htmlspecialchars($post['body'])) ?></div>

    <h3>Share This Post</h3>
    <div class="share-buttons">
      <button onclick="share('Facebook')">📘 Facebook</button>
      <button onclick="share('Twitter')">🐦 Twitter</button>
      <button onclick="share('LinkedIn')">💼 LinkedIn</button>
      <button onclick="share('Reddit')">👽 Reddit</button>
    </div>
  </div>

  <script>
    const postTitle = "<?= urlencode($post['title']) ?>";
    const postUrl = "<?= $postUrl ?>";
  </script>
  <script src="../public/js/share.js"></script>
</body>
</html>
