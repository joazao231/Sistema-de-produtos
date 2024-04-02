<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM usuarios WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['pass'])) {
        $stmt = $db->query("SELECT COUNT(*) FROM produtos");
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            header("Location: lista_produtos.php");
            exit;
        } else {
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