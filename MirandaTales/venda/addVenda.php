<?php
    require_once '../init.php';
    $PDO = db_connect();
    $sql = 'INSERT INTO venda (data_de_venda, idDisco, idCliente) VALUES (:data_de_venda, :disco, :cliente)';
    $stmt = $PDO->prepare($sql);
    $stmt->execute([
        ':data_de_venda' => $_POST['data_de_venda'],
        ':disco' => $_POST['disco'],
        ':cliente' => $_POST['cliente']
    ]);
    header('Location: exibirVenda.php');
?>