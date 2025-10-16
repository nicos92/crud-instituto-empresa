<?php
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
$conn = mysqli_connect(
    'localhost', // nombre servidor
    'root', // usuario
    '340480_Nss@Salomon', // contraseña
    'instituto_db'
); //base de datos

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
