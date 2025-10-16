
<?php

include("conexion.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "delete from empleados where id=$id";
    $resultado = mysqli_query($conn, $query);

    if (!$resultado) {
        die("Conexión fallida");
    }

    $_SESSION['message'] = 'Registro eliminado correctamente';

    header("location: index.php");
}

?>
