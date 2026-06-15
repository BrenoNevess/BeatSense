<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/CadastroService.php';

class Usuario {
    public static function adicionarUsuario(array $dados) {
        return true;
    }
}

class CadastroTest extends TestCase
{

    public function testCadastroValido()
    {
        $r = cadastrarUsuario([
            'nome' => 'Breno',
            'email' => 'breno@email.com',
            'senha' => '123456',
            'senha_confirmar' => '123456'
        ]);
        $this->assertTrue($r['status']);
    }

    public function testSenhaDiferente()
    {
        $r = cadastrarUsuario([
            'nome' => 'Breno',
            'email' => 'breno@email.com',
            'senha' => '123456',
            'senha_confirmar' => '654321'
        ]);
        $this->assertFalse($r['status']);
    }

    public function testCampoVazio()
    {
        $r = cadastrarUsuario([
            'nome' => '',
            'email' => 'breno@email.com',
            'senha' => '123456',
            'senha_confirmar' => '123456'
        ]);
        $this->assertFalse($r['status']);
    }
}