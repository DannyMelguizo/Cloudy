<?php include("templates/cabecera.php"); 

    session_start();

    //Recibe el usuario
    $cuenta = $_SESSION['s_usuario'];

    include 'db/db.php';

    //Se crea conexion con la base de datos
    $objeto = new conexion();
    $conn = $objeto->connexion();

    //Busqueda en la base de datos
    $archivos = "SELECT * FROM archivos WHERE usuario='$cuenta'";
?>

    <article class="archivos">
        <!-- Boton para subir archivos -->
        <div class="boton-subir">
            <a href="subir.php">
                <div class="boton-contenido">
                    <i class="fa-solid fa-angle-up"></i><b>Subir</b>
                </div>
            </a>
        </div>
        
        <div class="archivos-usuario container">
            <?php 
            
            //Se almacena el resultado de la busqueda en una variable
            $resultado = $conn->query($archivos);

            //Imprime elemento por elemento, encontrado en la variable resultado
            while($row = mysqli_fetch_assoc($resultado)) {
                
                //Solamente imprime los archivos que sean PDF, EXCEL, WORD
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

