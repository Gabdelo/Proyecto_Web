<?php
include 'conexion.php';
require 'funcionRecoge.php';

// Recoger datos del formulario
$correo = recoge("correo", "");
$contra = recoge("contrasena", "");

// Si falta algún dato → error
if ($correo == "" || $contra == "") {
    header("Location: InicioSesionEmpresa.html?error=1");
    exit;
}

// Buscar usuario por correo
$sql = "SELECT idUsuario, nombre, contra FROM usuarios WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

// Comprobar si existe
if ($result->num_rows === 1) {

    $usuario = $result->fetch_assoc();

    // Verificar contraseña
    if (password_verify($contra, $usuario['contra'])) {

        // Crear sesión
        session_start();
        $_SESSION['idUsuario'] = $usuario['idUsuario'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['correo'] = $correo;

        // Redirigir a zona privada
        header("Location: paginaPrivada.php");
        exit;
    } else {
        // Contraseña incorrecta
        header("Location: InicioSesionEmpresa.html?error=2");
        exit;
    }
} else {
    // Usuario no encontrado
    header("Location: InicioSesionEmpresa.html?error=3");
    exit;
}
