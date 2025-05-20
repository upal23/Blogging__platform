<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Newsletter Signup</title>
  <link rel="stylesheet" href="../public/css/newsletter.css">
</head>
<body>
  <div class="newsletter-box">
    <h2>Subscribe to Our Newsletter</h2>

    <?php if (!empty($_SESSION['error'])): ?>
      <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form method="POST" action="../controllers/NewsletterController.php">
      <input type="email" name="email" placeholder="Enter your email" required>
      <div class="consent">
        <input type="checkbox" name="consent" id="consent" />
        <label for="consent">I agree to receive emails and accept the GDPR policy.</label>
      </div>
      <button type="submit">Subscribe</button>
    </form>
  </div>
</body>
</html>
