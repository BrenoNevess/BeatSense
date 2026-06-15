<?php
class Conexao {

    public static function GetConexao() {

        try {

            $host = getenv('DB_HOST');
            $port = getenv('DB_PORT');
            $dbname = getenv('DB_NAME');
            $user = getenv('DB_USER');
            $password = getenv('DB_PASSWORD');

            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require";

            $db = new PDO($dsn, $user, $password);

            $db->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $db;

        } catch(PDOException $e) {

            die("Erro: " . $e->getMessage());

        }
    }
}
?>