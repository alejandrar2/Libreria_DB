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

            for (var i = 0; i < res.length; i++) {

                $("#libros").append(`

                    <div class="col-md-3 mb-4">
                    <div class="card ">
                    <img src="img/libro.jpg" class="card-img-top " alt="...">
                    <div  style="background-color: #FFC107" class="card-body ">
                    <input type="hidden" class="form-control" id="libro" value="${res[i].idLibro}">
                    <h5 class="card-title">${res[i].NombreLibro}</h5>
                    <p style="color:#535759" class="card-text">Autor: ${res[i].nombre}<br>
                    Edicion: ${res[i].edicion}
                    <br>Precio: ${res[i].precio} </p>
                    <button onclick="venta();" style="background-color: white" class="btn btn-block ">Adquirir</button>
                    </div>
                    </div>
                    </div>

                    `);
                

            }
            
            
            
        }
    });
}

function obtenerCliente() {

    $.ajax({
        url:"ajax/gestion-cliente.php?accion=infoCliente",
        method: 'GET',
        dataType:'json',
        success:function(res){

            //console.log(res);
            for (var i = 0; i < res.length; i++) {
                $("#admi").append(`<option value="${res[i].idCliente}"> ${res[i].PNombre} ${res[i].SApellido}</option>`);

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
            for (var i = 0; i < res.length; i++) {
                $("#cliente").append(`<option value="${res[i].idAdministrador}"> ${res[i].PNombre} ${res[i].SApellido}</option>`);

            }

            
        }
    });
}

function venta(){

    $('#exampleModalScrollable').modal('show');

}

function guardar(){

    limpiar();

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
            if (res.pcmensaje==1) {
                $('#exampleModalScrollable').modal('hide');
                alert("Registro guardado");

            } else {
                alert("Error");
                
                
            }   
        }
    });

}

function limpiar() {
   $("#fechafin").val("");
   $("#cliente").val(0);
   $("#admi").val(0);
   $("#estado").val("");
}