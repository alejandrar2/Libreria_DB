<?php 

	include_once('../Modelo/clase-registro.php');

	

	switch ($_GET["accion"]) {
		case 'obtener':
			Registro::obtenerRegistro();
			break;

		case 'add':
			
			$registro = new Registro(null,null,
									$_POST['fechafin'],
									$_POST['cliente'],
									$_POST['admi'],
									$_POST['estado'],
									null
					                
			);

			//$registro->add($_POST['libro']);
			//echo $registro->getidregistro();

			echo json_encode($_POST);
			

			

			break;
		
		default:
			# code...
			break;
	}