<?php 

	include_once('../Modelo/clase-cliente.php');
	include_once('../Modelo/clase-persona.php');

	

	switch ($_GET["accion"]) {
		case 'obtener':
			echo Cliente::obtenerCliente();
		break;

		case 'infoCliente':
			echo Cliente::infoCliente();
		break;


		case 'add':

			$persona = new Persona(null,
									$_POST['pnombre'],
									$_POST['snombre'],
									$_POST['papellido'],
									$_POST['sapellido'],
									$_POST['direccion'],
									$_POST['numeroid']
			);

			$persona->add();

			$cliente = new Cliente(null, $persona->getidPersona());
			echo $cliente->add();

		
		break;
		
		default:
			# code...
			break;
	}
























 ?>