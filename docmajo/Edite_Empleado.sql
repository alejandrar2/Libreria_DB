CREATE PROCEDURE SP_EDITE_Empleado( @idEmpleado INT, @idPersona INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idPersona='' or @idPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'nombre,');
	END

	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM empleado WHERE @idEmpleado= @idEmpleado; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		UPDATE empleado SET @idPersona= @idPersona WHERE idEmpleado =@idEmpleado;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO