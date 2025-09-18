-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2025 at 03:58 AM
-- Server version: 10.6.23-MariaDB-cll-lve-log
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarsazo_smartdealer`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `Project_id` int(11) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `photo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `Project_id`, `caption`, `description`, `photo`) VALUES
(2, 2, 'fgdgfdgdg', 'hhh', 'civil.jpg'),
(3, 2, 'hffghfhgfghfghfhgfghfgh', 'gdgfdfgdfgdfgd', 'construction-2.jpg'),
(4, 2, 'jhjkhjkhkxcvxvxcv', 'gdgfdfcxcvxcvxeeetrer', 'construction-3.jpg'),
(5, 2, 'ghfhgfghvbcbvcbv', 'jhgjghjgbvcbvcvcbvcbv', 'repairs-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meetin_tbl`
--

CREATE TABLE `meetin_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `date_created` varchar(250) NOT NULL,
  `decisions` varchar(2500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meetin_tbl`
--

INSERT INTO `meetin_tbl` (`id`, `title`, `date_created`, `decisions`) VALUES
(5, 'inama', '2024-05-06', '<p><strong>TWAGIRIMANA Ephron&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nb'),
(6, 'meeting', '2024-05-07', '<p><strong>TWAGIRIMANA Ephron&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kuwa 20/07/2023</strong></p>\r\n\r\n<p><strong>AKARERE KA RUTSIRO</strong></p>\r\n\r\n<p><strong>UMURENGE WA BONEZA</strong></p>\r\n\r\n<p><strong>TEL: 0785247164</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bwana Umuyobozi wa KHA DA</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Impamvu:</strong> Gusaba inguzanyo.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bwana Muyobozi,</p>\r\n\r\n<p>Mbandikiye iyi baruwa ngira ngo mbasabe inguzanyo y&rsquo;amafaranga angana na ibihumbi mirongo itanu (50 Frw), mu kibina mubereye umuyobozi.</p>\r\n\r\n<p>Mubyukuri Bwana Muyobozi, Bank nkoresha ni <strong>Equity</strong> ifite numero<strong> 4008100572476.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>TWAGIRIMANA Ephron</strong></p>\r\n\r\n<p><img src=\"file:///C:/Users/Ephron/AppData/Local/Temp/msohtmlclip1/01/clip_image001.jpg\" style=\"height:45.75pt; margin-left:9px; margin-top:12px; width:94.75pt\" /></p>\r\n\r\n<table align=\"left\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"height:12px; width:9px\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td><img src=\"file:///C:/Users/Ephron/AppData/Local/Temp/msohtmlclip1/01/clip_image002.jpg\" style=\"height:61px; width:126px\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`id`, `project_id`, `image`) VALUES
(1, 10, '1756405527_DSC_6230.JPG'),
(2, 10, '1756408786_DSC_6231.JPG'),
(3, 10, '1756409482_DSC_6238.JPG'),
(4, 10, '1756617131_DSC_6238.JPG'),
(5, 10, '1756621567_DSC_6240.JPG'),
(6, 13, '1756715921_DSC_6230.JPG'),
(7, 14, '1757275923_BARENGAYABO Vedaste 03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `project_list`
--

CREATE TABLE `project_list` (
  `p_id` int(25) NOT NULL,
  `Project_name` varchar(250) NOT NULL,
  `project_manager` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `costomer` varchar(25) NOT NULL,
  `manager` varchar(25) NOT NULL,
  `service` varchar(25) NOT NULL,
  `s_date` date NOT NULL DEFAULT current_timestamp(),
  `E_date` date NOT NULL,
  `report_link` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Not Published'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_list`
--

INSERT INTO `project_list` (`p_id`, `Project_name`, `project_manager`, `description`, `main_image`, `costomer`, `manager`, `service`, `s_date`, `E_date`, `report_link`, `image`, `status`) VALUES
(14, 'CONSTRUCTION OF  A G+1 RESIDENTIAL HOUSE', 'AMIZERO N.Eric', 'Location: , NUGA I VILLAGE,  NUNGA CELL,  GAHANGA SECTOR,  KICUKIRO DISTRICT  KIGALI CITY - RWANDA', '1757275923_BARENGAYABO Vedaste 02.jpg', '', '', '3', '2023-01-01', '2024-01-01', '', '', 'Not Published');

-- --------------------------------------------------------

--
-- Table structure for table `pubulication`
--

CREATE TABLE `pubulication` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `author` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(250) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pubulication`
--

INSERT INTO `pubulication` (`id`, `title`, `author`, `description`, `image`, `created_date`) VALUES
(6, ',babxjhsax', 'acxsdcsc', 'axaasdsscsdcsdcsdcsdc', '1756712639_IBMCertificate.pdf', '2025-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(25) NOT NULL,
  `file_document` varchar(250) NOT NULL,
  `caption` varchar(25) NOT NULL,
  `description` longtext NOT NULL,
  `project_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `file_document`, `caption`, `description`, `project_id`) VALUES
(2, 'ibaruwa kuguza.docx', 'project nshy yubwubatsi', 'rrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvv', 2),
(4, 'KIRINDA HOSPITAL.pdf', 'project nshy yubwubatsi', 'rrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvvvdrrrrrrrrrrttttttttttttttvv', 5);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(25) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`) VALUES
(3, 'Construction of Buildings', 'Smart Dealer Ltd specializes in the construction of residential, commercial, and industrial buildings, delivering projects with high standards of quality, safety, and durability. Our team ensures that every structure is built to meet modern design requirements and client expectations, from foundation to finishing.', '1756879600_construction-crane-and-buildings-icon-illustration-graphic-design-in-black-and-white-free-vector.jpg'),
(17, 'Project Study, Design, and Consultancy', 'We provide comprehensive project studies, innovative designs, and expert consultancy services to guide clients throughout the construction process. Our goal is to deliver practical and sustainable solutions that balance functionality, aesthetics, and cost-effectiveness while ensuring compliance with industry standards.', '1756879882_principles-of-construction-design-1024x699.jpg'),
(19, 'Supply of Construction Materials, Building Furniture, and Others', 'Smart Dealer Ltd supplies a wide range of construction materials, high-quality furniture, and complementary products needed to complete building projects. We source reliable and durable materials to support efficient construction and create functional, well-furnished spaces.', '1756880071_office-furniture-icons-set-simple-style-HXXREH.jpg'),
(20, 'Telecommunication Services', 'With expertise in modern telecommunication technologies, we offer installation, maintenance, and upgrading of telecom systems and infrastructure. Our services support reliable connectivity and network performance for businesses, institutions, and individuals across different sectors.', '1756880196_telecommunication-system-.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `short_desc` text NOT NULL,
  `more_desc` text NOT NULL,
  `short_name` varchar(25) NOT NULL,
  `logo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `short_desc`, `more_desc`, `short_name`, `logo`) VALUES
(1, 'Smart Dealer Ltd is a reputable company operating in the construction industry. ', 'Smart Dealer Ltd is a reputable company operating in the construction industry. Smart Dealer Ltd is a reputable company operating in the construction industry. Smart Dealer Ltd is a reputable company operating in the construction industry.', 'Smart Dealer Ltd', 'DSC_6233.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', NULL, 'Smart Dealer', 'admin', 'admin123', 'uploads/avatar-1.png?v=1635556826', NULL, 1, '2021-01-20 14:02:37', '2025-08-31 14:48:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetin_tbl`
--
ALTER TABLE `meetin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_list`
--
ALTER TABLE `project_list`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pubulication`
--
ALTER TABLE `pubulication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `meetin_tbl`
--
ALTER TABLE `meetin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `project_list`
--
ALTER TABLE `project_list`
  MODIFY `p_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pubulication`
--
ALTER TABLE `pubulication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
