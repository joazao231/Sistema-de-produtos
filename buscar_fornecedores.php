<?php
require 'db.php';

$stmt = $db->query("SELECT id, nome FROM fornecedores");
$fornecedores = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($fornecedores);
?>
