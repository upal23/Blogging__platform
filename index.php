<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start/reset session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_unset(); // Clear all session data
session_destroy(); // Destroy the session
// Load required files
require __DIR__ . '/controller/BaseController.php';
require __DIR__ . '/controller/AuthController.php';
require __DIR__ . '/controller/BlogController.php';

// Get action parameter
$action = $_GET['action'] ?? 'login';

// Route requests
try {
    switch ($action) {
        case 'login':
            (new AuthController())->login();
            break;
            
        case 'register':
            (new AuthController())->register();
            break;
            
        case 'logout':
            (new AuthController())->logout();
            break;
            
        case 'dashboard':
            (new BlogController())->dashboard();
            break;
            
        case 'editor':
            (new BlogController())->editor();
            break;
            
        case 'savePost':
            (new BlogController())->savePost();
            break;
            
        case 'viewPost':
            $postId = $_GET['id'] ?? null;
            (new BlogController())->viewPost($postId);
            break;
            
        default:
            http_response_code(404);
            require __DIR__ . '/view/errors/404.php';
            break;
    }
} catch (Exception $e) {
    // Handle exceptions
    error_log($e->getMessage());
    http_response_code(500);
    echo "An error occurred: " . $e->getMessage();
}
?>