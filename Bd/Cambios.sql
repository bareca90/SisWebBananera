--Ya Subidos
ALTER TABLE seg_empresa
ADD seg_emp_ubicacion VARCHAR(100);
ALTER TABLE seg_empresa
ADD seg_emp_email VARCHAR(50);
ALTER TABLE inv_ingreso_compra
ADD inv_inc_factura VARCHAR(18);
--Pendientes de Subir
-- Crear la tabla cse_lote
CREATE TABLE cse_lote (
    cse_lot_codigo INT AUTO_INCREMENT PRIMARY KEY,
    cse_lot_lote INT(4),
    cse_lot_superficie INT(4)
);
-- Crear la tabla cse_hectarea
CREATE TABLE cse_hectarea (
    cse_hec_codigo INT AUTO_INCREMENT PRIMARY KEY,
    cse_lot_codigo INT,
    cse_hec_hectareas INT(4),
    cse_hec_estado CHAR(1),
    FOREIGN KEY (cse_lot_codigo) REFERENCES cse_lote(cse_lot_codigo)
);
-- Crear la tabla cse_encinte
CREATE TABLE cse_encinte (
    cse_enc_codigo INT AUTO_INCREMENT PRIMARY KEY,
    cse_lot_codigo INT,
    cse_codigo_prod INT(4),
    cse_enc_cantidad INT,
    cse_enc_fec_ini DATE,
    cse_enc_fec_fin DATE,
    cse_enc_responsable VARCHAR(255),
    cse_enc_semana INT,
    cse_enc_nota VARCHAR(250),
    cse_enc_estado CHARACTER(1),
    FOREIGN KEY (cse_lot_codigo) REFERENCES cse_lote(cse_lot_codigo)
);
-- Crear la tabla cse_cosecha
CREATE TABLE cse_cosecha (
    cse_cos_codigo INT AUTO_INCREMENT PRIMARY KEY,
    cos_lot_codigo INT,
    cse_hec_codigo INT,
    cse_cos_fecha DATE,
    cse_cos_responsable VARCHAR(30),
    cse_cos_racimos_cosechados DECIMAL(10,2),
    cse_cos_racimos_rechazados DECIMAL(10,2),
    cse_cos_manos_racimo DECIMAL(10,2),
    cse_cos_manos_rechazadas DECIMAL(10,2),
    cse_cos_total_racimos DECIMAL(10,2),
    cse_cos_total_manos DECIMAL(10,2),
    cse_cos_pmerma DECIMAL(10,2),
    cse_cos_estado CHARACTER(1),
    FOREIGN KEY (cos_lot_codigo) REFERENCES cse_lote(cse_lot_codigo),
    FOREIGN KEY (cse_hec_codigo) REFERENCES cse_hectarea(cse_hec_codigo)
);
-- Creacuin Tabla desinfeccion 
CREATE TABLE cse_lavado_desinfeccion(
	cse_des_codigo INT AUTO_INCREMENT PRIMARY KEY,
	reb_pro_codigo INT,
	cse_des_cantidad INT,
	cse_cos_codigo INT,
	cse_des_fecha_lavado DATE,
	cse_des_responsable VARCHAR(40),
	cse_des_estado CHARACTER(1),
	FOREIGN KEY (reb_pro_codigo) REFERENCES reb_producto(reb_pro_codigo),
   FOREIGN KEY (cse_cos_codigo) REFERENCES cse_cosecha(cse_cos_codigo)
);
-- Creacion Tabla Empaquetado 
CREATE TABLE cse_empaquetado(
	cse_emp_codigo	INT AUTO_INCREMENT PRIMARY KEY,
	cse_cos_codigo INT,
	cse_emp_fecha DATE,
	cse_emp_responsable VARCHAR(40),
	cse_emp_manos_caja INT,
	cse_emp_real_manos_caja INT,
	cse_emp_rango_cajas DECIMAL(10,2),
	cse_emp_real_cajas DECIMAL(10,2),
	cse_emp_estado CHARACTER(1),
   FOREIGN KEY (cse_cos_codigo) REFERENCES cse_cosecha(cse_cos_codigo)
);
-- Creacion Tabla Calibrador 
CREATE TABLE cse_calibrador(
	cse_cal_codigo INT AUTO_INCREMENT PRIMARY KEY,
	cse_cos_codigo INT,
	cse_cal_fecha DATE,
	cse_cal_responsable VARCHAR(40),
	cse_cal_calibre DECIMAL(10,2),
	cse_cal_estado CHARACTER(1),
   FOREIGN KEY (cse_cos_codigo) REFERENCES cse_cosecha(cse_cos_codigo)
)
ALTER TABLE cse_cosecha
ADD cse_cos_tipo CHAR(3);

ALTER TABLE cse_cosecha
ADD cse_cos_cod_encinte INT;

ALTER TABLE cse_empaquetado
ADD cse_emp_cod_producto INT;

ALTER TABLE cse_empaquetado
ADD cse_emp_cantidad INT;