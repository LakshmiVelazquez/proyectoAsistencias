function buscarAsistencias(){
    document.getElementById("asistenciasTable").innerHTML = "";
    var parametros = {
        "alumno" : document.getElementById("alumno").value
    };
    var url = "./asistencias/asistenciasTable";
    $.ajax({       
	    url: url,                     
	    data: parametros, 
	    success: function(data){
            document.getElementById("asistenciasTable").innerHTML = data;
	    }
    });
}

buscarAsistencias();