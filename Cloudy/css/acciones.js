function acciones(ruta){
    

    Swal.fire({
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Descargar',
        denyButtonText: 'Eliminar',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            
            window.location.href = "templates/descargarFile.php?file=" + ruta;

        } else if (result.isDenied) {
            
            window.location.href = "templates/eliminarFile.php?file=" + ruta;


        }
    })
}

function accionesBin(ruta){
    Swal.fire({
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Restaurar',
        denyButtonText: 'Eliminar',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            
            window.location.href = "templates/restaurarFile.php?file=" + ruta;

        } else if (result.isDenied) {
            
            window.location.href = "templates/eliminar.php?file=" + ruta;


        }
    })
}


function noHayArchivo(){
    Swal.fire({
        position: 'bottom-end',
        icon: 'warning',
        title: 'Ningun archivo cargado.',
        showConfirmButton: false,
        timer: 1500
    })
}

function redireccionar(){
    //Imprime notificacion de archivo subido correctamente
    Swal.fire({
        position: 'bottom-end',
        icon: 'success',
        title: 'Archivo subido correctamente.',
        showConfirmButton: false,
        timer: 1500
    })

    //Redirige al usuario a la pantalla de inicio
    setTimeout(function(){
        window.location.href = "index.php"
    }, 2500);
}
