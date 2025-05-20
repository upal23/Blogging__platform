<?php
require_once __DIR__ . '/../../config/database.php';

class Subscriber {
    public static function find($email) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM subscribers WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($email) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO subscribers (email, consent) VALUES (?, 1)");
        return $stmt->execute([$email]);
    }
}
