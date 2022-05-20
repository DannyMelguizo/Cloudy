$("#enviarCreate").click(function(event){
    event.preventDefault();

    //Almacenamos el usuario en una variable
    var usuario = $('#usuario1').val();

    //Almacenamos la contraseña en una variable
    var password =  $('#password1').val();

    var validarPassword = $('#confirmar').val();

    //Si el usuario deja algun campo vacio, imprime una alerta
    if(usuario.length == '' || password.length == '' || validarPassword ==''){
        Swal.fire({
            icon: 'warning',
            title: 'Debe rellenar todos los campos.'
        })

    } else if (password != validarPassword){
        Swal.fire({
            icon: 'warning',
            title: 'Las contraseñas no coinciden.'
        })

    } else { 

        //Conexion con la base de datos, mediante jQuery -- ajax
        jQuery.ajax({
            url: 'db/create.php',
            type: 'POST',
            data: {usuario: usuario, password: password},
            beforeSend: function(){

            }
        })
        .done(function(respuesta){

            //Si el usuario se encuentra registrado, imprime un mensaje y redirige
            if(respuesta == "Si"){
                Swal.fire({
                    icon: 'error',
                    title: 'El usuario ya se encuentra registrado.'

                });              

            } 
            //Si el usuario no se encuentra registrado, imprime un error
            else {
                Swal.fire({
                    icon: 'success',
                    title: 'Cuenta creada exitosamente.',
                    showConfirmButton: false

                }).then(setTimeout(function(){
                    window.location.href = "inicio.php"
                    }, 1500)
                ) 
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