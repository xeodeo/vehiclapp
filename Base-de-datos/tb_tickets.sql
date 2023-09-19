-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 03:24 PM
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
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tickets`
--

INSERT INTO `tb_tickets` (`id_ticket`, `placa_auto`, `nombre_cliente`, `telefono_cliente`, `cuviculo`, `fecha_ingreso`, `hora_ingreso`, `estado_ticket`, `user_sesion`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'SAD123', 'k¿sad', '213124', '1', '2023-09-19', '08:22', 'OCUPADO', NULL, NULL, NULL, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`id_ticket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
