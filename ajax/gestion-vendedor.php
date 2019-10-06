<?php 

	include_once('../Modelo/clase-vendedor.php');
	include_once('../Modelo/clase-persona.php');
	include_once('../Modelo/clase-empleado.php');



	switch ($_GET["accion"]) {
		case 'obtener':
			echo Vendedor::obtenerVendedor();

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
			//echo $persona->getidPersona();

			$empleado = new Empleado(null, $persona->getidPersona() );
			$empleado->add();
			//echo $empleado->getidEmpleado();

			$vendedor = new Vendedor(null, $empleado->getidEmpleado() );
			echo $vendedor->add();

			break;

		case 'remove':
			

			echo Vendedor::remove($_POST["id"]);

			break;
		
		
		default:
			# code...
			break;
	}
























 ?>