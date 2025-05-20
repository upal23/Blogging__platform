<?php
require_once __DIR__ . '/../../config/database.php';

class Message {
    public static function save($name, $email, $content) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $content]);
    }
}
