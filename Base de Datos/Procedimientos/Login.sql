CREATE PROCEDURE SP_LOGIN(@correo VARCHAR(50), @contrasenia VARCHAR(50), @idJefe INT OUTPUT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @idJefe=0;
	SET @conteo=0;
	SET @mensajeError='';


	IF @correo='' or @correo IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'correo,');
	END

	IF @contrasenia=''or @contrasenia IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Número de contrsenia,');
	END

      
	IF @mensajeError='' BEGIN 
		
		SELECT @conteo=COUNT(*) FROM jefe j WHERE j.contrasenia=@contrasenia AND j.usuario=@correo;
		
		IF @conteo>0 BEGIN
			
			SELECT @idJefe=j.idJefe FROM jefe j WHERE j.contrasenia=@contrasenia AND j.usuario=@correo;
			SET @pcMensaje=1;
		END
		ELSE BEGIN
			SET @pcMensaje=3;
		END
	END	
	ELSE BEGIN
		SET @pcMensaje=0;
	END
END