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

                //Solamente imprime los archivos que sean PNG, JPEG
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