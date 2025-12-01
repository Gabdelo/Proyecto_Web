<?php
include 'conexion.php';
require 'funcionRecoge.php';

$correo = recoge("correo", "");
$contra = recoge("contrasena", "");

if ($correo == "" || $contra == "") {
    header("Location: InicioSesionEmpresa.html?error=1");
    exit;
}

// PRIMERO: buscar en EMPRESAS
$sql = "SELECT idUsuario AS id, nombre, contra FROM usuarios WHERE correo = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error SQL empresas: " . $conn->error);
}

$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

$usuario = null;
$tipo = "";

// Si lo encuentra en empresas
if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();
    $tipo = "empresa";
} else {
    // Si no está en empresas, buscar en VISITANTES
    $sql = "SELECT id AS id, nombre, contra FROM visitantes WHERE correo = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error SQL visitantes: " . $conn->error);
    }

    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();
        $tipo = "visitante";
    } else {
        // Si no está en visitantes, buscar en ADMINISTRADORES
        $sql = "SELECT id AS id, nombre, contra FROM administradores WHERE correo = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            die("Error SQL administradores: " . $conn->error);
        }

        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            $tipo = "administrador";
        }
    }
}

// Si no existe en ninguna tabla
if (!$usuario) {
    header("Location: InicioSesionEmpresa.html?error=3");
    exit;
}

// Verificar contraseña
if (!password_verify($contra, $usuario['contra'])) {
    header("Location: InicioSesionEmpresa.html?error=2");
    exit;
}

// Crear sesión
session_start();
$_SESSION['idUsuario'] = $usuario['id'];
$_SESSION['nombre'] = $usuario['nombre'];
$_SESSION['correo'] = $correo;
$_SESSION['contra'] = $contra;
$_SESSION['tipo'] = $tipo;

// Redirigir según el tipo
if ($tipo === "empresa") {
    header("Location: paginaPrivada.php");
} elseif ($tipo === "visitante") {
    header("Location: perfil.php");
} else { // administrador
    header("Location: admin.php");
}
exit;
?>
