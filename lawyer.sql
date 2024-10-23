-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 09:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `ID` int(11) NOT NULL,
  `AboutUs` text DEFAULT NULL,
  `WhoWeAre` text DEFAULT NULL,
  `OurPhilosophy` text DEFAULT NULL,
  `OurExpertise` text DEFAULT NULL,
  `OurCommitment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`ID`, `AboutUs`, `WhoWeAre`, `OurPhilosophy`, `OurExpertise`, `OurCommitment`) VALUES
(1, 'We are Elite Lawyer We provide you THe best lawfirm Website serivice', 'ELite Lawyers, we are more than just a law firm; we are a team of highly skilled legal professionals committed to achieving exceptional results for our clients. With a combined experience of over [X] years, our attorneys have handled a diverse range of legal matters, from complex litigation to straightforward legal issues.', 'ELite Lawyers  is simple: Provide top-notch legal services with integrity, transparency, and a personal touch. We understand that navigating the legal system can be overwhelming, which is why we prioritize clear communication and personalized attention. Our goal is to make sure you feel informed, supported, and confident every step of the way.', 'Our practice areas include:Criminal Defense: Protecting your rights and freedom with aggressive defense strategies.Family Law: Guiding you through sensitive matters with compassion and expertise.Personal Injury: Advocating for fair compensation when you’ve been wronged or injured.Business Law: Offering sound legal advice to help your business thrive and stay compliant.Real Estate Law: Ensuring smooth transactions and protecting your property interests.', 'At Elite Lawyers , we believe in delivering results that exceed expectations. We take pride in our thorough preparation, meticulous attention to detail, and unwavering dedication to our clients. Every case is treated with the utmost respect and priority, and we strive to achieve the best possible outcome for each individual client.');

-- --------------------------------------------------------

--
-- Table structure for table `admin_registers`
--

CREATE TABLE `admin_registers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_registers`
--

INSERT INTO `admin_registers` (`id`, `firstname`, `lastname`, `email`, `password`, `status`) VALUES
(3, 'hunaina', 'asim', 'saim@gmail.com', '123', 'approved'),
(4, 'hunaina', 'asim', 'admin@gmail.com', '123', 'approved'),
(5, 'hunaina', 'asim', 'saim123@gmail.com', '123', 'pending'),
(6, 'hunaina', 'asim', 'saim@ghgmail.com', '56', 'pending'),
(7, 'hunaina', 'asim', 'saim@sdgmail.com', 'sd', 'pending'),
(9, 'talha', 'khan', 'abddullah@gmail.com', '123', 'approved'),
(10, 'Saim', 'Raza', 'abddullah123@gmail.com', '123', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `home_phone` varchar(15) DEFAULT NULL,
  `lawyer_name` varchar(50) NOT NULL,
  `work_phone` varchar(15) DEFAULT NULL,
  `name_on_card` varchar(100) DEFAULT NULL,
  `credit_card_number` varchar(20) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `pay_status` varchar(255) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `lawyer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `full_name`, `email`, `city`, `home_phone`, `lawyer_name`, `work_phone`, `name_on_card`, `credit_card_number`, `amount`, `cvv`, `status`, `pay_status`, `client_id`, `lawyer_id`) VALUES
