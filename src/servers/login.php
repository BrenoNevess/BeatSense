<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha_hash'];
    
    $sql_admin = "SELECT * FROM adm WHERE email = '$email' AND senha_hash = '$senha'";
    $result_admin = $conn->query($sql_admin);
    
    if ($result_admin->num_rows > 0) {
        $_SESSION['user_type'] = 'adm';
        header('Location: painel.php');
        exit();
    }
    
    $sql_aluno = "SELECT * FROM usuarios WHERE email = '$email' AND senha_hash = '$senha'";
    $result_aluno = $conn->query($sql_aluno);
    
    if ($result_aluno->num_rows > 0) {
        $_SESSION['user_type'] = 'usuario';
        header('Location: paginainicial.php');
        exit();
    }
    
    echo "Credenciais inválidas. Tente novamente.";
}

$conn->close();
?>