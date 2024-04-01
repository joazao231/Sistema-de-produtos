<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['nome']) && !empty($_POST['descricao']) && !empty($_POST['preco'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    try {
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco) VALUES (:nome, :descricao, :preco)");
        $stmt->execute([':nome' => $nome, ':descricao' => $descricao, ':preco' => $preco]);

        echo "Produto cadastrado com sucesso!";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Erro ao cadastrar produto: " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "Por favor, preencha todos os campos!";
}
?>
