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


-- Volcando estructura de base de datos para db_bananera
DROP DATABASE IF EXISTS `db_bananera`;
CREATE DATABASE IF NOT EXISTS `db_bananera` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_bananera`;

-- Volcando estructura para tabla db_bananera.seg_accesos_cab
DROP TABLE IF EXISTS `seg_accesos_cab`;
CREATE TABLE IF NOT EXISTS `seg_accesos_cab` (
  `seg_acc_cab_codigo` int NOT NULL AUTO_INCREMENT,
  `seg_acc_cab_fecha` date DEFAULT NULL,
  `seg_acc_cab_descripcion` varchar(45) DEFAULT NULL,
  `seg_acc_cab_usu_creacion` int DEFAULT NULL,
  `seg_acc_cab_fec_hra_creacion` datetime DEFAULT NULL,
  `seg_acc_cab_usu_modificacion` int DEFAULT NULL,
  `seg_acc_cab_fec_hra_modificacion` datetime DEFAULT NULL,
  `seg_rol_codigo` int NOT NULL,
  `seg_emp_codigo` int NOT NULL,
  `seg_per_codigo` int NOT NULL,
  `seg_usu_codigo` int NOT NULL,
  PRIMARY KEY (`seg_acc_cab_codigo`),
  KEY `fk_seg_accesos_cab_seg_rol1_idx` (`seg_rol_codigo`),
  KEY `fk_seg_accesos_cab_seg_empresa1_idx` (`seg_emp_codigo`),
  KEY `fk_seg_accesos_cab_seg_perfil1_idx` (`seg_per_codigo`),
  KEY `fk_seg_accesos_cab_seg_usuario1_idx` (`seg_usu_codigo`),
  CONSTRAINT `fk_seg_accesos_cab_seg_empresa1` FOREIGN KEY (`seg_emp_codigo`) REFERENCES `seg_empresa` (`seg_emp_codigo`),
  CONSTRAINT `fk_seg_accesos_cab_seg_perfil1` FOREIGN KEY (`seg_per_codigo`) REFERENCES `seg_perfil` (`seg_per_codigo`),
  CONSTRAINT `fk_seg_accesos_cab_seg_rol1` FOREIGN KEY (`seg_rol_codigo`) REFERENCES `seg_rol` (`seg_rol_codigo`),
  CONSTRAINT `fk_seg_accesos_cab_seg_usuario1` FOREIGN KEY (`seg_usu_codigo`) REFERENCES `seg_usuario` (`seg_usu_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_accesos_cab: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_accesos_cab` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_accesos_cab` ENABLE KEYS */;

