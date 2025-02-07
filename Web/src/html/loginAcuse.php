<?php
session_start(); 
include "../php2/operacionesBD.php"; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['usuarioAcuse'];
    $password = $_POST['contraseñaAcuse'];

    $resultado = loginAcuse($username); 

    if(empty($resultado['msj'])){
        $_SESSION["error"] = "Usuario incorrecto."; 
        header("Location: acuse.php"); 
        exit(); 
    }

    $user = $resultado['msj'][0]; 

    if ($user && $password === $user['password']){
        $_SESSION['username'] = $user['username'];
        header("Location: acusePrimeraV.php");
        exit();
    } else {
        $_SESSION["error"] = "Contraseña incorrecta.";
        header("Location: acuse.php"); 
        exit(); 
    }
}
?>
