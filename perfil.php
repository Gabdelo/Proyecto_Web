<?php
        session_start();
        if (isset($_SESSION['idUsuario'])) {
            
        $idUsuario = $_SESSION['idUsuario'];
        $nombre = $_SESSION['nombre'];
        $correo = $_SESSION['correo'];
        $contra = $_SESSION['contra'];
            
        }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>PROYECTO</title>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" lang="es"></meta>
        <link rel="icon" href="./IMAGENES/logoico3.png" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!--bootstrap 5 CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"><!--bootstrap 5 icons-->
        <link type="text/css" rel ="stylesheet" href="./CSS/perfil.css">
    </head>
    <body>
        <nav class="container navegador mb-3 mt-3">
            <div class="container nav-content">
                <a href="index.php"><img class="logo" src="./IMAGENES/LOGOlsbm2.png" alt=""></a>
                <button class="btn-nav"><span class="bi bi-list"></span></button>
                <ul class="nav-list">
                    <li><button><a href="index.php#PROGRAMA">PROGRAMA</a></button></li>
                    <li><button><a href="participantes.php">VOTACIÓN</a></button></li>
                    <li><button><a href="index.php#Patrocinadores">PATROCINADORES</a></button></li>
                    <li><button><a href="nosotros.php">NOSOTROS</a></button></li>
                    <li><button>
                        <?php
                        if(!isset($nombre)){
                            echo '<a href="InicioSesionEmpresa.html" id="iniciar">Iniciar Sesión</a>';
                        }else{
                            echo '<a href="paginaPrivada.php">'.$nombre.'</a>';
                        }
                        ?>
                    </button></li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid m-0 p-0 perfil-main">
            <div class="caja ">
                
                <h1>
                    <?php
                            if(!isset($nombre)){
                            echo 'Nombre Usuario';
                            }else{
                                echo $nombre;
                            }
                        ?>
                </h1>
                <h3>Visitante</h3>
                <p>Si quiere modificar si información, puede hacer lo aquí</p>
                <form action="modificar.php" class="formulario" method="post">
                    <?php
                    if (!isset($_SESSION['idUsuario'])) {
                        echo '<label for="nombre" class="form-label">Nombre</label>';
                        echo '<input type="text" name="nombre" id="" class="form-control mb-2">';
                        echo '<label for="" class="form-label">Correo</label>';
                        echo '<input type="text" name="correo" id="" class="form-control mb-2">';
                        echo '<label for="" class="form-label">Contraseña</label>';
                        echo '<input type="password" name="contra" id="" class="form-control mb-3">';
                    }else{
                        echo '<label for="nombre" class="form-label">Nombre</label>';
                        echo '<input type="text" name="nombre" id="" class="form-control mb-2" value="'.$nombre.'">';
                        echo '<label for="" class="form-label">Correo</label>';
                        echo '<input type="text" name="correo" id="" class="form-control mb-2" value="'.$correo.'">';
                        echo '<label for="" class="form-label">Contraseña</label>';
                        echo '<input type="password" name="contra" id="" class="form-control mb-3" value="'.$contra.'">';
                    }
                    ?>
                    <div class="container-fluid d-flex caja-btns">
                        <input type="submit" name="Peticion" value="Guardar cambios" class="btn btn-primary"></input>
                        <input type="submit" name="Logout" value="Cerrar Sesión" class="btn btn-danger"><a href="cerrarSesion.php"></a></input>
                    </div>
                </form>
             </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./JS/perfil.js"></script>
    <!--<script src="https://cdn.botpress.cloud/webchat/v3.3/inject.js"></script>
        <script src="https://files.bpcontent.cloud/2025/10/10/16/20251010162421-YDPBONI7.js" defer></script>-->
</html>