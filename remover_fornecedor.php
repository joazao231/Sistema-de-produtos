<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['fornecedor_id'])) {
    $fornecedor_id = $_POST['fornecedor_id'];

    try {
        $stmt = $db->prepare("DELETE FROM fornecedores WHERE id = :fornecedor_id");
        $stmt->execute([':fornecedor_id' => $fornecedor_id]);

        echo "Fornecedor removido com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao remover fornecedor: " . $e->getMessage();
    }
} else {
    echo "ID do fornecedor não fornecido!";
}
?>
