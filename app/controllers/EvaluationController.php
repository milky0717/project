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
    
    public function create() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=User&action=login');
            exit;
        }
    
        // 自分以外のユーザーリストを取得
        $users = User::getAllExcept($_SESSION['user_id']);
        require 'app/views/evaluations/form.php';
    }
    
    
    public function submit() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=User&action=login');
            exit;
        }
    
        // POSTデータの取得
        $targetUserId = $_POST['target_user_id'];
        $score = $_POST['score'];
        $comments = $_POST['comments'];
        $evaluatorUserId = $_SESSION['user_id'];
    
        // モデルを使用してデータを保存
        Evaluation::create($targetUserId, $evaluatorUserId, $score, $comments);
    
        // 成功したらリダイレクト
        header('Location: index.php?controller=Evaluation&action=index');
        exit;
    }
    
}
