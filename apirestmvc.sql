-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2020 a las 00:39:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apirestmvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `CitaId` int(11) NOT NULL,
  `PacienteId` varchar(45) DEFAULT NULL,
  `Fecha` varchar(45) DEFAULT NULL,
  `HoraInicio` varchar(45) DEFAULT NULL,
  `HoraFIn` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Motivo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`CitaId`, `PacienteId`, `Fecha`, `HoraInicio`, `HoraFIn`, `Estado`, `Motivo`) VALUES
(1, '1', '2020-06-09', '08:30:00', '09:00:00', 'Confirmada', 'El paciente presenta un leve dolor de espalda'),
(2, '2', '2020-06-10', '08:30:00', '09:00:00', 'Confirmada', 'Dolor en la zona lumbar '),
(3, '3', '2020-06-18', '09:00:00', '09:30:00', 'Confirmada', 'Dolor en el cuello');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `PacienteId` int(11) NOT NULL,
  `DNI` varchar(45) DEFAULT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL,
  `CodigoPostal` varchar(45) DEFAULT NULL,
  `Telefono` varchar(45) DEFAULT NULL,
  `Genero` varchar(45) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`PacienteId`, `DNI`, `Nombre`, `Direccion`, `CodigoPostal`, `Telefono`, `Genero`, `FechaNacimiento`, `Correo`, `imagen`) VALUES
(1, '44786190', 'pañales', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(4, 'D000000004', 'Maria Mendez', 'Calle de pruebas 4', '20004', '633281516', 'F', '1980-01-01', 'Paciente4@gmail.com', ''),
(8, '44786190', 'jogrw', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(9, '44786190', 'jogrw', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(10, '44786190', 'jogrw', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(11, '44786190', 'micho', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(12, '44786190', 'micho', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(13, '44786190', 'micho', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(14, '44786190', 'micho', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(15, '44786190', 'micho', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(16, '44786190', 'micho', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(17, '44786190', 'micho', 'av 12 los olivos', '45', '45644', 'masculino', '1996-12-01', 'usuario1@gmail.com', ''),
(19, '44786199', 'gatoconbotas', '', '', '', '', '0000-00-00', 'usuario141@gmail.com', ''),
(20, '233212311231', 'jose ramon', '', '', '', '', '0000-00-00', 'asdsa@gmail.com', 'D:xampphtdocsapirestmacuriViewsAssets5fde87cc40b7e.jpeg'),
(21, '233212311231', 'jose ramon', '', '', '', '', '0000-00-00', 'asdsa@gmail.com', 'D:/xampp/htdocs/apirestmacuri/Views/Assets/5fde88449384b.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Usuario` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Usuario`, `Password`, `Estado`) VALUES
(1, 'usuario1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo'),
(2, 'usuario2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo'),
(3, 'usuario3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo'),
(4, 'usuario4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo'),
(5, 'usuario5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo'),
(6, 'usuario6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Activo'),
(7, 'usuario7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Inactivo'),
(8, 'usuario8@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Inactivo'),
(9, 'usuario9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_token`
--

CREATE TABLE `usuarios_token` (
  `TokenId` int(11) NOT NULL,
  `UsuarioId` varchar(45) DEFAULT NULL,
  `Token` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) CHARACTER SET armscii8 DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_token`
--

INSERT INTO `usuarios_token` (`TokenId`, `UsuarioId`, `Token`, `Estado`, `Fecha`) VALUES
(1, '1', '32d3066825fadca517e4a2b65e39222a', 'Inactivo', '2020-12-18 18:57:00'),
(2, '1', 'c972d87c8434a216ae6a4851e1328a92', 'Inactivo', '2020-12-18 19:00:00'),
(3, '1', 'db4883487e4ff84d880dcdd277f90102', 'Inactivo', '2020-12-18 19:03:00'),
(4, '1', '9dc0a27c8f4e0123e70f48054a8594a5', 'Inactivo', '2020-12-18 19:03:00'),
(5, '1', 'a0a92a530a9ab769e2d7e5d1e4f990a6', 'Inactivo', '2020-12-18 19:03:00'),
(6, '1', '0c2e78746712d4fb982a07da6b46cb21', 'Inactivo', '2020-12-18 19:06:00'),
(7, '1', '5b534b535cc07e865abfa84138d0352e', 'Inactivo', '2020-12-18 19:06:00'),
(8, '1', '413baacab6d66ba16c6f23def2f65a1c', 'Inactivo', '2020-12-18 19:21:00'),
(9, '1', '45af4a6732d851415f97c7f9427b87ae', 'Inactivo', '2020-12-18 19:22:00'),
(10, '1', 'a1bad41d2dd5d745f58d4afbbca214c5', 'Inactivo', '2020-12-18 19:24:00'),
(11, '1', 'ce81e8ef26ca6e2ad748133cbfd7e43e', 'Inactivo', '2020-12-18 19:24:00'),
(12, '1', 'c094187f22cb0cabee73989f01237513', 'Inactivo', '2020-12-18 19:24:00'),
(13, '1', '4ea398fd3acd5e4648eee20926d74928', 'Inactivo', '2020-12-18 19:25:00'),
(14, '1', '059b5ca9d279769d6311183842346733', 'Inactivo', '2020-12-18 19:30:00'),
(15, '1', '6ff5e6cd57555e89a162bde8ad32442a', 'Inactivo', '2020-12-19 20:02:00'),
(16, '1', 'b272a5d21ca3d5777f8536aec2ddca2a', 'Inactivo', '2020-12-20 00:04:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`CitaId`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`PacienteId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- Indices de la tabla `usuarios_token`
--
ALTER TABLE `usuarios_token`
  ADD PRIMARY KEY (`TokenId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `CitaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `PacienteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios_token`
--
ALTER TABLE `usuarios_token`
  MODIFY `TokenId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
