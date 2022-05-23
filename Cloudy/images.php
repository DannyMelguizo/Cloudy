<?php 
    include("templates/cabecera-menu.php"); 

    include 'db/db.php';

    session_start();

    //Recibe el usuario
    $cuenta = $_SESSION['s_usuario'];

    if(isset($cuenta)){

        //Se crea conexion con la base de datos
        $objeto = new conexion();
        $conn = $objeto->connexion();

        //Busqueda en la base de datos
        $archivos = "SELECT * FROM archivos WHERE usuario='$cuenta' AND tipo='image'";


?>
    <article class="archivos">
        
        <div id="container" class="archivos-usuario container">
            <?php 

            //Se almacena el resultado de la busqueda en una variable
            $resultado = $conn->query($archivos);

            //Imprime elemento por elemento, encontrado en la variable resultado
            while($row = mysqli_fetch_assoc($resultado)) {
            
            ?>

           <div overflow='auto'>

                <div>

                    <?php

                        $ruta = $row["ruta"];

                        echo '<a id="archivo" name="archivo" class="btn btn-info btn-block" value="'.$ruta.'">';

                            echo "<img src='Archivos/".$row['ruta']."' class='archivo'>";

                            
                        echo "</a>";
                        echo $row["ruta"];
                    
                        
                    ?>

                </div>



           </div>
            <?php 
                
            } mysqli_free_result($resultado);
            


            ?>
        </div>
    </article>

    <script src="css/acciones.js"></script>

<?php 
    } else {

        header('Location: inicio.php');

    }
include("templates/pie.php"); ?>