-- Volcando estructura para tabla db_bananera.seg_accesos_det
DROP TABLE IF EXISTS `seg_accesos_det`;
CREATE TABLE IF NOT EXISTS `seg_accesos_det` (
  `seg_apl_codigo` int NOT NULL,
  `seg_acc_cab_codigo` int NOT NULL,
  `seg_acc_det_nuevo` tinyint DEFAULT NULL,
  `seg_acc_det_editar` tinyint DEFAULT NULL,
  `seg_acc_det_eliminar` tinyint DEFAULT NULL,
  `seg_acc_det_imprimir` tinyint DEFAULT NULL,
  `seg_acc_det_consultar` tinyint DEFAULT NULL,
  `seg_acc_det_procesar` tinyint DEFAULT NULL,
  `seg_acc_det_anular` tinyint DEFAULT NULL,
  `seg_acc_det_especial_1` tinyint DEFAULT NULL,
  `seg_acc_det_especial_2` tinyint DEFAULT NULL,
  `seg_acc_det_especial_3` tinyint DEFAULT NULL,
  `seg_acc_det_especial_4` tinyint DEFAULT NULL,
  `seg_acc_det_especial_5` tinyint DEFAULT NULL,
  PRIMARY KEY (`seg_apl_codigo`,`seg_acc_cab_codigo`),
  KEY `fk_seg_accesos_det_seg_accesos_cab1_idx` (`seg_acc_cab_codigo`),
  CONSTRAINT `fk_seg_accesos_det_seg_accesos_cab1` FOREIGN KEY (`seg_acc_cab_codigo`) REFERENCES `seg_accesos_cab` (`seg_acc_cab_codigo`),
  CONSTRAINT `fk_seg_accesos_det_seg_aplicacion1` FOREIGN KEY (`seg_apl_codigo`) REFERENCES `seg_aplicacion` (`seg_apl_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_accesos_det: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_accesos_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `seg_accesos_det` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_aplicacion: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_aplicacion` DISABLE KEYS */;
INSERT INTO `seg_aplicacion` (`seg_apl_codigo`, `seg_apl_descripcion`, `seg_apl_archivo`, `seg_apl_tipo`, `seg_apl_estado`, `seg_apl_usuario_creacion`, `seg_apl_fec_hra_creacion`, `seg_apl_usuario_modificacion`, `seg_spl_fec_hra_modificacion`, `seg_apl_orden`, `seg_apl_id_padre`, `seg_apl_font_icon`) VALUES
	(1, 'Seguridad', '  ', 'MEN', 'A', 1, '2023-10-07 16:19:27', 1, '2023-10-07 16:19:30', 1, NULL, NULL),
	(2, 'Maestros', '   ', 'SUB', 'A', 1, '2023-10-07 16:20:07', 1, '2023-10-07 16:20:09', 2, 1, NULL),
	(3, 'Registro Usuarios', 'Seguridad/Usuario_Consulta_Nuevo.php', 'APL', 'A', 1, '2023-10-07 16:21:47', 1, '2023-10-07 16:21:49', 3, 2, NULL),
	(4, 'Registro Basicos', '  ', 'MEN', 'A', 1, '2023-10-09 11:58:33', 1, '2023-10-09 11:58:35', 1, NULL, NULL),
	(5, 'Empresa', 'Seguridad/Empresa_Consulta.php', 'APL', 'A', 1, '2023-10-09 17:35:18', 1, '2023-10-09 17:35:24', 4, 2, NULL),
	(6, 'Roles', 'Seguridad/Rol_Consulta.php', 'APL', 'A', 1, '2023-10-12 13:41:42', 1, '2023-10-12 13:41:45', 5, 2, NULL),
	(7, 'Perfiles', 'Seguridad/Perfil_Consulta.php', 'APL', 'A', 1, '2023-10-23 17:06:36', 1, '2023-10-23 17:06:38', 6, 2, NULL);
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

-- Volcando datos para la tabla db_bananera.seg_empresa: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_empresa` DISABLE KEYS */;
INSERT INTO `seg_empresa` (`seg_emp_codigo`, `seg_emp_ruc`, `seg_emp_razon_social`, `seg_emp_estado`, `seg_emp_usu_creacion`, `seg_emp_fec_hra_creacion`, `seg_emp_usu_modificacion`, `seg_emp_fec_hra_modificacion`) VALUES
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_perfil: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_perfil` DISABLE KEYS */;
INSERT INTO `seg_perfil` (`seg_per_codigo`, `seg_per_descripcion`, `seg_per_estado`, `seg_per_usu_creacion`, `seg_per_fec_hra_creacion`, `seg_per_usu_modificacion`, `seg_per_fec_hra_modificacion`) VALUES
	(1, 'Ingreso Facturas Proveedores', 'A', 1, '2023-10-23 17:08:01', 1, '2023-10-23 17:08:10');
/*!40000 ALTER TABLE `seg_perfil` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_rol: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_rol` DISABLE KEYS */;
INSERT INTO `seg_rol` (`seg_rol_codigo`, `seg_rol_descripcion`, `seg_rol_estado`, `seg_rol_usu_creacion`, `seg_rol_fec_hra_creacion`, `seg_rol_usu_modificacion`, `seg_rol_fec_hra_modificacion`) VALUES
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla db_bananera.seg_usuario: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_usuario` DISABLE KEYS */;
INSERT INTO `seg_usuario` (`seg_usu_codigo`, `seg_usu_nombres`, `seg_usu_usuario`, `seg_usu_clave`, `seg_usu_estado`) VALUES
	(1, 'Bairon Reyesc', 'breyes', '123456', 'A'),
	(2, 'Judie Asencio', 'jasencio', '1234567', 'I'),
	(4, 'Anibal Flores', 'breyesc', '123456', 'A'),
	(5, 'Jose Andrade', 'jandrade', '123456', 'A'),
	(6, 'Jose Pastuizaca', 'jpastuizaca', '123456', 'A'),
	(7, 'Jhonny Torres', 'jtorres', '123456', 'A'),
	(8, 'Eduarrdo Zea', 'ezea', '123456', 'A'),
	(11, 'Darwin Zamora', 'dzamora', '123456', 'A'),
	(12, 'Damian El Shamp', 'dshamp', '123456', 'A');
/*!40000 ALTER TABLE `seg_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
