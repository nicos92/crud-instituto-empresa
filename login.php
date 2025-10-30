<?php
include("conexion.php");

// Si el usuario ya está logueado, redirigir al inicio
if (isset($_SESSION['logueado'])) {
    header("Location: inicio.php");
    exit();
}

$error = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {

            $_SESSION['logueado'] = true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("Location: inicio.php");
            exit();
        } else {
            $error = 'Contraseña incorrecta';
        }
    } else {
        $error = 'Usuario no encontrado';
    }
}
?>

<?php include("includes/header.php"); ?>

    <div class="content p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto mt-5">
                    <div class="card card-body">
                        <h3>Iniciar Sesión</h3>

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $error ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Nombre de usuario" required><br>
                                <input type="password" name="password" class="form-control" placeholder="Contraseña" required><br>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success btn-block" name="login" value="Iniciar Sesión">
                            <a href="register.php" class="btn btn-secondary">Registrarse</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>
