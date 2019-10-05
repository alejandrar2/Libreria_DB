CREATE PROCEDURE SP_EDITE_REGISTRO( @idregistro INT, @fechainicio DATE, @fechafin DATE, @idCliente INT, @idAdministrador INT, @estado VARCHAR(50),@multa VARCHAR(50) ,@pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @fechainicio='' or @fechainicio IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'fechainicio,');
	END

	IF @fechafin='' or @fechafin IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'fechafin,');
	END

	IF @idCliente=0 or @idCliente IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'idClinte,');
	END

	IF @idAdministrador=0 or @idAdministrador IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'idAdministrador,');
	END

	IF @estado='' or @estado IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'estado,');
	END

	IF @multa='' or @multa IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'multa,');
	END

	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM registro WHERE idregistro= @idregistro; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		UPDATE registro SET fechainicio = @fechainicio,fechafin= @fechafin,idCliente=@idCliente,idAdministrador=@idAdministrador,estado=@estado,multa=@multa WHERE idregistro=@idregistro;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO