<?php
    session_start(); 

    if(!isset($_SESSION['username'])){
        header("Location: acuse.php"); 
        exit(); 
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
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="../html/index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  fs-5" href="../html/formulario.html">Solicitud</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-5" href="../html/acuse.html">Acuse</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link  fs-5" href="../html/admin.php">Admin</a>
                    </li>
                </ul>
            </div>
    </div>
</nav>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        const acuerdoRadio = document.getElementById("acuerdo");
        const fileInput = document.getElementById("inputGroupFile02");
        const submitButton = document.getElementById("enviar");



        // Inicialmente deshabilitar el botón
        submitButton.disabled = true;

        function validateInputs() {
            const isAgreementAccepted = acuerdoRadio.checked;
            const isFileUploaded = fileInput.files.length > 0 && fileInput.files[0].type === "application/pdf";

            // Habilitar el botón si ambas condiciones se cumplen
            submitButton.disabled = !(isAgreementAccepted && isFileUploaded);
        }

        // Escuchar cambios en el radio button y en el input de archivo
        acuerdoRadio.addEventListener("change", validateInputs);
        fileInput.addEventListener("change", validateInputs);
    });
</script>

<!--Contenido-->

<div class="contenido">
    <h2>ACUERDO DE RESPONSABILIDADES EN EL USO DEL CASILLERO 2025.</h2>
    <p>Se autoriza que utilices el casillero señalado durante el ciclo escolar <strong><u>febrero 2025 - agosto 2025</u></strong>,
        dentro dela Campaña de Procuración de Fondos.<br><br>
        La utilización de este servicio deberá realizarse de forma adecuada y manteniendo la imagen de
        orden y limpieza del plantel, por lo que <strong>por ningún motivo podrás:</strong></p><br>
    <ul class="lista">
        <li><strong>Compartir o traspasar </strong>el uso del casillero de manera directa.</li>
        <li><strong>Almacenar </strong>cualquier tipo de productos de comercialización.</li>
        <li><strong>Pintar o señalar </strong>el casillero.</li>
        <li><strong>Colocar </strong>calcomanías o distintivos.</li>
        <li><strong>Abrir </strong>el casillero por extravío de las llaves sin antes reportarlo a la Subdirección Administrativa.</li>
        <li><strong>Tener alimentos o bebidas </strong>que generen akgún tipo de derramamiento o plaga.</li>
        <li><strong>Guardar </strong>bebidas alcohólicas o sustancias prohibidas.</li>
    </ul>
    <p>Cualquier incumplimiento de los puntos señalados será motivo de la suspensión inmediata del
        servicio y en caso de gravedad de la falta podrá ser turnado a la Comisión de Honor del Consejo
        Técnico Consultivo Escolar.<br><br>
        El uso del casillero será para resguardar material bibliográfico, académico, de laboratorio, deportivo,
        cultural y lo relacionado con tu actividad como estudiante dentro de la escuela.<br><br>
        No debes guardar en el interior objetos consideradas de alto valor:</p>
    <ul>
        <li>Laptops</li>
        <li>Tabletas</li>
        <li>Alhajas</li>
        <li>Dinero en efectivo</li>
        <li>Cámaras fotográficas, etc.</li>
    </ul>
    <p>Lo anterior debido a que no se puede garantizar totalmente seguridad de estos.</p>
    </div>

    <div class="acuerdos"> <!--Agrega un checkbox para aceptar los acuerdos-->
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="acuerdo" id="acuerdo" value="acuerdo">
            <label class="form-check-label" for="acuerdo">Acepto los acuerdos de uso del locker.</label>
        </div>
        <br><br>
    </div>

    <div class="botones">
        <h5>Comprobante del pago</h5>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="inputGroupFile02">
            <label class="input-group-text" for="inputGroupFile02">Subir</label>
        </div>

    </div>

    <div class="submit">
        <button type="submit" class="btn btn-primary btn-lg" id="enviar">Generar acuse</button>
    </div>
  
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>