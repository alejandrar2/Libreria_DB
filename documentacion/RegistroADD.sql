CREATE PROCEDURE SP_ADD_REGISTRO( @idLibro INT, 
	@fechafin VARCHAR(50), 
	@idCliente INT, 
	@idAdministrador INT, 
	@estado VARCHAR(50), 
	@idregistro INT OUTPUT,
	@pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @idregistro=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	
	IF @idLibro=0 or @idLibro IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'idLibro,');
       END

	IF @fechafin='' or @fechafin IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'fechafin,');	
       END

	IF @idCliente=0 or @idCliente IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'idCliente,');
       END

	IF @idAdministrador=0 or @idAdministrador IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'idAdministrador,');
        END

	IF @estado='' or @estado IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'estado,');
        END
		/*======================================================================================*/

	IF @mensajeError='' BEGIN 
		SELECT @conteo=COUNT(*) FROM registro; 
		INSERT INTO registro(idregistro, fechainicio, fechafin, idCliente, idAdministrador, estado, multa) values( (@conteo+1),GETDATE(),convert( date, @fechafin),@idCliente,@idAdministrador,@estado,0);
		INSERT INTO librorregistro(idlibro, idreregistro) values( @idlibro,(@conteo+1));
		SET @pcMensaje=1;
		SET @idregistro = (@conteo+1);
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO