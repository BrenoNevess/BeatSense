<?php
include 'class/Conexao.php';
include 'class/Usuario.php';

class UsuarioDAO {
    private $db;

    public function __construct() {
        $this->db = Conexao::GetConexao();
    }

    // Cadastrar um novo usuário
    public function cadastrar(Usuario $usuario) {
        $query = "INSERT INTO usuarios (nome, email, senha_hash) 
                  VALUES (:nome, :email, :senha, NOW())";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        
        return $stmt->execute();
    }

    // Atualizar um usuário existente
    public function alterar(Usuario $usuario) {
        $query = "UPDATE usuarios SET 
                  nome = :nome, 
                  email = :email 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':id', $usuario->getId(), PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    // Excluir usuário pelo ID
    public function deletar($id) {
        $query = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    // Buscar todos os usuários
    public function getAllUsuarios() {
        $query = "SELECT id, nome, email, data_criacao FROM usuarios ORDER BY nome";
        $stmt = $this->db->query($query);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar usuário pelo ID
    public function getById($id) {
        $query = "SELECT id, nome, email, data_criacao FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar usuário pelo email
    public function getByEmail($email) {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>