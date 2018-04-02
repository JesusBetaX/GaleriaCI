--
-- Base de datos: `galeria`
--

DROP DATABASE IF EXISTS galeria_ci;
CREATE DATABASE galeria_ci;
USE galeria_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE categoria (
  id int(11) NOT NULL,
  nombre varchar(44) UNIQUE NOT NULL,
  slug varchar(44) UNIQUE NOT NULL
);

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `slug`) VALUES
(1, 'Paisajes', 'paisajes'),
(2, 'Animales', 'animales'),
(3, 'Automoviles', 'automoviles'),
(4, 'Figuras 3D', 'figuras-3d'),
(5, 'Espacio', 'espacio'),
(6, 'Mujeres Famosas', 'mujeres-famosas'),
(9, 'Peliculas', 'peliculas'),
(10, 'Celulares', 'celulares'),
(11, 'Computación', 'computacion'),
(12, 'Programación', 'programacion'),
(13, 'Nalgas Peludas', 'nalgas-peludas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE imagen (
  id int(11) NOT NULL,
  titulo varchar(44) UNIQUE NOT NULL,
  slug varchar(44) UNIQUE NOT NULL,
  imagen varchar(50) NOT NULL,
  categoria_id int(11) NOT NULL
);

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `titulo`, `slug`, `imagen`, `categoria_id`) VALUES
(1, 'IOS', 'ios', 'e2bbf753f03a10a91d86e326a70ff1de.jpg', 10),
(2, 'Batman vs Superman', 'batman-vs-superman', 'ab7cd04092cd836d41210252201b1a1d.jpg', 9),
(3, 'Rio', 'rio', 'ea2c9fe79fc3574e088cc8eb3581d381.jpg', 1),
(4, 'windows 8', 'windows-8', '0b9b286e84bf97957bc40d0b3844ca42.jpg', 11),
(5, 'Kylo ren', 'kylo-ren', '0451b1add16845f42461a52dc0991b1b.jpg', 9),
(6, 'Bosque', 'bosque', '5e0c6d212503ebe8d6f034619f90e674.jpg', 1),
(7, 'Toro', 'toro', '22da29a3c3ffb013881ad7dfef75c42d.jpg', 2),
(8, 'León', 'leon', 'd47b96db03b523e5e3c5df1e54132be4.jpg', 2),
(9, 'Pedorro', 'pedorro', 'c6a20c79b85d21a9682bf92f99d20dea.jpg', 13),
(10, 'Ja', 'ja', '7ed0d8be93f98c6b3f7f540d097be6ce.jpg', 13),
(11, 'Ghp', 'ghp', '8d8400b89d3f243d30879460faed3825.jpg', 13),
(12, 'GH', 'gh', '5c8b6e20c2aaf4ebb2e9776665979d7f.jpg', 13),
(13, 'Ogi', 'ogi', 'b2a7d06183851041d2edf03fc2420af1.jpg', 13),
(14, 'Og', 'og', '25398af4c84bfc4c1e03348e0c124ff4.jpg', 13),
(15, 'Ao', 'ao', '67687c927c88239ebe359f0bcac8b8dd.jpg', 13),
(16, 'Nataliay', 'nataliay', '4c2b8645085ea46519f34678c9a6e1df.jpg', 6),
(17, 'Natalia', 'natalia', 'df645518e1e03a42db73540aa5c35768.jpg', 6),
(18, 'Nat', 'nat', '1b534b5892acbeedb0af0b23675198ca.jpg', 6),
(19, 'Gatito', 'gatito', '0eb32dd349fd8a5c8c86f21e51f0a4af.jpg', 2),
(20, 'Oscuridad', 'oscuridad', '93aeb0144654fa6714a8e63869d8918a.jpg', 1),
(21, 'Programando', 'programando', '6675d26dc9e775036d2b5faf7c077d70.gif', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE usuario (
  id int(11) NOT NULL,
  email varchar(40) UNIQUE NOT NULL,
  password varchar(80) NOT NULL,
  nombre varchar(50) NOT NULL
);

--
-- Volcado de datos para la tabla `usuarios`
--

--
-- 7c4a8d09ca3762af61e59520943dc26494f8941b = 123456
--
INSERT INTO `usuario` (`id`, `email`, `password`, `nombre`) VALUES
(1, 'admin@example.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ROOT');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE categoria
  ADD PRIMARY KEY (id);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE imagen
  ADD PRIMARY KEY (id);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE usuario
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
