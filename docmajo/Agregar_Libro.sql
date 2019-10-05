CREATE PROCEDURE SP_ADD_LIBRO(@nombre VARCHAR(50)
	, @edicion VARCHAR(50),
	 @prestar SMALLINT,
	  @precio FLOAT,
	   @idLibro INT OUTPUT,
	    @PcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @PcMensaje=0;
	SET @idLibro=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @nombre='' or @nombre IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'nombre,');
	END

	IF @edicion='' or @edicion IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'edicion,');
	END

	IF @prestar IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'prestar,');
	END

	IF @precio=0 or @precio IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'precio,');
	END

	/*======================================================================================*/

	IF @mensajeError='' BEGIN 
		SELECT @conteo=COUNT(*) FROM libro; 
		INSERT INTO libro(idLibro,nombre, edicion, precio, prestar) values( (@conteo+1), @nombre, @edicion, @precio, @prestar);
		SET @PcMensaje=1;
		SET @idLibro = (@conteo+1);
	END
	ELSE 
		BEGIN
		SET @PcMensaje=0;
	END
END
GO

