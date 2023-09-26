-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 04:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `handout_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(50) NOT NULL,
  `employee_name` varchar(25) DEFAULT NULL,
  `employee_id` varchar(25) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` varchar(5) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `bloodgroup` varchar(25) DEFAULT NULL,
  `aadharno` varchar(20) DEFAULT NULL,
  `panno` varchar(10) DEFAULT NULL,
  `contactno` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `datejoined` date DEFAULT NULL,
  `employeestatus` varchar(25) DEFAULT NULL,
  `datereleived` date DEFAULT NULL,
  `currentsalary` varchar(25) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `password_view` varchar(100) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `role` varchar(25) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `profileFileName` varchar(50) DEFAULT NULL,
  `create_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `employee_name`, `employee_id`, `gender`, `dob`, `age`, `address`, `bloodgroup`, `aadharno`, `panno`, `contactno`, `email`, `datejoined`, `employeestatus`, `datereleived`, `currentsalary`, `username`, `password`, `password_view`, `department`, `designation`, `role`, `remarks`, `profileFileName`, `create_date`) VALUES
(6, 'Pretty', '123456', 'female', '1990-02-06', '28', 'chennai', 'O positive', '823456789012', 'WAERv0545C', '1234567890', 'hr@gmail.com', '2021-01-04', '6', '2022-01-17', '50000', 'hr', 'c4ca4238a0b923820dcc509a6f75849b', '1', '9', '1', '2', 'hi this is test  dummy', '30075download-2.png', '2023-09-25 14:14:00.000000'),
(7, 'developer', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'developer', 'c4ca4238a0b923820dcc509a6f75849b', '1', NULL, NULL, '1', NULL, NULL, NULL),
(8, 'senthil', '12345', 'male', '1970-09-13', '40', 'chennai', 'O positive', '823456789018', 'AJSPv0545v', '893912451', 'test111@gmail.com', '2023-09-11', '6', '0000-00-00', '120000', 'senthil', 'c4ca4238a0b923820dcc509a6f75849b', '1', '9', '1', '1', 'hi this is', '', '2023-09-26 15:08:40.000000');

-- --------------------------------------------------------

--
-- Table structure for table `master_cost_guide`
--

CREATE TABLE `master_cost_guide` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_cost_guide`
--

