<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uso de Lockers - ESCOM</title>
    <link rel="icon" type="image/png" href="../resources/iconos/admin.svg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/index.css" rel="stylesheet">
</head>
<body>
    <!-- Encabezado con logos -->
    <header class="header-bg py-1" id="header">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <img src="../resources/images/logoipn.png" alt="Logo IPN" class="img-fluid" style="max-height: 70px;">
                </div>
                <div class="col-md-4">
                    <h1 class="mt-3 fs-2">Uso de Lockers</h1>
                </div>
                <div class="col-md-4">
                    <img src="../resources/images/logoescom.png" alt="Logo ESCOM" class="img-fluid" style="max-height: 70px;">
                </div>
            </div>
        </div>
    </header>

    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top navigation">
        <div class="container">
            <a href="index.html">
                <img src="../resources/images/locker.png" alt="Lockers" class="img-fluid" style="max-height: 65px;">
            </a>
            <div class="iconos">
                <img src="../resources/images/logoipn.png" alt="Logo IPN" class="img-fluid" style="max-height: 70px;">
                <img src="../resources/images/logoescom.png" alt="Logo ESCOM" class="img-fluid" style="max-height: 70px;">
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="./formulario.html">Solicitud</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" href="acuse.html">Acuse</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link active fs-5" href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container content d-flex justify-content-center align-items-center mt-5 mb-4">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box-admin">
                <div class="mb-3">
                    <img src="../resources/iconos/iconoadmin.png" class="img-fluid mt-2" alt="icono admin">
                </div>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <p class="fs-5 fw-bold text-center">Iniciar sesión como administrador</p>
                    <form id="admin" method="post" action="loginAdmin.php">
                        <div class="mb-3">
                          <label for="usuarioAdmin" class="form-label">Usuario</label>
                          <input type="text" class="form-control" id="usuarioAdmin" name="usuarioAdmin">
                        </div>
                        <div class="mb-3">
                          <label for="contraseñaAdmin" class="form-label">Contraseña</label>
                          <input type="password" class="form-control" id="contraseñaAdmin" name="contraseñaAdmin">
                        </div>
                        <div class="mb-3 mt-5">
                            <button type="submit" class="btn btn-primary w-100">Enviar</button>
                        </div>
                    </form>
                </div>
                <?php
                    if (isset($_SESSION['error'])) {
                        echo "<p style='color: red;'>" . $_SESSION['error'] . "</p>";
                        unset($_SESSION['error']); 
                    }
                ?>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="footer-p text-dark text-center py-3 mt-3">
        <div class="container text-center">
            <div class="row text-center text-md-left">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4">Equipo 5</h5>
                    <p>Sánchez Santos Irma Nayeli</p>
                    <p>Arzubide García Gael Alejandro</p>
                    <p>Peñarrieta Villa Jesús</p>
                    <p>Arenas Garita Misael</p>
                </div>
                <div class="col-md-4 col-lg-2 col-xl-2 mx mx-auto mt-3">
                    <h5 class="text-uppercase mb-4">Contacto</h5>
                    <p>irmanayelisanchezsantos@gmail.com</p>
                    <p>arzubide.ga@gmail.com</p>
                    <p>jesuspenarrieta03@gmail.com</p>
                    <p>misaelarenas854@gmail.com</p>
                </div>
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4">Ubicación</h5>
                    <p>
                        Escuela Superior de Cómputo Av. Juan de Dios Bátiz s/n esq. Av. Miguel Othón de Mendizabal. Colonia Lindavista. 
                        Alcaldia: Gustavo A. Madero. C. P. 07738. Ciudad de México.
                    </p>
                </div>
            </div>

        </div>
        <p class="pt-4 fw-bold">
            Tecnologías para el Desarrollo de Aplicaciones Web 2025-1
        </p>
    </footer>

    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    <script type="text/javascript" src="../js/adminValidation.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
