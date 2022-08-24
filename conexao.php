<?php

$host = "localhost";
$user = "postgres";
$password = "postgres";

$Banco = "BD_ProductFinder";

try {
    $pdo = new PDO("pgsql:host=$host; port=5432; dbname=$Banco", $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "Conectado com sucesso!!!";
} catch (PDOException $e) {
    echo "Falha ao conectar no banco de dados!!! <br/> $e";
}
?>
