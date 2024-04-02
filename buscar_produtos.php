<?php
require 'db.php';

$stmt = $db->query("SELECT id, nome, descricao, preco FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($produtos);
?>
