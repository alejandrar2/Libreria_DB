<?php 

	include_once('../Modelo/clase-persona.php');
	include_once('../Modelo/clase-cliente.php');

	

	switch ($_GET["accion"]) {
		case 'obtener':
			Persona::obtenerUltmoId();
			break;

		case 'add':
			$persona = new Persona(null,
									$_POST['PNombre'],
									$_POST['SNombre'],
									$_POST['PApellido'],
									$_POST['SApellido'],
									$_POST['direccion'],
									$_POST['numeroId']
			);

			$res = $persona->add();

			$idPersona = $res["idPersona"];

			$cliente = new Cliente(null, $idPersona);
			$cliente->add();
			

			break;

		case 'editar':

			$persona = new Persona($_POST['id'],
									$_POST['PNombre'],
									$_POST['SNombre'],
									$_POST['PApellido'],
									$_POST['SApellido'],
									$_POST['direccion'],
									$_POST['numeroID'],
								
			)
			echo $persona->editar();
			
		break;

		case 'remove':
		
			echo persona::remove($_POST['id']);

		break;
		
	}
























 ?>