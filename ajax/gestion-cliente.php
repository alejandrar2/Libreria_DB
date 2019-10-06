<?php 

	include_once('../Modelo/clase-cliente.php');
	

	switch ($_GET["accion"]) {
		case 'obtener':
			echo Cliente::obtenerCliente();
		break;

		case 'infoCliente':
			echo Cliente::infoCliente();
		break;


		case 'add':

			$cliente = new Cliente(null, 0);
			$cliente->add();

			$cliente = new Cliente(null, $_POST["idPersona"]);
			echo $cliente->add();

		break;
		
		default:
			# code...
			break;
	}
























 ?>