

//Si el usuario intenta cargar un archivo sin haberlo seleccionado
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