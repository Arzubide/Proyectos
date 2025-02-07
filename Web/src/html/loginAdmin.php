<?php
session_start(); 
include "../php2/operacionesBD.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['usuarioAdmin'];
    $password = $_POST['contraseñaAdmin'];

    $resultado = loginAdmin($username); 

    if(empty($resultado['msj'])){
        $_SESSION["error"] = "Usuario incorrecto."; 
        header("Location: admin.php"); 
        exit(); 
    }

    $user = $resultado['msj'][0]; 

    if ($user && $password === $user['password']){
        $_SESSION['username'] = $user['username'];
        header("Location: vistaAdmin.php");
        exit();
    } else {
        $_SESSION["error"] = "Contraseña incorrecta.";
        header("Location: admin.php"); 
        exit(); 
    }
}
?>
