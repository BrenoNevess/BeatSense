<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../View/loginpage.php');
    exit();
}

require_once '../Model/conexao.php';
require_once '../src/LoginService.php';

$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$db = Conexao::GetConexao();
$resultado = autenticar($db, $email, $senha);

if ($resultado['status']) {
    $_SESSION['user_type'] = $resultado['tipo'];

    if ($resultado['tipo'] == 'adm') {
        header('Location: ../View/painel.php');
    } else {
        header('Location: ../index.php');
    }
} else {
    $_SESSION['mensagem_erro'] = 'E-mail ou senha incorretos';
    header('Location: ../View/loginpage.php');
}
exit();
