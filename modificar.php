<?php
session_start();
include 'conexion.php';
require 'funcionRecoge2.php';

// Si no hay sesión, volver a inicio
if (!isset($_SESSION['idUsuario'])) {
    header("Location: InicioSesionEmpresa.html");
    exit;
}

$id = $_SESSION['idUsuario'];  // este es el idVisitante de la tabla
$nombreOriginal = $_SESSION['nombre'];

// Si el usuario pulsa "Cerrar Sesión"
if (isset($_POST['Logout'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Peticion'])) {

    // Recoger datos del formulario
    $nombre = recoge("nombre", "");
    $correo = recoge("correo", "");
    $contra = recoge("contra", "");

    if ($nombre === "" || $correo === "" || $contra === "") {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Encriptar contraseña
    $hash = password_hash($contra, PASSWORD_DEFAULT);

    // Preparar UPDATE
    $sql = "UPDATE visitantes SET nombre = ?, correo = ?, contra = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error al preparar: " . $conn->error);
    }

    $stmt->bind_param("sssi", $nombre, $correo, $hash, $id);

    if ($stmt->execute()) {

        // Actualizar datos de sesión
        $_SESSION['nombre'] = $nombre;
        $_SESSION['correo'] = $correo;
        $_SESSION['contra'] = $contra;

        // Redirigir o mostrar mensaje
        header("Location: perfil.php");
        exit;
    } else {
        echo "Error al ejecutar: " . $stmt->error;
    }
}
?>