<?php
include("../php2/operacionesBD.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    $nombres = $_POST['name'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $boleta = $_POST['boleta'];
    $estatura = $_POST['estatura'];
    $credencial = $_POST['cred'];
    $horario = $_POST['horario'];


    // Llama a una función para actualizar el usuario en la base de datos
    $resultado = actualizarUsuario($userId, $nombres, $apellidoP, $apellidoM, $telefono, $email, $boleta, $estatura, $credencial, $horario);

    if ($resultado['cod'] === 200) {
        header("Location: vistaAdmin.php?mensaje=Usuario actualizado con éxito");
    } else {
        echo "Error: " . $resultado['msj'];
    }
}
?>
