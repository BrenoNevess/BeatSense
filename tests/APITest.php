<?php

use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    public function testApiRetornaArtista()
    {
        $url = "https://www.theaudiodb.com/api/v1/json/2/search.php?s=Metallica";

        $resposta = file_get_contents($url);

        $this->assertNotFalse($resposta);

        $dados = json_decode($resposta, true);

        $this->assertArrayHasKey('artists', $dados);

        $this->assertNotEmpty($dados['artists']);
    }
}