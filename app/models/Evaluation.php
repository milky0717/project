<?php
class Evaluation {
    public static function getAllForUser($userId) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            SELECT e.*, u.username AS evaluator_name
            FROM evaluations e
            LEFT JOIN users u ON e.evaluator_user_id = u.id
            WHERE e.target_user_id = ?
            ORDER BY e.created_at DESC
        ");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


