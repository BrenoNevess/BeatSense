<?php 
session_start();
include('conexao.php');

$db = Conexao::GetConexao();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $senha_confirmar = $_POST['senha_confirmar'];

    if (empty($nome) || empty($email) || empty($senha) || empty($senha_confirmar)) {
        die("Preencha todos os campos!");
    }

    if($senha !== $senha_confirmar){
        $_SESSION['mensagem_erro'] = 'Certifique-se de que ambas as senhas sejam iguais.';
        header('Location: ../cadastro.php');
        exit();
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $db->prepare($sql);
        $stmt->execute([':nome' => $nome, ':email' => $email, ':senha' => $senhaHash]);
        
        $_SESSION['cadastrado-com-sucesso'] = 'Usuário cadastrado com sucesso!';
        
        header('location: ../loginpage.php');       
        exit();

    } catch (PDOException $e) {
        echo "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>