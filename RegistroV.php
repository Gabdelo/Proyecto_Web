<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link type="text/css" rel="stylesheet" href="./CSS/PersonaRegistrada.css">
</head>

<body>
<?php
include 'conexion.php';
require 'funcionRecoge2.php';

$registroExitoso = false;
$mensajeError = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Recoger datos del formulario
    $nombre = recoge('nombre', "");
    $correo = recoge('correoRegistro', "Correo"); // validar email
    $contra = recoge('Contra', "");
    $estudios = recoge('estudios', "");
    $situacion = recoge('situacion', "");
    $sectores = recoge('sector', []); // checkbox múltiple
    $experiencia = (int)recoge('Cexperiencia', 0);
    $prefijo = recoge('Cprefijo', "+34");
    $telefono = (string)recoge('ETelefono', "");
    $provincia = recoge('Provincia', "");
    $consentimiento = isset($_POST['consentimiento']) ? 1 : 0;

    // Validar campos obligatorios
    if ($nombre === "" || $correo === false || $contra === "" || $telefono === "" || $estudios === "" || $situacion === "" || $provincia === "") {
        $mensajeError = "Debe rellenar todos los campos correctamente.";
    } else {
        // Insertar en la base de datos...
        $telefonoConPrefijo = $prefijo . $telefono;
        if($sectores!=null){
            $sectorStr = implode(',', $sectores);
        }
        $hash = password_hash($contra, PASSWORD_DEFAULT);

        $sql = "INSERT INTO visitantes 
        (nombre, correo, estudios, situacion, sector, experiencia, prefijo, telefono, provincia, contra, consentimiento) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            $mensajeError = "Error en la preparación de la consulta: " . $conn->error;
        } else {
            $stmt->bind_param(
                "sssssisissi",
                $nombre,
                $correo,
                $estudios,
                $situacion,
                $sectorStr,
                $experiencia,
                $prefijo,
                $telefono,
                $provincia,
                $hash,
                $consentimiento
            );

            if ($stmt->execute()) {
                $registroExitoso = true;
            } else {
                $mensajeError = "Error en la ejecución: " . $stmt->error;
            }
        }
    }
}
?>

<video autoplay loop muted id="video_background">
    <source src="./IMAGENES/0_Landscape_Mountains_1280x720.mp4" type="video/mp4">
</video>

<main class="p-0 m-0">
    <nav class="container-fluid">
        <button class="atras"><span></span></button>
        <div class="logo"></div>
    </nav>
    <div class="container-fluid" id="informacionDeRegistro">
        <span class="bi bi-envelope fs-1" id="correoIcono"></span>
        <?php if ($registroExitoso): ?>
            <p>Registrado correctamente, revise la bandeja de <?= htmlspecialchars($correo) ?>.</p>
        <?php else: ?>
            <p style="color:red;"><?= htmlspecialchars($mensajeError ?: "Ahora mismo tenemos problemas con el registro, vuelva a intentarlo en unos minutos.") ?></p>
        <?php endif; ?>
    </div>
</main>

</body>
</html>
