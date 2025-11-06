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
        $pais = $_POST['pais'];

        $query = "INSERT INTO empleados (dni, nombre, apellido, direccion, telefono, id_departamento, id_localidad, id_provincia, id_pais) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssssiiiii", $dni, $nombre, $apellido, $direccion, $telefono, $departamento, $localidad, $provincia, $pais);

        try {
            $resultado = $stmt->execute();

            if (!$resultado){
                die("Error al guardar el registro");
            }

            $_SESSION['message'] = 'Registro guardado con éxito';

        } catch (Exception $e) {
            $_SESSION['error'] = 'No se pudo realizar el Registro. DNI Duplicado o error en los datos. Error: ' . $e->getMessage();
        }
        header ("Location: inicio.php");
    } else {
        $_SESSION['error'] = 'Completar todos los datos';

        header ("Location: inicio.php");
    }

}

?>


