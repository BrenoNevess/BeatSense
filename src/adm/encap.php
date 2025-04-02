<?php

class Usuarios {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $senha_confirmar;

    function __construct($id, $nome, $email, $senha, $senha_confirmar) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->senha_confirmar = $senha_confirmar;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getSenhaConfirmar() {
        return $this->senha_confirmar;
    }

    public function setSenhaConfirmar($senha_confirmar) {
        $this->senha_confirmar = $senha_confirmar;
    }
}


?>
