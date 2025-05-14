<?php
include('conexao.php');

class Usuario {

    public static function adicionarUsuario($dados) {
        $db = Conexao::GetConexao();

        $nome = $dados["nome"];
        $email = $dados["email"];
        $senha = password_hash($dados["senha"], PASSWORD_DEFAULT);

        $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->execute([$email]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['erro_accExiste'] = 'Este e-mail já está cadastrado à uma conta.';
            return false;
        } else {
            $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
            if ($stmt->execute([$nome, $email, $senha])) {
                $_SESSION['message-user-success'] = 'Usuário cadastrado com sucesso!';
                return true;
            }
        }
        return false;
    }

    public static function atualizarUsuario($dados) {
        $db = Conexao::GetConexao();

        $id = $dados["id"];
        $nome = $dados["nome"];
        $email = $dados["email"];
        $senhaHash = password_hash($dados["senha"], PASSWORD_DEFAULT);

        $stmt = $db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
        if ($stmt->execute([$nome, $email, $senhaHash, $id])) {
            $_SESSION['message-update'] = 'Usuário atualizado com sucesso!';
            return true;
        }
        return false;
    }

    public static function deletarUsuario($id) {
        $db = Conexao::GetConexao();

        $stmt = $db->prepare("DELETE FROM usuarios WHERE id = ?");
        if ($stmt->execute([$id])) {
            $_SESSION['message-delete'] = 'Usuário deletado com sucesso!';
            return true;
        }
        return false;
    }

    public static function buscar($termo = null) {
        $db = Conexao::GetConexao();

        if ($termo && !empty(trim($termo))) {
            $termo = '%' . trim($termo) . '%';
            $stmt = $db->prepare("SELECT * FROM usuarios WHERE nome LIKE ? OR email LIKE ?");
            $stmt->execute([$termo, $termo]);
        } else {
            $stmt = $db->query("SELECT * FROM usuarios");
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
