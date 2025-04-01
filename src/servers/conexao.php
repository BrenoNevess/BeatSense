<?php 
    $host = 'localhost';
    $username = 'root'; 
    $password = '';
    $dbname = 'beatsense';

    try {
        $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       die("Erro ao se conectar" . $e->getMessage());
    }
?>