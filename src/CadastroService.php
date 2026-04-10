<?php

function cadastrarUsuario($nome, $email, $senha, $senha_confirmar)
{
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