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
            $_SESSION['adm_id'] = $adm['id'];
            header('Location: ../index.php');
            exit();
        }    

        // Verificar se é um usuário comum
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) { 
            $_SESSION['user_type'] = 'usuario';
            $_SESSION['usuario_id'] = $usuario['id'];
            header('Location: ../index.php');
            exit();
        }

        else {
        $_SESSION['mensagem_erro'] = 'E-mail ou senha incorretos. Verifique suas credenciais.';
        header('Location: ../loginpage.php');
        exit();
        }

    } catch (PDOException $e) {
        echo "Erro no login: " . $e->getMessage();
    }
}
?>
