-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2018 a las 13:14:39
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gamecenter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacioncontenido`
--

CREATE TABLE `calificacioncontenido` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(32) NOT NULL COMMENT 'Nombre de la calificación',
  `Imagen` varchar(64) NOT NULL COMMENT 'Imagen de la calificación\n',
  `Descripcion` varchar(128) NOT NULL COMMENT 'Descripción de la calificación\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Posibles calificaciones de PEGI obtenidas por los juegos para las distintas edades';

--
-- Volcado de datos para la tabla `calificacioncontenido`
--

INSERT INTO `calificacioncontenido` (`id`, `Nombre`, `Imagen`, `Descripcion`) VALUES
(1, 'Lenguaje soez', '', 'En este juego se podrá encontrar lenguaje soez, por lo que no es indicado que lo jueguen menores de edad'),
(2, 'Discriminación', '', 'En este videojuego se encontrarán escenas en las que se discrimine a un grupo de personas o al propio protagonista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacionedad`
--

CREATE TABLE `calificacionedad` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(32) NOT NULL COMMENT 'Nombre de la calificación',
  `Imagen` varchar(64) NOT NULL COMMENT 'Imagen de la calificación\n',
  `Descripcion` varchar(128) NOT NULL COMMENT 'Descripción de la calificación\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Posibles calificaciones de PEGI obtenidas por los juegos para las distintas edades';

--
-- Volcado de datos para la tabla `calificacionedad`
--

