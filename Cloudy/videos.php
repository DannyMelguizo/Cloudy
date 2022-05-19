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
        $archivos = "SELECT * FROM archivos WHERE usuario='$cuenta' AND tipo='video'";


?>
    <article class="archivos">
        
        <div class="archivos-usuario container">
            <?php 
            
            //Se almacena el resultado de la busqueda en una variable
            $resultado = $conn->query($archivos);
            
            while($row = mysqli_fetch_assoc($resultado)){
            ?>
           <div overflow='auto'>
               <?php 

                    $ruta = $row["ruta"];

                    echo "<a onclick='acciones(ruta)' class='btn btn-info btn-block'>";
                    // ICONO AVI
                    if($row['tipo_mime'] == 'video/x-msvideo' || $row['tipo_mime'] == 'video/avi' ){
                        echo "<img src='icos/avi-icon.png' class='archivo'>";
                    }
                    // ICONO MP4
                    else if($row['tipo_mime'] == 'video/mp4'){
                        echo "<img src='icos/mp4-icon.png' class='archivo'>";
                    }
                    // ICONO WMV
                    else if($row['tipo_mime'] == 'video/x-ms-wmv'){
                        echo "<img src='icos/wmv-icon.png' class='archivo'>";
                    }
                    // ICONO UNKNOWN
                    else {
                        echo "<img src='icos/unknown-icon.png' class='archivo'>";
                    }

                    
                    echo "</a>";
                    
                    echo $row["ruta"];
                ?>

                <script>

                <?php

                    echo "var ruta = '$ruta';";

                ?>

                </script>
                
           </div>
            <?php 
            }
            mysqli_free_result($resultado);
            ?>
        </div>
    </article>    

<?php 

    } else {

        header('Location: inicio.php');

    }

include("templates/pie.php"); ?>