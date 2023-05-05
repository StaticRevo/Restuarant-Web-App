-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2023 at 01:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Name`, `Surname`, `Email`, `Password`) VALUES
('Isaac', 'attard', 'isaacattard@hotmail.com', '$2y$10$ZXBuZqO38.oKfrjyzZpbgODR4du.fDxAZ5sWT5AYuH003HvZUGXbO'),
('Luca ', 'Gatt', 'lucagatt@gmail.com', '$2y$10$4bpR53LXVLJ2/lJ24kytbekiEdpSJy9dANwj1yTRNFGAzUanb7dWa'),
('test', 'case', 'test@test', '$2y$10$Zmok1e33TLrPkGxS9CZkeuqkUOPeVFtBCJ29fK/naPa2w57HYl6M2'),
('Nathan', 'Attard', 'natahattard@live.com', '$2y$10$ecdLJBAOtVPtjtkfTZayKehqoETdhlX3hPDh4067S.yI9rlNb3DHS'),
('test2', 'test2', 'test2@test2', '$2y$10$fvcIEdYeNc44yE9zmRfQhe49a0ft0fF7Zda53rPz48/nuVpWs3MaS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
