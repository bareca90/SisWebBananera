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

-- Volcando estructura para tabla db_bananera.reb_contrato
DROP TABLE IF EXISTS `reb_contrato`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.reb_contrato: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reb_contrato` DISABLE KEYS */;
REPLACE INTO `reb_contrato` (`reb_con_codigo`, `reb_con_fec_inicio`, `reb_con_fec_fin`, `reb_con_pago`, `reb_con_firma`, `reb_descripcion`, `reb_con_estado`, `reb_con_usu_creacion`, `reb_con_usu_fec_hora_creacion`, `reb_con_usu_modificacion`, `reb_con_usu_fec_hora_modificacion`, `reb_prv_codigo`) VALUES
	(1, '2023-08-09', '2023-11-10', 12.34, 'Bairon Reyes', 'Cintas', 'A', 1, '2023-11-10 19:41:12', 1, '2023-11-10 19:41:12', 1);
/*!40000 ALTER TABLE `reb_contrato` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.reb_producto
DROP TABLE IF EXISTS `reb_producto`;
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
  PRIMARY KEY (`reb_pro_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.reb_producto: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reb_producto` DISABLE KEYS */;
REPLACE INTO `reb_producto` (`reb_pro_codigo`, `reb_pro_descripcion`, `reb_pro_ubicacion`, `reb_pro_stock`, `reb_pro_estado`, `reb_pro_usu_creacion`, `reb_pro_usu_fec_hora_creacion`, `reb_pro_usu_modificacion`, `reb_pro_fec_hora_modificacion`) VALUES
	(1, 'CINTAS PARA BANANO VERDE', 'BODEGA', 0, 'A', 1, '2023-11-10 19:51:57', 1, '2023-11-10 19:52:24');
/*!40000 ALTER TABLE `reb_producto` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.reb_proveedor
DROP TABLE IF EXISTS `reb_proveedor`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.reb_proveedor: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reb_proveedor` DISABLE KEYS */;
REPLACE INTO `reb_proveedor` (`reb_prv_codigo`, `reb_prv_razon_social`, `reb_prv_ced_ruc`, `reb_prv_correo`, `reb_prv_contratista`, `reb_prv_estado`, `reb_prv_usu_creacion`, `reb_prv_fec_hora_creacion`, `reb_prv_usu_modificacion`, `reb_prv_fec_hora_modificacion`) VALUES
	(1, 'Cintamar S.A', '1206702175', 'ba@gmail.com', 'SI', 'A', 1, '2023-11-10 19:38:12', 1, '2023-11-10 19:40:43');
/*!40000 ALTER TABLE `reb_proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_accesos
DROP TABLE IF EXISTS `seg_accesos`;
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

-- Volcando datos para la tabla db_bananera.seg_accesos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_accesos` DISABLE KEYS */;
REPLACE INTO `seg_accesos` (`seg_per_codigo`, `seg_usu_codigo`, `seg_acc_cab_fecha`, `seg_acc_cab_descripcion`, `seg_acc_cab_usu_creacion`, `seg_acc_cab_fec_hra_creacion`, `seg_acc_cab_usu_modificacion`, `seg_acc_cab_fec_hra_modificacion`, `seg_rol_codigo`) VALUES
	(1, 5, '2023-11-09', 'ninguna', 1, '2023-11-09 11:52:08', 1, '2023-11-09 11:52:08', 2),
	(3, 1, '2023-11-09', 'NUEVO', 1, '2023-11-09 15:00:46', 1, '2023-11-09 15:00:49', 1);
