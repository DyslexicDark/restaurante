<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM mesa WHERE mesa_nombre='$id'";
    $query = mysqli_query($conn, $sql);
    $mesa = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="row">
            <h1 class="text-center">Administracion 🤖</h1>
            <button type="button" class="btn btn-dark" onclick="location.href='/index.php'">Cancelar</button>
    </div>
    <div class="container col-md-0 mt-5">
        <div class="row">
            <h3 class="text-center">Actualizar Mesa</h3>
            <form action="update.php" method="post" class="text-center">
                <input type="text" name="mesa_nombre" class="from-control mb-3" value="<?php echo $mesa['mesa_nombre']?>" placeholder="C,M,G + Numero">
                <input type="text" name="mesa_capacidad"class="from-control mb-3" value="<?php echo $mesa['mesa_capacidad']?>" placeholder="2,4,8">
                <input type="text" name="mesa_disponible" class="from-control mb-3" value="<?php echo $mesa['mesa_disponible']?>" placeholder="D,ND">
                <input type="submit" value="Actualizar" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
</body>
</html>