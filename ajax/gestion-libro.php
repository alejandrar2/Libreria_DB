<?php 

	include_once('../Modelo/clase-libro.php');
	include_once('../Modelo/clase-facturaEncabezado.php');
	include_once('../Modelo/clase-facturaDetalle.php');
	

	switch ($_GET["accion"]) {
		
		case 'obtener':
			echo Libro::obtenerLibro();
		break;

		case 'obtenerUno':
			echo Libro::obtenerUno($_POST["id"]);
		break;

		case 'add':
			$libro = new Libro(null,
									$_POST['nombre'],
									$_POST['ediccion'],
									$_POST['precio'],
									$_POST['prestar']
								
			);
			echo $libro->add($_POST['autor']);

		break;

		case 'editar':

			$libro = new Libro($_POST['id'],
									$_POST['nombre'],
									$_POST['ediccion'],
									$_POST['precio'],
									$_POST['prestar']
								
			);
			echo $libro->editar();
			
		break;

		case 'remove':
		
			echo Libro::remove($_POST['id']);

		break;

		case 'infoLibro':
		   echo	Libro::infoLibro();
		
		break;

		case 'generarFactura':
		
		   $factura = new Factura(null, $_POST['cliente'], $_POST['vendedor'], null);
		   $factura->add();

		   $factura->getidFacturaEncabezado();

		   $facturaD = new FacturaDetalle(null, 1, $factura->getidFacturaEncabezado(), $_POST['libro'] );

		   $facturaD->add();
		   $facturaD->getidFacturaDetalle();

		   $pago = FacturaDetalle::addPago($_POST['libro']);
		   
		   $factura->getidFacturaEncabezado();

		   echo FacturaDetalle::pagoFactura( $pago, $factura->getidFacturaEncabezado() );



		
		break;
	}











 ?>