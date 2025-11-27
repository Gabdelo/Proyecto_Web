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
    require 'funcionRecoge.php';

    $nombre = recoge('nombre', "");
    $correo = recoge('correoRegistro', "");
    $contra = recoge('contra', "");
    $prefijo = recoge('prefijo', "");
    $telefono = recoge('ETelefono', "");

    $telefonoConPrefijo = $prefijo . $telefono;

    $registroExitoso = false;

    if ($correo === false) {
        header("Location: InicioSesionEmpresa.html?error=1");
        exit;
    }

    if ($nombre != "" && $correo != "" && $contra != "" && $telefonoConPrefijo != "") {

        $hash = password_hash($contra, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nombre, numeroTel, correo, contra) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // ssss = 4 strings
        $stmt->bind_param("ssss", $nombre, $telefonoConPrefijo, $correo, $hash);

        $stmt->execute();

        $registroExitoso = true;
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
                <p>Ahora mismo tenemos problemas con el registro, vuelva a intentarlo en unos minutos.</p>
            <?php endif; ?>
        </div>
    </main>

</body>

</html>