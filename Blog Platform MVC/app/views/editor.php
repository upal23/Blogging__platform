<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Create Post</title>
  <link rel="stylesheet" href="../public/css/editor.css" />
</head>
<body>
  <div class="editor-container">
    <h2>Create a New Post (Autosave Enabled)</h2>
    <form id="draft-form">
      <input type="text" id="title" name="title" placeholder="Post Title" required />
      <textarea id="content" name="content" placeholder="Write your content here..." rows="10"></textarea>
      <p id="status">Draft autosave is active...</p>
    </form>
  </div>
  <script src="../public/js/draft.js"></script>
</body>
</html>
