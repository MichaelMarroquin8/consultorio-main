-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 12:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consultorio`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_d_empresa_01` (IN `xemp_id` INT)   BEGIN
UPDATE tm_empresa set est = '0', 
fech_elim = now() 
WHERE emp_id = xemp_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_d_usuario_01` (IN `xusu_id` INT)   BEGIN
UPDATE tm_usuario 
	SET 
		est='0',
		fech_elim = now() 
	where usu_id=xusu_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_i_ticketdetalle_01` (IN `xtick_id` INT, IN `xusu_id` INT)   BEGIN
	INSERT INTO td_ticketdetalle 
    (tickd_id,tick_id,usu_id,tickd_descrip,fech_crea,est) 
    VALUES 
    (NULL,xtick_id,xusu_id,'Ticket Cerrado...',now(),'1');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_documento_01` (IN `xtick_id` INT)   BEGIN
SELECT * FROM td_documento WHERE tick_id=xtick_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_empresa_01` (IN `xemp_id` INT)   BEGIN
SELECT * FROM tm_empresa where emp_id=xemp_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_empresa_02` (IN `xusu_id` INT)   BEGIN
SELECT tm_empresa.emp_nit, tm_empresa.emp_r_social from tm_empresa where usu_id=xusu_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_usuario_01` ()   BEGIN
SELECT * FROM tm_usuario where est='1';
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_l_usuario_02` (IN `xusu_id` INT)   BEGIN
SELECT * FROM tm_usuario where usu_id=xusu_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `td_documento`
--

CREATE TABLE `td_documento` (
  `doc_id` int(11) NOT NULL,
  `tick_id` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `doc_nom` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `td_documento`
--

INSERT INTO `td_documento` (`doc_id`, `tick_id`, `doc_nom`, `fech_crea`, `est`) VALUES
(12, '14', 'Actividad Mapa de la empatía de un adolescente.docx', '2022-08-31 13:20:57', 1),
(13, '21', 'plantilla aportes sociales.pdf', '2022-08-31 14:46:59', 1),
(14, '21', 'si contratis agosto 2022.pdf', '2022-08-31 14:46:59', 1),
(15, '22', 'td_documento_detalle.sql', '2022-08-31 16:26:32', 1),
(16, '23', 'td_documento_detalle.sql', '2022-08-31 17:11:35', 1),
(17, '24', 'Matriz .pptx', '2022-08-31 22:50:34', 1),
(18, '24', 'WhatsApp Image 2022-08-23 at 8.24.01 PM.jpeg', '2022-08-31 22:50:34', 1),
(19, '25', '.bash_history', '2022-08-31 23:11:31', 1),
(20, '25', '.gitconfig', '2022-08-31 23:11:31', 1),
(21, '25', 'PHP', '2022-08-31 23:11:31', 1),
(22, '26', 'hoja de vida.docx', '2022-09-08 12:48:52', 1),
(23, '28', '102-hoja-de-vida-power-point.pptx', '2022-09-14 14:42:23', 1),
(24, '60', 'Formato sociodemografico(2).xlsx', '2022-09-27 13:27:42', 1),
(25, '63', 'td_empresadetalle.sql', '2022-09-28 22:05:57', 1),
(26, '64', 'Formato sociodemografico(2).xlsx', '2022-09-28 22:40:07', 1),
(27, '65', 'td_empresadetalle.sql', '2022-09-28 22:40:43', 1),
(28, '66', 'conexion.php', '2022-09-28 22:42:13', 1),
(29, '67', 'td_empresadetalle.sql', '2022-09-28 23:40:55', 1),
(30, '68', 'SPRINT 1.docx', '2022-09-29 01:01:54', 1),
(31, '69', 'HolaMundo.java.txt', '2022-10-04 01:38:17', 1),
(32, '71', 'CRL-SENAMis Casos.xlsx', '2022-10-10 14:47:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_documento_detalle`
--

