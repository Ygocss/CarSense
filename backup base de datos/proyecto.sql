-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 05:37:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `rol` int(1) NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `eliminado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `rol`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(1, 'marty', 'mcfly', 'Martymcfly@mail.com', 'b56d64d2624dab5207a1f24f76f8d2ef', 1, 'fondo3.webp', '3889ea9ad668f1b3ff803f0ce08a3c7b.webp', 1, 0),
(2, 'andres', 'c', 'andres@mail.com', 'f70a50b47e0f2c5a597cb779a3febf50', 1, 'fondo1.webp', '5a26933784d0ea2a4aa9a5677da2c112.webp', 1, 0),
(3, 'armando', 'misterio', 'armando@mail.com', 'a88d56d75eb71f7e187e73aed94626f6', 1, '5.jpg', '715109aaa22a8d38fa6830aabd9b6ed5.jpg', 1, 0),
(4, 'javier', 'N', 'javier@mail.com', '6142a88d730b9aa48eed872142467129', 1, '7.jpg', '23571bbab5a79ac00cef36cea259dafb.jpg', 1, 0),
(5, 'juan', 'c', 'juan@mail.com', 'f5737d25829e95b9c234b7fa06af8736', 0, '', '', 1, 1),
(6, 'juan', 'c', 'juan@mail.com', 'f5737d25829e95b9c234b7fa06af8736', 0, '', '', 1, 1),
(7, 'juan', 'c', 'juan@mail.com', 'f5737d25829e95b9c234b7fa06af8736', 0, '', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `archivo` varchar(64) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre`, `archivo`, `status`, `eliminado`) VALUES
(1, '1', '5a5fca2fe2fb43e01ac498810a02368b.jpeg', 1, 0),
(2, '2', '09e7433e4c77dffb534e6461a4c42b93.jpg', 1, 0),
(3, '3', '88bb5f4170bc54f9235392d1d527247d.jpeg', 1, 1),
(4, '4', '7242b0502f7b0ccab527dbe092c3a439.jpg', 1, 1),
(5, '5', 'eeb81dc50bcfb5c1c47e0b15be5b9f03.jpeg', 1, 0),
(6, '6', '10fde5595477cd42270467895a1f59b8.jpeg', 1, 1),
(7, '7', '23571bbab5a79ac00cef36cea259dafb.jpg', 1, 1),
(8, '9', '0abc5ab5f28e765937aad160dff19201.jpeg', 1, 1),
(9, '10', 'c6a0cfb199a47b30c23d8c549eff79ce.jpg', 1, 0),
(10, '11', '6aabfc14116696ce9544607c3128f591.jpg', 1, 0),
(11, '12', '2c644afa5b7aca082e4234ee0cc2574a.jpg', 1, 0),
(12, '15', '57948582e7c5edee1fa45cadcb06ee13.jpg', 1, 0),
(13, '18', 'e0d41b5fb44adc58875bfde409fd1b21.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellidos` varchar(128) NOT NULL,
  `correo` varchar(128) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `correo`, `pass`, `status`, `eliminado`) VALUES
(1, 'juan', 'c', 'juan@mail.com', 'f5737d25829e95b9c234b7fa06af8736', 1, 0),
(2, 'pedro', 'Perez', 'andres@mail.com', 'd3ce9efea6244baa7bf718f12dd0c331', 1, 0),
(3, 'juan', 'c', 'juan1@mail.com', 'f5737d25829e95b9c234b7fa06af8736', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `descripcion` text NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `codigo` varchar(32) NOT NULL,
  `costo` double NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `archivo_n` varchar(255) NOT NULL,
  `archivo` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `codigo`, `costo`, `stock`, `descripcion`, `archivo_n`, `archivo`, `status`, `eliminado`) VALUES
