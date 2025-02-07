<?php
session_start();

// Obtener el userId del query parameter
$userId = isset($_GET['userId']) ? $_GET['userId'] : null;

// Validar que exista el userId
if (!$userId) {
    echo "<script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Usuario no identificado',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = 'login.php';
        });
    </script>";
    exit;
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud</title>
    <link rel="icon" type="image/png" href=""> <!--Agrega un icono a la pestaña del navegador-->
    <link rel="stylesheet" href="../css/acuseAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light sticky-top navigation">
    <div class="container">
        <a href="../html/index.html">
            <img src="../resources/images/locker.png" alt="Lockers" class="img-fluid" style="max-height: 65px;">
        </a>
        <div class="iconos">
            <a href="https://www.ipn.mx/">
                <img src="../resources/images/logoipn.png" alt="Logo IPN" class="img-fluid" style="max-height: 65px;">
            </a>
            <a href="https://www.escom.ipn.mx/">
                <img src="../resources/images/logoescom.png" alt="Logo ESCOM" class="img-fluid" style="max-height: 65px;">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link fs-5" aria-current="page" href="../html/index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="../html/formulario.html">Solicitud</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-5" href="../html/acuse.html">Acuse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5" href="../html/admin.php">Admin</a>
                </li>
            </ul>
            <button onclick="cerrarSesion()" class="btn btn-danger">Logout</button>
        </div>
    </div>
</nav>
<!--Contenido-->
<!--Contenido-->

<h1>Bienvenido <?php echo $userId; ?></h1>
<div class="contenido">

    <ul>
        <li><p>Para que se respete la asignacion de tu </p></li>
        <li><p>En caso de no subir el comprobante de pago, tu casilllero sera asignado a otro alumno y deberas esperar a que se te asigne otro <strong>(solo si hay disponibilidad)</strong></p></li>
    </ul>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function cerrarSesion() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Deseas cerrar la sesión?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cerrar sesión',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '../controladores/cerrar_sesion.php';
            }
        });
    }


    </script>
</body>
</html>


