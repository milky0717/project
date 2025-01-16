<?php
class User {
    public static function findByUsername($username) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
