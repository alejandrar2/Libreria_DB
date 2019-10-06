obtener(); 

function obtener() {
	
	$.ajax({
		url:"ajax/gestion-vendedor.php?accion=obtener",
		method: 'GET',
		dataType:'json',
		success:function(res){
			console.log(res);
			for (var i = 0; i < res.length; i++) {

				$("#tabla-vendedor").append(
					`<tr id="${res[i].idVendedor}" >
					<th scope="row">${i+1}</th>
					<td>${res[i].PNombre}</td>
					<td>${res[i].PApellido}</td>
					<td>${res[i].numero}</td>
					<td> <button  class="btn btn-outline-success" onclick="informacion( ${res[i].idPersona}, ${res[i].idVendedor} );" >Editar</button> </td>
					<td><button type="button" class="btn btn-danger" onclick="eliminar( ${res[i].idPersona}, ${res[i].idVendedor} );">Eliminar</button></td>
					</tr>`
					);
			}
			
		}
	});
}

function editar(){

	var param = {
		id: $("#id").val(),
		idv: $("#idv").val(),
		pnombre: $("#pnombre").val(),
		snombre: $("#snombre").val(),
		papellido: $("#papellido").val(),
		sapellido: $("#sapellido").val(),
		direccion: $("#direccion").val(),
		numeroid: $("#numeroid").val()


	};

	console.log(param);
	
	$.ajax({
		url:"ajax/gestion-persona.php?accion=editar",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.PcMensaje==1) {
				alert("Se actualizo");

				$("#"+idv).html(
					`<th scope="row">${param.idv}</th>
					<td>${param.pnombre}</td>
					<td>${param.snombre}</td>
					<td>${param.numeroid}</td>
					<td> <button  class="btn btn-outline-success" onclick="informacion(${id}, ${param.idv});" >Editar</button> </td>
					<td><button type="button" class="btn btn-danger" onclick="eliminar(${id}, ${param.idv});">Eliminar</button></td>
					`
					);
			} else {
				alert("error");
			}
			
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
		url:"ajax/gestion-vendedor.php?accion=add",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.Pcmensaje==1) {
				alert("Se guardo");
				$("#tabla-vendedor").append(
					`<tr id="${res.idVendedor}" >
					<th scope="row">${res.idVendedor}</th>
					<td>${param.pnombre}</td>
					<td>${param.snombre}</td>
					<td>${param.numeroid}</td>
					<td> <button  class="btn btn-outline-success" onclick="informacion(${res.idVendedor});" >Editar</button> </td>
					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res.idVendedor});">Eliminar</button></td>
					</tr>`
					);
			} else {
				alert("error");
			}
			
		}
	});
}

function eliminar(id, vendedor){
	


	var param = { id: id };

	$.ajax({
		url:"ajax/gestion-vendedor.php?accion=remove",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			
			console.log(res);


			if (res.PcMensaje==1) {
				
				$("#"+vendedor).remove();
					alert("Se Elimino");
				
			} else {
				alert("error");
			}

			
		}
	});
}

function informacion(id, vendedor) {

	$('#exampleModal').modal('show');


	console.log(id);

	var param = { id: id };

	$.ajax({
		url:"ajax/gestion-persona.php?accion=uno",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			$("#pnombre").val(res.PNombre);
			$("#snombre").val(res.SNombre);
			$("#papellido").val(res.PApellido);
			$("#sapellido").val(res.SApellido);
			$("#direccion").val(res.direccion);
			$("#numeroid").val(res.numerodeID);
			$("#id").val(res.idPersona);
			$("#idv").val(vendedor);



			
		}
	});
}