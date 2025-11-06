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

                        <form action="login.php" method="POST" class="row g-3 needs-validation" novalidate>
                            <div class="form-group">
                                <div class="input-group m-1">
                                    <label for="username" class="form-label">Usuario:</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person"></i></span>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Nombre de usuario" required>
                                        <div class="valid-feedback">
                                            Usuario válido!
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group m-1">
                                    <label for="password" class="form-label">Contraseña:</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                                        <div class="valid-feedback">
                                            Contraseña válida!
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success btn-block" name="login">
                                <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                            </button>
                            <a href="register.php" class="btn btn-secondary"><i class="bi bi-person-plus"></i> Registrarse</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>
