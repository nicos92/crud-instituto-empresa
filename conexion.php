<?php
session_start();
$conn = mysqli_connect(
    'localhost', // nombre servidor
    'root', // usuario
    '340480_Nss@Salomon', // contraseña
    'instituto_db'
); //base de datos
?>

<?php
if ($conn) {
    echo "Conexión realizada con éxito";
} else {
    echo "Error de conexión";
}



?>
