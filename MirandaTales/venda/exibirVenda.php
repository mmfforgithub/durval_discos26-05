<?php
require_once '../init.php';
$PDO = db_connect();

// Consulta com JOIN para mostrar cliente e disco
$sql = "SELECT v.idVenda, v.data_de_venda, c.nome AS cliente, d.nome_disco AS disco FROM venda v JOIN cliente c ON v.idCliente = c.idCliente JOIN disco d ON v.idDisco = d.idDisco ORDER BY v.data_de_venda DESC";

$stmt = $PDO->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../bootstrap/js/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#menu").load("../navbar/navbar.html");
        });
    </script>
    <title>Vendas</title>
</head>
<body>
    <div id="menu"></div>
    <h1>Vendas</h1>
    <a href="formAddVenda.php">Nova Venda</a>
    <table border="1">
        <tr>
            <th>Data</th>
            <th>Cliente</th>
            <th>Disco</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($stmt as $row) { ?>
            <tr>
                <td><?php echo $row['data_de_venda']; ?></td>
                <td><?php echo $row['cliente']; ?></td>
                <td><?php echo $row['disco']; ?></td>
                <td>
                    <a href="formEditVenda.php?id=<?php echo $row['idVenda']; ?>">Editar</a> |
                    <a href="deleteVenda.php?id=<?php echo $row['idVenda']; ?>">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>