<?php

    session_start();

    include "db.php";
    $cuenta = new conexion();

    $conn = $cuenta->connexion();

    //almacenamos el usuario en una variable
    $usuario = $_POST['usuario'];

    //almacenamos la contraseña del usuario en una variable
    $password = $_POST['password'];

    $pass = md5($password); //encriptacion de la contraseña

    $usuarios = $conn->query("SELECT * FROM usuarios 
                            WHERE correo = '$usuario'
                            AND password = '$pass'");
                    
    //verificamos si el usuario existe en la base de datos
    if($usuarios->num_rows == 1){
        $_SESSION['s_usuario'] = $usuario;
        echo "No";
    } else {
        echo "Si";
    }

    $conn->close();

?>