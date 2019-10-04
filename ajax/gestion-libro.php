<?php 

	include_once('../Modelo/clase-libro.php');
	

	switch ($_GET["accion"]) {
		
		case 'obtener':
			echo Libro::obtenerLibro();
		break;

		case 'add':
			$libro = new Libro(null,
									$_POST['nombre'],
									$_POST['edicion'],
									$_POST['precio'],
									$_POST['prestar']
								
			);

			$res = $libro->add();

			break;
		
		default:
			# code...
			break;
	}











 ?>