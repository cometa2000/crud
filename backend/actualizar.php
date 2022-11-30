<?php 
    require_once'../conexion.php';
    $conexion = conexion();
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $continente = $_POST['continente'];

    $sql = "UPDATE t_paises SET nombre='$nombre',continente='$continente' WHERE id_paises='$id'";
    $respuesta = mysqli_query($conexion, $sql);

    if( $_POST ){
        extract($_POST, EXTR_OVERWRITE);

        $dirSubida = "../fotos/$nombre/";

        $foto = $_FILES['foto'];
        
        $nombreFoto = $foto['name'];
        $nombreTmp = $foto['tmp_name'];
        $rutaSubida = "{$dirSubida}profile.jpg";
        $extArchivo = preg_replace('/image\//','',$foto['type']);

        if ($extArchivo == 'jpeg' || $extArchivo == 'png') {
            
            if(!file_exists($dirSubida)){
                mkdir ($dirSubida, 0777);
            }

            if ( move_uploaded_file($nombreTmp, $rutaSubida)){
                // echo"<img class='img-responsive' src='$rutaSubida' alt=''>";
                if($respuesta){
                    header('location:../index.php');
                } else{
                    echo "No se puede insertar";
                }
                return true;
            } else {
                return false;
            }
        } else {
            if($respuesta){
                header('location:../index.php');
            } else{
                echo "No se puede insertar";
            }
        }
    }
    // if ($respuesta){
    //     header('location:../index.php');
    // } else {
    //     echo "No se pudo actualizar";
    // }
?>