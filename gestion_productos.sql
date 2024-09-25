-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2024 a las 04:13:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_productos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abono`
--

CREATE TABLE `abono` (
  `AbonoID` int(11) NOT NULL,
  `FechaAbono` date DEFAULT NULL,
  `ReciboID` int(11) DEFAULT NULL,
  `ValorAbono` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `AdminID` int(11) NOT NULL,
  `NombreUsuario` varchar(255) DEFAULT NULL,
  `ApellidosUsuario` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`AdminID`, `NombreUsuario`, `ApellidosUsuario`, `Email`, `Telefono`, `Password`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', '305339600', '1234'),
(44005339, 'Admin', 'ADMIN', NULL, NULL, 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `UsuarioID` int(11) NOT NULL,
  `NombreUsuario` varchar(255) DEFAULT NULL,
  `ApellidosUsuario` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telefono` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE `comision` (
  `ComisionID` int(11) NOT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `ValorComision` decimal(10,2) DEFAULT NULL,
  `AcumuladoComision` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`ComisionID`, `UsuarioID`, `ValorComision`, `AcumuladoComision`) VALUES
(1, 1033179802, 0.00, 114501.60),
(3, 71314141, 0.00, 0.00),
(6, 1024567890, 0.00, 0.00),
(7, 1034567891, 0.00, 0.00),
(8, 1045678901, 0.00, 0.00),
(9, 1056789012, 0.00, 0.00),
(10, 1067890123, 0.00, 0.00),
(11, 1078901234, 0.00, 0.00),
(12, 1089012345, 0.00, 0.00),
(13, 1090123456, 0.00, 0.00),
(14, 1101234567, 0.00, 0.00),
(15, 1112345678, 0.00, 0.00),
(16, 1123456789, 0.00, 0.00),
(17, 1134567890, 0.00, 0.00),
(18, 1145678901, 0.00, 0.00),
(19, 1156789012, 0.00, 0.00),
(20, 1167890123, 0.00, 0.00),
(21, 1178901234, 0.00, 0.00),
(22, 1189012345, 0.00, 0.00),
(23, 1190123456, 0.00, 0.00),
(24, 1201234567, 0.00, 0.00),
(25, 1212345678, 0.00, 0.00),
(26, 1223456789, 0.00, 0.00),
(27, 1234567890, 0.00, 0.00),
(28, 1245678901, 0.00, 0.00),
(29, 1256789012, 0.00, 0.00),
(30, 1267890123, 0.00, 0.00),
(31, 1278901234, 0.00, 0.00),
(32, 1289012345, 0.00, 0.00),
(33, 1290123456, 0.00, 0.00),
(34, 1301234567, 0.00, 0.00),
(35, 1312345678, 0.00, 0.00),
(36, 1323456789, 0.00, 0.00),
(37, 1334567890, 0.00, 0.00),
(38, 1345678901, 0.00, 0.00),
(39, 1356789012, 0.00, 0.00),
(40, 1367890123, 0.00, 0.00),
(41, 1378901234, 0.00, 0.00),
(42, 1389012345, 0.00, 0.00),
(43, 1390123456, 0.00, 0.00),
(44, 1401234567, 0.00, 0.00),
(45, 1412345678, 0.00, 0.00),
(46, 1423456789, 0.00, 0.00),
(47, 1434567890, 0.00, 0.00),
(48, 1445678901, 0.00, 0.00),
(49, 1456789012, 0.00, 0.00),
(50, 1467890123, 0.00, 0.00),
(51, 1478901234, 0.00, 0.00),
(73, 887675543, 0.00, 0.00),
(77, 2147483647, 0.00, 0.00),
(78, 1111111111, 0.00, 0.00),
(79, 445544554, 0.00, 0.00),
(80, 434343565, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisionista`
--

CREATE TABLE `comisionista` (
  `UsuarioID` int(11) NOT NULL,
  `NombreUsuario` varchar(255) DEFAULT NULL,
  `ApellidosUsuario` varchar(255) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `InmuebleID` int(11) DEFAULT NULL,
  `TelefonoUsuario` varchar(255) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `Ciudad` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comisionista`
--

INSERT INTO `comisionista` (`UsuarioID`, `NombreUsuario`, `ApellidosUsuario`, `Edad`, `InmuebleID`, `TelefonoUsuario`, `Correo`, `Direccion`, `Ciudad`, `Password`) VALUES
(71314141, 'Maria José', 'Hernández Hernández', 30, NULL, '309203290', 'sdoisdio@gmail.com', 'sur 0450 #212 23', 'Medellin', '12345'),
(434343565, 'Dolores consectetur', 'Quaerat quam ea fuga', 60, NULL, '1112152949', 'niqaw@mailinator.com', 'Dicta sint reprehen', 'Incididunt magnam do', '434343565'),
(445544554, 'Doloribus sint delec', 'Nostrum rem rerum si', 20, NULL, '7339474362', 'juan_cosoriog@soy.sena.edu.co', 'Soluta alias dolores', 'Vel qui accusantium ', '445544554'),
(887675543, 'Dean Best', 'Molestiae et aut con', 58, NULL, '3954927812', 'osoriojuancamilo315@gmail.com.es', 'Laboris a nihil null', 'Quod non est quo dui', 'vefyqiga'),
(1024567890, 'Andrés', 'Martínez Ramírez', 40, NULL, '3023456789', 'andres.martinez@example.com', 'Calle 80 #30-45', 'Cali', 'password789'),
(1033179802, 'Camilo', 'Osorio García', 19, NULL, '3053396000', 'osoriojuancamilo315@gmail.com.es', 'Calle 34', 'Medellín', '1234'),
(1034567891, 'Laura', 'Hernández Castro', 32, NULL, '3034567890', 'laura.hernandez@example.com', 'Carrera 15 #10-25', 'Barranquilla', 'password012'),
(1045678901, 'Jorge', 'García Sánchez', 37, NULL, '3045678901', 'jorge.garcia@example.com', 'Avenida 5 #12-30', 'Cartagena', 'password345'),
(1056789012, 'Ana', 'Ramírez Díaz', 29, NULL, '3056789012', 'ana.ramirez@example.com', 'Calle 100 #25-40', 'Bucaramanga', 'password678'),
(1067890123, 'Felipe', 'Pérez Fernández', 45, NULL, '3067890123', 'felipe.perez@example.com', 'Carrera 7 #14-50', 'Cúcuta', 'password901'),
(1078901234, 'Sandra', 'Torres Morales', 26, NULL, '3078901234', 'sandra.torres@example.com', 'Calle 20 #18-60', 'Santa Marta', 'password234'),
(1089012345, 'Ricardo', 'López Ruiz', 38, NULL, '3089012345', 'ricardo.lopez@example.com', 'Carrera 40 #16-70', 'Pereira', 'password567'),
(1090123456, 'Luisa', 'Gómez Gutiérrez', 30, NULL, '3090123456', 'luisa.gomez@example.com', 'Avenida 9 #11-80', 'Manizales', 'password890'),
(1101234567, 'Julio', 'Martínez Vega', 42, NULL, '3101234567', 'julio.martinez@example.com', 'Calle 15 #14-25', 'Ibagué', 'password123'),
(1111111111, 'Juan Camilo', 'Osorio Garcia', 44, NULL, '3053396000', 'sdoisdio@gmail.com.co', 'CALLE 34B CR115 A28 INTERIOR 201', 'Medellín', '545454'),
(1112345678, 'Diana', 'Ramírez Ortiz', 27, NULL, '3112345678', 'diana.ramirez@example.com', 'Carrera 11 #20-45', 'Villavicencio', 'password456'),
(1123456789, 'Oscar', 'González Muñoz', 36, NULL, '3123456789', 'oscar.gonzalez@example.com', 'Calle 90 #12-50', 'Armenia', 'password789'),
(1134567890, 'Gloria', 'López Méndez', 33, NULL, '3134567890', 'gloria.lopez@example.com', 'Carrera 50 #17-55', 'Pasto', 'password012'),
(1145678901, 'Manuel', 'Rodríguez Silva', 31, NULL, '3145678901', 'manuel.rodriguez@example.com', 'Calle 8 #22-60', 'Neiva', 'password345'),
(1156789012, 'Carolina', 'Torres Rojas', 39, NULL, '3156789012', 'carolina.torres@example.com', 'Carrera 18 #30-65', 'Montería', 'password678'),
(1167890123, 'Juan', 'Gómez Cruz', 44, NULL, '3167890123', 'juan.gomez@example.com', 'Calle 30 #14-70', 'Popayán', 'password901'),
(1178901234, 'Claudia', 'Pérez González', 35, NULL, '3178901234', 'claudia.perez@example.com', 'Carrera 5 #12-80', 'Tunja', 'password234'),
(1189012345, 'Mario', 'López Rivera', 41, NULL, '3189012345', 'mario.lopez@example.com', 'Avenida 20 #15-85', 'Florencia', 'password567'),
(1190123456, 'Paola', 'Martínez Delgado', 24, NULL, '3190123456', 'paola.martinez@example.com', 'Calle 50 #18-90', 'Valledupar', 'password890'),
(1201234567, 'Alejandro', 'García Guerrero', 46, NULL, '3201234567', 'alejandro.garcia@example.com', 'Carrera 7 #25-95', 'Quibdó', 'password123'),
(1212345678, 'Natalia', 'Ramírez Castillo', 29, NULL, '3212345678', 'natalia.ramirez@example.com', 'Calle 100 #30-20', 'Sincelejo', 'password456'),
(1223456789, 'Hernán', 'Pérez Hernández', 34, NULL, '3223456789', 'hernan.perez@example.com', 'Carrera 12 #22-25', 'Riohacha', 'password789'),
(1234567890, 'Liliana', 'López Maldonado', 38, NULL, '3234567890', 'liliana.lopez@example.com', 'Calle 25 #14-30', 'San Andrés', 'password012'),
(1245678901, 'Camilo', 'Rodríguez Escobar', 27, NULL, '3245678901', 'camilo.rodriguez@example.com', 'Carrera 45 #16-35', 'Leticia', 'password345'),
(1256789012, 'Lorena', 'Gómez Cárdenas', 30, NULL, '3256789012', 'lorena.gomez@example.com', 'Calle 10 #20-40', 'Yopal', 'password678'),
(1267890123, 'Javier', 'Martínez Correa', 42, NULL, '3267890123', 'javier.martinez@example.com', 'Carrera 60 #12-50', 'Arauca', 'password901'),
(1278901234, 'Sofía', 'Hernández Vargas', 28, NULL, '3278901234', 'sofia.hernandez@example.com', 'Calle 70 #18-60', 'Puerto Carreño', 'password234'),
(1289012345, 'Esteban', 'Pérez Mora', 40, NULL, '3289012345', 'esteban.perez@example.com', 'Carrera 9 #25-45', 'Mocoa', 'password567'),
(1290123456, 'Patricia', 'Ramírez Serrano', 33, NULL, '3290123456', 'patricia.ramirez@example.com', 'Calle 15 #12-55', 'Mitú', 'password890'),
(1301234567, 'Rodrigo', 'López Sepúlveda', 45, NULL, '3301234567', 'rodrigo.lopez@example.com', 'Carrera 12 #30-65', 'Inírida', 'password123'),
(1312345678, 'Gabriela', 'Martínez Torres', 31, NULL, '3312345678', 'gabriela.martinez@example.com', 'Calle 100 #22-70', 'San José del Guaviare', 'password456'),
(1323456789, 'Pablo', 'González Rueda', 36, NULL, '3323456789', 'pablo.gonzalez@example.com', 'Carrera 14 #18-80', 'Puerto Inírida', 'password789'),
(1334567890, 'Catalina', 'Rodríguez Mendoza', 25, NULL, '3334567890', 'catalina.rodriguez@example.com', 'Calle 80 #20-90', 'El Carmen de Bolívar', 'password012'),
(1345678901, 'Cristian', 'López Ortiz', 44, NULL, '3345678901', 'cristian.lopez@example.com', 'Carrera 22 #14-100', 'Tierralta', 'password345'),
(1356789012, 'Valeria', 'Pérez Niño', 29, NULL, '3356789012', 'valeria.perez@example.com', 'Calle 60 #25-110', 'Ocaña', 'password678'),
(1367890123, 'Alberto', 'Ramírez Pérez', 39, NULL, '3367890123', 'alberto.ramirez@example.com', 'Carrera 5 #30-120', 'Turbo', 'password901'),
(1378901234, 'Daniela', 'López Sánchez', 32, NULL, '3378901234', 'daniela.lopez@example.com', 'Calle 10 #12-130', 'Zipaquirá', 'password234'),
(1389012345, 'Miguel', 'García Ruiz', 47, NULL, '3389012345', 'miguel.garcia@example.com', 'Carrera 6 #15-140', 'Sabanalarga', 'password567'),
(1390123456, 'Yolanda', 'Martínez Rincón', 26, NULL, '3390123456', 'yolanda.martinez@example.com', 'Calle 100 #20-150', 'Lorica', 'password890'),
(1401234567, 'Francisco', 'Rodríguez Gómez', 41, NULL, '3401234567', 'francisco.rodriguez@example.com', 'Carrera 9 #18-160', 'Barrancabermeja', 'password123'),
(1412345678, 'Camila', 'Hernández Duarte', 34, NULL, '3412345678', 'camila.hernandez@example.com', 'Calle 20 #22-170', 'Tumaco', 'password456'),
(1423456789, 'Edgar', 'González Ortiz', 38, NULL, '3423456789', 'edgar.gonzalez@example.com', 'Carrera 45 #12-180', 'Arjona', 'password789'),
(1434567890, 'Marcela', 'Pérez García', 27, NULL, '3434567890', 'marcela.perez@example.com', 'Calle 15 #14-190', 'Sogamoso', 'password012'),
(1445678901, 'Luis', 'Ramírez Morales', 30, NULL, '3445678901', 'luis.ramirez@example.com', 'Carrera 60 #18-200', 'Girardot', 'password345'),
(1456789012, 'Lorena', 'Gómez Vargas', 43, NULL, '3456789012', 'lorena.gomez@example.com', 'Calle 50 #22-210', 'Chiquinquirá', 'password678'),
(1467890123, 'Diego', 'Martínez Rico', 29, NULL, '3467890123', 'diego.martinez@example.com', 'Carrera 10 #30-220', 'Piedecuesta', 'password901'),
(1478901234, 'Patricia', 'López Rodríguez', 35, NULL, '3478901234', 'patricia.lopez@example.com', 'Calle 8 #12-230', 'Floridablanca', 'password234'),
(2147483647, 'Juan Camilo', 'Osorio Garcia', 23, NULL, '3053396000', 'sdoisdio@gmail.com.co', 'CALLE 34B CR115 A28 INTERIOR 201', 'Medellín', '4553454');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactodistribuidor`
--

CREATE TABLE `contactodistribuidor` (
  `ContactoID` int(11) NOT NULL,
  `DistribuidorID` int(11) DEFAULT NULL,
  `NombreContacto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `TelefonoContacto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `EmailContacto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura_cliente`
--

CREATE TABLE `detalle_factura_cliente` (
  `i_detalle` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregaproducto`
--

CREATE TABLE `entregaproducto` (
  `EntregaID` int(11) NOT NULL,
  `ProductoID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `FechaRecibido` date DEFAULT NULL,
  `EstadoProducto` text DEFAULT NULL,
  `Ubicacion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `FacturaID` int(11) NOT NULL,
  `FechaExpedicion` date DEFAULT NULL,
  `FechaVencimiento` date DEFAULT NULL,
  `InmuebleID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `Valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo`
--

CREATE TABLE `insumo` (
  `InsumoID` int(11) NOT NULL,
  `ProveedorID` int(11) DEFAULT NULL,
  `NombreInsumo` varchar(255) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `InventarioID` int(11) NOT NULL,
  `ProductoID` int(11) DEFAULT NULL,
  `FechaActualizacion` date DEFAULT NULL,
  `StockActual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedadentrega`
--

CREATE TABLE `novedadentrega` (
  `NovedadID` int(11) NOT NULL,
  `EntregaID` int(11) DEFAULT NULL,
  `DescripcionNovedad` text DEFAULT NULL,
  `FechaNovedad` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinionesproducto`
--

CREATE TABLE `opinionesproducto` (
  `OpinionID` int(11) NOT NULL,
  `ProductoID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `Opinion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `PagoID` int(11) NOT NULL,
  `FacturaID` int(11) DEFAULT NULL,
  `FechaPago` date DEFAULT NULL,
  `ValorPago` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ProductoID` int(11) NOT NULL,
  `NombreProducto` varchar(255) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `StockActual` int(11) DEFAULT NULL,
  `StockMinimo` int(11) DEFAULT NULL,
  `StockMaximo` int(11) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `Etiqueta` enum('Nuevo','En promocion') DEFAULT NULL,
  `AdministradorID` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `tamaño` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ProductoID`, `NombreProducto`, `Descripcion`, `Precio`, `StockActual`, `StockMinimo`, `StockMaximo`, `FechaIngreso`, `Etiqueta`, `AdministradorID`, `imagen`, `tamaño`) VALUES
(11, 'Jabon de manos', 'Nuestro detergente líquido limpia a fondo, perfuma y cuida tu ropa. Es fácil de usar y seguro para todo tipo de tejidos.', 25000, NULL, NULL, NULL, NULL, 'Nuevo', NULL, 'jabondemanos.png', '2 galones'),
(12, 'Fabuloso', 'Nuestro fabuloso,con su poderosa fórmula, elimina la grasa y la suciedad con facilidad, dejando las superficies relucientes.', 25000, NULL, NULL, NULL, NULL, 'Nuevo', NULL, 'Fabuloso.png', '2 galones'),
(13, 'Detergente', 'Nuestro detergente líquido deja tu ropa con un aroma fresco y duradero. Aptopara todo tipo de lavadoras y seguro para ropa blanca y de color.', 25000, NULL, NULL, NULL, NULL, 'En promocion', NULL, 'Detergente.png', '2 galones'),
(14, 'Desengrasante', 'Nuestro desengrasante es tu aliado. Ideal para cocinas, baños, garajes y cualquier área que necesite una limpieza profunda.', 25000, NULL, NULL, NULL, NULL, 'Nuevo', NULL, 'Desengrasante.png', '1 galon'),
(15, ' Blanqueador', 'Nuestro blanqueador es tu solución. No esperes más para recuperar el brillo de tus prendas, la solución en tus manos', 30000, NULL, NULL, NULL, NULL, 'En promocion', NULL, 'Blanqueador.png', '2 galones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ProveedorID` int(11) NOT NULL,
  `NombreProveedor` varchar(255) DEFAULT NULL,
  `Telefono` bigint(20) DEFAULT NULL,
  `Direccion` varchar(255) DEFAULT NULL,
  `AdministradorID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ProveedorID`, `NombreProveedor`, `Telefono`, `Direccion`, `AdministradorID`) VALUES
(101234567, 'LimpiaMax S.A.S.', 3123456789, 'Calle 12 #34-56, Bogotá - tunja', 1),
(102345678, 'Higiene Total Ltda', 3012345678, 'Carrera 88 #23-45, Medellín', 1),
(104567890, 'EcoLimpiadores S.A.S.', 3102345678, 'Calle 45 #67-89, Barranquilla', 1),
(106789012, 'Soluciones de Aseo S.A.', 3131234567, 'Avenida 20 #10-40, Bucaramanga', 1),
(107890123, 'LimpiaSeguro S.A.S.', 3142345678, 'Calle 50 #60-70, Manizales', 1),
(108901234, 'BrillaNet Ltda.', 3153456789, 'Carrera 7 #14-25, Cúcuta', 1),
(109012345, 'Limpieza y Desinfección S.A.', 3164567890, 'Calle 30 #40-50, Pereira', 1),
(110123456, 'Aseo Urbano S.A.S.', 3175678901, 'Carrera 12 #34-56, Neiva', 1),
(111234567, 'EcoHigiene Ltda.', 3186789012, 'Calle 8 #23-45, Ibagué', 1),
(112345678, 'Aseadores Profesionales S.A.S.', 3197890123, 'Carrera 15 #20-30, Pasto', 1),
(113456789, 'LimpiaFácil S.A.', 3108901234, 'Calle 45 #10-20, Armenia', 1),
(114567890, 'BrillanTec S.A.S.', 3119012345, 'Carrera 9 #11-22, Villavicencio', 1),
(115678901, 'EcoAseo Ltda.', 3120123456, 'Avenida 20 #10-30, Montería', 1),
(116789012, 'Limpieza Total S.A.', 3131234567, 'Calle 12 #34-45, Tunja', 1),
(117890123, 'Higieniza S.A.S.', 3142345678, 'Carrera 7 #14-25, Popayán', 1),
(118901234, 'BrillaCero Ltda.', 3153456789, 'Avenida 15 #20-30, Santa Marta', 1),
(119012345, 'Limpia Express S.A.S.', 3164567890, 'Calle 50 #60-70, Valledupar', 1),
(120123456, 'Eco Limpieza Ltda.', 3175678901, 'Carrera 8 #23-45, Yopal', 1),
(121234567, 'Higiene Limpio S.A.S.', 3186789012, 'Avenida 15 #10-20, Riohacha', 1),
(122345678, 'Aseo Seguro Ltda.', 3197890123, 'Calle 12 #34-56, Quibdó', 1),
(123456789, 'BrilloPerfecto S.A.', 3108901234, 'Carrera 7 #14-25, San Andrés', 1),
(124567890, 'EcoFresh S.A.S.', 3119012345, 'Calle 45 #10-20, Florencia', 1),
(125678901, 'Limpieza Verde S.A.', 3120123456, 'Avenida 20 #10-30, Mitú', 1),
(126789012, 'BrillaAseo Ltda.', 3131234567, 'Calle 8 #23-45, Mocoa', 1),
(127890123, 'Higiene Seguro S.A.S.', 3142345678, 'Carrera 9 #11-22, Leticia', 1),
(128901234, 'LimpiaHogar Ltda.', 3153456789, 'Avenida 15 #10-20, Inírida', 1),
(129012345, 'Aseo Hogar S.A.S.', 3164567890, 'Calle 12 #34-45, Puerto Carreño', 1),
(130123456, 'EcoAseo Total Ltda.', 3175678901, 'Carrera 7 #14-25, San José del Guaviare', 1),
(131234567, 'LimpiaPiso S.A.', 3186789012, 'Avenida 20 #10-30, Arauca', 1),
(132345678, 'BrilloPiso Ltda.', 3197890123, 'Calle 45 #10-20, Puerto Inírida', 1),
(133456789, 'Higiene Verde S.A.S.', 3108901234, 'Carrera 8 #23-45, Turbo', 1),
(134567890, 'LimpiaTodo S.A.', 3119012345, 'Avenida 15 #10-20, Guapi', 1),
(135678901, 'Brilloso Ltda.', 3120123456, 'Calle 12 #34-45, Leticia', 1),
(136789012, 'Eco Limpio S.A.S.', 3131234567, 'Carrera 7 #14-25, Tumaco', 1),
(137890123, 'Higiene Max S.A.', 3142345678, 'Avenida 20 #10-30, Buenaventura', 1),
(138901234, 'Limpia Fácil Ltda.', 3153456789, 'Calle 8 #23-45, Puerto Asís', 1),
(139012345, 'Brilla Limpio S.A.S.', 3164567890, 'Carrera 9 #11-22, Mitú', 1),
(140123456, 'Eco Brillo S.A.', 3175678901, 'Avenida 15 #10-20, San José del Guaviare', 1),
(141234567, 'Limpia Hogar Ltda.', 3186789012, 'Calle 12 #34-56, Puerto Leguízamo', 1),
(142345678, 'Higiene Brillante S.A.S.', 3197890123, 'Carrera 7 #14-25, Uribia', 1),
(143456789, 'Brillo Total S.A.', 3108901234, 'Avenida 20 #10-30, Fonseca', 1),
(144567890, 'EcoAseo Express Ltda.', 3119012345, 'Calle 8 #23-45, Maicao', 1),
(145678901, 'Limpieza Express S.A.S.', 3120123456, 'Carrera 9 #11-22, Aracataca', 1),
(146789012, 'Brilla Eco S.A.', 3131234567, 'Avenida 15 #10-20, Magangué', 1),
(147890123, 'Higiene Express Ltda.', 3142345678, 'Calle 12 #34-56, Ciénaga', 1),
(148901234, 'LimpiaNet S.A.S.', 3153456789, 'Carrera 7 #14-25, Pivijay', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibopago`
--

CREATE TABLE `recibopago` (
  `ReciboID` int(11) NOT NULL,
  `FechaExpedicion` date DEFAULT NULL,
  `FechaVencimiento` date DEFAULT NULL,
  `InmuebleID` int(11) DEFAULT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `Valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientologistica`
--

CREATE TABLE `seguimientologistica` (
  `LogisticaID` int(11) NOT NULL,
  `EntregaID` int(11) DEFAULT NULL,
  `EstadoActual` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `InformacionDistribuidor` text DEFAULT NULL,
  `FechaActualizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudcomisionista`
--

CREATE TABLE `solicitudcomisionista` (
  `SolicitudID` int(11) NOT NULL,
  `UsuarioID` int(11) DEFAULT NULL,
  `EstadoSolicitud` enum('Pendiente','Aceptada','Rechazada') DEFAULT NULL,
  `FechaSolicitud` date DEFAULT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Apellidos` varchar(255) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Correo` varchar(255) DEFAULT 'NULL',
  `Telefono` varchar(255) DEFAULT 'NULL',
  `TipoDocumento` varchar(255) DEFAULT 'NULL',
  `Direccion` varchar(255) DEFAULT 'NULL',
  `Ciudad` varchar(50) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitudcomisionista`
--

INSERT INTO `solicitudcomisionista` (`SolicitudID`, `UsuarioID`, `EstadoSolicitud`, `FechaSolicitud`, `Nombre`, `Apellidos`, `Edad`, `Correo`, `Telefono`, `TipoDocumento`, `Direccion`, `Ciudad`) VALUES
(6, 1020306904, 'Rechazada', '2024-08-24', 'Nicole', 'Guarin Becerra', 18, 'guarinnicole315@gmail.com', '3244834200', 'Cédula de ciudadanía', 'CALLE 34B CR115 A28 INTERIOR 201', 'Medellín'),
(7, 434343565, 'Aceptada', '2024-08-24', 'Dolores consectetur', 'Quaerat quam ea fuga', 60, 'niqaw@mailinator.com', '1112152949', 'Cédula de ciudadanía', 'Dicta sint reprehen', 'Incididunt magnam do'),
(8, 445544554, 'Aceptada', '2024-08-24', 'Doloribus sint delec', 'Nostrum rem rerum si', 20, 'juan_cosoriog@soy.sena.edu.co', '7339474362', 'Cédula de ciudadanía', 'Soluta alias dolores', 'Vel qui accusantium '),
(9, 2054545454, 'Rechazada', '2024-08-24', 'Voluptates officia a', 'Maxime qui consequat', 61, 'admin@gmail.com', '7339474362', 'Cédula de ciudadanía', 'Rerum magna excepteu', 'Rerum culpa natus a'),
(10, 51545454, 'Rechazada', '2024-08-24', 'Aut sit libero esse', 'Elit dolorem dolori', 85, 'niqaw@mailinator.com', '57565665', 'Cédula de ciudadanía', 'Aspernatur sint fugi', 'Excepturi accusantiu'),
(11, 1036685561, 'Pendiente', '2024-08-26', 'Hilarith ', 'Parra Mosquera', 24, 'niqaw@mailinator.com', '7339474362', 'Cédula de ciudadanía', 'CALLE 34B CR115 A28 INTERIOR 201', 'Catacumbo'),
(12, 98656556, 'Rechazada', '2024-08-29', 'Juan Camilo', 'Osorio Garcia', 23, 'osoriojuancamilo315@gmail.com', '3053396000', 'Cédula de ciudadanía', 'CALLE 34B CR115 A28 INTERIOR 201', 'Medellín'),
(13, 4356565, 'Aceptada', '2024-08-29', 'Eos culpa nostrum qu', 'Cupidatat consequat', 64, 'niqaw@mailinator.com', '3244834200', 'Cédula de ciudadanía', 'Odio commodi anim qu', 'Nihil nulla totam in'),
(14, 335465656, 'Pendiente', '2024-09-05', 'Culpa aliquam amet ', 'Quis quaerat incidid', 19, 'osoriojuancamilo315@gmail.com', '28', 'Cédula de ciudadanía', 'Est consequatur sint', 'Reprehenderit nisi '),
(15, 2147483647, 'Aceptada', '2024-09-05', 'Culpa deserunt excep', 'Quibusdam a et non v', 36, 'guarinnicole315@gmail.com', '1845237703', 'Registro civil', 'Corporis perspiciati', 'A sint repudiandae q');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abono`
--
ALTER TABLE `abono`
  ADD PRIMARY KEY (`AbonoID`),
  ADD KEY `ReciboID` (`ReciboID`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
  ADD PRIMARY KEY (`ComisionID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `comisionista`
--
ALTER TABLE `comisionista`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- Indices de la tabla `contactodistribuidor`
--
ALTER TABLE `contactodistribuidor`
  ADD PRIMARY KEY (`ContactoID`),
  ADD KEY `DistribuidorID` (`DistribuidorID`);

--
-- Indices de la tabla `detalle_factura_cliente`
--
ALTER TABLE `detalle_factura_cliente`
  ADD PRIMARY KEY (`i_detalle`),
  ADD KEY `id_factura` (`id_factura`),
  ADD KEY `id_factura_2` (`id_factura`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `entregaproducto`
--
ALTER TABLE `entregaproducto`
  ADD PRIMARY KEY (`EntregaID`),
  ADD KEY `ProductoID` (`ProductoID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`FacturaID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD PRIMARY KEY (`InsumoID`),
  ADD KEY `ProveedorID` (`ProveedorID`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`InventarioID`),
  ADD KEY `ProductoID` (`ProductoID`);

--
-- Indices de la tabla `novedadentrega`
--
ALTER TABLE `novedadentrega`
  ADD PRIMARY KEY (`NovedadID`),
  ADD KEY `EntregaID` (`EntregaID`);

--
-- Indices de la tabla `opinionesproducto`
--
ALTER TABLE `opinionesproducto`
  ADD PRIMARY KEY (`OpinionID`),
  ADD KEY `ProductoID` (`ProductoID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`PagoID`),
  ADD KEY `FacturaID` (`FacturaID`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ProductoID`),
  ADD KEY `AdministradorID` (`AdministradorID`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ProveedorID`),
  ADD KEY `AdministradorID` (`AdministradorID`);

--
-- Indices de la tabla `recibopago`
--
ALTER TABLE `recibopago`
  ADD PRIMARY KEY (`ReciboID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- Indices de la tabla `seguimientologistica`
--
ALTER TABLE `seguimientologistica`
  ADD PRIMARY KEY (`LogisticaID`),
  ADD KEY `EntregaID` (`EntregaID`);

--
-- Indices de la tabla `solicitudcomisionista`
--
ALTER TABLE `solicitudcomisionista`
  ADD PRIMARY KEY (`SolicitudID`),
  ADD KEY `UsuarioID` (`UsuarioID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abono`
--
ALTER TABLE `abono`
  MODIFY `AbonoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44005341;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comision`
--
ALTER TABLE `comision`
  MODIFY `ComisionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `contactodistribuidor`
--
ALTER TABLE `contactodistribuidor`
  MODIFY `ContactoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura_cliente`
--
ALTER TABLE `detalle_factura_cliente`
  MODIFY `i_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entregaproducto`
--
ALTER TABLE `entregaproducto`
  MODIFY `EntregaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `FacturaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `insumo`
--
ALTER TABLE `insumo`
  MODIFY `InsumoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `InventarioID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedadentrega`
--
ALTER TABLE `novedadentrega`
  MODIFY `NovedadID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opinionesproducto`
--
ALTER TABLE `opinionesproducto`
  MODIFY `OpinionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `PagoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ProductoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `recibopago`
--
ALTER TABLE `recibopago`
  MODIFY `ReciboID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimientologistica`
--
ALTER TABLE `seguimientologistica`
  MODIFY `LogisticaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudcomisionista`
--
ALTER TABLE `solicitudcomisionista`
  MODIFY `SolicitudID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abono`
--
ALTER TABLE `abono`
  ADD CONSTRAINT `abono_ibfk_1` FOREIGN KEY (`ReciboID`) REFERENCES `recibopago` (`ReciboID`);

--
-- Filtros para la tabla `comision`
--
ALTER TABLE `comision`
  ADD CONSTRAINT `comision_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `comisionista` (`UsuarioID`);

--
-- Filtros para la tabla `contactodistribuidor`
--
ALTER TABLE `contactodistribuidor`
  ADD CONSTRAINT `contactodistribuidor_ibfk_1` FOREIGN KEY (`DistribuidorID`) REFERENCES `seguimientologistica` (`LogisticaID`);

--
-- Filtros para la tabla `detalle_factura_cliente`
--
ALTER TABLE `detalle_factura_cliente`
  ADD CONSTRAINT `detalle_factura_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`UsuarioID`),
  ADD CONSTRAINT `detalle_factura_cliente_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`FacturaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregaproducto`
--
ALTER TABLE `entregaproducto`
  ADD CONSTRAINT `entregaproducto_ibfk_1` FOREIGN KEY (`ProductoID`) REFERENCES `producto` (`ProductoID`),
  ADD CONSTRAINT `entregaproducto_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `comisionista` (`UsuarioID`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `comisionista` (`UsuarioID`);

--
-- Filtros para la tabla `insumo`
--
ALTER TABLE `insumo`
  ADD CONSTRAINT `insumo_ibfk_1` FOREIGN KEY (`ProveedorID`) REFERENCES `proveedor` (`ProveedorID`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`ProductoID`) REFERENCES `producto` (`ProductoID`);

--
-- Filtros para la tabla `novedadentrega`
--
ALTER TABLE `novedadentrega`
  ADD CONSTRAINT `novedadentrega_ibfk_1` FOREIGN KEY (`EntregaID`) REFERENCES `entregaproducto` (`EntregaID`);

--
-- Filtros para la tabla `opinionesproducto`
--
ALTER TABLE `opinionesproducto`
  ADD CONSTRAINT `opinionesproducto_ibfk_1` FOREIGN KEY (`ProductoID`) REFERENCES `producto` (`ProductoID`),
  ADD CONSTRAINT `opinionesproducto_ibfk_2` FOREIGN KEY (`UsuarioID`) REFERENCES `comisionista` (`UsuarioID`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`FacturaID`) REFERENCES `factura` (`FacturaID`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`AdministradorID`) REFERENCES `administrador` (`AdminID`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`AdministradorID`) REFERENCES `administrador` (`AdminID`);

--
-- Filtros para la tabla `recibopago`
--
ALTER TABLE `recibopago`
  ADD CONSTRAINT `recibopago_ibfk_1` FOREIGN KEY (`UsuarioID`) REFERENCES `comisionista` (`UsuarioID`);

--
-- Filtros para la tabla `seguimientologistica`
--
ALTER TABLE `seguimientologistica`
  ADD CONSTRAINT `seguimientologistica_ibfk_1` FOREIGN KEY (`EntregaID`) REFERENCES `entregaproducto` (`EntregaID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
