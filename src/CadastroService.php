<?php

function cadastrarUsuario(array $dados)
{
    $nome = $dados['nome'];
    $email = $dados['email'];
    $senha = $dados['senha'];
    $senha_confirmar = $dados['senha_confirmar'];

    if (!$nome || !$email || !$senha || !$senha_confirmar) {
        return ['status' => false, 'erro' => 'Campos obrigatórios não podem estar vazios.'];
    }

    if ($senha !== $senha_confirmar) {
        return ['status' => false, 'erro' => 'Certifique-se de que ambas as senhas sejam iguais.'];
    }

    $dados = [
        'nome' => $nome,
        'email' => $email,
        'senha' => $senha
    ];

    if (Usuario::adicionarUsuario($dados)) {
        return ['status' => true];
    }

    return ['status' => false, 'erro' => 'Erro ao cadastrar usuário.'];
}