<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if (!isset($_SESSION['user_type'])) {
    $_SESSION['mensagem_erro'] = "É necessário fazer <strong>login</strong> para acessar os módulos!";
    header("Location: ../index.php");
    exit();
}
?>