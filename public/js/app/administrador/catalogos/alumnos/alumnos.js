function registrar(btn){
    var nombre = document.getElementById("nombre").value;
    var telefono = document.getElementById("telefono").value;
    var matricula = document.getElementById("matricula").value;

    
    var nombre_padre = document.getElementById("nombre_padre").value;
    var direccion = document.getElementById("direccion").value;
    var telefono_padre = document.getElementById("telefono_padre").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if(nombre == ""){
        swal('Advertencia','Es necesario ingresar un nombre para poder continuar.','warning');
    }else if(telefono == "-1"){
        swal('Advertencia','Es necesario un número de teléfono para poder continuar.','warning');
    }else if(matricula == ""){
        swal('Advertencia','Es necesario ingresar un correo electronico para poder continuar.','warning');
    }else if(nombre_padre == ""){
        swal('Advertencia','Es necesario ingresar el nombre del padre de familia para poder continuar.','warning');
    }else if(direccion == ""){
        swal('Advertencia','Es necesario ingresar la dirección del padre de familia para poder continuar.','warning');
    }else if(telefono_padre == ""){
        swal('Advertencia','Es necesario ingresar el teléfono del padre de familia para poder continuar.','warning');
    }else if(email == ""){
        swal('Advertencia','Es necesario ingresar el correo electronico del padre de familia para poder continuar.','warning');
    }else if(password == ""){
        swal('Advertencia','Es necesario ingresar la nueva contraseña del sistema para el padre de familia para poder continuar.','warning');
    }else if(gruposArray.length == 0){
        swal('Advertencia','Es necesario seleccionar los grupos o el grupo al que pertecence este alumno.','warning');
    }else{
        document.getElementById("grupos").value = JSON.stringify(gruposArray);
        btn.disabled = true;
        document.getElementById("formulario").submit()
    }
}

function gruposFind(){
    document.getElementById("gruposShow").innerHTML = "";
    var parametros = {
        "grado" : document.getElementById("nivel").value
    };
    var url = urlGrupos;
    $.ajax({       
	    url: url,                     
	    data: parametros, 
	    success: function(data){
            var datos = data["datos"];
            if(datos.length == 0){
                document.getElementById("gruposShow").innerHTML = '<p class="ml-3 text-danger">Selecciona un grado para mostrar materias.</p>';
            }else{
                $.each(datos, function(){
                    $('#gruposShow').append('<div class="col-md-12"><input id="grupo_'+this.id+'" onclick="addGrupo('+this.id+')" type="checkbox" /><label>'+this.nombre+'</label></div></div>')
                });
                selected();
            }
	    }
    });
}


var gruposArray = [];

function addGrupo(id){
    if(gruposArray.length == 0){
        gruposArray.push(id);
    }else{
        var x = false;
        for(var i = 0; i < gruposArray.length; i++){
            if(gruposArray[i] == id){
                gruposArray.splice(i,1);
                x = true;
                break;
            }
        }

        if(x == false){
            gruposArray.push(id);
        }
    }
}

function selected(){
    for(var i = 0; i < gruposArray.length; i++){
        document.getElementById("grupo_"+gruposArray[i]).checked = true;
    }
}

function addDatos(){
    $('#modalPadres').modal('show');
}

function seleccionar(){
    var padre = document.getElementById("padre_id").value;

    var parametros = {
        "padre" : padre
    };
    var url = "./datosPadre";
    $.ajax({       
	    url: url,                     
	    data: parametros, 
	    success: function(data){
            document.getElementById("nombre_padre").value = data.nombre;
            document.getElementById("telefono_padre").value = data.telefono;
            document.getElementById("direccion").value = data.direccion;
            document.getElementById("email").value = data.user.email;
            document.getElementById("password").value = "*******";
	    }
    });
    $('#modalPadres').modal('hide');
}