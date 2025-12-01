<!DOCTYPE html>
<html>

<head>
    <title>PROYECTO</title>
    <meta charset="UTF-8">
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" lang="es">
    <link rel="icon" href="./IMAGENES/logoico3.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link type="text/css" rel="stylesheet" href="./CSS/FormularioRegistro.css">
</head>

<body class="p-0 m-0 bg-dark">

    <main class="p-0 m-0">

        <nav class="container-fluid">
            <button class="atras"><span></span></button>
            <div class="logo"></div>
        </nav>

        <div id="Eregistro" class="formu mb-5">

            <form method="post" action="RegistroV.php">

                <button type="button" class="atras" onclick="volver()">
                    <span class="bi bi-arrow-left"></span>
                </button>

                <h3 align="center" class="text-white">REGISTRO</h3>

                <div>
                    <label for="nombre" class="form-label text-white"></label>
                    <input type="text" class="form-control correo" id="ENombre" name="nombre"
                        placeholder="Nombre completo" required>
                </div>

                <div>
                    <label for="corre" class="form-label text-white"></label>
                    <input type="correo" class="form-control" id="ECorreoRegistro" name="correoRegistro"
                        placeholder="Email" required pattern="[A-Za-z]{0,45}[@]{1}[A-Za-z]{1,15}[.]{1}[A-Za-z]{1,5}">
                </div>

                <!-- Nivel estudios -->
                <div class="mt-3">
                    <select class="form-select" name="estudios" required>
                        <option value="" disabled selected>Nivel de estudios</option>
                        <option value="ESO">ESO</option>
                        <option value="Bachillerato">Bachillerato</option>
                        <option value="FP Medio">FP Grado Medio</option>
                        <option value="FP Superior">FP Grado Superior</option>
                        <option value="Universidad">Universidad</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>

                <!-- Situación laboral -->
                <div class="mt-3">
                    <select class="form-select" name="situacion" required>
                        <option value="" disabled selected>Situación laboral</option>
                        <option value="Desempleado">Desempleado</option>
                        <option value="Estudiante">Estudiante</option>
                        <option value="Trabajando">Trabajando</option>
                        <option value="Autónomo">Autónomo</option>
                    </select>
                </div>

                <!-- Sector de interés -->
                <div class="mt-3 text-white">
                    <label>Sectores de interés:</label>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" value="Informática">
                        <label class="form-check-label">Informática</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" value="Administración">
                        <label class="form-check-label">Administración</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" value="Marketing">
                        <label class="form-check-label">Marketing</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" value="Logística">
                        <label class="form-check-label">Logística</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" value="Ventas">
                        <label class="form-check-label">Ventas</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sector[]" value="Otros">
                        <label class="form-check-label">Otros</label>
                    </div>
                </div>

                <!-- Experiencia -->
                <div class="mt-3">
                    <input type="number" class="form-control" name="Cexperiencia"
                        placeholder="Años de experiencia (0 si no tiene)" min="0" required>
                </div>

                <!-- Teléfono -->
                <div id="telef" class="mt-3 d-flex">
                    <select class="from-select rounded me-2" name="Cprefijo">
                        <option value="+34" selected>🇪🇸 +34</option>
                        <option value="+33">🇫🇷 +33</option>
                        <option value="+39">🇮🇹 +39</option>
                        <option value="+44">🇬🇧 +44</option>
                        <option value="+49">🇩🇪 +49</option>
                    </select>

                    <input type="number" class="form-control" id="CTelefono" name="ETelefono"
                        placeholder="Teléfono" pattern="[0-9]{9}" required>
                </div>

                <!-- Provincia -->
                <div id="EmpresaInputs" class="mt-3">
                    <label for="Provinicia" class="form-label text-white"></label>
                    <input type="text" class="form-control" id="CProvincia" name="Provincia" placeholder="Provincia"
                        required>
                </div>

                <!-- Contraseña -->
                <div id="EmpresaInputs" class="mt-3">
                    <label for="contra" class="form-label text-white"></label>
                    <input type="password" class="form-control" id="CContra" name="Contra" placeholder="Contraseña"
                        required>
                </div>



                <!-- Consentimiento -->
                <div class="mt-3 text-white">
                    <input type="checkbox" name="consentimiento" required>
                    Acepto el tratamiento de mis datos.
                </div>

                <!-- Botón enviar -->
                <button type="submit" class="btn mt-2">Registrarse</button>

                <?php
               if (isset($_GET['error']) && $_GET['error'] == 1) {
               echo '<div class="alert alert-danger text-center">Debe rellenar todos los campos obligatorios.</div>';
                }
                ?>

            </form>

        </div>

    </main>

</body>

</html>
