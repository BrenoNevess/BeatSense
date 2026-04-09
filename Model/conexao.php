<?php
class Conexao {
    private static $host="localhost:3307";
    private static $username="root";
    private static $password="";
    private static $dbname="beatsense";
    
    
    public static function GetConexao() {
        try {
            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8";
            $db = new PDO($dsn, self::$username, self::$password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }
    
}

?>