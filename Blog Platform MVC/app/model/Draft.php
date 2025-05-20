<?php
require_once __DIR__ . '/../../config/database.php';

class Draft {
    public static function getByUser($user) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM drafts WHERE user = ?");
        $stmt->execute([$user]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function saveOrUpdate($user, $title, $content) {
        global $pdo;
        $existing = self::getByUser($user);
        if ($existing) {
            $stmt = $pdo->prepare("UPDATE drafts SET title = ?, content = ? WHERE user = ?");
            return $stmt->execute([$title, $content, $user]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO drafts (user, title, content) VALUES (?, ?, ?)");
            return $stmt->execute([$user, $title, $content]);
        }
    }
}
