<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <link rel="stylesheet" href="../public/css/form.css">
</head>
<body>
  <div class="form-container">
    <h2>Success</h2>
    <p class="success"><?= $_SESSION['success'] ?? 'Submitted successfully!' ?></p>
    <a href="form-validation.php">Back to form</a>
    <?php unset($_SESSION['success']); ?>
  </div>
</body>
</html>
