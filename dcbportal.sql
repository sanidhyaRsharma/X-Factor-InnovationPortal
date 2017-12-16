-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 09:52 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcbportal`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `userdummy` (IN `SomeNumber` INT(20))  NO SQL
BEGIN
	
    SET @Count = 1;
      SELECT @n:=FLOOR(RAND()*(4-1+1))+1;

    WHILE( @Count <= SomeNumber ) DO
        
        SELECT @n1:=FLOOR(RAND()*(4-1+1))+1;
	    insert into users (username,email,password,type_id,created_at,updated_at)
values (
    generate_fname(),
    CONCAT(FLOOR(rand() * 10000000),'@mailinator.com'),'12345678',@n1,
    NOW(),
    NOW()
);

        SET @Count = @Count + 1;
    END WHILE;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `generate_fname` () RETURNS VARCHAR(30) CHARSET latin1 NO SQL
BEGIN
	RETURN ELT(FLOOR(1 + (RAND() * (100-1))), "James","Mary","John","Patricia","Robert","Linda","Michael","Barbara","William","Elizabeth","David","Jennifer","Richard","Maria","Charles","Susan","Joseph","Margaret","Thomas","Dorothy","Christopher","Lisa","Daniel","Nancy","Paul","Karen","Mark","Betty","Donald","Helen","George","Sandra","Kenneth","Donna","Steven","Carol","Edward","Ruth","Brian","Sharon","Ronald","Michelle","Anthony","Laura","Kevin","Sarah","Jason","Kimberly","Matthew","Deborah","Gary","Jessica","Timothy","Shirley","Jose","Cynthia","Larry","Angela","Jeffrey","Melissa","Frank","Brenda","Scott","Amy","Eric","Anna","Stephen","Rebecca","Andrew","Virginia","Raymond","Kathleen","Gregory","Pamela","Joshua","Martha","Jerry","Debra","Dennis","Amanda","Walter","Stephanie","Patrick","Carolyn","Peter","Christine","Harold","Marie","Douglas","Janet","Henry","Catherine","Carl","Frances","Arthur","Ann","Ryan","Joyce","Roger","Diane");
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `innovation`
--

CREATE TABLE `innovation` (
  `innovation_id` int(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(80) NOT NULL,
  `summary` text NOT NULL,
  `description` text NOT NULL,
  `file` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `features` text NOT NULL,
  `business_impact` text NOT NULL,
  `tangible_benefits` text NOT NULL,
  `prototype` int(20) NOT NULL,
  `regulation` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prototype`
--

