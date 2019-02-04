
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-06:00";

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE `devices` (
    `id_device` int(11) NOT NULL,
    `name` varchar(50) NOT NULL,
    `ip` varchar(20) NOT NULL,
    `port` varchar(25) NOT NULL,
    `ch` int(10) NOT NULL,
    `user` varchar(50) NOT NULL,
    `password` varchar(50) NOT NULL,
    `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `devices`
--

INSERT INTO `devices` (`id_device`, `name`, `ip`, `port`, `ch`, `user`, `password`, `id_usuario`) VALUES
(1, 'fam', '200.10.55.10', '8080','4', 'admin', '1234', 1);


--
-- Estructura de tabla para la tabla `estado_usuario`
CREATE TABLE `estado_usuario` (
    `id_estado_usuario` int(11) NOT NULL,
    `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
INSERT INTO `estado_usuario` (`id_estado_usuario`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo'),
(3, 'Eliminado');

--
-- Estructura de tabla para la tabla `tipo_usuario`
CREATE TABLE `tipo_usuario` (
    `id_tipo_usuario` int(11) NOT NULL,
    `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Demo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE `usuarios` (
    `id_usuario` int(11) NOT NULL,
    `usuario` varchar(30) NOT NULL,
    `passwd_hash` varchar(80) NOT NULL,
    `nombre` varchar(50) NOT NULL,
    `email` varchar(80) NOT NULL,
    `last_session` datetime DEFAULT NULL,
    `activacion` int(11) NOT NULL DEFAULT '0',
    `token` varchar(40) NOT NULL,
    `token_passwd` varchar(100) DEFAULT NULL,
    `passwd_request` int(11) DEFAULT '0',
    `id_tipo_usuario` int(11) NOT NULL,
    `id_estado_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
INSERT INTO `usuarios` (`id_usuario`, `usuario`, `passwd_hash`, `nombre`, `email`, `last_session`, `activacion`, `token`, `token_passwd`, `password_request`, `id_tipo_usuario`, `id_estado_usuario`) VALUES
(1, 'Admin', '$2y$10$aQwRPolQX1FGWwbTtyBd/uAPnR6j0f8uW3u4XHLOCIwvMwMagW5ZS', 'Administrador', 'info@tecnicoacr.com', '2018-12-22 23:45:15', 1, '2451943d7bfd9c3c7379947f12c57b46', '', 1, 1,1);


-- Índices para tablas volcadas

--
-- Indices de la tabla `devices`
ALTER TABLE `devices`
    ADD PRIMARY KEY (`id_device`);

--
-- Indices de la tabla `estado_usuario`
ALTER TABLE `estado_usuario`
    ADD PRIMARY KEY (`id_estado_usuario`);

--
-- Indices de la tabla `tipo_usuario`
ALTER TABLE `tipo_usuario`
    ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`id_usuario`);


-- AUTO_INCREMENT de las tablas volcadas

--
-- AUTO_INCREMENT de la tabla `devices`
ALTER TABLE `devices`
    MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `estado_usuario`
ALTER TABLE `estado_usuario`
    MODIFY `id_estado_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
ALTER TABLE `tipo_usuario`
    MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
ALTER TABLE `usuarios`
    MODIFY `id_usuario_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
    COMMIT;