/*!40000 ALTER TABLE `seg_accesos` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_aplicacion
DROP TABLE IF EXISTS `seg_aplicacion`;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_aplicacion: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_aplicacion` DISABLE KEYS */;
REPLACE INTO `seg_aplicacion` (`seg_apl_codigo`, `seg_apl_descripcion`, `seg_apl_archivo`, `seg_apl_tipo`, `seg_apl_estado`, `seg_apl_usuario_creacion`, `seg_apl_fec_hra_creacion`, `seg_apl_usuario_modificacion`, `seg_spl_fec_hra_modificacion`, `seg_apl_orden`, `seg_apl_id_padre`, `seg_apl_font_icon`) VALUES
	(1, 'Seguridad', '  ', 'MEN', 'A', 1, '2023-10-07 16:19:27', 1, '2023-10-07 16:19:30', 1, NULL, NULL),
	(2, 'Maestros', '   ', 'SUB', 'A', 1, '2023-10-07 16:20:07', 1, '2023-10-07 16:20:09', 2, 1, NULL),
	(3, 'Registro Usuarios', 'Seguridad/Usuario_Consulta_Nuevo.php', 'APL', 'A', 1, '2023-10-07 16:21:47', 1, '2023-10-07 16:21:49', 3, 2, NULL),
	(4, 'Registro Basicos', '  ', 'MEN', 'A', 1, '2023-10-09 11:58:33', 1, '2023-10-09 11:58:35', 1, NULL, NULL),
	(5, 'Empresa', 'Seguridad/Empresa_Consulta.php', 'APL', 'A', 1, '2023-10-09 17:35:18', 1, '2023-10-09 17:35:24', 4, 2, NULL),
	(6, 'Roles', 'Seguridad/Rol_Consulta.php', 'APL', 'A', 1, '2023-10-12 13:41:42', 1, '2023-10-12 13:41:45', 5, 2, NULL),
	(7, 'Perfiles', 'Seguridad/Perfil_Consulta.php', 'APL', 'A', 1, '2023-10-23 17:06:36', 1, '2023-10-23 17:06:38', 6, 2, NULL),
	(8, 'Aplicación', 'Seguridad/Aplicacion_Consulta.php', 'APL', 'A', 1, '2023-11-08 00:00:00', 1, '2023-11-08 00:00:00', 7, 2, NULL),
	(9, 'Aplicaciones x Perfil', 'Seguridad/Aplicacion_Perfil_Consulta.php', 'APL', 'A', 1, '2023-11-08 12:44:53', 1, '2023-11-08 12:44:53', 8, 2, ''),
	(10, 'Maestros Reg. Bás.', '', 'SUB', 'A', 1, '2023-11-08 12:46:32', 1, '2023-11-08 12:46:32', 1, 4, ''),
	(11, 'Productos', 'RegistrosBasicos/Producto_Consulta.php', 'APL', 'A', 1, '2023-11-08 12:49:14', 1, '2023-11-08 13:45:00', 1, 10, ''),
	(12, 'Proveedor', 'RegistrosBasicos/Proveedor_Consulta.php', 'APL', 'A', 1, '2023-11-08 13:46:44', 1, '2023-11-08 13:46:44', 2, 10, ''),
	(13, 'Contratos', 'RegistrosBasicos/Contrato_Consulta.php', 'APL', 'A', 1, '2023-11-08 13:49:40', 1, '2023-11-08 13:49:40', 3, 10, ''),
	(14, 'Perfiles x Usuario', 'Seguridad/Acceso_Consulta.php', 'APL', 'A', 1, '2023-11-09 11:00:01', 1, '2023-11-09 11:00:01', 8, 2, '');
/*!40000 ALTER TABLE `seg_aplicacion` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_empresa
DROP TABLE IF EXISTS `seg_empresa`;
CREATE TABLE IF NOT EXISTS `seg_empresa` (
  `seg_emp_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_emp_ruc` varchar(13) DEFAULT NULL,
  `seg_emp_razon_social` varchar(200) DEFAULT NULL,
  `seg_emp_estado` char(1) DEFAULT NULL,
  `seg_emp_usu_creacion` int DEFAULT NULL,
  `seg_emp_fec_hra_creacion` datetime DEFAULT NULL,
  `seg_emp_usu_modificacion` int DEFAULT NULL,
  `seg_emp_fec_hra_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`seg_emp_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_empresa: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_empresa` DISABLE KEYS */;