CREATE TABLE `prototype` (
  `prototype_id` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prototype`
--

INSERT INTO `prototype` (`prototype_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yes', '2017-12-15 17:13:54', '2017-12-15 17:13:54'),
(2, 'No', '2017-12-15 17:13:54', '2017-12-15 17:13:54');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `innovation_id` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `regulation`
--

CREATE TABLE `regulation` (
  `regulaton_id` int(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regulation`
--

INSERT INTO `regulation` (`regulaton_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Regulated', '2017-12-15 17:15:47', '2017-12-15 17:15:47'),
(2, 'Non-Regulated', '2017-12-15 17:15:47', '2017-12-15 17:15:47');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(20) NOT NULL,
  `status_text` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_text`, `created_at`, `updated_at`) VALUES
(1, 'Under Processing', '2017-12-15 17:22:42', '2017-12-15 17:22:42'),
(2, 'Submitted for Review', '2017-12-15 17:22:42', '2017-12-15 17:22:42'),
(3, 'Under Implementation', '2017-12-15 17:22:42', '2017-12-15 17:22:42'),
(4, 'Implemented', '2017-12-15 17:22:42', '2017-12-15 17:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `tracking_id` int(20) NOT NULL,
  `admin_id` int(20) NOT NULL,
  `assigned_id` int(20) NOT NULL,
  `status` int(20) NOT NULL,
  `admin_remarks` text NOT NULL,
  `assigned_remarks` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(120) NOT NULL,
  `type_id` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'Laura', '8192796@mailinator.c', '12345678', 1, '2017-12-15 18:03:40', '2017-12-15 18:03:40'),
(4, 'Laura', '7917618@mailinator.c', '12345678', 1, '2017-12-15 18:05:25', '2017-12-15 18:05:25'),
(9, 'Betty', '7771320@mailinator.c', '12345678', 4, '2017-12-15 18:12:27', '2017-12-15 18:12:27'),
(10, 'Douglas', '3172164@mailinator.c', '12345678', 1, '2017-12-15 18:12:27', '2017-12-15 18:12:27'),
(11, 'Scott', '3947558@mailinator.c', '12345678', 4, '2017-12-15 18:12:27', '2017-12-15 18:12:27'),
(12, 'Karen', '156212@mailinator.co', '12345678', 1, '2017-12-15 18:12:27', '2017-12-15 18:12:27'),
(15, 'Harold', '527003@mailinator.co', '12345678', 1, '2017-12-15 18:13:28', '2017-12-15 18:13:28'),
(16, 'Elizabeth', '5072613@mailinator.c', '12345678', 3, '2017-12-15 18:13:28', '2017-12-15 18:13:28'),
(17, 'Dennis', '1580028@mailinator.c', '12345678', 2, '2017-12-15 18:13:28', '2017-12-15 18:13:28'),
(18, 'Amy', '9441690@mailinator.c', '12345678', 2, '2017-12-15 18:13:28', '2017-12-15 18:13:28'),
(19, 'Richard', '2674512@mailinator.c', '12345678', 4, '2017-12-15 18:13:28', '2017-12-15 18:13:28'),
(20, 'Arthur', '9035389@mailinator.c', '12345678', 4, '2017-12-15 18:13:28', '2017-12-15 18:13:28'),
(21, 'Frank', '619310@mailinator.co', '12345678', 3, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(22, 'Dorothy', '5589367@mailinator.c', '12345678', 2, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(23, 'Kenneth', '428030@mailinator.co', '12345678', 1, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(24, 'James', '3329541@mailinator.c', '12345678', 1, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(25, 'Donald', '4806503@mailinator.c', '12345678', 3, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(26, 'Christopher', '4622656@mailinator.c', '12345678', 3, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(27, 'James', '36956@mailinator.com', '12345678', 3, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(28, 'Arthur', '8144841@mailinator.c', '12345678', 4, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(29, 'Timothy', '589475@mailinator.co', '12345678', 1, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(30, 'Edward', '7247327@mailinator.c', '12345678', 3, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(31, 'Brian', '3870366@mailinator.c', '12345678', 3, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(32, 'Joshua', '3951494@mailinator.c', '12345678', 4, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(33, 'Jason', '1619680@mailinator.c', '12345678', 3, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(34, 'Deborah', '2884119@mailinator.c', '12345678', 2, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(35, 'Henry', '6998207@mailinator.c', '12345678', 4, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(36, 'Andrew', '1985424@mailinator.c', '12345678', 4, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(37, 'Frances', '9882323@mailinator.c', '12345678', 4, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(38, 'Frank', '6979484@mailinator.c', '12345678', 1, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(39, 'Daniel', '1535995@mailinator.c', '12345678', 3, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(40, 'Carl', '4433573@mailinator.c', '12345678', 1, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(41, 'Raymond', '3214003@mailinator.c', '12345678', 2, '2017-12-15 18:13:29', '2017-12-15 18:13:29'),
(42, 'Laura', '7413830@mailinator.c', '12345678', 2, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(43, 'Martha', '6328352@mailinator.c', '12345678', 2, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(44, 'Laura', '6094828@mailinator.c', '12345678', 4, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(45, 'Martha', '6720741@mailinator.c', '12345678', 3, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(46, 'Helen', '3098955@mailinator.c', '12345678', 1, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(47, 'Sandra', '6456403@mailinator.c', '12345678', 3, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(48, 'Michelle', '2840525@mailinator.c', '12345678', 2, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(49, 'Arthur', '2919124@mailinator.c', '12345678', 1, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(50, 'Elizabeth', '6835807@mailinator.c', '12345678', 3, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(51, 'Amy', '8048273@mailinator.c', '12345678', 1, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(52, 'Robert', '9295114@mailinator.c', '12345678', 1, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(53, 'Carolyn', '6305815@mailinator.c', '12345678', 3, '2017-12-15 18:13:30', '2017-12-15 18:13:30'),
(54, 'Paul', '3497139@mailinator.c', '12345678', 3, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(55, 'Roger', '9514176@mailinator.c', '12345678', 1, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(56, 'Roger', '6711326@mailinator.c', '12345678', 4, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(57, 'Stephanie', '23407@mailinator.com', '12345678', 2, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(58, 'Pamela', '666758@mailinator.co', '12345678', 3, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(59, 'Sandra', '2708669@mailinator.c', '12345678', 1, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(60, 'Lisa', '8691110@mailinator.c', '12345678', 2, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(61, 'Christine', '2154814@mailinator.c', '12345678', 3, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(62, 'Peter', '7725219@mailinator.c', '12345678', 3, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(63, 'Margaret', '9837590@mailinator.c', '12345678', 2, '2017-12-15 18:13:31', '2017-12-15 18:13:31'),
(64, 'James', '8426329@mailinator.c', '12345678', 2, '2017-12-15 18:13:31', '2017-12-15 18:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `type_id` int(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`type_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2017-12-15 14:38:03', '2017-12-15 14:38:15'),
(2, 'internal_user', '2017-12-15 14:38:03', '2017-12-15 14:38:15'),
(3, 'external_user', '2017-12-15 14:38:03', '2017-12-15 14:38:15'),
(4, 'domain_expert', '2017-12-15 14:38:03', '2017-12-15 14:38:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `innovation`
--
ALTER TABLE `innovation`
  ADD PRIMARY KEY (`innovation_id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `prototype_fk` (`prototype`),
  ADD KEY `regulation_fk` (`regulation`);

--
-- Indexes for table `prototype`
--
ALTER TABLE `prototype`
  ADD PRIMARY KEY (`prototype_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `innovation_fk` (`innovation_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `regulation`
--
ALTER TABLE `regulation`
  ADD PRIMARY KEY (`regulaton_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`tracking_id`),
  ADD KEY `status_fk` (`status`),
  ADD KEY `assinged_fk` (`assigned_id`),
  ADD KEY `admin_fk` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `type_fk` (`type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `innovation`
--
ALTER TABLE `innovation`
  MODIFY `innovation_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prototype`
--
ALTER TABLE `prototype`
  MODIFY `prototype_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `regulation`
--
ALTER TABLE `regulation`
  MODIFY `regulaton_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `tracking_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `type_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `innovation`
--
ALTER TABLE `innovation`
  ADD CONSTRAINT `prototype_fk` FOREIGN KEY (`prototype`) REFERENCES `prototype` (`prototype_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `regulation_fk` FOREIGN KEY (`regulation`) REFERENCES `regulation` (`regulaton_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `innovation` (`innovation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `innovation_fk` FOREIGN KEY (`innovation_id`) REFERENCES `innovation` (`innovation_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assinged_fk` FOREIGN KEY (`assigned_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_fk` FOREIGN KEY (`status`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `type_fk` FOREIGN KEY (`type_id`) REFERENCES `user_types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
