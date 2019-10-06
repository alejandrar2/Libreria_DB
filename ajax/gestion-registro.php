<?php 

	include_once('../Modelo/clase-registro.php');

	

	switch ($_GET["accion"]) {
		case 'obtener':
			echo Registro::obtenerRegistro();
		break;

		case 'add':
			
			$registro = new Registro(null,null,
									$_POST['fechafin'],
									intval($_POST['cliente']),
									intval($_POST['admi']),
									$_POST['estado'],
									null
					                
			);

			echo $registro->addRegistro($_POST['libro']);			

			break;
		
		default:
			# code...
			break;
	}