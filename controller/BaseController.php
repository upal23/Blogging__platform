<?php


class BaseController {
    public function __construct() {
        $this->checkLogin();
    }

    protected function render($view, $data = []) {
        extract($data);
        require "view/partials/header.php";
        require "view/$view.php";
        require "view/partials/footer.php";
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }

    protected function isLoggedIn() {
        return isset($_SESSION['user']);
    }

    protected function checkLogin() {
        $publicActions = ['login', 'register', 'error'];
        $currentAction = $_GET['action'] ?? 'login';
        
        if (!in_array($currentAction, $publicActions) && !$this->isLoggedIn()) {
            $this->redirect('/?action=login');
        }
    }

    protected function checkRole($role) {
        if ($_SESSION['user']['role'] !== $role) {
            $this->redirect('/?action=dashboard');
        }
    }
}
?>