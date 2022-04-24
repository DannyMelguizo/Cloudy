Swal.fire({
    position: 'bot-end',
    icon: 'success',
    title: 'Archivo subido correctamente.',
    showConfirmButton: false,
    timer: 1500
})

setTimeout(function(){
    window.location.href = "index.php"
}, 2500);

