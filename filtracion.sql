

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: `filtracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `sueldo` decimal(10,2) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`id`, `nombre`, `apellido`, `email`, `telefono`, `sueldo`, `fecha_ingreso`) VALUES
(1, 'Luis', 'Fonsi', 'luisfonsi@gmail.com', '435', '5000000.00', '2023-06-10'),
(2, 'Agustin', 'Perez', 'agustinperez@gmail.com', '321', '900000.00', '2023-06-15'),
(3, 'Brisa', 'Diaz', 'brisadiaz@gmail.com', '574', '860000.00', '2023-07-20'),
(4, 'Tamara', 'Fernandez', 'tamarafernandez@gmail.com', '800', '220000.00', '2023-07-30'),
(5, 'Lucas', 'Aleman', 'lucas@gmail.com', '783', '5800000.00', '2023-08-05'),
(6, 'Alex', 'Gomez', 'alex@gmail.com', '842', '420000.00', '2023-08-12'),
(7, 'Carlos', 'Soler', 'carlossoler@gmail.com', '45215', '7800000.00', '2023-08-13'),
(8, 'Paula', 'Tevez', 'paulatevez@gmail.com', '85212', '1100000.00', '2023-08-25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;


