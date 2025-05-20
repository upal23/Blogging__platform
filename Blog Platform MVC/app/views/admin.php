<?php
session_start();
require_once __DIR__ . '/../models/User.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$currentUser = User::find($_SESSION['user']);
if ($currentUser['role'] !== 'admin') {
    echo "Access denied.";
    exit;
}

$users = User::all();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../public/css/admin.css" />
</head>
<body>
  <div class="admin-container">
    <h2>Admin Panel</h2>
    <table>
      <thead>
        <tr><th>Username</th><th>Email</th><th>Role</th><th>Action</th></tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td>
              <form method="POST" action="../controllers/AdminController.php" style="display:inline-block;">
                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                <select name="role">
                  <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                  <option value="editor" <?= $user['role'] === 'editor' ? 'selected' : '' ?>>Editor</option>
                  <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
                <button name="update_role">Update</button>
              </form>
            </td>
            <td>
              <?php if ($user['username'] !== $_SESSION['user']): ?>
              <form method="POST" action="../controllers/AdminController.php">
                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                <button name="delete_user" onclick="return confirm('Delete user?')">Delete</button>
              </form>
              <?php else: ?>
                <em>Your Account</em>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
