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
        <div class="carousel-indicators">
            <button
                type="button"
                data-bs-target="#myCarousel"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"></button>
            <button
                type="button"
                data-bs-target="#myCarousel"
                data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button
                type="button"
                data-bs-target="#myCarousel"
                data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100">
                <img src="./imgs/pexels-sydney-troxell-223521-718752.jpg" alt="" class="h-100 w-100">
                <div class="container h-100 d-flex align-items-center  bg-secondary-subtle">
                    <div class="carousel-caption text-start text-black shadow-lg p-3 bg-body-white rounded">
                        <h1>Alguna Frase.</h1>
                        <p class="opacity-75">
                            Alguna frase larga que represente algo.
                        </p>
                        <p>
                            <a class="btn btn-lg btn-primary d-none" href="#">Sign up today</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item  h-100">
                <img src="./imgs/pexels-mccutcheon-1174114.jpg" alt="" class="h-100 w-100">
                <div class="container h-100 d-flex align-items-center  bg-secondary-subtle">
                    <div class="carousel-caption text-center text-black  shadow-lg p-3 bg-body-white rounded">
                        <h1>Alguna Frase.</h1>
                        <p class="opacity-75">
                            Alguna frase larga que represente algo.
                        </p>
                        <p><a class="btn btn-lg btn-primary d-none" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item  h-100">
                <img src="./imgs/pexels-mccutcheon-1578293.jpg" alt="" class="h-100 w-100">
                <div class="container h-100 d-flex align-items-center  bg-secondary-subtle">
                    <div class="carousel-caption text-end text-black shadow-lg p-3 bg-white opacity-75 rounded">
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

        <div class="col">

            <div class="col">
                <h2 class="p-1 mt-2">Gestion de empleados</h2>
            </div>
            <!-- buscar empleado -->
            <div class="col-md-12">


                <!--Buscar tarea-->
                <div class="card card-body">
                    <h3>Buscar empleado</h3>
                    <form action="inicio.php" method="post">

                        <input type="text" name="dni" class="form-control" placeholder="Dni, Nombre o Apellido del empleado">

                        <br>
                        <input type="submit" class="btn btn-success btn-block " name="buscar-empleado" value="Buscar">
                        <input type="submit" class="btn btn-secondary btn-block " name="todos-empleados" value="Todos los empleados">
                    </form>
                </div>
                <br>

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
                    <form action="guardar.php" method="post">
                        <div class="form-group">
                            <input type="text" name="dni" class="form-control" placeholder="Ingresar DNI" autofocus><br>
                            <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre" autofocus><br>
                            <input type="text" name="apellido" class="form-control" placeholder="Ingresar Apellido" autofocus><br>
                            <input type="text" name="direccion" class="form-control" placeholder="Ingresar Dirección" autofocus><br>
                            <input type="text" name="telefono" class="form-control" placeholder="Ingresar Teléfono" autofocus><br>
                            <?php include("includes/departamentos.php"); ?>
                            <select name="localidad" class="form-control" required>
                                <option value="">Seleccionar Localidad</option>
                                <option value="alejandro Korn">Alejandro Korn</option>
                                <option value="Glew">Glew</option>
                                <option value="Longchamps">Longchamps</option>
                                <option value="San Vicente">San Vicente</option>
                                <option value="Doomselaar">Doomselaar</option>
                            </select><br>
                            <?php include("includes/provincias.php"); ?>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success btn-block float-start" name="guardar-empleado" value="Guardar empleado">
                    </form>

                </div>


                <script type="text/javascript">
                    function confirmar() {
                        return confirm('¿Quiere borrar el registro?');
                    }
                </script>


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
                            <th>Localidad</th>
                            <th>Provincia</th>
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
                                        <td>

                                            <a href="ver.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                                </svg>
                                            </a>
                                            <a href="editar.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </a>
                                            <a href="eliminar.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-danger" onclick="return confirmar()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </a>

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
                                        <td>


                                            <a href="ver.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-success">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                                                </svg>
                                            </a>
                                            <a href="editar.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                </svg>
                                            </a>
                                            <a href="eliminar.php?id=<?php echo $row['Id Empleado'] ?>" class="btn btn-danger" onclick="return confirmar()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                </svg>
                                            </a>

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
