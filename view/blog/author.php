<div class="author-profile">
    <h2><?= $author['username'] ?>'s Profile</h2>
    
    <div class="bio">
        <h3>About Me</h3>
        <p><?= nl2br(htmlspecialchars($author['bio'])) ?></p>
    </div>

    <div class="author-posts">
        <h3>Recent Posts</h3>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h4><?= htmlspecialchars($post['title']) ?></h4>
                <p><?= substr(htmlspecialchars($post['content']), 0, 100) ?>...</p>
            </div>
        <?php endforeach; ?>
    </div>
</div>