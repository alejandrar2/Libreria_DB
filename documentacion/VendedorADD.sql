
CREATE PROCEDURE SP_ADD_VENDEDOR( @idEmpleado INT,
 @idVendedor INT OUTPUT,
  @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @idVendedor=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	
	IF @idEmpleado=0 or @idEmpleado IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'idEmpleado,');

		END
		/*======================================================================================*/

	IF @mensajeError='' BEGIN 
		SELECT @conteo=COUNT(*) FROM Vendedor; 
		INSERT INTO Vendedor(idVendedor,idEmpleado) values( (@conteo+1),@idEmpleado);
		SET @pcMensaje=1;
		SET @idVendedor = (@conteo+1);
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO