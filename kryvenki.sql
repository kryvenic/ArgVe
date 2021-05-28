-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2020 a las 23:09:47
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kryvenki`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_descripcion`) VALUES
(1, 'Programacion'),
(2, 'Diseño'),
(3, 'Idiomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `curso_id` int(11) NOT NULL,
  `curso_nombre` varchar(30) NOT NULL,
  `curso_descripcion` varchar(600) NOT NULL,
  `curso_precio` decimal(10,2) NOT NULL,
  `curso_imagen` text NOT NULL,
  `curso_estado` int(1) NOT NULL,
  `curso_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`curso_id`, `curso_nombre`, `curso_descripcion`, `curso_precio`, `curso_imagen`, `curso_estado`, `curso_categoria`) VALUES
(1, 'Java ', 'Java es uno de los lenguajes de programación más utilizados a nivel mundial, de hecho uno de los principales beneficios de desarrollar en Java es que grandes empresas como Google, Amazon, Uber, empresas financieras o de banca lo prefieren por lo seguro, portable y mantenible que es. Así que aprender Java aumenta tus posibilidades de encontrar trabajo.', '800.00', 'java-icon.png', 1, 1),
(2, 'Python', 'Lenguaje de programación de alto nivel y de propósito general, caracterizado por la exigencia de uso de la indentación como forma de estructura del código lo que logra una mejor lectura del mismo. Muy usado actualmente para ciencia de datos y machine learning.', '1200.00', 'python-icon.png', 0, 1),
(3, 'Ruby', 'Aprende lo esencial de Ruby, el lenguaje ideal para empezar a programar que muchas startups usan como base de sus plataformas. Conoce el entorno de desarrollo y las bases del lenguaje. Domina la programación orientada a objetos y empieza a abrir puertas en el mundo profesional.', '950.00', 'ruby-47-1175102.png', 0, 1),
(4, 'Javascript', 'Conoce los conceptos clave del lenguaje de programación que se está comiendo al mundo. Aprende qué es una variable, una función, un objeto y dónde se guardan esos valores. Descubre qué es Scope y cómo se utilizan los loops. Obtén las herramientas para saber cómo tomar decisiones y validar acciones. ', '1000.00', 'png-transparent-javascript-logo-comment-html-markup-language-analitycs-angle-text-rectangle.png', 0, 1),
(5, 'React.js', 'React es una de las librerías más utilizadas hoy para crear aplicaciones web. Aprende a través de la creación de la interfaz de una aplicacion ejemplo todo lo que necesitas para crear increíbles componentes con React', '800.00', 'descarga.png', 1, 1),
(6, 'Ingles', 'Con este curso teórico-práctico obtendrás las bases para dominar el idioma usado en la mayoría de los países. Incluye autoevaluaciones. ', '1500.00', 'unnamed.png', 0, 3),
(7, 'Italiano básico', 'Benvenuto! Parli italiano? Aquí aprenderás a hablar italiano fácil y rápido. ', '1400.00', 'icon.png', 1, 3),
(8, 'Adobe Photoshop ', 'Crea una imagen para instagram en la que muestres alguna ciudad. Utiliza las principales herramientas de Photoshop: usa las capas de ajuste, crea formas con rellenos y degradados e incluye textos que puedes modificar a tu gusto.', '600.00', 'Adobe-Photoshop-icon.png', 1, 2),
(9, 'Adobe Premiere Pro', 'Crea el material promocional de una pastelería utilizando fragmentos de video, música y diálogo. Coloriza, ajusta el sonido, haz una pieza perfecta con un look maravilloso para tu cliente.', '1000.00', '3087de3a36b76b94e9178fd791d7886e-premiere-pro-pr-colored-icon-by-vexels.png', 0, 2),
(11, 'Portugués', '¡Aprendé una de las lenguas oficiales del Mercosur! Método para saber cómo aprender fácilmente el vocabulario, las expresiones prácticas y la pronunciación correcta para hablar portugués.', '600.00', 'imagen-32.png', 0, 3),
(12, 'After Effects', 'Comprende conceptos de animación y de motion graphics aplicados al lenguaje audiovisual. Integra videos, imágenes, interactúa con Adobe Bridge y crea simulaciones 3D. Utiliza expresiones, máscaras y crea composiciones que te diferencien en el mundo laboral.', '1250.00', 'aftereffefcts.jpg', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_venta`, `id_producto`, `detalle_cantidad`, `detalle_precio`) VALUES
(1, 1, 2, '800'),
(2, 9, 1, '1000'),
(2, 2, 1, '1200'),
(3, 7, 1, '1400'),
(4, 4, 1, '1000'),
(5, 9, 1, '1000'),
(5, 11, 1, '600'),
(5, 6, 1, '1500'),
(5, 8, 1, '600'),
(5, 3, 1, '950'),
(6, 7, 1, '1400'),
(6, 4, 1, '1000'),
(7, 7, 1, '1400');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id_mensaje` int(11) NOT NULL,
  `nombre` varchar(24) NOT NULL,
  `mail` varchar(35) NOT NULL,
  `asunto` varchar(38) NOT NULL,
  `consulta` text NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id_mensaje`, `nombre`, `mail`, `asunto`, `consulta`, `estado`) VALUES
