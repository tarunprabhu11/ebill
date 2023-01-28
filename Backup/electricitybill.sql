-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 05:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electricitybill`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `account_no` varchar(25) NOT NULL,
  `electricityboard_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `rr_number` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `cust_id`, `account_no`, `electricityboard_id`, `name`, `address`, `rr_number`, `status`) VALUES
(10, 5, '9876543210', 5, 'Aravinda', 'Mangalore', '7894561230', 'Active'),
(12, 8, '1233445', 4, 'kokila', 'ring road,main streetkotarachouki', '234667878778', 'Active'),
(13, 8, '895623', 7, 'Kokila', 'Vidhya vardhak road,\r\n5th Cross.', '5551236', 'Active'),
(21, 16, '7894561231', 1, 'Peter king', 'Mangalore', '56654782', 'Active'),
(22, 10, '3033005', 1, 'samraksha', 'guruvardak nilaya\r\nnear nandi temple\r\nbanashankari', '7894561230', 'Active'),
(24, 10, '45555554', 1, 'Raj kiran mahesh', 'Mangalore, Bangalore, Mumbai', '7894561230', 'Active'),
(25, 10, '454515212', 1, 'rahina', '2nd floor,nanthoor,\r\nkankanady', '4878454512', 'Active'),
(26, 18, '30889902', 5, 'nisha', 'pumpwell,near main road', '7878252', 'Active'),
(27, 19, '03265', 1, 'Nayak', 'Mangalore', '55986363', 'Active'),
(28, 9, '123456', 4, 'Najumonisha', 'Mangalore', '556644', 'Active'),
(29, 20, '789456123', 9, 'Gangadhar', 'Shviali road', '7984561230', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `login_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `admin_type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `login_id`, `password`, `admin_type`, `status`) VALUES
(1, 'Pratiksha', 'admin', 'adminadminadmin', 'Administrator', 'Active'),
(3, 'Akansha', 'akansha2', '8888', 'Employee', 'Active'),
(4, 'Vandana', 'vandana54', '12569', 'Employee', 'Active'),
(5, 'Shruthi', 'shruthi87', '987456', 'Employee', 'Active'),
(6, 'Buvan', 'buvan88', '985632', 'Employee', 'Active'),
(7, 'Charan', 'charan36', '12389', 'Employee', 'Active'),
(16, 'joseph', 'joseph23', '123456', 'Administrator', 'Active'),
(22, 'Chandan', 'chandu9', '123', 'Employee', 'Active'),
(23, 'Raj kiran', 'rajkiran', 'rajkiran', 'Administrator', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `bill_no` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `account_id` int(10) NOT NULL,
  `electricityboard_id` int(11) NOT NULL,
  `payment_mode` varchar(25) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_time` time NOT NULL,
  `rr_number` varchar(25) NOT NULL,
  `bill_amount` float(10,2) NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `excess_paid` float(10,2) NOT NULL,
  `account_no` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`bill_no`, `cust_id`, `account_id`, `electricityboard_id`, `payment_mode`, `payment_date`, `payment_time`, `rr_number`, `bill_amount`, `paid_amount`, `excess_paid`, `account_no`, `status`) VALUES
(45462, 1, 123456789, 0, 'Debit card', '2015-12-28', '10:39:40', '232545454', 7444.00, 8000.00, 556.00, '0', 'Active'),
(45463, 5, 0, 0, 'VISA', '2016-01-13', '12:03:31', '22222', 123.00, 100.00, 0.00, '0', 'Active'),
(45464, 8, 0, 0, 'Debit card', '2016-02-01', '12:12:01', '', 0.00, 0.00, 0.00, '0', 'Active'),
(45465, 18, 0, 0, 'Debit card', '2016-02-17', '10:07:29', '145236', 250.00, 0.00, 0.00, '0', 'Active'),
(45466, 18, 0, 0, 'Credit card', '2016-02-17', '10:07:51', '586852242', 250.00, 300.00, 50.00, '0', 'Active'),
(45467, 19, 0, 0, 'VISA', '2016-02-17', '10:57:32', '32343', 200.00, 100.00, 100.00, '0', 'Active'),
(45468, 9, 0, 0, 'Credit card', '2016-02-17', '11:22:34', '77777', 100.00, 200.00, 0.00, '0', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `account_type` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(25) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `mobno` varchar(15) NOT NULL,
  `password` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `account_type`, `address`, `state`, `city`, `pincode`, `email_id`, `mobno`, `password`, `status`) VALUES
(3, 'lithin', 'Individual', 'Hirikara,Somwarpet', 'Karnataka', 'Somwarpet', '571236', 'lithin2@gmail.com', '', '222', 'Active'),
(5, 'Divyamani', 'Individual', 'Saklespur', 'Karnataka', 'saklespur', '578753', 'divya45@gmail.com', '', '4567', 'Active'),
(6, 'Mahesh kiran', 'Individual', 'Mangalore', 'Karnataka', 'Mumbai', '574452', 'jaya5@gmail.com', '', '258', 'Active'),
(7, 'Bharath kumar', 'Individual', '3rd floor, n nagar', 'Assam', 'Mangalore', '5789654', 'bharathkumar12@gmail.com', '', '123456', 'Active'),
(8, 'kokila', 'Individual', 'ring road,\r\nmain street\r\nkotarachouki', 'Tamilnadu', 'mangalore', '573456', 'kokila55@gmail.com', '', '5678', 'Active'),
(9, 'namitha', 'Individual', 'devi apartments,\r\nkuladeep road', 'Madhyapradesh', 'belagum', '571889', 'namitha15@gmail.com', '', '1234', 'Active'),
(10, 'samraksha', 'Individual', 'guruvardak nilaya,\nnear nandi temple,\nbanashankari', 'Karnataka', 'hubali', '576889', 'samraksha22@gmail.com', '', '45678', 'Active'),
(11, 'lucky laksh', 'Corporate', 'balabulu nilaya,\r\nmain circle,\r\nkoothy', 'Karnataka', 'somwarpet', '571236', 'lukylaksh3@gmail.com', '', '12340', 'Active'),
(12, 'Najumonisha', 'Individual', 'ballal house,\r\n3rd floor,\r\nmain street', 'Andrapradesh', 'Mysore', '576880', 'najumonisha45@gmail.com', '', '123456', 'Active'),
(16, 'Peter king', 'Individual', '3rd floor, city light building, mangalore', 'Karnataka', 'Jyothi', '675332', 'peterking@gmail.com', '', '123456789', 'Active'),
(18, 'nisha', 'Individual', 'pumpwell, near main road', 'Karnataka', 'mangalore2', '571222', 'nisha33@gmail.com', '', '123456', 'Active'),
(19, 'Chaithra', 'Individual', 'Bendoor well, Kankanady', 'Karnataka', 'Mangalore', '574120', 'chaithra@gmail.com', '', '123', 'Active'),
(20, 'Gangadhhar kumar', 'Individual', 'Fizal Road', 'Karnataka', 'Mangalore', '589674', 'gangadharkumar12@gmail.co', '7984561230', '123456789', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `electricityboard`
--

CREATE TABLE `electricityboard` (
  `electricityboard_id` int(10) NOT NULL,
  `electricityboard` varchar(25) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electricityboard`
--

INSERT INTO `electricityboard` (`electricityboard_id`, `electricityboard`, `logo`, `note`, `status`) VALUES
(1, 'MESCOM', '19172mescom.jpg', 'Mangalore Electricity Supply Company Limited\nMangalore Electricity Supply Company is an Indian electricity supplier to the districts of Karnataka namely Dakshina Kannada, Udupi district, Chickmagalur and Shimoga. It has its headquarters at Mangalore', 'active'),
(4, 'BESCOM', '5576BESCOM.jpg', 'mangalore Electricity supply company Ltd.BESCOM is responsible for power distribution in 8 districts of Karnataka. BESCOM covers an area of 41,092 Sq. Kms. with a population', 'active'),
(5, 'Reliance Energy', '20441rel-power.jpg', 'Pay your energy bills using Visa Card, MasterCard, American Express and Diners Credit & Debit Cards. Maximum limit for payment via cards', 'active'),
(9, 'Coil', '1745782088maxresdefault (1).jpg', 'Coil', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `feedback` text NOT NULL,
  `feedback_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `cust_id`, `feedback`, `feedback_date`, `status`) VALUES
(3, 3, 'This Website is really an exceptional one. It must be called as Super Website.', '2020-12-20', 'Approved'),
(4, 5, 'One of the best applications for online transactions.', '2020-12-20', 'Approved'),
(5, 6, 'This is test feed back created by admin\r\n', '2020-12-20', 'Approved'),
(6, 8, 'Great! Nice experience of transferring rent to the landlord just with a small amount of an affordable fee! Would recommend to go ahead with for all concerned! Earlier, it was always a challenge to arrange money before the salary day but by this apo things have turned down to my pleasure!', '2016-01-25', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(10) NOT NULL,
  `electricityboard_id` int(10) NOT NULL,
  `account_no` varchar(25) NOT NULL,
  `readingdate` date NOT NULL,
  `bill_no` varchar(25) NOT NULL,
  `present_reading` int(10) NOT NULL,
  `previous_reading` int(10) NOT NULL,
  `consumption_unit` float(10,2) NOT NULL,
  `fixed_charge` float(10,2) NOT NULL,
  `energry_charge` float(10,2) NOT NULL,
  `tax` float(10,2) NOT NULL,
  `bill_amount` float(10,2) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `previous_balance` float(10,2) NOT NULL,
  `interest_pre_balance` float(10,2) NOT NULL,
  `others` float(10,2) NOT NULL,
  `credit` float(10,2) NOT NULL,
  `consession` float(10,2) NOT NULL,
  `net_amount` float(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `electricityboard_id`, `account_no`, `readingdate`, `bill_no`, `present_reading`, `previous_reading`, `consumption_unit`, `fixed_charge`, `energry_charge`, `tax`, `bill_amount`, `interest`, `previous_balance`, `interest_pre_balance`, `others`, `credit`, `consession`, `net_amount`, `due_date`, `status`) VALUES
(49, 32, '254242', '2016-02-01', '34244', 2016, 2016, 25244.00, 25.22, 2554.00, 414.00, 254.22, 2.10, 23.00, 2.00, 455.00, 14.00, 21.00, 23.00, '2016-02-10', 'active'),
(50, 32, '254242', '2016-02-01', '34244', 2016, 2016, 25244.00, 25.22, 2554.00, 414.00, 254.22, 2.10, 23.00, 2.00, 455.00, 14.00, 21.00, 23.00, '2016-02-10', 'active'),
(51, 4, '45457', '2016-02-01', '789789', 2016, 2016, 450.40, 45.00, 4.00, 45.00, 100.00, 78.00, 100.00, 56.00, 1.00, 41.00, 10.00, 200.00, '2016-02-10', 'active'),
(52, 15, '303300523', '2016-02-01', '63633', 2016, 2016, 450.40, 55.00, 87.00, 55.00, 120.00, 200.00, 122.00, 20.00, 12.00, 22.00, 10.00, 100.00, '2016-02-15', 'active'),
(53, 32, '45854', '2016-02-01', '55454', 2016, 2016, 450.40, 222.00, 45.00, 4.00, 45.00, 5.00, 78.00, 455.00, 4.00, 14.00, 444.00, 255.00, '2016-02-10', 'active'),
(54, 32, '45854', '2016-02-01', '55454', 2016, 2016, 450.40, 222.00, 45.00, 4.00, 45.00, 5.00, 78.00, 455.00, 4.00, 14.00, 444.00, 255.00, '2016-02-10', 'active'),
(55, 5, '7777', '2016-02-01', '7877', 2016, 2016, 12.00, 54.00, 23.00, 21.00, 512.00, 12.00, 231.00, 2.00, 2.00, 2.30, 22.00, 142.00, '2016-02-10', 'active'),
(56, 9, '789456123', '2021-07-17', '56', 250, 0, 250.00, 100.00, 4500.00, 652.50, 5252.50, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5252.50, '2021-08-01', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tariff`
--

CREATE TABLE `tariff` (
  `tariff_id` int(10) NOT NULL,
  `electricityboard_id` int(10) NOT NULL,
  `tariff_type` varchar(50) NOT NULL,
  `f_unit` float(10,2) NOT NULL,
  `t_unit` float(10,2) NOT NULL,
  `tariff_cost` float(10,2) NOT NULL,
  `tariff_description` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tariff`
--

INSERT INTO `tariff` (`tariff_id`, `electricityboard_id`, `tariff_type`, `f_unit`, `t_unit`, `tariff_cost`, `tariff_description`, `status`) VALUES
(12, 5, 'BLR3', 0.00, 0.00, 0.00, 'This is bolliyar bill payment', ''),
(13, 35, 'ghgjhj25', 1.00, 10.00, 1.50, 'bvbv', 'active'),
(14, 31, 'GDL20', 1.00, 100.00, 1.50, 'fbfbfgb\r\nhmhbm', 'active'),
(15, 31, 'GDL20', 1.00, 100.00, 1.50, 'fbfbfgb\r\nhmhbm', 'active'),
(16, 4, 'GLD24', 2.00, 200.00, 2.50, 'fbcvbb', 'active'),
(17, 1, 'Tariff100', 0.00, 100.00, 2.50, 'This is test tariff', 'active'),
(18, 1, 'Tariff200', 101.00, 300.00, 5.00, 'Tariff200 plan', 'active'),
(19, 1, 'Tariff300', 301.00, 500.00, 10.00, 'Test tariff', 'active'),
(20, 1, 'Tariff500plus', 501.00, 0.00, 15.00, 'Test tariff', 'active'),
(21, 9, 'FirstCoil', 0.00, 100.00, 10.00, 'First Coil tariff', 'active'),
(22, 9, 'SecondCoil', 101.00, 200.00, 20.00, 'Second Coil', 'active'),
(23, 9, 'Third Coil', 201.00, 2000.00, 30.00, 'Third Coil', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- Indexes for table `electricityboard`
--
ALTER TABLE `electricityboard`
  ADD PRIMARY KEY (`electricityboard_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`tariff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `bill_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45469;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `electricityboard`
--
ALTER TABLE `electricityboard`
  MODIFY `electricityboard_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tariff`
--
ALTER TABLE `tariff`
  MODIFY `tariff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
