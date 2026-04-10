<?php
require_once '../Model/conexao.php';
require_once '../src/LoginService.php';
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
    $_SESSION['mensagem_erro'] = 'Erro no login';
    header('Location: ../View/loginpage.php');
}
?>