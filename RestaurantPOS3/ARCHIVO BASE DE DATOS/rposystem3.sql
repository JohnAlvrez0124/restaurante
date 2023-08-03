-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2023 a las 03:09:52
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rposystem3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Cliente_id` int(11) NOT NULL,
  `Cliente_name` varchar(200) NOT NULL,
  `Cliente_email` varchar(200) NOT NULL,
  `Cliente_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Cliente_id`, `Cliente_name`, `Cliente_email`, `Cliente_password`) VALUES
(1, 'john', 'john@ggg.co', '12345678');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `reservacion_id` int(11) NOT NULL,
  `reservacion_name` varchar(200) NOT NULL,
  `reservacion_email` varchar(200) NOT NULL,
  `reservacion_Hora` varchar(200) NOT NULL,
  `reservacion_Fecha` varchar(200) NOT NULL,
  `reservacion_Catpersona` varchar(200) NOT NULL,
  `reservacion_tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`reservacion_id`, `reservacion_name`, `reservacion_email`, `reservacion_Hora`, `reservacion_Fecha`, `reservacion_Catpersona`, `reservacion_tel`) VALUES
(8, 'Deyvin', 'fender2301@gmail.com', '21:09', '2023-08-31', '15', '8493577188');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_admin`
--

CREATE TABLE `rpos_admin` (
  `admin_id` varchar(200) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rpos_admin`
--

INSERT INTO `rpos_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'JOHN ALVAREZ', 'JOALVAREZ', '7c222fb2927d828af22f592134e8932480637c0d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_customers`
--

