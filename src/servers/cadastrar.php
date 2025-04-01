<?php 
include ('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha_hash'];
    $senha_confirmar = $_POST['senha_confirmar_hash'];

    if (empty($nome) || empty($email) || empty($senha) || empty($senha_confirmar)) {
        die("Preencha todos os campos!");
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nome, email, senha_hash, senha_confirmar_hash) VALUES (:nome, :email, :senha_hash, :senha_confirmar_hash)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':nome' => $nome, ':email' => $email, ':senha_hash' => $senhaHash, ':senha_confirmar_hash' => $senhaHash]);

        header('location: /BeatSense/src/login.php');
        exit();

    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>