<?php
    include("conexion.php");
    $conn = conectar();
    //meseros
    $mesero_id = $_POST['mesero_id'];
    $mesero_nom = $_POST['mesero_nom'];
    $mesero_ap_pat = $_POST['mesero_ap_pat'];
    $mesero_ap_mat = $_POST['mesero_ap_mat'];
    $mesero_telefono = $_POST['mesero_telefono'];
    $mesero_correo = $_POST['mesero_correo'];
    $mesero_disponible = $_POST['mesero_disponible'];
    //mesas
    $mesa_nombre = $_POST['mesa_nombre'];
    $mesa_capacidad = $_POST['mesa_capacidad'];
    $mesa_disponible = $_POST['mesa_disponible'];
    //comida
    $com_beb_id = $_POST['com_beb_id'];
    $com_beb_producto = $_POST['com_beb_producto'];
    $com_beb_categoria = $_POST['com_beb_categoria'];
    $com_beb_precio = $_POST['com_beb_precio'];
    $com_beb_disponible = $_POST['com_beb_disponible'];
    //clientes
    $cli_id = $_POST['cli_id'];
    $cli_nombre = $_POST['cli_nombre'];
    $cli_ap_pat = $_POST['cli_ap_pat'];
    $cli_ap_mat = $_POST['cli_ap_mat'];
    $cli_num_personas = $_POST['cli_num_personas'];
    $cli_fecha = $_POST['cli_fecha'];
    $cli_pago = $_POST['cli_pago'];
    $cli_mesa_id = $_POST['cli_mesa_id'];
    $cli_mesero_id = $_POST['cli_mesero_id'];
    //meseros
    $sql = "UPDATE mesero SET mesero_nom='$mesero_nom',mesero_ap_pat='$mesero_ap_pat',mesero_ap_mat='$mesero_ap_mat',mesero_telefono='$mesero_telefono',mesero_correo='$mesero_correo',mesero_disponible='$mesero_disponible' WHERE mesero_id='$mesero_id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    //mesas
    $sql = "UPDATE mesa SET mesa_capacidad='$mesa_capacidad',mesa_disponible='$mesa_disponible' WHERE mesa_nombre='$mesa_nombre'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    //comida
    $sql = "UPDATE comida_bebida SET com_beb_producto='$com_beb_producto',com_beb_categoria='$com_beb_categoria',com_beb_precio='$com_beb_precio',com_beb_disponible='$com_beb_disponible' WHERE com_beb_id='$com_beb_id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    //clientes
    $sql = "UPDATE cliente SET cli_nombre='$cli_nombre',cli_ap_pat='$cli_ap_pat',cli_ap_mat='$cli_ap_mat',cli_num_personas='$cli_num_personas',cli_fecha='$cli_fecha',cli_pago='$cli_pago',cli_mesa_id='$cli_mesa_id',cli_mesero_id='$cli_mesero_id' WHERE cli_id='$cli_id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
?>