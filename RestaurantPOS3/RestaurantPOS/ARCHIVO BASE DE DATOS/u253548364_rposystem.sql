-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-12-2022 a las 11:36:26
-- Versión del servidor: 10.6.11-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u253548364_rposystem`
--

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
('10e0b6dc958adfb5b094d8935a13aeadbe783c25', 'DEYVIN AGUASVIVAS', 'DeyvinAguasvivas', '7c222fb2927d828af22f592134e8932480637c0d');

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
('7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '8294710387', 'fender2301@gmail.com', '1f82ea75c5cc526729e2d581aeb3aeccfef4407e', '2022-11-30 18:13:06.119121');

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
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rpos_orders`
--

INSERT INTO `rpos_orders` (`order_id`, `order_code`, `customer_id`, `customer_name`, `prod_id`, `prod_name`, `prod_price`, `prod_qty`, `order_status`, `created_at`) VALUES
('11837e4fba', 'EIQZ-4057', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '2b976e49a0', 'Hamburguesa con queso', '280', '12', 'Paid', '2022-11-30 17:20:00.974191'),
('23eade9d7c', 'PLDO-9345', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '97972e8d63', 'Café irlandés', '80', '111', 'Paid', '2022-11-30 16:55:30.553273'),
('29bf91106d', 'MAKE-2574', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '2b976e49a0', 'Hamburguesa con queso', '280', '111', 'Paid', '2022-11-30 17:02:13.764995'),
('338635eeac', 'YWFA-3901', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '2b976e49a0', 'Hamburguesa con queso', '280', '1', 'PAGADO', '2022-11-30 16:47:37.041389'),
('342d2753e1', 'SHYI-2746', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '2b976e49a0', 'Hamburguesa con queso', '280', '123', '', '2022-12-04 21:02:02.267634'),
('4aa50779d1', 'NQYG-5308', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '2fdec9bdfb', 'Jambalaya', '342', '12', 'Paid', '2022-11-30 17:10:27.864677'),
('5de3d72f81', 'KYHI-7852', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '2b976e49a0', 'Hamburguesa con queso', '280', '12', 'Paid', '2022-11-30 17:01:08.415668'),
('71b71e5267', 'CAUJ-8147', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', 'f9c2770a32', 'Milk Shake Mixta', '231', '1', 'Paid', '2022-11-30 18:30:41.989623'),
('7f35bc5617', 'IBER-4529', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '2b976e49a0', 'Hamburguesa con queso', '280', '4', '', '2022-11-30 17:31:42.994119'),
('7fab13b49d', 'BZGV-0415', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '2b976e49a0', 'Hamburguesa con queso', '280', '1111', 'Paid', '2022-11-30 17:31:06.663895'),
('82b400ce77', 'LPVZ-4701', '7cba26e66188', 'Deyvin Joel Aguasvivas Baldera', '97972e8d63', 'Café irlandés', '80', '100', 'Paid', '2022-11-30 17:06:39.615143');

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
('1babd2', 'CRH56WLU1Q', 'PLDO-9345', '7cba26e66188', '8880', 'Efectivo', '2022-11-30 16:57:01.766695'),
('4423d7', 'QWERT0YUZ1', 'JFMB-0731', '35135b319ce3', '11', 'Tarjeta', '2022-11-30 05:09:08.215735'),
('442865', '146XLFSC9V', 'INHG-0875', '9c7fcc067bda', '10', 'Tarjeta', '2022-11-30 05:08:38.217505'),
('6032c3', '9LSJYVIQ72', 'BZGV-0415', '7cba26e66188', '311080', 'Efectivo', '2022-11-30 17:31:06.662207'),
('65891b', 'MF2TVJA1PY', 'ZPXD-6951', 'e711dcc579d9', '16', 'Efectivo', '2022-11-30 05:08:03.647003'),
('75ae21', '1QIKVO69SA', 'IUSP-9453', 'fe6bb69bdd29', '10', 'Efectivo', '2022-11-30 05:08:06.831900'),
('7e1989', 'KLTF3YZHJP', 'QOEH-8613', '29c759d624f9', '9', 'Efectivo', '2022-11-30 05:08:08.689065'),
('968488', '5E31DQ2NCG', 'COXP-6018', '7c8f2100d552', '22', 'Efectivo', '2022-11-30 05:08:16.962723'),
('984539', 'LSBNK1WRFU', 'FNAB-9142', '35135b319ce3', '18', 'Tarjeta', '2022-11-30 05:08:34.411908'),
('9fcee7', 'AZSUNOKEI7', 'OTEV-8532', '3859d26cd9a5', '15', 'Efectivo', '2022-11-30 05:08:20.846589'),
('aaca16', '6LUZARKW28', 'YWFA-3901', '7cba26e66188', '280', 'Efectivo', '2022-11-30 16:57:07.716975'),
('b333c5', 'JRKTN4W91V', 'KYHI-7852', '7cba26e66188', '3360', 'Tarjeta', '2022-11-30 17:01:08.414077'),
('b9296c', '8XEQ1GHIWS', 'CAUJ-8147', '7cba26e66188', '231', 'EFECTIVO', '2022-11-30 18:30:41.988069'),
('bd88e0', 'RJH8YG7ZL4', 'EIQZ-4057', '7cba26e66188', '3360', 'Efectivo', '2022-11-30 17:20:00.971197'),
('c81d2e', 'WERGFCXZSR', 'AEHM-0653', '06549ea58afd', '8', 'Efectivo', '2022-11-30 05:08:22.391933'),
('e46e29', 'QMCGSNER3T', 'ONSY-2465', '57b7541814ed', '12', 'Efectivo', '2022-11-30 05:08:26.080481'),
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
('2b976e49a0', 'CEWV-9438', 'Hamburguesa con queso', 'cheeseburgers.jpg', 'Deliciosa hamburguesa con queso.', '280', '2022-11-30 06:28:56.180008'),
('2fdec9bdfb', 'UJAK-9614', 'Jambalaya', 'Jambalaya.jpg', 'Delicioso plato de arroz criollo y cajún americano de influencia francesa, africana y española, que consiste principalmente en carne y verduras mezcladas con arroz.', '342', '2022-11-30 06:28:23.969289'),
('3adfdee116', 'HIPF-5346', 'Enchiladas', 'enchiladas.jpg', 'Una enchilada es una tortilla de maíz enrollada alrededor de un relleno y cubierta con una sabrosa salsa.', '410', '2022-11-30 06:27:59.705589'),
('4e68e0dd49', 'QLKW-0914', 'Macchiato de caramelo', '', 'Leche al vapor, café expreso y caramelo; qué podría ser más ', '100', '2022-11-30 06:27:46.016448'),
('5d66c79953', 'GOEW-9248', 'Cuajada de queso', 'cheesecurd.jpg', 'La cuajada de queso es un trozo húmedo de leche cuajada que se come solo o como tentempié.', '190', '2022-11-30 06:27:28.182296'),
('826e6f687f', 'AYFW-2683', 'Pizza Margherita', 'margherita-pizza0.jpg', 'Pizza Margherita de Naples, crujiente y delciosa.', '980', '2022-11-30 06:26:41.288130'),
('97972e8d63', 'CVWJ-6492', 'Café irlandés', 'irishcoffee.jpg', 'Café Irlandes con toque de dominicano.', '80', '2022-11-30 06:26:07.329330'),
('a419f2ef1c', 'EPNX-3728', 'Nugget de pollo', 'chicnuggets.jpeg', 'Nuggets de pollo mejores que los de Kentucky', '350', '2022-11-30 06:25:41.323319'),
('a5931158fe', 'ELQN-5204', 'Carne de Cerdo', 'pulledprk.jpeg', 'Carne de cerdo a la barbecue.', '1130', '2022-11-30 06:25:21.464100'),
('b2f9c250fd', 'XNWR-2768', 'Tarta de fresas y ruibarbo', 'rhuharbpie.jpg', 'Pie de Fresas.', '100', '2022-11-30 06:25:10.776946'),
('bd200ef837', 'HEIY-6034', 'Café turco', 'turkshcoffee.jpg', 'Café Turco.', '110', '2022-11-30 06:24:45.132625'),
('d57cd89073', 'ZGQW-9480', 'Bistec frito Criollo', 'country_fried_stk.jpg', 'Bisteck de pollo Frito Light, con condimentos y salsas especiales.', '645', '2022-11-30 06:24:24.624428'),
('d9aed17627', 'FIKD-9703', 'Pastel De Jaiba', 'crabcakes.jpg', 'Pastelón de Jaiba.', '322', '2022-11-30 06:23:51.431273'),
('e2195f8190', 'HKCR-2178', 'Carbonara', 'carbonaraimgre.jpg', 'Pasta Italiana Carbonara.', '200', '2022-11-30 06:23:39.703679'),
('e2af35d095', 'IDLC-7819', 'Pizza De Pepperoni', 'peperopizza.jpg', 'Pizza de Pepperoni triple queso.', '840', '2022-11-30 06:23:27.573525'),
('e769e274a3', 'AHRW-3894', 'Frappuccino', 'frappuccino.jpg', 'Nuestro Frappuccino tiene de una base de café o crema, mezclada con hielo e ingredientes como jarabes aromatizados.', '85', '2022-11-30 06:22:03.285609'),
('ec18c5a4f0', 'PQFV-7049', 'Corn Dogs', 'corndog.jpg', 'Un corn dog es una salchicha en un palo que ha sido recubierta con una gruesa capa de harina de maíz rebozada y frita. Es originario de Estados Unidos y se encuentra habitualmente en la cocina americana', '120', '2022-11-30 06:21:18.842713'),
('f4ce3927bf', 'EAHD-1980', 'Hot Dog', 'hotdog0.jpg', 'Hot Dog hecho con salchicha italiana.', '60', '2022-11-30 06:20:52.354564'),
('f9c2770a32', 'YXLA-2603', 'Milk Shake Mixta', '', 'Batida de Leche Mixta, con lo que usted deseé. ', '231', '2022-11-30 18:22:02.141663');

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
(2, 'Chef Junior Ortiz', 'QEUY-9042', 'JuniorOrtiz', 'a346bc80408d9b2a5063fd1bddb20e2d5586ec30', '2022-11-30 17:45:55.760891'),
(3, 'DEYVIN AGUASVIVAS', 'DJAB-1234', 'DeyvinAguasvivas', 'a9522e54c81a2b6058365dac919d1fa18dd54d9d', '2022-11-30 17:52:15.973223');

--
-- Índices para tablas volcadas
--

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
  ADD KEY `ProductOrder` (`prod_id`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rpos_pass_resets`
--
ALTER TABLE `rpos_pass_resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rpos_staff`
--
ALTER TABLE `rpos_staff`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
