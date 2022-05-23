var archivos = document.getElementById('container')

archivos.addEventListener('click', archivo)

function accionesBin(ruta){
    Swal.fire({
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Restaurar',
        denyButtonText: 'Eliminar',
    }).then((result) => {

        //Restaura el archivo
        if (result.isConfirmed) {
            
            window.location.href = "templates/restaurarFile.php?file=" + ruta;

        } 
        //Elimina permanentemente el archivo
        else if (result.isDenied) {
            
            window.location.href = "templates/eliminar.php?file=" + ruta;


        }
    })
}

//Obtiene la ruta del archivo
function archivo(elemento){

    if(elemento.target.tagName == "IMG"){

        var ruta = elemento.path[1].attributes[2].value;

        accionesBin(ruta);

    }
}