(7, 'Chapattii', 'saim@gmail.com', 'new york ', NULL, 'hunaina', '123', 'ew', '3223434', 450, 'we', 'pending', 'Paid', NULL, NULL),
(8, 'Chapattii', 'saim@gmail.com', 'new york ', NULL, 'hunaina', '7', 'hunaina asim', '7', 450, '7', 'pending', '', NULL, NULL),
(9, 'Chapattii', 'saim@gmail.com', 'new york ', NULL, 'hunaina', '34', '3434', '', 0, '', 'pending', '', NULL, NULL),
(10, 'Chapattii', 'saim@gmail.com', 'new york ', NULL, 'hunaina', '67', '', '76', 0, '', 'pending', '', NULL, NULL),
(11, 'Talha', 'talha@gmail.com', 'lohore ', NULL, 'Saim', '12311', 'hunaina asim', '54645', 250, '4563', 'pending', 'Paid', NULL, NULL),
(12, 'Saim', 'saim123@gmail.com', 'new york ', NULL, 'Abudullah', '546456456', 'hunaina asim', '45645645', 250, '4564', 'pending', 'Paid', NULL, NULL),
(13, 'saim', 'saim@gmail.com', 'lohore ', NULL, 'Mahnoor', '03215469852', 'hunaina asim', '1212554656', 250, '1234', 'approved', 'Paid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `review`) VALUES
(1, 'John Doe', 'Exceptional service! Hunainaessica Thompson and their team delivered a winning outcome for my case.'),
(2, 'Jane Smith', 'Saimily Anderson was instrumental in our case\'s success - highly recommend!'),
(3, 'Bob Johnson', 'Professional, knowledgeable, and dedicated - Sarah Martinez exceeded our expectations!'),
(4, 'Alice Brown', 'Olivia Brown and their team are the best - they truly care about their clients!'),
(5, 'Mike Davis', 'Top-notch legal representation - Sophia Wilson was a game-changer for our case!'),
(6, 'Emily Chen', 'Isabella Garcia and their team are experts in their field - highly recommend!'),
(7, 'David Lee', 'Exceptional results and outstanding service - Ava Lee is the best!'),
(8, 'Sophia Patel', 'Hunainaessica Thompson was fantastic to work with - highly recommend for any legal needs!');

-- --------------------------------------------------------

--
-- Table structure for table `client_cases`
--

CREATE TABLE `client_cases` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lawyer_name` varchar(100) DEFAULT NULL,
  `cnic` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `case_name` varchar(100) DEFAULT NULL,
  `time` varchar(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `case_detail` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `pay_status` varchar(50) NOT NULL,
  `lawyer_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_cases`
--

INSERT INTO `client_cases` (`id`, `name`, `lawyer_name`, `cnic`, `email`, `phone`, `city`, `case_name`, `time`, `date`, `case_detail`, `status`, `pay_status`, `lawyer_id`, `client_id`) VALUES
(16, 'saim', 'Mahnoor', '654545', 'saim@gmail.com', '03272132738', 'lohore', 'criminal', NULL, '2024-08-05 07:02:19', ' MY BROTHER KILLEDMY MOM INEEDA STRONG LAWYER LIKEYOU', 'Done', 'Paid', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_registers`
--

CREATE TABLE `client_registers` (
  `id` int(11) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `First_name` varchar(50) DEFAULT NULL,
  `Last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_registers`
--

INSERT INTO `client_registers` (`id`, `UserName`, `First_name`, `Last_name`, `email`, `password`, `image`) VALUES
(18, 'Chapatti', 'saim', 'raza', 'chapatti@gmail.com', '$2y$10$vMEXZQ47gN5OhWL05fNVletLjFxMoNlwZgMHg7hzcFM5WdTZnkuSi', 'Elite-Lawyers.png'),
(19, 'saim', 'saim', 'raza', 'saim123@gmail.com', '$2y$10$KaQKlUv4eqvufeC7g5NO2..n4N0mE1IOP5vpm5sMwtSHqPDfJISRG', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dash_lawyers`
--

CREATE TABLE `dash_lawyers` (
  `id` int(11) NOT NULL,
  `total_lawyers` int(11) NOT NULL,
  `pending_cases` int(11) NOT NULL,
  `won_cases` int(11) NOT NULL,
  `happy_clients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dash_lawyers`
--

INSERT INTO `dash_lawyers` (`id`, `total_lawyers`, `pending_cases`, `won_cases`, `happy_clients`) VALUES
(1, 1221, 1200, 6540, 2984);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `Address`, `Phone`, `email`) VALUES
(1, 'Borad Office near dilpasand sweets karachi ,pakistan', '03242125236', 'EliteLawyers@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` varchar(255) DEFAULT '250',
  `image` text DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`id`, `name`, `email`, `type`, `description`, `price`, `image`, `password`, `status`) VALUES
(1, 'Hunaina', 'saim@gmail.com', 'Divorce Lawyer', 'No I am Not\r\n', '450', 'assets/images/uploaded_img/blog-3.jpg', '123', 'approved'),
(2, 'Jessica Thompson', '', 'Criminal', 'Experienced in handling serious felonies.', '400', 'https://img.freepik.com/free-photo/attractive-caucasian-businesswoman-with-folder_144627-253.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(3, 'saimily Anderson', '', 'Criminal', 'Skilled in white-collar crime defense.', '375', 'https://img.freepik.com/free-photo/serious-businesswoman-reading-papers_74855-5113.jpg?t=st=1720162380~exp=1720165980~hmac=7a0c828ec22aac93bb1050c69337f2c2af689b3f65060ebb711988136049ec28&w=740', '', 'approved'),
(4, 'Sarah Martinez', '', 'Criminal', 'Aggressive defense strategies for clients.', '350', '\nhttps://img.freepik.com/free-photo/front-view-business-woman-with-clipboard_23-2148427080.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(5, 'Olivia Brown', '', 'Criminal', 'Specializes in drug-related offense defenses.', '380', 'https://img.freepik.com/free-photo/businesswoman-posing_23-2148142829.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user\n', '', 'approved'),
(6, 'Sophia Wilson', '', 'Criminal', 'Known for successful outcomes in theft cases.', '360', 'https://img.freepik.com/free-photo/medium-shot-woman-working-as-lawyer_23-2151151943.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(7, 'Isabella Garcia', '', 'Criminal', 'Dedicated to defending clients in assault cases.', '390', 'https://img.freepik.com/free-photo/medium-shot-woman-working-as-lawyer_23-2151152406.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(8, 'Ava Lee', '', 'Criminal', 'Expertise in juvenile criminal defense.', '370', 'https://img.freepik.com/free-photo/attractive-caucasian-businesswoman-with-folder_144627-253.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_userhttps://img.freepik.com/free-photo/medium-shot-woman-working-as-real-estate-agent_23-2151064969.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_userhttps://img.freepik.com/free-photo/serious-businesswoman-reading-papers_74855-5113.jpg?t=st=1720162380~exp=1720165980~hmac=7a0c828ec22aac93bb1050c69337f2c2af689b3f65060ebb711988136049ec28&w=740', '', 'approved'),
(9, 'Mia Hernandez', '', 'Criminal', 'Experienced in handling DUI cases.', '355', 'https://img.freepik.com/free-photo/serious-businesswoman-reading-papers_74855-5113.jpg?t=st=1720162380~exp=1720165980~hmac=7a0c828ec22aac93bb1050c69337f2c2af689b3f65060ebb711988136049ec28&w=740', '', 'approved'),
(10, 'Amelia Robinson', '', 'Divorce', 'Specializes in high-net-worth divorce cases.', '450', 'https://img.freepik.com/free-photo/front-view-business-woman-with-clipboard_23-2148427080.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(11, 'Harper Clark', '', 'Divorce', 'Advocates for fair child custody agreements.', '410', 'https://img.freepik.com/free-photo/businesswoman-posing_23-2148142829.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(12, 'Evelyn Lewis', '', 'Divorce', 'Skilled in complex property division cases.', '430', 'https://img.freepik.com/free-photo/medium-shot-woman-working-as-lawyer_23-2151151943.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(13, 'Abigail Walker', '', 'Divorce', 'Known for negotiating amicable divorce settlements.', '400', 'https://img.freepik.com/free-photo/medium-shot-woman-working-as-lawyer_23-2151152406.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(14, 'Ella Hall', '', 'Divorce', 'Experienced in handling divorce cases with compassion.', '420', 'https://img.freepik.com/free-photo/attractive-caucasian-businesswoman-with-folder_144627-253.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(15, 'Charlotte Young', '', 'Divorce', 'Provides expert guidance on spousal support.', '385', 'https://img.freepik.com/free-photo/front-view-lawyer-portrait_23-2151202373.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(16, 'Grace King', '', 'Divorce', 'Focuses on protecting children\'s best interests in divorce.', '395', 'https://img.freepik.com/free-photo/medium-shot-woman-working-as-real-estate-agent_23-2151064969.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(17, 'Chloe Wright', '', 'Affidavit', 'Specializes in preparing witness statements.', '250', 'https://img.freepik.com/free-photo/photorealistic-lawyer-day-celebration_23-2151053984.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(18, 'Zoe Green', '', 'Affidavit', 'Provides legal services for property disputes.', '260', 'https://img.freepik.com/free-photo/front-view-lawyer-portrait_23-2151202373.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(19, 'Natalie Scott', '', 'Affidavit', 'Ensures accuracy and compliance in affidavit preparation.', '270', 'https://img.freepik.com/free-photo/photorealistic-lawyer-day-celebration_23-2151053984.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(20, 'James Smith', '', 'Affidavit', 'Expertise in notarizing affidavits for various legal purposes.', '255', 'https://img.freepik.com/premium-photo/confident-owner-business-company-analyzing-report_622301-4223.jpg?w=360', '', 'approved'),
(21, 'Michael Johnson', '', 'Affidavit', 'Known for meticulous preparation of financial affidavits.', '265', 'https://img.freepik.com/free-photo/elegant-old-man-portrait_23-2148831064.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(22, 'Robert Brown', '', 'Affidavit', 'Specializes in drafting affidavits for court cases.', '245', 'https://img.freepik.com/free-photo/male-lawyer-inspecting-contract-court-room_23-2147898560.jpg?ga=GA1.1.1739808710.1720161191&semt=ais_user', '', 'approved'),
(30, 'hunaina', 'saim@gmail.com', 'Divorce Lawyer', NULL, NULL, NULL, '6', 'pending'),
(31, 'hunaina', 'saim@gmail.com', 'Divorce Lawyer', NULL, NULL, NULL, '6', 'pending'),
(34, 'Saim', 'saimrazabhai@gmail.com', 'Civil Lawyer', 'I am The BEst', '500', 'assets/images/uploaded_img/user-1.jpg', '123', 'approved'),
(36, 'Mahnoor', 'saimraza123@gmail.com', 'Criminal Lawyer', NULL, '250', 'assets/images/uploaded_img/img_bg_2.jpg', '123', 'pending'),
(37, 'Mahnoor', 'mahnoor@gmail.com', 'Criminal Lawyer', NULL, '250', 'assets/images/uploaded_img/video.jpg', '123', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_cases`
--

CREATE TABLE `lawyer_cases` (
  `id` int(11) NOT NULL,
  `lawyer_id` int(11) DEFAULT NULL,
  `lawyer_name` varchar(100) DEFAULT NULL,
  `result` enum('won','lost','settled') DEFAULT NULL,
  `victory_speech` text DEFAULT NULL,
  `case_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyer_cases`
--

INSERT INTO `lawyer_cases` (`id`, `lawyer_id`, `lawyer_name`, `result`, `victory_speech`, `case_id`) VALUES
(13, 101, 'Hunainaessica Thompson', 'won', 'Exceptional service delivered a winning outcome!', 1001),
(14, 102, 'Saimily Anderson', 'won', 'Instrumental in our case\'s success - highly recommend!', 1002),
(15, 103, 'Sarah Martinez', 'won', 'Professional, knowledgeable, and dedicated - exceeded our expectations!', 1003),
(16, 104, 'Olivia Brown', 'won', 'Top-notch legal representation - a game-changer for our case!', 1004),
(17, 105, 'Sophia Wilson', 'won', 'Experts in their field - highly recommend!', 1005),
(18, 106, 'Isabella Garcia', 'won', 'Exceptional results and outstanding service - the best!', 1006),
(19, 107, 'Ava Lee', 'won', 'Fantastic to work with - highly recommend for any legal needs!', 1007),
(20, 108, 'Hunainaessica Thompson', 'won', 'Tough case, but great effort from the team.', 1008),
(21, 109, 'Saimily Anderson', 'won', 'Brilliant strategy and execution - thanks for the win!', 1009),
(22, 110, 'Sarah Martinez', 'won', 'Outstanding advocacy and dedication - highly recommend!', 1010),
(23, 111, 'Olivia Brown', 'won', 'Good job, but unfortunate outcome.', 1011),
(24, 112, 'Sophia Wilson', 'won', 'Excellent work - thanks for the great result!', 1012);

-- --------------------------------------------------------

--
-- Table structure for table `lawyer_registers`
--

CREATE TABLE `lawyer_registers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lawyer_registers`
--

INSERT INTO `lawyer_registers` (`id`, `firstname`, `email`, `password`, `status`) VALUES
(13, 'Mahnoor', 'saimraza123@gmail.com', '123', 'approved'),
(14, 'Mahnoor', 'mahnoor@gmail.com', '123', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin_registers`
--
ALTER TABLE `admin_registers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_cases`
--
ALTER TABLE `client_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_id` (`lawyer_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `client_registers`
--
ALTER TABLE `client_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dash_lawyers`
--
ALTER TABLE `dash_lawyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer_cases`
--
ALTER TABLE `lawyer_cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lawyer_id` (`lawyer_id`),
  ADD KEY `case_id` (`case_id`);

--
-- Indexes for table `lawyer_registers`
--
ALTER TABLE `lawyer_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_registers`
--
ALTER TABLE `admin_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client_cases`
--
ALTER TABLE `client_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `client_registers`
--
ALTER TABLE `client_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dash_lawyers`
--
ALTER TABLE `dash_lawyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `lawyer_cases`
--
ALTER TABLE `lawyer_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lawyer_registers`
--
ALTER TABLE `lawyer_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `billings`
--
ALTER TABLE `billings`
  ADD CONSTRAINT `billings_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `billings_ibfk_2` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`);

--
-- Constraints for table `client_cases`
--
ALTER TABLE `client_cases`
  ADD CONSTRAINT `client_cases_ibfk_1` FOREIGN KEY (`lawyer_id`) REFERENCES `lawyers` (`id`),
  ADD CONSTRAINT `client_cases_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
