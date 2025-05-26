<?php
    require_once '../init.php';
    $id = $_GET['id'];
    $PDO = db_connect();
    $stmt = $PDO->prepare('SELECT * FROM disco WHERE idDisco = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $disco = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($disco)){
        header("Location: exibirDiscos.php");
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
    <h1>Editar Disco</h1>
    <form action="editDisco.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $disco['idDisco'] ?>">
        <input type="text" name="nome" placeholder="Nome" value="<?php echo $disco['nome_disco'] ?>" required><br>
        <input type="number" name="valor" placeholder="Valor" value="<?php echo $disco['valor'] ?>"><br>
        <select name="artista">
            <option value="">Selecione um artista</option>
            <?php
                require_once '../init.php';
                $PDO = db_connect();
                $sql = 'SELECT * FROM artista';
                $stmt = $PDO->prepare($sql);
                $stmt->execute();
                $artistas = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($artistas as $artista) {
                    echo "<option value='{$artista['idArtista']}'>{$artista['nome_artista']}</option>";
                }
            ?>
        </select>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>