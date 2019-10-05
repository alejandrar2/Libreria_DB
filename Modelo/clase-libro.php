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

		public function add(){

			include 'conexionP.php';
		// specify params - MUST be a variable that can be passed by reference!
		$misParametros['nombre'] = $this->nombre;
		$misParametros['edicion'] = $this->edicion;
		$misParametros['prestar'] = $this->prestar;
		$misParametros['precio'] = $this->precio;
		$misParametros['idLibro'] = 0;
		$misParametros['Pcmensaje'] = 0 ;


		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
		array(&$misParametros['nombre'], SQLSRV_PARAM_IN),
  		array(&$misParametros['nombre'], SQLSRV_PARAM_IN),
  		array(&$misParametros['prestar'], SQLSRV_PARAM_IN),
  		array(&$misParametros['precio'], SQLSRV_PARAM_IN),
		array(&$misParametros['idLibro'], SQLSRV_PARAM_OUT),
  		array(&$misParametros['Pcmensaje'], SQLSRV_PARAM_OUT)
		);



		// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
		// PREPERARA EL PROCEDIMIENTO
		$sql = "EXEC SP_ADD_LIBRO @nombre = ?, @edicion= ?, @prestar= ?, @precio= ?, @idLibro= ?, @Pcmensaje = ?  ";

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
		public static function GenerarFactura(){

		// specify params - MUST be a variable that can be passed by reference!
		$misParametros['cantidad'] = $this->cantidad;
		$misParametros['idCliente'] = 0;
		$misParametros['descripcion'] = $this->descripcion;
		$misParametros['idLibro'] = 0;
		$misParametros['idVendedor'] = 0;
		$misParametros['Pcmensaje'] = 0 ;



		// Set up the proc params array - be sure to pass the param by reference
		$parametrosProcedimiento = array(
		array(&$misParametros['cantidad'], SQLSRV_PARAM_IN),
  		array(&$misParametros['idCliente'], SQLSRV_PARAM_IN),
  		array(&$misParametros['descripcion'], SQLSRV_PARAM_IN),
  		array(&$misParametros['idLibro'], SQLSRV_PARAM_IN),
		array(&$misParametros['idVendedor'], SQLSRV_PARAM_OUT),
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

		public function edite(){
GO
/****** Object:  StoredProcedure [dbo].[SP_EDITE_LIBRO]    Script Date: 02/10/2019 17:28:01 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER PROCEDURE [dbo].[SP_EDITE_LIBRO]( @idLibro INT, @nombre VARCHAR(50), @edicion VARCHAR(50), @prestar SMALLINT, @precio FLOAT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @nombre='' or @nombre IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'nombre,');
	END

	IF @edicion='' or @edicion IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'edicion,');
	END

	IF @prestar IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'prestar,');
	END

	IF @precio=0 or @precio IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'precio,');
	END

	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM libro WHERE idLibro= @idLibro; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		UPDATE libro SET nombre = @nombre,edicion= @edicion,prestar=@prestar,precio=@precio WHERE idLibro=@idLibro;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END

		}

		public static function remove($idLibro){
GO
/****** Object:  StoredProcedure [dbo].[SP_REMOVE_LIBRO]    Script Date: 02/10/2019 17:25:58 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER PROCEDURE [dbo].[SP_REMOVE_LIBRO]( @idLibro INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idLibro=0 or @idLibro IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'ID del libro');
	END


	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM libro WHERE idLibro= @idLibro; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		DELETE FROM libro WHERE idLibro=@idLibro;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END


		}

		public static function obtenerLibro(){
			include_once 'conexion.php';

			$sql = "SELECT * FROM vista_libros";

			$resultado = $base_de_datos->prepare($sql);
			$resultado->execute();

			$tours = array();

			foreach ($resultado as $tour) {
				$tours[] = $tour; 
			}

			return json_encode($tours);
		}	
		
		public static function addRegistro($cliente){

		}

		

	}
?>

