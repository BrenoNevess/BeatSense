<?php 
    require 'conexao.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        $stmt = $pdo->prepare('SELECT id, senha FROM beatsenseclient WHERE nome = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $email;
            header('location: area_restrita.php');
            exit;
        }
    }
?>