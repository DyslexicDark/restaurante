<?php
    include("conexion.php");
    $conn=conectar();
    //meseros
    $nombre = $_POST['nombre'];
    $ap_pat = $_POST['ap_pat'];
    $ap_mat = $_POST['ap_mat'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    //mesas
    //comida
    //clientes
    $sql = "INSERT INTO mesero (mesero_nom,mesero_ap_pat,mesero_ap_mat,mesero_telefono,mesero_correo,mesero_disponible)
            VALUES('$nombre','$ap_pat','$ap_mat','$telefono','$correo','D')";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: index.php");
    }else{
        echo $query;
    }
?>