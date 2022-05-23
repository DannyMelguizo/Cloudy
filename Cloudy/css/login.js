
//Logear un usuario
$("#enviarLogin").click(function(event){
    event.preventDefault();

    //Almacenamos el usuario en una variable
    var usuario = $('#usuario2').val();

    //Almacenamos la contraseña en una variable
    var password =  $('#password2').val();

    //Si el usuario deja algun campo vacio, imprime una alerta
    if(usuario.length == '' || password.length == ''){
        Swal.fire({
            icon: 'warning',
            title: 'Debe ingresar un Correo y/o Contraseña'
        })
    } else {

        //Conexion con la base de datos, mediante jQuery -- ajax
        jQuery.ajax({
            url: 'db/login.php',
            type: 'POST',
            data: {usuario: usuario, password: password},
            beforeSend: function(){

            }
        })
        .done(function(respuesta){

            //Si el usuario se encuentra registrado, imprime un mensaje y redirige
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

            } 
            //Si el usuario no se encuentra registrado, imprime un error
            else {
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