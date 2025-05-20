<div class="editor">
    <form action="/?action=savePost" method="POST">
        <input type="text" name="title" placeholder="Post Title" required>
        <textarea name="content" rows="10" required></textarea>
        
        <div class="categories">
            <?php foreach ($categories as $category): ?>
                <label>
                    <input type="checkbox" name="categories[]" value="<?= $category ?>">
                    <?= $category ?>
                </label>
            <?php endforeach; ?>
        </div>
        
        <button type="submit">Publish</button>
    </form>
</div>