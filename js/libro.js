obtener(); 

function obtener() {
	
	$.ajax({
		url:"ajax/prueba.php",
		method: 'GET',
		//dataType:'json',
		success:function(res){
			console.log(res);
			
		}
	});
}