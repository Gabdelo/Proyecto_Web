 <title>PROYECTO</title>
 <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0" lang="es">
 </meta>
 <link rel="icon" href="./IMAGENES/logoico3.png" type="image/png">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!--bootstrap 5 CSS-->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"><!--bootstrap 5 icons-->
 <link type="text/css" rel="stylesheet" href="./CSS/paginaPrivada.css">
 </head>

 <body>
     <?php
        session_start();
        if (!isset($_SESSION['idUsuario'])) {
            header("Location: InicioSesionEmpresa.html");
            exit;
        }

        $idUsuario = $_SESSION['idUsuario'];
        $nombre = $_SESSION['nombre'];
        ?>
     <nav class="container navegador bg-dark">
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
     <main>
         <div class="container">
             <div class="row">
                 <div class="col-md-5 contenedores">

                     <div class="container-fluid v2 p-0">
                         <span class="bi bi-play-circle-fill play"></span>
                         <iframe class="video" id="reproductor" controls src="" frameborder="0"></iframe>
                     </div>

                 </div>
                 <div class="col-md-3 contenedorBoton">
                     <button class="btn1" id="modVid">Modificar video</button>

                     <div id="url" class="oculto divUrl">
                         <label for="basic-url" class="form-label">Añade la URL</label>
                         <div class="input mb-3">
                             <span class="input-text" id="basic-addon3"></span>
                             <input type="text" class="form-control" name="url" id="urlInput">
                             <button type="button" id="enviar" class="btn1">Actualizar Video</button>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-3 contenedores">

                 </div>
             </div>
         </div>

     </main>
     <script>
         const botonModificar = document.getElementById("modVid");
         const contenedorURL = document.getElementById("url"); // div que contiene el input
         const inputURL = document.getElementById("urlInput"); // el input real
         const repVideo = document.getElementById("reproductor");
         const botonEnviar = document.getElementById("enviar");

         // Mostrar el formulario al pulsar "Modificar video"
         botonModificar.addEventListener("click", () => {
             contenedorURL.classList.remove("oculto");
         });

         // Cambiar el src del iframe al pulsar el botón "Actualizar Video"
         botonEnviar.addEventListener("click", () => {
             let url = inputURL.value.trim();
             if (url) {
                 // Convertir a embed si es una URL de YouTube
                 if (url.includes("youtube.com/watch?v=")) {
                     const videoID = url.split("v=")[1].split("&")[0];
                     url = "https://www.youtube.com/embed/" + videoID;
                 } else if (url.includes("youtu.be/")) {
                     const videoID = url.split("youtu.be/")[1].split("?")[0];
                     url = "https://www.youtube.com/embed/" + videoID;
                 }
                 repVideo.src = url;
                 <?php
                    require 'conexion.php'


                    ?>


             }
             contenedorURL.classList.add("oculto");
         });
     </script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
     <script src="./JS/main.js"></script>
     <script src="https://cdn.botpress.cloud/webchat/v3.3/inject.js"></script>
     <script src="https://files.bpcontent.cloud/2025/10/10/16/20251010162421-YDPBONI7.js" defer></script>
 </body>