<?php

include '../db/db.php';

$nombre = $_REQUEST['file'];

//Se almacena la ruta del archivo a eliminar
$directorio = "../papelera/" . $nombre;

if(is_file($directorio)){

    session_start();

    //Se recibe el archivo a eliminar
    $cuenta = $_SESSION['s_usuario'];

    $objeto = new conexion();
    $conn = $objeto->connexion();

    $conn->query("DELETE FROM papelera WHERE usuario='$cuenta' AND ruta = '$nombre'");

    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header('Location: ../index.php');

} else {
  die("El archivo no existe.");
}


?>
