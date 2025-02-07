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



<form id="acuseForm" name="acuseForm" method="POST" style="margin: 0; padding: 0;">
    <div class="contenido" id="contenidoform">
        <h2>ACUERDO DE RESPONSABILIDADES EN EL USO DEL CASILLERO 2025.</h2>
        <div style="position: fixed; top: 20px; right: 20px; z-index: 1030;">
</div>
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

        <div class="botones" id="acuse" style="margin-top: 20px;">
            <h5>Comprobante del pago</h5>
            <div class="input-group mb-3">
                <input type="file" required class="form-control" id="inputGroupFile02" accept=".pdf">
                <label class="input-group-text" for="inputGroupFile02">Subir</label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" id="btnEnviar">Enviar</button>
        </div>
    </form>
   <div class="botones" style="display: none;" id="acuse2">
    <button type="button" class="btn btn-primary btn-lg" onclick="generarAcuse('<?php echo $userId; ?>')" >Generar Acuse</button>
</div>

    <!-- Primero jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <!-- Luego Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Después JustValidate -->
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Finalmente tu script personalizado -->
    <script type="text/javascript" src="../js/acusePrimeraValidation.js"></script>

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

    function generarAcuse(userId) {
        // Añadir manejo de errores y feedback al usuario
        try {
            window.location.href = `../php/service/pdf/generar_pdfbasico.php?userId=${userId}`;
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo generar el acuse. Por favor, intente nuevamente.',
            });
            console.error('Error al generar acuse:', error);
        }
    }
    </script>
</body>
</html>