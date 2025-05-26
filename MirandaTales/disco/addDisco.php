<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = 'INSERT INTO disco (nome_disco, valor, idArtista) VALUES (:nome, :valor, :artista)';
    $stmt = $PDO->prepare($sql);
    $stmt->execute([
        ':nome' => $_POST['nome'],
        ':valor' => $_POST['valor'],
        ':artista' => $_POST['artista']
    ]);
    header('Location: exibirDiscos.php');
?>

