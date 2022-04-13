<?php 

   function conexion(){
      $host = "localhost";
      $user = 'root';
      $password = "";
      $db = "cloudy";

      $conn = mysqli_connect($host, $user, $password, $db) or die("Error al conectar");
      return $conn;
   }
?>