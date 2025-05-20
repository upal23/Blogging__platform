<div class="post-view">
    <h2><?= htmlspecialchars($post['title']) ?></h2>
    <div class="post-meta">
        <span>Author: <?= htmlspecialchars($post['author']) ?></span>
        <span>Categories: <?= implode(', ', $post['categories']) ?></span>
    </div>
    <div class="post-content"><?= nl2br(htmlspecialchars($post['content'])) ?></div>
    
    <div class="comments">
        <h3>Comments</h3>
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <p><?= htmlspecialchars($comment['content']) ?></p>
                <small>By: <?= htmlspecialchars($comment['author']) ?></small>
            </div>
        <?php endforeach; ?>
        
        <form action="/?action=addComment" method="POST">
            <textarea name="comment" placeholder="Add a comment" required></textarea>
            <input type="hidden" name="post_id" value="<?= $post['id'] ?>">
            <button type="submit">Post Comment</button>
        </form>
    </div>
</div>