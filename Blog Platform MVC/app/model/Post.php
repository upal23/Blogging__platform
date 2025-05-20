<?php
require_once __DIR__ . '/../../config/database.php';

class Post {
    // Get one post
    public static function find($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create new post
    public static function create($title, $body, $author) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO posts (title, body, author) VALUES (?, ?, ?)");
        $stmt->execute([$title, $body, $author]);
        return $pdo->lastInsertId();
    }

    public static function getArchiveGrouped() {
        global $pdo;

        $stmt = $pdo->query("
            SELECT id, title, created_at 
            FROM posts 
            ORDER BY created_at DESC
        ");

        $allPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $archive = [];

        foreach ($allPosts as $post) {
            $date = new DateTime($post['created_at']);
            $year = $date->format('Y');
            $month = $date->format('F');

            if (!isset($archive[$year])) {
                $archive[$year] = [];
            }

            if (!isset($archive[$year][$month])) {
                $archive[$year][$month] = [];
            }

            $archive[$year][$month][] = $post;
        }

        return $archive;
    }
}
