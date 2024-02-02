function registrar(btn){
    var nombre = document.getElementById("nombre").value;
    var grado = document.getElementById("grado").value;

    if(nombre == ""){
        swal('Advertencia','Es necesario ingresar un nombre para poder continuar.','warning');
    }else if(grado == "-1"){
        swal('Advertencia','Es necesario seleccionar un grado poder continuar.','warning');
    }else{
        btn.disabled = true;
        document.getElementById("formulario").submit()
    }
}

function actualizar(btn){
    var nombre = document.getElementById("nombre").value;
    var grado = document.getElementById("grado").value;

    if(nombre == ""){
        swal('Advertencia','Es necesario ingresar un nombre para poder continuar.','warning');
    }else if(grado == "-1"){
        swal('Advertencia','Es necesario seleccionar un grado poder continuar.','warning');
    }else{
        btn.disabled = true;
        document.getElementById("formulario").submit()
    }
}