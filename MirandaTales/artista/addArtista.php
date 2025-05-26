<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = 'INSERT INTO artista (nome_artista) VALUES (:nome)';
    $stmt = $PDO->prepare($sql);
    $stmt->execute([
        ':nome' => $_POST['nome'],
    ]);
    header('Location: exibirArtistas.php');
?>
