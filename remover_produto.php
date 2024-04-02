<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['produto_id'])) {
    $produto_id = $_POST['produto_id'];

    try {
        $stmt = $db->prepare("DELETE FROM produtos WHERE id = :produto_id");
        $stmt->execute([':produto_id' => $produto_id]);

        echo "Produto removido com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao remover produto: " . $e->getMessage();
    }
} else {
    echo "ID do produto não fornecido!";
}
?>
