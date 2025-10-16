<?php

include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from empleados where id=$id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $dni = $row['dni'];
        $nombre = $row['nombre'];
        $apellido = $row['apellido'];
        $direccion = $row['direccion'];
        $telefono = $row['telefono'];
        $departamento = $row['departamento'];
        $localidad = $row['localidad'];
    }
}



?>

<?php include("includes/header.php"); ?>

<div class="container p-4">

    <div class="row">

        <col-md4 mx-auto>

            <div class="card card-body ">
                <h3>Ver empleado</h3>
                <!--Mostrar datos del empleado-->
                <div class="form-group">
                    <label><strong>DNI:</strong></label>
                    <input type="text" value="<?php echo $dni; ?>" class="form-control" readonly><br>

                    <label><strong>Nombre:</strong></label>
                    <input type="text" value="<?php echo $nombre; ?>" class="form-control" readonly><br>

                    <label><strong>Apellido:</strong></label>
                    <input type="text" value="<?php echo $apellido; ?>" class="form-control" readonly><br>

                    <label><strong>Dirección:</strong></label>
                    <input type="text" value="<?php echo $direccion; ?>" class="form-control" readonly><br>

                    <label><strong>Teléfono:</strong></label>
                    <input type="text" value="<?php echo $telefono; ?>" class="form-control" readonly><br>

                    <label><strong>Departamento:</strong></label>
                    <input type="text" value="<?php echo $departamento; ?>" class="form-control" readonly><br>

                    <label><strong>Localidad:</strong></label>
                    <input type="text" value="<?php echo $localidad; ?>" class="form-control" readonly><br>
                </div>

                <br>
                <a href="index.php" type="button" class="btn btn-success col-md-2">Volver</a>
            </div>

            </col-md>

    </div>

</div>


<?php include("includes/footer.php"); ?>
