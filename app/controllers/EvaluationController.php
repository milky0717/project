<?php
class EvaluationController {
    public function index() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); // セッションが開始されていない場合のみ開始
        }
    
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=User&action=login'); // ログインページにリダイレクト
            exit;
        }
    
        // ログイン済みの処理
        $evaluations = Evaluation::getAllForUser($_SESSION['user_id']);
        require 'app/views/evaluations/list.php';
    }
    
}
