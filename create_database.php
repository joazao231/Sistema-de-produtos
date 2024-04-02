<?php
require 'db.php';

try {
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS cadastroprodutos";
    $db->exec($sql_create_db);

    require 'criar_tabelas.php';

    echo "Banco de dados e tabelas criados com sucesso!";
} catch (PDOException $e) {
    die("Erro ao criar o banco de dados: " . $e->getMessage());
}
?>
