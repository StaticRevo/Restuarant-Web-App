-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 08:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `ingredients` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `type`, `ingredients`) VALUES
(1, 'Bruschetta', 'Starter', 'Toasted baguette, chopped fresh tomatoes, garlic, olive oil, balsamic vinegar, fresh basil.'),
(2, 'Caesar Salad', 'Starter', 'Romaine lettuce, croutons, parmesan cheese, Caesar dressing'),
(3, 'Fried Calamari', 'Starter', ' Calamari rings, flour, cornmeal, salt, pepper, vegetable oil, lemon wedges'),
(4, 'Grilled Steak', 'Main', 'Ribeye steak, salt, pepper, olive oil, garlic, rosemary, thyme'),
(5, 'Roasted Chicken', 'Main', 'Whole chicken, salt, pepper, olive oil, garlic, lemon, rosemary'),
(6, 'Vegetarian Lasagna', 'Main', 'Marinara sauce, spinach, ricotta cheese, mozzarella cheese, parmesan cheese, basil'),
(7, 'Fish and Chips', 'Main', 'Cod fillets, flour, salt, pepper, baking powder, beer, vegetable oil, French fries, tartar sauce'),
(8, 'Chocolate Cake', 'Dessert', 'Flour, sugar, cocoa powder, baking powder, baking soda, salt, eggs, milk, vegetable oil, vanilla extract, buttercream frosting'),
(9, 'Apple Pie', 'Dessert', 'Apples, sugar, cinnamon, nutmeg, lemon juice, butter'),
(10, 'Tiramisu', 'Dessert', 'Espresso, mascarpone cheese, heavy cream, sugar, cocoa powder');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
