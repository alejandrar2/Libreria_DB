<?php 

	include_once('../Modelo/clase-sucursal.php');
	

	switch ($_GET["accion"]) {
		case 'obtener':
			echo Sucursal::obtenerSucursal();
		break;

		case 'obtenerUno':
			echo Sucursal::obtenerUno($_POST["id"]);
		break;

		case 'add':
			$sucursal = new Sucursal(null,
									$_POST['nombre'],
									$_POST['direccion'],
									$_POST['telefono'],
									$_POST['correo']
								
			);

			echo $sucursal->add();

			break;

		case 'editar':
			$sucursal = new Sucursal($_POST['id'],
									$_POST['nombre'],
									$_POST['direccion'],
									$_POST['telefono'],
									$_POST['correo']
								
			);

			echo $sucursal->editar();

			break;

			case 'remove':
			echo Sucursal::remove($_POST["id"]);
				# code...
				break;
		
		default:
			# code...
			break;
	}