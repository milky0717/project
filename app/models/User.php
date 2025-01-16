<?php
class User {
    public static function findByUsername($username) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function getAllExcept($userId) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT id, username FROM users WHERE id != ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
