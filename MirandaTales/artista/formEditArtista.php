<?php
    require_once '../init.php';
    $id = $_GET['id'];
    $PDO = db_connect();
    $stmt = $PDO->prepare('SELECT * FROM artista WHERE idArtista = :id');
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $artista = $stmt->fetch(PDO::FETCH_ASSOC);
    if(!is_array($artista)){
        header("Location: exibirArtistas.php");
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
    <h1>Editar Artista</h1>
    <form action="editArtista.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $artista['idArtista'] ?>">
        <input type="text" name="nome_artista" placeholder="Nome" value="<?php echo $artista['nome_artista'] ?>" required><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>