<?php
    include("conexion.php");
    $conn=conectar();
    //meseros
    $mesero_nom = $_POST['mesero_nom'];
    $mesero_ap_pat = $_POST['mesero_ap_pat'];
    $mesero_ap_mat = $_POST['mesero_ap_mat'];
    $mesero_telefono = $_POST['mesero_telefono'];
    $mesero_correo = $_POST['mesero_correo'];
    //mesas
    $mesa_nombre = $_POST['mesa_nombre'];
    $mesa_capacidad = $_POST['mesa_capacidad'];
    $mesa_disponible = $_POST['mesa_disponible'];
    //comida
    $com_beb_producto = $_POST['com_beb_producto'];
    $com_beb_categoria = $_POST['com_beb_categoria'];
    $com_beb_precio = $_POST['com_beb_precio'];
    //clientes
    $cli_nombre = $_POST['cli_nombre'];
    $cli_ap_pat = $_POST['cli_ap_pat'];
    $cli_ap_mat = $_POST['cli_ap_mat'];
    $cli_num_personas = $_POST['cli_num_personas'];
    $cli_fecha = $_POST['cli_fecha'];
    $sql = "INSERT INTO mesero (mesero_nom,mesero_ap_pat,mesero_ap_mat,mesero_telefono,mesero_correo,mesero_disponible)
            VALUES('$mesero_nom','$mesero_ap_pat','$mesero_ap_mat','$mesero_telefono','$mesero_correo','D')";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    $sql = "INSERT INTO mesa (mesa_nombre,mesa_capacidad,mesa_disponible)
            VALUES('$mesa_nombre','$mesa_capacidad','$mesa_disponible')";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    $sql = "INSERT INTO comida_bebida (com_beb_producto,com_beb_categoria,com_beb_precio,com_beb_disponible)
            VALUES('$com_beb_producto','$com_beb_categoria','$com_beb_precio','D')";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    $sql = "INSERT INTO cliente (cli_nombre,cli_ap_pat,cli_ap_mat,cli_num_personas,cli_fecha,cli_pago,cli_mesa_id,cli_mesero_id)
            VALUES('$cli_nombre','$cli_ap_pat','$cli_ap_mat','$cli_num_personas','$cli_fecha','n',null,null)";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.html");
    }else{
        Header("Location: ../index.html");
    }
?>