obtener(); 

function obtener() {
	
	$.ajax({
		url:"ajax/gestion-libro.php?accion=obtener",
		method: 'GET',
		dataType:'json',
		success:function(res){
			console.log(res);
			for (var i = 0; i < res.length; i++) {

				$("#tabla-libros").append(
					`<tr>
      					<th scope="row">${i+1}</th>
      					<td>${res[i].nombreLibro}</td>
      					<td>${res[i].nombreAutor}</td>
      					<td> <button  class="btn btn-outline-success" onclick="editar(${res[i].idLibro});" >Editar</button> </td>
      					<td><button type="button" class="btn btn-danger" onclick="eliminar(${res[i].idLibro});">Eliminar</button></td>
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
		url:"ajax/gestion-libro.php?accion=eliminar",
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
		ediccion: $("#ediccion").val(),
		precio: $("#precio").val(),
		prestar: $("#prestar").val()

	};

	console.log(param);
	
	$.ajax({
		//url:"ajax/gestion-libro.php?accion=add",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);
			
		}
	});


}