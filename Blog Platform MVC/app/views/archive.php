<!DOCTYPE html>
<html>
<head>
  <title>Post Archives</title>
  <link rel="stylesheet" href="../public/css/archive.css">
</head>
<body>
  <div class="container">
    <h2>Post Archives</h2>

    <?php foreach ($archive as $year => $months): ?>
      <div class="year-block">
        <h3 onclick="toggleYear('year-<?= $year ?>')"><?= $year ?></h3>
        <div class="year-content" id="year-<?= $year ?>" style="display:none;">
          <?php foreach ($months as $month => $posts): ?>
            <div class="month-block">
              <h4 onclick="toggleMonth('month-<?= $year . $month ?>')"><?= $month ?></h4>
              <ul id="month-<?= $year . $month ?>" class="post-list" style="display:none;">
                <?php foreach ($posts as $post): ?>
                  <li>
                    <a href="view-post.php?id=<?= $post['id'] ?>">
                      <?= htmlspecialchars($post['title']) ?> — <?= date('M d, Y', strtotime($post['created_at'])) ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <script src="../public/js/archive.js"></script>
</body>
</html>
