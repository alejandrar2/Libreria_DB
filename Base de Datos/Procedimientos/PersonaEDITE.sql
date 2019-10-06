CREATE PROCEDURE SP_EDITE_PERSONA( @idPersona INT, @PNombre VARCHAR(50), @SNombre VARCHAR(50), @PApellido VARCHAR(50), @SApellido VARCHAR(50), @direccion VARCHAR(50), @numerodeID VARCHAR(50),@pcMensaje INT OUTPUT)
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
		SET @mensajeError=@mensajeError+CONVERT(varchar,'SNombre,');
	END

	IF @PApellido IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'PApellido,');
	END

	IF @SApellido=0 or @SApellido IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'SApellido,');
	END

	IF @direccion=0 or @direccion IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'direccion,');

	IF @numerodeID=0 or @numerodeID IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'numerodeID,');
	END
	END

	/*======================================================================================*/

	SELECT @conteo=COUNT(*) FROM Persona WHERE idPersona= @idPersona; 

	IF @mensajeError='' AND @conteo > 0 BEGIN 
		
		UPDATE Persona SET PNombre = @PNombre,SNombre= @SNombre,PApellido=@PApellido,SApellido=@SApellido,direccion=@direccion,numerodeID=@numerodeID WHERE idPersona=@idPersona;
		SET @pcMensaje=1;
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO