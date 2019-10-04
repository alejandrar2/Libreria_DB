function obtenerLibros(){

	
	$.ajax({
		url:"ajax/gestion-libro.php?accion=obtener",
		method:'POST',
		dataType:'json',
		success:function(res){
			console.log(res);

			
		}
	});
}

obtenerLibros();