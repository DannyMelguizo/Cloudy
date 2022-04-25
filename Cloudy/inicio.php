<?php
    include "templates/inicio.php";
?>

    <div class="cuerpo">
        <div class="container-form sign-up">

            <!-- Aviso para iniciar sesion -->
            <div class="welcome-back">
                <div class="message">
                    <h2>¿Ya tienes una cuenta?</h2>
                    <p>Inicia sesión, haz clic aqui</p>
                    <button class="sign-up-btn">Iniciar Sesión</button>
                </div>
            </div>

            <!-- Formulario para crear una cuenta -->
            <form id='crearCuenta' class="formulario" action="" method="POST">
                <h2 class="message-form">Crear Cuenta</h2>
                <input type="email" id="usuario1" placeholder="Email">
                <input type="password" id="password1" placeholder="Contraseña">
                <input type="password" id="confirmar" placeholder="Confirmar">
                <input id="enviarCreate" type="button" value="Registrarse">
            </form>
        </div>


        <div class="container-form sign-in">
            <!-- Formulario para iniciar sesion -->
            <form id='iniciarSesion' class="formulario" action="" method="POST">
                <h2 class="message-form">Iniciar Sesión</h2>
                <input type="email" id="usuario2" placeholder="Email">
                <input type="password" id="password2" placeholder="Contraseña">
                <input id="enviarLogin" type="button" value="Iniciar Sesion">
            </form>

            <!-- Aviso para crear una cuenta -->
            <div class="welcome-back">
                <div class="message">
                    <h2>¿No tienes una cuenta?</h2>
                    <p>Crea una cuenta ahora, haz clic aqui</p>
                    <button class="sign-in-btn">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    
    <script src="css/inicio.js"></script>
    <script src="css/login.js"></script>

<?php
    include "templates/pie.php";
?>