

CREATE PROCEDURE SP_ADD_PERSONA(@PNombre VARCHAR(50),
 @SNombre VARCHAR(50),
  @PApellido VARCHAR(50),
   @SApellido VARCHAR(50),
   @direccion VARCHAR(50),
    @numerodeID VARCHAR(50),
    @idPersona INT OUTPUT,
      @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @idPersona=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @PNombre='' or @PNombre IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'PNombre,');
	END

	IF @SNombre='' or @SNombre IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'SNombre,');
	END

	IF @PApellido=''  or @PApellido IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'PApellido,');
	END

	IF @SApellido='' or @SApellido IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'SApellido,');
	END

	IF @direccion='' or @direccion IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'direccion,');
	END

	IF @numerodeID='' or @numerodeID IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'numerodeID,');
	END

	/*======================================================================================*/

	IF @mensajeError='' BEGIN 
		SELECT @conteo=COUNT(*) FROM Persona; 
		INSERT INTO Persona(idPersona,PNombre, SNombre,PApellido, SApellido, direccion,numerodeID ) values( (@conteo+1), @PNombre, @SNombre, @PApellido, @SApellido, @direccion, @numerodeID);
		SET @pcMensaje=1;
		SET @idPersona = (@conteo+1);
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO