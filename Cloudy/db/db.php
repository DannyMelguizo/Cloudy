<?php 

class conexion{

   function connexion(){

      //Host
      $host = "localhost";

      //User
      $user = 'root';

      //Contraseña de la BD
      $password = "";

      //Base de Datos a conectar
      $db = "cloudy";

      //Conexion a la BD
      $conn = mysqli_connect($host, $user, $password, $db);

      //Si ocurre un error en la conexion imprime el error
      if($conn -> connect_errno):
         echo "Error al conectar con la base de datos, error: ". $conn->connect_error;
         die();
      endif;

      return $conn;
   }


}

?>