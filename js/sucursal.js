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
					`<tr id="${res[i].idSucursal}" >
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

			if (res.pcMensaje==1) {

				$("#"+param.id).html(
					`   <th scope="row">${res.idSucursal}</th>
					<td>${param.nombre}</td>
					<td>${param.direccion}</td>
					<td>${param.telefono}</td>
					<td> <button  class="btn btn-outline-success" onclick="informacion(${res.idSucursal});">Editar</button> </td>
					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res.idSucursal});">Eliminar</button></td>`
					);

				$('#exampleModal').modal('hide');

				alert("Registro actualizado");

			} else {
				alert("Error");

			}
			
		}
	});


}

function eliminar(id){
	

	var param = { id: id };

	$.ajax({
		url:"ajax/gestion-sucursal.php?accion=remove",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.pcMensaje==1) {

				alert("Registro eliminado");
				$("#"+param.id).remove();

			} else {
				alert("Error");

			}
			
		}
	});
}

function agregar() {

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

			if (res.Pcmensaje==1) {

				$("#tabla_sucursal").append(
					`<tr id="${res.idSucursal}">
					<th scope="row">${res.idSucursal}</th>
					<td>${param.nombre}</td>
					<td>${param.direccion}</td>
					<td>${param.telefono}</td>
					<td> <button  class="btn btn-outline-success" onclick="informacion(${res.idSucursal});">Editar</button> </td>
					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res.idSucursal});">Eliminar</button></td>
					</tr>`


					);

				$('#exampleModal').modal('hide');

				alert("Registro actualizado");

			} else {
				alert("error");

			}

			
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
				$("#id").val(idSucursal);
			} 

		}
	});
}

function limpiar() {
	$("#nombre").val("");
	$("#direccion").val("");
	$("#telefono").val("");
	$("#correo").val("");
	$("#id").val("");
}