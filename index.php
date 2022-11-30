<?php 
    require_once'./header.php';
    require_once'./conexion.php';
    $conexion = conexion();

    $sql = "SELECT id_paises,nombre,continente FROM t_paises";
    $respuesta = mysqli_query($conexion, $sql);

?>
<div class="container">
    <div class="row mt-5">
        <div class="col">
         <h2>Lisa de Paises </h2>
            <div class="d-flex justify-content-end mb-3">
                <a  class="btn btn-info " href="./agregar.php">Agregar un Pais</a>    
            </div>
            
            <table class="table table-sm table-success table-striped align-middle">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Continente</th>
                        <th>Bandera</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody >
                    <?php while($ver = mysqli_fetch_array($respuesta)): ?>
                        <?php 
                            $ruta = $ver['nombre'];
                            $img = "fotos/$ruta/profile.jpg";
                         ?>
                        <tr>
                            <td><?php echo $ver['nombre']; ?></td>
                            <td><?php echo $ver['continente']; ?></td>
                            <td><?php echo"<img class='text-center' style='width: 42px; height: auto;' src='$img' alt=''>"; ?></td>
                            <td><a class="btn btn-warning" href="./actualizar.php?idpais=<?php echo $ver['id_paises'];?>">Editar</a></td>
                            <td><a class="btn btn-danger" href="./backend/eliminar.php?idpais=<?php echo $ver['id_paises'];?>">Eliminar</a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            
        </div>
    </div>
    <!-- <div class="row">
        <div class="col">
            <a class="btn btn-info " href="./agregar.php">Agregar un Pais</a>
        </div>
    </div> -->
</div>
<?php require_once'./footer.php'; ?>