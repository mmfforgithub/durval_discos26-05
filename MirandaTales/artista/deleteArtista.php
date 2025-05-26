<?php
require_once '../init.php';
$id = $_GET['id'];
$PDO = db_connect();
$stmt = $PDO->prepare('DELETE FROM artista WHERE idArtista = :id');
$stmt->execute([':id' => $id]);
header('Location: exibirArtistas.php');
?>