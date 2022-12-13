<?php
    /*include_once 'conexion.php';*/
    include("./php/conexion.php");
    $conn = conectar();
    $sql = "SELECT * FROM mesero";
    $sql2 = "SELECT * FROM mesa";
    $sql3 = "SELECT * FROM comida_bebida";
    $sql4 = "SELECT * FROM cliente";
    $query = mysqli_query($conn,$sql);
    $query2 = mysqli_query($conn,$sql2);
    $query3 = mysqli_query($conn,$sql3);
    $query4 = mysqli_query($conn,$sql4);
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
    <div class="row">
        <h1 class="text-center">Administracion 🤖</h1>
        <button type="button" class="btn btn-dark" onclick="location.href='/index.html'">Regresar</button>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h3>Nuevo Mesero</h3>
                <form action="./php/insertar.php" method="post">
                    <input type="text" name="mesero_nom" class="from-control mb-3" placeholder="Nombres">
                    <input type="text" name="mesero_ap_pat" class="from-control mb-3" placeholder="Apellido Paterno">
                    <input type="text" name="mesero_ap_mat" class="from-control mb-3" placeholder="Apellido Materno">
                    <input type="text" name="mesero_telefono" class="from-control mb-3" placeholder="Ej. 4327438212">
                    <input type="text" name="mesero_correo" class="from-control mb-3" placeholder="example@gmail.com">
                    <input type="submit" value="Agregar empleado" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3 class="text-center">🤵 Meseros del Sistema 🤵</h3>
                </div>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Disponibilidad</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['mesero_id']?>
                                    </td>
                                    <td>
                                        <?php echo $row['mesero_nom']?>
                                        <?php echo $row['mesero_ap_pat']?>
                                        <?php echo $row['mesero_ap_mat']?>
                                    </td>
                                    <td>
                                        <?php echo $row['mesero_telefono']?>
                                    </td>
                                    <td>
                                        <?php echo $row['mesero_correo']?>
                                    </td>
                                    <td>
                                        <?php echo $row['mesero_disponible']?>
                                    </td>
                                    <td>
                                        <a href="./php/meseros.php?id=<?php echo $row['mesero_id'] ?>"
                                            class="btn btn-warning">Editar</a>
                                        |
                                        <a href="./php/delete.php?meseros_id=<?php echo $row['mesero_id'] ?>"
                                            class="btn btn-danger">Borrar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h3>Nueva Mesa</h3>
                <form action="./php/insertar.php" method="post">
                    <input type="text" name="mesa_nombre" class="from-control mb-3" placeholder="Ej. C1,M1,G1">
                    <input type="text" name="mesa_capacidad" class="from-control mb-3" placeholder="2,4,8">
                    <input type="text" name="mesa_disponible" class="from-control mb-3" placeholder="D/ND">
                    <input type="submit" value="Agregar Mesa" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3 class="text-center">🪑 Mesas del Sistema 🪑</h3>
                </div>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>Tamaño</th>
                            <th>Capacidad</th>
                            <th>Disponibilidad</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query2)){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['mesa_nombre']?>
                                    </td>
                                    <td>
                                        <?php echo $row['mesa_capacidad']?>
                                    </td>
                                    <td>
                                        <?php echo $row['mesa_disponible']?>
                                    </td>
                                    </td>
                                    <td>
                                        <a href="./php/mesas.php?id=<?php echo $row['mesa_nombre'] ?>"
                                            class="btn btn-warning">Editar</a>
                                        |
                                        <a href="./php/delete.php?mesa_nombre=<?php echo $row['mesa_nombre'] ?>"
                                            class="btn btn-danger">Borrar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h3>Nueva Comida/Bebida</h3>
                <form action="./php/insertar.php" method="post">
                    <input type="text" name="com_beb_producto" class="from-control mb-3" placeholder="Platillo/Bebida">
                    <input type="text" name="com_beb_categoria" class="from-control mb-3" placeholder="Categoria: Bebida,Comida,Postre">
                    <input type="text" name="com_beb_precio" class="from-control mb-3" placeholder="Ej. 60.25">
                    <input type="submit" value="Agregar" class="btn btn-primary">
                </form>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <h3 class="text-center">🍽 Comidas/Bebidas del Sistema 🍽</h3>
                </div>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Disponibilidad</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query3)){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['com_beb_id']?>
                                    </td>
                                    <td>
                                        <?php echo $row['com_beb_producto']?>
                                    </td>
                                    <td>
                                        <?php echo $row['com_beb_categoria']?>
                                    </td>
                                    <td>
                                        $<?php echo $row['com_beb_precio']?>
                                    </td>
                                    <td>
                                        <?php echo $row['com_beb_disponible']?>
                                    </td>
                                    <td>
                                        <a href="./php/comidas.php?id=<?php echo $row['com_beb_id'] ?>"
                                            class="btn btn-warning">Editar</a>
                                        |
                                        <a href="./php/delete.php?com_beb_id=<?php echo $row['com_beb_id'] ?>"
                                            class="btn btn-danger">Borrar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div>
                <div class="row">
                    <h3 class="text-center">👥 Clientes del Sistema 👥</h3>
                </div>
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Numero de personas</th>
                            <th>Fecha</th>
                            <th>Pago</th>
                            <th>Mesa</th>
                            <th>Mesero ID</th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query4)){
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['cli_id']?>
                                    </td>
                                    <td>
                                        <?php echo $row['cli_nombre']?>
                                        <?php echo $row['cli_ap_pat']?>
                                        <?php echo $row['cli_ap_mat']?>
                                    </td>
                                    <td>
                                        <?php echo $row['cli_num_personas']?>
                                    </td>
                                    <td>
                                        <?php echo $row['cli_fecha']?>
                                    </td>
                                    <td>
                                        <?php echo $row['cli_pago']?>
                                    </td>
                                    <td>
                                        <?php echo $row['cli_mesa_id']?>
                                    </td>
                                    <td>
                                        <?php echo $row['cli_mesero_id']?>
                                    </td>
                                    <td>
                                        <a href="./php/clientes.php?id=<?php echo $row['cli_id'] ?>"
                                            class="btn btn-warning">Editar</a>
                                        |
                                        <a href="./php/delete.php?cli_id=<?php echo $row['cli_id'] ?>"
                                            class="btn btn-danger">Borrar</a>
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>