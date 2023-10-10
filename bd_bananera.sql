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

-- Volcando datos para la tabla db_bananera.seg_aplicacion: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_aplicacion` DISABLE KEYS */;
INSERT INTO `seg_aplicacion` (`seg_apl_codigo`, `seg_apl_descripcion`, `seg_apl_archivo`, `seg_apl_tipo`, `seg_apl_estado`, `seg_apl_usuario_creacion`, `seg_apl_fec_hra_creacion`, `seg_apl_usuario_modificacion`, `seg_spl_fec_hra_modificacion`, `seg_apl_orden`, `seg_apl_id_padre`, `seg_apl_font_icon`) VALUES
	(1, 'Seguridad', '  ', 'MEN', 'A', 1, '2023-10-07 16:19:27', 1, '2023-10-07 16:19:30', 1, NULL, NULL),
	(2, 'Maestros', '   ', 'SUB', 'A', 1, '2023-10-07 16:20:07', 1, '2023-10-07 16:20:09', 2, 1, NULL),
	(3, 'Registro Usuarios', 'Seguridad/Usuario_Consulta.php', 'APL', 'A', 1, '2023-10-07 16:21:47', 1, '2023-10-07 16:21:49', 3, 2, NULL),
	(4, 'Registro Basicos', '  ', 'MEN', 'A', 1, '2023-10-09 11:58:33', 1, '2023-10-09 11:58:35', 1, NULL, NULL),
	(5, 'Aplicacion', 'aplicacion1.php', 'APL', 'A', 1, '2023-10-09 17:35:18', 1, '2023-10-09 17:35:24', 4, 2, NULL);
/*!40000 ALTER TABLE `seg_aplicacion` ENABLE KEYS */;

-- Volcando datos para la tabla db_bananera.seg_usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `seg_usuario` DISABLE KEYS */;
INSERT INTO `seg_usuario` (`seg_usu_codigo`, `seg_usu_nombres`, `seg_usu_usuario`, `seg_usu_clave`, `seg_usu_estado`) VALUES
	(1, 'Bairon Reyes', 'breyes', '123456', 'A'),
	(2, 'Judie Asencio', 'jasencio', '1234567', 'I'),
	(4, 'Anibal Flores', 'breyes', '123456', 'A'),
	(5, 'Jose Andrade', 'jandrade', '123456', 'A'),
	(6, 'Jose Pastuizaca', 'jpastuizaca', '123456', 'A'),
	(7, 'Jhonny Torres', 'jtorres', '123456', 'A');
/*!40000 ALTER TABLE `seg_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
