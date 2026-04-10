<?php

function autenticar($db, $email, $senha) {

    // Admin
    $stmt = $db->prepare("SELECT * FROM adm WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($senha, $admin['senha'])) {
        return ['status' => true, 'tipo' => 'adm'];
    }

    // Usuário
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        return ['status' => true, 'tipo' => 'usuario'];
    }

    return ['status' => false];
}