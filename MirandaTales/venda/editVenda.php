<?php
require_once '../init.php';
$PDO = db_connect();
$sql = 'UPDATE venda SET data_de_venda = :data_de_venda, idDisco = :idDisco, idCliente = :idCliente WHERE idVenda = :id';
$stmt = $PDO->prepare($sql);
$stmt->execute([
    ':data_de_venda' => $_POST['data_de_venda'],
    ':idDisco' => $_POST['idDisco'],
    ':idCliente' => $_POST['idCliente'],
    ':id' => $_POST['id']
]);
header('Location: exibirVenda.php');
?>