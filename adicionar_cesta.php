<?php
session_start();

$postData = json_decode(file_get_contents('php://input'), true);
if (!isset($postData['id']) || !is_array($postData['id'])) {
    http_response_code(400);
    echo "IDs dos produtos não fornecidos ou em formato inválido.";
    exit();
}

if (!isset($_SESSION['cesta_compras'])) {
    $_SESSION['cesta_compras'] = [];
}

foreach ($postData['id'] as $produtoId) {
    if (!in_array($produtoId, $_SESSION['cesta_compras'])) {
        $_SESSION['cesta_compras'][] = $produtoId;
    }
}

echo "Produtos adicionados ao carrinho com sucesso!";
?>
