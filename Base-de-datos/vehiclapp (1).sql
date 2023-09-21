-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 02:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehiclapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(11) NOT NULL,
  `NombreAdmin` varchar(120) NOT NULL,
  `NombreUsuario` varchar(120) NOT NULL,
  `Telefono` bigint(10) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Contraseña` varchar(200) NOT NULL,
  `DiaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `NombreAdmin`, `NombreUsuario`, `Telefono`, `Email`, `Contraseña`, `DiaRegistro`) VALUES
(1, 'Admin', 'admin', 7898799798, 'tester1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2023-09-14 12:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategoria`
--

CREATE TABLE `tblcategoria` (
  `ID` int(11) NOT NULL,
  `TipoVehiculo` varchar(120) NOT NULL,
  `DiaCreacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategoria`
--

INSERT INTO `tblcategoria` (`ID`, `TipoVehiculo`, `DiaCreacion`) VALUES
(4, 'moto', '2023-09-14 13:38:13'),
(5, 'Carro', '2023-09-17 18:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `ID` int(11) NOT NULL,
  `PimerNombre` varchar(250) NOT NULL,
  `SegundoNombre` varchar(250) NOT NULL,
  `Numero` bigint(10) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Contraseña` varchar(250) NOT NULL,
  `DiaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblvehiculo`
--

CREATE TABLE `tblvehiculo` (
  `ID` int(11) NOT NULL,
  `Tipo` varchar(120) NOT NULL,
  `Placa` varchar(120) NOT NULL,
  `NombreDueño` varchar(120) NOT NULL,
  `TelefonoDueño` bigint(10) NOT NULL,
  `EmailDueño` varchar(200) NOT NULL,
  `Documento` varchar(200) NOT NULL,
  `DiaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvehiculo`
--

INSERT INTO `tblvehiculo` (`ID`, `Tipo`, `Placa`, `NombreDueño`, `TelefonoDueño`, `EmailDueño`, `Documento`, `DiaRegistro`, `estado`) VALUES
(6, 'Carro', 'SAD123', 'k¿sad', 213124, '2131232142', '', '2023-09-19 03:04:39', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapeos`
--

CREATE TABLE `tb_mapeos` (
  `id_map` int(11) NOT NULL,
  `nro_espacio` varchar(255) DEFAULT NULL,
  `estado_espacio` varchar(255) DEFAULT NULL,
  `obs` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mapeos`
--

INSERT INTO `tb_mapeos` (`id_map`, `nro_espacio`, `estado_espacio`, `obs`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(25, '1', 'OCUPADO', '', '2023-09-18 01:18:42', '2023-09-21 12:19:14', NULL, '1'),
(26, '2', 'OCUPADO', '', '2023-09-18 02:28:59', '2023-09-21 12:19:21', NULL, '1'),
(27, '3', 'LIBRE', '', '2023-09-18 02:30:16', '2023-09-20 11:31:28', NULL, '1'),
(28, '4', 'LIBRE', '', '2023-09-18 04:27:11', '2023-09-20 10:46:24', NULL, '1'),
(29, '5', 'LIBRE', '', '2023-09-19 15:08:30', '2023-09-19 10:39:54', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `id_ticket` int(11) NOT NULL,
  `placa_auto` varchar(255) DEFAULT NULL,
  `nombre_cliente` varchar(255) DEFAULT NULL,
  `telefono_cliente` varchar(255) DEFAULT NULL,
  `cuviculo` varchar(255) DEFAULT NULL,
  `fecha_ingreso` varchar(255) DEFAULT NULL,
  `hora_ingreso` varchar(255) DEFAULT NULL,
  `estado_ticket` varchar(255) DEFAULT NULL,
  `user_sesion` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `tipo` varchar(255) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tickets`
--

INSERT INTO `tb_tickets` (`id_ticket`, `placa_auto`, `nombre_cliente`, `telefono_cliente`, `cuviculo`, `fecha_ingreso`, `hora_ingreso`, `estado_ticket`, `user_sesion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `tipo`, `estado`) VALUES
(42, '', '', '', '', '', '', 'OCUPADO', NULL, NULL, NULL, NULL, '', '1'),
(46, '', '', '', '', '', '', 'OCUPADO', NULL, NULL, NULL, NULL, '', '1'),
(51, '', 'Array', '', '', '', '', 'OCUPADO', NULL, NULL, NULL, NULL, '', '1'),
(68, 'LOL123', 'sad', '123', '1', '2023-09-21', '11:19', 'OCUPADO', NULL, NULL, NULL, NULL, '', '1'),
(69, 'SAD123', 'k¿sad', '213124', '2', '2023-09-21', '11:19', 'OCUPADO', NULL, NULL, NULL, NULL, '', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcategoria`
--
ALTER TABLE `tblcategoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblvehiculo`
--
ALTER TABLE `tblvehiculo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  ADD PRIMARY KEY (`id_map`);

--
-- Indexes for table `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcategoria`
--
ALTER TABLE `tblcategoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblvehiculo`
--
ALTER TABLE `tblvehiculo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
