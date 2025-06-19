-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2025 a las 22:57:56
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
-- Base de datos: `bd_perez_bruno`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion_categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion_categoria`) VALUES
(1, 'Café'),
(2, 'Té'),
(3, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id_consulta` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `nombre_consulta` varchar(50) NOT NULL,
  `mail_consulta` varchar(50) NOT NULL,
  `asunto_consulta` varchar(50) NOT NULL,
  `consulta` text NOT NULL,
  `respondido` int(11) NOT NULL,
  `fecha_consulta` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consulta`
--

INSERT INTO `consulta` (`id_consulta`, `usuario_id`, `nombre_consulta`, `mail_consulta`, `asunto_consulta`, `consulta`, `respondido`, `fecha_consulta`) VALUES
(7, NULL, 'Bruno Pérez', 'brunoperez@gmail.com', 'Prueba', 'Mensaje de prueba usuario visitante', 1, '2025-06-12'),
(8, 9, 'Bruno Pérez', 'brunoperez@gmail.com', 'Prueba', 'Mensaje de prueba usuario registrado', 0, '2025-06-12'),
(9, NULL, 'Paula Pérez', 'pualaperez@hotmail.com', 'Prueba', 'Prueba de consulta usuario no registrado', 1, '2025-06-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_venta`, `venta_id`, `producto_id`, `detalle_cantidad`, `detalle_precio`) VALUES
(13, 16, 5, 1, 25000.00),
(14, 16, 15, 1, 15000.00),
(15, 16, 10, 1, 20000.00),
(16, 17, 15, 1, 15000.00),
(17, 17, 16, 1, 15000.00),
(18, 17, 17, 1, 15000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_pago`
--

CREATE TABLE `medio_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medio_pago`
--

INSERT INTO `medio_pago` (`id`, `nombre`) VALUES
(1, 'Débito'),
(2, 'Crédito'),
(3, 'Mercado Pago'),
(4, 'Transferencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `descripción_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripción_perfil`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(150) NOT NULL,
  `descripcion_producto` varchar(200) NOT NULL,
  `imagen_producto` varchar(100) NOT NULL,
  `categoria_producto` int(11) NOT NULL,
  `precio_producto` float NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `estado_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion_producto`, `imagen_producto`, `categoria_producto`, `precio_producto`, `stock_producto`, `estado_producto`) VALUES
(5, 'Café Colombia', 'Café de origen Colombiano', '1749128684_8308cdb4693518e2122c.jpg', 1, 25000, 90, 1),
(6, 'Café Nicaragua', 'Café de origen Guatemalteco', '1749129126_2af24d2745a162f6c798.jpg', 1, 25000, 99, 1),
(10, 'Vaso térmico ', 'Vaso térmico de 500ml', '1749565683_f10e848fb7bc913be654.jpg', 3, 20000, 49, 1),
(11, 'Café Costa Rica', 'Café de origen Costarricense ', '1749959278_98cc06921152be88a973.jpg', 1, 25000, 100, 1),
(15, 'Té de Arándanos', 'Té de sabor arándano ', '1749960742_d6e81a32c91710f91a3c.png', 2, 15000, 99, 1),
(16, 'Té de Menta', 'Té de sabor menta', '1749960790_5e98f6ed68c9cbc4ff10.png', 2, 15000, 99, 1),
(17, 'Té de Limón', 'Té de sabor limón', '1749960838_1a1cca5ba7236d99a638.png', 2, 15000, 99, 1),
(18, 'Remera \"Neighbourhood\"', 'Remera de algodón', '1750364500_495b47f8cff3c3423f3d.jpg', 3, 15000, 50, 1),
(19, 'Paraguas \"Neighbourhood\"', 'Paraguas plástico  ', '1750365247_32babc35337311d89012.jpg', 3, 25000, 50, 0),
(20, 'Gorra \"Neighbourhood\"', 'Gorra de algodón bordada ', '1750365499_6360aab1d2ccfacd0dd4.jpg', 3, 10000, 50, 1),
(21, 'Tote Bag \"Neighbourhood\"', 'Tote Bag de lino ', '1750365544_3a347895b9f27914e3a6.jpg', 3, 18000, 25, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellido_usuario` varchar(50) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña_usuario` varchar(300) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `estado_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `usuario`, `contraseña_usuario`, `perfil_id`, `estado_usuario`) VALUES
(8, 'Bruno', 'Pérez', 'Admin', '$2y$10$u3csxPp/dk4Ub0dpUGHYVubD1RNUFeLz/HS3aSrJPYZoSIzSowxNy', 1, 1),
(9, 'Bruno', 'Pérez', 'brunoperez', '$2y$10$SGkq/NztvujS0Ig8l7iGp.Phkt.ljK8KPcnskWCvUaruxJWp4gJry', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fecha_venta` date NOT NULL,
  `dni_cliente` varchar(20) NOT NULL,
  `domicilio_cliente` varchar(300) NOT NULL,
  `celular_cliente` varchar(20) NOT NULL,
  `medio_pago_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `cliente_id`, `fecha_venta`, `dni_cliente`, `domicilio_cliente`, `celular_cliente`, `medio_pago_id`) VALUES
(16, 9, '2025-06-19', '99123456', 'Avenida 9 de Julio 1449', '1231231234', 2),
(17, 9, '2025-06-19', '99123456', 'Avenida 9 de Julio 1449', '1231231234', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id_consulta`),
  ADD KEY `fk_consulta_usuario` (`usuario_id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `venta_id` (`venta_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `medio_pago`
--
ALTER TABLE `medio_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `categoría_producto` (`categoria_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `medio_pago_id` (`medio_pago_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `medio_pago`
--
ALTER TABLE `medio_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `fk_consulta_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`) ON DELETE SET NULL;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id_venta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoria_producto`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`medio_pago_id`) REFERENCES `medio_pago` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
