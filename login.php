<?php
require 'db.php'; // Conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Busca pelo usuário
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['pass'])) {
        // Usuário autenticado, verificar se há produtos cadastrados
        $stmt = $pdo->query("SELECT COUNT(*) FROM produtos");
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            // Existem produtos cadastrados, redirecionar para a página principal
            header("Location: lista_produtos.php");
            exit;
        } else {
            // Não existem produtos cadastrados, redirecionar para cadastro de fornecedores
            header("Location: cadastro_fornecedor.html");
            exit;
        }
    } else {
        echo "Usuário ou senha inválidos!";
    }
} else {
    echo "Todos os campos são obrigatórios!";
}
?>