(1, 'Bujia', '01', 0, 0, 'La bujía es el elemento que produce el encendido de la mezcla de combustible y oxígeno en los cilindros, mediante una chispa, en un motor de combustión interna de encendido provocado, tanto alternativo de ciclo Otto como el tipo Wankel', '2b907901d54e5067d3e0525d9ef52c93.png', '2b907901d54e5067d3e0525d9ef52c93.png', 1, 0),
(2, 'Engrane', '0', 0, 0, 'El engranaje o sistema de dirección permite el control de las ruedas directrices (delanteras).', 'configuraciones.png', 'd08de26a903a5b6409b172e54a89b3dc.png', 1, 0),
(3, 'Llantas', '02', 0, 0, 'La llanta es una de las partes que forma la rueda del coche. Es la pieza externa que cubre al rin, esta hecha principalmente de caucho.\r\n', 'llantas.png', 'c3a2e6e63d8f5c4b159fd13d8088293f.png', 1, 0),
(4, 'Turbo', '03', 0, 0, 'Es un sistema de sobrealimentación que comprime el aire, posibilitando que el motor reciba más oxígeno para realizar la mezcla con el combustible. ', 'turbo.png', '6b3cb5da28c5355fa69e9cd599da2512.png', 1, 0),
(5, 'Suspension', '04', 0, 0, 'La suspensión es el sistema que conecta el chasis del vehículo con las ruedas. Este sistema es el responsable de brindarte viajes en auto suaves y estables, pues se encarga de absorber (lo más posible) las irregularidades del camino. ', 'suspension.png', '1fc4a5bb694d9806e8bd9527711c6473.png', 1, 0),
(6, 'Luces Vehiculares', '05', 0, 0, 'Direccionales, indican el momento y hacia dónde dará vuelta el vehículo.\r\nIntermitentes, cuando el vehículo se encuentra sin movimiento o bajó la velocidad repentinamente.\r\nCuartos, también sirven para iluminar las cuatro esquinas del auto para ser visto en la oscuridad.', 'lampara-de-cabeza.png', 'c6da81e867af79a10af2815aa12268a1.png', 1, 0),
(7, 'Bomba de agua', '06', 1, 1, 'La bomba de agua forma parte del sistema de refrigeración y es la encargada de transportar el calor sobrante del motor al exterior.\r\npor tanto, asegurar una circulación constante del refrigerante y hacer posible que el sistema de refrigeración pueda mantener el equilibro térmico del motor.', 'bomba-de-agua.png', '04d2011556f568997b919063b0d9882a.png', 1, 0),
(8, 'Deposito de agua', '07', 1, 1, 'Este depósito se encarga de recoger el vapor del líquido refrigerante y condensarlo, cuando, por el efecto de la temperatura del motor, el líquido alcanza una cierta presión y se evapora. Al enfriarse el motor, el líquido refrigerante se contrae, disminuyendo su volumen.', 'deposito-de-agua.png', 'e03f330791b852b35b2166e7eedc05f4.png', 1, 0),
(9, 'Motor', '08', 3, 3, 'El motor de combustión interna consta de cilindros, pistones, inyectores de combustible y bujías. Combinados, estos componentes queman combustible y dejan salir los gases de escape de los cilindros. Al repetir el proceso, crea energía que impulsa el automóvil.', 'motor3.png', '22dfd62a7e2b161d2312b4c5237b97e9.png', 1, 0),
(10, 'Acumulador o Bateria', '09', 5, 5, 'Esta tiene como finalidad principal aportar la energía necesaria para encender la marcha del motor; pero también, se encarga de proporcionar la corriente para que funcionen otros equipos eléctricos del coche, como lo son los vidrios, la luz de los faros, la consola, el tablero, etc.', 'acumulador.png', 'f361e146acd2850f9f60414185eb84d5.png', 1, 0),
(11, 'Asientos ', '11', 6, 6, 'se denomina asiento al lugar donde reposa el conductor o los pasajeros. Los asientos de un coche son una pieza clave que influye directamente en la percepción de confort de los pasajeros en el coche.', 'asientos-de-carro.png', '3430f3f724f9e0a7a140db43dc307cab.png', 1, 0),
(12, 'Matricula o placa', '12', 7, 7, 'La matricula o placa tiene que ser única e irrepetible en cada auto y las letras y números varían dependiendo cada país.', 'matricula.png', '02f8fce97b24cadd45854042328358b3.png', 1, 0),
(13, 'Retrovisor', '13', 8, 8, 'Los espejos retrovisores son dispositivos que permiten visualizar los vehículos, objetos y personas que están detrás del coche, para evitar el peligro que significa mirar hacia atrás o hacia los lados girando la cabeza o el cuerpo.', 'espejo.png', 'ae75421c986f26417c4e2e4a7d7ed957.png', 1, 0),
(14, 'Volante', '14', 9, 9, 'Es la parte del vehículo mediante el cual, el conductor, controla y transmite el movimiento de dirección a las ruedas.', 'piezas-de-automovil.png', '71e9ca9c1e9662b6e9c0c055d6fb61d7.png', 1, 0),
(15, 'Polea', '15', 10, 10, 'Una polea de rueda libre es la conexión mecánica entre el alternador y la polea del cigüeñal de salida del motor. La polea acciona el alternador que permite recargar la batería. La Polea libre de alternador (OAP), denominada también polea de rueda libre, es una pieza de recambio del alternador.', 'polea.png', '8a9d52c9c00cb1ef78767c1c7a1a80dc.png', 1, 0),
(16, 'mivo', '24', 222, 2, 'mivo', 'mivo1.png', '7d8a9b4b261f22db64d153db7a5c1b4b.png', 1, 1),
(17, 'Radiador', '016', 0, 0, 'Un radiador es el componente clave del sistema de enfriamiento del motor. Su función principal es dispersar una mezcla de anticongelante y agua a lo largo de sus aletas, lo que libera parte del calor del motor mientras toma aire frío antes de continuar pasando el resto del motor.', 'radiador.png', '6f46ef62ed0774c18688b5ad0d18538e.png', 1, 0),
(18, 'Bobina', '16', 0, 0, 'Una bobina, también conocida como inductor, es una parte del circuito eléctrico que tiene una función pasiva. De hecho, su cometido principal es la de almacenar energía a través de la inducción para que esta se convierta en un campo magnético. La bobina se diferencia de otros elementos porque tiene un hilo de cobre.', 'bobina.png', 'a1f3986d790cc75c4f064790fb0391e7.png', 1, 0),
(19, 'Ventilador', '17', 0, 0, 'El sistema de ventilación proporciona un flujo de aire eficiente y optimiza el intercambio de calor con el radiador. Normalmente se encuentra en la parte delantera del vehículo, delante o detrás del radiador.', 'ventilador.png', '6f46ef62ed0774c18688b5ad0d18538e.png', 1, 0),
(20, 'Balatas', '18', 0, 0, 'Balatas es el nombre que también se le da a las pastillas de freno. Éstas tienen el objetivo de generar fricción con el disco de frenado de los neumáticos y es importante brindarles atención ya que se deben reemplazar con regularidad.', 'balatas.png', '4d34b177e66b6ca3309582621ade531c.png', 1, 0),
(21, 'Disco', '19', 0, 0, 'Los discos de freno son unos dispositivos empleados en los coches para reducir la velocidad de las ruedas y detener el vehículo. La reducción de velocidad se produce como consecuencia de la fricción entre las pastillas de freno y el disco, cuando lo atrapan al pisar el pedal.', 'disco-del-freno.png', '44475d2d7178b7f2f92749c9c853387b.png', 1, 0),
(22, 'Banda ', '20', 0, 0, 'La banda de motor es una correa de transmisión que se utiliza para transmitir potencia desde el cigüeñal del motor hacia otros componentes importantes, como el alternador, la bomba de agua, el compresor del aire acondicionado y la dirección asistida.', 'banda.jpg', 'd341d3264dd7430de28145b9ea24af6f.jpg', 1, 0),
(23, 'Condensador', '21', 0, 0, 'El condensador es un intercambiador de calor. Se encuentra en la parte delantera del vehículo. El condensador enfría el refrigerante (calentado por el compresor), que se convierte en un líquido (condensación) al transferir su calor al flujo de aire ambiente que pasa a través del mismo.', 'condensador.png', 'facd6344ca2f885bf4ab4a2243fa5b65.png', 1, 0),
(24, 'Piston', '22', 0, 0, 'El pistón también conocido como émbolo, forma parte del motor, y consiste en una pieza que se mueve de forma alternativa dentro de un cilindro y que interactúa con un fluido.', 'piston.png', '61c54d929ee6da3dd397eeb2e1efc0f8.png', 1, 0),
(25, 'Cigueñal', '23', 0, 0, 'Su función principal es transformar el movimiento lineal de los pistones en un movimiento circular. El cigüeñal está unido a las bielas y, estas a su vez a los pistones que se mueven por el proceso de combustión. También recibe otros nombres como cigüeñal, árbol de manivelas o eje motor.', 'ciguenal.png', '7b9815cc57b3ba685ceed98a72785dd8.png', 1, 0),
(26, 'Arbol de levas', '24', 0, 0, 'La función del árbol de levas es abrir y cerrar las válvulas de admisión y escape de la culata, por lo que controla el llenado y vaciado de los cilindros.', 'que-es-arbol-de-levas.jpg', '35c12e5581e2daa00edc178b0d859bc6.jpg', 1, 0),
(27, 'Biela', '25', 0, 24, 'La biela tiene forma de barra y dispone de articulaciones en ambos extremos. Es aquella pieza que conecta el cigüeñal con el pistón con el fin de transmitirle movimiento similar al que hacemos al pedalear una bicicleta. \r\n\r\nEsta pieza ha de soportar grandes fuerzas de tracción y compresión. De ahí que su diseño y elaboración sean tan importantes para su correcto funcionamiento, sobre todo teniendo en cuenta que está ubicada en una zona donde la lubricación es complicada.', 'biela.jpeg', '99fb5ab6657e32e6f8a2c4b87001c68a.jpeg', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
