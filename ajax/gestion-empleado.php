<?php 

	include_once('../Modelo/clase-empleado.php');
	

	switch ($_GET["accion"]) {
		case 'obtener':
			Empleado::obtenerEmpleado();
		break;

		case 'add':

			$empleado = new Empleado(null, $_POST['idPersona']);
			echo $empleado->add();				
			//echo $empleado->getidEmpleado();
		
		break;
			default:
			# code...
	}
























 ?>