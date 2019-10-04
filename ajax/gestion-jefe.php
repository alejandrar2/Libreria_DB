<?php 

	include_once('../Modelo/clase-jefe.php');
	

	switch ($_GET["accion"]) {

		case 'login':
			echo Jefe::Login($_POST["correo"], $_POST["contrasenia"]);break;

		default:
			# code...
			break;
	}














 ?>