<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = :username");
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['pass'])) {
        $stmt = $pdo->query("SELECT COUNT(*) FROM produtos");
        $count = $stmt->fetchColumn();

        if ($count > 0) {header("Location: pagina_principal.html");
                        exit;
        } else {header("Location: cadastro_fornecedor.html");
                exit;
        }
    } else {
        echo "Usuário ou senha inválidos!";
    }
} else {
    echo "Preencha todos os campos";
}
?>