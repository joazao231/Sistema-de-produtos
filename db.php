<?php
$host = 'localhost'; // ou o IP do servidor de banco de dados
$dbname = 'cadastroprodutos'; // nome do seu banco de dados
$user = 'root'; // seu usuário do banco de dados
$pass = ''; // sua senha do banco de dados

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    // Configurar o PDO para lançar exceções em caso de erro
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Não foi possível conectar ao banco de dados: " . $e->getMessage());
}
?>
