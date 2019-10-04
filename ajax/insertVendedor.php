<?php

// Setup connection
$serverName = "ALEJANDRA";
$connectionInfo = array( "Database"=>"Libreria", "UID"=>"sa1", "PWD"=>"1234");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false) {
  die( print_r( sqlsrv_errors(), true));
}

// specify params - MUST be a variable that can be passed by reference!
$misParametros['idEmpleado'] = 34;
$misParametros['idVendedor'] = 34;
$misParametros['Pcmensaje'] = 0 ;


// Set up the proc params array - be sure to pass the param by reference
$parametrosProcedimiento = array(
	array(&$misParametros['idEmpleado'], SQLSRV_PARAM_IN),
	array(&$misParametros['idVendedor'], SQLSRV_PARAM_OUT),
  array(&$misParametros['Pcmensaje'], SQLSRV_PARAM_OUT)
);



// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
// PREPERARA EL PROCEDIMIENTO
$sql = "EXEC SP_ADD_VENDEDOR @idEmpleado = ?, @idVendedor= ?, @Pcmensaje = ?  ";

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
return json_encode($misParametros);
}else{
  die( print_r( sqlsrv_errors(), true));
}
?>