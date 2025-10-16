

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


if (isset($_POST['actualizar'])) {
    $id = $_GET['id'];
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $departamento = $_POST['departamento'];
    $localidad = $_POST['localidad'];


    $query = "update empleados set dni='$dni', nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', departamento='$departamento', localidad='$localidad' where id=$id";

    mysqli_query($conn, $query);

    $_SESSION['message'] = "El registro se actualizó correctamente";

    header("location: index.php");
}

?>

<?php include("includes/header.php"); ?>

<div class="container p-4">

    <div class="row">

        <col-md4 mx-auto>

            <div class="card card-body ">
                <h3>Editar empleado</h3>
                <!--Actualizar con método POST-->
                <form action="editar.php? id=<?php echo $_GET['id']; ?>" method="POST">
                    <form-group>
                        <input type="text" name="dni" value="<?php echo $dni; ?>" class="form-control" placeholder="Actualizar DNI"><br>
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre"><br>
                        <input type="text" name="apellido" value="<?php echo $apellido; ?>" class="form-control" placeholder="Actualizar apellido"><br>
                        <input type="text" name="direccion" value="<?php echo $direccion; ?>" class="form-control" placeholder="Actualizar dirección"><br>
                        <input type="text" name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Actualizar teléfono"><br>
                        <select name="departamento" class="form-control">
                            <option value="<?php echo $departamento; ?>"><?php echo $departamento; ?></option>
                            <option value="">Seleccionar Departamento</option>
                            <option value="Ventas">Ventas</option>
                            <option value="Producción">Producción</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Administración">Administración</option>
                            <option value="Gerencial">Gerencial</option>
                        </select><br>
                        <select name="localidad" class="form-control">
                            <option value="<?php echo $localidad; ?>"><?php echo $localidad; ?></option>
                            <option value="">Seleccionar Localidad</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Córdoba">Córdoba</option>
                            <option value="Rosario">Rosario</option>
                            <option value="Mendoza">Mendoza</option>
                            <option value="La Plata">La Plata</option>
                        </select><br>

                        <br>
                        <button class="btn btn-success" name="actualizar">
                            Actualizar
                        </button>
                        <a href="index.php" class="btn btn-secondary">Volver</a>
                </form>
            </div>

            </col-md>

    </div>

</div>


<?php include("includes/footer.php"); ?>
