-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2021 a las 01:56:29
-- Versión del servidor: 8.0.22
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_diary`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app`
--

CREATE TABLE `app` (
  `idapp` int NOT NULL,
  `nombre_app` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `version` varchar(45) DEFAULT NULL,
  `estado` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idcalificacion` int NOT NULL,
  `usuario_idusuario` int NOT NULL,
  `nota_idnota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `idcomentario` int NOT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `usuario_idusuario` int NOT NULL,
  `nota_idnota` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mis_seguidores`
--

CREATE TABLE `mis_seguidores` (
  `idmis_seguidores` int NOT NULL,
  `usuario_idusuario` int NOT NULL COMMENT 'usuario principal\n',
  `usuario_idusuario1` int NOT NULL COMMENT 'usuarios que son mis seguidores\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `idnota` int NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `contenido` varchar(500) DEFAULT NULL,
  `fecha_publicacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `url_foto` varchar(200) DEFAULT NULL,
  `estado` int DEFAULT NULL COMMENT '0: privado\n1: seguidores\n2: publico\n',
  `usuario_idusuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retrive_password`
--

CREATE TABLE `retrive_password` (
  `idretrive_password` int NOT NULL,
  `pregunta` varchar(250) DEFAULT NULL,
  `respuesta` varchar(45) DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `usuario_idusuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguiendo`
--

CREATE TABLE `seguiendo` (
  `idseguiendo` int NOT NULL,
  `usuario_idusuario` int NOT NULL COMMENT 'Usuario principal\n',
  `usuario_idusuario1` int NOT NULL COMMENT 'usuario secundario que se sigue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `url_foto` varchar(500) DEFAULT NULL,
  `estado` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`idapp`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idcalificacion`),
  ADD KEY `fk_calificacion_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_calificacion_nota1_idx` (`nota_idnota`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idcomentario`),
  ADD KEY `fk_comentario_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_comentario_nota1_idx` (`nota_idnota`);

--
-- Indices de la tabla `mis_seguidores`
--
ALTER TABLE `mis_seguidores`
  ADD PRIMARY KEY (`idmis_seguidores`),
  ADD KEY `fk_mis_seguidores_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_mis_seguidores_usuario2_idx` (`usuario_idusuario1`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`idnota`),
  ADD KEY `fk_nota_usuario1_idx` (`usuario_idusuario`);

--
-- Indices de la tabla `retrive_password`
--
ALTER TABLE `retrive_password`
  ADD PRIMARY KEY (`idretrive_password`),
  ADD KEY `fk_retrive_password_usuario_idx` (`usuario_idusuario`);

--
-- Indices de la tabla `seguiendo`
--
ALTER TABLE `seguiendo`
  ADD PRIMARY KEY (`idseguiendo`),
  ADD KEY `fk_seguiendo_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `fk_seguiendo_usuario2_idx` (`usuario_idusuario1`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `app`
--
ALTER TABLE `app`
  MODIFY `idapp` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idcalificacion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idcomentario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mis_seguidores`
--
ALTER TABLE `mis_seguidores`
  MODIFY `idmis_seguidores` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `idnota` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `retrive_password`
--
ALTER TABLE `retrive_password`
  MODIFY `idretrive_password` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguiendo`
--
ALTER TABLE `seguiendo`
  MODIFY `idseguiendo` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `fk_calificacion_nota1` FOREIGN KEY (`nota_idnota`) REFERENCES `nota` (`idnota`),
  ADD CONSTRAINT `fk_calificacion_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_nota1` FOREIGN KEY (`nota_idnota`) REFERENCES `nota` (`idnota`),
  ADD CONSTRAINT `fk_comentario_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `mis_seguidores`
--
ALTER TABLE `mis_seguidores`
  ADD CONSTRAINT `fk_mis_seguidores_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `fk_mis_seguidores_usuario2` FOREIGN KEY (`usuario_idusuario1`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `fk_nota_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `retrive_password`
--
ALTER TABLE `retrive_password`
  ADD CONSTRAINT `fk_retrive_password_usuario` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`);

--
-- Filtros para la tabla `seguiendo`
--
ALTER TABLE `seguiendo`
  ADD CONSTRAINT `fk_seguiendo_usuario1` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `fk_seguiendo_usuario2` FOREIGN KEY (`usuario_idusuario1`) REFERENCES `usuario` (`idusuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
