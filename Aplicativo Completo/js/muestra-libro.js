$(document).ready(function(){   
    obtener();
    obtenerAdmi();
    obtenerCliente();
}); 






function obtener() {
    
    $.ajax({
        url:"ajax/gestion-libro.php?accion=infoLibro",
        method: 'GET',
        dataType:'json',
        success:function(res){
            console.log(res);
            
            
        }
    });
}

function obtenerCliente() {
    
    $.ajax({
        url:"ajax/gestion-cliente.php?accion=infoCliente",
        method: 'GET',
        dataType:'json',
        success:function(res){
            console.log(res);
            for (var i = 0; i < res.length; i++) {
               $("#cliente").append(`<option value="${res[i].idCliente}"> ${res[i].PNombre} ${res[i].SApellido}</option>`)
            }
            
            
        }
    });
}

function obtenerAdmi() {
    
    $.ajax({
        url:"ajax/gestion-administrador.php?accion=vistaAdmi",
        method: 'GET',
        dataType:'json',
        success:function(res){
            console.log(res);
            
            
        }
    });
}

function venta(){

    $('#exampleModalScrollable').modal('show');

   
}

function guardar(){

    $('#exampleModalScrollable').modal('show');

    var param = {
        fechafin: $("#fechafin").val(),
        cliente: $("#cliente").val(),
        admi: $("#admi").val(),
        estado: $("#estado").val(),
        libro: $("#libro").val()

    };

    console.log(param);
    
    $.ajax({
        url:"ajax/gestion-registro.php?accion=add",
        method:"POST",
        dataType:'json',
        data: param,
        success:function(res){
            console.log(res);   
        }
    });

}


