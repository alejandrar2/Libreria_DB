CREATE PROCEDURE SP_REMOVE_VENDEDOR( @idVendedor INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idVendedor=0 or @idVendedor IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'ID del Vendedor');
	END


	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM Vendedor WHERE idVendedor= @idVendedor; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		DELETE FROM Vendedor WHERE idVendedor=@idVendedor;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO