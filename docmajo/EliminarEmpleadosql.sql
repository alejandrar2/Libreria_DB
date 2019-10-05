CREATE PROCEDURE SP_REMOVE_Empleado( @idEmpleado INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idEmpleado ='' or @idEmpleado IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'ID del Empleado');
	END


	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM empleado WHERE idEmpleado= @idEmpleado; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		DELETE FROM empleado WHERE idempleado=@idEmpleado;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO