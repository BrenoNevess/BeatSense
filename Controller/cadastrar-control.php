<?php
session_start();
include('../Model/CRUD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $senha_confirmar = $_POST['senha_confirmar'] ?? null;

    if (!$nome || !$email || !$senha || !$senha_confirmar) {
        header('Location: ../View/cadastro.php');
        exit;
    }

    if ($senha !== $senha_confirmar) {
        $_SESSION['erro_senha'] = 'Certifique-se de que ambas as senhas sejam iguais.';
        header('Location: ../View/cadastro.php');
        exit;
    }

    $dados = [
        'nome' => $nome,
        'email' => $email,
        'senha' => $senha
    ];

    if (Usuario::adicionarUsuario($dados)) {
        $_SESSION['mensagem_sucesso'] = 'Usuário cadastrado com sucesso!';
        header('Location: ../View/loginpage.php');
        exit;
    } else {
        $_SESSION['erro_accExiste'];
        header('Location: ../View/cadastro.php');
    }
}
?>