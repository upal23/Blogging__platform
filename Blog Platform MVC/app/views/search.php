<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Search & Filter</title>
  <link rel="stylesheet" href="../public/css/search.css" />
</head>
<body>
  <div class="container">
    <h2>Search Posts</h2>
    <form method="GET" action="../controllers/SearchController.php">
      <input type="text" name="q" placeholder="Search..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" />
      <select name="cat">
        <option value="">All Categories</option>
        <?php foreach ($categories as $cat): ?>
          <option value="<?= htmlspecialchars($cat) ?>" <?= ($cat === ($_GET['cat'] ?? '')) ? 'selected' : '' ?>>
            <?= htmlspecialchars($cat) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <button type="submit">Search</button>
    </form>

    <h3>Results</h3>
    <?php if (count($results) > 0): ?>
      <ul class="results">
        <?php foreach ($results as $post): ?>
          <li>
            <h4><?= htmlspecialchars($post['title']) ?></h4>
            <p><?= htmlspecialchars(substr($post['body'], 0, 100)) ?>...</p>
            <small>Category: <?= htmlspecialchars($post['category']) ?> | Tags: <?= htmlspecialchars($post['tags']) ?></small>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <p>No results found.</p>
    <?php endif; ?>
  </div>
</body>
</html>
