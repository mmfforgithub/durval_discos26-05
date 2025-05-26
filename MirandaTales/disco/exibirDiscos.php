<?php
require_once '../init.php';
$PDO = db_connect();
$stmt = $PDO->query('SELECT * FROM disco');
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
        echo '<h1>Discos</h1><a href="formAddDisco.php">Novo</a><table>';
        foreach ($stmt as $row) {
            echo '<tr><td>'.$row['nome_disco'].'</td><td><a href="formEditDisco.php?id='.$row['idDisco'].'">Editar</a> <a href="deleteDisco.php?id='.$row['idDisco'].'">Excluir</a></td></tr>';
        }
        echo '</table>';
    ?>
</body>
</html>
