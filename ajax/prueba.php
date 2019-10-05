<?php 

	include_once '../Modelo/clase-registro.php';

	$registro = new Registro(null, null,'12/08/2019',1,1,'disponible',0);
	echo $registro->addRegistro(2);


















 ?>