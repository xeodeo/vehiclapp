-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 03:57 PM
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
(1, 'hola', '2023-09-14 13:17:35'),
(2, 'Sikas', '2023-09-14 13:32:58'),
(3, 'Sikas', '2023-09-14 13:33:15'),
(4, 'moto', '2023-09-14 13:38:13');

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
(8, '2', 'Sikass', '', '2023-09-15 08:01:53', NULL, NULL, '1'),
(9, '1', 'LIBRE', '', '2023-09-15 08:25:20', NULL, NULL, '1'),
(10, '3', 'LIBRE', '', '2023-09-15 08:25:23', NULL, NULL, '1'),
(11, '4', 'OCUPADO', '', '2023-09-15 08:25:27', NULL, NULL, '1'),
(12, '5', 'LIBRE', '', '2023-09-15 08:25:29', NULL, NULL, '1'),
(13, '6', 'LIBRE', '', '2023-09-15 08:25:31', NULL, NULL, '1'),
(14, '7', 'LIBRE', '', '2023-09-15 08:25:33', NULL, NULL, '1'),
(15, '8', 'LIBRE', '', '2023-09-15 08:25:37', NULL, NULL, '1'),
(16, '9', 'LIBRE', '', '2023-09-15 09:28:08', NULL, NULL, '1'),
(17, '10', 'LIBRE', '', '2023-09-15 09:28:12', NULL, NULL, '1'),
(18, '11', 'LIBRE', '', '2023-09-15 09:28:22', NULL, NULL, '1'),
(19, '12', 'LIBRE', '', '2023-09-15 09:28:24', NULL, NULL, '1'),
(20, '13', 'LIBRE', '', '2023-09-15 09:28:27', NULL, NULL, '1');

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
-- Indexes for table `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  ADD PRIMARY KEY (`id_map`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
