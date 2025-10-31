<?php
include("conexion.php");

if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from empleados where id=$id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $dni = $row['dni'] ?? '';
        $nombre = $row['nombre'] ?? '';
        $apellido = $row['apellido'] ?? '';
        $direccion = $row['direccion'] ?? '';
        $telefono = $row['telefono'] ?? '';
        $departamento = $row['id_departamento'] ?? '';
        $localidad = $row['localidad'] ?? '';
        $provincia = $row['provincia'] ?? '';
    }
}


if (isset($_POST['actualizar'])) {
    // Check if user is logged in before processing the update
    if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] !== true) {
        header("Location: login.php");
        exit();
    }

    $id = $_GET['id'] ?? '';
    $dni =  $_POST['dni'] ?? '';
    $nombre =  $_POST['nombre'] ?? '';
    $apellido =  $_POST['apellido'] ?? '';
    $direccion =  $_POST['direccion'] ?? '';
    $telefono =  $_POST['telefono'] ?? '';
    $departamento =  $_POST['departamento'] ?? '';
    $localidad =  $_POST['localidad'] ?? '';
    $provincia =  $_POST['provincia'] ?? '';


    $query = "update empleados set dni='$dni', nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', id_departamento=$departamento, id_localidad='$localidad', id_provincia = '$provincia' where id=$id";

    mysqli_query($conn, $query);

    $_SESSION['message'] = "El registro se actualizó correctamente";

    header("location: inicio.php");
}
function seleccionar($actual, $cia)
{
    return $actual == $cia ? " Selected " : "";
}
?>


<?php include("includes/header.php"); ?>

<div class="content">
    <div class="container p-4 mt-5">

        <div class="row">

            <col-md4 mx-auto>

                <div class="card card-body ">
                    <h3>Editar empleado</h3>
                    <!--Actualizar con método POST-->
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="dni" value="<?php echo $dni; ?>" class="form-control" placeholder="Actualizar DNI" required><br>
                            <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre" required><br>
                            <input type="text" name="apellido" value="<?php echo $apellido; ?>" class="form-control" placeholder="Actualizar apellido" required><br>
                            <input type="text" name="direccion" value="<?php echo $direccion; ?>" class="form-control" placeholder="Actualizar dirección" required><br>
                            <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Actualizar teléfono" required><br>
                            <?php

                            $departamento_actual = $departamento;
                            $provincia_actual = $provincia;
                            $localidad_actual = $localidad;
                            include("includes/departamentos.php");
                            ?>
                            <?php include("includes/provincias2.php"); ?>
                            <?php include("includes/localidades.php"); ?>


                        </div>

                        <br>
                        <a href="inicio.php" class="btn btn-secondary ">Volver</a>
                        <button class="btn btn-success float-end" name="actualizar">
                            Actualizar
                        </button>
                    </form>
                </div>

                </col-md>

        </div>

    </div>
</div>


<?php include("includes/footer.php"); ?>
