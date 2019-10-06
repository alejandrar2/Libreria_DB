
function obtener() {
    
    $.ajax({
        url:"ajax/gestion-libro.php?accion=infoLibro",
        method: 'GET',
        dataType:'json',
        success:function(res){
            console.log(res);

            for (var i = 0; i < res.length; i++) {
                $("#div-libros").append(`
                    <div class="card " style="width: 18rem;">
            <img src="img/libro.jpg" class="card-img-top" alt="...">
            <div  style="background-color: #FFC107" class="card-body ">
                <h5 class="card-title">${res[i].nombre}</h5>
                <input id="id" class="form-control" type="hidden" value="${res[i].idLibro}" >
                <p style="color:#535759" class="card-text">Autor: Gloria Montano<br>Edicion: 12va <br>Precio: 200  </p>
                <button onclick="venta();" style="background-color: white" class="btn btn-block ">Adquirir</button>
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
            console.log(res);
            for (var i = 0; i < res.length; i++) {
               $("#cliente").append(`<option value="${res[i].idCliente}">${res[i].PNombre} ${res[i].SApellido}</option>`)
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

    var param = {
        fechafin: $("#fechafin").val(),
        cliente: $("#cliente").val(),
        admi: $("#admi").val(),
        libro: $("#id").val(),
        estado: $("#estado").val()

    };

    console.log(param);
    
    $.ajax({
        url:"ajax/gestion-registro.php?accion=add",
        method:"POST",
        //dataType:'json',
        data: param,
        success:function(res){
            console.log(res);   
        }
    });
}

 obtener();
 obtenerAdmi();
 obtenerCliente();