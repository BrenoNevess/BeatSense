<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/CadastroService.php';

class Usuario {
    public static function adicionarUsuario($dados) {
        return true;
    }
}

class CadastroTest extends TestCase
{

    public function testCadastroValido()
    {
        $r = cadastrarUsuario("Breno", "breno@email.com", "123456", "123456");
        $this->assertTrue($r['status']);
    }

    public function testSenhaDiferente()
    {
        $r = cadastrarUsuario("Breno", "breno@email.com", "123456", "654321");
        $this->assertFalse($r['status']);
    }

    public function testCampoVazio()
    {
        $r = cadastrarUsuario("", "breno@email.com", "123456", "123456");
        $this->assertFalse($r['status']);
    }
}