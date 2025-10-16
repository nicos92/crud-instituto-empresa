<?php
include("conexion.php");
if (!isset($_SESSION['logueado'])) {
    header("Location: login.php");
    exit();
}
?>

<?php include("includes/header.php"); ?>

    <div class="content">
        <div class="container p-4">

            <div class="col">

            <!-- buscar empleado -->
                <div class="col-md-12">


                    <!--Buscar tarea-->
                    <div class="card card-body">
                        <h3>Buscar empleado</h3>
                        <form action="inicio.php" method="post">

                            <input type="text" name="dni" class="form-control" placeholder="Dato del empleado">

                            <br>
                            <input type="submit" class="btn btn-success btn-block " name="buscar-empleado" value="Buscar">
                            <input type="submit" class="btn btn-secondary btn-block " name="todos-empleados" value="Todos los empleados">
                        </form>
                    </div>
                    <br>

                </div>

                <div class="col-md-12">


                    <!--Mensaje de tarea-->

                    <?php

                    if (isset($_SESSION['message'])) { ?>

                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?= $_SESSION['message'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="location.href='inicio.php'"></button>
                        </div>

                    <?php session_unset();
                    } ?>


                    <!--Guardar tarea-->
                    <div class="card card-body">
                        <h3>Nuevo empleado</h3>
                        <form action="guardar.php" method="post">
                            <div class="form-group">
                                <input type="text" name="dni" class="form-control" placeholder="Ingresar DNI" autofocus><br>
                                <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre" autofocus><br>
                                <input type="text" name="apellido" class="form-control" placeholder="Ingresar Apellido" autofocus><br>
                                <input type="text" name="direccion" class="form-control" placeholder="Ingresar Dirección" autofocus><br>
                                <input type="text" name="telefono" class="form-control" placeholder="Ingresar Teléfono" autofocus><br>
                                <select name="departamento" class="form-control" required>
                                    <option value="">Seleccionar Departamento</option>
                                    <option value="Ventas">Ventas</option>
                                    <option value="Producción">Producción</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Administración">Administración</option>
                                    <option value="Gerencial">Gerencial</option>
                                </select><br>
                                <select name="localidad" class="form-control" required>
                                    <option value="">Seleccionar Localidad</option>
                                    <option value="Buenos Aires">Buenos Aires</option>
                                    <option value="Córdoba">Córdoba</option>
                                    <option value="Rosario">Rosario</option>
                                    <option value="Mendoza">Mendoza</option>
                                    <option value="La Plata">La Plata</option>
                                </select><br>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success btn-block float-end " name="guardar-empleado" value="Guardar empleado">
                        </form>

                    </div>


                    <script type="text/javascript">
                        function confirmar() {
                            return confirm('¿Quiere borrar el registro?');
                        }
                    </script>


                    <!--Tabla-->
                    <h3>Empleados registrados</h3>
                    <table class="table table-responsive table-bordered">

                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Departamento</th>
                                <th>Localidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <!--Consulta con el select de todos los datos en tbody-->

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
                                            <td> <?php echo $row['dni']; ?></td>
                                            <td> <?php echo $row['nombre']; ?></td>
                                            <td> <?php echo $row['apellido']; ?></td>
                                            <td> <?php echo $row['direccion']; ?></td>
                                            <td> <?php echo $row['telefono']; ?></td>
                                            <td> <?php echo $row['departamento']; ?></td>
                                            <td> <?php echo $row['localidad']; ?></td>
                                            <td>

                                                <a href="ver.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Ver</a>
                                                <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">Editar</a>
                                                <a href="eliminar.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a>

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

                                $query = "SELECT * FROM empleados";
                                $resultado = mysqli_query($conn, $query);

                                if (mysqli_num_rows($resultado) > 0) {
                                    while ($row = mysqli_fetch_array($resultado)) { ?>
                                        <tr>
                                            <td> <?php echo $row['dni']; ?></td>
                                            <td> <?php echo $row['nombre']; ?></td>
                                            <td> <?php echo $row['apellido']; ?></td>
                                            <td> <?php echo $row['direccion']; ?></td>
                                            <td> <?php echo $row['telefono']; ?></td>
                                            <td> <?php echo $row['departamento']; ?></td>
                                            <td> <?php echo $row['localidad']; ?></td>
                                            <td>


                                                <a href="ver.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Ver</a>
                                                <a href="editar.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">Editar</a>
                                                <?php echo "<a href='eliminar.php?id=" . $row['id'] . "' onclick='return confirmar()' class='btn btn-danger'>Eliminar</a>" ?>

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

<?php include("includes/footer.php"); ?>
