<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Message Sent</title>
  <link rel="stylesheet" href="../public/css/contact.css" />
</head>
<body>
  <div class="container">
    <h2>Success</h2>
    <p class="success"><?= $_SESSION['success'] ?? 'Message sent.'; unset($_SESSION['success']); ?></p>
    <p><a href="contact.php">Back to Contact Form</a></p>
  </div>
</body>
</html>
