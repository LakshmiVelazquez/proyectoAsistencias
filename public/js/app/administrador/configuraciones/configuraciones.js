function actualizar(btn){
    var user = document.getElementById("user").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password_c = document.getElementById("password_c").value;

    if(user == ""){
        swal('Advertencia','Es necesario ingresar un nombre de usuario para poder continuar.','warning');
    }else if(email == ""){
        swal('Advertencia','Es necesario ingresar un correo electronico para poder continuar.','warning');
    }else if(password != "" || password_c != ""){
        if(password == ""){
            swal('Advertencia','Es necesario ingresar una nueva contraseña para poder continuar.','warning');
        }else if(password_c == ""){
            swal('Advertencia','Es necesario ingresar una confirmación de la nueva contraseña para poder continuar.','warning');
        }else if(password != password_c ){
            swal('Advertencia','Es necesario que ambas contraseñas coincidan para poder continuar.','warning');
        }else{
            btn.disabled = true;
            document.getElementById("formulario").submit()
        }
    }else{
        btn.disabled = true;
        document.getElementById("formulario").submit()
    }
}