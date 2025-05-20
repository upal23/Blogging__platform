<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Form Validation</title>
  <link rel="stylesheet" href="../public/css/form.css">
</head>
<body>
  <div class="form-container">
    <h2>Feedback Form</h2>

    <?php if (!empty($_SESSION['errors'])): ?>
      <ul class="error-list">
        <?php foreach ($_SESSION['errors'] as $err): ?>
          <li><?= htmlspecialchars($err) ?></li>
        <?php endforeach; unset($_SESSION['errors']); ?>
      </ul>
    <?php endif; ?>

    <form method="POST" action="../controllers/ValidationController.php">
      <label for="name">Name</label>
      <input type="text" name="name" value="<?= $_SESSION['old']['name'] ?? '' ?>" required />

      <label for="email">Email</label>
      <input type="email" name="email" value="<?= $_SESSION['old']['email'] ?? '' ?>" required />

      <label for="message">Message</label>
      <textarea name="message" rows="5" required><?= $_SESSION['old']['message'] ?? '' ?></textarea>

      <button type="submit">Submit</button>
    </form>
    <?php unset($_SESSION['old']); ?>
  </div>
</body>
</html>
