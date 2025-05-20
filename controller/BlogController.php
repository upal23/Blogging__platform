<?php
class BlogController extends BaseController {
    // Dashboard
    public function dashboard() {
        $this->checkLogin();
        $posts = Post::getAll();
        $this->render('blog/dashboard', ['posts' => $posts]);
    }

    // Rich Text Editor
    public function editor() {
        $this->checkLogin();
        $categories = Category::getAll();
        $this->render('blog/editor', ['categories' => $categories]);
    }

    // Save Post
    public function savePost() {
        $this->checkLogin();
        Post::create($_POST);
        $this->redirect('/?action=dashboard');
    }
    public function viewPost() {
        $postId = $_GET['id'];
        $post = Post::getById($postId);
        $comments = Comment::getForPost($postId);
        $this->render('blog/post', ['post' => $post, 'comments' => $comments]);
    }
    
    public function addComment() {
        $postId = $_POST['post_id'];
        $content = $_POST['comment'];
        Comment::add($postId, $content, $_SESSION['user']['username']);
        $this->redirect("/?action=viewPost&id=$postId");
    }
    public function updateProfile() {
        $this->checkLogin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            User::updateProfile($_SESSION['user']['username'], $_POST);
            $this->redirect('/?action=author&id=' . $_SESSION['user']['username']);
        }
        $this->render('auth/edit-profile', [
            'user' => User::getUser($_SESSION['user']['username'])
        ]);
    }
}
?>