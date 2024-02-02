function registrar(btn){
    var nombre = document.getElementById("nombre").value;
    var grupo = document.getElementById("grupo").value;
    var grado = document.getElementById("grado").value;

    if(nombre == ""){
        swal('Advertencia','Es necesario ingresar un nombre para poder continuar.','warning');
    }else if(grado == "-1"){
        swal('Advertencia','Es necesario seleccionar un grado para poder continuar.','warning');
    }else if(grupo == "-1"){
        swal('Advertencia','Es necesario seleccionar un grupo para poder continuar.','warning');
    }else if(materiasArray.length == 0){
        swal('Advertencia','Es necesario seleccionar que materias tendrá este grupo para poder continuar.','warning');
    }else{
        document.getElementById("materias").value = JSON.stringify(materiasArray);
        btn.disabled = true;
        document.getElementById("formulario").submit()
    }
}

function materiasFind(){
    materiasArray = [];
    document.getElementById("materiasShow").innerHTML = "";
    var grado = document.getElementById("grado").value;

    var parametros = {
        "grado" : grado
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
                    $('#materiasShow').append('<div class="col-md-12"><input onclick="addMateria('+this.id+')" type="checkbox" /><label>'+this.nombre+'</label></div></div>')
                });
            }
	    }
    });
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