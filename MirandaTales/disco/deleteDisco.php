<?php
    require_once '../init.php';
    $id = $_GET['id'];
    $PDO = db_connect();
    $stmt = $PDO->prepare('DELETE FROM disco WHERE idDisco = :id');
    $stmt->execute([':id' => $id]);
    header('Location: exibirDiscos.php');
?>