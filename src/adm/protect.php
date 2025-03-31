<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['user_type'])) {
    die("Você não pode acessar esta página porque não está logado.<p><a href=\"../index.php\">Voltar ao Login</a></p>");
}

?>