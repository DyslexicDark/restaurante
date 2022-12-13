<?php
    include("conexion.php");
    $conn = conectar();
    //meseros
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $ap_pat = $_POST['ap_pat'];
    $ap_mat = $_POST['ap_mat'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $disponible = $_POST['disponible'];
    //mesas
    //comida
    //clientes
    $sql = "UPDATE mesero SET mesero_nom='$nombre',mesero_ap_pat='$ap_pat',mesero_ap_mat='$ap_mat',mesero_telefono='$telefono',mesero_correo='$correo',mesero_disponible='$disponible' WHERE mesero_id='$id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: index.php");
    }else{
        echo $query;
    }
?>