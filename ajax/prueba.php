<?php 

	include_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD']=='GET') {

		$sql = "SELECT * FROM vista_libros";
				
		$resultado = $base_de_datos->prepare($sql);
		$resultado ->execute();

		$tours = array();

		foreach ($resultado as $tour) {
			$tours[] = $tour;
			
		}

		echo json_encode($tours);

}















 ?>