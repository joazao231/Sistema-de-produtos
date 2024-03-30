<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Página Inicial</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Bem-vindo</h2>
        <p>Esta é a página inicial do sistema.</p>
        <a href="logout.php" class="btn btn-danger">Sair</a>
        <a href="cadastro_usuario.php" class="btn btn-primary">Cadastro de Usuário</a>
        <a href="login.php" class="btn btn-success">Login</a>
    </div>
</body>
</html>
