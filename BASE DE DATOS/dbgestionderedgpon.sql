-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2024 a las 04:32:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbgestionderedgpon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('prueba2@simantec.ec|::1', 'i:1;', 1723236005),
('prueba2@simantec.ec|::1:timer', 'i:1723236005;', 1723236005);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '0001_01_01_000000_create_users_table', 1),
(8, '0001_01_01_000001_create_cache_table', 1),
(9, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `olt`
--

CREATE TABLE `olt` (
  `idolt` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `numero_slot` int(11) DEFAULT NULL,
  `ipconexion` varchar(45) NOT NULL,
  `puerto` int(255) NOT NULL,
  `trafico` int(30) DEFAULT NULL,
  `disponibilidad` int(30) DEFAULT NULL,
  `ping_dos_dias` int(30) DEFAULT NULL,
  `olt_cpu` int(30) DEFAULT NULL,
  `olt_memoria` int(30) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `olt`
--

INSERT INTO `olt` (`idolt`, `nombre`, `marca`, `modelo`, `numero_slot`, `ipconexion`, `puerto`, `trafico`, `disponibilidad`, `ping_dos_dias`, `olt_cpu`, `olt_memoria`, `estado`) VALUES
(1, 'OLT-Ascazubi', 'huawei', 'MA5608T', 2, '45.70.58.17', 1760, 4506, 4247, 4245, NULL, NULL, 'Activo'),
(2, 'OLT-Cayambe-Sur', 'Huawei', 'MA5608T', 2, '45.70.56.196', 1760, 4939, 4355, 4354, NULL, NULL, 'Activo'),
(3, 'OLT-Cayambe-Ayora', 'Huawei', 'MA5608T', 2, '45.70.56.197', 1760, 4938, 4271, 4296, NULL, NULL, 'Activo'),
(4, 'OLT-Cocotog', 'Huawei', 'MA5608T', 2, '45.70.202.210', 1760, 4890, 4254, 4253, NULL, NULL, 'Activo'),
(5, 'OLT-Cuzubamba', 'Huawei', 'MA5608T', 2, '172.11.109.254', 22, 4889, 4249, 4250, NULL, NULL, 'Activo'),
(6, 'OLT-Cajas', 'Huawei', 'MA5608T', 1, '157.100.58.49', 1760, 4968, 4967, 4947, NULL, NULL, 'Activo'),
(7, 'OLT-Quinche', 'Huawei', 'MA5608T', 2, '172.15.15.251', 22, 5504, 5447, 5446, NULL, NULL, 'Activo'),
(8, 'OLT-Guachala', 'Huawei', 'MA5608T', 1, '45.70.57.67', 1760, 4892, 4268, 4267, NULL, NULL, 'Activo'),
(9, 'OLT-Guayllabamba', 'Huawei', 'MA5608T', 2, '172.11.18.254', 22, 4888, 4223, 4216, NULL, NULL, 'Activo'),
(10, 'OLT-Lago', 'Huawei', 'MA5608T', 2, '190.171.80.123', 1760, 4977, 4992, 4972, NULL, NULL, 'Activo'),
(11, 'OLT-Malchingui', 'Huawei', 'MA5608T', 2, '192.168.232.254', 22, 5025, 4994, 5024, NULL, NULL, 'Activo'),
(12, 'OLT-Minas', 'Huawei', 'MA5608T', 2, '45.71.39.59', 1760, 5057, 5028, 5027, NULL, NULL, 'Activo'),
(13, 'OLT-Olmedo', 'Huawei', 'MA5608T', 1, '177.234.218.117', 1760, 5067, 5060, 5059, NULL, NULL, 'Activo'),
(14, 'OLT-Pifo-Puembo', 'Huawei', 'MA5608T', 1, '45.70.57.37', 1760, 5091, 5083, 5082, NULL, NULL, 'Activo'),
(15, 'OLT-Pifo', 'Huawei', 'MA5608T', 2, '172.11.10.254', 22, 5159, 5114, 5113, NULL, NULL, 'Activo'),
(16, 'OLT-Oyambarillo', 'Huawei', 'MA5608T', 2, '45.70.58.107', 1760, 5205, 5204, 5161, NULL, NULL, 'Activo'),
(17, 'OLT-Puellaro', 'Huawei', 'MA5608T', 1, '45.71.39.114', 1760, 5245, 5208, 5207, NULL, NULL, 'Activo'),
(18, 'OLT-Rancho', 'Huawei', 'MA5608T', 1, '157.100.63.17', 1760, 4751, 4265, 4264, NULL, NULL, 'Activo'),
(19, 'OLT-Riobamba', 'Huawei', 'MA5680T', 2, '45.224.22.156', 1760, 5260, 5248, 5247, NULL, NULL, 'Activo'),
(20, 'OLT-SanMiguel', 'Huawei', 'MA5608T', 2, '45.71.200.122', 1760, 4891, 4258, 4257, NULL, NULL, 'Activo'),
(21, 'OLT-Tabacundo', 'Huawei', 'MA5608T', 2, '172.11.233.254', 22, 4940, 4436, 4435, NULL, NULL, 'Activo'),
(22, 'OLT-VSOL-Tanda', 'VSOL', 'V2.1.6R', 1, '45.70.56.21', 1760, NULL, NULL, NULL, NULL, NULL, 'Inactivo'),
(23, 'OLT-Tumbaco', 'Huawei', 'MA5680T', 3, '157.100.63.53', 1760, 5326, 5316, 5315, NULL, NULL, 'Activo'),
(24, 'OLT-Yaruqui', 'Huawei', 'MA5608T', 2, '200.24.139.13', 1760, 5412, 5383, 5382, NULL, NULL, 'Activo'),
(25, 'OLT-Zab-Llano-Grande', 'Huawei', 'MA5608T', 2, '45.70.57.44', 1760, NULL, NULL, NULL, NULL, NULL, 'Inactivo'),
(26, 'OLT-Zabala', 'Huawei', 'MA5608T', 2, '45.70.57.10', 1760, 4679, 4261, 4260, NULL, NULL, 'Activo'),
(972, 'OLT-Tanlahua', 'Huawei', 'MA5608T', 1, '181.78.202.3', 1760, 5444, 5415, 5414, NULL, NULL, 'Activo'),
(973, 'prueba', 'aaeeeew', 'ass', 22, '21212', 22, 12, 2, 12, NULL, NULL, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puerto_olt`
--

CREATE TABLE `puerto_olt` (
  `idpuerto_olt` int(11) NOT NULL,
  `idtarjeta_olt` int(200) NOT NULL,
  `nombre_puerto` varchar(250) NOT NULL,
  `numero_puerto` int(150) NOT NULL,
  `vlan` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puerto_olt`
--

INSERT INTO `puerto_olt` (`idpuerto_olt`, `idtarjeta_olt`, `nombre_puerto`, `numero_puerto`, `vlan`) VALUES
(1, 1, 'ASCAZ-TJ00-PT00', 0, 1000),
(2, 1, 'ASCAZ-TJ00-PT01', 1, 1001),
(3, 1, 'ASCAZ-TJ00-PT02', 2, 1002),
(4, 1, 'ASCAZ-TJ00-PT03', 3, 1003),
(5, 1, 'ASCAZ-TJ00-PT04', 4, 1004),
(6, 1, 'ASCAZ-TJ00-PT05', 5, 1005),
(7, 1, 'ASCAZ-TJ00-PT06', 6, 1006),
(8, 1, 'ASCAZ-TJ00-PT07', 7, 1007),
(9, 2, 'ASCAZ-TJ01-PT00', 0, 2000),
(10, 2, 'ASCAZ-TJ01-PT01', 1, 2001),
(11, 2, 'ASCAZ-TJ01-PT02', 2, 2002),
(12, 2, 'ASCAZ-TJ01-PT03', 3, 2003),
(13, 2, 'ASCAZ-TJ01-PT04', 4, 2004),
(14, 2, 'ASCAZ-TJ01-PT05', 5, 2005),
(15, 2, 'ASCAZ-TJ01-PT06', 6, 2006),
(16, 2, 'ASCAZ-TJ01-PT07', 7, 2007),
(17, 3, 'CAYAM-TJ00-PT00', 0, 1000),
(18, 3, 'CAYAM-TJ00-PT01', 1, 1001),
(19, 3, 'CAYAM-TJ00-PT02', 2, 1002),
(20, 3, 'CAYAM-TJ00-PT03', 3, 1003),
(21, 3, 'CAYAM-TJ00-PT04', 4, 1004),
(22, 3, 'CAYAM-TJ00-PT05', 5, 1005),
(23, 3, 'CAYAM-TJ00-PT06', 6, 1006),
(24, 3, 'CAYAM-TJ00-PT07', 7, 1007),
(25, 3, 'CAYAM-TJ00-PT08', 8, 1008),
(26, 3, 'CAYAM-TJ00-PT09', 9, 1009),
(27, 3, 'CAYAM-TJ00-PT10', 10, 1010),
(28, 3, 'CAYAM-TJ00-PT11', 11, 1011),
(29, 3, 'CAYAM-TJ00-PT12', 12, 1012),
(30, 3, 'CAYAM-TJ00-PT13', 13, 1013),
(31, 3, 'CAYAM-TJ00-PT14', 14, 1014),
(32, 3, 'CAYAM-TJ00-PT15', 15, 1015),
(33, 4, 'CAYAM-TJ01-PT00', 0, 2000),
(34, 4, 'CAYAM-TJ01-PT01', 1, 2001),
(35, 4, 'CAYAM-TJ01-PT02', 2, 2002),
(36, 4, 'CAYAM-TJ01-PT03', 3, 2003),
(37, 4, 'CAYAM-TJ01-PT04', 4, 2004),
(38, 4, 'CAYAM-TJ01-PT05', 5, 2005),
(39, 4, 'CAYAM-TJ01-PT06', 6, 2006),
(40, 4, 'CAYAM-TJ01-PT07', 7, 2007),
(41, 4, 'CAYAM-TJ01-PT08', 8, 2008),
(42, 4, 'CAYAM-TJ01-PT09', 9, 2009),
(43, 4, 'CAYAM-TJ01-PT10', 10, 2010),
(44, 4, 'CAYAM-TJ01-PT11', 11, 2011),
(45, 4, 'CAYAM-TJ01-PT12', 12, 2012),
(46, 4, 'CAYAM-TJ01-PT13', 13, 2013),
(47, 4, 'CAYAM-TJ01-PT14', 14, 2014),
(48, 4, 'CAYAM-TJ01-PT15', 15, 2015),
(49, 5, 'AYORA-TJ00-PT00', 0, 1000),
(50, 5, 'AYORA-TJ00-PT01', 1, 1001),
(51, 5, 'AYORA-TJ00-PT02', 2, 1002),
(52, 5, 'AYORA-TJ00-PT03', 3, 1003),
(53, 5, 'AYORA-TJ00-PT04', 4, 1004),
(54, 5, 'AYORA-TJ00-PT05', 5, 1005),
(55, 5, 'AYORA-TJ00-PT06', 6, 1006),
(56, 5, 'AYORA-TJ00-PT07', 7, 1007),
(57, 5, 'AYORA-TJ00-PT08', 8, 1008),
(58, 5, 'AYORA-TJ00-PT09', 9, 1009),
(59, 5, 'AYORA-TJ00-PT10', 10, 1010),
(60, 5, 'AYORA-TJ00-PT11', 11, 1011),
(61, 5, 'AYORA-TJ00-PT12', 12, 1012),
(62, 5, 'AYORA-TJ00-PT13', 13, 1013),
(63, 5, 'AYORA-TJ00-PT14', 14, 1014),
(64, 5, 'AYORA-TJ00-PT15', 15, 1015),
(65, 6, 'AYORA-TJ01-PT00', 0, 2000),
(66, 6, 'AYORA-TJ01-PT01', 1, 2001),
(67, 6, 'AYORA-TJ01-PT02', 2, 2002),
(68, 6, 'AYORA-TJ01-PT03', 3, 2003),
(69, 6, 'AYORA-TJ01-PT04', 4, 2004),
(70, 6, 'AYORA-TJ01-PT05', 5, 2005),
(71, 6, 'AYORA-TJ01-PT06', 6, 2006),
(72, 6, 'AYORA-TJ01-PT07', 7, 2007),
(73, 6, 'AYORA-TJ01-PT08', 8, 2008),
(74, 6, 'AYORA-TJ01-PT09', 9, 2009),
(75, 6, 'AYORA-TJ01-PT10', 10, 2010),
(76, 6, 'AYORA-TJ01-PT11', 11, 2011),
(77, 6, 'AYORA-TJ01-PT12', 12, 2012),
(78, 6, 'AYORA-TJ01-PT13', 13, 2013),
(79, 6, 'AYORA-TJ01-PT14', 14, 2014),
(80, 6, 'AYORA-TJ01-PT15', 15, 2015),
(81, 7, 'COCOT-TJ00-PT00', 0, 1000),
(82, 7, 'COCOT-TJ00-PT01', 1, 1001),
(83, 7, 'COCOT-TJ00-PT02', 2, 1002),
(84, 7, 'COCOT-TJ00-PT03', 3, 1003),
(85, 7, 'COCOT-TJ00-PT04', 4, 1004),
(86, 7, 'COCOT-TJ00-PT05', 5, 1005),
(87, 7, 'COCOT-TJ00-PT06', 6, 1006),
(88, 7, 'COCOT-TJ00-PT07', 7, 1007),
(89, 7, 'COCOT-TJ00-PT08', 8, 1008),
(90, 7, 'COCOT-TJ00-PT09', 9, 1009),
(91, 7, 'COCOT-TJ00-PT10', 10, 1010),
(92, 7, 'COCOT-TJ00-PT11', 11, 1011),
(93, 7, 'COCOT-TJ00-PT12', 12, 1012),
(94, 7, 'COCOT-TJ00-PT13', 13, 1013),
(95, 7, 'COCOT-TJ00-PT14', 14, 1014),
(96, 7, 'COCOT-TJ00-PT15', 15, 1015),
(97, 8, 'COCOT-TJ01-PT00', 0, 2000),
(98, 8, 'COCOT-TJ01-PT01', 1, 2001),
(99, 8, 'COCOT-TJ01-PT02', 2, 2002),
(100, 8, 'COCOT-TJ01-PT03', 3, 2003),
(101, 8, 'COCOT-TJ01-PT04', 4, 2004),
(102, 8, 'COCOT-TJ01-PT05', 5, 2005),
(103, 8, 'COCOT-TJ01-PT06', 6, 2006),
(104, 8, 'COCOT-TJ01-PT07', 7, 2007),
(105, 9, 'CUZUB-TJ00-PT00', 0, 1000),
(106, 9, 'CUZUB-TJ00-PT01', 1, 1001),
(107, 9, 'CUZUB-TJ00-PT02', 2, 1002),
(108, 9, 'CUZUB-TJ00-PT03', 3, 1003),
(109, 9, 'CUZUB-TJ00-PT04', 4, 1004),
(110, 9, 'CUZUB-TJ00-PT05', 5, 1005),
(111, 9, 'CUZUB-TJ00-PT06', 6, 1006),
(112, 9, 'CUZUB-TJ00-PT07', 7, 1007),
(113, 10, 'CUZUB-TJ01-PT00', 0, 2000),
(114, 10, 'CUZUB-TJ01-PT01', 1, 2001),
(115, 10, 'CUZUB-TJ01-PT02', 2, 2002),
(116, 10, 'CUZUB-TJ01-PT03', 3, 2003),
(117, 10, 'CUZUB-TJ01-PT04', 4, 2004),
(118, 10, 'CUZUB-TJ01-PT05', 5, 2005),
(119, 10, 'CUZUB-TJ01-PT06', 6, 2006),
(120, 10, 'CUZUB-TJ01-PT07', 7, 2007),
(121, 10, 'CUZUB-TJ01-PT08', 8, 2008),
(122, 10, 'CUZUB-TJ01-PT09', 9, 2009),
(123, 10, 'CUZUB-TJ01-PT10', 10, 2010),
(124, 10, 'CUZUB-TJ01-PT11', 11, 2011),
(125, 10, 'CUZUB-TJ01-PT12', 12, 2012),
(126, 10, 'CUZUB-TJ01-PT13', 13, 2013),
(127, 10, 'CUZUB-TJ01-PT14', 14, 2014),
(128, 10, 'CUZUB-TJ01-PT15', 15, 2015),
(129, 11, 'CAJAS-TJ00-PT00', 0, 1000),
(130, 11, 'CAJAS-TJ00-PT01', 1, 1001),
(131, 11, 'CAJAS-TJ00-PT02', 2, 1002),
(132, 11, 'CAJAS-TJ00-PT03', 3, 1003),
(133, 11, 'CAJAS-TJ00-PT04', 4, 1004),
(134, 11, 'CAJAS-TJ00-PT05', 5, 1005),
(135, 11, 'CAJAS-TJ00-PT06', 6, 1006),
(136, 11, 'CAJAS-TJ00-PT07', 7, 1007),
(137, 11, 'CAJAS-TJ00-PT08', 8, 1008),
(138, 11, 'CAJAS-TJ00-PT09', 9, 1009),
(139, 11, 'CAJAS-TJ00-PT10', 10, 1010),
(140, 11, 'CAJAS-TJ00-PT11', 11, 1011),
(141, 11, 'CAJAS-TJ00-PT12', 12, 1012),
(142, 11, 'CAJAS-TJ00-PT13', 13, 1013),
(143, 11, 'CAJAS-TJ00-PT14', 14, 1014),
(144, 11, 'CAJAS-TJ00-PT15', 15, 1015),
(145, 12, 'QUINC-TJ00-PT00', 0, 1000),
(146, 12, 'QUINC-TJ00-PT01', 1, 1001),
(147, 12, 'QUINC-TJ00-PT02', 2, 1002),
(148, 12, 'QUINC-TJ00-PT03', 3, 1003),
(149, 12, 'QUINC-TJ00-PT04', 4, 1004),
(150, 12, 'QUINC-TJ00-PT05', 5, 1005),
(151, 12, 'QUINC-TJ00-PT06', 6, 1006),
(152, 12, 'QUINC-TJ00-PT07', 7, 1007),
(153, 12, 'QUINC-TJ00-PT08', 8, 1008),
(154, 12, 'QUINC-TJ00-PT09', 9, 1009),
(155, 12, 'QUINC-TJ00-PT10', 10, 1010),
(156, 12, 'QUINC-TJ00-PT11', 11, 1011),
(157, 12, 'QUINC-TJ00-PT12', 12, 1012),
(158, 12, 'QUINC-TJ00-PT13', 13, 1013),
(159, 12, 'QUINC-TJ00-PT14', 14, 1014),
(160, 12, 'QUINC-TJ00-PT15', 15, 1015),
(161, 13, 'QUINC-TJ01-PT00', 0, 2000),
(162, 13, 'QUINC-TJ01-PT01', 1, 2001),
(163, 13, 'QUINC-TJ01-PT02', 2, 2002),
(164, 13, 'QUINC-TJ01-PT03', 3, 2003),
(165, 13, 'QUINC-TJ01-PT04', 4, 2004),
(166, 13, 'QUINC-TJ01-PT05', 5, 2005),
(167, 13, 'QUINC-TJ01-PT06', 6, 2006),
(168, 13, 'QUINC-TJ01-PT07', 7, 2007),
(169, 13, 'QUINC-TJ01-PT08', 8, 2008),
(170, 13, 'QUINC-TJ01-PT09', 9, 2009),
(171, 13, 'QUINC-TJ01-PT10', 10, 2010),
(172, 13, 'QUINC-TJ01-PT11', 11, 2011),
(173, 13, 'QUINC-TJ01-PT12', 12, 2012),
(174, 13, 'QUINC-TJ01-PT13', 13, 2013),
(175, 13, 'QUINC-TJ01-PT14', 14, 2014),
(176, 13, 'QUINC-TJ01-PT15', 15, 2015),
(177, 14, 'GUACH-TJ00-PT00', 0, 1000),
(178, 14, 'GUACH-TJ00-PT01', 1, 1001),
(179, 14, 'GUACH-TJ00-PT02', 2, 1002),
(180, 14, 'GUACH-TJ00-PT03', 3, 1003),
(181, 14, 'GUACH-TJ00-PT04', 4, 1004),
(182, 14, 'GUACH-TJ00-PT05', 5, 1005),
(183, 14, 'GUACH-TJ00-PT06', 6, 1006),
(184, 14, 'GUACH-TJ00-PT07', 7, 1007),
(185, 14, 'GUACH-TJ00-PT08', 8, 1008),
(186, 14, 'GUACH-TJ00-PT09', 9, 1009),
(187, 14, 'GUACH-TJ00-PT10', 10, 1010),
(188, 14, 'GUACH-TJ00-PT11', 11, 1011),
(189, 14, 'GUACH-TJ00-PT12', 12, 1012),
(190, 14, 'GUACH-TJ00-PT13', 13, 1013),
(191, 14, 'GUACH-TJ00-PT14', 14, 1014),
(192, 14, 'GUACH-TJ00-PT15', 15, 1015),
(193, 15, 'GUACH-TJ01-PT00', 0, 2000),
(194, 15, 'GUACH-TJ01-PT01', 1, 2001),
(195, 15, 'GUACH-TJ01-PT02', 2, 2002),
(196, 15, 'GUACH-TJ01-PT03', 3, 2003),
(197, 15, 'GUACH-TJ01-PT04', 4, 2004),
(198, 15, 'GUACH-TJ01-PT05', 5, 2005),
(199, 15, 'GUACH-TJ01-PT06', 6, 2006),
(200, 15, 'GUACH-TJ01-PT07', 7, 2007),
(201, 16, 'GUAYL-TJ00-PT00', 0, 1000),
(202, 16, 'GUAYL-TJ00-PT01', 1, 1001),
(203, 16, 'GUAYL-TJ00-PT02', 2, 1002),
(204, 16, 'GUAYL-TJ00-PT03', 3, 1003),
(205, 16, 'GUAYL-TJ00-PT04', 4, 1004),
(206, 16, 'GUAYL-TJ00-PT05', 5, 1005),
(207, 16, 'GUAYL-TJ00-PT06', 6, 1006),
(208, 16, 'GUAYL-TJ00-PT07', 7, 1007),
(209, 16, 'GUAYL-TJ00-PT08', 8, 1008),
(210, 16, 'GUAYL-TJ00-PT09', 9, 1009),
(211, 16, 'GUAYL-TJ00-PT10', 10, 1010),
(212, 16, 'GUAYL-TJ00-PT11', 11, 1011),
(213, 16, 'GUAYL-TJ00-PT12', 12, 1012),
(214, 16, 'GUAYL-TJ00-PT13', 13, 1013),
(215, 16, 'GUAYL-TJ00-PT14', 14, 1014),
(216, 16, 'GUAYL-TJ00-PT15', 15, 1015),
(217, 17, 'GUAYL-TJ01-PT00', 0, 2000),
(218, 17, 'GUAYL-TJ01-PT01', 1, 2001),
(219, 17, 'GUAYL-TJ01-PT02', 2, 2002),
(220, 17, 'GUAYL-TJ01-PT03', 3, 2003),
(221, 17, 'GUAYL-TJ01-PT04', 4, 2004),
(222, 17, 'GUAYL-TJ01-PT05', 5, 2005),
(223, 17, 'GUAYL-TJ01-PT06', 6, 2006),
(224, 17, 'GUAYL-TJ01-PT07', 7, 2007),
(225, 18, 'LAGO-TJ00-PT00', 0, 1000),
(226, 18, 'LAGO-TJ00-PT01', 1, 1001),
(227, 18, 'LAGO-TJ00-PT02', 2, 1002),
(228, 18, 'LAGO-TJ00-PT03', 3, 1003),
(229, 18, 'LAGO-TJ00-PT04', 4, 1004),
(230, 18, 'LAGO-TJ00-PT05', 5, 1005),
(231, 18, 'LAGO-TJ00-PT06', 6, 1006),
(232, 18, 'LAGO-TJ00-PT07', 7, 1007),
(233, 18, 'LAGO-TJ00-PT08', 8, 1008),
(234, 18, 'LAGO-TJ00-PT09', 9, 1009),
(235, 18, 'LAGO-TJ00-PT10', 10, 1010),
(236, 18, 'LAGO-TJ00-PT11', 11, 1011),
(237, 18, 'LAGO-TJ00-PT12', 12, 1012),
(238, 18, 'LAGO-TJ00-PT13', 13, 1013),
(239, 18, 'LAGO-TJ00-PT14', 14, 1014),
(240, 18, 'LAGO-TJ00-PT15', 15, 1015),
(241, 19, 'LAGO-TJ01-PT00', 0, 2000),
(242, 19, 'LAGO-TJ01-PT01', 1, 2001),
(243, 19, 'LAGO-TJ01-PT02', 2, 2002),
(244, 19, 'LAGO-TJ01-PT03', 3, 2003),
(245, 19, 'LAGO-TJ01-PT04', 4, 2004),
(246, 19, 'LAGO-TJ01-PT05', 5, 2005),
(247, 19, 'LAGO-TJ01-PT06', 6, 2006),
(248, 19, 'LAGO-TJ01-PT07', 7, 2007),
(249, 19, 'LAGO-TJ01-PT08', 8, 2008),
(250, 19, 'LAGO-TJ01-PT09', 9, 2009),
(251, 19, 'LAGO-TJ01-PT10', 10, 2010),
(252, 19, 'LAGO-TJ01-PT11', 11, 2011),
(253, 19, 'LAGO-TJ01-PT12', 12, 2012),
(254, 19, 'LAGO-TJ01-PT13', 13, 2013),
(255, 19, 'LAGO-TJ01-PT14', 14, 2014),
(256, 19, 'LAGO-TJ01-PT15', 15, 2015),
(257, 20, 'MALCH-TJ00-PT00', 0, 1000),
(258, 20, 'MALCH-TJ00-PT01', 1, 1001),
(259, 20, 'MALCH-TJ00-PT02', 2, 1002),
(260, 20, 'MALCH-TJ00-PT03', 3, 1003),
(261, 20, 'MALCH-TJ00-PT04', 4, 1004),
(262, 20, 'MALCH-TJ00-PT05', 5, 1005),
(263, 20, 'MALCH-TJ00-PT06', 6, 1006),
(264, 20, 'MALCH-TJ00-PT07', 7, 1007),
(265, 21, 'MALCH-TJ01-PT00', 0, 2000),
(266, 21, 'MALCH-TJ01-PT01', 1, 2001),
(267, 21, 'MALCH-TJ01-PT02', 2, 2002),
(268, 21, 'MALCH-TJ01-PT03', 3, 2003),
(269, 21, 'MALCH-TJ01-PT04', 4, 2004),
(270, 21, 'MALCH-TJ01-PT05', 5, 2005),
(271, 21, 'MALCH-TJ01-PT06', 6, 2006),
(272, 21, 'MALCH-TJ01-PT07', 7, 2007),
(273, 22, 'MINAS-TJ00-PT00', 0, 1000),
(274, 22, 'MINAS-TJ00-PT01', 1, 1001),
(275, 22, 'MINAS-TJ00-PT02', 2, 1002),
(276, 22, 'MINAS-TJ00-PT03', 3, 1003),
(277, 22, 'MINAS-TJ00-PT04', 4, 1004),
(278, 22, 'MINAS-TJ00-PT05', 5, 1005),
(279, 22, 'MINAS-TJ00-PT06', 6, 1006),
(280, 22, 'MINAS-TJ00-PT07', 7, 1007),
(281, 23, 'MINAS-TJ01-PT00', 0, 2000),
(282, 23, 'MINAS-TJ01-PT01', 1, 2001),
(283, 23, 'MINAS-TJ01-PT02', 2, 2002),
(284, 23, 'MINAS-TJ01-PT03', 3, 2003),
(285, 23, 'MINAS-TJ01-PT04', 4, 2004),
(286, 23, 'MINAS-TJ01-PT05', 5, 2005),
(287, 23, 'MINAS-TJ01-PT06', 6, 2006),
(288, 23, 'MINAS-TJ01-PT07', 7, 2007),
(289, 24, 'OLMED-TJ00-PT00', 0, 1000),
(290, 24, 'OLMED-TJ00-PT01', 1, 1001),
(291, 24, 'OLMED-TJ00-PT02', 2, 1002),
(292, 24, 'OLMED-TJ00-PT03', 3, 1003),
(293, 24, 'OLMED-TJ00-PT04', 4, 1004),
(294, 24, 'OLMED-TJ00-PT05', 5, 1005),
(295, 24, 'OLMED-TJ00-PT06', 6, 1006),
(296, 24, 'OLMED-TJ00-PT07', 7, 1007),
(297, 25, 'PUEMB-TJ00-PT00', 0, 1000),
(298, 25, 'PUEMB-TJ00-PT01', 1, 1001),
(299, 25, 'PUEMB-TJ00-PT02', 2, 1002),
(300, 25, 'PUEMB-TJ00-PT03', 3, 1003),
(301, 25, 'PUEMB-TJ00-PT04', 4, 1004),
(302, 25, 'PUEMB-TJ00-PT05', 5, 1005),
(303, 25, 'PUEMB-TJ00-PT06', 6, 1006),
(304, 25, 'PUEMB-TJ00-PT07', 7, 1007),
(305, 25, 'PUEMB-TJ00-PT08', 8, 1008),
(306, 25, 'PUEMB-TJ00-PT09', 9, 1009),
(307, 25, 'PUEMB-TJ00-PT10', 10, 1010),
(308, 25, 'PUEMB-TJ00-PT11', 11, 1011),
(309, 25, 'PUEMB-TJ00-PT12', 12, 1012),
(310, 25, 'PUEMB-TJ00-PT13', 13, 1013),
(311, 25, 'PUEMB-TJ00-PT14', 14, 1014),
(312, 25, 'PUEMB-TJ00-PT15', 15, 1015),
(313, 26, 'PIFO-TJ00-PT00', 0, 1000),
(314, 26, 'PIFO-TJ00-PT01', 1, 1001),
(315, 26, 'PIFO-TJ00-PT02', 2, 1002),
(316, 26, 'PIFO-TJ00-PT03', 3, 1003),
(317, 26, 'PIFO-TJ00-PT04', 4, 1004),
(318, 26, 'PIFO-TJ00-PT05', 5, 1005),
(319, 26, 'PIFO-TJ00-PT06', 6, 1006),
(320, 26, 'PIFO-TJ00-PT07', 7, 1007),
(321, 26, 'PIFO-TJ00-PT08', 8, 1008),
(322, 26, 'PIFO-TJ00-PT09', 9, 1009),
(323, 26, 'PIFO-TJ00-PT10', 10, 1010),
(324, 26, 'PIFO-TJ00-PT11', 11, 1011),
(325, 26, 'PIFO-TJ00-PT12', 12, 1012),
(326, 26, 'PIFO-TJ00-PT13', 13, 1013),
(327, 26, 'PIFO-TJ00-PT14', 14, 1014),
(328, 26, 'PIFO-TJ00-PT15', 15, 1015),
(329, 27, 'PIFO-TJ01-PT00', 0, 2000),
(330, 27, 'PIFO-TJ01-PT01', 1, 2001),
(331, 27, 'PIFO-TJ01-PT02', 2, 2002),
(332, 27, 'PIFO-TJ01-PT03', 3, 2003),
(333, 27, 'PIFO-TJ01-PT04', 4, 2004),
(334, 27, 'PIFO-TJ01-PT05', 5, 2005),
(335, 27, 'PIFO-TJ01-PT06', 6, 2006),
(336, 27, 'PIFO-TJ01-PT07', 7, 2007),
(337, 27, 'PIFO-TJ01-PT08', 8, 2008),
(338, 27, 'PIFO-TJ01-PT09', 9, 2009),
(339, 27, 'PIFO-TJ01-PT10', 10, 2010),
(340, 27, 'PIFO-TJ01-PT11', 11, 2011),
(341, 27, 'PIFO-TJ01-PT12', 12, 2012),
(342, 27, 'PIFO-TJ01-PT13', 13, 2013),
(343, 27, 'PIFO-TJ01-PT14', 14, 2014),
(344, 27, 'PIFO-TJ01-PT15', 15, 2015),
(345, 28, 'OYAMB-TJ00-PT00', 0, 1000),
(346, 28, 'OYAMB-TJ00-PT01', 1, 1001),
(347, 28, 'OYAMB-TJ00-PT02', 2, 1002),
(348, 28, 'OYAMB-TJ00-PT03', 3, 1003),
(349, 28, 'OYAMB-TJ00-PT04', 4, 1004),
(350, 28, 'OYAMB-TJ00-PT05', 5, 1005),
(351, 28, 'OYAMB-TJ00-PT06', 6, 1006),
(352, 28, 'OYAMB-TJ00-PT07', 7, 1007),
(353, 28, 'OYAMB-TJ00-PT08', 8, 1008),
(354, 28, 'OYAMB-TJ00-PT09', 9, 1009),
(355, 28, 'OYAMB-TJ00-PT10', 10, 1010),
(356, 28, 'OYAMB-TJ00-PT11', 11, 1011),
(357, 28, 'OYAMB-TJ00-PT12', 12, 1012),
(358, 28, 'OYAMB-TJ00-PT13', 13, 1013),
(359, 28, 'OYAMB-TJ00-PT14', 14, 1014),
(360, 28, 'OYAMB-TJ00-PT15', 15, 1015),
(361, 29, 'OYAMB-TJ01-PT00', 0, 2000),
(362, 29, 'OYAMB-TJ01-PT01', 1, 2001),
(363, 29, 'OYAMB-TJ01-PT02', 2, 2002),
(364, 29, 'OYAMB-TJ01-PT03', 3, 2003),
(365, 29, 'OYAMB-TJ01-PT04', 4, 2004),
(366, 29, 'OYAMB-TJ01-PT05', 5, 2005),
(367, 29, 'OYAMB-TJ01-PT06', 6, 2006),
(368, 29, 'OYAMB-TJ01-PT07', 7, 2007),
(369, 29, 'OYAMB-TJ01-PT08', 8, 2008),
(370, 29, 'OYAMB-TJ01-PT09', 9, 2009),
(371, 29, 'OYAMB-TJ01-PT10', 10, 2010),
(372, 29, 'OYAMB-TJ01-PT11', 11, 2011),
(373, 29, 'OYAMB-TJ01-PT12', 12, 2012),
(374, 29, 'OYAMB-TJ01-PT13', 13, 2013),
(375, 29, 'OYAMB-TJ01-PT14', 14, 2014),
(376, 29, 'OYAMB-TJ01-PT15', 15, 2015),
(377, 30, 'PUELL-TJ00-PT00', 0, 1000),
(378, 30, 'PUELL-TJ00-PT01', 1, 1001),
(379, 30, 'PUELL-TJ00-PT02', 2, 1002),
(380, 30, 'PUELL-TJ00-PT03', 3, 1003),
(381, 30, 'PUELL-TJ00-PT04', 4, 1004),
(382, 30, 'PUELL-TJ00-PT05', 5, 1005),
(383, 30, 'PUELL-TJ00-PT06', 6, 1006),
(384, 30, 'PUELL-TJ00-PT07', 7, 1007),
(385, 31, 'PUELL-TJ01-PT00', 0, 2000),
(386, 31, 'PUELL-TJ01-PT01', 1, 2001),
(387, 31, 'PUELL-TJ01-PT02', 2, 2002),
(388, 31, 'PUELL-TJ01-PT03', 3, 2003),
(389, 31, 'PUELL-TJ01-PT04', 4, 2004),
(390, 31, 'PUELL-TJ01-PT05', 5, 2005),
(391, 31, 'PUELL-TJ01-PT06', 6, 2006),
(392, 31, 'PUELL-TJ01-PT07', 7, 2007),
(393, 32, 'RANCH-TJ00-PT00', 0, 1000),
(394, 32, 'RANCH-TJ00-PT01', 1, 1001),
(395, 32, 'RANCH-TJ00-PT02', 2, 1002),
(396, 32, 'RANCH-TJ00-PT03', 3, 1003),
(397, 32, 'RANCH-TJ00-PT04', 4, 1004),
(398, 32, 'RANCH-TJ00-PT05', 5, 1005),
(399, 32, 'RANCH-TJ00-PT06', 6, 1006),
(400, 32, 'RANCH-TJ00-PT07', 7, 1007),
(401, 32, 'RANCH-TJ00-PT08', 8, 1008),
(402, 32, 'RANCH-TJ00-PT09', 9, 1009),
(403, 32, 'RANCH-TJ00-PT10', 10, 1010),
(404, 32, 'RANCH-TJ00-PT11', 11, 1011),
(405, 32, 'RANCH-TJ00-PT12', 12, 1012),
(406, 32, 'RANCH-TJ00-PT13', 13, 1013),
(407, 32, 'RANCH-TJ00-PT14', 14, 1014),
(408, 32, 'RANCH-TJ00-PT15', 15, 1015),
(409, 33, 'RIOBA-TJ01-PT00', 0, 1000),
(410, 33, 'RIOBA-TJ01-PT01', 1, 1001),
(411, 33, 'RIOBA-TJ01-PT02', 2, 1002),
(412, 33, 'RIOBA-TJ01-PT03', 3, 1003),
(413, 33, 'RIOBA-TJ01-PT04', 4, 1004),
(414, 33, 'RIOBA-TJ01-PT05', 5, 1005),
(415, 33, 'RIOBA-TJ01-PT06', 6, 1006),
(416, 33, 'RIOBA-TJ01-PT07', 7, 1007),
(417, 33, 'RIOBA-TJ01-PT08', 8, 1008),
(418, 33, 'RIOBA-TJ01-PT09', 9, 1009),
(419, 33, 'RIOBA-TJ01-PT10', 10, 1010),
(420, 33, 'RIOBA-TJ01-PT11', 11, 1011),
(421, 33, 'RIOBA-TJ01-PT12', 12, 1012),
(422, 33, 'RIOBA-TJ01-PT13', 13, 1013),
(423, 33, 'RIOBA-TJ01-PT14', 14, 1014),
(424, 33, 'RIOBA-TJ01-PT15', 15, 1015),
(425, 34, 'RIOBA-TJ02-PT00', 0, 2000),
(426, 34, 'RIOBA-TJ02-PT01', 1, 2001),
(427, 34, 'RIOBA-TJ02-PT02', 2, 2002),
(428, 34, 'RIOBA-TJ02-PT03', 3, 2003),
(429, 34, 'RIOBA-TJ02-PT04', 4, 2004),
(430, 34, 'RIOBA-TJ02-PT05', 5, 2005),
(431, 34, 'RIOBA-TJ02-PT06', 6, 2006),
(432, 34, 'RIOBA-TJ02-PT07', 7, 2007),
(433, 34, 'RIOBA-TJ02-PT08', 8, 2008),
(434, 34, 'RIOBA-TJ02-PT09', 9, 2009),
(435, 34, 'RIOBA-TJ02-PT10', 10, 2010),
(436, 34, 'RIOBA-TJ02-PT11', 11, 2011),
(437, 34, 'RIOBA-TJ02-PT12', 12, 2012),
(438, 34, 'RIOBA-TJ02-PT13', 13, 2013),
(439, 34, 'RIOBA-TJ02-PT14', 14, 2014),
(440, 34, 'RIOBA-TJ02-PT15', 15, 2015),
(441, 35, 'SANMI-TJ00-PT00', 0, 1000),
(442, 35, 'SANMI-TJ00-PT01', 1, 1001),
(443, 35, 'SANMI-TJ00-PT02', 2, 1002),
(444, 35, 'SANMI-TJ00-PT03', 3, 1003),
(445, 35, 'SANMI-TJ00-PT04', 4, 1004),
(446, 35, 'SANMI-TJ00-PT05', 5, 1005),
(447, 35, 'SANMI-TJ00-PT06', 6, 1006),
(448, 35, 'SANMI-TJ00-PT07', 7, 1007),
(449, 35, 'SANMI-TJ00-PT08', 8, 1008),
(450, 35, 'SANMI-TJ00-PT09', 9, 1009),
(451, 35, 'SANMI-TJ00-PT10', 10, 1010),
(452, 35, 'SANMI-TJ00-PT11', 11, 1011),
(453, 35, 'SANMI-TJ00-PT12', 12, 1012),
(454, 35, 'SANMI-TJ00-PT13', 13, 1013),
(455, 35, 'SANMI-TJ00-PT14', 14, 1014),
(456, 35, 'SANMI-TJ00-PT15', 15, 1015),
(457, 36, 'SANMI-TJ01-PT00', 0, 2000),
(458, 36, 'SANMI-TJ01-PT01', 1, 2001),
(459, 36, 'SANMI-TJ01-PT02', 2, 2002),
(460, 36, 'SANMI-TJ01-PT03', 3, 2003),
(461, 36, 'SANMI-TJ01-PT04', 4, 2004),
(462, 36, 'SANMI-TJ01-PT05', 5, 2005),
(463, 36, 'SANMI-TJ01-PT06', 6, 2006),
(464, 36, 'SANMI-TJ01-PT07', 7, 2007),
(465, 36, 'SANMI-TJ01-PT08', 8, 2008),
(466, 36, 'SANMI-TJ01-PT09', 9, 2009),
(467, 36, 'SANMI-TJ01-PT10', 10, 2010),
(468, 36, 'SANMI-TJ01-PT11', 11, 2011),
(469, 36, 'SANMI-TJ01-PT12', 12, 2012),
(470, 36, 'SANMI-TJ01-PT13', 13, 2013),
(471, 36, 'SANMI-TJ01-PT14', 14, 2014),
(472, 36, 'SANMI-TJ01-PT15', 15, 2015),
(473, 37, 'TABAC-TJ00-PT00', 0, 1000),
(474, 37, 'TABAC-TJ00-PT01', 1, 1001),
(475, 37, 'TABAC-TJ00-PT02', 2, 1002),
(476, 37, 'TABAC-TJ00-PT03', 3, 1003),
(477, 37, 'TABAC-TJ00-PT04', 4, 1004),
(478, 37, 'TABAC-TJ00-PT05', 5, 1005),
(479, 37, 'TABAC-TJ00-PT06', 6, 1006),
(480, 37, 'TABAC-TJ00-PT07', 7, 1007),
(481, 37, 'TABAC-TJ00-PT08', 8, 1008),
(482, 37, 'TABAC-TJ00-PT09', 9, 1009),
(483, 37, 'TABAC-TJ00-PT10', 10, 1010),
(484, 37, 'TABAC-TJ00-PT11', 11, 1011),
(485, 37, 'TABAC-TJ00-PT12', 12, 1012),
(486, 37, 'TABAC-TJ00-PT13', 13, 1013),
(487, 37, 'TABAC-TJ00-PT14', 14, 1014),
(488, 37, 'TABAC-TJ00-PT15', 15, 1015),
(489, 38, 'TABAC-TJ01-PT00', 0, 2000),
(490, 38, 'TABAC-TJ01-PT01', 1, 2001),
(491, 38, 'TABAC-TJ01-PT02', 2, 2002),
(492, 38, 'TABAC-TJ01-PT03', 3, 2003),
(493, 38, 'TABAC-TJ01-PT04', 4, 2004),
(494, 38, 'TABAC-TJ01-PT05', 5, 2005),
(495, 38, 'TABAC-TJ01-PT06', 6, 2006),
(496, 38, 'TABAC-TJ01-PT07', 7, 2007),
(497, 38, 'TABAC-TJ01-PT08', 8, 2008),
(498, 38, 'TABAC-TJ01-PT09', 9, 2009),
(499, 38, 'TABAC-TJ01-PT10', 10, 2010),
(500, 38, 'TABAC-TJ01-PT11', 11, 2011),
(501, 38, 'TABAC-TJ01-PT12', 12, 2012),
(502, 38, 'TABAC-TJ01-PT13', 13, 2013),
(503, 38, 'TABAC-TJ01-PT14', 14, 2014),
(504, 38, 'TABAC-TJ01-PT15', 15, 2015),
(505, 39, 'TANDA-TJ01-PT00', 1, 1000),
(506, 39, 'TANDA-TJ01-PT01', 2, 1001),
(507, 39, 'TANDA-TJ01-PT02', 3, 1002),
(508, 39, 'TANDA-TJ01-PT03', 4, 1003),
(509, 39, 'TANDA-TJ01-PT04', 5, 1004),
(510, 39, 'TANDA-TJ01-PT05', 6, 1005),
(511, 39, 'TANDA-TJ01-PT06', 7, 1006),
(512, 39, 'TANDA-TJ01-PT07', 8, 1007),
(513, 40, 'TUMBA-TJ01-PT00', 0, 1000),
(514, 40, 'TUMBA-TJ01-PT01', 1, 1001),
(515, 40, 'TUMBA-TJ01-PT02', 2, 1002),
(516, 40, 'TUMBA-TJ01-PT03', 3, 1003),
(517, 40, 'TUMBA-TJ01-PT04', 4, 1004),
(518, 40, 'TUMBA-TJ01-PT05', 5, 1005),
(519, 40, 'TUMBA-TJ01-PT06', 6, 1006),
(520, 40, 'TUMBA-TJ01-PT07', 7, 1007),
(521, 40, 'TUMBA-TJ01-PT08', 8, 1008),
(522, 40, 'TUMBA-TJ01-PT09', 9, 1009),
(523, 40, 'TUMBA-TJ01-PT10', 10, 1010),
(524, 40, 'TUMBA-TJ01-PT11', 11, 1011),
(525, 40, 'TUMBA-TJ01-PT12', 12, 1012),
(526, 40, 'TUMBA-TJ01-PT13', 13, 1013),
(527, 40, 'TUMBA-TJ01-PT14', 14, 1014),
(528, 40, 'TUMBA-TJ01-PT15', 15, 1015),
(529, 41, 'TUMBA-TJ02-PT00', 0, 2000),
(530, 41, 'TUMBA-TJ02-PT01', 1, 2001),
(531, 41, 'TUMBA-TJ02-PT02', 2, 2002),
(532, 41, 'TUMBA-TJ02-PT03', 3, 2003),
(533, 41, 'TUMBA-TJ02-PT04', 4, 2004),
(534, 41, 'TUMBA-TJ02-PT05', 5, 2005),
(535, 41, 'TUMBA-TJ02-PT06', 6, 2006),
(536, 41, 'TUMBA-TJ02-PT07', 7, 2007),
(537, 41, 'TUMBA-TJ02-PT08', 8, 2008),
(538, 41, 'TUMBA-TJ02-PT09', 9, 2009),
(539, 41, 'TUMBA-TJ02-PT10', 10, 2010),
(540, 41, 'TUMBA-TJ02-PT11', 11, 2011),
(541, 41, 'TUMBA-TJ02-PT12', 12, 2012),
(542, 41, 'TUMBA-TJ02-PT13', 13, 2013),
(543, 41, 'TUMBA-TJ02-PT14', 14, 2014),
(544, 41, 'TUMBA-TJ02-PT15', 15, 2015),
(545, 42, 'TUMBA-TJ03-PT00', 0, 3000),
(546, 42, 'TUMBA-TJ03-PT01', 1, 3001),
(547, 42, 'TUMBA-TJ03-PT02', 2, 3002),
(548, 42, 'TUMBA-TJ03-PT03', 3, 3003),
(549, 42, 'TUMBA-TJ03-PT04', 4, 3004),
(550, 42, 'TUMBA-TJ03-PT05', 5, 3005),
(551, 42, 'TUMBA-TJ03-PT06', 6, 3006),
(552, 42, 'TUMBA-TJ03-PT07', 7, 3007),
(553, 42, 'TUMBA-TJ03-PT08', 8, 3008),
(554, 42, 'TUMBA-TJ03-PT09', 9, 3009),
(555, 42, 'TUMBA-TJ03-PT10', 10, 3010),
(556, 42, 'TUMBA-TJ03-PT11', 11, 3011),
(557, 42, 'TUMBA-TJ03-PT12', 12, 3012),
(558, 42, 'TUMBA-TJ03-PT13', 13, 3013),
(559, 42, 'TUMBA-TJ03-PT14', 14, 3014),
(560, 42, 'TUMBA-TJ03-PT15', 15, 3015),
(561, 43, 'YARUQ-TJ00-PT00', 0, 1000),
(562, 43, 'YARUQ-TJ00-PT01', 1, 1001),
(563, 43, 'YARUQ-TJ00-PT02', 2, 1002),
(564, 43, 'YARUQ-TJ00-PT03', 3, 1003),
(565, 43, 'YARUQ-TJ00-PT04', 4, 1004),
(566, 43, 'YARUQ-TJ00-PT05', 5, 1005),
(567, 43, 'YARUQ-TJ00-PT06', 6, 1006),
(568, 43, 'YARUQ-TJ00-PT07', 7, 1007),
(569, 44, 'YARUQ-TJ01-PT00', 0, 2000),
(570, 44, 'YARUQ-TJ01-PT01', 1, 2001),
(571, 44, 'YARUQ-TJ01-PT02', 2, 2002),
(572, 44, 'YARUQ-TJ01-PT03', 3, 2003),
(573, 44, 'YARUQ-TJ01-PT04', 4, 2004),
(574, 44, 'YARUQ-TJ01-PT05', 5, 2005),
(575, 44, 'YARUQ-TJ01-PT06', 6, 2006),
(576, 44, 'YARUQ-TJ01-PT07', 7, 2007),
(577, 45, 'LLANO-TJ00-PT00', 0, 1000),
(578, 45, 'LLANO-TJ00-PT01', 1, 1001),
(579, 45, 'LLANO-TJ00-PT02', 2, 1002),
(580, 45, 'LLANO-TJ00-PT03', 3, 1003),
(581, 45, 'LLANO-TJ00-PT04', 4, 1004),
(582, 45, 'LLANO-TJ00-PT05', 5, 1005),
(583, 45, 'LLANO-TJ00-PT06', 6, 1006),
(584, 45, 'LLANO-TJ00-PT07', 7, 1007),
(585, 45, 'LLANO-TJ00-PT08', 8, 1008),
(586, 45, 'LLANO-TJ00-PT09', 9, 1009),
(587, 45, 'LLANO-TJ00-PT10', 10, 1010),
(588, 45, 'LLANO-TJ00-PT11', 11, 1011),
(589, 45, 'LLANO-TJ00-PT12', 12, 1012),
(590, 45, 'LLANO-TJ00-PT13', 13, 1013),
(591, 45, 'LLANO-TJ00-PT14', 14, 1014),
(592, 45, 'LLANO-TJ00-PT15', 15, 1015),
(593, 46, 'LLANO-TJ01-PT00', 0, 2000),
(594, 46, 'LLANO-TJ01-PT01', 1, 2001),
(595, 46, 'LLANO-TJ01-PT02', 2, 2002),
(596, 46, 'LLANO-TJ01-PT03', 3, 2003),
(597, 46, 'LLANO-TJ01-PT04', 4, 2004),
(598, 46, 'LLANO-TJ01-PT05', 5, 2005),
(599, 46, 'LLANO-TJ01-PT06', 6, 2006),
(600, 46, 'LLANO-TJ01-PT07', 7, 2007),
(601, 47, 'ZABAL-TJ00-PT00', 0, 1000),
(602, 47, 'ZABAL-TJ00-PT01', 1, 1001),
(603, 47, 'ZABAL-TJ00-PT02', 2, 1002),
(604, 47, 'ZABAL-TJ00-PT03', 3, 1003),
(605, 47, 'ZABAL-TJ00-PT04', 4, 1004),
(606, 47, 'ZABAL-TJ00-PT05', 5, 1005),
(607, 47, 'ZABAL-TJ00-PT06', 6, 1006),
(608, 47, 'ZABAL-TJ00-PT07', 7, 1007),
(609, 47, 'ZABAL-TJ00-PT08', 8, 1008),
(610, 47, 'ZABAL-TJ00-PT09', 9, 1009),
(611, 47, 'ZABAL-TJ00-PT10', 10, 1010),
(612, 47, 'ZABAL-TJ00-PT11', 11, 1011),
(613, 47, 'ZABAL-TJ00-PT12', 12, 1012),
(614, 47, 'ZABAL-TJ00-PT13', 13, 1013),
(615, 47, 'ZABAL-TJ00-PT14', 14, 1014),
(616, 47, 'ZABAL-TJ00-PT15', 15, 1015),
(617, 48, 'ZABAL-TJ01-PT00', 0, 2000),
(618, 48, 'ZABAL-TJ01-PT01', 1, 2001),
(619, 48, 'ZABAL-TJ01-PT02', 2, 2002),
(620, 48, 'ZABAL-TJ01-PT03', 3, 2003),
(621, 48, 'ZABAL-TJ01-PT04', 4, 2004),
(622, 48, 'ZABAL-TJ01-PT05', 5, 2005),
(623, 48, 'ZABAL-TJ01-PT06', 6, 2006),
(624, 48, 'ZABAL-TJ01-PT07', 7, 2007),
(625, 48, 'ZABAL-TJ01-PT08', 8, 2008),
(626, 48, 'ZABAL-TJ01-PT09', 9, 2009),
(627, 48, 'ZABAL-TJ01-PT10', 10, 2010),
(628, 48, 'ZABAL-TJ01-PT11', 11, 2011),
(629, 48, 'ZABAL-TJ01-PT12', 12, 2012),
(630, 48, 'ZABAL-TJ01-PT13', 13, 2013),
(631, 48, 'ZABAL-TJ01-PT14', 14, 2014),
(632, 48, 'ZABAL-TJ01-PT15', 15, 2015);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eKNieOcXbv0CLwrYMtMiCMTG8b2th1OCzUxXk9Fh', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVM2YU8wS3Exc2JLbERsRThnQnFkQjBReTV2YlNMdmRXSzN0RTlkQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvdGVzaXNfZ2VzdGlvbl9vbHQvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1723516210),
('Mwb5tSYXAc5gXSYoYdIkKrqxA9pq8wsvDFjZnJEV', 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYVhUdTVsekViWW55MzFZb3VneFFnR2JkOEFSa0Z4NXRNR0ZXbUVCWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3QvdGVzaXNfZ2VzdGlvbl9vbHQyL3B1YmxpYy9pbmZvLW9sdC85Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzIzMzEyMTQyO319', 1723316907),
('VAKbGS7wEBu9sXKrpNPZQB6Fy1MIy9SWQEYjAxKn', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWjZsRk9TRkRKOFF5bTRRdWZtbVhRVnZSb2tHZGhkdXZTMVhMa25CayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9sb2NhbGhvc3QvdGVzaXNfZ2VzdGlvbl9vbHQvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1723311459);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_olt`
--

CREATE TABLE `tarjeta_olt` (
  `idtarjeta_olt` int(11) NOT NULL,
  `idolt` int(11) NOT NULL,
  `nombre_tarjeta` varchar(70) NOT NULL,
  `numero_slot` int(11) NOT NULL,
  `cantidad_puerto` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjeta_olt`
--

INSERT INTO `tarjeta_olt` (`idtarjeta_olt`, `idolt`, `nombre_tarjeta`, `numero_slot`, `cantidad_puerto`, `estado`) VALUES
(1, 1, 'ASCAZ-TJ00', 0, 8, 'Activo'),
(2, 1, 'ASCAZ-TJ01', 1, 8, 'Activo'),
(3, 2, 'CAYAM-TJ00', 0, 16, 'Activo'),
(4, 2, 'CAYAM-TJ01', 1, 16, 'Activo'),
(5, 3, 'AYORA-TJ00', 0, 16, 'Activo'),
(6, 3, 'AYORA-TJ01', 1, 16, 'Activo'),
(7, 4, 'COCOT-TJ00', 0, 16, 'Activo'),
(8, 4, 'COCOT-TJ01', 1, 8, 'Activo'),
(9, 5, 'CUZUB-TJ00', 0, 8, 'Activo'),
(10, 5, 'CUZUB-TJ01', 1, 16, 'Activo'),
(11, 6, 'CAJAS-TJ00', 0, 16, 'Activo'),
(12, 7, 'QUINC-TJ00', 0, 16, 'Activo'),
(13, 7, 'QUINC-TJ01', 1, 16, 'Activo'),
(14, 8, 'GUACH-TJ00', 0, 16, 'Activo'),
(15, 8, 'GUACH-TJ01', 1, 8, 'Activo'),
(16, 9, 'GUAYL-TJ00', 0, 16, 'Activo'),
(17, 9, 'GUAYL-TJ01', 1, 8, 'Activo'),
(18, 10, 'LAGO-TJ00', 0, 16, 'Activo'),
(19, 10, 'LAGO-TJ01', 1, 16, 'Activo'),
(20, 11, 'MALCH-TJ00', 0, 8, 'Activo'),
(21, 11, 'MALCH-TJ01', 1, 8, 'Activo'),
(22, 12, 'MINAS-TJ00', 0, 8, 'Activo'),
(23, 12, 'MINAS-TJ01', 1, 8, 'Activo'),
(24, 13, 'OLMED-TJ00', 0, 8, 'Activo'),
(25, 14, 'PUEMB-TJ00', 0, 16, 'Activo'),
(26, 15, 'PIFO-TJ00', 0, 16, 'Activo'),
(27, 15, 'PIFO-TJ01', 1, 16, 'Activo'),
(28, 16, 'OYAMB-TJ00', 0, 16, 'Activo'),
(29, 16, 'OYAMB-TJ01', 1, 16, 'Activo'),
(30, 17, 'PUELL-TJ00', 0, 8, 'Activo'),
(31, 17, 'PUELL-TJ00', 1, 8, 'Activo'),
(32, 18, 'RANCH-TJ00', 0, 16, 'Activo'),
(33, 19, 'RIOBA-TJ01', 1, 16, 'Activo'),
(34, 19, 'RIOBA-TJ02', 2, 16, 'Activo'),
(35, 20, 'SANMI-TJ00', 0, 16, 'Activo'),
(36, 20, 'SANMI-TJ01', 1, 16, 'Activo'),
(37, 21, 'TABAC-TJ00', 0, 16, 'Activo'),
(38, 21, 'TABAC-TJ01', 1, 16, 'Activo'),
(39, 22, 'TANDA-TJ01', 1, 8, 'Activo'),
(40, 23, 'TUMBA-TJ01', 1, 16, 'Activo'),
(41, 23, 'TUMBA-TJ02', 2, 16, 'Activo'),
(42, 23, 'TUMBA-TJ03', 3, 16, 'Activo'),
(43, 24, 'YARUQ-TJ00', 0, 8, 'Activo'),
(44, 24, 'YARUQ-TJ01', 1, 8, 'Activo'),
(45, 25, 'LLANO-TJ00', 0, 16, 'Activo'),
(46, 25, 'LLANO-TJ01', 1, 8, 'Activo'),
(47, 26, 'ZABAL-TJ00', 0, 16, 'Activo'),
(48, 26, 'ZABAL-TJ01', 1, 16, 'Activo'),
(53, 972, 'TANLA-TJ00', 0, 8, 'Activo'),
(54, 973, 'as', 2, 22, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pasword` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `pasword`) VALUES
(1, 'wsilva', 'william@gmail.com', NULL, '$2y$12$9PHnJ/07IFAsZETH0HEUkOdinNJ1JRPHWHc3QpK6RWmtJhy0OPurS', NULL, '2024-08-05 01:55:28', '2024-08-05 01:55:28', '51manT3c2075**%'),
(9, 'jcarrillo', 'jacarrillo@simantec.ec', NULL, '$2y$12$D489LOIq8ZApUrkWl5PT1etRL8oDm9q0NaCMWkCR678O78W2XuowW', NULL, '2024-08-09 20:45:37', '2024-08-09 20:45:37', 'eyJpdiI6IjBNaG9RWEtidGpjeGJLTkRmV1hLdnc9PSIsInZhbHVlIjoiYngvaUJBd1ByWE1RTGtmWFczYmwwUT09IiwibWFjIjoiYWU0NmZiY2IxODcyNzZhMTVkYzZkNTlmYjZjOGZiZGZiNmNlNjE1NjUxZjY0NTY3ZGE2MjhjNDY0NGI1YzBlZCIsInRhZyI6IiJ9'),
(10, 'wsilva', 'wsilva@simantec.ec', NULL, '$2y$12$asr2C1HTzaEXtCGfdQLYBOC0AmROgT/gdJvSrqfCkO5iXNgKZZ.Fi', NULL, '2024-08-09 21:01:11', '2024-08-09 21:01:11', 'eyJpdiI6IjBtNlYxVTljQ28zOG5UWkpSWk5tQkE9PSIsInZhbHVlIjoicWdBUHZBVHJKVGNpb1dFbnMwMGwvZz09IiwibWFjIjoiNjlkMmQ3M2RjNGZkZTYxM2NjZjZmYzU1YzA2NzVkNDdhYWZiMWRhMDQ3MjcyNWM4NzQ3ZTE4MDY1MjI3NjY1NiIsInRhZyI6IiJ9');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `olt`
--
ALTER TABLE `olt`
  ADD PRIMARY KEY (`idolt`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `puerto_olt`
--
ALTER TABLE `puerto_olt`
  ADD PRIMARY KEY (`idpuerto_olt`),
  ADD KEY `fk_puertoolt_tarjetaolt_idx` (`idtarjeta_olt`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tarjeta_olt`
--
ALTER TABLE `tarjeta_olt`
  ADD PRIMARY KEY (`idtarjeta_olt`),
  ADD KEY `fk_tarjetaolt_olt_idx` (`idolt`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `olt`
--
ALTER TABLE `olt`
  MODIFY `idolt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=974;

--
-- AUTO_INCREMENT de la tabla `puerto_olt`
--
ALTER TABLE `puerto_olt`
  MODIFY `idpuerto_olt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=633;

--
-- AUTO_INCREMENT de la tabla `tarjeta_olt`
--
ALTER TABLE `tarjeta_olt`
  MODIFY `idtarjeta_olt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `puerto_olt`
--
ALTER TABLE `puerto_olt`
  ADD CONSTRAINT `fk_puertoolt_tarjetaolt` FOREIGN KEY (`idtarjeta_olt`) REFERENCES `tarjeta_olt` (`idtarjeta_olt`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tarjeta_olt`
--
ALTER TABLE `tarjeta_olt`
  ADD CONSTRAINT `fk_tarjetaolt_olt` FOREIGN KEY (`idolt`) REFERENCES `olt` (`idolt`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
