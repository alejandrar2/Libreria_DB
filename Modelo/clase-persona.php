<?php

	class Persona{

		private $idPersona;
		private $PNombre;
		private $SNombre;
		private $PApellido;
		private $SApellido;
		private $direccion;
		private $numeroID;

		public function __construct($idPersona,$PNombre, $SNombre, $PApellido, $SApellido, $direccion, $numeroID){

			$this->idPersona = $idPersona;
			$this->PNombre = $PNombre;
			$this->SNombre = $SNombre;
			$this->PApellido = $PApellido;
			$this->SApellido = $SApellido;
			$this->direccion = $direccion;
			$this->numeroID = $numeroID;
		}
		public function getidPersona(){
			return $this->idPersona;
		}

		public function setidPersona($idPersona){
			$this->idPersona = $idPersona;
		}

		public function getPNombre(){
			return $this->PNombre;
		}

		public function setPNombre($PNombre){
			$this->PNombre = $PNombre;
		}

		public function getSNombre(){
			return $this->SNombre;
		}

		public function setSNombre($SNombre){
			$this->SNombre = $SNombre;
		}

		public function getPApellido(){
			return $this->PApellido;
		}

		public function setPApellido($PApellido){
			$this->PApellido = $PApellido;
		}

		public function getSApellido(){
			return $this->SApellido;
		}

		public function setSApellido($SApellido){
			$this->SApellido = $SApellido;
		}

		public function getdireccion(){
			return $this->direccion;
		}

		public function setdireccion($direccion){
			$this->direccion = $direccion;
		}

		public function getnumeroID(){
			return $this->numeroID;
		}

		public function setnumeroID($numeroID){
			$this->numeroID = $numeroID;
		}

		public function toString(){
			return "idPersona: " . $this->idPersona .
				"PNombre: " . $this->PNombre . 
				" SNombre: " . $this->SNombre . 
				" PApellido: " . $this->PApellido . 
				" SApellido: " . $this->SApellido . 
				" direccion: " . $this->direccion . 
				" numeroID: " . $this->numeroID;
		}

		public function add(){
			include_once 'conexionP.php';
			// specify params - MUST be a variable that can be passed by reference!
			$misParametros['PNombre'] = $this->PNombre;
			$misParametros['SNombre'] = $this->SNombre;
			$misParametros['PApellido'] = $this->PApellido;
			$misParametros['SApellido'] = $this->SApellido;
			$misParametros['direccion'] = $this->direccion;
			$misParametros['numerodeID'] = $this->numeroID;
			$misParametros['Pcmensaje'] = 0 ;
			$misParametros['idPersona'] = 0;


			// Set up the proc params array - be sure to pass the param by reference
			$parametrosProcedimiento = array(
  				array(&$misParametros['PNombre'], SQLSRV_PARAM_IN),
  				array(&$misParametros['SNombre'], SQLSRV_PARAM_IN),
  				array(&$misParametros['SApellido'], SQLSRV_PARAM_IN),
  				array(&$misParametros['SApellido'], SQLSRV_PARAM_IN),
  				array(&$misParametros['direccion'], SQLSRV_PARAM_IN),
  				array(&$misParametros['numerodeID'], SQLSRV_PARAM_IN),
  				array(&$misParametros['Pcmensaje'], SQLSRV_PARAM_OUT),
  				array(&$misParametros['idPersona'], SQLSRV_PARAM_OUT)
			);



			// EXEC the procedure, {call stp_Create_Item (@Item_ID = ?, @Item_Name = ?)} seems to fail with various errors in my experiments
			// PREPERARA EL PROCEDIMIENTO
			$sql = "EXEC SP_ADD_PERSONA @PNombre = ?, @SNombre= ?, @PApellido= ?, @SApellido= ?, @direccion= ?, @numerodeID= ?, @Pcmensaje = ?, @idPersona= ?  ";

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

  			
  				$this->idPersona = $misParametros['idPersona'];
  				return $misParametros;
			}else{
  				die( print_r( sqlsrv_errors(), true));
			}
		}

		public function edite(){
ALTER PROCEDURE [dbo].[SP_EDITE_LIBRO]( @PNombre VARCHAR(45), @SNombre VARCHAR(45), @PApellido VARCHAR(45), @SApellido VARCHAR(45), @direccion VARCHAR(45),@numeroId VARCHAR(45),@pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @PNombre='' or @PNombre IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'PNombre,');
	END

	IF @SNombre='' or @SNombre IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'PNombre,');
	END

	IF @PApellido='' or @PApellido IS NULL BEGIN 
	SET @mensajeError=@mensajeError+CONVERT(varchar,'PApellido,');
    END

    IF  @SApellido='' or @SApellido IS NULL BEGIN 
    SET @mensajeError=@mensajeError+CONVERT(varchar,'SApellido,');
    END

	IF @direccion=0 or @direccion IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'direccion,');
	END

	
	IF @numeroId =0 or @numeroId  IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'numeroId ,');
	END

	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM persona WHERE idpersona= @idpersona; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		UPDATE persona SET PNombre = @PNombre,SNombre= @SNombre,PApellido=@PApellido,SApellido=@SApellido,direccion=@direccion,numeroId=@numeroId WHERE idpersona=@idpersona;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END


		}

		public static function remove($idPersona){
GO
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
ALTER PROCEDURE [dbo].[SP_REMOVE_PERSONA]( @idpersona INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idpersona=0 or @idpersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'ID de persona');
	END


	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM persona WHERE idpersona= @idpersona; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		DELETE FROM persona WHERE idpersona=@idpersona;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END


		}

		public static function obtenerUltmoId(){
			include_once 'conexion.php';

			$sql = "SELECT MAX(idPersona) FROM persona";
			$res = $conexion->query($sql); 

    		foreach ($res as $row) {
        		$dato = $row;
    		}

    		return $dato;

		}
	}		

?>