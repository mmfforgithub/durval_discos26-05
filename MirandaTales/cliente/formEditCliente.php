<?php
    require_once '../init.php';
    $id = $_GET['id'];
    $PDO = db_connect();
    $stmt = $PDO->prepare('SELECT * FROM cliente WHERE idCliente = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($cliente)){
        header("Location: exibirClientes.php");
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
    <h1>Editar Cliente</h1>
    <form action="editCliente.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $cliente['idCliente'] ?>">
        <input type="text" name="nome" placeholder="Nome" value=<?php echo $cliente['nome'] ?> required><br>
        <input type="email" name="email" placeholder="Email" value=<?php echo $cliente['email'] ?>><br>
        <input type="text" name="telefone" placeholder="Telefone" value=<?php echo $cliente['telefone'] ?>><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>