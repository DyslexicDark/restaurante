<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM mesero WHERE mesero_id='$id'";
    $query = mysqli_query($conn, $sql);
    $mesero = mysqli_fetch_array($query);
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
    <div class="container col-md-4 mt-5">
        <div class="row">
            <h3 class="text-center">Actualizar Mesero</h3>
            <form action="update.php" method="post" class="text-center">
                <input type="hidden" name="id" value="<?php echo $mesero['mesero_id']?>">
                <input type="text" name="nombre"class="from-control mb-3" value="<?php echo $mesero['mesero_nom']?>" placeholder="Nombres">
                <input type="text" name="ap_pat" class="from-control mb-3" value="<?php echo $mesero['mesero_ap_pat']?>" placeholder="Apellido Paterno">
                <input type="text" name="ap_mat" class="from-control mb-3" value="<?php echo $mesero['mesero_ap_mat']?>" placeholder="Apellido Materno">
                <input type="text" name="telefono" class="from-control mb-3" value="<?php echo $mesero['mesero_telefono']?>" placeholder="Ej. 4327438212">
                <input type="text" name="correo" class="from-control mb-3" value="<?php echo $mesero['mesero_correo']?>" placeholder="example@gmail.com">
                <input type="text" name="disponible" class="from-control mb-3" value="<?php echo $mesero['mesero_disponible']?>" placeholder="D/ND">
                <input type="submit" value="Actualizar" class="btn btn-primary btn-block">
            </form>
        </div>
    </div>
</body>
</html>