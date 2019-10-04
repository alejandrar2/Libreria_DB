<?php 

	include_once('../Modelo/clase-vendedor.php');
	

	switch ($_GET["accion"]) {
		case 'obtener':
			Vendedor::obtenerVendedor();
			break;
			case 'add':
			$vendedor = new Vendedor(null,
									$_POST['idEmpleado']

			$res = $persona->add();

			echo $vendedor->getidVendedor();


			break;
		
		
		default:
			# code...
			break;
	}
























 ?>