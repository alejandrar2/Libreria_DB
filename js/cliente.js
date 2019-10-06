obtener(); 

function obtener() {
	
	$.ajax({
		url:"ajax/gestion-cliente.php?accion=obtener",
		method: 'GET',
		dataType:'json',
		success:function(res){
			console.log(res);
			for (var i = 0; i < res.length; i++) {

				$("#tabla-clientes").append(
					`<tr id="${res[i].idCliente}" >
      					<th scope="row">${i+1}</th>
      					<td>${res[i].PNombre}</td>
      					<td>${res[i].PApellido}</td>
      					<td>${res[i].direccion}</td>
      					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res[i].idCliente});">Eliminar</button></td>
    				</tr>`
				);
			}
			
		}
	});
}

function editar(id){
	console.log("el id es " + id);


}

function eliminar(id){
	console.log("el id es " + id);

	var param = { id: id };

	$.ajax({
		url:"ajax/gestion-cliente.php?accion=eliminar",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			
			
		}
	});
}

function guardar() {

	var param = {
		pnombre: $("#pnombre").val(),
		snombre: $("#snombre").val(),
		papellido: $("#papellido").val(),
		sapellido: $("#sapellido").val(),
		direccion: $("#direccion").val(),
		numeroid: $("#numeroid").val()

	};

	console.log(param);
	
	$.ajax({
		url:"ajax/gestion-cliente.php?accion=add",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){

			console.log(res);

			if (res.pcMensaje==3) {

				$('#exampleModalScrollable').modal('hide');
                alert("Registro guardado"); 

				$("#tabla-clientes").append(
					`<tr id="${res.IdCliente}" >
      					<th scope="row">${res.IdCliente}</th>
      					<td>${param.pnombre}</td>
      					<td>${param.papellido}</td>
      					<td>${param.direccion}</td>
      					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res.IdCliente});">Eliminar</button></td>
    				</tr>`
				);

			} else {
                alert("Error"); 

			}
			
		}
	});


}