<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Subscribed</title>
  <link rel="stylesheet" href="../public/css/newsletter.css">
</head>
<body>
  <div class="newsletter-box">
    <h2>Success!</h2>
    <p class="success"><?= $_SESSION['success'] ?? 'Subscribed.'; unset($_SESSION['success']); ?></p>
    <a href="newsletter.php">Back to signup</a>
  </div>
</body>
</html>
