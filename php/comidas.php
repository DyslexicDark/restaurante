<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "SELECT * FROM comida_bebida WHERE com_beb_id='$id'";

    $query = mysqli_query($conn, $sql);

    $comida_bebida = mysqli_fetch_array($query);
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
                <h3 class="text-center">Actualizar Comida/Bebida</h3>
                <form action="update.php" method="post" class="text-center">
                    <input type="hidden" name="com_beb_id" value="<?php echo $comida_bebida['com_beb_id']?>">
                    <input type="text" name="com_beb_producto"class="from-control mb-3" value="<?php echo $comida_bebida['com_beb_producto']?>" placeholder="Platillo/Bebida">
                    <input type="text" name="com_beb_categoria" class="from-control mb-3" value="<?php echo $comida_bebida['com_beb_categoria']?>" placeholder="Bebida,Comida,Postre">
                    <input type="floatval" name="com_beb_precio" class="from-control mb-3" value="<?php echo $comida_bebida['com_beb_precio']?>" placeholder="$$$">
                    <input type="text" name="com_beb_disponible" class="from-control mb-3" value="<?php echo $comida_bebida['com_beb_disponible']?>" placeholder="D/ND">
                    <input type="submit" value="Actualizar" class="btn btn-primary btn-block">
                </form>
        </div>
    </div>
</body>
</html>