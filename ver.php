<?php
include("conexion.php");
if (!isset($_SESSION['logueado'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM vista_empleados WHERE `Id Empleado` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();

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
        $pais = $row['Pais'];
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
                        <div class="input-group m-1 col-md-4">
                            <label for="dni" class="form-label">DNI:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-vcard"></i></span>
                                <input type="text" value="<?php echo $dni; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="input-group m-1 col-md-4">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                <input type="text" value="<?php echo $nombre; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="input-group m-1 col-md-4">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                <input type="text" value="<?php echo $apellido; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="input-group m-1 col-md-4">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-house"></i></span>
                                <input type="text" value="<?php echo $direccion; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="input-group m-1 col-md-4">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone"></i></span>
                                <input type="text" value="<?php echo $telefono; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="input-group m-1 col-md-4">
                            <label for="departamento" class="form-label">Departamento:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-building"></i></span>
                                <input type="text" value="<?php echo $departamento; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="input-group m-1 col-md-4">
                            <label for="pais" class="form-label">País:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-globe"></i></span>
                                <input type="text" value="<?php echo $pais; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="input-group m-1 col-md-4">
                            <label for="provincia" class="form-label">Provincia:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-signpost"></i></span>
                                <input type="text" value="<?php echo $provincia; ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="input-group m-1 col-md-4">
                            <label for="localidad" class="form-label">Localidad:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-geo-alt"></i></span>
                                <input type="text" value="<?php echo $localidad; ?>" class="form-control" readonly>
                            </div>
                        </div>
                    </div>

                        <br>
                        <a href="inicio.php" type="button" class="btn btn-success col-md-2"><i class="bi bi-arrow-return-left"></i> Volver</a>
                    </div>

                    </col-md>

                </div>

        </div>
    </div>


    <?php include("includes/footer.php"); ?>
