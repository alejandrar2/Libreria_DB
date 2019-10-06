function login(){

	var parametros = {
		correo : $("#correo").val(),
		contrasenia : $("#contrasenia").val()

	};

	$.ajax({
		url:"../ajax/gestion-jefe.php?accion=login",
		method:'POST',
		dataType:'json',
		data: parametros ,
		success:function(res){
			console.log(res);

			if (res.idJefe!=0) {
				location.href= "administrador.html";
			} else {
				alert('Correo o contraseña incorrecta ');
			}
			
		}
	});
}