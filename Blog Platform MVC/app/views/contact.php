<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Contact Us</title>
  <link rel="stylesheet" href="../public/css/contact.css" />
</head>
<body>
  <div class="container">
    <h2>Contact Us</h2>

    <?php if (!empty($_SESSION['error'])): ?>
      <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form method="POST" action="../controllers/ContactController.php">
      <label for="name">Name</label>
      <input type="text" name="name" required />

      <label for="email">Email</label>
      <input type="email" name="email" required />

      <label for="message">Message</label>
      <textarea name="message" rows="5" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </div>
</body>
</html>