CREATE TABLE `rpos_customers` (
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `customer_phoneno` varchar(200) NOT NULL,
  `customer_email` varchar(200) NOT NULL,
  `customer_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rpos_customers`
--

INSERT INTO `rpos_customers` (`customer_id`, `customer_name`, `customer_phoneno`, `customer_email`, `customer_password`, `created_at`) VALUES
('78b7b30426ea', 'juan', '80000000', 'juan@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', '2023-08-01 00:32:21.066117'),
('7cba26e66188', 'JOHN ALVAREZ', '8096075853', 'jalvarez20200088@ucsd.edu.do', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', '2023-07-30 18:04:50.627709'),
('8ef653069841', 'Deyvin Joel Aguasvivas Baldera', '8294710387', 'fender2301@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', '2023-08-01 01:18:10.623248');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_orders`
--

CREATE TABLE `rpos_orders` (
  `order_id` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `prod_id` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_qty` varchar(200) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `table_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rpos_orders`
--

INSERT INTO `rpos_orders` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`, `table_id`) VALUES
('11837e4fba', 'EIQZ-4057', '7cba26e66188', 'Cristiano Ronaldo', '2b976e49a0', 'Mangu', '100', '12', 'Paid', '2023-07-30 18:47:51.824005', 0),
('1e7bbb4c3e', 'GBSH-4098', '7cba26e66188', 'juan', '2b976e49a0', 'mangu triple golpe', '100', '2', 'Paid', '2023-07-30 20:32:08.966248', 0),
('23eade9d7c', 'PLDO-9345', '7cba26e66188', 'Neymar junior', '97972e8d63', 'Chorizo criollo con Patacones', '100', '111', 'Paid', '2023-07-30 18:48:00.243206', 0),
('28762565ec', 'OINE-0621', '7cba26e66188', 'juan', '2b976e49a0', 'mangu triple golpe', '100', '2', 'Paid', '2023-07-30 21:57:30.593160', 0),
('296e11915b', 'IJOX-8632', '7cba26e66188', 'JOHN ALVAREZ', '2b976e49a0', 'mangu triple golpe', '100', '2', 'Paid', '2023-07-30 19:26:33.866213', 0),
('29bf91106d', 'MAKE-2574', '7cba26e66188', 'Leonel Messi', '2b976e49a0', 'Arroz Con clara de Huevo', '250', '111', 'Paid', '2023-07-30 18:48:10.251701', 0),
('338635eeac', 'YWFA-3901', '7cba26e66188', 'Vinícius Júnior', '2b976e49a0', 'Quipes', '100', '1', 'PAGADO', '2023-07-30 18:48:20.384208', 0),
('4aa50779d1', 'NQYG-5308', '7cba26e66188', 'Kylian Mbappé', '2fdec9bdfb', 'Pollo guisado', '250', '12', 'Paid', '2023-07-30 18:48:42.540435', 0),
('5de3d72f81', 'KYHI-7852', '7cba26e66188', 'Robert Lewandowski', '2b976e49a0', 'Canasta de platano:', '400', '12', 'Paid', '2023-07-30 18:49:01.647496', 0),
('686c24d842', 'RTVP-5418', '7cba26e66188', 'juan', '4e68e0dd49', 'La Bandera', '250', '2', 'Paid', '2023-07-30 19:52:27.334972', 0),
('71b71e5267', 'CAUJ-8147', '7cba26e66188', 'Roberto Carlos', 'f9c2770a32', 'Carne de Cerdo', '250', '1', 'Paid', '2023-07-30 18:49:10.149112', 0),
('7f35bc5617', 'IBER-4529', '7cba26e66188', 'Mohamed Salah', '2b976e49a0', 'Bistec frito Criollo', '300', '4', 'Paid', '2023-07-30 18:49:44.755994', 0),
('7fab13b49d', 'BZGV-0415', '7cba26e66188', 'Erling Haaland', '2b976e49a0', 'Sancocho', '100', '1111', 'Paid', '2023-07-30 18:49:35.834451', 0),
('82b400ce77', 'LPVZ-4701', '7cba26e66188', 'Karim Benzema', '97972e8d63', 'pica pollo', '300', '2', 'Paid', '2023-07-30 18:49:28.254472', 0),
('c37701161e', 'JNTR-1473', '7cba26e66188', 'juan', '5d66c79953', 'Pollo guisado', '250', '2', 'Paid', '2023-07-30 20:29:32.235786', 0),
('d206418431', 'MJDG-9120', '7cba26e66188', 'juan monte', '2b976e49a0', 'pescado con Tostones', '400', '2', 'Paid', '2023-07-30 18:49:18.966032', 0),
('d3956ec442', 'JQRP-9752', '7cba26e66188', 'pedro salas', 'd9aed17627', 'Bollito', '100', '10', 'Paid', '2023-07-30 18:48:52.755034', 0),
('d95ae8662c', 'JVWR-3072', '7cba26e66188', 'juan', '2b976e49a0', 'mangu triple golpe', '100', '2', 'Paid', '2023-07-30 20:14:21.797092', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_pass_resets`
--

CREATE TABLE `rpos_pass_resets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rpos_pass_resets`
--

INSERT INTO `rpos_pass_resets` (`reset_id`, `reset_code`, `reset_token`, `reset_email`, `reset_status`, `created_at`) VALUES
(1, '63KU9QDGSO', '4ac4cee0a94e82a2aedc311617aa437e218bdf68', 'sysadmin@icofee.org', 'Pending', '2020-08-17 15:20:14.318643');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_payments`
--

CREATE TABLE `rpos_payments` (
  `pay_id` varchar(200) NOT NULL,
  `pay_code` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `customer_id` varchar(200) NOT NULL,
  `pay_amt` varchar(200) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rpos_payments`
--

INSERT INTO `rpos_payments` (`pay_id`, `pay_code`, `order_code`, `customer_id`, `pay_amt`, `pay_method`, `created_at`) VALUES
('0a851d', 'BOW5AESZ8J', 'LPVZ-4701', '7cba26e66188', '8000', 'Efectivo', '2022-11-30 17:06:39.613432'),
('0bf592', '9UMWLG4BF8', 'EJKA-4501', '35135b319ce3', '8', 'Tarjeta', '2022-11-30 05:08:41.878217'),
('0f5123', 'EMK2R1FYWA', 'NQYG-5308', '7cba26e66188', '4104', 'Efectivo', '2022-11-30 17:10:27.862695'),
('145606', '3N4KUIWVMT', 'JVWR-3072', '7cba26e66188', '200', 'Efectivo', '2023-07-30 20:14:21.729352'),
('1babd2', 'CRH56WLU1Q', 'PLDO-9345', '7cba26e66188', '8880', 'Efectivo', '2022-11-30 16:57:01.766695'),
('209fab', '7LD9PW85TH', 'HLDX-5317', '7d6c1bbdafd4', '280', 'Efectivo', '2022-12-05 00:27:53.027031'),
('4423d7', 'QWERT0YUZ1', 'JFMB-0731', '35135b319ce3', '11', 'Tarjeta', '2022-11-30 05:09:08.215735'),
('442865', '146XLFSC9V', 'INHG-0875', '9c7fcc067bda', '10', 'Tarjeta', '2022-11-30 05:08:38.217505'),
('4cd49b', 'FZM7RWO4SL', 'OINE-0621', '7cba26e66188', '200', 'Efectivo', '2023-07-30 21:57:29.819758'),
('4d1eca', 'NBXPLH6DMU', 'JQRP-9752', '7cba26e66188', '3220', 'Efectivo', '2023-07-23 03:21:49.833554'),
('4d4da8', 'B16L5GZJHQ', 'IBER-4529', '7cba26e66188', '1120', 'Efectivo', '2023-07-23 03:19:59.530351'),
('59b5d4', 'M4GTYJCXS6', 'GBSH-4098', '7cba26e66188', '200', 'Efectivo', '2023-07-30 20:32:08.877583'),
('6032c3', '9LSJYVIQ72', 'BZGV-0415', '7cba26e66188', '311080', 'Efectivo', '2022-11-30 17:31:06.662207'),
('65891b', 'MF2TVJA1PY', 'ZPXD-6951', 'e711dcc579d9', '16', 'Efectivo', '2022-11-30 05:08:03.647003'),
('6aa9ac', 'TD8I9JWX53', 'DBAN-5810', '7cba26e66188', '200', 'Efectivo', '2023-07-30 19:18:15.198037'),
('75ae21', '1QIKVO69SA', 'IUSP-9453', 'fe6bb69bdd29', '10', 'Efectivo', '2022-11-30 05:08:06.831900'),
('7e1989', 'KLTF3YZHJP', 'QOEH-8613', '29c759d624f9', '9', 'Efectivo', '2022-11-30 05:08:08.689065'),
('82083b', 'Q8AXV4T3PF', 'PXNL-7148', '7cba26e66188', '200', 'Efectivo', '2023-07-30 19:34:59.111763'),
('890680', 'W42ZBOUPQ6', 'IJOX-8632', '7cba26e66188', '200', 'Efectivo', '2023-07-30 19:26:33.381423'),
('8d3d1e', 'MCSD3VPLFW', 'JNTR-1473', '7cba26e66188', '500', 'Tarjeta', '2023-07-30 20:29:32.196701'),
('8fe2a1', 'S5IDFEJWH4', 'RTVP-5418', '7cba26e66188', '500', 'Efectivo', '2023-07-30 19:52:27.259774'),
('968488', '5E31DQ2NCG', 'COXP-6018', '7c8f2100d552', '22', 'Efectivo', '2022-11-30 05:08:16.962723'),
('984539', 'LSBNK1WRFU', 'FNAB-9142', '35135b319ce3', '18', 'Tarjeta', '2022-11-30 05:08:34.411908'),
('9fcee7', 'AZSUNOKEI7', 'OTEV-8532', '3859d26cd9a5', '15', 'Efectivo', '2022-11-30 05:08:20.846589'),
('a58e08', '3GCSR9AI4B', 'JLTV-6734', '7cba26e66188', '200', 'Efectivo', '2023-07-30 19:16:12.677479'),
('aaca16', '6LUZARKW28', 'YWFA-3901', '7cba26e66188', '280', 'Efectivo', '2022-11-30 16:57:07.716975'),
('b29651', 'IDL6XNA9BQ', 'MJDG-9120', '7cba26e66188', '560', 'Efectivo', '2023-07-23 03:20:38.197253'),
('b333c5', 'JRKTN4W91V', 'KYHI-7852', '7cba26e66188', '3360', 'Tarjeta', '2022-11-30 17:01:08.414077'),
('b9296c', '8XEQ1GHIWS', 'CAUJ-8147', '7cba26e66188', '231', 'EFECTIVO', '2022-11-30 18:30:41.988069'),
('bd88e0', 'RJH8YG7ZL4', 'EIQZ-4057', '7cba26e66188', '3360', 'Efectivo', '2022-11-30 17:20:00.971197'),
('c81d2e', 'WERGFCXZSR', 'AEHM-0653', '06549ea58afd', '8', 'Efectivo', '2022-11-30 05:08:22.391933'),
('e46e29', 'QMCGSNER3T', 'ONSY-2465', '57b7541814ed', '12', 'Efectivo', '2022-11-30 05:08:26.080481'),
('ea28d9', 'SVDR4GY2WQ', 'DWPU-6783', '7d6c1bbdafd4', '231', 'EFECTIVO', '2022-12-01 01:34:13.454793'),
('fe32bb', 'I17BKLTE39', 'MAKE-2574', '7cba26e66188', '31080', 'Efectivo', '2022-11-30 17:02:13.762692');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_products`
--

CREATE TABLE `rpos_products` (
  `prod_id` varchar(200) NOT NULL,
  `prod_code` varchar(200) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_img` varchar(200) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rpos_products`
--

INSERT INTO `rpos_products` (`prod_id`, `prod_code`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `created_at`) VALUES
('2b976e49a0', 'CEWV-9438', 'mangu triple golpe\r\n', 'mangu.jpg', 'un mangu con salami queso y huevo dela mejor calidad', '100', '2023-07-30 19:19:00.478956'),
('2fdec9bdfb', 'UJAK-9614', 'Chorizo criollo con Patacones\r\n', 'choriso.jpg', 'Deliciosa carne criolla chorizada de cerdo de la mejor calidad y sabor con patacones.', '100', '2023-07-30 19:19:10.579318'),
('3adfdee116', 'HIPF-5346', 'Quipes\r\n', 'quipes.jpg', 'Un quipe de trigo con pollo o queso o carne molida.', '100', '2023-07-30 19:19:19.615786'),
('4e68e0dd49', 'QLKW-0914', 'La Bandera\r\n', 'la bandera.jpg', 'Arros habichuela y pollo guisado con concon un clasico de la familia .', '250', '2023-07-30 19:19:34.614911'),
('5d66c79953', 'GOEW-9248', 'Pollo guisado\r\n', 'pollo guisado.jpg', 'Pollo guisado\r\n', '250\r\n', '2023-07-30 19:19:42.792143'),
('826e6f687f', 'AYFW-2683', 'Arroz Con clara de Huevo\r\n', 'huevo.jpg', 'Arroz blanco Con clara de Huevo. \r\n', '250\r\n', '2023-07-30 19:19:52.128150'),
('97972e8d63', 'CVWJ-6492', 'Canasta de platano:\r\n', 'canasca.jpg', 'Las canastitas de plátanos son plátanos verdes fritos preparados como vasitos que pueden contener cualquier cosa, desde carnes hasta verduras.', '\r\n400', '2023-07-30 19:20:01.064629'),
('a419f2ef1c', 'EPNX-3728', '\r\nGaseosa\r\n', 'cocaola.jpg', '\r\nGaseosa cocala sprite o fanta\r\n', '35\r\n', '2023-07-30 19:20:11.068167'),
('a5931158fe', 'ELQN-5204', 'Carne de Cerdo', 'cerdo.jpg', 'Carne de cerdo a la barbecue.', '250', '2023-07-30 19:20:19.181615'),
('b2f9c250fd', 'XNWR-2768', 'pescado con Tostones', 'pezcado.jpg', 'pescado basa con Tostones y limon', '400', '2023-07-30 19:20:27.932479'),
('bd200ef837', 'HEIY-6034', 'Sancocho\r\n\r\n', 'sancocho.jpg', 'Sancocho el bueno\r\n\r\n', '100\r\n', '2023-07-30 19:20:36.997487'),
('d57cd89073', 'ZGQW-9480', 'Bistec frito Criollo', 'country_fried_stk.jpg', 'Bisteck de pollo Frito Light, con condimentos y salsas especiales.', '300', '2023-07-30 19:20:45.469445'),
('d9aed17627', 'FIKD-9703', 'pica pollo\r\n', 'pica-pollo-con-papa-frita.jpg', 'pica pollo, pollo frito que puede ser de varias piesas como de 2 o 3 o 5 o 8y traer papas o fritos\r\n', '300', '2023-07-30 19:20:58.692984'),
('e2195f8190', 'HKCR-2178', 'Agua\r\n', 'monte carmelo.jpg', 'Agua.\r\n', '25', '2023-07-30 19:21:09.195588'),
('e2af35d095', 'IDLC-7819', 'Jugo Natural \r\n', 'chinola.jpg', 'Jugo Natural \r\n', '60', '2023-07-30 19:21:17.741263'),
('e769e274a3', 'AHRW-3894', 'helado\r\n', 'helado.jpg', 'helado de varios sabores \r\n', '40', '2023-07-30 19:21:25.722579'),
('ec18c5a4f0', 'PQFV-7049', 'Bollito', 'bollitos.jpg', 'Bollito de yuca o papas', '100', '2023-07-30 19:21:32.963689'),
('f4ce3927bf', 'EAHD-1980', 'Arepas', 'arepas.jpg', 'Arepas', '100', '2023-07-30 19:21:40.714573'),
('f9c2770a32', 'YXLA-2603', 'batida de limon con avena', 'limon.jpg', 'batida de limon con avena', '40', '2023-07-30 19:21:47.321903');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rpos_staff`
--

CREATE TABLE `rpos_staff` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_password` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rpos_staff`
--

INSERT INTO `rpos_staff` (`staff_id`, `staff_name`, `staff_number`, `staff_email`, `staff_password`, `created_at`) VALUES
(2, 'Steve jamesley Marcelin', 'QEUY-9042', 'steven elmaduro@gmail.ccon', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', '2023-07-28 02:46:54.225978'),
(3, 'John Alvarez', 'DJAB-1234', 'John elmaduro@gmail.ccon', '12345678', '2023-07-30 19:01:14.457367'),
(4, 'john', 'KVPX-9537', 'arconnerro@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', '2023-07-30 19:28:34.016661');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `available` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`, `capacity`, `available`, `active`) VALUES
(1, 'MESA 1', '5', 1, 1),
(2, 'MESA 2', '5', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cliente_id`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`reservacion_id`);

--
-- Indices de la tabla `rpos_admin`
--
ALTER TABLE `rpos_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indices de la tabla `rpos_customers`
--
ALTER TABLE `rpos_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indices de la tabla `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `CustomerOrder` (`customer_id`),
  ADD KEY `ProductOrder` (`prod_id`),
  ADD KEY `TableOrder` (`table_id`);

--
-- Indices de la tabla `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indices de la tabla `rpos_payments`
--
ALTER TABLE `rpos_payments`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order` (`order_code`);

--
-- Indices de la tabla `rpos_products`
--
ALTER TABLE `rpos_products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `rpos_staff`
--
ALTER TABLE `rpos_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indices de la tabla `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Cliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `reservacion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rpos_staff`
--
ALTER TABLE `rpos_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rpos_orders`
--
ALTER TABLE `rpos_orders`
  ADD CONSTRAINT `CustomerOrder` FOREIGN KEY (`customer_id`) REFERENCES `rpos_customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ProductOrder` FOREIGN KEY (`prod_id`) REFERENCES `rpos_products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
