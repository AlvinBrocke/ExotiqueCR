-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 02:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `Booking_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `return_date` datetime DEFAULT NULL,
  `booking_status_id` int(11) DEFAULT NULL,
  `booking_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `Make_id` int(11) DEFAULT NULL,
  `Model` varchar(225) DEFAULT NULL,
  `Year` decimal(4,0) DEFAULT NULL,
  `Type_id` int(11) DEFAULT NULL,
  `Transmission_id` int(11) DEFAULT NULL,
  `Capacity` int(11) DEFAULT NULL,
  `Reg_no` varchar(10) DEFAULT NULL,
  `Status_id` int(11) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Fuel_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `mileage` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `Make_id`, `Model`, `Year`, `Type_id`, `Transmission_id`, `Capacity`, `Reg_no`, `Status_id`, `Image`, `Fuel_id`, `description`, `mileage`) VALUES
(1, 6, 'Huracan Performante', 2023, 6, 2, 2, 'HX-1-23', 0, 'IMG-661300dddefc47.92819367.jpg', 4, 'The Lamborghini Huracán Performante is a high-performance variant known for its powerful V10 engine, precise handling, and advanced aerodynamics. With aggressive styling and track-focused features, it\'s a true icon of supercar engineering and innovation.', NULL),
(2, 5, 'Continental GT', 1994, 5, 1, 4, 'TS-I2352', 0, 'IMG-6613b7171ce180.41034430.png', 2, NULL, NULL),
(3, 4, '911 GT3 RS', 2023, 6, 2, 2, 'KAS-52345', 0, 'IMG-6613d17f5d8092.54094571.jpg', 2, NULL, NULL),
(4, 3, '720S Spyder', 2024, 6, 2, 2, 'IKL-25893', 0, 'IMG-6613d2598097f3.55153195.jpg', 1, 'This is a McLAren', NULL),
(5, 2, 'M3 Competition CS', 2007, 1, 1, 4, 'ORI-72345', 0, 'IMG-6613d2c0e54906.62467024.jpg', 4, 'BMW', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cartype`
--

CREATE TABLE `cartype` (
  `type_id` int(11) NOT NULL,
  `Weekly_rate` decimal(5,2) DEFAULT NULL,
  `Daily_rate` decimal(5,2) DEFAULT NULL,
  `Car_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cartype`
--

INSERT INTO `cartype` (`type_id`, `Weekly_rate`, `Daily_rate`, `Car_type`) VALUES
(1, 250.00, 50.00, 'Sedan'),
(2, 350.00, 60.00, 'SUV'),
(3, 220.00, 40.00, 'Compact'),
(4, 425.00, 65.00, 'Limo'),
(5, 475.00, 70.00, 'Luxury'),
(6, 650.00, 100.00, 'Sports Car');

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `Fuel_id` int(11) NOT NULL,
  `fuel_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`Fuel_id`, `fuel_name`) VALUES
(1, 'Gasoline'),
(2, 'Diesel'),
(3, 'Electric'),
(4, 'Hybrid');

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE `make` (
  `Make_id` int(11) NOT NULL,
  `Make_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`Make_id`, `Make_name`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'McLaren'),
(4, 'Porsche'),
(5, 'Bentley'),
(6, 'Lamborghini');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `rid` int(11) NOT NULL,
  `rolename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`rid`, `rolename`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'standard');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`sid`, `sname`) VALUES
(0, 'Available'),
(1, 'Booked'),
(2, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `transmission`
--

CREATE TABLE `transmission` (
  `tid` int(11) NOT NULL,
  `tname` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transmission`
--

INSERT INTO `transmission` (`tid`, `tname`) VALUES
(1, 'Manual'),
(2, 'Automatic');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pid`, `rid`, `fname`, `lname`, `tel`, `email`, `passwd`, `profile`) VALUES
(1, 1, 'Alvin', 'Brocke', '+(233)554306250', 'alvinbrocke@gmail.com', '$2y$10$zYrm4x1JDDBCtBOp3Kyxy..XufeD4e9hljNKd8pQDQ5bzkvCbhX1y', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`Booking_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `booking_status_id` (`booking_status_id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `Type_id` (`Type_id`),
  ADD KEY `Make_id` (`Make_id`),
  ADD KEY `Transmission_id` (`Transmission_id`),
  ADD KEY `Status_id` (`Status_id`),
  ADD KEY `Fuel_id` (`Fuel_id`);

--
-- Indexes for table `cartype`
--
ALTER TABLE `cartype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`Fuel_id`);

--
-- Indexes for table `make`
--
ALTER TABLE `make`
  ADD PRIMARY KEY (`Make_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `transmission`
--
ALTER TABLE `transmission`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cartype`
--
ALTER TABLE `cartype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `Fuel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `make`
--
ALTER TABLE `make`
  MODIFY `Make_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`pid`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `car` (`car_id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`booking_status_id`) REFERENCES `status` (`sid`);

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `cartype` (`Type_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`Make_id`) REFERENCES `make` (`Make_id`),
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`Transmission_id`) REFERENCES `transmission` (`tid`),
  ADD CONSTRAINT `car_ibfk_4` FOREIGN KEY (`Status_id`) REFERENCES `status` (`sid`),
  ADD CONSTRAINT `car_ibfk_5` FOREIGN KEY (`Fuel_id`) REFERENCES `fuel` (`Fuel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
