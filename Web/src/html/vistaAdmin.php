<?php
    session_start(); 
    if(!isset($_SESSION['username'])){
        header("Location: admin.php"); 
        exit(); 
    }


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
    <script src="https://kit.fontawesome.com/112b57d109.js" crossorigin="anonymous"></script>
    <script>
        function eliminarUsuario(id) {
            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                window.location.href = `eliminar.php?id=${id}`;
            }
        }

        function verUsuario(userId, nombres, apellidoP, apellidoM, telefono, email, estatura, credencial, horario, username, status, lockerId) {
            document.getElementById('modalBoleta').textContent = userId;
            document.getElementById('modalNombre').textContent = nombres;
            document.getElementById('modalApellidoP').textContent = apellidoP;
            document.getElementById('modalApellidoM').textContent = apellidoM;
            document.getElementById('modalTelefono').textContent = telefono;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalEstatura').textContent = estatura;
            document.getElementById('modalCredencial').textContent = credencial;
            document.getElementById('modalHorario').textContent = horario;
            document.getElementById('modalUserName').textContent = username;
            document.getElementById('modalStatus').textContent = status;
            document.getElementById('modalLockerId').textContent = (lockerId == '') ? 'N/A' : lockerId;

            var modal = new bootstrap.Modal(document.getElementById('modalVerUsuario'));
            modal.show();
        }

        function editarUsuario(userId, nombres, apellidoP, apellidoM, telefono, email, estatura, credencial, horario) {
            document.getElementById('editUserId').value = userId;
            document.getElementById('name').value = nombres;
            document.getElementById('apellidoP').value = apellidoP;
            document.getElementById('apellidoM').value = apellidoM;
            document.getElementById('telefono').value = telefono;
            document.getElementById('email').value = email;
            document.getElementById('boleta').value = userId;
            document.getElementById('estatura').value = estatura;
            document.getElementById('cred').value = credencial;
            document.getElementById('horario').value = userId;

            var modal2 = new bootstrap.Modal(document.getElementById('modalEditarUsuario'));
            modal2.show();
        }
    </script>
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
                        <a class="nav-link  fs-5" href="./formulario.html">Solicitud</a>
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
                        <a class="nav-link active fs-5" href="admin.html">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="content mt-5 mb-4">
        <h2 class="text-center p-3">Binevenido <?= $_SESSION['username'] ?></h2>

        <h4>Disponibilidad de lockers</h4>
        <div class="lockers-container">
            <p>1.80 - 1.90</p>
            <div class="locker-list-1">
            </div>

            <p>1.70 - 1.79</p>
            <div class="locker-list-2">
                
            </div>

            <p>1.60 - 1.69</p>
            <div class="locker-list-3">
            </div>

            <p>1.50 - 1.59</p>
            <div class="locker-list-4">
            </div>    
        </div>

        
    </div>

    <script>
