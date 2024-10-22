<?php
function conectar()
{
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $bd   = "restaurante";

    // Crear conexión
    $conn = mysqli_connect($host, $user, $pass);

    // Verificar conexión
    if (!$conn) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    // Seleccionar base de datos
    if (!mysqli_select_db($conn, $bd)) {
        die("Error al seleccionar la base de datos: " . mysqli_error($conn));
    }

    return $conn;
}
/*    function conectar()
    {
        $host="localhost";
        $user="root";
        $pass="root";
        $bd= "restaurante";
        $conn = mysqli_connect($host, $user, $pass);
        mysqli_select_db($conn ,$bd);
        return $conn;
    }/*$link='mysql:host=localhost; dbname=restaurante';
    $usuario ='root';
    $pass = 'root';
    try{
        $pdo = new PDO($link,$usuario,$pass);
        //echo 'conectado';
    }catch(PDOException $e){
        print "Error!!!" . $e->getMessage()."<br/>";
        die();
    }*/
?>
