function registrar(btn){
    var nombre = document.getElementById("nombre").value;
    var telefono = document.getElementById("telefono").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password_c = document.getElementById("password_c").value;

    if(nombre == ""){
        swal('Advertencia','Es necesario ingresar un nombre para poder continuar.','warning');
    }else if(telefono == "-1"){
        swal('Advertencia','Es necesario un número de teléfono para poder continuar.','warning');
    }else if(gruposArray.length == 0){
        swal('Advertencia','Es necesario seleccionar los grupos a los que este maestro impartira para poder continuar.','warning');
    }else if(materiasArray.length == 0){
        swal('Advertencia','Es necesario seleccionar las materias que este maestro impartira en estos grupos para poder continuar.','warning');
    }else if(email == ""){
        swal('Advertencia','Es necesario ingresar un correo electronico para poder continuar.','warning');
    }else if(password == ""){
        swal('Advertencia','Es necesario ingresar una nueva contraseña para poder continuar.','warning');
    }else if(password_c == ""){
        swal('Advertencia','Es necesario ingresar una confirmación de la nueva contraseña para poder continuar.','warning');
    }else if(password != password_c ){
        swal('Advertencia','Es necesario que ambas contraseñas coincidan para poder continuar.','warning');
    }else{
        document.getElementById("materias").value = JSON.stringify(materiasArray);
        document.getElementById("grupos").value = JSON.stringify(gruposArray);
        btn.disabled = true;
        document.getElementById("formulario").submit()
    }
}

var gruposArray = [];

function addGrupo(id){
    if(gruposArray.length == 0){
        gruposArray.push(id);
        materiasFind();
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
            materiasFind();
        }
    }
}

var materiasArray = [];
function addMateria(id){
    if(materiasArray.length == 0){
        materiasArray.push(id);
    }else{
        var x = false;
        for(var i = 0; i < materiasArray.length; i++){
            if(materiasArray[i] == id){
                materiasArray.splice(i,1);
                x = true;
                break;
            }
        }

        if(x == false){
            materiasArray.push(id);
        }
    }
}

function materiasFind(){
    document.getElementById("materiasShow").innerHTML = "";
    var parametros = {
        "grupos" : gruposArray
    };
    var url = urlMaterias;
    $.ajax({       
	    url: url,                     
	    data: parametros, 
	    success: function(data){
            var datos = data["datos"];
            if(datos.length == 0){
                document.getElementById("materiasShow").innerHTML = '<p class="ml-3 text-danger">Selecciona un grado para mostrar materias.</p>';
            }else{
                $.each(datos, function(){
                    $('#materiasShow').append('<div class="col-md-12"><input id="materia_'+this.materia.id+'" onclick="addMateria('+this.materia.id+')" type="checkbox" /><label>'+this.materia.nombre+'</label></div></div>')
                });
                selected();
            }
	    }
    });
}

function selected(){
    for(var i = 0; i < materiasArray.length; i++){
        document.getElementById("materia_"+materiasArray[i]).checked = true;
    }
}