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
		
		default:
			# code...
			break;
	}
























 ?>