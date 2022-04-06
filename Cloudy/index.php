<?php include("templates/cabecera.php"); 

    include 'admin/config/db.php';
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
                $tipo = $row
            ?>
           <div overflow='auto'>
               <?php 
                    echo "<a href='descargarFile.php?file=" .$row['ruta']. "' class='btn btn-info btn-block'>";
                    ## ICONO PNG
                    if ($row['tipo'] == 'image/png'){
                        echo "<img src='Archivos/".$row['ruta']."' class='archivo'>";
                    } 
                    ## ICONO PDF
                    else if ($row['tipo'] == 'application/pdf'){
                        echo "<img src='icos/pdf-icon.png' class='archivo'>";
                    }
                    ## ICONO EXCEL
                     else if ($row['tipo'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $row['tipo'] == 'application/vnd.ms-excel'){
                        echo "<img src='icos/excel-icon.png' class='archivo'>";
                    }
                    ## ICONO JPEG
                    else if ($row['tipo'] == 'image/jpeg'){
                        echo "<img src='Archivos/".$row['ruta']."' class='archivo'>";
                    } 
                    ## ICONO WORD
                    else if ($row['tipo'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                        echo "<img src='icos/word-icon.png' class='archivo'>";
                    }
                    
                    echo "</a>";
                    echo $row["ruta"];
                ?>
           </div>
            <?php } mysqli_free_result($resultado);?>
        </div>
    </article>    

<?php include("templates/pie.php"); ?>
