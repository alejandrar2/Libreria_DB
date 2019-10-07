function obtener() {
	
	$.ajax({
		url:"ajax/gestion-registro.php?accion=obtener",
		method: 'GET',
		dataType:'json',
		success:function(res){
			console.log(res);
			for (var i = 0; i < res.length; i++) {

				$("#tabla-registros").append(
					`<tr>" >
					<th scope="row">${i+1}</th>
					<td>${res[i].PNombre} ${res[i].PApellido}</td>
					<td>${res[i].nombre}</td>
					<td>${res[i].fechaInicio}</td>
					<td> <button  class="btn btn-outline-success" onclick="factura( ${res[i].idLibro}, ${res[i].idVendedor}, ${res[i].idCliente }  );" >Generar Factura</button> </td>
					</tr>`
					);
			}
			
		}
	});
}

obtener();

function factura(libro, vendedor, cliente) {
	
	console.log(libro, vendedor, cliente);


	var param = {
		libro: libro,
		vendedor: vendedor,
		cliente: cliente
	};

	//console.log(param);
	
	$.ajax({
		url:"ajax/gestion-libro.php?accion=generarFactura",
		method:"POST",
		dataType:'json',
		data: param,
		success:function(res){
			console.log(res);

			if (res.pcMensaje==1) {
				
				window.location=`factura.php?cliente=${cliente}&libro=${libro}&vendedor=${vendedor}`;

			} else {
				alert("Error");
			}
			
		}
	});






}