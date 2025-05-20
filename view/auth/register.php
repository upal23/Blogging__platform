<div class="register-form">
    <h2>Register</h2>
    <form action="/?action=register" method="POST" onsubmit="return validateRegisterForm()">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="/?action=login">Login here</a></p>
</div>