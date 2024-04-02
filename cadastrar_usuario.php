<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $db->prepare("INSERT INTO usuarios (username, pass) VALUES (:username, :pass)");
        $stmt->execute([':username' => $username, ':pass' => $passwordHash]);

        echo "Usuário cadastrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
} else {
    echo "Todos os campos são obrigatórios!";
}
?>
