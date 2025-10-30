<?php
include("conexion.php");
if (!isset($_SESSION['logueado'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM vista_empleados WHERE `Id Empleado` = $id";
    echo $query;
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $dni = $row['Dni'];
        $nombre = $row['Nombre'];
        $apellido = $row['Apellido'];
        $direccion = $row['Dirección'];
        $telefono = $row['Telefono'];
        $departamento = $row['Departamento'];
        $localidad = $row['Localidad'];
        $provincia = $row['Provincia'];
    }
}



?>

<?php include("includes/header.php"); ?>

    <div class="content">
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
                            <label><strong>Provincia:</strong></label>
                            <input type="text" value="<?php echo $provincia; ?>" class="form-control" readonly><br>
                        </div>

                        <br>
                        <a href="inicio.php" type="button" class="btn btn-success col-md-2">Volver</a>
                    </div>

                    </col-md>

            </div>

        </div>
    </div>


<?php include("includes/footer.php"); ?>
