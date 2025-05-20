<?php
class Comment {
    public static function getForPost($postId) {
        return $_SESSION['comments'][$postId] ?? [];
    }

    public static function add($postId, $content, $author) {
        $_SESSION['comments'][$postId][] = [
            'content' => $content,
            'author' => $author,
            'date' => date('Y-m-d H:i:s')
        ];
    }
}
?>