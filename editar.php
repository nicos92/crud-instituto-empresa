<?php
include("conexion.php");

if (!isset($_SESSION['logueado']) || $_SESSION['logueado'] !== true) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from vista_empleados where `Id Empleado`=$id";
    $resultado = mysqli_query($conn, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        $dni = $row['Dni'] ?? '';
        $nombre = $row['Nombre'] ?? '';
        $apellido = $row['Apellido'] ?? '';
        $direccion = $row['Dirección'] ?? '';
        $telefono = $row['Telefono'] ?? '';
        $departamento = $row['Departamento'] ?? '';
        $localidad = $row['Localidad'] ?? '';
        $provincia = $row['Provincia'] ?? '';
        $pais = $row['Pais'] ?? '';
    }
}


if (isset($_POST['actualizar'])) {

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
    $pais = $_POST['pais'] ?? '';


    $query = "UPDATE empleados SET dni=?, nombre=?, apellido=?, direccion=?, telefono=?, id_departamento=?, id_localidad=?, id_provincia=?, id_pais=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssiiiii", $dni, $nombre, $apellido, $direccion, $telefono, $departamento, $localidad, $provincia, $pais, $id);

    $resultado = $stmt->execute();

    if ($resultado) {
        $_SESSION['message'] = "El registro se actualizó correctamente";
    } else {
        $_SESSION['error'] = "Error al actualizar el registro";
    }

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
                    <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST" class="row g-3 needs-validation" novalidate>
                        <div class="form-group">
                            <div class="input-group m-1 col-md-4">
                                <label for="dni" class="form-label">DNI:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-vcard"></i></span>
                                    <input type="text" name="dni" id="dni" value="<?php echo $dni; ?>" class="form-control" placeholder="Actualizar DNI" required>
                                    <div class="valid-feedback">
                                        Se puede actualizar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="Actualizar nombre" required>
                                    <div class="valid-feedback">
                                        Se puede actualizar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                    <input type="text" name="apellido" id="apellido" value="<?php echo $apellido; ?>" class="form-control" placeholder="Actualizar apellido" required>
                                    <div class="valid-feedback">
                                        Se puede actualizar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <label for="direccion" class="form-label">Dirección:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-house"></i></span>
                                    <input type="text" name="direccion" id="direccion" value="<?php echo $direccion; ?>" class="form-control" placeholder="Actualizar dirección" required>
                                    <div class="valid-feedback">
                                        Se puede actualizar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone"></i></span>
                                    <input type="text" name="telefono" id="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="Actualizar teléfono" required>
                                    <div class="valid-feedback">
                                        Se puede actualizar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <?php
                                $departamento_actual = $departamento;
                                $pais_actual = $pais;
                                $provincia_actual = $provincia;
                                $localidad_actual = $localidad;
                                include("includes/departamentos.php");
                                ?>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <?php include("includes/paises.php"); ?>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <?php include("includes/provincias2.php"); ?>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <?php include("includes/localidades.php"); ?>
                            </div>
                        </div>

                            <div class="col-12">
                                <button class="btn btn-success" name="actualizar">
                                    Actualizar
                                </button>
                            <a href="inicio.php" class="btn btn-secondary float-end">Volver</a>
                            </div>
                    </form>
                </div>

                </col-md>

        </div>

    </div>
</div>


<?php include("includes/footer.php"); ?>
