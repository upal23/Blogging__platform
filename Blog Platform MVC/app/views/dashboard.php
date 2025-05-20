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
  <title>Dashboard</title>
</head>
<body>
  <h1>Welcome, <?= htmlspecialchars($_SESSION['user']); ?>!</h1>
  <p><a href="logout.php">Logout</a></p>
</body>
</html>
