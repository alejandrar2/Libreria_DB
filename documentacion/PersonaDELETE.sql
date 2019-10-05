CREATE PROCEDURE SP_REMOVE_PERSONA( @idPersona INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idPersona='' or @idPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'ID del Persona');
	END


	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM Persona WHERE idPersona= @idPersona; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		DELETE FROM Persona WHERE idPersona=@idPersona;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO