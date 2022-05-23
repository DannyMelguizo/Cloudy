var archivos = document.getElementById('container')

archivos.addEventListener('click', archivo)

function acciones(ruta){
    

    Swal.fire({
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Descargar',
        denyButtonText: 'Eliminar',
    }).then((result) => {

        //Descarga el archivo
        if (result.isConfirmed) {
            
            window.location.href = "templates/descargarFile.php?file=" + ruta;

        } 
        //Elimina el archivo
        else if (result.isDenied) {
            
            window.location.href = "templates/eliminarFile.php?file=" + ruta;

        }
    })
}


//Obtiene la ruta del archivo
function archivo(elemento){

    if(elemento.target.tagName == "IMG"){

        var ruta = elemento.path[1].attributes[3].value;

        acciones(ruta);

    }
}
