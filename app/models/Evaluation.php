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
    
    
    public static function create($targetUserId, $evaluatorUserId, $score, $comments) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            INSERT INTO evaluations (target_user_id, evaluator_user_id, score, comments)
            VALUES (?, ?, ?, ?)
        ");
        $stmt->execute([$targetUserId, $evaluatorUserId, $score, $comments]);
    }
}




