obtener(); 
//console.log("fh");

function obtener() {
	
	$.ajax({
		url:"ajax/gestion-sucursal.php?accion=obtener",
		method: 'GET',
		dataType:'json',
		success:function(res){
			console.log(res);
			for (var i = 0; i < res.length; i++) {

				$("#tabla_sucursal").append(
					`<tr>
      					<th scope="row">${i+1}</th>
      					<td>${res[i].nombre}</td>
      					<td>${res[i].direccion}</td>
      					<td>${res[i].telefono}</td>
      					<td> <button  class="btn btn-outline-success" onclick="informacion(${res[i].idSucursal});" >Editar</button> </td>
      					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res[i].idSucursal});">Eliminar</button></td>
    				</tr>`
				);
			}
			
		}
	});
}

function editar(id){
	
	var param = {
		id: $("#id").val(),
		nombre: $("#nombre").val(),
		direccion: $("#direccion").val(),
		telefono: $("#telefono").val(),
		correo: $("#correo").val()

	};

	console.log(param);
	
	$.ajax({
		url:"ajax/gestion-sucursal.php?accion=editar",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);
			
		}
	});


}

function eliminar(id){
	

	var param = { id: id };

	$.ajax({
		url:"ajax/gestion-sucursal.php?accion=eliminar",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);
			
		}
	});
}

function guardar() {

	var param = {
		nombre: $("#nombre").val(),
		direccion: $("#direccion").val(),
		telefono: $("#telefono").val(),
		correo: $("#correo").val()

	};

	console.log(param);
	
	$.ajax({
		url:"ajax/gestion-sucursal.php?accion=add",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);
			
		}
	});


}

function limpiar(){
	$("#nombre").val(" ");
	$("#direccion").val(" ");
	$("#telefono").val(" ");
	$("#correo").val(" ");
}

function informacion(idSucursal){
	$('#exampleModal').modal('show');

	var param = {
		id: idSucursal
	};

	$.ajax({
		url:"ajax/gestion-sucursal.php?accion=obtenerUno",
		method: 'POST',
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.length>0) {
				$("#nombre").val(res[0].nombre);
				$("#direccion").val(res[0].direccion);
				$("#telefono").val(res[0].telefono);
				$("#correo").val(res[0].correo);
				$("#id").val(res[0].idSucursal),
			} else {}
						
		}
	});
}