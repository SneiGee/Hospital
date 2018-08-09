-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2018 at 08:14 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblogsite_hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE IF NOT EXISTS `accountant` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `name`, `email`, `password`, `address`, `phone`, `profile`, `register_time`) VALUES
(1, ' Accountant Name', 'accountant@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'address', '1234567890', '', '2018-02-15 04:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `email`, `password`, `address`, `phone`, `profile`, `register_date`) VALUES
(1, 'Mr Administrator New', 'administrator@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '1234567890', '', '2018-02-14 02:18:53');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE IF NOT EXISTS `bed` (
  `id` int(11) NOT NULL,
  `bed_number` varchar(255) NOT NULL,
  `bed_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`id`, `bed_number`, `bed_type`, `description`, `register_time`) VALUES
(1, '1', 'Ward', 'description of bed for all patient', '2018-02-17 16:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `bedallotment`
--

CREATE TABLE IF NOT EXISTS `bedallotment` (
  `id` int(11) NOT NULL,
  `bed_numberType` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `allotmentTime` varchar(255) NOT NULL,
  `dischargeTime` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bedallotment`
--

INSERT INTO `bedallotment` (`id`, `bed_numberType`, `patient_name`, `allotmentTime`, `dischargeTime`, `register_time`) VALUES
(1, '1 - ward', 'New Patient Name', '2018-02-06', '2018-02-13', '2018-02-17 11:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `birth_report`
--

CREATE TABLE IF NOT EXISTS `birth_report` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birth_report`
--

INSERT INTO `birth_report` (`id`, `doctor_name`, `patient_name`, `description`, `date`, `register_time`) VALUES
(1, 'Doctor  Name', 'New Patient Name', 'description of birth', '2018-02-01', '2018-02-17 13:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank`
--

CREATE TABLE IF NOT EXISTS `blood_bank` (
  `id` int(11) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_bank`
--

INSERT INTO `blood_bank` (`id`, `blood_group`, `status`, `register_time`) VALUES
(1, 'A+', '1', '2018-02-17 22:43:58'),
(2, 'A-', '', '2018-02-17 22:43:58'),
(3, 'B+', '3', '2018-02-17 22:43:58'),
(4, 'B-', '', '2018-02-17 22:43:58'),
(5, 'AB+', '', '2018-02-17 22:43:58'),
(6, 'AB-', '', '2018-02-17 22:43:58'),
(7, 'O+', '', '2018-02-17 22:43:58'),
(8, 'O-', '', '2018-02-17 22:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

CREATE TABLE IF NOT EXISTS `blood_donor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `age` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `donationDate` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_donor`
--

INSERT INTO `blood_donor` (`id`, `name`, `email`, `address`, `phone`, `age`, `sex`, `blood_group`, `donationDate`, `register_time`) VALUES
(1, 'Name of donoation', 'donation@gmail.com', 'Accra Kumasi 147 block', '1222222222', '45', 'Female', 'Female', '2018-02-28', '2018-02-17 23:22:02'),
(2, 'Name of donoation', 'donation@gmail.com', 'Accra Kumasi 147 block', '1222222222', '45', 'Female', 'Female', '2018-02-28', '2018-02-17 23:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `caretaker`
--

CREATE TABLE IF NOT EXISTS `caretaker` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caretaker`
--

INSERT INTO `caretaker` (`id`, `name`, `email`, `password`, `address`, `phone`, `profile`, `register_time`) VALUES
(1, 'CareTaker Name', 'careTaker@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'address', '4444444444', '', '2018-02-15 04:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `caretaker_duties`
--

CREATE TABLE IF NOT EXISTS `caretaker_duties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `dayStart` varchar(255) NOT NULL,
  `dayEnd` varchar(255) NOT NULL,
  `dateStart` varchar(255) NOT NULL,
  `dateEnd` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `death_report`
--

CREATE TABLE IF NOT EXISTS `death_report` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `death_report`
--

INSERT INTO `death_report` (`id`, `doctor_name`, `patient_name`, `description`, `date`, `register_time`) VALUES
(1, 'Doctor  Name', 'New Patient Name', 'description of death', '2018-02-20', '2018-02-17 13:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `departmentfiles`
--

CREATE TABLE IF NOT EXISTS `departmentfiles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departmentfiles`
--

INSERT INTO `departmentfiles` (`id`, `name`, `description`, `register_time`) VALUES
(1, 'Pharmacy', 'This department... this is the department description. a whole lot.', '2018-02-14 23:42:11');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE IF NOT EXISTS `diagnosis` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `laboratory_date` varchar(255) NOT NULL,
  `laboratorist_name` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `patient_name`, `report_type`, `document_type`, `file`, `description`, `laboratory_date`, `laboratorist_name`, `register_time`) VALUES
(1, 'New Patient Name', 'x-ray', 'pdf', 'Project Documentation.odt', 'this the description', '2018-02-22', 'Laboratorist Name', '2018-02-22 03:14:28'),
(2, 'New Patient Name', 'x-ray', 'pdf', 'Project Documentation.odt', 'this the description', '2018-02-22', 'Laboratorist Name', '2018-02-22 03:15:44'),
(3, 'New Patient Name', 'x-ray', 'pdf', 'Project Documentation.odt', 'this the description', '2018-02-22', 'Laboratorist Name', '2018-02-22 03:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `doctor_address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `department`, `email`, `password`, `doctor_address`, `phone`, `profile`, `register_time`) VALUES
(2, 'Doctor New Name', 'Pharmacy', 'doctor@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Accra Location 47 block v', '1234567890', '', '2018-02-15 01:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointment`
--

CREATE TABLE IF NOT EXISTS `doctor_appointment` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_department` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `appointment_date` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_prescription`
--

CREATE TABLE IF NOT EXISTS `doctor_prescription` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `case_history` varchar(255) NOT NULL,
  `medication` varchar(255) NOT NULL,
  `medicationfrom_pharmacist` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prescription_date` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guard`
--

CREATE TABLE IF NOT EXISTS `guard` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(25) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guard`
--

INSERT INTO `guard` (`id`, `name`, `email`, `password`, `address`, `phone`, `profile`, `register_time`) VALUES
(1, 'Guard Name', 'guard@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'address', '1234567890', '', '2018-02-15 04:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `method` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE IF NOT EXISTS `laboratory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `name`, `email`, `password`, `address`, `phone`, `profile`, `register_time`) VALUES
(1, 'Laboratorist Name', 'laboratory@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'address', '1234567890', '', '2018-02-15 03:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE IF NOT EXISTS `medication` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `total_medicine` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `medicine_name`, `doctor_name`, `total_medicine`, `date`, `status`, `register_time`) VALUES
(1, 'T-bla bla ame', 'Doctor New Name', '12', '2018-02-20', 'Pending', '2018-02-19 14:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `id` int(11) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `manufacturing_company` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `medicine_name`, `category_name`, `description`, `price`, `manufacturing_company`, `date`, `status`, `register_time`) VALUES
(1, 'T-bla bla ame', 'Cough', 'this medicine is really coool', '$45', 'Not yet founded', '2018-02-14', 'Available', '2018-02-19 13:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE IF NOT EXISTS `medicine_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `name`, `description`, `register_time`) VALUES
(1, 'Cough', 'cough description goes', '2018-02-19 12:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE IF NOT EXISTS `noticeboard` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notice` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `year` year(4) NOT NULL,
  `mytime` varchar(255) NOT NULL,
  `promp` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE IF NOT EXISTS `nurses` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `name`, `email`, `password`, `address`, `phone`, `profile`, `register_time`) VALUES
(1, 'Nurse Name', 'nurse@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'London UK 54 block C', '1234567890', '', '2018-02-15 02:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `onduties`
--

CREATE TABLE IF NOT EXISTS `onduties` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `dayStart` varchar(255) NOT NULL,
  `dayEnd` varchar(255) NOT NULL,
  `dateStart` varchar(255) NOT NULL,
  `dateEnd` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operation_report`
--

CREATE TABLE IF NOT EXISTS `operation_report` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operation_report`
--

INSERT INTO `operation_report` (`id`, `description`, `date`, `patient_name`, `doctor_name`, `register_time`) VALUES
(1, 'description of operation', '2018-02-08', 'New Patient Name', 'Doctor  Name', '2018-02-17 12:48:36'),
(2, 'description of operation', '2018-02-08', 'New Patient Name', 'Doctor  Name', '2018-02-17 12:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `other_report`
--

CREATE TABLE IF NOT EXISTS `other_report` (
  `id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_report`
--

INSERT INTO `other_report` (`id`, `doctor_name`, `patient_name`, `description`, `date`, `register_time`) VALUES
(1, 'Doctor  Name', 'New Patient Name', 'description of other report', '2018-02-27', '2018-02-17 13:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `age` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `address`, `phone`, `profile`, `sex`, `date`, `age`, `blood_group`, `register_time`) VALUES
(1, 'New Patient Name', 'patient@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Accra Kumasi 147 block', '1212121212', '', 'Female', '2018-02-01', '31', 'B-', '2018-02-17 01:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE IF NOT EXISTS `pharmacist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `name`, `email`, `password`, `address`, `phone`, `profile`, `register_time`) VALUES
(1, 'Pharmacist Name', 'pharmacist@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'London UK 54 block C', '1234567890', '', '2018-02-15 03:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `systemsettings`
--

CREATE TABLE IF NOT EXISTS `systemsettings` (
  `id` int(11) NOT NULL,
  `systemName` varchar(255) NOT NULL,
  `systemTitle` varchar(255) NOT NULL,
  `systemEmail` varchar(255) NOT NULL,
  `systemAddress` varchar(255) NOT NULL,
  `systemPhone` varchar(255) NOT NULL,
  `systemPaypal` varchar(255) NOT NULL,
  `systemCurrency` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemsettings`
--

INSERT INTO `systemsettings` (`id`, `systemName`, `systemTitle`, `systemEmail`, `systemAddress`, `systemPhone`, `systemPaypal`, `systemCurrency`, `register_time`) VALUES
(1, 'Hospital Management System', 'Hospital Management', '', '', '', '', 'Dollar', '2018-02-15 02:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `tvcamera`
--

CREATE TABLE IF NOT EXISTS `tvcamera` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `dayStart` varchar(255) NOT NULL,
  `dayEnd` varchar(255) NOT NULL,
  `dateStart` varchar(255) NOT NULL,
  `dateEnd` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `register_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bedallotment`
--
ALTER TABLE `bedallotment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_report`
--
ALTER TABLE `birth_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_bank`
--
ALTER TABLE `blood_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caretaker`
--
ALTER TABLE `caretaker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caretaker_duties`
--
ALTER TABLE `caretaker_duties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `death_report`
--
ALTER TABLE `death_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departmentfiles`
--
ALTER TABLE `departmentfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_prescription`
--
ALTER TABLE `doctor_prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guard`
--
ALTER TABLE `guard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `onduties`
--
ALTER TABLE `onduties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operation_report`
--
ALTER TABLE `operation_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_report`
--
ALTER TABLE `other_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `systemsettings`
--
ALTER TABLE `systemsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvcamera`
--
ALTER TABLE `tvcamera`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bedallotment`
--
ALTER TABLE `bedallotment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `birth_report`
--
ALTER TABLE `birth_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blood_bank`
--
ALTER TABLE `blood_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `blood_donor`
--
ALTER TABLE `blood_donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `caretaker`
--
ALTER TABLE `caretaker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `caretaker_duties`
--
ALTER TABLE `caretaker_duties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `death_report`
--
ALTER TABLE `death_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departmentfiles`
--
ALTER TABLE `departmentfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_prescription`
--
ALTER TABLE `doctor_prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guard`
--
ALTER TABLE `guard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `onduties`
--
ALTER TABLE `onduties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `operation_report`
--
ALTER TABLE `operation_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `other_report`
--
ALTER TABLE `other_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `systemsettings`
--
ALTER TABLE `systemsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tvcamera`
--
ALTER TABLE `tvcamera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
