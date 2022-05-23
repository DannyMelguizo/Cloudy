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
    $archivos = "SELECT * FROM papelera WHERE usuario='$cuenta'";

?>
    <link rel="stylesheet" href="css/estilosbin.css">
    
    <article class="archivos">

        <?php
            //Almacena el resultado de la busqueda en una variable
            $resultado = $conn->query($archivos);

            //En caso de no encontrar resultados, imprime que la papelera esta vacia
            if($resultado->num_rows == 0){
        
        ?>
                <div class="msg">     
                    <h3>La papelera esta vacia</h3>
                    <b>La papelera no tiene elementos.</b>

                </div>

        <?php
            
            } else {
        ?>

        <div id="container" class="archivos-usuario container">
            <?php
            
                //Imprime elemento por elemento, encontrado en la variable resultado
                while($row = mysqli_fetch_assoc($resultado)) {

            ?>
           <div overflow='auto'>
           <?php 

                    $ruta = $row["ruta"];                    

                    echo '<a id="archivo" name="archivo" class="btn btn-info btn-block" value="'.$ruta.'">';
                    // ICONO PNG
                    if ($row['tipo_mime'] == 'image/png'){
                        echo "<img src='papelera/".$row['ruta']."' class='archivo'>";
                    } 
                    // ICONO PDF
                    else if ($row['tipo_mime'] == 'application/pdf'){
                        echo "<img src='icos/pdf-icon.png' class='archivo'>";
                    }
                    // ICONO EXCEL
                     else if ($row['tipo_mime'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $row['tipo_mime'] == 'application/vnd.ms-excel'){
                        echo "<img src='icos/excel-icon.png' class='archivo'>";
                    }
                    // ICONO JPEG
                    else if ($row['tipo_mime'] == 'image/jpeg'){
                        echo "<img src='papelera/".$row['ruta']."' class='archivo'>";
                    } 
                    // ICONO WORD
                    else if ($row['tipo_mime'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                        echo "<img src='icos/word-icon.png' class='archivo'>";
                    }
                    // ICONO POWERPOINT
                    else if ($row['tipo_mime'] == 'application/vnd.ms-powerpoint' || $row['tipo_mime'] == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'){
                        echo "<img src='icos/ppt-icon.png' class='archivo'>";
                    }
                    // ICONO AVI
                    else if($row['tipo_mime'] == 'video/x-msvideo' || $row['tipo_mime'] == 'video/avi' ){
                        echo "<img src='icos/avi-icon.png' class='archivo'>";
                    }
                    // ICONO MP3
                    else if($row['tipo_mime'] == 'audio/mpeg'){
                        echo "<img src='icos/mp3-icon.png' class='archivo'>";
                    }
                    // ICONO COMPRIMIDO
                    else if($row['tipo_mime'] == 'application/x-7z-compressed' || $row['tipo_mime'] == 'application/x-rar-compressed'|| $row['tipo_mime'] == 'application/zip'){
                        echo "<img src='icos/comprimido-icon.png' class='archivo'>";
                    }
                    // ICONO EXE
                    else if($row['tipo_mime'] == 'application/vnd.microsoft.portable-executable' || $row['tipo_mime'] == 'application/x-msdownload'){
                        echo "<img src='icos/exe-icon.png' class='archivo'>";
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

           </div>
        <?php 
            
                } mysqli_free_result($resultado);
            
            }
        ?>
        </div>
    </article>
    
        
<?php 

    
    } else {

        header('Location: inicio.php');

    }

?>

    <script src="css/accionesBin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>

    </body>

</html>
