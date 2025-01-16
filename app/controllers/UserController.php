<?php
class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = User::findByUsername($username);

            if ($user && password_verify($password, $user['password_hash'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php?controller=Evaluation&action=index');
                exit;
            } else {
                $error = 'ユーザー名またはパスワードが間違っています。';
                require 'app/views/users/login.php';
            }
            
            
        } else {
            require 'app/views/users/login.php';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?controller=User&action=login');
        exit;
    }
}
