<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="../public/css/auth.css">
</head>
<body>
  <div class="auth-container">
    <h2>Register</h2>
    <?php if (!empty($_SESSION['error'])): ?>
      <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>
    <form method="POST" action="../controllers/AuthController.php">
      <input type="hidden" name="action" value="register">
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login</a></p>
  </div>
</body>
</html>
