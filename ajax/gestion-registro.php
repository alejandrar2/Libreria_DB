<?php 

	include_once('../Modelo/clase-registro.php');

	

	switch ($_GET["accion"]) {
		case 'obtener':
			Registro::obtenerRegistro();
			break;

		case 'add':
			
			$registro = new Registro(null,null,
									$_POST['fechafin'],
									$_POST['idCliente'],
									$_POST['idAdministrador'],
									$_POST['estado'],
									$_POST['multa']
					                
			);

			$res = $registro->add($_POST['idLibro']);
			echo $registro->getidregistro();
			

			

			break;
		
		default:
			# code...
			break;
	}