<?php
require_once 'db.php';

try {
    $sql_fornecedores = "
    CREATE TABLE IF NOT EXISTS `fornecedores` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $sql_produtos = "
    CREATE TABLE IF NOT EXISTS `produtos` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(255) NOT NULL,
      `preco` decimal(10,2) NOT NULL,
      `fornecedor_id` int(11) DEFAULT NULL,
      `descricao` varchar(255) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `fornecedor_id` (`fornecedor_id`),
      CONSTRAINT `fk_fornecedor` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE SET NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $sql_usuarios = "
    CREATE TABLE IF NOT EXISTS `usuarios` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(255) NOT NULL,
      `pass` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $pdo->exec($sql_fornecedores);
    $pdo->exec($sql_produtos);
    $pdo->exec($sql_usuarios);

    echo "Tabelas criadas com sucesso!";
} catch (PDOException $e) {
    die("Erro ao criar as tabelas: " . $e->getMessage());
}
?>
