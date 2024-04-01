<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];

    try {
        $stmt = $pdo->prepare("INSERT INTO fornecedores (nome) VALUES (:nome)");
        $stmt->execute([':nome' => $nome]);

        echo "Fornecedor cadastrado com sucesso!";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Erro ao cadastrar fornecedor: " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "Por favor, preencha o campo de nome!";
}
?>
