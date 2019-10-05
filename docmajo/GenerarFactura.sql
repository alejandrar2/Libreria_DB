CREATE PROCEDURE SP_Generar_Factura(@cantidad INT,
	@idCliente INT,
	 @descripcion VARCHAR(50),
	  @idLibro INT,
	  @idVendedor INT,
	   @PcMensaje INT OUTPUT)
AS
BEGIN 
    DECLARE @conteo1 INT;
	DECLARE @conteo2 INT;
	DECLARE @conteo3 INT;
	DECLARE @conteo4 INT;
	DECLARE @conteo5 INT;

	DECLARE @precio INT;
	DECLARE @mensajeError VARCHAR(2000);
	SET @PcMensaje=0;
	SET @conteo1=0;
	SET @conteo2=0;
	SET @conteo3=0;
	SET @conteo4=0;
	SET @conteo5=0;

	SET @mensajeError='';

/*======================================================================================*/
	IF @cantidad =0 or @cantidad IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'cantidad,');
	END

	IF @idCliente=0 or @idCliente IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(int,'Cliente,');
	END

	IF @idLibro=0 or @idLibro  IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(varchar,'Id de Libro,');
	END

	IF @idVendedor=0 or @idVendedor IS NULL BEGIN 
		SET @mensajeError=@mensajeError+CONVERT(int,'idvendedor,');
	END
	
	/*======================================================================================*/

	IF @mensajeError='' BEGIN 
		SELECT @conteo1=COUNT(*) FROM facturaencabezado;
		INSERT INTO facturaencabezado(idfacturaencabezado,idCliente,idVendedor, Fecha) 
		values( (@conteo1+1), @idCliente,@idVendedor, GETDATE());

		SELECT @conteo2=COUNT(*) FROM facturadetalle; 
		INSERT INTO facturadetalle(idfacturadetalle,cantidad,idLibro,idFacturaEncabezado) 
		values( (@conteo2+1), @cantidad, @idLibro,(@conteo1+1));

		select @precio=precio from libro

		SELECT @conteo3=COUNT(*) FROM pago; 
	    INSERT INTO pago(idPago,Monto,ISV,Total) 
		values ( (@conteo3+1), (@cantidad*@precio), ((@cantidad*@precio) * 0.15), ( (@cantidad*@precio) *1.15)  );

		SELECT @conteo4=COUNT(*) FROM pagoparafactura;

		INSERT INTO pagoparafactura(idfacturaEncabezado, idPago) 
		values ( (@conteo1+1), @conteo3);

		SELECT @conteo5=COUNT(*) FROM tipopago;
		INSERT INTO tipopago(idtipopago, descripcion,idpago ) values( (@conteo5+1), @descripcion, (@conteo3+1) )
 

		SET @PcMensaje=1;
		
	END
	ELSE 
		BEGIN
		SET @PcMensaje=0;
	END
END
GO



