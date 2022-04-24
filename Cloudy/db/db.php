<?php 

class conexion{

   function connexion(){
      $host = "localhost";
      $user = 'root';
      $password = "";
      $db = "cloudy";

      $conn = mysqli_connect($host, $user, $password, $db);

      if($conn -> connect_errno):
         echo "Error al conectar con la base de datos, error: ". $conn->connect_error;
         die();
      endif;

      return $conn;
   }
}

?>