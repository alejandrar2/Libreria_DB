<?php 

	include 'Modelo/conexion.php';

	$libro = $_GET["libro"];
	$vendedor = $_GET["vendedor"];
	$cliente = $_GET["cliente"];


	$sql = "SELECT (p.PNombre +' ' +p.PApellido) Cliente, (p.PNombre+' ´'+ p.PApellido) vendedor FROM cliente c 
			INNER JOIN persona p ON p.idPersona=c.idPersona
			INNER JOIN empleado e ON e.idEmpleado=p.idPersona
			INNER JOIN vendedor v ON v.idEmpleado=e.idEmpleado
			WHERE idvendedor='$vendedor' AND idCliente=$cliente";
	

	$res = $base_de_datos->query($sql); 

		foreach ($res as $row) {
			$datos[] = $row;
			$v_cliente = $row["Cliente"];
			$v_vendedor = $row["vendedor"];

		}
	
	echo $v_vendedor . "<br>";

	echo $v_cliente;


 ?>