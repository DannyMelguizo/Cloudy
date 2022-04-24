$("#enviarLogin").click(function(event){
    event.preventDefault();

    var usuario = $('#usuario2').val();
    var password =  $('#password2').val();

    if(usuario.length == '' || password.length == ''){
        Swal.fire({
            icon: 'warning',
            title: 'Debe ingresar un Correo y/o Contraseña'
        })
    } else {

        jQuery.ajax({
            url: 'db/login.php',
            type: 'POST',
            data: {usuario: usuario, password: password},
            beforeSend: function(){

            }
        })
        .done(function(respuesta){
            if(respuesta == "No"){
                Swal.fire({
                    icon: 'success',
                    title: 'Conexion exitosa',
                    showConfirmButton: false,
                    timer: 1000
                }).then(setTimeout(function(){
                    window.location.href = "index.php"
                    }, 1500)
                )                

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Correo y/o Contraseña incorrectas.'

                });
            }
        })
        .fail(function(resp){
            console.log(resp.responseText);
        })
        .always(function(){
            console.log('complete');
        });
    }
});