<?php
require_once '../init.php';
$id = $_GET['id'];
$PDO = db_connect();
$stmt = $PDO->prepare('DELETE FROM venda WHERE idVenda = :id');
$stmt->execute([':id' => $id]);
header('Location: exibirVenda.php');
?>