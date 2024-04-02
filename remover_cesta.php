<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto_id'])) {
    $produtoId = $_POST['produto_id'];
    
    if (isset($_SESSION['cesta_compras']) && in_array($produtoId, $_SESSION['cesta_compras'])) {
        $key = array_search($produtoId, $_SESSION['cesta_compras']);
        unset($_SESSION['cesta_compras'][$key]);
        echo "Produto removido da cesta de compras com sucesso!";
    } else {
        echo "Produto não encontrado na cesta de compras.";
    }
} else {
    http_response_code(400);
    echo "Requisição inválida.";
}
?>