REPLACE INTO `seg_empresa` (`seg_emp_codigo`, `seg_emp_ruc`, `seg_emp_razon_social`, `seg_emp_estado`, `seg_emp_usu_creacion`, `seg_emp_fec_hra_creacion`, `seg_emp_usu_modificacion`, `seg_emp_fec_hra_modificacion`) VALUES
	(9, '1206702175001', 'Empresa Bananera S.A', 'A', 1, '2023-10-23 16:45:40', 1, '2023-10-23 16:45:53');
/*!40000 ALTER TABLE `seg_empresa` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_perfil
DROP TABLE IF EXISTS `seg_perfil`;
CREATE TABLE IF NOT EXISTS `seg_perfil` (
  `seg_per_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_per_descripcion` varchar(45) DEFAULT NULL,
  `seg_per_estado` char(1) DEFAULT NULL,
  `seg_per_usu_creacion` int DEFAULT NULL,
  `seg_per_fec_hra_creacion` datetime DEFAULT NULL,
  `seg_per_usu_modificacion` int DEFAULT NULL,
  `seg_per_fec_hra_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`seg_per_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_perfil: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_perfil` DISABLE KEYS */;
REPLACE INTO `seg_perfil` (`seg_per_codigo`, `seg_per_descripcion`, `seg_per_estado`, `seg_per_usu_creacion`, `seg_per_fec_hra_creacion`, `seg_per_usu_modificacion`, `seg_per_fec_hra_modificacion`) VALUES
	(1, 'Ingreso Facturas Proveedores', 'A', 1, '2023-10-23 17:08:01', 1, '2023-10-23 17:08:10'),
	(3, 'Admin', 'A', 1, '2023-11-09 14:56:06', 1, '2023-11-09 14:56:10');
