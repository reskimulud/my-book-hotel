-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2021 at 07:42 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my-book-hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `my_booking_rsv`
--

CREATE TABLE `my_booking_rsv` (
  `id` int(11) NOT NULL,
  `nama` varchar(126) NOT NULL,
  `ci_date` varchar(126) NOT NULL,
  `co_date` varchar(126) NOT NULL,
  `cost_current` varchar(126) NOT NULL,
  `cost_total` varchar(126) NOT NULL,
  `address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_booking_rsv`
--

INSERT INTO `my_booking_rsv` (`id`, `nama`, `ci_date`, `co_date`, `cost_current`, `cost_total`, `address`) VALUES
(1, 'Kabin Kapsul Kayu jati I - Hostel', '13 Juli 2021', '15 Juli 2021', 'Rp68.595', 'total Rp166.002 for 2 nights', 'Jl. Raya Mangga Besar No.34A RT.1/RW.2, Jakarta'),
(2, 'Bantal Guling Pasar Baru Bandung', '12 Juli 2021', '15 Juli 2021', 'Rp59.421', 'total Rp215.699 for 3 nights', '51, Jl. Cemara No.51, Pasteur, Sukajadi, Bandung'),
(3, 'KoolKost Syariah near Universitas Kristen Indonesia Paulus', '4 Agustus 2021', '11 Agustus 2021', 'Rp91.292', 'total Rp702.943 for 7 nights', 'Jl. Sungai Saddang Blok C No. 2, Makassar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_booking_rsv`
--
ALTER TABLE `my_booking_rsv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_booking_rsv`
--
ALTER TABLE `my_booking_rsv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
