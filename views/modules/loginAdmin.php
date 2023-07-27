<?php
session_start();
if ($_POST) {
    if (($_POST['usuario'] == "miguel") && ($_POST['contrasenia'] == "12345")) {
        $_SESSION['usuario'] = "ok";
        $_SESSION['nombreUsuario'] = "Miguel";
        header("Location: inicioAdmin");
    } else {
        $mensaje = "Error: Usuario y/o contraseña son incorrectos";
    }
}
?>
# Developed by MiguelAngel
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" type="image/x-icon" href="views/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./views/css/styles.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Inicio de sesión
                </div>
                <div class="card-body">

                    <?php if (isset($mensaje)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $mensaje; ?>
                        </div>
                    <?php } ?>

                    <form method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" name="usuario" placeholder="example@hotmail.com">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" class="form-control" name="contrasenia" placeholder="Escribe tu contraseña">
                        </div>
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary">Entrar al sistema</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>