function createLockers(containerClass, start, end) {
    const lockerList = document.querySelector(containerClass);
    for (let i = start; i <= end; i++) {
        const button = document.createElement('button');
        button.className = 'btn btn-primary';
        button.type = 'button';
        // Formatear el número con 3 dígitos
        button.textContent = i.toString().padStart(3, '0');
        lockerList.appendChild(button);
    }
}


        // Generar lockers en cada contenedor
        createLockers('.locker-list-1', 76, 100);
        createLockers('.locker-list-2', 51, 75);
        createLockers('.locker-list-3', 26, 50);
        createLockers('.locker-list-4', 1, 25);
    </script>
        <div class="container-fluid row">
            <div class="col-12 p-4">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">Boleta</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido paterno</th>
                            <th scope="col">Apellido materno</th>
                            <th scope="col">Teléfono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include("../php2/operacionesBD.php");
                            $resultado = obtenerUsuarios(); 
                            
                            if($resultado['cod'] === 200){
                                foreach($resultado['msj'] as $fila){
                        ?>
                                <tr>
                                    <td><?= $fila['userId'] ?></td>
                                    <td><?= $fila['nombres'] ?></td>
                                    <td><?= $fila['apellidoP'] ?></td>
                                    <td><?= $fila['apellidoM'] ?></td>
                                    <td><?= $fila['telefono'] ?></td>
                                    <td><?= $fila['email'] ?></td>
                                    <td><?= $fila['status'] ?></td>
                                    <td>
                                    <a href="javascript:void(0)" 
                                    class="btn btn-small btn-info" 
                                    onclick="verUsuario(
                                        '<?= $fila['userId'] ?>',
                                        '<?= $fila['nombres'] ?>',
                                        '<?= $fila['apellidoP'] ?>',
                                        '<?= $fila['apellidoM'] ?>',
                                        '<?= $fila['telefono'] ?>',
                                        '<?= $fila['email'] ?>',
                                        '<?= $fila['estatura'] ?>', 
                                        '<?= $fila['credencial'] ?>',
                                        '<?= $fila['horario'] ?>', 
                                        '<?= $fila['username'] ?>',
                                        '<?= $fila['status'] ?>', 
                                        '<?= $fila['lockerId'] ?>'
                                    )">
                                        <i class="fa-solid fa-book"></i>
                                    </a>
                                    <a href="javascript:void(0)" 
                                    class="btn btn-small btn-warning" 
                                    onclick="editarUsuario(
                                         '<?= $fila['userId'] ?>',
                                        '<?= $fila['nombres'] ?>',
                                        '<?= $fila['apellidoP'] ?>',
                                        '<?= $fila['apellidoM'] ?>',
                                        '<?= $fila['telefono'] ?>',
                                        '<?= $fila['email'] ?>',
                                        '<?= $fila['estatura'] ?>', 
                                        '<?= $fila['credencial'] ?>',
                                        '<?= $fila['horario'] ?>'
                                    )">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-small btn-danger" onclick="eliminarUsuario(<?= $fila['userId'] ?>)"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                    
                                </tr>
                        <?php
                                }
                            }
                            else{
                                echo "Error: " . $resultado['msj'];
                            }
                        ?>
                    </tbody>
                </table>

                <!-- Modal para ver más información del usuario-->
                <div class="modal fade" id="modalVerUsuario" tabindex="-1" aria-labelledby="modalVerUsuarioLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalVerUsuarioLabel">Información del Usuario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Boleta:</strong> <span id="modalBoleta"></span></p>
                            <p><strong>Nombre:</strong> <span id="modalNombre"></span></p>
                            <p><strong>Apellido Paterno:</strong> <span id="modalApellidoP"></span></p>
                            <p><strong>Apellido Materno:</strong> <span id="modalApellidoM"></span></p>
                            <p><strong>Teléfono:</strong> <span id="modalTelefono"></span></p>
                            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
                            <p><strong>Estatura:</strong> <span id="modalEstatura"></span></p>
                            <p><strong>Credencial:</strong> <span id="modalCredencial"></span></p>
                            <p><strong>Horario:</strong> <span id="modalHorario"></span></p>
                            <p><strong>Nombre de usuario:</strong> <span id="modalUserName"></span></p>
                            <p><strong>Status:</strong> <span id="modalStatus"></span></p>
                            <p><strong>Número de Locker:</strong> <span id="modalLockerId"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para Editar Usuario -->
                <div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formEditarUsuario" method="POST" action="actualizar.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- Campos del formulario -->
                            <input type="hidden" name="userId" id="editUserId">
                            
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nombre(s):</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="apellidoP" class="col-sm-2 col-form-label">Apellido Paterno:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="apellidoP" name="apellidoP">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="apellidoM" class="col-sm-2 col-form-label">Apellido Materno:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="apellidoM" name="apellidoM">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="telefono" class="col-sm-2 col-form-label">Teléfono:</label>
                                <div class="col-sm-10">
                                    <input type="tel" class="form-control" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Correo:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="boleta" class="col-sm-2 col-form-label">Núm. Boleta:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="boleta" name="boleta">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="estatura" class="col-sm-2 col-form-label">Estatura(cm):</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="estatura" name="estatura">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="cred" class="col-sm-2 col-form-label">Credencial:</label>
                                    <input type="file" class="form-control" id="cred" name="cred" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="input-group">
                                    <label for="horario" class="col-sm-2 col-form-label">Horario:</label>
                                    <input type="file" class="form-control" id="horario" name="horario" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
                <a href="logoutAdmin.php">Cerrar sesion</a>
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
    <script type="text/javascript" src="../js/formValidationUpdate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
