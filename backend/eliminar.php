<?php
    require_once'../conexion.php';
    $conexion  = conexion();
    $id = $_GET['idpais'];

    $sql = "DELETE FROM t_paises WHERE id_paises='$id'";
    $respuesta = mysqli_query($conexion, $sql);

    
    if ($respuesta){
        header('location:../index.php');
    } else{
        echo "No se pudo eliminar";
    }
?>