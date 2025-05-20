<div class="dashboard">
    <h2>Your Posts</h2>
    <?php foreach ($posts as $post): ?>
    <div class="post">
        <h3><?= htmlspecialchars($post['title']) ?></h3>
        <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
    </div>
    <?php endforeach; ?>
    <a href="/?action=editor" class="new-post">Create New Post</a>
</div>