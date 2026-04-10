<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/LoginService.php';

class LoginTest extends TestCase
{
    private $db;

    protected function setUp(): void
    {
        $this->db = new PDO('sqlite::memory:');

        $this->db->exec("CREATE TABLE adm (id INTEGER, email TEXT, senha TEXT)");
        $this->db->exec("CREATE TABLE usuarios (id INTEGER, email TEXT, senha TEXT)");

        $senhaHash = password_hash("123456", PASSWORD_DEFAULT);

        $this->db->exec("INSERT INTO adm VALUES (1, 'adm@email.com', '$senhaHash')");
    }

    public function testLoginValido()
    {
        $r = autenticar($this->db, "adm@email.com", "123456");
        $this->assertTrue($r['status']);
    }

    public function testLoginInvalido()
    {
        $r = autenticar($this->db, "errado@email.com", "123456");
        $this->assertFalse($r['status']);
    }

    public function testSenhaVazia()
    {
        $r = autenticar($this->db, "adm@email.com", "");
        $this->assertFalse($r['status']);
    }
}