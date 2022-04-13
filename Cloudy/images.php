<?php include("templates/cabecera.php"); 

    include 'db/db.php';
    $conn = conexion();
    $archivos = "SELECT * FROM archivos WHERE usuario='correo@correo.com'";


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
            <?php $resultado = mysqli_query($conn, $archivos);

            while($row = mysqli_fetch_assoc($resultado)) {
                if($row['tipo'] == 'image/png' || $row['tipo'] == 'image/jpeg'){
                    $tipo = $row
            ?>
           <div overflow='auto'>
               <?php
                    echo "<a href='descargarFile.php?file=" .$row['ruta']. "' class='btn btn-info btn-block'>";
                    // ICONO PNG
                    if ($row['tipo'] == 'image/png'){
                        echo "<img src='Archivos/".$row['ruta']."' class='archivo'>";
                    }
                    // ICONO JPEG
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
