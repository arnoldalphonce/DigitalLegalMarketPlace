-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 10, 2019 at 08:34 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DLMP`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admin`
--

CREATE TABLE `Admin` (
  `admin_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admin`
--

INSERT INTO `Admin` (`admin_id`, `fullname`, `email`, `password`) VALUES
(2, 'Daudi Morice', 'dmorice@mzumbe.ac.tz', '7e3cd2e805a8ea1f28baaf90cf2c82fa'),
(3, 'Arnold Alphonce', 'aralphonce16@mustudent.ac.tz', '39b86573a6b78f812af1a1d7a927ab95');

-- --------------------------------------------------------

--
-- Table structure for table `Contacts`
--

CREATE TABLE `Contacts` (
  `contact_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `customer_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dateofbirth` int(2) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`customer_id`, `firstname`, `lastname`, `username`, `sex`, `dateofbirth`, `mobile`, `email`, `region`, `password`) VALUES
(18, 'Arnold', 'Alphonce', 'lunnar', 'Male', 23, '0767154582', 'arnold.alphonce@gmail.com', 'mwanza', '39b86573a6b78f812af1a1d7a927ab95'),
(19, 'Maria', 'Alphonce', 'maria', 'Female', 26, '0714567887', 'maria.alphonce@gmail.com', 'Geita', 'f6f330e462e6fcfd2a5d1472215bbe02');

-- --------------------------------------------------------

--
-- Table structure for table `Lawyer`
--

CREATE TABLE `Lawyer` (
  `lawyer_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `region` varchar(200) NOT NULL,
  `about_me` varchar(500) NOT NULL,
  `image_link` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lawyer`
--

INSERT INTO `Lawyer` (`lawyer_id`, `firstname`, `lastname`, `sex`, `status`, `email`, `mobile`, `region`, `about_me`, `image_link`, `password`) VALUES
(1, 'Arnold', 'Alphonce', 'Male', 'Criminal law', 'aralphonce16@mustudent.ac.tz', '0767154582', 'Mwanza', 'Simple minded, heart full problem solver', '23rd_Bday.jpg', '39b86573a6b78f812af1a1d7a927ab95'),
(2, 'Angelina', 'Masawe', 'Female', 'Insurance law', 'angelinamasawe@gmail.com', '0612345671', 'Dar es salaam', 'Wide minded woman who care and follow justice for every single person', 'angelina.png', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Bahati', 'Chilabuko', 'Female', 'Divorce law', 'bahatichilabuko@gmail.com', '0786786876', 'Tanga', 'Gentle, open minded with great ambition of relationship involvement', 'bahati.png', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `message_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `body` varchar(500) NOT NULL,
  `sent_date` varchar(100) NOT NULL,
  `sent_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`message_id`, `customer_id`, `body`, `sent_date`, `sent_time`) VALUES
(50, 18, 'Hello everyone', '2019-06-11', '13:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `Private_message`
--

CREATE TABLE `Private_message` (
  `message_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `lawyer_id` int(11) DEFAULT NULL,
  `body` varchar(500) NOT NULL,
  `sent_date` varchar(100) NOT NULL,
  `sent_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Private_message`
--

INSERT INTO `Private_message` (`message_id`, `customer_id`, `lawyer_id`, `body`, `sent_date`, `sent_time`) VALUES
(1, 18, 1, 'hello!!! i would like to request for an appointment, if its possible', '2019-07-06', '13:27:27'),
(2, 18, 1, 'Ok! i will see what i can do', '2019-07-08', '17:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `Replied_message`
--

CREATE TABLE `Replied_message` (
  `reply_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `body` varchar(500) NOT NULL,
  `sent_date` varchar(500) NOT NULL,
  `sent_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Replied_message`
--

INSERT INTO `Replied_message` (`reply_id`, `message_id`, `sender_id`, `body`, `sent_date`, `sent_time`) VALUES
(33, 50, 19, 'Hi whatsapp', '2019-06-11', '14:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `review_id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `service_rating` varchar(200) NOT NULL,
  `review` varchar(500) NOT NULL,
  `sent_date` varchar(100) NOT NULL,
  `sent_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `Lawyer`
--
ALTER TABLE `Lawyer`
  ADD PRIMARY KEY (`lawyer_id`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `Private_message`
--
ALTER TABLE `Private_message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `Replied_message`
--
ALTER TABLE `Replied_message`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`review_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin`
--
ALTER TABLE `Admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Contacts`
--
ALTER TABLE `Contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Lawyer`
--
ALTER TABLE `Lawyer`
  MODIFY `lawyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `Private_message`
--
ALTER TABLE `Private_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Replied_message`
--
ALTER TABLE `Replied_message`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Private_message`
--
ALTER TABLE `Private_message`
  ADD CONSTRAINT `private_message_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `Customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `private_message_ibfk_2` FOREIGN KEY (`lawyer_id`) REFERENCES `Lawyer` (`lawyer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Replied_message`
--
ALTER TABLE `Replied_message`
  ADD CONSTRAINT `replied_message_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `Messages` (`message_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
