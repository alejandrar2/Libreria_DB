obtener(); 

function obtener() {
	
	$.ajax({
		url:"ajax/gestion-libro.php?accion=obtener",
		method: 'GET',
		dataType:'json',
		success:function(res){
			
			//console.log(res);

			for (var i = 0; i < res.length; i++) {

				$("#tabla-libros").append(
					`<tr id="${res[i].idLibro}" >
					<th scope="row">${i+1}</th>
					<td>${res[i].nombre}</td>
					<td>${res[i].edicion}</td>
					<td> <button  class="btn btn-outline-success" onclick="informacion(${res[i].idLibro});" >Editar</button> </td>
					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res[i].idLibro});">Eliminar</button></td>
					</tr>`
					);
			}
			
		}
	});
}




function eliminar(id){
	
	var param = { id: id };

	//console.log(param);

	$.ajax({
		url:"ajax/gestion-libro.php?accion=remove",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.PcMensaje==1) {

				$("#"+id).remove();

				alert("reguistro eliminado");
			
			} else {
				alert("Error");
			}
			
		}
	});

}

function guardar() {

	var param = {
		nombre: $("#nombre").val(),
		ediccion: $("#ediccion").val(),
		precio: $("#precio").val(),
		prestar: $("#prestar").val(),
		autor: $("#autor").val()


	};

	//console.log(param);
	
	$.ajax({
		url:"ajax/gestion-libro.php?accion=add",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.Pcmensaje==1) {
				$("#tabla-libros").append(
					`<tr id="${res.idLibro}">
					<th scope="row">${res.idLibro}</th>
					<td>${res.nombre}</td>
					<td>${res.edicion}</td>
					<td> <button  class="btn btn-outline-success" onclick="informacion(${res.idLibro});" >Editar</button> </td>
					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res.idLibro});">Eliminar</button></td>
					</tr>`
					);

				alert("reguistro guardado");
				$('#exampleModal').modal('hide');
				limpiar();

			} else {
				alert("Error");
			}
			
		}
	});


}

function limpiar(){
	$("#nombre").val(" ");
	$("#ediccion").val(" ");
	$("#precio").val(" ");
	$("#prestar").val(" ");
}

function informacion(idLibro){
	$('#exampleModal').modal('show');

	var param = {
		id: idLibro
	};

	$.ajax({
		url:"ajax/gestion-libro.php?accion=obtenerUno",
		method: 'POST',
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.length>0) {
				$("#nombre").val(res[0].nombre);
				$("#ediccion").val(res[0].edicion);
				$("#precio").val(res[0].precio);
				$("#prestar").val(res[0].pretar);
				$("#id").val(idLibro);
			} else {}

		}
	});
}

function editar(id){
	
	var param = {
		nombre: $("#nombre").val(),
		ediccion: $("#ediccion").val(),
		precio: $("#precio").val(),
		prestar: $("#prestar").val(),
		id: $("#id").val()

	};

	//console.log(param);

	$.ajax({
		url:"ajax/gestion-libro.php?accion=editar",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.PcMensaje==1) {

				$("#"+id).html(
					`<th scope="row">${param.id}</th>
					<td>${param.nombre}</td>
					<td>${param.ediccion}</td>
					<td> <button  class="btn btn-outline-success" onclick="informacion(${param.id});" >Editar</button> </td>
					<td><button type="button" class="btn btn-danger" onclick="eliminar(${param.id});">Eliminar</button></td>
					`
					);

				alert("reguistro actualizado");
				$('#exampleModal').modal('hide');


			} else {
				alert("Error");
			}
			
		}
	});


}


