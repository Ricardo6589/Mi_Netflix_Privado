-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2023 a las 17:09:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_netflix_ricardo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carteleras`
--

CREATE TABLE `carteleras` (
  `id` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carteleras`
--

INSERT INTO `carteleras` (`id`, `titulo`, `descripcion`, `img`) VALUES
(6, 'Avatar 2', 'aliens azules', '03-37-38-16-01-23-avatar.webp'),
(7, 'Increibles 2', 'hola', '03-40-32-16-01-23-increibles.jpeg'),
(8, 'Uncharted', 'hola', '03-41-34-16-01-23-uncharted.jpg'),
(11, 'Estampida', 'one piece', '04-03-23-16-01-23-one_piece.jpg'),
(12, 'Fullmetal_Alchemist', 'top 2 animes que ha visto Pablo', '04-04-45-16-01-23-Fullmetal_Alchemist.jpg'),
(13, 'Kimetsu', 'respiraciones', '04-06-09-16-01-23-kimetsu.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_carteleras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id`, `id_usuarios`, `id_carteleras`) VALUES
(1, 1, 6),
(2, 17, 6),
(3, 18, 6),
(4, 19, 6),
(6, 1, 11),
(7, 17, 11),
(8, 18, 11),
(9, 19, 11),
(10, 1, 12),
(11, 1, 13),
(12, 17, 13),
(13, 18, 13),
(14, 19, 13),
(15, 1, 7),
(16, 17, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo` enum('admin','cliente') NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `dni` char(9) NOT NULL,
  `telefono` char(9) NOT NULL,
  `validacion` enum('sí','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo`, `nombre`, `apellido`, `correo`, `password`, `dni`, `telefono`, `validacion`) VALUES
(1, 'admin', 'Ricardo', 'Durán', 'durangallego1@gmail.com', 'a4284fcca64b9e88cb8ac8bf139ef04e9d5bf7df54ccabc1e0e7806c6c00d77b', '49813243G', '644151250', 'sí'),
(17, 'cliente', 'Pablo', 'González', 'pablo@gmail.com', 'a4284fcca64b9e88cb8ac8bf139ef04e9d5bf7df54ccabc1e0e7806c6c00d77b', '47313843E', '644151250', 'sí'),
(18, 'cliente', 'Carlos', 'Giraldo', 'carlos@gmail.com', 'a4284fcca64b9e88cb8ac8bf139ef04e9d5bf7df54ccabc1e0e7806c6c00d77b', '49813243G', '644151250', 'sí'),
(19, 'cliente', 'Sergi', 'Garcia', 'sergi@gmail.com', 'a4284fcca64b9e88cb8ac8bf139ef04e9d5bf7df54ccabc1e0e7806c6c00d77b', '49813243G', '644151250', 'sí');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carteleras`
--
ALTER TABLE `carteleras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carteleras` (`id_carteleras`),
  ADD KEY `id_usuarios` (`id_usuarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carteleras`
--
ALTER TABLE `carteleras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_carteleras`) REFERENCES `carteleras` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
