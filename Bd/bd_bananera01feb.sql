-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.1.0 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla db_bananera.cse_calibrador
CREATE TABLE IF NOT EXISTS `cse_calibrador` (
  `cse_cal_codigo` int NOT NULL AUTO_INCREMENT,
  `cse_cos_codigo` int DEFAULT NULL,
  `cse_cal_fecha` date DEFAULT NULL,
  `cse_cal_responsable` varchar(40) DEFAULT NULL,
  `cse_cal_calibre` decimal(10,2) DEFAULT NULL,
  `cse_cal_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`cse_cal_codigo`),
  KEY `cse_cos_codigo` (`cse_cos_codigo`),
  CONSTRAINT `cse_calibrador_ibfk_1` FOREIGN KEY (`cse_cos_codigo`) REFERENCES `cse_cosecha` (`cse_cos_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_calibrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_calibrador` DISABLE KEYS */;
REPLACE INTO `cse_calibrador` (`cse_cal_codigo`, `cse_cos_codigo`, `cse_cal_fecha`, `cse_cal_responsable`, `cse_cal_calibre`, `cse_cal_estado`) VALUES
	(1, 2, '2024-02-01', 'LUIS DIAZ', 12.00, 'N'),
	(2, 2, '2024-02-01', 'ANDRES SUAREZ', 0.00, 'A');
/*!40000 ALTER TABLE `cse_calibrador` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.cse_cinta
CREATE TABLE IF NOT EXISTS `cse_cinta` (
  `cse_cin_codigo` int NOT NULL AUTO_INCREMENT,
  `cse_cin_color` varchar(45) DEFAULT NULL,
  `cse_cin_fecha` date DEFAULT NULL,
  `cse_cin_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`cse_cin_codigo`),
  UNIQUE KEY `cse_cin_color_UNIQUE` (`cse_cin_color`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_cinta: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_cinta` DISABLE KEYS */;
REPLACE INTO `cse_cinta` (`cse_cin_codigo`, `cse_cin_color`, `cse_cin_fecha`, `cse_cin_estado`) VALUES
	(1, 'Amarillo', '2023-11-15', 'A');
/*!40000 ALTER TABLE `cse_cinta` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.cse_cosecha
CREATE TABLE IF NOT EXISTS `cse_cosecha` (
  `cse_cos_codigo` int NOT NULL AUTO_INCREMENT,
  `cos_lot_codigo` int DEFAULT NULL,
  `cse_hec_codigo` int DEFAULT NULL,
  `cse_cos_fecha` date DEFAULT NULL,
  `cse_cos_responsable` varchar(30) DEFAULT NULL,
  `cse_cos_racimos_cosechados` decimal(10,2) DEFAULT NULL,
  `cse_cos_racimos_rechazados` decimal(10,2) DEFAULT NULL,
  `cse_cos_manos_racimo` decimal(10,2) DEFAULT NULL,
  `cse_cos_manos_rechazadas` decimal(10,2) DEFAULT NULL,
  `cse_cos_total_racimos` decimal(10,2) DEFAULT NULL,
  `cse_cos_total_manos` decimal(10,2) DEFAULT NULL,
  `cse_cos_pmerma` decimal(10,2) DEFAULT NULL,
  `cse_cos_estado` char(1) DEFAULT NULL,
  `cse_cos_tipo` char(3) DEFAULT NULL,
  `cse_cos_cod_encinte` int DEFAULT NULL,
  PRIMARY KEY (`cse_cos_codigo`),
  KEY `cos_lot_codigo` (`cos_lot_codigo`),
  KEY `cse_hec_codigo` (`cse_hec_codigo`),
  CONSTRAINT `cse_cosecha_ibfk_1` FOREIGN KEY (`cos_lot_codigo`) REFERENCES `cse_lote` (`cse_lot_codigo`),
  CONSTRAINT `cse_cosecha_ibfk_2` FOREIGN KEY (`cse_hec_codigo`) REFERENCES `cse_hectarea` (`cse_hec_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_cosecha: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_cosecha` DISABLE KEYS */;
REPLACE INTO `cse_cosecha` (`cse_cos_codigo`, `cos_lot_codigo`, `cse_hec_codigo`, `cse_cos_fecha`, `cse_cos_responsable`, `cse_cos_racimos_cosechados`, `cse_cos_racimos_rechazados`, `cse_cos_manos_racimo`, `cse_cos_manos_rechazadas`, `cse_cos_total_racimos`, `cse_cos_total_manos`, `cse_cos_pmerma`, `cse_cos_estado`, `cse_cos_tipo`, `cse_cos_cod_encinte`) VALUES
	(1, 1, 2, '2024-02-01', 'NNG', 90.00, 9.00, 9.00, 9.00, 99.00, 99.00, 9.00, 'N', 'KAS', 3),
	(2, 1, 2, '2024-02-01', 'NINGUNO', 90.00, 999.00, 888.00, 56.00, 665.00, 55.00, 5.00, 'A', 'ECS', 3);
/*!40000 ALTER TABLE `cse_cosecha` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.cse_cosecha_empaque
CREATE TABLE IF NOT EXISTS `cse_cosecha_empaque` (
  `cse_cse_codigo` int NOT NULL AUTO_INCREMENT,
  `cse_cse_tipo` char(3) DEFAULT NULL,
  `cse_cse_num_racimos_procesados` int DEFAULT NULL,
  `cse_cse_total_cajas` int DEFAULT NULL,
  `cse_cse_num_racimos_rechazadas` int DEFAULT NULL,
  `cse_cse_peso` decimal(10,2) DEFAULT NULL,
  `cse_cse_num_manos_rechazadas` int DEFAULT NULL,
  `cse_cse_merma` decimal(10,2) DEFAULT NULL,
  `cse_cse_num_cajas_procesadas` int DEFAULT NULL,
  `cse_cse_ratio` decimal(10,2) DEFAULT NULL,
  `cse_cse_num_cajas_enviadas` int DEFAULT NULL,
  `cse_cse_has` int DEFAULT NULL,
  `cse_cse_venta` decimal(10,2) DEFAULT NULL,
  `cse_cse_estado` char(1) DEFAULT NULL,
  `cse_cse_usu_creacion` int DEFAULT NULL,
  `cse_cse_fec_hora_creacion` datetime DEFAULT NULL,
  `cse_cse_usu_modificacion` int DEFAULT NULL,
  `cse_cse_fec_hora_modificacion` datetime DEFAULT NULL,
  `cse_cin_codigo` int NOT NULL,
  `cse_cse_fecha` date DEFAULT NULL,
  PRIMARY KEY (`cse_cse_codigo`),
  KEY `fk_cse_cosechaempaque_cse_cinta1_idx` (`cse_cin_codigo`),
  CONSTRAINT `fk_cse_cosechaempaque_cse_cinta1` FOREIGN KEY (`cse_cin_codigo`) REFERENCES `cse_cinta` (`cse_cin_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_cosecha_empaque: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_cosecha_empaque` DISABLE KEYS */;
REPLACE INTO `cse_cosecha_empaque` (`cse_cse_codigo`, `cse_cse_tipo`, `cse_cse_num_racimos_procesados`, `cse_cse_total_cajas`, `cse_cse_num_racimos_rechazadas`, `cse_cse_peso`, `cse_cse_num_manos_rechazadas`, `cse_cse_merma`, `cse_cse_num_cajas_procesadas`, `cse_cse_ratio`, `cse_cse_num_cajas_enviadas`, `cse_cse_has`, `cse_cse_venta`, `cse_cse_estado`, `cse_cse_usu_creacion`, `cse_cse_fec_hora_creacion`, `cse_cse_usu_modificacion`, `cse_cse_fec_hora_modificacion`, `cse_cin_codigo`, `cse_cse_fecha`) VALUES
	(1, 'ECS', 4, 3, 4, 5.00, 6, 55.00, 34, 7.00, 78, 5, 8.00, 'A', 1, '2023-11-15 20:00:30', 1, '2023-11-15 20:00:30', 1, '2023-11-15'),
	(2, 'KAS', 44, 23, 454, 5.00, 7, 7.00, 12, 7.00, 8, 12, 21.00, 'N', 1, '2023-11-15 20:06:08', 1, '2023-11-15 20:06:20', 1, '2023-11-15'),
	(3, 'ECS', 12, 30, 23, 12.00, 12, 2.00, 23, 0.00, 78, 1, 0.00, 'P', 1, '2024-01-03 21:21:41', 1, '2024-01-03 21:21:41', 1, '2024-01-02'),
	(5, 'KAS', 56, 45, 12, 90.00, 9, 1.00, 9, 0.80, 56, 78, 0.00, 'A', 1, '2024-01-03 23:04:21', 1, '2024-01-03 23:04:52', 1, '2024-01-03'),
	(6, 'KAS', 23, 45, 8, 12.00, 888, 8.00, 8, 1.96, 0, 8, 0.00, 'A', 1, '2024-01-03 23:06:09', 1, '2024-01-03 23:06:09', 1, '2024-01-03'),
	(8, 'KAS', 345, 45, 12, 222.00, 244, 8.00, 88, 0.13, 99, 99, 0.00, 'N', 1, '2024-01-03 23:09:01', 1, '2024-01-03 23:09:01', 1, '2024-01-04'),
	(9, 'ECS', 34, 90, 9, 999.00, 67, 77.00, 34, 2.65, 4, 23, 0.00, 'N', 1, '2024-01-14 16:31:01', 1, '2024-01-14 16:31:01', 1, '2024-01-14'),
	(11, 'ECS', 78, 889, 90, 78.00, 7, 8.00, 88, 11.40, 888, 0, 0.00, 'N', 1, '2024-01-19 18:48:27', 1, '2024-01-19 18:48:27', 1, '2024-01-01');
/*!40000 ALTER TABLE `cse_cosecha_empaque` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.cse_empaquetado
CREATE TABLE IF NOT EXISTS `cse_empaquetado` (
  `cse_emp_codigo` int NOT NULL AUTO_INCREMENT,
  `cse_cos_codigo` int DEFAULT NULL,
  `cse_emp_fecha` date DEFAULT NULL,
  `cse_emp_responsable` varchar(40) DEFAULT NULL,
  `cse_emp_manos_caja` int DEFAULT NULL,
  `cse_emp_real_manos_caja` int DEFAULT NULL,
  `cse_emp_rango_cajas` decimal(10,2) DEFAULT NULL,
  `cse_emp_real_cajas` decimal(10,2) DEFAULT NULL,
  `cse_emp_estado` char(1) DEFAULT NULL,
  `cse_emp_cod_producto` int DEFAULT NULL,
  `cse_emp_cantidad` int DEFAULT NULL,
  PRIMARY KEY (`cse_emp_codigo`),
  KEY `cse_cos_codigo` (`cse_cos_codigo`),
  CONSTRAINT `cse_empaquetado_ibfk_1` FOREIGN KEY (`cse_cos_codigo`) REFERENCES `cse_cosecha` (`cse_cos_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_empaquetado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_empaquetado` DISABLE KEYS */;
REPLACE INTO `cse_empaquetado` (`cse_emp_codigo`, `cse_cos_codigo`, `cse_emp_fecha`, `cse_emp_responsable`, `cse_emp_manos_caja`, `cse_emp_real_manos_caja`, `cse_emp_rango_cajas`, `cse_emp_real_cajas`, `cse_emp_estado`, `cse_emp_cod_producto`, `cse_emp_cantidad`) VALUES
	(1, 2, '2024-02-01', 'JULIA SOLIS DE LOS REYES', 10, 123, 12.00, 34.00, 'N', 1, 12),
	(2, 2, '2024-02-01', 'ANA SOLIS VITE', 34, 34, 9.00, 8.00, 'A', 2, 12);
/*!40000 ALTER TABLE `cse_empaquetado` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.cse_encinte
CREATE TABLE IF NOT EXISTS `cse_encinte` (
  `cse_enc_codigo` int NOT NULL AUTO_INCREMENT,
  `cse_lot_codigo` int DEFAULT NULL,
  `cse_codigo_prod` int DEFAULT NULL,
  `cse_enc_cantidad` int DEFAULT NULL,
  `cse_enc_fec_ini` date DEFAULT NULL,
  `cse_enc_fec_fin` date DEFAULT NULL,
  `cse_enc_responsable` varchar(255) DEFAULT NULL,
  `cse_enc_semana` int DEFAULT NULL,
  `cse_enc_nota` varchar(250) DEFAULT NULL,
  `cse_enc_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`cse_enc_codigo`),
  KEY `cse_lot_codigo` (`cse_lot_codigo`),
  CONSTRAINT `cse_encinte_ibfk_1` FOREIGN KEY (`cse_lot_codigo`) REFERENCES `cse_lote` (`cse_lot_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_encinte: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_encinte` DISABLE KEYS */;
REPLACE INTO `cse_encinte` (`cse_enc_codigo`, `cse_lot_codigo`, `cse_codigo_prod`, `cse_enc_cantidad`, `cse_enc_fec_ini`, `cse_enc_fec_fin`, `cse_enc_responsable`, `cse_enc_semana`, `cse_enc_nota`, `cse_enc_estado`) VALUES
	(3, 1, 1, 0, '2024-02-01', '2024-02-09', 'ANDRES', 34, 'POR FAVOR NO TOMA', 'A');
/*!40000 ALTER TABLE `cse_encinte` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.cse_hectarea
CREATE TABLE IF NOT EXISTS `cse_hectarea` (
  `cse_hec_codigo` int NOT NULL AUTO_INCREMENT,
  `cse_lot_codigo` int DEFAULT NULL,
  `cse_hec_hectareas` int DEFAULT NULL,
  `cse_hec_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`cse_hec_codigo`),
  KEY `cse_lot_codigo` (`cse_lot_codigo`),
  CONSTRAINT `cse_hectarea_ibfk_1` FOREIGN KEY (`cse_lot_codigo`) REFERENCES `cse_lote` (`cse_lot_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_hectarea: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_hectarea` DISABLE KEYS */;
REPLACE INTO `cse_hectarea` (`cse_hec_codigo`, `cse_lot_codigo`, `cse_hec_hectareas`, `cse_hec_estado`) VALUES
	(2, 1, 123, 'M');
/*!40000 ALTER TABLE `cse_hectarea` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.cse_lavado_desinfeccion
CREATE TABLE IF NOT EXISTS `cse_lavado_desinfeccion` (
  `cse_des_codigo` int NOT NULL AUTO_INCREMENT,
  `reb_pro_codigo` int DEFAULT NULL,
  `cse_des_cantidad` int DEFAULT NULL,
  `cse_cos_codigo` int DEFAULT NULL,
  `cse_des_fecha_lavado` date DEFAULT NULL,
  `cse_des_responsable` varchar(40) DEFAULT NULL,
  `cse_des_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`cse_des_codigo`),
  KEY `reb_pro_codigo` (`reb_pro_codigo`),
  KEY `cse_cos_codigo` (`cse_cos_codigo`),
  CONSTRAINT `cse_lavado_desinfeccion_ibfk_1` FOREIGN KEY (`reb_pro_codigo`) REFERENCES `reb_producto` (`reb_pro_codigo`),
  CONSTRAINT `cse_lavado_desinfeccion_ibfk_2` FOREIGN KEY (`cse_cos_codigo`) REFERENCES `cse_cosecha` (`cse_cos_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_lavado_desinfeccion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_lavado_desinfeccion` DISABLE KEYS */;
REPLACE INTO `cse_lavado_desinfeccion` (`cse_des_codigo`, `reb_pro_codigo`, `cse_des_cantidad`, `cse_cos_codigo`, `cse_des_fecha_lavado`, `cse_des_responsable`, `cse_des_estado`) VALUES
	(1, 1, 34, 2, '2024-02-01', 'JUNIA MARTINEZ', 'A'),
	(2, 1, 12, 2, '2024-02-01', 'ANDRES', 'N'),
	(3, NULL, NULL, 2, NULL, NULL, NULL),
	(4, NULL, NULL, 2, NULL, NULL, NULL),
	(5, NULL, NULL, 2, NULL, NULL, NULL),
	(6, NULL, NULL, 2, NULL, NULL, NULL),
	(7, NULL, NULL, 2, NULL, NULL, NULL),
	(8, NULL, NULL, 2, NULL, NULL, NULL);
/*!40000 ALTER TABLE `cse_lavado_desinfeccion` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.cse_lote
CREATE TABLE IF NOT EXISTS `cse_lote` (
  `cse_lot_codigo` int NOT NULL AUTO_INCREMENT,
  `cse_lot_lote` int DEFAULT NULL,
  `cse_lot_superficie` int DEFAULT NULL,
  PRIMARY KEY (`cse_lot_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.cse_lote: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cse_lote` DISABLE KEYS */;
REPLACE INTO `cse_lote` (`cse_lot_codigo`, `cse_lot_lote`, `cse_lot_superficie`) VALUES
	(1, 23, 34),
	(2, 7, 12);
/*!40000 ALTER TABLE `cse_lote` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.evc_evaluacion_campo
CREATE TABLE IF NOT EXISTS `evc_evaluacion_campo` (
  `evc_evc_codigo` int NOT NULL AUTO_INCREMENT,
  `evc_evc_productor` varchar(45) DEFAULT NULL,
  `evc_evc_exportador` varchar(45) DEFAULT NULL,
  `evc_evc_placa_contenedor` varchar(45) DEFAULT NULL,
  `evc_evc_fecha_evaluacion` date DEFAULT NULL,
  `evc_evc_sellos_exportador` varchar(45) DEFAULT NULL,
  `evc_evc_destino` varchar(45) DEFAULT NULL,
  `evc_evc_calidad` varchar(45) DEFAULT NULL,
  `evc_evc_tipo_empaque` varchar(45) DEFAULT NULL,
  `evc_evc_num_caja` int DEFAULT NULL,
  `evc_evc_marca` varchar(45) DEFAULT NULL,
  `evc_evc_fruta_primera` varchar(45) DEFAULT NULL,
  `evc_evc_calibre` decimal(10,2) DEFAULT NULL,
  `evc_evc_cargo_dedos` decimal(10,2) DEFAULT NULL,
  `evc_evc_dedos_cluster` int DEFAULT NULL,
  `evc_evc_cluster_caja` int DEFAULT NULL,
  `evc_evc_estado` char(1) DEFAULT NULL,
  `evc_evc_usu_creacion` int DEFAULT NULL,
  `evc_evc_fec_hora_creacion` datetime DEFAULT NULL,
  `evc_evc_usu_modificacion` int DEFAULT NULL,
  `evc_evc_fec_hora_modificacion` datetime DEFAULT NULL,
  `reb_con_codigo` int NOT NULL,
  PRIMARY KEY (`evc_evc_codigo`),
  KEY `fk_evc_evaluacion_campo_reb_contrato1_idx` (`reb_con_codigo`),
  CONSTRAINT `fk_evc_evaluacion_campo_reb_contrato1` FOREIGN KEY (`reb_con_codigo`) REFERENCES `reb_contrato` (`reb_con_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.evc_evaluacion_campo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `evc_evaluacion_campo` DISABLE KEYS */;
REPLACE INTO `evc_evaluacion_campo` (`evc_evc_codigo`, `evc_evc_productor`, `evc_evc_exportador`, `evc_evc_placa_contenedor`, `evc_evc_fecha_evaluacion`, `evc_evc_sellos_exportador`, `evc_evc_destino`, `evc_evc_calidad`, `evc_evc_tipo_empaque`, `evc_evc_num_caja`, `evc_evc_marca`, `evc_evc_fruta_primera`, `evc_evc_calibre`, `evc_evc_cargo_dedos`, `evc_evc_dedos_cluster`, `evc_evc_cluster_caja`, `evc_evc_estado`, `evc_evc_usu_creacion`, `evc_evc_fec_hora_creacion`, `evc_evc_usu_modificacion`, `evc_evc_fec_hora_modificacion`, `reb_con_codigo`) VALUES
	(1, 'ADADA', 'ADADAD', 'SFADADA', '2023-11-15', 'ADADAD', 'ADADAD', 'ASDADA', 'JJJJJJ', 3, 'ADADAD', 'AWDAD', 3.00, 3.00, 333, 45, 'N', 1, '2023-11-15 20:21:55', 1, '2023-11-15 20:24:25', 1),
	(2, 'NINGUNO', 'NINGUNO', 'GRT-1234', '2023-11-10', 'SLFJSK', 'SLJFSKJ', 'LSKFSLKF', 'SKFLSK', 1, 'NINGUNA', 'NINGUNA', 10.00, 12.00, 12, 89, 'N', 1, '2024-01-03 21:19:47', 1, '2024-01-03 21:19:47', 1),
	(4, 'NN', 'NN', 'NNN', '2024-01-21', 'nn', 'NN', 'NN', 'NNN', 45, 'NN', '78', 88.00, 88.00, 888, 8, 'A', 1, '2024-01-21 20:03:31', 1, '2024-01-21 20:03:31', 1);
/*!40000 ALTER TABLE `evc_evaluacion_campo` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.gre_guia_remision
CREATE TABLE IF NOT EXISTS `gre_guia_remision` (
  `gre_gre_codigo` int NOT NULL AUTO_INCREMENT,
  `gre_gre_fecha_emision` date DEFAULT NULL,
  `gre_gre_comprobante_venta` varchar(45) DEFAULT NULL,
  `gre_gre_motivo_traslado` varchar(50) DEFAULT NULL,
  `gre_gre_punto_partida` varchar(45) DEFAULT NULL,
  `gre_gre_punto_llegada` varchar(45) DEFAULT NULL,
  `gre_gre_despachador` varchar(45) DEFAULT NULL,
  `gre_gre_transportista` varchar(50) DEFAULT NULL,
  `gre_gre_ruc_ci` varchar(13) DEFAULT NULL,
  `gre_gre_cat_cajas_transportadas` int DEFAULT NULL,
  `gre_gre_estado_entrega` char(1) DEFAULT NULL,
  `gre_gre_usu_creacion` int DEFAULT NULL,
  `gre_gre_fec_hora_creacion` datetime DEFAULT NULL,
  `gre_gre_usu_modificacion` int DEFAULT NULL,
  `gre_gre_fec_hora_modificacion` varchar(45) DEFAULT NULL,
  `gre_gre_estado_ent` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`gre_gre_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.gre_guia_remision: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `gre_guia_remision` DISABLE KEYS */;
REPLACE INTO `gre_guia_remision` (`gre_gre_codigo`, `gre_gre_fecha_emision`, `gre_gre_comprobante_venta`, `gre_gre_motivo_traslado`, `gre_gre_punto_partida`, `gre_gre_punto_llegada`, `gre_gre_despachador`, `gre_gre_transportista`, `gre_gre_ruc_ci`, `gre_gre_cat_cajas_transportadas`, `gre_gre_estado_entrega`, `gre_gre_usu_creacion`, `gre_gre_fec_hora_creacion`, `gre_gre_usu_modificacion`, `gre_gre_fec_hora_modificacion`, `gre_gre_estado_ent`) VALUES
	(1, '2023-11-15', '001-001-123456789', 'Ninguno ', 'ninguno', 'ninguno', 'Bairon Reyes', 'Jose Fuentes', '1206702174', 12, 'N', 1, '2023-11-15 21:34:15', 1, '2023-11-15 21:42:18', 'En proceso'),
	(2, '2023-11-15', '001-001-123456789', 'NINGUNO', 'NINGUNO', 'MILAGRO', 'JOSE PEREZ', 'ANDRES IDROVO', '1206702175', 12, 'P', 1, '2023-11-15 21:45:17', 1, '2023-11-15 21:45:29', 'EN PROCESO'),
	(3, '2024-01-01', '001-002-000012345', 'VIAJE', 'SALINAS', 'BUCAY', 'JOSE ', 'NINGUNO', '1206702175', 123, 'N', 1, '2024-01-03 22:42:03', 1, '2024-01-03 22:42:14', 'PROCESOS'),
	(4, '2024-01-20', '0010010000000078', 'NINGUNO', 'NINGUNO', 'NINGUNO', 'NINGUNO', 'NINGUNO', '1206702175', 134, 'N', 1, '2024-01-20 18:29:22', 1, '2024-01-20 18:29:22', 'EN PROCESO'),
	(5, '2024-01-20', '001-002-000000009', 'NINGUNO', 'NINGUNO', 'NINGUNO', 'NINGUNO', 'NINGUNO', '1206702175', 90, 'N', 1, '2024-01-20 20:00:57', 1, '2024-01-20 20:00:57', 'NINGUNO');
/*!40000 ALTER TABLE `gre_guia_remision` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.inv_ingreso_compra
CREATE TABLE IF NOT EXISTS `inv_ingreso_compra` (
  `inv_inc_codigo` int NOT NULL AUTO_INCREMENT,
  `inv_inc_cantidad` int DEFAULT NULL,
  `inv_inc_fecha_ingreso` date DEFAULT NULL,
  `inv_inc_observaciones` varchar(100) DEFAULT NULL,
  `inv_inc_estado` char(1) DEFAULT NULL,
  `inv_inc_usu_creacion` int DEFAULT NULL,
  `inv_inc_fec_hora_creacion` datetime DEFAULT NULL,
  `inv_inc_usu_modificacion` int DEFAULT NULL,
  `inv_inc_fec_hora_modificacion` datetime DEFAULT NULL,
  `inv_inc_ubicacion` varchar(45) DEFAULT NULL,
  `reb_pro_codigo` int NOT NULL,
  `reb_prv_codigo` int NOT NULL,
  `inv_inc_factura` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`inv_inc_codigo`),
  KEY `fk_inv_ingreso_compra_reb_producto1_idx` (`reb_pro_codigo`),
  KEY `fk_inv_ingreso_compra_reb_proveedor1_idx` (`reb_prv_codigo`),
  CONSTRAINT `fk_inv_ingreso_compra_reb_producto1` FOREIGN KEY (`reb_pro_codigo`) REFERENCES `reb_producto` (`reb_pro_codigo`),
  CONSTRAINT `fk_inv_ingreso_compra_reb_proveedor1` FOREIGN KEY (`reb_prv_codigo`) REFERENCES `reb_proveedor` (`reb_prv_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.inv_ingreso_compra: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `inv_ingreso_compra` DISABLE KEYS */;
REPLACE INTO `inv_ingreso_compra` (`inv_inc_codigo`, `inv_inc_cantidad`, `inv_inc_fecha_ingreso`, `inv_inc_observaciones`, `inv_inc_estado`, `inv_inc_usu_creacion`, `inv_inc_fec_hora_creacion`, `inv_inc_usu_modificacion`, `inv_inc_fec_hora_modificacion`, `inv_inc_ubicacion`, `reb_pro_codigo`, `reb_prv_codigo`, `inv_inc_factura`) VALUES
	(1, 20, '2023-11-14', 'ninguna', 'N', 1, '2023-11-14 05:21:16', 1, '2023-11-14 05:51:52', 'CINTAS PARA BANANO VERDE', 1, 2, NULL),
	(2, 70, '2023-11-14', 'nn', 'N', 1, '2023-11-14 06:50:59', 1, '2023-11-14 06:51:07', 'CINTAS PARA BANANO VERDE', 1, 2, NULL),
	(3, 23, '2023-11-14', 'NINGUNA', 'N', 1, '2023-11-14 06:56:33', 1, '2023-11-14 06:56:39', 'CINTAS PARA BANANO VERDE', 1, 2, NULL),
	(4, 234, '2023-11-14', 'nnn', 'N', 1, '2023-11-14 06:58:46', 1, '2023-11-14 06:58:46', 'EN EL SUELO', 1, 2, NULL),
	(5, 12, '2024-01-03', 'NINGUNA', 'P', 1, '2024-01-03 22:53:06', 1, '2024-01-03 22:53:06', 'ALMACEN PRINCIPAL', 1, 2, NULL),
	(8, 89, '2024-01-21', '', 'N', 1, '2024-01-21 14:45:36', 1, '2024-01-21 14:45:46', 'CINTAS PARA BANANO VERDE', 1, 2, '001-002-000000009'),
	(9, 12, '2024-01-21', '', 'P', 1, '2024-01-21 14:55:32', 1, '2024-01-21 14:55:32', 'BODEGA', 1, 2, '123-009-123456789'),
	(10, 2000, '2024-02-01', '', 'P', 1, '2024-02-01 18:19:24', 1, '2024-02-01 18:19:24', 'BODEGA', 2, 2, '001-002-000000009');
/*!40000 ALTER TABLE `inv_ingreso_compra` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.reb_contrato
CREATE TABLE IF NOT EXISTS `reb_contrato` (
  `reb_con_codigo` int NOT NULL AUTO_INCREMENT,
  `reb_con_fec_inicio` date DEFAULT NULL,
  `reb_con_fec_fin` date DEFAULT NULL,
  `reb_con_pago` decimal(10,2) DEFAULT NULL,
  `reb_con_firma` varchar(15) DEFAULT NULL,
  `reb_descripcion` varchar(45) DEFAULT NULL,
  `reb_con_estado` char(1) DEFAULT NULL,
  `reb_con_usu_creacion` int DEFAULT NULL,
  `reb_con_usu_fec_hora_creacion` datetime DEFAULT NULL,
  `reb_con_usu_modificacion` int DEFAULT NULL,
  `reb_con_usu_fec_hora_modificacion` datetime DEFAULT NULL,
  `reb_prv_codigo` int NOT NULL,
  PRIMARY KEY (`reb_con_codigo`),
  KEY `fk_reb_contrato_reb_proveedor1_idx` (`reb_prv_codigo`),
  CONSTRAINT `fk_reb_contrato_reb_proveedor1` FOREIGN KEY (`reb_prv_codigo`) REFERENCES `reb_proveedor` (`reb_prv_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.reb_contrato: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `reb_contrato` DISABLE KEYS */;
REPLACE INTO `reb_contrato` (`reb_con_codigo`, `reb_con_fec_inicio`, `reb_con_fec_fin`, `reb_con_pago`, `reb_con_firma`, `reb_descripcion`, `reb_con_estado`, `reb_con_usu_creacion`, `reb_con_usu_fec_hora_creacion`, `reb_con_usu_modificacion`, `reb_con_usu_fec_hora_modificacion`, `reb_prv_codigo`) VALUES
	(1, '2023-08-09', '2023-11-10', 12.34, 'Bairon Reyes', 'Cintas', 'A', 1, '2023-11-10 19:41:12', 1, '2023-11-10 19:41:12', 1),
	(2, '2024-01-18', '2024-01-19', 12.00, '', 'PRUEBA', 'A', 1, '2024-01-19 18:21:58', 1, '2024-01-19 18:22:06', 1);
/*!40000 ALTER TABLE `reb_contrato` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.reb_producto
CREATE TABLE IF NOT EXISTS `reb_producto` (
  `reb_pro_codigo` int NOT NULL AUTO_INCREMENT,
  `reb_pro_descripcion` varchar(100) DEFAULT NULL,
  `reb_pro_ubicacion` varchar(50) DEFAULT NULL,
  `reb_pro_stock` int DEFAULT NULL,
  `reb_pro_estado` char(1) DEFAULT NULL,
  `reb_pro_usu_creacion` int DEFAULT NULL,
  `reb_pro_usu_fec_hora_creacion` datetime DEFAULT NULL,
  `reb_pro_usu_modificacion` int DEFAULT NULL,
  `reb_pro_fec_hora_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`reb_pro_codigo`),
  UNIQUE KEY `reb_pro_descripcion_UNIQUE` (`reb_pro_descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.reb_producto: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `reb_producto` DISABLE KEYS */;
REPLACE INTO `reb_producto` (`reb_pro_codigo`, `reb_pro_descripcion`, `reb_pro_ubicacion`, `reb_pro_stock`, `reb_pro_estado`, `reb_pro_usu_creacion`, `reb_pro_usu_fec_hora_creacion`, `reb_pro_usu_modificacion`, `reb_pro_fec_hora_modificacion`) VALUES
	(1, 'CINTAS PARA BANANO VERDE', 'BODEGA', 44, 'A', 1, '2023-11-10 19:51:57', 1, '2023-11-10 19:52:24'),
	(2, 'CINTAS', 'BODEGA PRINCIPAL', 2000, 'A', 1, '2023-11-15 21:58:29', 1, '2023-11-15 21:58:29');
/*!40000 ALTER TABLE `reb_producto` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.reb_proveedor
CREATE TABLE IF NOT EXISTS `reb_proveedor` (
  `reb_prv_codigo` int NOT NULL AUTO_INCREMENT,
  `reb_prv_razon_social` varchar(50) DEFAULT NULL,
  `reb_prv_ced_ruc` varchar(15) DEFAULT NULL,
  `reb_prv_correo` varchar(45) DEFAULT NULL,
  `reb_prv_contratista` char(2) DEFAULT NULL,
  `reb_prv_estado` char(1) DEFAULT NULL,
  `reb_prv_usu_creacion` int DEFAULT NULL,
  `reb_prv_fec_hora_creacion` datetime DEFAULT NULL,
  `reb_prv_usu_modificacion` int DEFAULT NULL,
  `reb_prv_fec_hora_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`reb_prv_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.reb_proveedor: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `reb_proveedor` DISABLE KEYS */;
REPLACE INTO `reb_proveedor` (`reb_prv_codigo`, `reb_prv_razon_social`, `reb_prv_ced_ruc`, `reb_prv_correo`, `reb_prv_contratista`, `reb_prv_estado`, `reb_prv_usu_creacion`, `reb_prv_fec_hora_creacion`, `reb_prv_usu_modificacion`, `reb_prv_fec_hora_modificacion`) VALUES
	(1, 'Cintamar S.A', '1206702175', 'ba@gmail.com', 'SI', 'A', 1, '2023-11-10 19:38:12', 1, '2023-11-10 19:40:43'),
	(2, 'Banariego  S.A', '1206702175', 'breyes@pr.com', 'NO', 'A', 1, '2023-11-14 05:20:45', 1, '2023-11-14 05:20:45'),
	(3, 'Custrimar', '1206702175001', 'br@pm.com', 'NO', 'A', 1, '2024-01-18 16:47:36', 1, '2024-01-18 16:47:36');
/*!40000 ALTER TABLE `reb_proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_accesos
CREATE TABLE IF NOT EXISTS `seg_accesos` (
  `seg_per_codigo` int NOT NULL,
  `seg_usu_codigo` int NOT NULL,
  `seg_acc_cab_fecha` date DEFAULT NULL,
  `seg_acc_cab_descripcion` varchar(45) DEFAULT NULL,
  `seg_acc_cab_usu_creacion` int DEFAULT NULL,
  `seg_acc_cab_fec_hra_creacion` datetime DEFAULT NULL,
  `seg_acc_cab_usu_modificacion` int DEFAULT NULL,
  `seg_acc_cab_fec_hra_modificacion` datetime DEFAULT NULL,
  `seg_rol_codigo` int NOT NULL,
  PRIMARY KEY (`seg_per_codigo`,`seg_usu_codigo`),
  KEY `fk_seg_accesos_cab_seg_rol1_idx` (`seg_rol_codigo`),
  KEY `fk_seg_accesos_cab_seg_perfil1_idx` (`seg_per_codigo`),
  KEY `fk_seg_accesos_cab_seg_usuario1_idx` (`seg_usu_codigo`),
  CONSTRAINT `fk_seg_accesos_cab_seg_perfil1` FOREIGN KEY (`seg_per_codigo`) REFERENCES `seg_perfil` (`seg_per_codigo`),
  CONSTRAINT `fk_seg_accesos_cab_seg_rol1` FOREIGN KEY (`seg_rol_codigo`) REFERENCES `seg_rol` (`seg_rol_codigo`),
  CONSTRAINT `fk_seg_accesos_cab_seg_usuario1` FOREIGN KEY (`seg_usu_codigo`) REFERENCES `seg_usuario` (`seg_usu_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_accesos: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_accesos` DISABLE KEYS */;
REPLACE INTO `seg_accesos` (`seg_per_codigo`, `seg_usu_codigo`, `seg_acc_cab_fecha`, `seg_acc_cab_descripcion`, `seg_acc_cab_usu_creacion`, `seg_acc_cab_fec_hra_creacion`, `seg_acc_cab_usu_modificacion`, `seg_acc_cab_fec_hra_modificacion`, `seg_rol_codigo`) VALUES
	(1, 7, '2024-01-15', 'NN', 1, '2024-01-15 06:56:20', 1, '2024-01-15 06:56:20', 1),
	(3, 1, '2023-11-12', 'vv', 1, '2023-11-12 20:53:13', 1, '2023-11-12 20:53:16', 1);
/*!40000 ALTER TABLE `seg_accesos` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_aplicacion
CREATE TABLE IF NOT EXISTS `seg_aplicacion` (
  `seg_apl_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_apl_descripcion` varchar(100) NOT NULL,
  `seg_apl_archivo` varchar(100) NOT NULL,
  `seg_apl_tipo` char(3) NOT NULL,
  `seg_apl_estado` char(1) NOT NULL,
  `seg_apl_usuario_creacion` int NOT NULL,
  `seg_apl_fec_hra_creacion` datetime NOT NULL,
  `seg_apl_usuario_modificacion` int NOT NULL,
  `seg_spl_fec_hra_modificacion` datetime NOT NULL,
  `seg_apl_orden` int DEFAULT NULL,
  `seg_apl_id_padre` int DEFAULT NULL,
  `seg_apl_font_icon` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`seg_apl_codigo`),
  KEY `seg_apl_codigo_idx` (`seg_apl_id_padre`),
  CONSTRAINT `seg_apl_codigo` FOREIGN KEY (`seg_apl_id_padre`) REFERENCES `seg_aplicacion` (`seg_apl_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_aplicacion: ~37 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_aplicacion` DISABLE KEYS */;
REPLACE INTO `seg_aplicacion` (`seg_apl_codigo`, `seg_apl_descripcion`, `seg_apl_archivo`, `seg_apl_tipo`, `seg_apl_estado`, `seg_apl_usuario_creacion`, `seg_apl_fec_hra_creacion`, `seg_apl_usuario_modificacion`, `seg_spl_fec_hra_modificacion`, `seg_apl_orden`, `seg_apl_id_padre`, `seg_apl_font_icon`) VALUES
	(1, 'Seguridad', '  ', 'MEN', 'A', 1, '2023-10-07 16:19:27', 1, '2023-10-07 16:19:30', 1, NULL, NULL),
	(2, 'Maestros', '   ', 'SUB', 'A', 1, '2023-10-07 16:20:07', 1, '2023-10-07 16:20:09', 2, 1, NULL),
	(3, 'Registro Usuarios', 'Seguridad/Usuario_Consulta_Nuevo.php', 'APL', 'A', 1, '2023-10-07 16:21:47', 1, '2023-10-07 16:21:49', 3, 2, NULL),
	(4, 'Registro Basicos', '  ', 'MEN', 'A', 1, '2023-10-09 11:58:33', 1, '2023-10-09 11:58:35', 1, NULL, NULL),
	(5, 'Empresa', 'Seguridad/Empresa_Consulta.php', 'APL', 'A', 1, '2023-10-09 17:35:18', 1, '2023-10-09 17:35:24', 4, 2, NULL),
	(6, 'Datos', 'Cosecha_Empaque/Calibrado_Consulta.php', 'APL', 'A', 1, '2023-10-12 13:41:42', 1, '2024-02-01 20:26:47', 5, 2, ' '),
	(7, 'Perfiles', 'Seguridad/Perfil_Consulta.php', 'APL', 'A', 1, '2023-10-23 17:06:36', 1, '2023-10-23 17:06:38', 6, 2, NULL),
	(8, 'Aplicación', 'Seguridad/Aplicacion_Consulta.php', 'APL', 'A', 1, '2023-11-08 00:00:00', 1, '2023-11-08 00:00:00', 7, 2, NULL),
	(9, 'Aplicaciones x Perfil', 'Seguridad/Aplicacion_Perfil_Consulta.php', 'APL', 'A', 1, '2023-11-08 12:44:53', 1, '2023-11-08 12:44:53', 8, 2, ''),
	(10, 'Maestros Reg. Bás.', '', 'SUB', 'A', 1, '2023-11-08 12:46:32', 1, '2023-11-08 12:46:32', 1, 4, ''),
	(11, 'Productos', 'RegistrosBasicos/Producto_Consulta.php', 'APL', 'A', 1, '2023-11-08 12:49:14', 1, '2023-11-08 13:45:00', 1, 10, ''),
	(12, 'Proveedor', 'RegistrosBasicos/Proveedor_Consulta.php', 'APL', 'A', 1, '2023-11-08 13:46:44', 1, '2023-11-08 13:46:44', 2, 10, ''),
	(13, 'Contratos', 'RegistrosBasicos/Contrato_Consulta.php', 'APL', 'A', 1, '2023-11-08 13:49:40', 1, '2023-11-08 13:49:40', 3, 10, ''),
	(14, 'Perfiles x Usuario', 'Seguridad/Acceso_Consulta.php', 'APL', 'A', 1, '2023-11-09 11:00:01', 1, '2023-11-09 11:00:01', 8, 2, ''),
	(16, 'Ing x Compra', 'Inventario/Ic_Consulta.php', 'APL', 'A', 1, '2023-11-14 00:06:30', 1, '2023-11-14 00:06:30', 5, 10, ' '),
	(21, 'Cosecha/Empaque', ' ', 'MEN', 'A', 1, '2023-11-15 19:55:59', 1, '2023-11-15 19:55:59', 2, NULL, ' '),
	(22, 'Cosecha Empaque', '', 'SUB', 'A', 1, '2023-11-15 19:56:54', 1, '2023-11-15 19:56:54', 1, 21, ' '),
	(23, 'Cinta', 'Cosecha_Empaque/Cinta_Consulta.php', 'APL', 'A', 1, '2023-11-15 19:57:55', 1, '2023-11-15 19:57:55', 1, 22, ' '),
	(24, 'Reg. Cos/Empaque', 'Cosecha/Cos_Empaque_Consulta.php', 'APL', 'A', 1, '2023-11-15 19:59:29', 1, '2023-11-15 19:59:29', 2, 22, ' '),
	(25, 'Ev. Campo', '', 'MEN', 'A', 1, '2023-11-15 20:08:18', 1, '2023-11-15 20:08:18', 3, NULL, ' '),
	(26, 'Reg. Ev. Campo', '', 'SUB', 'A', 1, '2023-11-15 20:08:45', 1, '2023-11-15 20:08:45', 1, 25, ' '),
	(27, 'Evaluacion Campo', 'Evaluacion_Campo/Ev_Campo_Consulta.php', 'APL', 'A', 1, '2023-11-15 20:10:14', 1, '2023-11-15 20:10:14', 1, 26, ' '),
	(28, 'Guia Remision', '', 'MEN', 'A', 1, '2023-11-15 21:22:36', 1, '2023-11-15 21:22:36', 4, NULL, ' '),
	(29, 'Reg. Guia', '', 'SUB', 'A', 1, '2023-11-15 21:23:48', 1, '2023-11-15 21:23:48', 1, 28, ' '),
	(30, 'Registro Guias', 'Guias/Gre_Consulta.php', 'APL', 'A', 1, '2023-11-15 21:25:23', 1, '2023-11-15 21:25:23', 1, 29, ' '),
	(31, 'Reportes', '', 'MEN', 'A', 1, '2023-12-18 16:21:45', 1, '2023-12-18 16:21:45', 6, NULL, ' '),
	(32, 'Rep.', '', 'SUB', 'A', 1, '2023-12-18 16:22:07', 1, '2023-12-18 16:22:07', 1, 31, ' '),
	(33, 'Inventario General', 'Reportes/Rpt_Inventario_Bodegas.php', 'APL', 'A', 1, '2023-12-18 16:23:13', 1, '2023-12-18 16:23:13', 1, 32, ' '),
	(34, 'Informe Racimos Procesados', 'Reportes/Rpt_Informe_Racimos_Procesados.php', 'APL', 'A', 1, '2023-12-26 21:12:06', 1, '2023-12-26 21:12:06', 2, 32, ' '),
	(35, 'Informe Racimos Rechazados', 'Reportes/Rpt_Informe_Racimos_Rechazados.php', 'APL', 'A', 1, '2023-12-26 22:00:47', 1, '2023-12-26 22:00:47', 3, 32, ' '),
	(36, 'Informe Manos Rechazadas', 'Reportes/Rpt_Informe_Manos_Rechazadas.php', 'APL', 'A', 1, '2023-12-26 22:06:10', 1, '2023-12-26 22:07:09', 4, 32, ' '),
	(37, 'Informe Ventas', 'Reportes/Rpt_Informe_Venta.php', 'APL', 'A', 1, '2023-12-26 22:11:12', 1, '2023-12-26 22:11:12', 5, 32, ' '),
	(38, 'Informe Fruta Primera', 'Reportes/Rpt_Informe_Fruta_Primera.php', 'APL', 'A', 1, '2023-12-26 22:42:37', 1, '2023-12-26 22:42:37', 6, 32, ' '),
	(39, 'Informe Calibre', 'Reportes/Rpt_Informe_Calibre.php', 'APL', 'A', 1, '2023-12-26 22:46:28', 1, '2023-12-26 22:46:28', 6, 32, ' '),
	(40, 'Informe Carga Dedos', 'Reportes/Rpt_Informe_Carga_Dedos.php', 'APL', 'A', 1, '2023-12-26 23:14:20', 1, '2023-12-26 23:14:20', 8, 32, ' '),
	(41, 'Informe Dedos x Cluster', 'Reportes/Rpt_Informe_Dedos_Cluster.php', 'APL', 'A', 1, '2023-12-28 22:51:31', 1, '2023-12-28 22:51:31', 10, 32, ' '),
	(42, 'Informe # Cluster Caja', 'Reportes/Rpt_Informe_Num_Cluster_Caja.php', 'APL', 'A', 1, '2023-12-28 23:02:27', 1, '2023-12-28 23:02:27', 11, 32, ' '),
	(43, 'Informe Cajas Transportadas', 'Reportes/Rpt_Informe_Cajas_Transportadas.php', 'APL', 'A', 1, '2023-12-28 23:28:06', 1, '2023-12-28 23:28:06', 12, 32, ' ');
/*!40000 ALTER TABLE `seg_aplicacion` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_empresa
CREATE TABLE IF NOT EXISTS `seg_empresa` (
  `seg_emp_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_emp_ruc` varchar(13) DEFAULT NULL,
  `seg_emp_razon_social` varchar(200) DEFAULT NULL,
  `seg_emp_estado` char(1) DEFAULT NULL,
  `seg_emp_usu_creacion` int DEFAULT NULL,
  `seg_emp_fec_hra_creacion` datetime DEFAULT NULL,
  `seg_emp_usu_modificacion` int DEFAULT NULL,
  `seg_emp_fec_hra_modificacion` datetime DEFAULT NULL,
  `seg_emp_ubicacion` varchar(100) DEFAULT NULL,
  `seg_emp_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`seg_emp_codigo`),
  UNIQUE KEY `seg_emp_ruc_UNIQUE` (`seg_emp_ruc`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_empresa: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_empresa` DISABLE KEYS */;
REPLACE INTO `seg_empresa` (`seg_emp_codigo`, `seg_emp_ruc`, `seg_emp_razon_social`, `seg_emp_estado`, `seg_emp_usu_creacion`, `seg_emp_fec_hra_creacion`, `seg_emp_usu_modificacion`, `seg_emp_fec_hra_modificacion`, `seg_emp_ubicacion`, `seg_emp_email`) VALUES
	(9, '1206702175001', 'Bananera Bamboo 2.', 'A', 1, '2023-10-23 16:45:40', 1, '2024-01-18 16:44:22', 'Los Alamos Gyquil al Norte', 'br@gm.com');
/*!40000 ALTER TABLE `seg_empresa` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_perfil
CREATE TABLE IF NOT EXISTS `seg_perfil` (
  `seg_per_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_per_descripcion` varchar(45) DEFAULT NULL,
  `seg_per_estado` char(1) DEFAULT NULL,
  `seg_per_usu_creacion` int DEFAULT NULL,
  `seg_per_fec_hra_creacion` datetime DEFAULT NULL,
  `seg_per_usu_modificacion` int DEFAULT NULL,
  `seg_per_fec_hra_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`seg_per_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_perfil: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_perfil` DISABLE KEYS */;
REPLACE INTO `seg_perfil` (`seg_per_codigo`, `seg_per_descripcion`, `seg_per_estado`, `seg_per_usu_creacion`, `seg_per_fec_hra_creacion`, `seg_per_usu_modificacion`, `seg_per_fec_hra_modificacion`) VALUES
	(1, 'Ingreso Facturas Proveedores', 'A', 1, '2023-10-23 17:08:01', 1, '2024-01-02 23:47:36'),
	(3, 'Admin', 'A', 1, '2023-11-09 14:56:06', 1, '2023-11-09 14:56:10');
/*!40000 ALTER TABLE `seg_perfil` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_perfil_aplicacion
CREATE TABLE IF NOT EXISTS `seg_perfil_aplicacion` (
  `seg_per_codigo` int NOT NULL,
  `seg_apl_codigo` int NOT NULL,
  `seg_acc_det_nuevo` tinyint DEFAULT NULL,
  `seg_acc_det_editar` tinyint DEFAULT NULL,
  `seg_acc_det_eliminar` tinyint DEFAULT NULL,
  `seg_acc_det_imprimir` tinyint DEFAULT NULL,
  `seg_acc_det_consultar` tinyint DEFAULT NULL,
  `seg_acc_det_procesar` tinyint DEFAULT NULL,
  `seg_acc_det_anular` tinyint DEFAULT NULL,
  PRIMARY KEY (`seg_per_codigo`,`seg_apl_codigo`),
  KEY `fk_seg_perfil_aplicacion_seg_aplicacion1_idx` (`seg_apl_codigo`),
  CONSTRAINT `fk_seg_perfil_aplicacion_seg_aplicacion1` FOREIGN KEY (`seg_apl_codigo`) REFERENCES `seg_aplicacion` (`seg_apl_codigo`),
  CONSTRAINT `fk_seg_perfil_aplicacion_seg_perfil1` FOREIGN KEY (`seg_per_codigo`) REFERENCES `seg_perfil` (`seg_per_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_perfil_aplicacion: ~37 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_perfil_aplicacion` DISABLE KEYS */;
REPLACE INTO `seg_perfil_aplicacion` (`seg_per_codigo`, `seg_apl_codigo`, `seg_acc_det_nuevo`, `seg_acc_det_editar`, `seg_acc_det_eliminar`, `seg_acc_det_imprimir`, `seg_acc_det_consultar`, `seg_acc_det_procesar`, `seg_acc_det_anular`) VALUES
	(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 16, 0, 0, 0, 0, 0, 0, 0),
	(3, 21, 0, 0, 0, 0, 0, 0, 0),
	(3, 22, 0, 0, 0, 0, 0, 0, 0),
	(3, 23, 0, 0, 0, 0, 0, 0, 0),
	(3, 24, 0, 0, 0, 0, 0, 0, 0),
	(3, 25, 0, 0, 0, 0, 0, 0, 0),
	(3, 26, 0, 0, 0, 0, 0, 0, 0),
	(3, 27, 0, 0, 0, 0, 0, 0, 0),
	(3, 28, 0, 0, 0, 0, 0, 0, 0),
	(3, 29, 0, 0, 0, 0, 0, 0, 0),
	(3, 30, 0, 0, 0, 0, 0, 0, 0),
	(3, 31, 0, 0, 0, 0, 0, 0, 0),
	(3, 32, 0, 0, 0, 0, 0, 0, 0),
	(3, 33, 0, 0, 0, 0, 0, 0, 0),
	(3, 34, 0, 0, 0, 0, 0, 0, 0),
	(3, 35, 0, 0, 0, 0, 0, 0, 0),
	(3, 36, 0, 0, 0, 0, 0, 0, 0),
	(3, 37, 0, 0, 0, 0, 0, 0, 0),
	(3, 38, 0, 0, 0, 0, 0, 0, 0),
	(3, 39, 0, 0, 0, 0, 0, 0, 0),
	(3, 40, 0, 0, 0, 0, 0, 0, 0),
	(3, 41, 0, 0, 0, 0, 0, 0, 0),
	(3, 42, 0, 0, 0, 0, 0, 0, 0),
	(3, 43, 0, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `seg_perfil_aplicacion` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_rol
CREATE TABLE IF NOT EXISTS `seg_rol` (
  `seg_rol_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_rol_descripcion` varchar(45) NOT NULL,
  `seg_rol_estado` char(1) NOT NULL,
  `seg_rol_usu_creacion` int DEFAULT NULL,
  `seg_rol_fec_hra_creacion` datetime DEFAULT NULL,
  `seg_rol_usu_modificacion` int DEFAULT NULL,
  `seg_rol_fec_hra_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`seg_rol_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_rol: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_rol` DISABLE KEYS */;
REPLACE INTO `seg_rol` (`seg_rol_codigo`, `seg_rol_descripcion`, `seg_rol_estado`, `seg_rol_usu_creacion`, `seg_rol_fec_hra_creacion`, `seg_rol_usu_modificacion`, `seg_rol_fec_hra_modificacion`) VALUES
	(1, 'Admin', 'A', 1, '2023-10-19 06:04:45', 1, '2023-10-19 06:04:45'),
	(2, 'Administrador', 'A', 1, '2023-10-19 06:06:10', 1, '2023-10-19 06:06:10'),
	(5, 'Contador General', 'A', 1, '2023-10-19 06:24:13', 1, '2023-10-19 06:24:13'),
	(7, 'Ingenieros', 'A', 1, '2023-10-19 06:26:42', 1, '2023-10-19 06:27:13'),
	(15, 'Datos Sistema', 'A', 1, '2024-01-02 23:47:22', 1, '2024-01-02 23:47:22');
/*!40000 ALTER TABLE `seg_rol` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_usuario
CREATE TABLE IF NOT EXISTS `seg_usuario` (
  `seg_usu_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_usu_nombres` varchar(45) DEFAULT NULL,
  `seg_usu_usuario` varchar(45) DEFAULT NULL,
  `seg_usu_clave` varchar(45) DEFAULT NULL,
  `seg_usu_estado` char(1) DEFAULT NULL,
  `seg_usu_email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`seg_usu_codigo`),
  UNIQUE KEY `seg_usu_email_UNIQUE` (`seg_usu_email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_usuario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_usuario` DISABLE KEYS */;
REPLACE INTO `seg_usuario` (`seg_usu_codigo`, `seg_usu_nombres`, `seg_usu_usuario`, `seg_usu_clave`, `seg_usu_estado`, `seg_usu_email`) VALUES
	(1, 'Bairon Reyesc', 'breyes', '123456', 'A', NULL),
	(2, 'Judie Asencio', 'jasencio', '1234567', 'I', NULL),
	(4, 'Anibal Flores', 'breyesc', '123456', 'A', NULL),
	(5, 'Jose Andrade', 'jandrade', '123456', 'A', NULL),
	(6, 'Jose Pastuizaca', 'jpastuizaca', '123456', 'A', NULL),
	(7, 'Jhonny Torres', 'jtorres', '123456', 'A', NULL),
	(19, 'Jose Antonio', 'jcampos', 'sfklsjflskj', 'A', 'bsfbsj@gmail.com'),
	(20, 'JOSE ANDRADE ', 'BTORRES', '123456', 'A', 'BR@PM.COM'),
	(21, 'JOSE ANDRADE', 'JADNDREADE', '123456', 'A', 'br@pmmm.com'),
	(22, 'Bairon Edwin', 'Breyesr', 'ohkfjhsfj', 'A', 'bareca@gmail.com');
/*!40000 ALTER TABLE `seg_usuario` ENABLE KEYS */;

-- Volcando estructura para vista db_bananera.vsp_seg_aplicacion
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vsp_seg_aplicacion` (
	`seg_acc_cab_fecha` DATE NULL,
	`seg_usu_codigo` INT(10) NOT NULL,
	`seg_usu_nombres` VARCHAR(45) NULL COLLATE 'utf8mb3_general_ci',
	`seg_usu_usuario` VARCHAR(45) NULL COLLATE 'utf8mb3_general_ci',
	`seg_apl_codigo` INT(10) NOT NULL,
	`seg_apl_descripcion` VARCHAR(100) NOT NULL COLLATE 'utf8mb3_general_ci',
	`seg_apl_archivo` VARCHAR(100) NOT NULL COLLATE 'utf8mb3_general_ci',
	`seg_apl_tipo` CHAR(3) NOT NULL COLLATE 'utf8mb3_general_ci',
	`seg_apl_orden` INT(10) NULL,
	`seg_apl_id_padre` INT(10) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista db_bananera.vsp_seg_aplicacion
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vsp_seg_aplicacion`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vsp_seg_aplicacion` AS select `acc`.`seg_acc_cab_fecha` AS `seg_acc_cab_fecha`,`acc`.`seg_usu_codigo` AS `seg_usu_codigo`,`usu`.`seg_usu_nombres` AS `seg_usu_nombres`,`usu`.`seg_usu_usuario` AS `seg_usu_usuario`,`pera`.`seg_apl_codigo` AS `seg_apl_codigo`,`apl`.`seg_apl_descripcion` AS `seg_apl_descripcion`,`apl`.`seg_apl_archivo` AS `seg_apl_archivo`,`apl`.`seg_apl_tipo` AS `seg_apl_tipo`,`apl`.`seg_apl_orden` AS `seg_apl_orden`,`apl`.`seg_apl_id_padre` AS `seg_apl_id_padre` from ((((`seg_accesos` `acc` join `seg_usuario` `usu` on((`acc`.`seg_usu_codigo` = `usu`.`seg_usu_codigo`))) join `seg_perfil` `per` on((`acc`.`seg_per_codigo` = `per`.`seg_per_codigo`))) join `seg_perfil_aplicacion` `pera` on((`per`.`seg_per_codigo` = `pera`.`seg_per_codigo`))) join `seg_aplicacion` `apl` on((`pera`.`seg_apl_codigo` = `apl`.`seg_apl_codigo`)));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
