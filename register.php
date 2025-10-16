<?php
include("conexion.php");

// Inicializar mensaje de error
$error = '';
$success = '';

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validar que los campos no estén vacíos
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Todos los campos son obligatorios';
    } elseif ($password !== $confirm_password) {
        $error = 'Las contraseñas no coinciden';
    } elseif (strlen($password) < 6) {
        $error = 'La contraseña debe tener al menos 6 caracteres';
    } else {
        // Verificar si el nombre de usuario o correo electrónico ya existen
        $stmt = $conn->prepare("SELECT id FROM usuarios WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error = 'El nombre de usuario o correo electrónico ya está registrado';
        } else {
            // Cifrar la contraseña
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insertar el nuevo usuario
            $stmt = $conn->prepare("INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            
            if ($stmt->execute()) {
                $success = 'Usuario registrado exitosamente';
            } else {
                $error = 'Error al registrar el usuario';
            }
        }
    }
}
?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body">
                <h3>Registro de Usuario</h3>
                
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $success ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" required><br>
                        <input type="email" name="email" class="form-control" placeholder="Correo electrónico" required><br>
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required><br>
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirmar contraseña" required><br>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success btn-block" name="register" value="Registrarse">
                    <a href="index.php" class="btn btn-secondary">Volver al inicio</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>