/*!40000 ALTER TABLE `seg_perfil` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_perfil_aplicacion
DROP TABLE IF EXISTS `seg_perfil_aplicacion`;
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

-- Volcando datos para la tabla db_bananera.seg_perfil_aplicacion: ~20 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_perfil_aplicacion` DISABLE KEYS */;
REPLACE INTO `seg_perfil_aplicacion` (`seg_per_codigo`, `seg_apl_codigo`, `seg_acc_det_nuevo`, `seg_acc_det_editar`, `seg_acc_det_eliminar`, `seg_acc_det_imprimir`, `seg_acc_det_consultar`, `seg_acc_det_procesar`, `seg_acc_det_anular`) VALUES
	(1, 1, 0, 0, 0, 0, 0, 0, 0),
	(1, 2, 0, 0, 0, 0, 0, 0, 0),
	(1, 3, 1, 1, 1, 1, 0, 0, 0),
	(1, 9, 1, 1, 1, 1, 0, 0, 0),
	(1, 11, 1, 1, 0, 0, 0, 0, 0),
	(1, 13, 1, 1, 0, 0, 0, 0, 0),
	(3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(3, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL),
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
	(3, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `seg_perfil_aplicacion` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_rol
DROP TABLE IF EXISTS `seg_rol`;
CREATE TABLE IF NOT EXISTS `seg_rol` (
  `seg_rol_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_rol_descripcion` varchar(45) NOT NULL,
  `seg_rol_estado` char(1) NOT NULL,
  `seg_rol_usu_creacion` int DEFAULT NULL,
  `seg_rol_fec_hra_creacion` datetime DEFAULT NULL,
  `seg_rol_usu_modificacion` int DEFAULT NULL,
  `seg_rol_fec_hra_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`seg_rol_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_rol: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_rol` DISABLE KEYS */;
REPLACE INTO `seg_rol` (`seg_rol_codigo`, `seg_rol_descripcion`, `seg_rol_estado`, `seg_rol_usu_creacion`, `seg_rol_fec_hra_creacion`, `seg_rol_usu_modificacion`, `seg_rol_fec_hra_modificacion`) VALUES
	(1, 'Admin', 'A', 1, '2023-10-19 06:04:45', 1, '2023-10-19 06:04:45'),
	(2, 'Administrador', 'A', 1, '2023-10-19 06:06:10', 1, '2023-10-19 06:06:10'),
	(5, 'Contador General', 'A', 1, '2023-10-19 06:24:13', 1, '2023-10-19 06:24:13'),
	(7, 'Ingenieros', 'A', 1, '2023-10-19 06:26:42', 1, '2023-10-19 06:27:13'),
	(8, 'Admina', 'A', 1, '2023-10-23 13:21:50', 1, '2023-10-23 13:35:26');
/*!40000 ALTER TABLE `seg_rol` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_usuario
DROP TABLE IF EXISTS `seg_usuario`;
CREATE TABLE IF NOT EXISTS `seg_usuario` (
  `seg_usu_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_usu_nombres` varchar(45) DEFAULT NULL,
  `seg_usu_usuario` varchar(45) DEFAULT NULL,
  `seg_usu_clave` varchar(45) DEFAULT NULL,
  `seg_usu_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`seg_usu_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_usuario: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_usuario` DISABLE KEYS */;
REPLACE INTO `seg_usuario` (`seg_usu_codigo`, `seg_usu_nombres`, `seg_usu_usuario`, `seg_usu_clave`, `seg_usu_estado`) VALUES
	(1, 'Bairon Reyesc', 'breyes', '123456', 'A'),
	(2, 'Judie Asencio', 'jasencio', '1234567', 'I'),
	(4, 'Anibal Flores', 'breyesc', '123456', 'A'),
	(5, 'Jose Andrade', 'jandrade', '123456', 'A'),
	(6, 'Jose Pastuizaca', 'jpastuizaca', '123456', 'A'),
	(7, 'Jhonny Torres', 'jtorres', '123456', 'A'),
	(8, 'Eduarrdo Zea', 'ezea', '123456', 'A'),
	(11, 'Darwin Zamora', 'dzamora', '123456', 'A');
/*!40000 ALTER TABLE `seg_usuario` ENABLE KEYS */;

-- Volcando estructura para vista db_bananera.vsp_seg_aplicacion
DROP VIEW IF EXISTS `vsp_seg_aplicacion`;
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
DROP VIEW IF EXISTS `vsp_seg_aplicacion`;
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vsp_seg_aplicacion`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vsp_seg_aplicacion` AS select `acc`.`seg_acc_cab_fecha` AS `seg_acc_cab_fecha`,`acc`.`seg_usu_codigo` AS `seg_usu_codigo`,`usu`.`seg_usu_nombres` AS `seg_usu_nombres`,`usu`.`seg_usu_usuario` AS `seg_usu_usuario`,`pera`.`seg_apl_codigo` AS `seg_apl_codigo`,`apl`.`seg_apl_descripcion` AS `seg_apl_descripcion`,`apl`.`seg_apl_archivo` AS `seg_apl_archivo`,`apl`.`seg_apl_tipo` AS `seg_apl_tipo`,`apl`.`seg_apl_orden` AS `seg_apl_orden`,`apl`.`seg_apl_id_padre` AS `seg_apl_id_padre` from ((((`seg_accesos` `acc` join `seg_usuario` `usu` on((`acc`.`seg_usu_codigo` = `usu`.`seg_usu_codigo`))) join `seg_perfil` `per` on((`acc`.`seg_per_codigo` = `per`.`seg_per_codigo`))) join `seg_perfil_aplicacion` `pera` on((`per`.`seg_per_codigo` = `pera`.`seg_per_codigo`))) join `seg_aplicacion` `apl` on((`pera`.`seg_apl_codigo` = `apl`.`seg_apl_codigo`)));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
