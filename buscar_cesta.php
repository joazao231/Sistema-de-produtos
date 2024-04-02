<?php
session_start();

require 'db.php';

if (isset($_SESSION['cesta_compras']) && count($_SESSION['cesta_compras']) > 0) {
    $produtosIds = implode(',', $_SESSION['cesta_compras']);

    $stmt = $db->query("SELECT * FROM produtos WHERE id IN ($produtosIds)");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($produtos);
} else {
    echo json_encode([]);
}
?>
