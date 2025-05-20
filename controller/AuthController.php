<?php
class AuthController extends BaseController {
    // Login Page
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // PROPER VALIDATION
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if (User::authenticate($username, $password)) {
                $_SESSION['user'] = User::getUser($username);
                $this->redirect('/?action=dashboard');
            } else {
                $this->redirect('/?action=login&error=invalid_credentials');
            }
        } else {
            $this->render('auth/login');
        }
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Add registration logic
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if (User::register($username, $email, $password)) {
                $this->redirect('/?action=login');
            }
        }
        $this->render('auth/register');
    }
    // Logout
    public function logout() {
        session_destroy();
        $this->redirect('/');
    }
}
?>