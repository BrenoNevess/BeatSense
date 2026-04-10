<?php
session_start();
include('../Model/CRUD.php');
require_once '../src/CadastroService.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = $_POST['nome'] ?? null;
    $email = $_POST['email'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $senha_confirmar = $_POST['senha_confirmar'] ?? null;

    $resultado = cadastrarUsuario($nome, $email, $senha, $senha_confirmar);

    if ($resultado['status']) {
        $_SESSION['mensagem_sucesso'] = 'Usuário cadastrado com sucesso!';
        header('Location: ../View/loginpage.php');
        exit;
    } else {
        $_SESSION['erro'] = $resultado['erro'];
        header('Location: ../View/cadastro.php');
        exit;
    }
}