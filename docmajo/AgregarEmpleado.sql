CREATE PROCEDURE SP_ADD_Empleado (@idPersona INT, @idEmpleado INT OUTPUT,  @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @idEmpleado=0;
	SET @conteo=0;
	SET @mensajeError='';

/*======================================================================================*/
	IF @idPersona=0 or @idPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'nombre,');
	END

	/*======================================================================================*/

	IF @mensajeError='' BEGIN 
		SELECT @conteo=COUNT(*) FROM Empleado ; 
		INSERT INTO Empleado (idEmpleado,idPersona) values( (@conteo+1), @idPersona);
		SET @pcMensaje=1;
		SET @idEmpleado= (@conteo+1);
	END
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO