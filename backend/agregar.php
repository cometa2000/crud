<?php 
    require_once'../conexion.php';
    $conexion = conexion();
    $nombre = $_POST['nombre'];
    $continente = $_POST['continente'];
    $sql = "INSERT INTO t_paises (nombre,continente) VALUES ('$nombre','$continente')";
    $respuesta = mysqli_query($conexion,$sql);

    if( $_POST ){
        extract($_POST, EXTR_OVERWRITE);

        if( !file_exists("fotos")){
            mkdir ("fotos", 0777);
        }
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
            trigger_error('No es un archivo de imagen válido',E_USER_WARNING);
        }
    }
?>