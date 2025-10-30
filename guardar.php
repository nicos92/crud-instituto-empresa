<?php

include("conexion.php");

if(isset($_POST ['guardar-empleado'])){

    if(!empty($_POST['dni'])) {

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $departamento = $_POST['departamento'];
        $localidad = $_POST['localidad'];
        $provincia = $_POST['provincia'];

        $query = "insert into empleados (dni, nombre, apellido, direccion, telefono, id_departamento, localidad, provincia) values ('$dni', '$nombre', '$apellido', '$direccion', '$telefono', $departamento, '$localidad', '$provincia')";

        try {
            //code...
            $resultado = mysqli_query($conn, $query);

            if (!$resultado){
                die("Conexión fallida");
            }

            $_SESSION['message'] = 'Registro guardado con éxito';

        } catch (\Throwable $th) {
            $_SESSION['error'] = 'No se pudo realizar el Registro. DNI Duplicado.';
        }
        header ("Location: inicio.php");
    } else {
        $_SESSION['message'] = 'Completar todos los datos';

        header ("Location: inicio.php");
    }

}

?>


