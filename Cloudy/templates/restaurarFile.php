<?php

include '../db/db.php';

$nombre = $_REQUEST['file'];

//Se almacena la ruta del archivo eliminado
$directorio = "../papelera/" . $nombre;

if(is_file($directorio)){

  session_start();

  //Se recibe el archivo a eliminar
  $cuenta = $_SESSION['s_usuario'];

  $objeto = new conexion();
  $conn = $objeto->connexion();

  $resultado = $conn->query("Select tipo, tipo_mime FROM papelera WHERE usuario='$cuenta' AND ruta='$nombre'");

  $datos = mysqli_fetch_row($resultado);

  $tipo = $datos[0];

  $tipo_mime = $datos[1];

  //Fecha actual en la que se subira el archivo
  $fecha = date("y/m/d");


  //Mover a archivos
  $ruta_arc = "../archivos/". $nombre;


  if(file_exists($ruta_arc)){
    header('Location: ../index.php');
  } else {

    $insert = $conn->query("INSERT INTO archivos(usuario, fecha, ruta, tipo_mime, tipo) VALUES ('$cuenta', '$fecha', '$nombre', '$tipo_mime', '$tipo')");

    if(is_file($directorio)){
      $moved = rename($directorio, $ruta_arc);
    }

    $conn->query("SET FOREIGN_KEY_CHECKS = 0");
    $conn->query("DELETE FROM papelera WHERE usuario='$cuenta' AND ruta = '$nombre'");
    $conn->query("SET FOREIGN_KEY_CHECKS = 1");

    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header('Location: ../index.php');

  }

} else {
  die("El archivo no existe.");
}


?>