INSERT INTO `master_cost_guide` (`id`, `name`, `create_date`) VALUES
(1, 'Per Page', '2023-09-24 00:00:00.000000'),
(2, 'Per Item', '2023-09-24 00:00:00.000000'),
(3, 'Per Hour', '2023-09-24 00:00:00.000000'),
(4, 'Flat Rate', '2023-09-24 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `master_department`
--

CREATE TABLE `master_department` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_department`
--

INSERT INTO `master_department` (`id`, `name`, `create_date`) VALUES
(2, 'Admin', '0000-00-00'),
(3, 'Art', '0000-00-00'),
(4, 'Composition', '0000-00-00'),
(5, 'Data team', '0000-00-00'),
(6, 'Editorial', '0000-00-00'),
(7, 'R&D', '0000-00-00'),
(8, 'Sales', '0000-00-00'),
(9, 'Others', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `master_designation`
--

CREATE TABLE `master_designation` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_designation`
--

INSERT INTO `master_designation` (`id`, `name`, `create_date`) VALUES
(1, 'Senior Executive', '0000-00-00'),
(2, 'Compositior', '0000-00-00'),
(3, 'Trainee', '0000-00-00'),
(4, 'Business Development', '0000-00-00'),
(5, 'Executive', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `master_employee_location`
--

CREATE TABLE `master_employee_location` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_employee_location`
--

INSERT INTO `master_employee_location` (`id`, `name`, `create_date`) VALUES
(1, 'Internal', '0000-00-00'),
(2, 'External', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `master_employee_status`
--

CREATE TABLE `master_employee_status` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_employee_status`
--

INSERT INTO `master_employee_status` (`id`, `name`, `create_date`) VALUES
(6, 'Working', '0000-00-00'),
(7, 'Resigned', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `master_process`
--

CREATE TABLE `master_process` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_process`
--

INSERT INTO `master_process` (`id`, `name`, `create_date`) VALUES
(5, 'Word-Extraction', '2023-09-24 00:00:00.000000'),
(6, 'HTML-Extraction', '2023-09-24 00:00:00.000000'),
(7, 'URL Link', '2023-09-24 00:00:00.000000'),
(8, 'Image Crop', '2023-09-24 00:00:00.000000'),
(9, 'Clean-up', '2023-09-24 00:00:00.000000'),
(10, 'Tagging', '2023-09-24 00:00:00.000000'),
(11, 'Page-Tag', '2023-09-24 00:00:00.000000'),
(12, 'Image-ID', '2023-09-24 00:00:00.000000'),
(13, 'Spell Check', '2023-09-24 00:00:00.000000'),
(14, 'Styling', '2023-09-24 00:00:00.000000'),
(15, 'Typesetting', '2023-09-24 00:00:00.000000'),
(16, 'Corrections', '2023-09-24 00:00:00.000000'),
(17, 'Revisions', '2023-09-24 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `master_project_status`
--

CREATE TABLE `master_project_status` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_project_status`
--

INSERT INTO `master_project_status` (`id`, `name`, `create_date`) VALUES
(0, 'Open', '2023-09-24 00:00:00.000000'),
(0, 'Closed', '2023-09-24 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `master_role`
--

CREATE TABLE `master_role` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_role`
--

INSERT INTO `master_role` (`id`, `name`, `create_date`) VALUES
(1, 'Manager', '0000-00-00'),
(2, 'HR', '0000-00-00'),
(3, 'Team Leader', '0000-00-00'),
(4, 'Data Executive', '0000-00-00'),
(5, 'Compositor', '0000-00-00'),
(6, 'Illustrator', '0000-00-00'),
(7, 'Content Editor', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `master_stage`
--

CREATE TABLE `master_stage` (
  `id` int(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `create_date` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_stage`
--

INSERT INTO `master_stage` (`id`, `name`, `create_date`) VALUES
(11, 'Copy Editing', '2023-09-24 00:00:00.000000'),
(12, 'Typesetting', '2023-09-24 00:00:00.000000'),
(13, 'Data Convertion', '2023-09-24 00:00:00.000000'),
(14, 'Artwork', '2023-09-24 00:00:00.000000'),
(15, 'Scripting', '2023-09-24 00:00:00.000000'),
(16, 'Animation', '2023-09-24 00:00:00.000000'),
(17, 'Indexing', '2023-09-24 00:00:00.000000'),
(18, 'Miscellaneous', '2023-09-24 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `master_tt_app_status`
--

CREATE TABLE `master_tt_app_status` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_tt_app_status`
--

INSERT INTO `master_tt_app_status` (`id`, `name`, `create_date`) VALUES
(1, 'Approved', '2023-0'),
(2, 'Not Approved', '2023-0');

-- --------------------------------------------------------

--
-- Table structure for table `master_unit_status`
--

CREATE TABLE `master_unit_status` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_unit_status`
--

INSERT INTO `master_unit_status` (`id`, `name`, `create_date`) VALUES
(1, 'YTS', '2023-0'),
(2, 'WIP', '2023-0'),
(3, 'Ready to Invoice', '2023-0'),
(4, 'Invoiced', '2023-0'),
(5, 'Ready to Deliver', '2023-0'),
(6, 'Delivered', '2023-0'),
(7, 'Hold', '2023-0');

-- --------------------------------------------------------

--
-- Table structure for table `master_vendor_po_status`
--

CREATE TABLE `master_vendor_po_status` (
  `id` int(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `create_date` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_vendor_po_status`
--

INSERT INTO `master_vendor_po_status` (`id`, `name`, `create_date`) VALUES
(1, 'Ready to Bill', '2023-0'),
(2, 'Billed', '2023-0'),
(3, 'Hold', '2023-0'),
(4, 'WIP', '2023-0');

-- --------------------------------------------------------

--
-- Table structure for table `page_config`
--

CREATE TABLE `page_config` (
  `id` int(20) NOT NULL,
  `page_name` varchar(50) DEFAULT NULL,
  `page_file_name` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_config`
--

INSERT INTO `page_config` (`id`, `page_name`, `page_file_name`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Activity', 'activity'),
(3, 'Master Dropdown', 'master-dropdown'),
(4, 'Project Management', 'project-management'),
(5, 'Page Config', 'page-config'),
(6, 'Add Employee', 'add-employee');

-- --------------------------------------------------------

--
-- Table structure for table `page_mapping`
--

CREATE TABLE `page_mapping` (
  `id` int(50) NOT NULL,
  `role` int(20) DEFAULT NULL,
  `page_id` int(20) NOT NULL,
  `page_file_name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_mapping`
--

INSERT INTO `page_mapping` (`id`, `role`, `page_id`, `page_file_name`) VALUES
(34, 2, 6, 'add-employee'),
(35, 2, 5, 'page-config');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `employee_name` varchar(50) DEFAULT NULL,
  `employee_location` varchar(50) DEFAULT NULL,
  `employee_id` int(50) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `age` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `aadhar_no` int(15) NOT NULL,
  `pan_number` varchar(10) NOT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `data_joined` date DEFAULT NULL,
  `employee_status` varchar(20) DEFAULT NULL,
  `date_delivered` date DEFAULT NULL,
  `current_salary` varchar(20) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `remarks` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `role_id`, `employee_name`, `employee_location`, `employee_id`, `gender`, `date_of_birth`, `age`, `address`, `blood_group`, `aadhar_no`, `pan_number`, `contact_no`, `email`, `photo`, `data_joined`, `employee_status`, `date_delivered`, `current_salary`, `department`, `designation`, `remarks`) VALUES
(1, 'developer', 'c4ca4238a0b923820dcc509a6f75849b', 'manager', 1, NULL, NULL, NULL, NULL, NULL, 0, '', '', 0, '', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_cost_guide`
--
ALTER TABLE `master_cost_guide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_department`
--
ALTER TABLE `master_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_designation`
--
ALTER TABLE `master_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_employee_location`
--
ALTER TABLE `master_employee_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_employee_status`
--
ALTER TABLE `master_employee_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_process`
--
ALTER TABLE `master_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_role`
--
ALTER TABLE `master_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_stage`
--
ALTER TABLE `master_stage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_tt_app_status`
--
ALTER TABLE `master_tt_app_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_unit_status`
--
ALTER TABLE `master_unit_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_vendor_po_status`
--
ALTER TABLE `master_vendor_po_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_config`
--
ALTER TABLE `page_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_mapping`
--
ALTER TABLE `page_mapping`
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
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_cost_guide`
--
ALTER TABLE `master_cost_guide`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `master_department`
--
ALTER TABLE `master_department`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `master_designation`
--
ALTER TABLE `master_designation`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_employee_location`
--
ALTER TABLE `master_employee_location`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_employee_status`
--
ALTER TABLE `master_employee_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_process`
--
ALTER TABLE `master_process`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `master_role`
--
ALTER TABLE `master_role`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_stage`
--
ALTER TABLE `master_stage`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `master_tt_app_status`
--
ALTER TABLE `master_tt_app_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_unit_status`
--
ALTER TABLE `master_unit_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `master_vendor_po_status`
--
ALTER TABLE `master_vendor_po_status`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `page_config`
--
ALTER TABLE `page_config`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `page_mapping`
--
ALTER TABLE `page_mapping`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
