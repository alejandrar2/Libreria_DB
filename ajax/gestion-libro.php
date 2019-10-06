<?php 

	include_once('../Modelo/clase-libro.php');
	

	switch ($_GET["accion"]) {
		
		case 'obtener':
			echo Libro::obtenerLibro();
		break;

		case 'obtenerUno':
			echo Libro::obtenerUno($_POST["id"]);
		break;

		case 'add':
			$libro = new Libro(null,
									$_POST['nombre'],
									$_POST['ediccion'],
									$_POST['precio'],
									$_POST['prestar']
								
			);
			echo $libro->add();

		break;

		case 'editar':

			$libro = new Libro($_POST['id'],
									$_POST['nombre'],
									$_POST['ediccion'],
									$_POST['precio'],
									$_POST['prestar']
								
			);
			echo $libro->editar();
			
		break;

		case 'remove':
		
			echo Libro::remove($_POST['id']);

		break;

		case 'infoLibro':
		   echo	Libro::infoLibro();
		
			break;
	}











 ?>