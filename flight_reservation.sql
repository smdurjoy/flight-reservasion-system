-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 06:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flight_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `aircrafts`
--

CREATE TABLE `aircrafts` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `capacity` varchar(200) NOT NULL,
  `mfg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aircrafts`
--

INSERT INTO `aircrafts` (`id`, `type`, `capacity`, `mfg_date`) VALUES
(1, 'Airbus A350 XWB	', '5000', '2013-01-01'),
(2, 'Boeing 737', '6000', '2003-01-02'),
(3, 'Comac C919', '5500', '1995-01-31'),
(4, 'Irkut MC-21', '4500', '1997-01-20'),
(5, 'Test', '500', '2023-02-22');

-- --------------------------------------------------------

--
-- Table structure for table `airfares`
--

CREATE TABLE `airfares` (
  `id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airfares`
--

INSERT INTO `airfares` (`id`, `route_id`, `fare`) VALUES
(1, 1, 90000),
(2, 2, 102200),
(3, 3, 88000),
(4, 4, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `email` varchar(120) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `mobile`, `state_id`) VALUES
(1, 'dhk@gmail.com', '01777777777', 1),
(2, 'ch@gmail.com', '01777777777', 2),
(3, 'london@gmail.com', '01777777777', 3),
(4, 'syd@gmail.com', '01777777777', 4),
(5, 'nyk@gmail.com', '01777777777', 5);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'Bangladesh'),
(2, 'England'),
(3, 'Australia'),
(4, 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `flight_schedules`
--

CREATE TABLE `flight_schedules` (
  `id` int(11) NOT NULL,
  `flight_date` date NOT NULL,
  `departure` date NOT NULL,
  `arrival` date NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `airfare_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flight_schedules`
--

INSERT INTO `flight_schedules` (`id`, `flight_date`, `departure`, `arrival`, `aircraft_id`, `airfare_id`) VALUES
(1, '2022-10-01', '2022-10-01', '2022-10-02', 1, 1),
(2, '2022-11-11', '2022-11-11', '2022-11-13', 2, 2),
(3, '2023-02-10', '2023-02-10', '2023-02-11', 2, 3),
(4, '2023-02-13', '2023-02-13', '2023-02-15', 2, 4),
(5, '2023-02-19', '2023-02-19', '2023-02-20', 3, 1),
(6, '2023-02-21', '2023-02-21', '2023-02-22', 4, 1),
(7, '2023-02-17', '2023-02-17', '2023-02-18', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `name`, `address`, `age`, `nationality`, `contact_id`) VALUES
(1, 'ABC', 'Dhaka', 26, 'BD', 1),
(2, 'ABC', 'Dhaka', 26, 'BD', 1),
(3, 'ACB', 'Chittagong', 21, 'BD', 1),
(4, 'XYZ', 'London', 29, 'BD', 2),
(5, 'NMM', 'Sydney', 44, 'BD', 3),
(6, 'YYY', 'New York', 52, 'BD', 4),
(7, 'ABC', 'East Midlands', 33, 'BD', 2),
(8, 'ABC', 'New South Wales', 45, 'BD', 3);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(11) NOT NULL,
  `airport` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `route_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `airport`, `destination`, `route_code`) VALUES
(1, 'London', 'Dhaka', 'LD002'),
(2, 'New York', 'Dhaka', 'YD62'),
(3, 'Sydney ', 'Dhaka', 'SD121'),
(4, 'Dhaka', 'Chittagong', 'DC444');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'Dhaka', 1),
(2, 'Chittagong', 1),
(3, 'London', 2),
(4, 'Sydney', 3),
(5, 'New York', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `aircraft_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `booking_date`, `passenger_id`, `aircraft_id`, `route_id`) VALUES
(2, '2023-02-21', 2, 3, 2),
(3, '2023-02-21', 2, 3, 1),
(4, '2023-02-20', 4, 2, 3),
(5, '2023-02-20', 2, 2, 4),
(6, '2023-02-22', 4, 2, 3),
(7, '2023-02-20', 6, 3, 2),
(8, '2023-02-19', 7, 4, 1),
(9, '2023-02-19', 5, 2, 4),
(10, '2023-02-22', 7, 2, 3),
(11, '2023-02-26', 4, 1, 1),
(12, '2023-02-20', 5, 1, 1),
(13, '2023-02-19', 6, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123', 1, '2023-01-20 07:55:39', '2023-01-20 07:55:39'),
(2, 'user', 'user123', 2, '2023-02-22 17:09:37', '2023-02-22 17:09:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aircrafts`
--
ALTER TABLE `aircrafts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airfares`
--
ALTER TABLE `airfares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_schedules`
--
ALTER TABLE `flight_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aircrafts`
--
ALTER TABLE `aircrafts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `airfares`
--
ALTER TABLE `airfares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `flight_schedules`
--
ALTER TABLE `flight_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
