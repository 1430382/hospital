-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2017 a las 02:26:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idArticulo` int(11) NOT NULL,
  `nombreArticulo` varchar(30) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `precio_compra` decimal(10,2) DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  `idtipo` int(11) DEFAULT NULL,
  `bodega` varchar(45) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `nombreArticulo`, `cantidad`, `fecha_ingreso`, `precio_compra`, `precio_venta`, `idtipo`, `bodega`, `idusuario`) VALUES
(1, 'Producto 1', 1, '2015-10-10', '2.00', '1.00', 1, 'Bodega 1', 1),
(2, 'Producto 2', 5, '2017-08-29', '150.00', '200.00', 1, 'bodega 2', 8),
(3, 'Produc', 5, '0000-00-00', '150.00', '200.00', 1, 'Bodega 1', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoarticulo`
--

CREATE TABLE `tipoarticulo` (
  `idTipo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoarticulo`
--

INSERT INTO `tipoarticulo` (`idTipo`, `nombre`) VALUES
(1, 'Ropa de mujer'),
(2, 'Ropa de hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `pass` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `direccion`, `telefono`, `email`, `usuario`, `pass`) VALUES
(1, 'lola', 'lmkllj', '312-58-78', 'usuario1@gmail.com', 'us', '123'),
(2, 'carlos', 'calle juarez', '312-58-84', 'correo@correo', 'usu', '1234'),
(3, 'Manuel', 'calle juarez', '312-87-36', '1430073@UPV.EDU.MX', 'manuel', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Maria', 'calle juarez', '312-58-84', '1430098@upv.edu.mx', 'maria', '4af8b9ea85fd07a53aa9e5081ac7d81796ffcfacfb3c657825264c456ff5dbd446a521d5e2a63b4653c72d1aef2f012b08e2e9f87d2d165add94285aaeaa36e9'),
(5, 'kljk', 'jjj', 'klj', 'correo@correo', 'jk', '98af07c36d37986cdcce6f27874a96c8830dd74fdfc970ba35401d632f076b7e35d210951cc3783787e5d02fcc10d0b31ed7c2daf093c7cc82539ff1295da2d5'),
(6, 'MHJKH', 'NJKJKKJ', 'KJHJKH', '1430279@upv.edu.mx', 'HHHH', '$2y$10$9s3gMASM1ifyONwnnWMu4eqBWPdTeEg3MocR5Vh8hlO9tkxqM/.Qu'),
(7, 'Emirly', 'calle calle', '312-87-68', '1430621@upv.edu.mx', 'emirly', '$2y$10$CyxH49.yVRL7uJwmtUhXBOWE47fXdgtKZb43S6GWlgw7FwlZjUiqC'),
(8, 'rtyuio', 'rtyui', 'tyuio', 'correo@correo', 'root', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785'),
(9, 'Adrian', 'avenida siempre viva', '311-58-97', 'adrian@upv.edu.mx', 'adrian', 'a1b909ec1cc11cce40c28d3640eab600e582f833');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idtipo` (`idtipo`);

--
-- Indices de la tabla `tipoarticulo`
--
ALTER TABLE `tipoarticulo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipoarticulo`
--
ALTER TABLE `tipoarticulo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`idtipo`) REFERENCES `tipoarticulo` (`idTipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
