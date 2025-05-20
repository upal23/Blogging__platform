<div class="category-management">
    <h2>Manage Categories</h2>
    
    <?php if (isset($_SESSION['error'])): ?>
        <div class="error"><?= $_SESSION['error'] ?></div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form action="/?action=manageCategories" method="POST">
        <div class="existing-categories">
            <?php foreach ($categories as $category): ?>
                <div class="category-item">
                    <input type="text" name="categories[]" value="<?= $category ?>">
                    <button type="submit" name="action" value="delete">Delete</button>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="new-category">
            <input type="text" name="new_category" placeholder="New Category Name">
            <button type="submit" name="action" value="create">Add Category</button>
        </div>
    </form>
</div>