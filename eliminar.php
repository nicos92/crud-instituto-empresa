
<?php 
include("conexion.php");
if (!isset($_SESSION['logueado'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "delete from empleados where id=$id";
    $resultado = mysqli_query($conn, $query);

    if (!$resultado) {
        die("Conexión fallida");
    }

    $_SESSION['message'] = 'Registro eliminado correctamente';

    header("location: inicio.php");
}

?>
