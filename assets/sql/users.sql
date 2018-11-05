-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 04:12 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `username_text` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `registration_timestamp` varchar(100) NOT NULL,
  `email_verified` varchar(100) DEFAULT '0',
  `user_id` varchar(100) NOT NULL,
  `game_id` varchar(100) NOT NULL,
  `password_reset_code` varchar(100) DEFAULT '0',
  `email_verification_code` varchar(100) DEFAULT '0',
  `number_of_read_notifications` varchar(100) NOT NULL DEFAULT '0',
  `bank_name` varchar(100) DEFAULT '0',
  `account_name` varchar(100) DEFAULT '0',
  `account_number` varchar(100) DEFAULT '0',
  `bonus` bigint(20) NOT NULL DEFAULT '0',
  `account_balance` bigint(20) NOT NULL DEFAULT '0',
  `twitter_account` varchar(100) DEFAULT '0',
  `instagram_account` varchar(100) DEFAULT '0',
  `status_text` varchar(100) DEFAULT '0',
  `location` varchar(100) DEFAULT '0',
  `country` varchar(100) DEFAULT '0',
  `profile` varchar(100) DEFAULT '0',
  `last_seen` varchar(100) DEFAULT '0',
  `active` varchar(100) DEFAULT '0',
  `game_id_about_to_play` varchar(100) DEFAULT '0',
  `total_points` bigint(20) DEFAULT '0',
  `current_point` bigint(20) DEFAULT '0',
  `current_game_id` varchar(100) DEFAULT '0',
  `total_wins` bigint(20) NOT NULL DEFAULT '0',
  `total_games_played` bigint(20) DEFAULT '0',
  `total_amount_won` bigint(20) NOT NULL DEFAULT '0',
  `last_win_date` varchar(100) DEFAULT '0',
  `last_played_game_id` varchar(100) DEFAULT '0',
  `last_amount_won` bigint(20) NOT NULL DEFAULT '0',
  `last_played_date` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `birthday`, `gender`, `email`, `username`, `username_text`, `password`, `phone`, `registration_timestamp`, `email_verified`, `user_id`, `game_id`, `password_reset_code`, `email_verification_code`, `number_of_read_notifications`, `bank_name`, `account_name`, `account_number`, `bonus`, `account_balance`, `twitter_account`, `instagram_account`, `status_text`, `location`, `country`, `profile`, `last_seen`, `active`, `game_id_about_to_play`, `total_points`, `current_point`, `current_game_id`, `total_wins`, `total_games_played`, `total_amount_won`, `last_win_date`, `last_played_game_id`, `last_amount_won`, `last_played_date`) VALUES
(1, 'Player Three', '1998-10-17', 'm', 'player1@gmail.com', 'player3', 'player3', '9bfa2e4d079e2fc42c31cf1080991b1c', '07084419530', '1539171468', '1', 'ffivZP', '2BwM', 'h3GKpNcFTm6Psv4J', '6XiaNycy6eulSl4F', '0', '0', '0', '0', 0, 1000, '0', '0', '0', '0', '0', '0', '0', '0', '_8ypgE', 1200, 0, '_8ypge', 0, 19, 0, '0', 'Sunday 14th of October 2018 12:07:11 PM', 0, '0'),
(2, 'Player Two', '1998-10-17', 'f', 'player2@gmail.com', 'player2', 'player2', '9bfa2e4d079e2fc42c31cf1080991b1c', '08060087603', '1539171555', '1', 's8YYzF', 'tCGa', 'pCNvLRXpEKBSgNrK', 'VPoUjq1_LmnEWIf6', '7', '0', '0', '0', 0, 100, '0', '0', '0', '0', '0', '0', '0', '0', 'QlaDOE', 1883, 118, 'qladoe', 3, 21, 1000, 'Sunday 14th of October 2018 12:07:11 PM :N1000', 'Monday 29th of October 2018 11:32:11 PM', 0, '0'),
(3, 'Player One', '1998-10-17', 'm', 'player3@gmail.com', 'player1', 'player1', '9bfa2e4d079e2fc42c31cf1080991b1c', '07084461956', '1539171632', '1', 'pvo8ka', 'Jvli', 'sB2v2oalNhps2JHC', '4Csd0fn0e2Nbxh91', '7', 'United Bank for Africa Plc', 'kosisochukwu eric agogbuo', '2093954338', 4183, 1100, 'realkosieric', 'Kosi', 'Just a regular guy', '0', '0', '0', '0', '0', '0', 30831, 905, '0', 46, 57, 12000, 'Saturday 3rd of November 2018 09:34:51 PM :N0', 'Saturday 3rd of November 2018 09:34:51 PM', 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_text` (`username_text`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `game_id` (`game_id`),
  ADD UNIQUE KEY `password_reset_code` (`password_reset_code`),
  ADD UNIQUE KEY `email_verification_code` (`email_verification_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
