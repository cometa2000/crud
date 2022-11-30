<?php 
    require_once'./header.php'; 
    require_once'./conexion.php';
    $conexion = conexion();
    $id = $_GET['idpais'];
    $sql = "SELECT * FROM t_paises WHERE id_paises = '$id'";
    $respuesta = mysqli_query($conexion, $sql);

    $item = mysqli_fetch_array($respuesta);
?>
<div class="container">
    <div class="row mt-5">
        <h1>Editor de Pais</h1>
        <div class="col">
            <div class="d-flex justify-content-end mb-3">
                <a  class="btn btn-info " href="./index.php">Inicio</a>    
            </div>
            <table class="table table-sm table-success table-striped align-middle">
                <form action="./backend/actualizar.php" enctype="multipart/form-data" method="POST" role="form">
                    <thead>
                        <tr>
                            <th><label for="nombre">Nombre</label></th>
                            <th><label for="continente">Continente</label></th>
                            <th><label for="foto">Bandera</label></th>
                            <th>Actualizar</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                        <?php 

                            $ruta = $item['nombre'];
                            $img = "fotos/$ruta/profile.jpg";
                         ?>
                            <input type="text" name="id" value="<?php echo $id; ?>" hidden>
                            <td><input class="form-control" value="<?php echo $item['nombre'] ?>" id="nombre" name="nombre" type="text" placeholder="Nombre del pais...."></td>
                            <td><select name="continente">
                                <option value="<?php echo $item['continente'] ?>"><?php echo $item['continente'] ?></option>
                                <option value="America">America</option>
                                <option value="Africa" >Africa</option>
                                <option value="Asia">Asia</option>
                                <option value="Europa">Europa</option>
                                <option value="Oceania">Oceania</option>
                            </select></td>
                            <td><input class="form-control" id="foto" name="foto" type="file"></td>
                            <td><button class="btn-danger">Actualizar</button></td>
                        </tr>
                    </tbody>
                </form>
            </table>
            
        </div>
    </div>
    <?php ?>
    <div class="row mt-4">
        <div class="col d-flex justify-content-center">
            <div class="card d-flex justify-content-center" style="width: 18rem;">
                <?php echo"<img class='text-center' style='width: auto; height: auto;' src='$img' alt=''>"; ?>
                <div class="card-body d-flex justify-content-center">
                    <h5 class="card-title">Bandera Actual</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once'./footer.php'; ?>