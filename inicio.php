<?php
include("conexion.php");
if (!isset($_SESSION['logueado'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include("includes/header.php"); ?>

<div class="content">
    <div id="myCarousel" class="carousel slide mb-6 vh-100" data-bs-ride="carousel">

        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100 position-relative">
                <img src="./imgs/pexels-sydney-troxell-223521-718752.jpg" alt="" class="h-100 w-100">
                <div class="container h-auto d-flex align-items-center  bg-secondary-subtle">
                    <div class="carousel-caption h-auto text-start text-black shadow-lg p-3 bg-white rounded position-absolute top-25 start-50 translate-middle" style="--bs-bg-opacity: .5;">
                        <h1>Alguna Frase.</h1>
                        <p>
                            Alguna frase larga que represente algo.
                        </p>

                    </div>
                </div>
            </div>
            <div class="carousel-item  h-100 position-relative">
                <img src="./imgs/pexels-mccutcheon-1174114.jpg" alt="" class="h-100 w-100">
                <div class="container h-100 d-flex align-items-center  bg-secondary-subtle">
                    <div class="carousel-caption text-center text-black  shadow-lg p-3 bg-body-white rounded position-absolute top-25 start-50 translate-middle">
                        <h1>Alguna Frase.</h1>
                        <p class="opacity-75">
                            Alguna frase larga que represente algo.
                        </p>
                        <p><a class="btn btn-lg btn-primary d-none" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item  h-100 position-relative">
                <img src="./imgs/pexels-mccutcheon-1578293.jpg" alt="" class="h-100 w-100">
                <div class="container h-100 d-flex align-items-center justify-content-center bg-secondary-subtle">
                    <div class="carousel-caption text-center text-black shadow-lg p-3 bg-white opacity-75 rounded position-absolute top-25 start-50 translate-middle">
                        <h1>Alguna Frase.</h1>
                        <p class="opacity-75">
                            Alguna frase larga que represente algo.
                        </p>
                        <p>
                            <a class="btn btn-lg btn-primary d-none" href="#">Browse gallery</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#myCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container p-4">
        <!--Mensaje de emple-->

        <?php

        if (isset($_SESSION['message'])) {

        ?>

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='inicio.php'"></button>
            </div>

        <?php
            unset($_SESSION['message']);
        }
        ?>

        <?php

        if (isset($_SESSION['error'])) {

        ?>

            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='inicio.php'"></button>
            </div>

        <?php
            unset($_SESSION['error']);
        }
        ?>

        <div class="col">

            <div class="col">
                <h2 class="p-1 mt-2">Gestion de empleados</h2>
            </div>
            <!-- buscar empleado -->
            <div class="col-md-12">


                <!--Buscar tarea-->
                <div class="card card-body">
                    <h3 class="mb-4">Buscar empleado</h3>
                    <form action="inicio.php" method="post" class="row g-3 needs-validation" novalidate>
                        <div class="input-group m-1 col-md-4">
                            <label for="dni" class="form-label">DNI, Nombre, Apellido:</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-vcard"></i></span>
                                <input type="text" id="buscar_empleado" name="dni" class="form-control" placeholder="Dni, Nombre o Apellido del empleado" required>
                                <div class="valid-feedback">
                                    Se puede buscar!
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-success btn-block " name="buscar-empleado">
                                    <i class="bi bi-search"></i> Buscar
                                </button>
                                <button type="submit" class="btn btn-secondary btn-block " name="todos-empleados">
                                    <i class="bi bi-people"></i> Todos los empleados
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

            <div class="col-md-12">


                <!--Mensaje de emple-->

                <?php

                if (isset($_SESSION['message'])) {

                ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='inicio.php'"></button>
                    </div>

                <?php
                    unset($_SESSION['message']);
                }
                ?>

                <?php

                if (isset($_SESSION['error'])) {

                ?>

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $_SESSION['error'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='inicio.php'"></button>
                    </div>

                <?php
                    unset($_SESSION['error']);
                }
                ?>


                <!--Guardar empleado-->
                <div class="card card-body">
                    <h3>Nuevo empleado</h3>
                    <form action="guardar.php" method="post" class="row g-3 needs-validation" novalidate>
                        <div class="form-group">
                            <div class="input-group m-1 col-md-4">
                                <label for="dni" class="form-label">DNI:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-vcard"></i></span>
                                    <input type="number" title="Debe tener 8 dígitos" name="dni" id="dni" class="form-control" placeholder="Ingresar DNI" required>
                                    <div class="valid-feedback">
                                        Se puede guardar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingresar Nombre" required>
                                    <div class="valid-feedback">
                                        Se puede guardar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Ingresar Apellido" required>
                                    <div class="valid-feedback">
                                        Se puede guardar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <label for="direccion" class="form-label">Dirección:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-house"></i></span>
                                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingresar Dirección" required>
                                    <div class="valid-feedback">
                                        Se puede guardar!
                                    </div>
                                </div>
                            </div>
                            <div class="input-group m-1 col-md-4">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-telephone"></i></span>
                                    <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Ingresar Teléfono" required>
                                    <div class="valid-feedback">
                                        Se puede guardar!
                                    </div>
                                </div>
                            </div>
                            <?php include("includes/departamentos.php"); ?>
                            <?php include("includes/paises.php"); ?>
                            <?php include("includes/provincias2.php"); ?>
                            <?php include("includes/localidades.php"); ?>


                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success btn-block float-start" name="guardar-empleado">
                                <i class="bi bi-save"></i> Guardar empleado
                            </button>
                        </div>
                    </form>

                </div>





                <!--Tabla-->
                <h3 id="tabla-empleados" class="p-2 mt-2">Empleados registrados</h3>
                <table class="table table-responsive table-bordered">

                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Departamento</th>
                            <th>Pais</th>
                            <th>Provincia</th>
                            <th>Localidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>


                        <?php


                        if (isset($_POST['buscar-empleado'])) {

                            $dni = $_POST['dni'];
                            $dni = mysqli_real_escape_string($conn, $dni);
                            $stmt = $conn->prepare("CALL BuscarEmpleadosPorDNI_nombre_apellido(?)");
                            $stmt->bind_param("s", $dni);
                            $stmt->execute();
                            $resultado = $stmt->get_result();

                            if ($resultado->num_rows > 0) {
                                while ($row = mysqli_fetch_array($resultado)) { ?>
                                    <tr>
                                        <td> <?php echo $row['Dni']; ?></td>
                                        <td> <?php echo $row['Nombre']; ?></td>
                                        <td> <?php echo $row['Apellido']; ?></td>
                                        <td> <?php echo $row['Dirección']; ?></td>
                                        <td> <?php echo $row['Telefono']; ?></td>
                                        <td> <?php echo $row['Departamento']; ?></td>
                                        <td> <?php echo $row['Localidad']; ?></td>
                                        <td> <?php echo $row['Provincia']; ?> </td>
                                        <td> <?php echo $row['Pais']; ?> </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="ver.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-success btn-sm">
                                                    <i class="bi bi-eye"></i> Ver
                                                </a>
                                                <a href="editar.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-secondary btn-sm">
                                                    <i class="bi bi-pencil"></i> Editar
                                                </a>
                                                <a class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#eliminarModal<?php echo $row['Id Empleado']; ?>">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </a>
                                            </div>

                                            <!-- Modal para eliminar empleado -->
                                            <div class="modal fade"
                                                id="eliminarModal<?php echo $row['Id Empleado']; ?>"
                                                tabindex="-1"
                                                aria-labelledby="eliminarModalLabel<?php echo $row['Id Empleado']; ?>"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarModalLabel<?php echo $row['Id Empleado']; ?>">Confirmar eliminación</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Está seguro que desea eliminar al empleado <strong><?php echo htmlspecialchars($row['Nombre'] . ' ' . $row['Apellido']); ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Cancelar</button>
                                                            <a href="eliminar.php?id=<?php echo $row['Id Empleado']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="8" class="text-center">No se encontraron empleados</td>
                                </tr>
                            <?php }
                            $stmt->close();
                        } else { ?>


                            <?php

                            $query = "SELECT * FROM vista_empleados";
                            $resultado = mysqli_query($conn, $query);

                            if (mysqli_num_rows($resultado) > 0) {
                                while ($row = mysqli_fetch_array($resultado)) { ?>
                                    <tr>
                                        <td> <?php echo $row['Dni']; ?></td>
                                        <td> <?php echo $row['Nombre']; ?></td>
                                        <td> <?php echo $row['Apellido']; ?></td>
                                        <td> <?php echo $row['Dirección']; ?></td>
                                        <td> <?php echo $row['Telefono']; ?></td>
                                        <td> <?php echo $row['Departamento']; ?></td>
                                        <td> <?php echo $row['Localidad']; ?></td>
                                        <td> <?php echo $row['Provincia']; ?></td>
                                        <td> <?php echo $row['Pais']; ?> </td>

                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="ver.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-success btn-sm m-1">
                                                    <i class="bi bi-eye"></i> Ver
                                                </a>
                                                <a href="editar.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-secondary btn-sm m-1">
                                                    <i class="bi bi-pencil"></i> Editar
                                                </a>
                                                <a class="btn btn-danger btn-sm m-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#eliminarModal<?php echo $row['Id Empleado']; ?>">
                                                    <i class="bi bi-trash"></i> Eliminar
                                                </a>
                                            </div>

                                            <!-- Modal para eliminar empleado -->
                                            <div class="modal fade"
                                                id="eliminarModal<?php echo $row['Id Empleado']; ?>"
                                                tabindex="-1"
                                                aria-labelledby="eliminarModalLabel<?php echo $row['Id Empleado']; ?>"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="eliminarModalLabel<?php echo $row['Id Empleado']; ?>">Confirmar eliminación</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ¿Está seguro que desea eliminar al empleado <strong><?php echo htmlspecialchars($row['Nombre'] . ' ' . $row['Apellido']); ?></strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Cancelar</button>
                                                            <a href="eliminar.php?id=<?php echo $row['Id Empleado']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="8" class="text-center">No hay empleados registrados</td>
                                </tr>
                        <?php }
                        } ?>

                    </tbody>
                </table>


            </div>

        </div>

    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>



<?php include("includes/footer.php"); ?>
