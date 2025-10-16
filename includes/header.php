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
    </style>

    <title>PHP MYSQL CRUD INSTITUTO</title>
</head>

<body>
    <div class="wrapper">
        <nav class="navbar navbar-dark">
            <div class="container">
                <a href="<?php echo isset($_SESSION['logueado']) ? 'inicio.php' : 'login.php'; ?>" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-house-fill me-2" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
                    </svg>
                    Sistema de Gestión de Empleados - Empresa
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
