<?php
    include("conexion.php");
    $conn = conectar();
    //meseros
    $meseros_id = $_GET['meseros_id'];
    //mesas
    $mesa_nombre = $_GET['mesa_nombre'];
    //comida
    $com_beb_id = $_GET['com_beb_id'];
    //clientes
    $cli_id = $_GET['cli_id'];
    $sql = "DELETE FROM mesero WHERE mesero_id='$meseros_id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    $sql = "DELETE FROM mesa WHERE mesa_nombre='$mesa_nombre'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    $sql = "DELETE FROM comida_bebida WHERE com_beb_id='$com_beb_id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
    $sql = "DELETE FROM cliente WHERE cli_id='$cli_id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: ../index.php");
    }else{
        echo $query;
    }
?>