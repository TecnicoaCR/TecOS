/* Author: TecnicoaCR */

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-06:00";

-- Base de datos: `MyCCTV`
-- --------------------------------------------------------
-- Estructura de tabla para la tabla `tipo_usuario`
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcado de datos para la tabla `tipo_usuario`
INSERT INTO `tipo_usuario` (`id_tipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `last_session` datetime DEFAULT NULL,
  `activacion` int(11) NOT NULL DEFAULT '0',
  `token` varchar(40) NOT NULL,
  `token_password` varchar(100) DEFAULT NULL,
  `password_request` int(11) DEFAULT '0',
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Índices para tablas volcadas
--
-- Indices de la tabla `tipo_usuario`
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

-- Indices de la tabla `usuarios`
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

-- AUTO_INCREMENT de las tablas volcadas
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

-- AUTO_INCREMENT de la tabla `usuarios`
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

---------------------------------------------------------
-- Estructura de tabla para la tabla `devices`
CREATE TABLE IF NOT EXISTS `devices` (
  `id_device` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `port` varchar(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Indices de la tabla `devices`
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id_device`);

-- AUTO_INCREMENT de la tabla `devices`
ALTER TABLE `devices`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT;
