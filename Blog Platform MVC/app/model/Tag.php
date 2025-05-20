<?php
require_once __DIR__ . '/../../config/database.php';

class Tag {
    public static function findOrCreate($name) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT id FROM tags WHERE name = ?");
        $stmt->execute([$name]);
        $tag = $stmt->fetch();

        if ($tag) return $tag['id'];

        $stmt = $pdo->prepare("INSERT INTO tags (name) VALUES (?)");
        $stmt->execute([$name]);
        return $pdo->lastInsertId();
    }

    public static function getAll() {
        global $pdo;
        $stmt = $pdo->query("SELECT tags.id, tags.name, COUNT(pt.post_id) as count
                             FROM tags
                             LEFT JOIN post_tags pt ON pt.tag_id = tags.id
                             GROUP BY tags.id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getPostsByTagId($tagId) {
        global $pdo;
        $stmt = $pdo->prepare("
            SELECT p.*
            FROM posts p
            JOIN post_tags pt ON pt.post_id = p.id
            WHERE pt.tag_id = ?
            ORDER BY p.created_at DESC
        ");
        $stmt->execute([$tagId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getByName($name) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM tags WHERE name = ?");
        $stmt->execute([$name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
