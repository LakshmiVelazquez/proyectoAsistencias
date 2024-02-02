function buscarAsistencias(){
    document.getElementById("asistenciasTable").innerHTML = "";
    var parametros = {
        "fecha" : document.getElementById("fecha").value,
        "grupo" : document.getElementById("grupo").value,
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