(1, 'Patricia', 'patriciar@gmail.com', 'Cursos de Ofimatica', 'Buenas, quisiera saber si agregarán cursos de Ofimatica, desde ya muchas gracias. Saludos', 0),
(2, 'Martin', 'martincout15lv@gmail.com', 'Profesor', 'Buenas, me ofrezco para dictar un curso en su equipo de trabajo, me encargaría de enseñar las cases de C# y C++ para desarrollo de Videojuegos. Quedo a la espera de una respuesta por parte del team ArgVe. \r\n\r\nSaludos.-', 1),
(3, 'Agustin', 'aguscrack@hotmail.com', 'Cursos Online', 'Quisiera adquirir la suscripcion PLUS cuando tengan listo los cursos online, por favor comunicarme cuando esté disponible. Gracias', 0),
(4, 'Patricia', 'patriciar@gmail.com', 'Cursos Online', 'quiero el plus', 0),
(5, 'Martin', 'martincout15lv@gmail.com', 'Suscripciones', 'Buenas tardes, me gustaría saber para cuando estará implementado el sistema de enseñanza online y si se podrán descargar los cursos también. Desde ya, muchas gracias.', 1),
(6, 'Lucia', 'luciasalazar@gmail.com', 'Ofrecimiento', 'Hola staff de ArgVE, me comunico con ustedes para ofrecerme como profesora de los próximos cursos onlines a inaugurar en el sitio. Podría dictar el curso de Programación Web Completo utilizando herramientas como Codeigniter, Bootstrap, HTML, CSS y PHP, entre otros más. Cuento con amplia experiencia en el campo de la programación y la enseñanza. \r\nSin más, los saludo atte.\r\nLic. Lucia Salazar.-', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `perfil_descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil_descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `mail`, `password`, `perfil_id`, `estado`) VALUES
(8, 'Nicolas', 'Kryvenki', 'nicolaskry@hotmail.com', 'MTIzNDU2Nzg=', 1, 1),
(9, 'Patricia', 'Rotta', 'patriciar@gmail.com', 'cGF0cmljaWE2OQ==', 2, 1),
(10, 'Martin', 'Coutinho', 'martincout15lv@gmail.com', 'MTIzNDU2Nzg=', 2, 1),
(11, 'Agustin', 'Caceres', 'aguscrack@hotmail.com', 'MTIzNDU2Nzg=', 2, 1),
(12, 'Martin', 'Iranzo', 'iranzo@yahoo.com', 'MTIzNDU2Nzg=', 2, 0),
(13, 'Lucia', 'Salazar', 'luciasalazar@gmail.com', 'c2FsYXphcjEyMzQ=', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `venta_id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `venta_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`venta_id`, `id_cliente`, `venta_fecha`) VALUES
(1, 10, '2020-06-17'),
(2, 10, '2020-06-17'),
(3, 11, '2020-06-17'),
(4, 11, '2020-06-17'),
(5, 12, '2020-06-17'),
(6, 9, '2020-06-19'),
(7, 13, '2020-06-23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`curso_id`),
  ADD KEY `curso_categoria` (`curso_categoria`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`venta_id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `curso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id_mensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `venta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`curso_categoria`) REFERENCES `categoria` (`categoria_id`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`venta_id`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `curso` (`curso_id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id_perfil`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
