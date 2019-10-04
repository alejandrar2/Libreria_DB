<?php 


$serverName = "MAJO";
$connectionInfo = array( "Database"=>"Almacenados", "UID"=>"sa1", "PWD"=>"1234");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false) {
	die( print_r( sqlsrv_errors(), true));
}

	 


?>