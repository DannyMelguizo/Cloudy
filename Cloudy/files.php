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
                if($row['tipo'] == 'application/pdf' || $row['tipo'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $row['tipo'] == 'application/vnd.ms-excel' || $row['tipo'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                
            ?>
           <div overflow='auto'>
               <?php
                    // ICONO PDF
                    if ($row['tipo'] == 'application/pdf'){
                        echo "<img src='icos/pdf-icon.png' class='archivo'>";
                    }
                    // ICONO EXCEL
                    else if ($row['tipo'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $row['tipo'] == 'application/vnd.ms-excel'){
                        echo "<img src='icos/excel-icon.png' class='archivo'>";
                    }
                    // ICONO WORD
                    else if ($row['tipo'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                        echo "<img src='icos/word-icon.png' class='archivo'>";
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

