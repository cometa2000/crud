<?php 
    require_once'./header.php'; 
?>
<div class="container">
    <div class="row mt-5">
        <h1>Agrega un Pais</h1>
        <div class="col">
            <div class="d-flex justify-content-end mb-3">
                <a  class="btn btn-info " href="./index.php">Inicio</a>    
            </div>
            <table class="table table-sm table-success table-striped align-middle">
                <form action="./backend/agregar.php" enctype="multipart/form-data" method="POST" role="form">
                    <thead>
                        <tr>
                            <th><label for="nombre">Nombre</label></th>
                            <th><label for="continente">Continente</label></th>
                            <th><label for="foto">Imagen</label></th>
                            <th>AGREGAR</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <tr>
                            <td><input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre del pais...."></td>
                            <td><select name="continente">
                                <option value="America">America</option>
                                <option value="Africa" selected>Africa</option>
                                <option value="Asia">Asia</option>
                                <option value="Europa">Europa</option>
                                <option value="Oceania">Oceania</option>
                            </select></td>
                            <td><input class="form-control" id="foto" name="foto" type="file"></td>
                            <td><button class="btn-danger">Registrar</button></td>
                        </tr>
                    </tbody>
                </form>
            </table>
            
        </div>
    </div>
</div>
<?php require_once'./footer.php'; ?>