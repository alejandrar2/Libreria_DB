obtener(); 

function obtener() {
	
	$.ajax({
		url:"ajax/gestion-vendedor.php?accion=obtener",
		method: 'GET',
		dataType:'json',
		success:function(res){
			//console.log(res);
			for (var i = 0; i < res.length; i++) {

				$("#tabla-vendedor").append(
					`<tr id="${res[i].idVendedor}" >
      					<th scope="row">${i+1}</th>
      					<td>${res[i].PNombre}</td>
      					<td>${res[i].PApellido}</td>
      					<td>${res[i].numero}</td>
      					<td> <button  class="btn btn-outline-success" onclick="editar(${res[i].idVendedor});" >Editar</button> </td>
      					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res[i].idVendedor});">Eliminar</button></td>
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
		url:"ajax/gestion-vendedor.php?accion=eliminar",
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
      					<td> <button  class="btn btn-outline-success" onclick="editar(${res.idVendedor});" >Editar</button> </td>
      					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res.idVendedor});">Eliminar</button></td>
    				</tr>`
				);
			} else {
				alert("error");
			}
			
		}
	});


}