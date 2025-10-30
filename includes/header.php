<?php

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrapt-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        html,
        body {
            height: 100%;
        }

        .navbar {
            background: linear-gradient(135deg, #2c3e50, #3498db) !important;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.375rem;
        }

        .empresa-logo {
            height: 40px;
            margin-right: 10px;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        .imgLogo {
            width: 64px;
        }
    </style>

    <title>Kiosco Max</title>
</head>

<body class="py-5">
    <div class="wrapper">
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
                <a href="<?php echo isset($_SESSION['logueado']) ? 'inicio.php' : 'login.php'; ?>" class="navbar-brand d-flex align-items-center">
                    <img src="./imgs/kiosko.png" alt="logo de kisco" class="imgLogo">
                    Kiosco Max
                </a>

                <div class="d-flex">
                    <?php if (isset($_SESSION['logueado'])): ?>
                        <span class="text-white me-3">Bienvenido, <?php echo $_SESSION['username']; ?></span>
                        <a href="cerrar_sesion.php" class="btn btn-outline-light">Cerrar Sesión</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
