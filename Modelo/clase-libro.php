<?php

class Libro{

	private $idLibro;
	private $nombre;
	private $edicion;
	private $precio;
	private $prestar;
	

	public function __construct($idLibro, $nombre, $edicion, $precio, $prestar ){
		$this->idLibro = $idLibro;
		$this->nombre = $nombre;
		$this->edicion = $edicion;
		$this->precio = $precio;
		$this->prestar = $prestar;
		
	}

	public function getidLibro(){
		return $this->idLibro;
	}

	public function setidLibro($idLibro){
		$this->idLibro = $idLibro;
	}

	public function getnombre(){
		return $this->nombre;
	}

	public function setnombre($nombre){
		$this->nombre = $nombre;
	}

	public function getedicion(){
		return $this->edicion;
	}

	public function setedicion($edicion){
		$this->edicion = $edicion;
	}

	public function getprecio(){
		return $this->precio;
	}

	public function setprecio($precio){
		$this->precio = $precio;
	}

	

	public function toString(){
		return "idLibro: " . $this->idLibro . 
		" nombre: " . $this->nombre . 
		" edicion: " . $this->edicion . 
		" precio: " . $this->precio . 
		" prestar: " . $this->prestar ;
	}

	public function add($autor){

		include 'conexionP.php';
		// specify params - MUST be a variable that can be passed by reference!
		$misParametros['nombre'] = $this->nombre;
		$misParametros['autor'] = $autor;
		$misParametros['edicion'] = $this->edicion;
		$misParametros['prestar'] = $this->prestar;
		$misParametros['precio'] = $this->precio;
		$misParametros['idLibro'] = 0;
		$misParametros['Pcmensaje'] = 0 ;


		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
			array(&$misParametros['nombre'], SQLSRV_PARAM_IN),
			array(&$misParametros['autor'], SQLSRV_PARAM_IN),
			array(&$misParametros['edicion'], SQLSRV_PARAM_IN),
			array(&$misParametros['prestar'], SQLSRV_PARAM_IN),
			array(&$misParametros['precio'], SQLSRV_PARAM_IN),
			array(&$misParametros['idLibro'], SQLSRV_PARAM_OUT),
			array(&$misParametros['Pcmensaje'], SQLSRV_PARAM_OUT)
		);



		// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_LIBRO @nombre = ?, @autor = ?, @edicion= ?, @prestar= ?, @precio= ?, @idLibro= ?, @Pcmensaje = ?  ";

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
	}

	////////////////////////////////////////////////////////////////

	public function editar(){

		include 'conexionP.php';
		// specify params - MUST be a variable that can be passed by reference!
		$misParametros['idLibro'] = $this->idLibro;
		$misParametros['nombre'] = $this->nombre;
		$misParametros['edicion'] = $this->edicion;
		$misParametros['prestar'] = $this->prestar;
		$misParametros['precio'] = $this->precio;
		$misParametros['PcMensaje'] = 0 ;


		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
			array(&$misParametros['idLibro'], SQLSRV_PARAM_IN),
			array(&$misParametros['nombre'], SQLSRV_PARAM_IN),
			array(&$misParametros['edicion'], SQLSRV_PARAM_IN),
			array(&$misParametros['prestar'], SQLSRV_PARAM_IN),
			array(&$misParametros['precio'], SQLSRV_PARAM_IN),
			array(&$misParametros['PcMensaje'], SQLSRV_PARAM_OUT)
		);



		// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_EDITE_LIBRO @idLibro= ?, @nombre = ?, @edicion= ?, @prestar= ?, @precio= ?,  @PcMensaje = ? ";

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
	}

	////77777777//////////////////////////////////////////////////////

	public static function remove($id){

		include 'conexionP.php';
		// specify params - MUST be a variable that can be passed by reference!
		$misParametros['idLibro'] = $id;
		$misParametros['PcMensaje'] = 0 ;


		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
			array(&$misParametros['idLibro'], SQLSRV_PARAM_IN),
			array(&$misParametros['PcMensaje'], SQLSRV_PARAM_OUT)
		);

		$sql = "EXEC SP_REMOVE_LIBRO @idLibro = ?, @Pcmensaje = ?  ";

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
	}


	////77777777//////////////////////////////////////////////////////
	
	public static function factura($cantidad, $cliente, $descripcion, $libro, $vendedor){

		include 'conexionP.php';
		// specify params - MUST be a variable that can be passed by reference!
		$misParametros['cantidad'] = intval($cantidad);
		$misParametros['idCliente'] = intval($cliente);
		$misParametros['descripcion'] = $descripcion;
		$misParametros['idLibro'] = intval($libro);
		$misParametros['idVendedor'] = intval($vendedor);
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
			return json_encode($misParametros);
		}else{
			die( print_r( sqlsrv_errors(), true));
		}
	}

	
	public static function obtenerLibro(){
		include_once 'conexion.php';

		$sql = "SELECT * FROM v_libro";

		$resultado = $base_de_datos->prepare($sql);
		$resultado->execute();

		$datos = array();

		foreach ($resultado as $row) {
			$datos[] = $row; 
		}

		return json_encode($datos);
	}	



	public static function obtenerUno($id){
		include_once 'conexion.php';

		$sql = "SELECT * FROM v_libro WHERE idLibro='$id'";

		$resultado = $base_de_datos->prepare($sql);
		$resultado->execute();

		$datos = array();

		foreach ($resultado as $row) {
			$datos[] = $row; 
		}

		return json_encode($datos);
	}


	public static function infoLibro(){
		include_once 'conexion.php';

		$sql = "SELECT * FROM vw_magia";
		$res = $base_de_datos->query($sql); 

		$datos = [];

		foreach ($res as $row) {
			$datos[] = $row;
		}

		return json_encode($datos);

	}	
	
	public static function addRegistro($cliente){

	}

	

}
?>

