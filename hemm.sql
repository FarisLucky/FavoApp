-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 06:39 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hemm`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getDatas` (IN `produk` VARCHAR(100), IN `harga` INT(11))  NO SQL
BEGIN 
	SELECT * FROM product WHERE product_name =produk AND price = harga;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getProduk` (IN `nama` VARCHAR(100))  NO SQL
BEGIN
	SELECT * FROM product WHERE product_name = nama;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `setData` (IN `name` VARCHAR(50))  NO SQL
BEGIN
	SELECT * FROM product WHERE product_kd = name;
END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `get_data` (`product_kd` VARCHAR(10)) RETURNS VARCHAR(100) CHARSET latin1 NO SQL
BEGIN
	DECLARE NM VARCHAR(100);
    SELECT product.product_name FROM orders INNER JOIN product ON product.product_kd = orders.product_kd WHERE orders.product_kd = product_kd INTO NM;
    RETURN NM;
    END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `get_rata` (`p_nim` VARCHAR(10)) RETURNS INT(11) NO SQL
RETURN (SELECT AVG(tbl_nilai.nilai) FROM tbl_nilai WHERE tbl_nilai.nim = p_nim)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_phone`) VALUES
(1, 'terserah', '082654778987'),
(2, 'terserah ya', '082654778987');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_kd` varchar(10) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_kd`, `order_date`, `customer_id`) VALUES
(1, 'PRD2E00001', '2019-03-12', 1),
(2, 'PRD2E00002', '2019-03-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_kd` varchar(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_kd`, `product_name`, `price`, `quantity`) VALUES
('PRD2E00001', 'mie sedap', 2500, 20),
('PRD2E00002', 'okky jelly drink', 1000, 30),
('PRD2E00003', 'Jasjus', 2500, 20),
('PRD2E00004', 'Marjan Sari', 15000, 20),
('sdf', 'sdf', 1312, 123),
('sdfs', 'dsf', 213, 213),
('wer', 'sdf', 321, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `kd_nilai` varchar(5) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kd_matkul` varchar(6) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`kd_nilai`, `nim`, `kd_matkul`, `nilai`) VALUES
('N01', 'E31112342', 'P0001', 80),
('N02', 'E31112345', 'P0001', 50),
('N03', 'E31112345', 'T0001', 80),
('N04', 'E31112342', 'T0001', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbmhs`
--

CREATE TABLE `tbmhs` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbmhs`
--

INSERT INTO `tbmhs` (`id`, `nim`, `nama`, `email`) VALUES
(9, '55201120004', 'fahmiffa', 'hp@yahoo.com'),
(10, '55201120007', 'Abdul Ghoni', 'ghoni@gmail.com'),
(11, '55201120005', 'Najih Za', 'za@gmail.com'),
(13, '3244334324', 'saddasasdsa', 'asdas@fsd.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'faris', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_kd` (`product_kd`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_kd`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`kd_nilai`);

--
-- Indexes for table `tbmhs`
--
ALTER TABLE `tbmhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbmhs`
--
ALTER TABLE `tbmhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