CREATE TABLE `td_documento_detalle` (
  `det_id` int(11) NOT NULL,
  `tickd_id` int(11) NOT NULL,
  `det_nom` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `td_documento_detalle`
--

INSERT INTO `td_documento_detalle` (`det_id`, `tickd_id`, `det_nom`, `est`) VALUES
(16, 47, 'Matriz .pptx', 1),
(17, 47, 'WhatsApp Image 2022-08-23 at 8.24.01 PM.jpeg', 1),
(23, 58, 'hoja de vida.docx', 1),
(24, 60, 'Evaluacion inicial.xlsx', 1),
(25, 60, 'Formato sociodemografico.xlsx', 1),
(44, 66, 'Formato sociodemografico(1).xlsx', 1),
(45, 71, 'Formato sociodemografico.xlsx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_documento_empresa`
--

CREATE TABLE `td_documento_empresa` (
  `docs_id` int(11) NOT NULL,
  `empd_id` int(11) NOT NULL,
  `docs_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `td_documento_empresa`
--

INSERT INTO `td_documento_empresa` (`docs_id`, `empd_id`, `docs_nom`, `fech_crea`, `est`) VALUES
(1, 1, '1', '2022-08-30 23:40:19', 1),
(2, 0, 'Evaluacion inicial.xlsx', '2022-09-19 02:57:19', 1),
(3, 0, 'Formato sociodemografico.xlsx', '2022-09-19 02:57:41', 1),
(4, 2, 'Formato sociodemografico.xlsx', '2022-09-19 03:23:23', 1),
(5, 4, 'Formato sociodemografico.xlsx', '2022-09-19 03:30:08', 1),
(6, 9, 'Evaluacion inicial.xlsx', '2022-09-19 03:40:06', 1),
(7, 10, 'Evaluacion inicial.xlsx', '2022-09-20 13:06:44', 1),
(8, 10, 'Formato sociodemografico.xlsx', '2022-09-20 13:06:44', 1),
(9, 11, 'Evaluacion inicial.xlsx', '2022-09-20 13:07:48', 1),
(10, 11, 'Formato sociodemografico.xlsx', '2022-09-20 13:07:48', 1),
(11, 12, 'Evaluacion inicial.xlsx', '2022-09-20 13:10:10', 1),
(12, 13, 'SEGUNDA QUINCENA AGOSTO_2022.pdf', '2022-09-22 16:20:08', 1),
(13, 14, 'City photography (2).jfif', '2022-09-22 16:22:19', 1),
(14, 15, 'github-git-cheat-sheet.pdf', '2022-09-27 13:29:37', 1),
(15, 16, 'Formato sociodemografico.xlsx', '2022-09-28 09:40:48', 1),
(16, 17, 'index.php', '2022-09-28 16:24:56', 1),
(17, 18, 'td_empresadetalle.sql', '2022-09-29 00:07:49', 1),
(18, 19, 'td_empresadetalle.sql', '2022-09-29 00:08:07', 1),
(19, 20, 'index.php', '2022-09-29 00:23:16', 1),
(20, 21, 'index.php', '2022-09-29 00:23:58', 1),
(21, 22, 'Product backlog 1.docx', '2022-10-27 15:57:10', 1),
(22, 23, 'Product backlog 1.docx', '2022-10-27 15:57:17', 1),
(23, 24, 'Blank diagram.jpeg', '2022-11-02 14:59:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_empresadetalle`
--

CREATE TABLE `td_empresadetalle` (
  `empd_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `empd_descrip` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `td_empresadetalle`
--

INSERT INTO `td_empresadetalle` (`empd_id`, `emp_id`, `usu_id`, `empd_descrip`, `fech_crea`, `est`) VALUES
(16, 22, 1, '<p>documentos</p>', '2022-09-28 09:40:48', 1),
(17, 22, 39, '<p>funciona ?</p>', '2022-09-28 16:24:56', 1),
(18, 21, 1, '<p>preuba</p>', '2022-09-29 00:07:49', 1),
(19, 21, 1, '<p>preuba</p>', '2022-09-29 00:08:07', 1),
(20, 21, 1, 'reset', '2022-09-29 00:23:15', 1),
(21, 21, 1, 'reset', '2022-09-29 00:23:58', 1),
(22, 23, 1, '<p>asd</p>', '2022-10-27 15:57:10', 1),
(23, 23, 1, '<p>asdasda</p>', '2022-10-27 15:57:17', 1),
(24, 49, 1, '<p>asd</p>', '2022-11-02 14:59:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `td_ticketdetalle`
--

CREATE TABLE `td_ticketdetalle` (
  `tickd_id` int(11) NOT NULL,
  `tick_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `tickd_descrip` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `td_ticketdetalle`
--

INSERT INTO `td_ticketdetalle` (`tickd_id`, `tick_id`, `usu_id`, `tickd_descrip`, `fech_crea`, `est`) VALUES
(73, 14, 1, '<p>http://localhost/Consultorio-master/view/DetalleCaso/?ID=14<br></p>', '2022-11-02 14:34:41', 1),
(74, 14, 1, '<p>https://www.animedatos.com/2019/02/capitulos-bleach-sin-relleno.html<br></p>', '2022-11-02 14:34:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_categoria`
--

CREATE TABLE `tm_categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(400) COLLATE utf8_spanish_ci DEFAULT NULL,
  `est` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_categoria`
--

INSERT INTO `tm_categoria` (`cat_id`, `cat_nom`, `est`) VALUES
(1, 'Asesoria', 1),
(2, 'Visita', 1),
(3, 'aASAA', 0),
(4, 'nueva categoria', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_empresa`
--

CREATE TABLE `tm_empresa` (
  `emp_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `emp_nit` int(11) NOT NULL,
  `emp_r_social` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `emp_n_trab` int(11) NOT NULL,
  `emp_re_legal` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `emp_acti_eco` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `emp_nriesgo` int(11) NOT NULL,
  `emp_arl` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `emp_tel` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `emp_dir` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `emp_cnom` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `emp_ccar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `emp_ctel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `emp_cemail` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_empresa`
--

INSERT INTO `tm_empresa` (`emp_id`, `usu_id`, `emp_nit`, `emp_r_social`, `emp_n_trab`, `emp_re_legal`, `emp_acti_eco`, `emp_nriesgo`, `emp_arl`, `emp_tel`, `emp_dir`, `emp_cnom`, `emp_ccar`, `emp_ctel`, `emp_cemail`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 1, 1515656, 'prueba sas', 4, 'yo', 'yo', 5, 'arl', '354564456', '', '', '', '', '', '2022-09-09 15:37:46', NULL, '2022-10-27 15:16:05', 0),
(23, 1, 1321231, 'asd', 65, 'asd', 'ad', 3, 'ad', '548', '', '', '', '', '', '2022-09-30 15:54:36', NULL, NULL, 1),
(46, 0, 0, '', 0, '', '', 0, '', '', '', '1', '1', '1', '1', '2022-10-24 12:13:48', NULL, NULL, 1),
(47, 0, 0, '', 0, '', '', 0, '', '', '', '1', '1', '1', '1', '2022-10-27 10:44:32', NULL, NULL, 1),
(48, 67, 121212123, 'michaelasasd', 1, '1', '1', 1, '1', '1', '1', '1', '11', '10321321', '151', '2022-10-27 12:13:31', NULL, NULL, 1),
(49, 55, 1, '1', 1, '1', '1', 1, '1', '1', '1', '1', '1', '1', '131231', '2022-10-27 13:38:36', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_rol`
--

CREATE TABLE `tm_rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_rol`
--

INSERT INTO `tm_rol` (`rol_id`, `rol_nom`, `est`) VALUES
(1, 'Empresa', 1),
(2, 'Soporte', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_sistemasst`
--

CREATE TABLE `tm_sistemasst` (
  `sis_id` int(11) NOT NULL,
  `sis_nom` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sis_descrip` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `sis_sst` int(11) NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_sistemasst`
--

INSERT INTO `tm_sistemasst` (`sis_id`, `sis_nom`, `sis_descrip`, `sis_sst`, `est`) VALUES
(1, 'Designacion', 'https://www.animedatos.com/2019/02/capitulos-bleach-sin-relleno.html', 1, 1),
(2, 'Capacitacion', '', 2, 1),
(3, 'Evaluacion', '', 3, 1),
(4, 'Plan', '', 4, 1),
(5, 'Perfil', '', 5, 1),
(6, 'Identificacion', 'asdsda', 6, 1),
(7, 'Medidas', '', 7, 1),
(8, 'EvaluacionM', '', 8, 1),
(9, 'Investigacion', '', 9, 1),
(10, 'Auditoria', '', 10, 1),
(11, 'Seguimiento', '', 11, 1),
(12, 'Revicion', '', 12, 1),
(13, 'Accion', '', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_subcategoria`
--

CREATE TABLE `tm_subcategoria` (
  `cats_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cats_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_subcategoria`
--

INSERT INTO `tm_subcategoria` (`cats_id`, `cat_id`, `cats_nom`, `est`) VALUES
(1, 1, 'Virtual', 1),
(2, 1, 'Presencial', 1),
(3, 2, 'Empresa a SENA', 1),
(4, 2, 'SENA a Empresa', 1),
(5, 2, 'xx', 0),
(6, 4, 'nueva sub categoria', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_subrol`
--

CREATE TABLE `tm_subrol` (
  `rols_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `rols_nom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_subrol`
--

INSERT INTO `tm_subrol` (`rols_id`, `rol_id`, `rols_nom`, `est`) VALUES
(1, 2, 'Instructor', 1),
(2, 2, 'Aprendiz', 1),
(3, 1, 'Empresa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tm_ticket`
--

CREATE TABLE `tm_ticket` (
  `tick_id` int(11) NOT NULL,
  `usu_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cats_id` int(11) NOT NULL,
  `tick_titulo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tick_descrip` mediumtext COLLATE utf8_spanish_ci NOT NULL,
  `tick_estado` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `usu_asig` int(11) DEFAULT NULL,
  `fech_asig` datetime DEFAULT NULL,
  `est` varchar(45) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_ticket`
--

INSERT INTO `tm_ticket` (`tick_id`, `usu_id`, `emp_id`, `cat_id`, `cats_id`, `tick_titulo`, `tick_descrip`, `tick_estado`, `fech_crea`, `usu_asig`, `fech_asig`, `est`) VALUES
(14, 1, 0, 1, 2, 'primer caso', '<p>preuba despues de deleate de la tabla caso<br></p>', 'Abierto', '2022-08-31 13:20:57', 39, '2022-10-18 03:00:54', '1'),
(15, 2, 0, 2, 4, 'asd', '<p>asdsad<br></p>', 'Abierto', '2022-08-31 14:40:49', NULL, NULL, '1'),
(16, 2, 0, 2, 4, 'dasd', '<p>asdas<br></p>', 'Abierto', '2022-08-31 14:41:52', NULL, NULL, '1'),
(17, 38, 0, 1, 2, 'asdas', '<p>asdasd</p>', 'Cerrado', '2022-08-31 14:45:20', NULL, NULL, '1'),
(18, 38, 0, 2, 3, 'asds', '<p>asdsad</p>', 'Abierto', '2022-08-31 14:45:29', NULL, NULL, '1'),
(19, 1, 0, 1, 1, 'asdas', '<p>asdsadsa</p>', 'Abierto', '2022-08-31 14:46:02', NULL, NULL, '1'),
(20, 1, 0, 2, 3, 'funciona ?sd', '<p>sdasd</p>', 'Abierto', '2022-08-31 14:46:48', NULL, NULL, '1'),
(21, 1, 0, 1, 2, 'adasd', '<p>asd</p>', 'Cerrado', '2022-08-31 14:46:59', 39, '2022-08-31 14:47:15', '1'),
(22, 1, 0, 1, 1, 'a', '<p>a</p>', 'Abierto', '2022-08-31 16:26:32', NULL, NULL, '1'),
(23, 1, 0, 1, 1, 'prueba 31', '<p>asdasd</p>', 'Abierto', '2022-08-31 17:11:35', 56, '2022-09-14 14:49:00', '1'),
(24, 1, 0, 1, 1, 'prueba documentos', '<p>necesito este prueba buena <br></p>', 'Abierto', '2022-08-31 22:50:34', 39, '2022-08-31 22:50:42', '1'),
(25, 1, 0, 1, 2, 'nuevo en brave', '<p>asdasd</p>', 'Abierto', '2022-08-31 23:11:31', NULL, NULL, '1'),
(26, 1, 0, 2, 4, 'estramso cntentos', '<p>asd<br></p>', 'Cerrado', '2022-09-08 12:48:52', 39, '2022-09-13 15:31:53', '1'),
(27, 38, 0, 2, 4, 'asda', '<p>asdasd</p><p><br></p>', 'Abierto', '2022-09-08 16:55:42', 39, '2022-09-09 12:16:49', '1'),
(28, 1, 0, 1, 1, 'Michael SA', '<p>Necesito ayuda para diligenciar este documento<br></p>', 'Abierto', '2022-09-14 14:42:23', 39, '2022-09-14 14:44:03', '1'),
(29, 1, 0, 2, 4, '<zx', '<p>&lt;zx</p>', 'Abierto', '2022-09-20 15:23:32', NULL, NULL, '1'),
(30, 1, 0, 2, 4, 'AS', '<p>ASD</p>', 'Abierto', '2022-09-20 15:24:59', NULL, NULL, '1'),
(31, 1, 0, 1, 1, 'ASD', '<p>ASD</p>', 'Abierto', '2022-09-20 15:25:06', NULL, NULL, '1'),
(32, 1, 0, 4, 6, 'prueba correo', '<p>prueba para envio de correos</p>', 'Abierto', '2022-09-20 15:34:17', NULL, NULL, '1'),
(33, 1, 0, 1, 2, 'email', '<p>asd</p>', 'Abierto', '2022-09-20 15:39:09', NULL, NULL, '1'),
(34, 1, 0, 1, 1, 'nuevo en brave', '<p>asd</p><p><br></p>', 'Abierto', '2022-09-20 15:40:21', NULL, NULL, '1'),
(35, 1, 0, 1, 1, 'correo', '<p>asdas</p>', 'Abierto', '2022-09-21 13:51:09', NULL, NULL, '1'),
(36, 1, 0, 1, 1, 'email', '<p>Probando 1 2</p>', 'Abierto', '2022-09-21 13:57:14', NULL, NULL, '1'),
(37, 1, 0, 1, 1, 'email', '<p>asda</p>', 'Abierto', '2022-09-21 13:59:07', NULL, NULL, '1'),
(38, 1, 0, 2, 4, 'email', '<p>sdasd</p>', 'Abierto', '2022-09-21 14:16:11', NULL, NULL, '1'),
(39, 1, 0, 1, 2, 'asda', '<p>as</p>', 'Abierto', '2022-09-21 14:21:26', NULL, NULL, '1'),
(40, 1, 0, 1, 1, 'email', '<p>asd</p>', 'Abierto', '2022-09-25 20:12:13', NULL, NULL, '1'),
(41, 1, 0, 1, 1, 'email', '<p>asada</p>', 'Abierto', '2022-09-25 20:16:35', NULL, NULL, '1'),
(42, 1, 0, 2, 3, 'email', '<p>prueba</p>', 'Abierto', '2022-09-25 20:18:55', NULL, NULL, '1'),
(43, 1, 0, 1, 2, 'emailas', '<p>asdsad</p>', 'Abierto', '2022-09-25 20:26:27', NULL, NULL, '1'),
(44, 1, 0, 1, 1, 'prueba email', '<p>asdsad</p>', 'Abierto', '2022-09-25 21:01:27', NULL, NULL, '1'),
(45, 1, 0, 1, 2, 'email', '<p>adsa</p>', 'Abierto', '2022-09-25 23:24:52', NULL, NULL, '1'),
(46, 1, 0, 1, 2, 'nuevo en brave', '<p>dasdasd</p>', 'Abierto', '2022-09-25 23:25:20', NULL, NULL, '1'),
(47, 1, 0, 2, 3, 'asdas', '<p>asdasd</p>', 'Abierto', '2022-09-25 23:28:15', NULL, NULL, '1'),
(48, 1, 0, 1, 1, 'asdasd', '<p>adasa</p>', 'Abierto', '2022-09-25 23:33:45', NULL, NULL, '1'),
(49, 1, 0, 2, 4, 'email', '<p>asdsa</p>', 'Cerrado', '2022-09-25 23:36:30', 39, '2022-09-26 00:20:20', '1'),
(50, 1, 0, 2, 3, 'email', '<p>prueba</p>', 'Abierto', '2022-09-26 16:47:40', 39, '2022-09-27 01:33:12', '1'),
(51, 1, 0, 1, 2, 'email', '<p>asds</p>', 'Abierto', '2022-09-26 21:18:54', 39, '2022-09-27 01:32:44', '1'),
(52, 1, 0, 2, 3, 'email', '<p>adasd</p>', 'Abierto', '2022-09-26 21:29:58', 39, '2022-09-27 00:51:26', '1'),
(53, 1, 0, 1, 1, 'email', '<p>asas</p>', 'Abierto', '2022-09-26 23:36:33', 39, '2022-09-27 00:50:50', '1'),
(54, 1, 0, 1, 2, 'email', '<p>prueba</p>', 'Abierto', '2022-09-26 23:44:52', 39, '2022-09-27 00:49:45', '1'),
(55, 1, 0, 2, 3, 'email', '<p>asdasd</p>', 'Cerrado', '2022-09-26 23:45:57', 39, '2022-09-27 00:47:39', '1'),
(56, 1, 0, 1, 2, 'email', '<p>asd</p>', 'Cerrado', '2022-09-26 23:47:02', 39, '2022-09-27 00:19:55', '1'),
(57, 1, 0, 1, 1, 'email', '<p>asds</p>', 'Cerrado', '2022-09-26 23:55:18', 39, '2022-09-27 00:02:40', '1'),
(58, 55, 0, 2, 3, 'holiiii', '<p>ahhh</p>', 'Cerrado', '2022-09-27 01:34:31', 39, '2022-09-27 01:35:06', '1'),
(59, 1, 0, 2, 3, 'email', '<p>prueba</p>', 'Cerrado', '2022-09-27 12:39:51', NULL, NULL, '1'),
(60, 1, 0, 2, 4, 'documentos', '<p>docs</p>', 'Cerrado', '2022-09-27 13:27:42', NULL, NULL, '1'),
(61, 1, 0, 2, 4, 'email', '<p>asd</p>', 'Abierto', '2022-09-28 13:45:41', NULL, NULL, '1'),
(62, 1, 0, 1, 1, 'email', '<p>adasd</p>', 'Abierto', '2022-09-28 22:05:22', NULL, NULL, '1'),
(63, 1, 0, 1, 1, 'email', '<p>preuba</p>', 'Abierto', '2022-09-28 22:05:56', NULL, NULL, '1'),
(64, 1, 0, 2, 3, 'email', '<p>asdasd</p>', 'Abierto', '2022-09-28 22:40:07', NULL, NULL, '1'),
(65, 1, 0, 1, 2, 'nuevo en brave', '<p>asdasd</p>', 'Abierto', '2022-09-28 22:40:43', NULL, NULL, '1'),
(66, 1, 0, 1, 1, 'reseteo', '<p>asdas</p>', 'Abierto', '2022-09-28 22:42:13', NULL, NULL, '1'),
(67, 1, 0, 2, 4, 'email', '<p>asdsad</p>', 'Abierto', '2022-09-28 23:40:55', NULL, NULL, '1'),
(68, 1, 0, 1, 2, 'asd', '<p>dasd</p>', 'Abierto', '2022-09-29 01:01:54', NULL, NULL, '1'),
(69, 1, 0, 1, 1, 'empresa id', '<p>probando&nbsp;</p>', 'Abierto', '2022-10-04 01:38:17', NULL, NULL, '1'),
(71, 1, 0, 1, 2, 'nuevo en brave', '<p>asdasd</p>', 'Abierto', '2022-10-10 14:47:42', 39, '2022-10-12 14:41:36', '1'),
(72, 1, 0, 1, 1, 'email', '<p>x</p>', 'Abierto', '2022-10-12 14:39:08', 39, '2022-10-12 14:40:23', '1'),
(73, 1, 0, 2, 3, 'email', '<p>asdasd</p>', 'Abierto', '2022-10-18 11:58:08', NULL, NULL, '1'),
(74, 1, 0, 2, 4, 'email', '<p>email</p>', 'Abierto', '2022-10-18 11:59:04', NULL, NULL, '1'),
(75, 1, 0, 1, 1, 'asdsa', '<p>asdsadsad</p>', 'Abierto', '2022-10-18 12:00:09', NULL, NULL, '1'),
(76, 1, 0, 2, 3, 'email', '<p>asdasdasdsad</p>', 'Abierto', '2022-10-18 12:00:27', NULL, NULL, '1'),
(77, 1, 0, 1, 1, 'email', '<p>asdasdas</p>', 'Abierto', '2022-10-18 12:18:05', NULL, NULL, '1'),
(78, 1, 0, 1, 1, 'email', '<p>asdasdsads</p>', 'Abierto', '2022-10-18 12:19:31', NULL, NULL, '1'),
(79, 1, 0, 1, 1, 'email', '<p>adasdasd</p>', 'Abierto', '2022-10-18 12:19:52', NULL, NULL, '1'),
(80, 1, 0, 2, 4, 'email', '<p>asd</p>', 'Abierto', '2022-10-18 12:34:29', NULL, NULL, '1'),
(81, 1, 0, 1, 2, 'email', '<p>prueba correo</p>', 'Abierto', '2022-10-18 22:57:11', NULL, NULL, '1'),
(82, 1, 0, 1, 1, 'email', '<p>asd</p>', 'Abierto', '2022-10-18 22:58:56', NULL, NULL, '1'),
(83, 1, 0, 1, 1, 'email', '<p>asd</p>', 'Abierto', '2022-10-18 23:00:02', NULL, NULL, '1'),
(84, 1, 0, 1, 1, 'email', '<p>1656</p>', 'Abierto', '2022-10-19 12:51:05', NULL, NULL, '1'),
(85, 1, 0, 2, 4, 'email', '<p>sdadasdsad</p>', 'Abierto', '2022-10-19 12:55:05', NULL, NULL, '1'),
(86, 1, 0, 2, 3, 'email', '<p>dasdasda</p>', 'Abierto', '2022-10-19 12:57:38', NULL, NULL, '1'),
(87, 1, 23, 1, 1, 'email', '<p>asdsad</p>', 'Abierto', '2022-10-28 04:02:14', NULL, NULL, '1'),
(88, 1, 23, 2, 3, 'email', '<p>asdad</p>', 'Abierto', '2022-10-28 04:19:06', NULL, NULL, '1'),
(89, 1, 23, 4, 6, 'email', '<p>email</p><p><br></p>', 'Abierto', '2022-11-01 11:56:50', NULL, NULL, '1'),
(90, 1, 23, 2, 3, 'email', '<p>asdasd<br></p>', 'Abierto', '2022-11-01 12:01:20', NULL, NULL, '1'),
(91, 1, 23, 2, 3, 'dad', '<p>asdasd<br></p>', 'Abierto', '2022-11-01 12:01:34', NULL, NULL, '1'),
(92, 1, 23, 1, 1, 'ADASD', '<p>ASDASDSAD<br></p>', 'Abierto', '2022-11-01 12:32:50', NULL, NULL, '1'),
(93, 1, 23, 2, 3, 'ASD', '<p>ASDAD<br></p>', 'Abierto', '2022-11-01 12:37:27', NULL, NULL, '1'),
(94, 1, 23, 1, 1, 'ASD', '<p>ASDASD<br></p>', 'Abierto', '2022-11-01 12:37:51', NULL, NULL, '1'),
(95, 1, 23, 1, 1, 'ASDSA', '<p>ASDASDAS<br></p>', 'Abierto', '2022-11-01 12:38:26', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tm_usuario`
--

CREATE TABLE `tm_usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_tid` int(11) NOT NULL,
  `usu_cc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usu_nom` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_ape` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_ficha` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usu_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_pass` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `rols_id` int(11) DEFAULT NULL,
  `fech_crea` datetime DEFAULT NULL,
  `fech_modi` datetime DEFAULT NULL,
  `fech_elim` datetime DEFAULT NULL,
  `est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_tid`, `usu_cc`, `usu_nom`, `usu_ape`, `usu_ficha`, `usu_correo`, `usu_pass`, `rol_id`, `rols_id`, `fech_crea`, `fech_modi`, `fech_elim`, `est`) VALUES
(1, 1, '100618453', 'Micha', 'Instructor', '1884061', 'm.stivenmarroquin@gmail.com', '123', 2, 1, NULL, NULL, NULL, 1),
(38, 1, '0223123', 'Michael', 'Empresa', '188463', 'michaa@gmail.com', '1234567', 1, 3, '2022-08-13 00:19:40', NULL, '2022-09-13 15:32:10', 0),
(39, 1, '1006170548', 'Michaaaa', 'Aprendiz', '1884051', 'micha@gmail.comm', '123456', 2, 2, '2022-08-13 00:24:34', NULL, NULL, 1),
(40, 1, '1006175463', 'Michael', 'Empresa', '1884061', 'test@gmail.com', 'b426b30042abbc15e363cb679bbc937d', 2, 2, '2022-08-13 00:19:40', NULL, '2022-09-13 15:33:00', 0),
(51, 1, 'ada', 'asda', 'asd', 'ASD', 'sad@asd.com', '7815696ecbf1c96e6894b779456d330e', 2, 1, '2022-08-24 02:13:21', NULL, '2022-09-08 16:51:24', 0),
(52, 1, '1006170548', 'Micha ', 'M', '1884061', 'mich@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '2022-08-25 12:49:40', NULL, '2022-09-08 16:51:35', 0),
(53, 2, 'nuevo usuarios', 'nuevo usuarios', 'nuevo usuarios', '1251665', 'nuevo@nuevo.comaa', '65ded5353c5ee48d0b7d48c591b8f430', 1, 0, '2022-08-31 23:21:01', NULL, '2022-08-31 23:21:13', 0),
(54, 3, '100615651', 'SDASDASD', 'ASD', 'ASDASD', 'sad@asd.com', '1cc39ffd758234422e1f75beadfc5fb2', 2, 0, '2022-09-05 00:44:57', NULL, '2022-09-08 16:51:31', 0),
(55, 2, 'empresa', 'empresa', 'empresa', '151', 'darkeon8888@gmail.com', '123', 2, 1, '2022-09-09 15:39:10', NULL, NULL, 1),
(56, 1, '10061705487', 'Michael', 'Marorquin', '1884036', 'm.sti@gmail.com', '123465', 2, 2, '2022-09-14 14:48:37', NULL, '2022-09-14 14:51:26', 0),
(63, 1, '123', 'asd', 'asd', 'asd', 'preuba@gmail.com', '132', 1, 3, '2022-09-28 00:47:09', NULL, NULL, 1),
(64, 1, '13', 'sad', 'ad', '132', 'preuba@gmail.com', '123', 1, 3, '2022-09-28 01:04:23', NULL, NULL, 1),
(67, 2, '1006170548', 'michael ', 'empresa', '1855456', 'm.stivenmarroquin@gmail.com', '123456', 1, 3, '2022-09-28 21:14:58', NULL, NULL, 1),
(68, 1, '123', 'asd', 'asd', '1884061', 'm.stivenmarroquin@gmail.com', 'adasd', 1, 3, '2022-10-10 00:32:49', NULL, NULL, 1),
(69, 1, '123', 'asd', 'asd', '1884061', 'm.stivenmarroquin@gmail.com', '123', 1, 3, '2022-10-10 00:36:19', NULL, NULL, 1),
(70, 2, '123', 'michael ', 'asd', '1884061', 'darkeon8888@gmail.com', '545845', 0, 0, '2022-10-10 01:45:29', NULL, NULL, 1),
(71, 1, 'asda', 'ad', 'asd', 'asd', 'darkeon88@gmail.com', '1234567', 2, 1, '2022-10-10 02:30:14', NULL, NULL, 1),
(72, 1, '123', 'michael ', 'asd', '1884061', 'm.stivenmarroquin@gmail.com', '123', 1, 3, '2022-10-12 14:45:42', NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `td_documento`
--
ALTER TABLE `td_documento`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `td_documento_detalle`
--
ALTER TABLE `td_documento_detalle`
  ADD PRIMARY KEY (`det_id`);

--
-- Indexes for table `td_documento_empresa`
--
ALTER TABLE `td_documento_empresa`
  ADD PRIMARY KEY (`docs_id`);

--
-- Indexes for table `td_empresadetalle`
--
ALTER TABLE `td_empresadetalle`
  ADD PRIMARY KEY (`empd_id`);

--
-- Indexes for table `td_ticketdetalle`
--
ALTER TABLE `td_ticketdetalle`
  ADD PRIMARY KEY (`tickd_id`);

--
-- Indexes for table `tm_categoria`
--
ALTER TABLE `tm_categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tm_empresa`
--
ALTER TABLE `tm_empresa`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tm_rol`
--
ALTER TABLE `tm_rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indexes for table `tm_sistemasst`
--
ALTER TABLE `tm_sistemasst`
  ADD PRIMARY KEY (`sis_id`);

--
-- Indexes for table `tm_subcategoria`
--
ALTER TABLE `tm_subcategoria`
  ADD PRIMARY KEY (`cats_id`);

--
-- Indexes for table `tm_subrol`
--
ALTER TABLE `tm_subrol`
  ADD PRIMARY KEY (`rols_id`);

--
-- Indexes for table `tm_ticket`
--
ALTER TABLE `tm_ticket`
  ADD PRIMARY KEY (`tick_id`);

--
-- Indexes for table `tm_usuario`
--
ALTER TABLE `tm_usuario`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `td_documento`
--
ALTER TABLE `td_documento`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `td_documento_detalle`
--
ALTER TABLE `td_documento_detalle`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `td_documento_empresa`
--
ALTER TABLE `td_documento_empresa`
  MODIFY `docs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `td_empresadetalle`
--
ALTER TABLE `td_empresadetalle`
  MODIFY `empd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `td_ticketdetalle`
--
ALTER TABLE `td_ticketdetalle`
  MODIFY `tickd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tm_categoria`
--
ALTER TABLE `tm_categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tm_empresa`
--
ALTER TABLE `tm_empresa`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tm_rol`
--
ALTER TABLE `tm_rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tm_sistemasst`
--
ALTER TABLE `tm_sistemasst`
  MODIFY `sis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tm_subcategoria`
--
ALTER TABLE `tm_subcategoria`
  MODIFY `cats_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_subrol`
--
ALTER TABLE `tm_subrol`
  MODIFY `rols_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tm_ticket`
--
ALTER TABLE `tm_ticket`
  MODIFY `tick_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tm_usuario`
--
ALTER TABLE `tm_usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
