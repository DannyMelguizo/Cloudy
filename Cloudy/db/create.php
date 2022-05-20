<?php

include "db.php";

//Se crea conexion con la base de datos
$cuenta = new conexion();
$conn = $cuenta->connexion();

//Almacenamos el usuario en una variable
$usuario = $_POST['usuario'];

//Almacenamos la contraseña del usuario en una variable
$password = $_POST['password'];

$usuarios = $conn->query("SELECT * FROM usuarios 
                        WHERE correo = '$usuario'");
                
//Verificamos si el usuario existe en la base de datos
if($usuarios->num_rows == 1){
    echo "Si";
} else {

    $pass = md5($password); //Encriptacion de la contraseña

    $registro = $conn->query("INSERT INTO usuarios(password, correo) VALUES('$pass', '$usuario')");

    echo "No";
}




$conn->close();


?>