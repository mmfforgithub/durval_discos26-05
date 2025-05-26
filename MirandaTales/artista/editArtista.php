<?php 
    require_once '../init.php';
    $PDO = db_connect();
    $sql = 'UPDATE artista SET nome_artista = :nome WHERE idArtista = :id';
    $stmt = $PDO->prepare($sql);
    $stmt->execute([
        ':nome' => $_POST['nome_artista'],
        ':id' => $_POST['id']
    ]);
    header('Location: exibirArtistas.php');
?>