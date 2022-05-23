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
        $archivos = "SELECT * FROM archivos WHERE usuario='$cuenta' AND tipo='application'";
?>

    <article class="archivos">
        
        <div id="container" class="archivos-usuario container">

            <?php 
            
            //Se almacena el resultado de la busqueda en una variable
            $resultado = $conn->query($archivos);

            while($row = mysqli_fetch_assoc($resultado)){

            ?>
           <div overflow='auto'>
               <?php

                    $ruta = $row["ruta"];

                    echo '<a id="archivo" name="archivo" class="btn btn-info btn-block" value="'.$ruta.'">';

                    // ICONO PDF
                    if ($row['tipo_mime'] == 'application/pdf'){
                        echo "<img src='icos/pdf-icon.png' class='archivo'>";
                    }
                    // ICONO EXCEL
                    else if ($row['tipo_mime'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' || $row['tipo_mime'] == 'application/vnd.ms-excel'){
                        echo "<img src='icos/excel-icon.png' class='archivo'>";
                    }
                    // ICONO WORD
                    else if ($row['tipo_mime'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                        echo "<img src='icos/word-icon.png' class='archivo'>";
                    }
                    // ICONO COMPRIMIDO
                    else if($row['tipo_mime'] == 'application/x-7z-compressed' || $row['tipo_mime'] == 'application/x-rar-compressed'|| $row['tipo_mime'] == 'application/zip'){
                        echo "<img src='icos/comprimido-icon.png' class='archivo'>";
                    }
                    // ICONO EXE
                    else if($row['tipo_mime'] == 'application/vnd.microsoft.portable-executable' || $row['tipo_mime'] == 'application/x-msdownload'){
                        echo "<img src='icos/exe-icon.png' class='archivo'>";
                    }
                    // ICONO POWERPOINT
                    else if ($row['tipo_mime'] == 'application/vnd.ms-powerpoint' || $row['tipo_mime'] == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'){
                        echo "<img src='icos/ppt-icon.png' class='archivo'>";
                    }
                    // ICONO UNKNOWN
                    else {
                        echo "<img src='icos/unknown-icon.png' class='archivo'>";
                    }

                    echo "</a>";
                    echo $ruta;
            
                ?>

           </div>
            <?php

            }
            mysqli_free_result($resultado);
            ?>


        </div>
    </article>    

    <script src="css/acciones.js"></script>
        
<?php 

    } else {

        header('Location: inicio.php');

    }
include("templates/pie.php"); ?>

