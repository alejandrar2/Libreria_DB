<?php 
	include_once('../Modelo/clase-administrador.php');


	switch ($_GET["accion"]) {

		case 'vistaAdmi':
		
		   echo	Administrador::infoAdmi();
		
		break;



	}
 ?>