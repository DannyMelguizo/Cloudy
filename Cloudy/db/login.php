<?php

    session_start();

    include "db.php";

    //Se crea conexion con la base de datos
    $cuenta = new conexion();
    $conn = $cuenta->connexion();

    //Almacenamos el usuario en una variable
    $usuario = $_POST['usuario'];

    //Almacenamos la contraseña del usuario en una variable
    $password = $_POST['password'];

    $pass = md5($password); //Encriptacion de la contraseña

    $usuarios = $conn->query("SELECT * FROM usuarios 
                            WHERE correo = '$usuario'
                            AND password = '$pass'");
                    
    //Verificamos si el usuario existe en la base de datos
    if($usuarios->num_rows == 1){
        $_SESSION['s_usuario'] = $usuario;
        echo "No";
    } else {
        echo "Si";
    }

    $conn->close();

?>