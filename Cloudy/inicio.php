<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="icos/Cloudy.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Cloudy</title>
</head>

<body>
    
    <header>
        <div class="cabecera">
            <img id="cloudylogo" src="icos/cloudy.png" tittle="Cloudy-Logo">
            <h1 class="cabeza">Cloudy</h1>
        </div>
    </header>

    <div class="cuerpo">
        <div class="container-form sign-up">
            <div class="welcome-back">
                <div class="message">
                    <h2>¿Ya tienes una cuenta?</h2>
                    <p>Inicia sesión, haz clic aqui</p>
                    <button class="sign-up-btn">Iniciar Sesión</button>
                </div>
            </div>
            <form class="formulario" action="">
                <h2 class="message-form">Crear Cuenta</h2>
                <input type="email" id="usuario1" placeholder="Email">
                <input type="password" id="password1" placeholder="Contraseña">
                <input type="password" id="confirmar" placeholder="Confirmar">
                <input id="enviarCreate" type="button" value="Registrarse">
            </form>
        </div>
        <div class="container-form sign-in">
            <form class="formulario" action="">
                <h2 class="message-form">Iniciar Sesión</h2>
                <input type="email" id="usuario2" placeholder="Email">
                <input type="password" id="password2" placeholder="Contraseña">
                <input id="enviarLogin" type="button" value="Iniciar Sesion">
            </form>
            <div class="welcome-back">
                <div class="message">
                    <h2>¿No tienes una cuenta?</h2>
                    <p>Crea una cuenta ahora, haz clic aqui</p>
                    <button class="sign-in-btn">Registrarse</button>
                </div>
            </div>
        </div>
        <script>
            $('#enviarLogin').click(function(){
                var usuario = $('#usuario2').val();
                var password = $("#password2").val();

                alert(usuario);

            });
        </script>
    </div>
    
</body>

</html>