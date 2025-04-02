<?php
use Usuarios;
include '../servers/conexao.php';
include 'encap.php';

class UsuarioDAO {
    private $db;

    public function __construct() {
        $this->db = Conexao::GetConexao();
    }

    // Cadastrar um novo usuário
    public function cadastrar(Usuarios $usuario) {
        $query = "INSERT INTO usuarios (nome, email, senha_hash, senha_confirmar_hash, criado_em) 
                  VALUES (:nome, :email, :senha_hash, :senha_confirmar_hash, NOW())";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha_hash', password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $stmt->bindValue(':senha_confirmar_hash', password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        
        return $stmt->execute();
    }

    // Atualizar um usuário existente
    public function alterar(Usuarios $usuario) {
        $query = "UPDATE usuarios SET
                  nome = :nome, 
                  email = :email, 
                  senha_hash = :senha_hash, 
                  senha_confirmar_hash = :senha_confirmar_hash
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha_hash', password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $stmt->bindValue(':senha_confirmar_hash', password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
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
        $query = "SELECT id, nome, email, criado_em FROM usuarios ORDER BY nome";
        $stmt = $this->db->query($query);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar usuário pelo ID
    public function getById($id) {
        $query = "SELECT id, nome, email, criado_em FROM usuarios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Buscar usuário pelo email
    public function getByEmail($email) {
        $query = "SELECT id, nome, email, criado_em FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