INSERT INTO `calificacionedad` (`id`, `Nombre`, `Imagen`, `Descripcion`) VALUES
(1, 'PEGI 3', '', 'Este juego puede jugarlo las personas que tengan 3 o más años'),
(2, 'PEGI 7', '', 'Este juego puede jugarlo las personas que tengan 7 o más años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compannia`
--

CREATE TABLE `compannia` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(64) NOT NULL COMMENT 'Nombre de la compañia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Nombre de las compañias productoras de plataformas';

--
-- Volcado de datos para la tabla `compannia`
--

INSERT INTO `compannia` (`id`, `Nombre`) VALUES
(1, 'Sony'),
(2, 'Microsoft');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(64) NOT NULL COMMENT 'Nombre del genero',
  `Descripcion` varchar(64) NOT NULL COMMENT 'Descripción del contenido del genero'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Generos de videojuegos';

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `Nombre`, `Descripcion`) VALUES
(1, 'Acción', 'Consiste en eliminar enemigos. El contenido va a ser violento'),
(2, 'Aventura', 'Consiste en recoger objetos de valor. Juegos de larga duración'),
(3, 'Aventura gráfica', 'El jugador puede interactuar con el escenario y los personajes d'),
(4, 'Espionaje', 'Lo importante es pasar inadvertido a los enemigos'),
(5, 'FREE', 'El jugador tiene una gran libertad en sus movimientos y acciones'),
(6, 'Cartas', 'Son los juegos de cartas de toda la vida, como el Solitario'),
(7, 'Combate de cartas', 'En este, el jugador intenta eliminar los puntos de vida del cont'),
(8, 'Acción con cartas', 'Los naipes sirven para seleccionar las acciones a realizar'),
(9, 'Conducción', 'Conducción de vehículos. Suelen consistir en torneos y campeonat'),
(10, 'Formula 1', 'Conducción de un Formula 1'),
(11, 'Karts', 'Conducción de karts'),
(12, 'Motociclismo', 'Conducción de motocicletas'),
(13, 'Construcción', 'El objetivo es construir una estructura, mantenerla y gestionarl'),
(14, 'Cooperación', 'Es necesaria la cooperación con otros personajes'),
(15, 'Cyberpunk', 'Combinación de ciencia ficción futurista con sociedades distópic'),
(16, 'Baloncesto', 'Simulación de partidos de baloncesto. Puede incluir modo carrera'),
(17, 'Deportes olímpicos', 'Replican las pruebas realizadas en las olimpiadas'),
(18, 'Fútbol', 'Simulación de partidos de fútbol. Puede incluir modo carrera'),
(19, 'Golf', 'Simulación de partidos de golf. Puede incluir modo carrera'),
(20, 'Tennis', 'Simulación de partidos de tennis. Puede incluir modos carrera'),
(21, 'Matamarcianos', 'Se dispara proyectiles para destruir naves o criaturas enemigas'),
(22, 'FPS', 'Solo es visible el arma. Su objetivo es disparar contra los enem'),
(23, 'Idiomas', 'Su objetivo es ayudar al aprendizaje de idiomas'),
(24, 'Estrategia en tiempo real', 'Se utilizan tropas para invadir el terreno del enemigo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id` int(11) NOT NULL COMMENT 'Identificador unico del juego',
  `Titulo` varchar(64) NOT NULL COMMENT 'Nombre del juego',
  `Annio` int(11) NOT NULL COMMENT 'Año de publicación',
  `ValoracionMedia` float NOT NULL DEFAULT '0' COMMENT 'Media de todas las valoraciones de los usuarios',
  `Descripcion` varchar(512) DEFAULT NULL COMMENT 'Pequeña descripción del juego',
  `Genero_id` int(11) NOT NULL,
  `CalificacionEdad_id` int(11) NOT NULL,
  `Productora_id` int(11) NOT NULL,
  `Imagen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla con la información de los juegos';

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id`, `Titulo`, `Annio`, `ValoracionMedia`, `Descripcion`, `Genero_id`, `CalificacionEdad_id`, `Productora_id`, `Imagen`) VALUES
(1, 'Monkey Island', 1990, 0, 'Este videojuego trata sobre las locas aventuras de Guybrush Threepwood', 3, 2, 2, ''),
(2, 'Rayman 2', 2002, 0, 'La mascota de Ubisoft vuelve a las andadas, y esta vez en una aventura 3D', 2, 2, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegocalificacioncontenido`
--

CREATE TABLE `juegocalificacioncontenido` (
  `Juego_id` int(11) NOT NULL,
  `CalificacionContenido_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juegocalificacioncontenido`
--

INSERT INTO `juegocalificacioncontenido` (`Juego_id`, `CalificacionContenido_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nick`
--

CREATE TABLE `nick` (
  `id` int(11) NOT NULL,
  `Nick` varchar(64) DEFAULT NULL COMMENT 'Pseudonimo del usuario',
  `Usuario_id` int(11) NOT NULL,
  `Juego_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que relaciona los nobres utilizados en el juego por cada usuario';

--
-- Volcado de datos para la tabla `nick`
--

INSERT INTO `nick` (`id`, `Nick`, `Usuario_id`, `Juego_id`) VALUES
(1, 'RaymanLover64', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(64) NOT NULL COMMENT 'Nombre de la plataforma',
  `Compannia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Conjunto de plataformas en las que se pueden sacar los juegos\n';

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`id`, `Nombre`, `Compannia_id`) VALUES
(1, 'Playstation 4', 1),
(2, 'Xbox One X', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformajuego`
--

CREATE TABLE `plataformajuego` (
  `Plataforma_id` int(11) NOT NULL,
  `Juego_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataformajuego`
--

INSERT INTO `plataformajuego` (`Plataforma_id`, `Juego_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productora`
--

CREATE TABLE `productora` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(64) NOT NULL COMMENT 'Nombre de la plataforma'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Conjunto de productoras en las que se pueden sacar los juegos\n';

--
-- Volcado de datos para la tabla `productora`
--

INSERT INTO `productora` (`id`, `Nombre`) VALUES
(1, 'Ubisoft España'),
(2, 'Nintendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(64) NOT NULL COMMENT 'Nombre del susuario por el que es conocido',
  `Correo` varchar(128) NOT NULL COMMENT 'Correo electronico de contacto',
  `Contrasennia` varchar(128) NOT NULL COMMENT 'Contraseña del usuario ',
  `Annio` int(11) NOT NULL COMMENT 'Año de naciomiento con el que se calcula la edad',
  `Tipo` int(11) NOT NULL DEFAULT '0' COMMENT 'Tipos de usario:\n	- Usuario normal -> 0\n	- Usuario admin -> 1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla con los datos del usuario';

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Nombre`, `Correo`, `Contrasennia`, `Annio`, `Tipo`) VALUES
(1, 'Pablo Piedad', 'pablo@pablo.com', '1234', 1995, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `Puntuacion` int(11) NOT NULL COMMENT 'Puntuacion otorgada por el usuario',
  `Comentario` varchar(512) DEFAULT NULL COMMENT 'Comentario opcional del usuario',
  `Usuario_id` int(11) NOT NULL,
  `Juego_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Comentarios y puntuaciones otorgadas por los usuarios';

--
-- Volcado de datos para la tabla `valoracion`
--

INSERT INTO `valoracion` (`Puntuacion`, `Comentario`, `Usuario_id`, `Juego_id`) VALUES
(4, 'Es un poco lioso, pero al final es bastante bueno hasta que no he podido llegar más lejos', 1, 1),
(5, 'Este es el mejor juego. Me recordó a mi infancia', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacioncontenido`
--
ALTER TABLE `calificacioncontenido`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificacionedad`
--
ALTER TABLE `calificacionedad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compannia`
--
ALTER TABLE `compannia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Juego_Genero1_idx` (`Genero_id`),
  ADD KEY `fk_Juego_CalificacionEdad1_idx` (`CalificacionEdad_id`),
  ADD KEY `fk_Juego_Productora1_idx` (`Productora_id`);

--
-- Indices de la tabla `juegocalificacioncontenido`
--
ALTER TABLE `juegocalificacioncontenido`
  ADD PRIMARY KEY (`Juego_id`,`CalificacionContenido_id`),
  ADD KEY `fk_JuegoCalificacionContenido_Juego1_idx` (`Juego_id`),
  ADD KEY `fk_JuegoCalificacionContenido_CalificacionContenido1_idx` (`CalificacionContenido_id`);

--
-- Indices de la tabla `nick`
--
ALTER TABLE `nick`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Nick_Usuario1_idx` (`Usuario_id`),
  ADD KEY `fk_Nick_Juego1_idx` (`Juego_id`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Plataforma_Compannia_idx` (`Compannia_id`);

--
-- Indices de la tabla `plataformajuego`
--
ALTER TABLE `plataformajuego`
  ADD PRIMARY KEY (`Plataforma_id`,`Juego_id`),
  ADD KEY `fk_PlataformaJuego_Plataforma1_idx` (`Plataforma_id`),
  ADD KEY `fk_PlataformaJuego_Juego1_idx` (`Juego_id`);

--
-- Indices de la tabla `productora`
--
ALTER TABLE `productora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`Usuario_id`,`Juego_id`),
  ADD KEY `fk_Valoracion_Usuario1_idx` (`Usuario_id`),
  ADD KEY `fk_Valoracion_Juego1_idx` (`Juego_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacioncontenido`
--
ALTER TABLE `calificacioncontenido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `calificacionedad`
--
ALTER TABLE `calificacionedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compannia`
--
ALTER TABLE `compannia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador unico del juego', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `nick`
--
ALTER TABLE `nick`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productora`
--
ALTER TABLE `productora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `fk_Juego_CalificacionEdad1` FOREIGN KEY (`CalificacionEdad_id`) REFERENCES `calificacionedad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Juego_Genero1` FOREIGN KEY (`Genero_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Juego_Productora1` FOREIGN KEY (`Productora_id`) REFERENCES `productora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `juegocalificacioncontenido`
--
ALTER TABLE `juegocalificacioncontenido`
  ADD CONSTRAINT `fk_JuegoCalificacionContenido_CalificacionContenido1` FOREIGN KEY (`CalificacionContenido_id`) REFERENCES `calificacioncontenido` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_JuegoCalificacionContenido_Juego1` FOREIGN KEY (`Juego_id`) REFERENCES `juego` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `nick`
--
ALTER TABLE `nick`
  ADD CONSTRAINT `fk_Nick_Juego1` FOREIGN KEY (`Juego_id`) REFERENCES `juego` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Nick_Usuario1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD CONSTRAINT `fk_Plataforma_Compannia` FOREIGN KEY (`Compannia_id`) REFERENCES `compannia` (`id`);

--
-- Filtros para la tabla `plataformajuego`
--
ALTER TABLE `plataformajuego`
  ADD CONSTRAINT `fk_PlataformaJuego_Juego1` FOREIGN KEY (`Juego_id`) REFERENCES `juego` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PlataformaJuego_Plataforma1` FOREIGN KEY (`Plataforma_id`) REFERENCES `plataforma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `fk_Valoracion_Juego1` FOREIGN KEY (`Juego_id`) REFERENCES `juego` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Valoracion_Usuario1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
