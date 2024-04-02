<?php
session_start();
require_once 'db.php';
require_once 'create_database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
} else {
    header("Location: lista_produtos.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Bem-vindo ao Sistema de Gestão de Produtos</h1>
    
</div>
</body>
</html>
