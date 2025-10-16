<?php

include("conexion.php");

include("includes/header.php");

if(isset($_POST ['guardar-empleado'])){
    
    if(!empty($_POST['dni'])) {

        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $departamento = $_POST['departamento'];
        $localidad = $_POST['localidad'];
    
        $query = "insert into empleados (dni, nombre, apellido, direccion, telefono, departamento, localidad) values ('$dni', '$nombre', '$apellido', '$direccion', '$telefono', '$departamento', '$localidad')";
    
        $resultado = mysqli_query($conn, $query);
    
        if (!$resultado){
            die("Conexión fallida");
        }
    
        $_SESSION['message'] = 'Registro guardado con éxito';
    
        header ("Location: inicio.php");
    } else {
        $_SESSION['message'] = 'Completar todos los datos';
    
        header ("Location: inicio.php");
    }
    
}

?>


