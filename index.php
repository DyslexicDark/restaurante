<?php
    /*include_once 'conexion.php';*/
    include("conexion.php");
    $conn = conectar();
    //$sql = "SELECT * FROM ";
    //$query = mysqli_query($conn,$sql);
    //echo $query;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h1>Nuevo Mesero</h1>
                <form action="insertar.php" method="post">
                    <input type="text" name="nombre" class="from-control mb-3" placeholder="Nombres">
                    <input type="text" name="ap_pat" class="from-control mb-3" placeholder="Apellido Paterno">
                    <input type="text" name="ap_mat" class="from-control mb-3" placeholder="Apellido Materno">
                    <input type="number" name="telefono" class="from-control mb-3" placeholder="Ej. 4327438212">
                    <input type="email" name="correo" class="from-control mb-3" placeholder="example@gmail.com">
                    <input type="submit" value="Agregar empleado" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
</html>