<div class="profile-editor">
    <h2>Edit Profile</h2>
    
    <form action="/?action=updateProfile" method="POST">
        <div class="form-group">
            <label>Bio:</label>
            <textarea name="bio"><?= htmlspecialchars($user['bio']) ?></textarea>
        </div>
        
        <div class="form-group">
            <label>Social Media Links:</label>
            <input type="url" name="twitter" placeholder="Twitter URL" 
                   value="<?= htmlspecialchars($user['social']['twitter']) ?>">
            <input type="url" name="facebook" placeholder="Facebook URL"
                   value="<?= htmlspecialchars($user['social']['facebook']) ?>">
        </div>
        
        <button type="submit">Save Changes</button>
    </form>
</div>