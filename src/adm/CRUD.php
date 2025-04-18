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
        $_SESSION['message-erro'] = 'E-mail já cadastrado.';
    } else {
        $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        if ($stmt->execute([$nome, $email, $senha])) {
            $_SESSION['message-user-success'] = 'Usuário cadastrado com sucesso!';
        }
    }
}

//Atualizar usuario
if (isset($_POST["editar"])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $stmt = $db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
    if ($stmt->execute([$nome, $email, $senhaHash, $id])) {
        $_SESSION['message-update'] = 'Usuário atualizado com sucesso!';
    }
}

//Excluir usuario
if (isset($_GET["deletar"])) {
    $id = $_GET["deletar"];
    
    $stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
    if ($stmt->execute([$id])) {
        $_SESSION['message-delete'] = 'Usuário deletado com sucesso!';
    }
}

//Buscar usuarios
if (isset($_GET['pesquisar']) && !empty(trim($_GET['pesquisar']))) {
    $termo = '%' . trim($_GET['pesquisar']) . '%';
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE nome LIKE ? OR email LIKE ?");
    $stmt->execute([$termo, $termo]);
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $stmt = $db->query("SELECT * FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>