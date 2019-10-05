CREATE PROCEDURE SP_EDITE_VENDEDOR( @idVendedor INT, @idEmpleado INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idEmpleado=0 or @idEmpleado IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'idEmpleado,');
	END

	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM Vendedor WHERE idVendedor= @idVendedor; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		UPDATE Vendedor SET idEmpleado = @idEmpleado WHERE idVendedor=@idVendedor;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO