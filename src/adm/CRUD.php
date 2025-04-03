<?php
include ('protect.php');
include ('../servers/conexao.php');
$db = Conexao::GetConexao();

// Adicionar usuario
if (isset($_POST["adicionar"])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);


    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        echo "Este e-mail já está cadastrado!";
    } else {

        $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        if ($stmt->execute([$nome, $email, $senha])) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }
}

//Atualizar usuario
if (isset($_POST["editar"])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";
    $db->query($sql);
}

//Excluir usuario
if (isset($_GET["deletar"])) {
    $id = $_GET["deletar"];
    $sql = "DELETE FROM usuarios WHERE id=$id";
    $db->query($sql);
}

//Buscar usuarios
$usuarios = $db->query('SELECT * FROM usuarios');

?>