<?php
require_once "php/config.php";
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: loginAdmin");
} else {
    if ($_SESSION['usuario'] == "ok") {
        $nombreUsuario = $_SESSION["nombreUsuario"];
    }
}
?>
# Developed by MiguelAngel
<!doctype html>
<html lang="en">

<head>
    <title>Administrador</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="views/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/styles.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-success bg-opacity-75">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="inicioAdmin">
                <img src="views/img/logo.png" class="img-fluid" style="max-height: 50px;" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav custom-nav-spacing">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="inicioAdmin">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="productosAdmin">Libros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="cerrarSesion">Cerrar sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="<?php echo SERVER_URL; ?>" target="_blank">Ver sitio web</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <br>
        <div class="row">