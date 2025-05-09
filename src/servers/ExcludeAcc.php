<?php 
include("conexao.php");
$db = Conexao::GetConexao();

if (isset($_GET["deletar"])) {
    $id = $_GET["deletar"];
    
    $stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
}
?>