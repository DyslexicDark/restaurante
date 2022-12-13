<?php
    include("conexion.php");
    $conn = conectar();
    $id = $_GET['id'];
    $sql = "DELETE FROM mesero WHERE mesero_id='$id'";
    $query = mysqli_query($conn,$sql);
    if($query){
        Header("Location: index.php");
    }else{
        echo $query;
    }
?>