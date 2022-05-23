<!DOCTYPE html>
<html lang='es'>
    <head>
        <meta charset="utf-8">
        <title>Cloudy</title>
        <link rel="icon" href="icos/Cloudy.ico">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="templates/plugins/sweetalert2.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://kit.fontawesome.com/cc21c1d6c9.js" crossorigin="anonymous"></script>
        <meta name="robots" content="noindex">
        <link rel="stylesheet" href="css/estilos.css">

    </head>
    <body>
        <script src="jquery/jquery-3.6.0.min.js"></script>
        <script src="templates/plugins/sweetalert2.all.min.js"></script>

        <header>
            <!-- Interfaz de la cabecera -->
            <div class="cabecera">
                <img id="cloudylogo" src="icos/cloudy.png" tittle="Cloudy-Logo">
                <h1 class="cabeza">Cloudy</h1>
                
                <a class="text-light boton-ajustes dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img id="icono-ajustes"src="icos/menu-hamburguesa.png" title="Ajustes">
                </a>

                <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                    <a class="dropdown-item menuperfil" href="db/logout.php"><i class="fas fa-sign-out-alt m-1" aria-hidden="true"></i>
                        Cerrar sesión
                    </a>

                </div>

            </div>
        </header>
        
        <div class="menu">
            <aside>
                <!-- Barra de interaccion lateral izquierda -->
                <nav>
                    <ul class="nav_ul">
                        <li class="nav_li allfiles"><a class="seccion" href="index.php">Todos los archivos</a></li>
                        <li class="nav_li images"><a class="seccion" href="images.php">Imagenes</a></li>
                        <li class="nav_li videos"><a class="seccion" href="videos.php">Videos</a></li>
                        <li class="nav_li files"><a class="seccion" href="files.php">Documentos</a></li>
                        <li class="nav_li bin"><a class="seccion" href="bin.php">Papelera</a></li>
                    </ul>
                </nav>
            </aside>
        </div>



        