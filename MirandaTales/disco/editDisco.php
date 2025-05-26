<?php
require_once '../init.php';
$PDO = db_connect();
$sql = 'UPDATE disco SET nome_disco = :nome, valor = :valor, idArtista = :idArtista WHERE idDisco = :id';
$stmt = $PDO->prepare($sql);
$stmt->execute([
    ':nome' => $_POST['nome'],
    ':valor' => $_POST['valor'],
    ':idArtista' => $_POST['artista'],
    ':id' => $_POST['id']
]);
header('Location: exibirDiscos.php');
?>