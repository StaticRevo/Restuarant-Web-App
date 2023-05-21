-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 06:16 PM
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
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `forms_contact`
--

CREATE TABLE `forms_contact` (
  `message_type` enum('question','complaint') NOT NULL,
  `message` text NOT NULL,
  `id` smallint(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_num` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Other forms to which simple message is sent';


-- --------------------------------------------------------

--
-- Table structure for table `forms_reservation`
--

CREATE TABLE `forms_reservation` (
  `reservation_date` datetime NOT NULL,
  `id` smallint(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_num` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `ingredients` text NOT NULL,
  `price` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `type`, `ingredients`, `price`) VALUES
(1, 'Bruschetta', 'Starter', 'Toasted baguette, chopped fresh tomatoes, garlic, olive oil, balsamic vinegar, fresh basil.', '6.50'),
(2, 'Caesar Salad', 'Starter', 'Romaine lettuce, croutons, parmesan cheese, Caesar dressing', '9.75'),
(3, 'Fried Calamari', 'Starter', ' Calamari rings, flour, cornmeal, salt, pepper, vegetable oil, lemon wedges', '10.95'),
(4, 'Grilled Steak', 'Main', 'Ribeye steak, salt, pepper, olive oil, garlic, rosemary, thyme', '24.50'),
(5, 'Roasted Chicken', 'Main', 'Whole chicken, salt, pepper, olive oil, garlic, lemon, rosemary', '14.25'),
(6, 'Vegetarian Lasagna', 'Main', 'Marinara sauce, spinach, ricotta cheese, mozzarella cheese, parmesan cheese, basil', '16.95'),
(7, 'Fish and Chips', 'Main', 'Cod fillets, flour, salt, pepper, baking powder, beer, vegetable oil, French fries, tartar sauce', '18.75'),
(8, 'Chocolate Cake', 'Dessert', 'Flour, sugar, cocoa powder, baking powder, baking soda, salt, eggs, milk, vegetable oil, vanilla extract, buttercream frosting', '6.50'),
(9, 'Apple Pie', 'Dessert', 'Apples, sugar, cinnamon, nutmeg, lemon juice, butter', '5.75'),
(10, 'Tiramisu', 'Dessert', 'Espresso, mascarpone cheese, heavy cream, sugar, cocoa powder', '7.25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` text NOT NULL,
  `Surname` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Surname`, `Email`, `Password`) VALUES
('test', 'case', 'test@test.com', '$2y$10$Zmok1e33TLrPkGxS9CZkeuqkUOPeVFtBCJ29fK/naPa2w57HYl6M2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms_contact`
--
ALTER TABLE `forms_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms_reservation`
--
ALTER TABLE `forms_reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms_contact`
--
ALTER TABLE `forms_contact`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `forms_reservation`
--
ALTER TABLE `forms_reservation`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
