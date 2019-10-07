<?php 




	include 'conexionP.php';
			// specify parame MUST be a variable that can be passed by reference!
	$misParametros['cliente'] = 1;
	$misParametros['vendedor'] = 1;
	$misParametros['idFacturaE'] = 0;
	$misParametros['pcMensaje'] = 0 ;

			// Set up the proc params array - be sure to pass the param by reference
	$parametrosProcedimiento = array(
		array(&$misParametros['cliente'], SQLSRV_PARAM_IN),
		array(&$misParametros['vendedor'], SQLSRV_PARAM_IN),
		array(&$misParametros['idFacturaE'], SQLSRV_PARAM_OUT),
		array(&$misParametros['pcMensaje'], SQLSRV_PARAM_OUT)
	);

	$sql = "EXEC SP_ADD_FACTURA_E @cliente = ?, @vendedor= ?, @idFacturaE= ?, @pcMensaje = ?  ";

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