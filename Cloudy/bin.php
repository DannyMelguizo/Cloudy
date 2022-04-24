<?php include("templates/cabecera.php"); 

    session_start();

    $cuenta = $_SESSION['s_usuario'];

    include 'db/db.php';
    $objeto = new conexion();
    $conn = $objeto->connexion();
    $archivos = "SELECT * FROM papelera WHERE usuario='$cuenta'";

?>
    <link rel="stylesheet" href="css/estilosbin.css">
    
    <article class="archivos">

        <?php

            $resultado = $conn->query($archivos);

            if($resultado->num_rows == 0){
        
        ?>
                <div class="msg">     
                    <h3>La papelera esta vacia</h3>
                    <b>La papelera no tiene elementos.</b>

                </div>

        <?php
            
            } else {
        ?>

        <div class="archivos-usuario container">
            <?php

                while($row = mysqli_fetch_assoc($resultado)) {

            ?>
           <div overflow='auto'>
               <?php
                    echo "<a href='descargarFile.php?file=" .$row['ruta']. "' class='btn btn-info btn-block'>";
                    ## ICONO PNG
                    if ($row['tipo'] == 'image/png'){
                        echo "<img src='Archivos/".$row['ruta']."' class='archivo'>";
                    }
                    ## ICONO JPEG
                    else if ($row['tipo'] == 'image/jpeg'){
                        echo "<img src='Archivos/".$row['ruta']."' class='archivo'>";
                    }

                    
                    echo "</a>";
                    echo $row["ruta"];
            
                ?>
           </div>
        <?php 
            
                } mysqli_free_result($resultado);
            
            }
        ?>
        </div>
    </article>


    
        
<?php include("templates/pie.php"); ?>