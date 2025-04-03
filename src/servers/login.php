<?php
session_start();
include('conexao.php');

$db = Conexao::GetConexao();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    try {
        
        // Verificar se é um adm
        $stmt = $db->prepare("SELECT * FROM adm WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($senha, $admin['senha'])) {
            $_SESSION['user_type'] = 'adm';
            header('Location: ../adm/painel.php');
            exit();
        }

        // Verificar se é um usuário comum
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) { 
            $_SESSION['user_type'] = 'usuario';
            header('Location: ../index.php');
            exit();
        }

        echo "Credenciais inválidas. Tente novamente.";

    } catch (PDOException $e) {
        echo "Erro no login: " . $e->getMessage();
    }
}
?>
