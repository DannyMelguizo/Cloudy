<?php include("templates/cabecera.php"); 

    session_start();

    $cuenta = $_SESSION['s_usuario'];

    include 'db/db.php';
    $objeto = new conexion();
    $conn = $objeto->connexion();
    $archivos = "SELECT * FROM archivos WHERE usuario='$cuenta'";


?>
    <article class="archivos">
        <div class="boton-subir">
            <a href="subir.php">
                <div class="boton-contenido">
                    <i class="fa-solid fa-angle-up"></i><b>Subir</b>
                </div>
            </a>
        </div>
        
        <div class="archivos-usuario container">
            <?php $resultado = $conn->query($archivos);

            while($row = mysqli_fetch_assoc($resultado)) {
                if($row['tipo'] == 'image/png' || $row['tipo'] == 'image/jpeg'){
                
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
                }
            } mysqli_free_result($resultado);?>
        </div>
    </article>    

<?php include("templates/pie.php"); ?>