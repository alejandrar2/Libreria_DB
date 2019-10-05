CREATE PROCEDURE SP_REMOVE_REGISTRO( @idregistro INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idregistro='' or @idregistro IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'ID del registro');
	END


	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM registro WHERE idregistro= @idregistro; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		DELETE FROM registro WHERE idregistro=@idregistro;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO