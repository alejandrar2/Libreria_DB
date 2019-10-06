

--Informacion del cliente
CREATE VIEW vw_infoCliente AS
SELECT c.idCliente, p.PNombre+' '+SNombre+' '+PApellido+' '+SApellido NombreCliente FROM cliente c
INNER JOIN persona p ON c.idPersona=p.idPersona

---Informacion de libros 
CREATE VIEW vista_libros AS 
SELECT l.idLibro , l.nombre nombreLibro , l.precio, a.nombre nombreAutor FROM autorparalibro al
INNER JOIN libro l ON l.idLibro=al.idibro
INNER JOIN autor a ON a.idautor=al.idautor 

---Informacion de autor

SELECT idautor,  nombre FROM autor

SELECT MAX(idPersona) FROM persona

---Informacion del proveedor de entradas de libros
CREATE VIEW vw_proveedor AS
SELECT p.Nombre,l.nombre,e.cantidad,e.precio FROM proveedor p
INNER JOIN proveedorporentradas pp ON P.idProveedor=pp.idProveedor
INNER JOIN entradas e ON pp.idEntradas=e.idEntradas
INNER JOIN entradasporlibro ep ON e.idEntradas=ep.idEntradas
INNER JOIN libro l ON ep.idLibro=l.idLibro

---Informacion del vendedor
CREATE VIEW vw_infoVendedor AS
SELECT v.idVendedor, PNombre+' '+SNombre+' '+PApellido+' '+SApellido vendedor FROM vendedor v
INNER JOIN empleado e ON v.idEmpleado=e.idEmpleado
INNER JOIN persona p ON p.idPersona=e.idPersona

---Informacion de la sucursal
CREATE VIEW vw_infoSucursal AS
SELECT nombre,direccion,telefono,correo FROM sucursal 

---Nombre de los empleados que son Tecnico Auxiliar
CREATE VIEW vw_infoempauxi AS
SELECT p.PNombre, c.Descripcion  FROM cargo c
INNER JOIN empleadoporcargo ep ON c.idCargo=ep.idCargo
INNER JOIN empleado e ON e.idEmpleado=ep.idEmpleado
INNER JOIN persona p ON  p.idPersona=e.idEmpleado
WHERE Descripcion='Tecnico Auxiliar'

---Informacion de la editorial
CREATE VIEW vw_info AS
SELECT nombre,direccion,telefono FROM editorial 

---Pagos con Tarjeta
CREATE VIEW vw_pagoTarjeta AS
SELECT p.idPago FROM pago p 
INNER JOIN tipopago tp ON p.idPago= tp.idPago
WHERE tp.descripcion='Tarjeta'


---Pagos en efectivo
CREATE VIEW vw_pagoTarjeta AS
SELECT p.idPago FROM pago p 
INNER JOIN tipopago tp ON p.idPago= tp.idPago
WHERE tp.descripcion='Efectivo'

CREATE VIEW vw_infoempleado AS
SELECT e.idEmpleado, PNombre+' '+SNombre+' '+PApellido+' '+SApellido NombreEmpleado FROM empleado e
INNER JOIN persona p ON p.idPersona=e.idPersona