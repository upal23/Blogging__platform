<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Post</title>
  <link rel="stylesheet" href="../public/css/post.css">
</head>
<body>
  <div class="container">
    <h2>Create a Post with Tags</h2>
    <form method="POST" action="../controllers/PostController.php">
      <input type="text" name="title" placeholder="Title" required><br>
      <textarea name="body" placeholder="Body..." rows="10" required></textarea><br>
      <input type="text" name="tags" placeholder="Tags (comma-separated, e.g. php, mvc, blog)"><br>
      <button type="submit">Publish</button>
    </form>
  </div>
</body>
</html>
