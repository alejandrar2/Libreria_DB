---Procedimientos Almacenados---

-----------------*Administrador*---------------------------------/
CREATE PROCEDURE SP_Administrador(@IdPersona INT,@IdAdministrador INT ,@IdEmpleado INT, @pcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje=0;
	SET @mensajeError='';


	IF @IdPersona=0 or @IdPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Número de IdPersona,');
	END
 
 if pcAccion='AGREGAR' THEN
 IF @IdPersona=0 or @IdPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Número de IdPersona,');
	END
 THEN

  if pcAccion='EDITAR' then 
  
	IF @IdPersona=0 or @IdPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Número de IdPersona,');
	END IF
END

anydesk

      
	IF @mensajeError='' 
		BEGIN 
		if pcAccion='ELIMINAR' then 
            SELECT @id=COUNT(*) FROM administrador; 
			INSERT INTO administrador(idAdministrador,idEmpleado) values( (@id+1), @IdPersona );
			SET @pcMensaje=1;
		END IF
	ELSE 
		BEGIN
		SET @pcMensaje=0;
	END
END
GO

/*-------------------------------------Cliente------------------------------------*/

CREATE PROCEDURE SP_CLIENTE(@IdPersona INT , @pcMensaje VARCHAR(50) OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje='';
	SET @mensajeError='';

	IF @IdPersona=0 or @IdPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Número de IdPersona,');
	END

	IF @mensajeError='' 
		BEGIN 
			SELECT @id=COUNT(*) FROM cliente; 
			INSERT INTO cliente(idcliente,idPersona) values( (@id+1), @IdPersona );
			SET @pcMensaje='Se agrego con exito';
		END
	ELSE 
		BEGIN
		SET @pcMensaje=@mensajeError;
	END
END
GO


/*---------------------------------Empleado------------------------------------------------*/
CREATE PROCEDURE SP_Empleado (@IdPersona INT,@IdEmpleado INT, @pcMensaje VARCHAR(50) OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje='';
	SET @mensajeError='';

	IF @IdPersona=0 or @IdPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Número de IdPersona,');
	END

	IF @mensajeError='' 
		BEGIN 
			SELECT @id=COUNT(*) FROM empleado; 
			INSERT INTO empleado(idempleado,idPersona) values( (@id+1), @IdPersona );
			SET @pcMensaje='Se agrego con exito';
		END
	ELSE 
		BEGIN
		SET @pcMensaje=@mensajeError;
	END
END
GO

/*--------------------------------------Factuta Detalle-----------------------------------*/
CREATE PROCEDURE SP_FacturaDetalle (@IdFactura INT,@Cantidad VARCHAR(50),@IdLibro INT,@FacturaEncabezado INT, @pcMensaje VARCHAR(50) OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje='';
	SET @mensajeError='';

	IF @IdLibro=0 or @IdLibro IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Número de IdLibros,');
	END

	IF @mensajeError='' 
		BEGIN 
			SELECT @id=COUNT(*) FROM facturadetalle; 
			INSERT INTO facturadetalle (idFacturaDetalle,idFacturaEncabezado) values( (@id+1), @IdLibro );
			SET @pcMensaje='Se agrego con exito';
		END
	ELSE 
		BEGIN
		SET @pcMensaje=@mensajeError;
	END
END
GO



/*-----------------------------------Factura Encabezado-------------------------------------------*/
CREATE PROCEDURE SP_FacturaEncabezado (@IdFacturaEncabezado INT,@idCliente INT,@IdVendedor INT,@Fecha DATE, @pcMensaje VARCHAR(50) OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje='';
	SET @mensajeError='';

	IF @IdFacturaEncabezado=0 or @IdFacturaEncabezado IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Encabezado de Factura,');
	END

	IF @mensajeError='' 
		BEGIN 
			SELECT @id=COUNT(*) FROM facturaencabezado; 
			INSERT INTO facturaencabezado(idFacturaEncabezado,idVendedor) values( (@id+1), @idCliente);
			SET @pcMensaje='Se agrego con exito';
		END
	ELSE 
		BEGIN
		SET @pcMensaje=@mensajeError;
	END
END
GO

/*---------------------------------Jefe------------------------------------------*/
CREATE PROCEDURE SP_Jefe (@IdJefe INT,@Persona INT,@idEmpleado INT,@usuario VARCHAR(45),@contrasenia VARCHAR(45), @pcMensaje VARCHAR(50) OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje='';
	SET @mensajeError='';

	IF @IdJefe=0 or @IdJefe IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Id de Jefe,');
	END

	IF @mensajeError='' 
		BEGIN 
			SELECT @id=COUNT(*) FROM jefe; 
			INSERT INTO jefe (idEmpleado ,idJefe) values( (@id+1), @IdJefe);
			SET @pcMensaje='Se agrego con exito';
		END
	ELSE 
		BEGIN
		SET @pcMensaje=@mensajeError;
	END
END
GO


---------------/*LIBRO*/---------------------------------

CREATE PROCEDURE SP_Libro (@idLibro INT,@nombre VARCHAR(45),@Edicion VARCHAR(45),@Precio FLOAT,@Prestar TINYINT,@pcMensaje VARCHAR(50) OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje='';
	SET @mensajeError='';

	IF @IdLibro= 0 or @IdLibro IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Id de Libro,');
	END

	IF @mensajeError='' 
		BEGIN 
			SELECT @id=COUNT(*) FROM libro; 
			INSERT INTO librorregistro(idlibro,idreregistro) values( (@id+1),@idLibro );
			SET @pcMensaje='Libro agrego con exito';
		END
	ELSE 
		BEGIN
		SET @pcMensaje=@mensajeError;
	END
END
GO

/*Persona*/
CREATE PROCEDURE SP_Persona (@IdPersona INT, @Pnombre VARCHAR(45),@Snombre VARCHAR(45),@Papellido VARCHAR(45),@Sapellido VARCHAR(45),@Direccion VARCHAR(50),@NumerodeId INT,@pcMensaje VARCHAR(50) OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje='';
	SET @mensajeError='';

	IF @IdPersona   =0 or @IdPersona IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Id de Persona,');
	END

	IF @mensajeError='' 
		BEGIN 
			SELECT @id=COUNT(*) FROM persona; 
			INSERT INTO Persona (idPersona ,numerodeID) values( (@id+1), @NumerodeId);
			SET @pcMensaje='Se agrego con exito';
		END
	ELSE 
		BEGIN
		SET @pcMensaje=@mensajeError;
	END
END
GO

/*----------------------------------Vendedor--------------------------------------------------*/
CREATE PROCEDURE SP_Vendedor (@IdVendedor INT,@Empleado INT,@pcMensaje VARCHAR(50) OUTPUT)
AS
BEGIN 
    DECLARE @id INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @pcMensaje='';
	SET @mensajeError='';

	IF @IdVendedor   =0 or @IdVendedor IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Id de Vendedor,');
	END

	IF @mensajeError='' 
		BEGIN 
			SELECT @id=COUNT(*) FROM vendedor; 
			INSERT INTO vendedor(idEmpleado ,idVendedor) values( (@id+1),@IdVendedor );
			SET @pcMensaje='Se agrego con exito';
		END
	ELSE 
		BEGIN
		SET @pcMensaje=@mensajeError;
	END
END
GO
