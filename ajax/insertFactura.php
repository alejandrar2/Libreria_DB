<?php

// Setup connection
$serverName = "ALEJANDRA";
$connectionInfo = array( "Database"=>"Libreria", "UID"=>"sa1", "PWD"=>"1234");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false) {
  die( print_r( sqlsrv_errors(), true));
}

// specify params - MUST be a variable that can be passed by reference!
$misParametros['cantidad'] = 234;
$misParametros['idCliente'] = 4;
$misParametros['descripcion'] = 'holis';
$misParametros['idLibro'] = 234;
$misParametros['idVendedor'] = 234;
$misParametros['Pcmensaje'] = 0 ;



// Set up the proc params array - be sure to pass the param by reference
$parametrosProcedimiento = array(
	array(&$misParametros['cantidad'], SQLSRV_PARAM_IN),
  array(&$misParametros['idCliente'], SQLSRV_PARAM_IN),
  array(&$misParametros['descripcion'], SQLSRV_PARAM_IN),
  array(&$misParametros['idLibro'], SQLSRV_PARAM_IN),
	array(&$misParametros['idVendedor'], SQLSRV_PARAM_IN),
  array(&$misParametros['Pcmensaje'], SQLSRV_PARAM_OUT)
);



// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
// PREPERARA EL PROCEDIMIENTO
$sql = "EXEC SP_Generar_Factura @cantidad = ?, @idCliente= ?, @descripcion= ?, @idLibro= ?, @idVendedor= ?, @Pcmensaje = ? ";

$stmt = sqlsrv_prepare($conn, $sql, $parametrosProcedimiento);

if( !$stmt ) {
	die( print_r( sqlsrv_errors(), true));
}

if(sqlsrv_execute($stmt)){
  while($res = sqlsrv_next_result($stmt)){
    // make sure all result sets are stepped through, since the output params may not be set until this happens
  }
  // Output params are now set,
  //print_r($params);
echo json_encode($misParametros);
}else{
  die( print_r( sqlsrv_errors(), true));
}
?>