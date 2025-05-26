<?php
    require_once '../init.php';
    $id = $_GET['id'];
    $PDO = db_connect();
    $stmt = $PDO->prepare('SELECT * FROM venda WHERE idVenda = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $disco = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($disco)){
        header("Location: exibirVenda.php");
    }
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
    <h1>Editar Vendas</h1>
    <form action="editVenda.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $venda['idVenda'] ?>">
        <input type="date" name="data" placeholder="Data" value="<?php echo $venda['data_de_venda'] ?>" required><br>
        <select name="disco">
            <option value="">Selecione um disco</option>
            <?php
                require_once '../init.php';
                $PDO = db_connect();
                $sql = 'SELECT * FROM disco';
                $stmt = $PDO->prepare($sql);
                $stmt->execute();
                $artistas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($discos as $disco) {
                    echo "<option value='{$disco['idDisco']}'>{$disco['nome_disco']}</option>";
                }
            ?>
        </select>
        <select name="cliente">
            <option value="">Selecione um cliente</option>
            <?php
                require_once '../init.php';
                $PDO = db_connect();
                $sql = 'SELECT * FROM cliente';
                $stmt = $PDO->prepare($sql);
                $stmt->execute();
                $artistas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($clientes as $cliente) {
                    echo "<option value='{$cliente['idCliente']}'>{$cliente['nome']}</option>";
                }
            ?>
        </select>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>