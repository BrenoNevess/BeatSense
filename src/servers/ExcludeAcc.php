<?php
session_start();
include("../adm/CRUD.php");
$db = Conexao::GetConexao();

if (!isset($_SESSION['usuario_id'])) {
    die("Erro: Sessão não encontrada.");
}

$id = $_SESSION['usuario_id'];

$stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
if ($stmt->execute([$id])) {
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>