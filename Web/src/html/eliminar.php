<?php
include("../php2/operacionesBD.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $resultado = eliminarUsuario($id);

    if ($resultado['cod'] === 200) {
        header("Location: vistaAdmin.php?mensaje=Usuario eliminado con éxito");
    } else {
        echo "Error: " . $resultado['msj'];
    }
} else {
    echo "ID de usuario no especificado.";
}
?>
