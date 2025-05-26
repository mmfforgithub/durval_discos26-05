<?php
require_once '../init.php';
$PDO = db_connect();
$stmt = $PDO->query('SELECT * FROM venda');
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
            $(function(){
                $("#menu").load("../navbar/navbar.html");
            });
        });
    </script>
    <title>Document</title>
</head>
<body>
<div id='menu'></div>
   <?php 
        echo '<h1>Vendas</h1><a href="formAddVenda.php">Novo</a><table>';
        foreach ($stmt as $row) {
            echo '<tr><td>'.$row['data_de_venda'].'</td><td><a href="formEditVenda.php?id='.$row['idVenda'].'">Editar</a> <a href="deleteVenda.php?id='.$row['idVenda'].'">Excluir</a></td></tr>';
        }
        echo '</table>';
    ?>
</body>
</html>

  