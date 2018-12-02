-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 11:22 PM
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
-- Table structure for table `fund_account_transactions`
--

CREATE TABLE `fund_account_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `reference_code` varchar(100) NOT NULL,
  `time_stamp` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fund_account_transactions`
--

INSERT INTO `fund_account_transactions` (`id`, `user_id`, `reference_code`, `time_stamp`, `amount`) VALUES
(1, 'pvo8ka', '689042837', '02-Dec-2018 10:44:35 PM', '500');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_id` varchar(100) NOT NULL,
  `words` varchar(10000) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `started` varchar(100) NOT NULL DEFAULT '0',
  `start_time` bigint(20) NOT NULL,
  `current_word` varchar(100) NOT NULL,
  `number_of_players` int(11) NOT NULL DEFAULT '0',
  `game_ended` varchar(100) NOT NULL DEFAULT '0',
  `winner` varchar(150) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game_words`
--

CREATE TABLE `game_words` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `word` varchar(10000) NOT NULL,
  `point` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `link`, `time_stamp`) VALUES
(1, 'Welcome to Twisttr', 'Hi welcome to Twisttr , we are adding new features every day.\r\n', 'http://nairaland.com', '2018-10-06 08:00:24'),
(2, 'New feature added.', 'We\'ve just added a new  feature , check it out now.', 'http://google.com', '2018-10-06 08:02:39'),
(3, 'We\'ve added new bonuses for our users\r\n', '&#8358;100 has been added to every of our users to play with. ', 'http://nairaland.com', '2018-10-06 08:05:23'),
(4, 'We\'ve added new bonuses for our users\r\n', '&#8358;100 has been added to every of our users to play with. ', 'http://naijaloaded.com', '2018-10-06 08:08:03'),
(5, 'We\'ve rolled out a new feature just for you and it\'s simple', 'Click on this notification to see the feature.', 'http://naijaloaded.com', '2018-10-06 08:08:57'),
(6, 'This is a notification please take it very serious i beg of u. please', 'don\'t try to do anything that doesn\'t make sense at all\r\n', 'http://nairaland.com', '2018-10-06 08:10:16'),
(7, 'Bonuses for all our members', 'We are giving all our members 50 bonus each , click to read more', 'http://nairaland.com', '2018-10-10 11:46:59');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `reference_code` varchar(100) NOT NULL,
  `time_stamp` varchar(100) NOT NULL,
  `amount` bigint(20) NOT NULL DEFAULT '0',
  `bank_name` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT '0',
  `payment_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_bank_details`
--

CREATE TABLE `pending_bank_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `bank_name` varchar(1000) NOT NULL,
  `account_name` varchar(1000) NOT NULL,
  `account_number` varchar(1000) NOT NULL,
  `verification_code` varchar(1000) NOT NULL,
  `last_requested` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `profit` bigint(20) NOT NULL,
  `total_profit` bigint(20) NOT NULL,
  `total_users` bigint(20) NOT NULL,
  `account_balance` bigint(20) NOT NULL,
  `total_amount_funded` bigint(20) NOT NULL,
  `total_amount_paid` bigint(20) NOT NULL,
  `total_games_played` bigint(20) NOT NULL,
  `total_amount_played` bigint(20) NOT NULL,
  `total_free_mode_played` bigint(20) NOT NULL,
  `total_bonus` bigint(20) NOT NULL,
  `total_withdrawal_requests` bigint(20) NOT NULL,
  `total_withdrawal_requests_amount` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `profit`, `total_profit`, `total_users`, `account_balance`, `total_amount_funded`, `total_amount_paid`, `total_games_played`, `total_amount_played`, `total_free_mode_played`, `total_bonus`, `total_withdrawal_requests`, `total_withdrawal_requests_amount`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `last_played_date` varchar(100) DEFAULT '0',
  `last_free_mode_id` varchar(255) NOT NULL DEFAULT '0',
  `last_free_mode_time` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `birthday`, `gender`, `email`, `username`, `username_text`, `password`, `phone`, `registration_timestamp`, `email_verified`, `user_id`, `game_id`, `password_reset_code`, `email_verification_code`, `number_of_read_notifications`, `bank_name`, `account_name`, `account_number`, `bonus`, `account_balance`, `twitter_account`, `instagram_account`, `status_text`, `location`, `country`, `profile`, `last_seen`, `active`, `game_id_about_to_play`, `total_points`, `current_point`, `current_game_id`, `total_wins`, `total_games_played`, `total_amount_won`, `last_win_date`, `last_played_game_id`, `last_amount_won`, `last_played_date`, `last_free_mode_id`, `last_free_mode_time`) VALUES
(1, 'Player Three', '1998-10-17', 'm', 'player1@gmail.com', 'player3', 'player3', '9bfa2e4d079e2fc42c31cf1080991b1c', '07084419530', '1539171468', '1', 'ffivZP', '2BwM', 'h3GKpNcFTm6Psv4J', '6XiaNycy6eulSl4F', '0', '0', '0', '0', 0, 11300, '0', '0', '0', '0', '0', '0', '0', '0', 'ZVOeHD', 0, 0, 'zvoehd', 0, 0, 0, 'Saturday 1st of December 2018 02:38:00 AM :N400', 'Saturday 1st of December 2018 02:47:06 AM', 0, '0', '0', '0'),
(2, 'Player Two', '1998-10-17', 'f', 'player2@gmail.com', 'player2', 'player2', '9bfa2e4d079e2fc42c31cf1080991b1c', '08060087603', '1539171555', '1', 's8YYzF', 'tCGa', 'pCNvLRXpEKBSgNrK', 'VPoUjq1_LmnEWIf6', '7', '0', '0', '0', 0, 9300, '0', '0', '0', '0', '0', '0', '0', '0', '74WfhO', 0, 0, 'zvoehd', 0, 0, 0, 'Sunday 2nd of December 2018 03:33:13 PM :N0', 'Sunday 2nd of December 2018 03:33:13 PM', 0, '0', '74wfho', '0'),
(3, 'Player One', '1998-10-17', 'm', 'player3@gmail.com', 'player1', 'player1', '9bfa2e4d079e2fc42c31cf1080991b1c', '07084461956', '1539171632', '1', 'pvo8ka', 'Jvli', 'sB2v2oalNhps2JHC', '4Csd0fn0e2Nbxh91', '7', 'United Bank for Africa Plc', 'kosisochukwu eric agogbuo', '2093954338', 5339, 18000, 'megakosi', 'megakosi', 'Just a regular guy', '0', '0', '0', '0', '0', 'ok9aq8', 0, 0, 'zvoehd', 0, 0, 0, 'Saturday 1st of December 2018 02:30:24 AM :N400', 'Saturday 1st of December 2018 02:47:06 AM', 0, '0', 'ok9aq8', '0'),
(4, 'Spider Monkey', '1998-10-17', 'm', 'kosiuniverse@gmail.com', 'spider', 'spider', '9bfa2e4d079e2fc42c31cf1080991b1c', '07084461955', '1542502680', '1', 'kqldz9', '7p2A', 'g7Tmhsv5RAqh1eLS', 'GQFFF73HuPvlmgmB', '0', '0', '0', '0', 0, 0, '0', '0', '0', '0', '0', '0', '0', '0', '7NsJUx', 0, 0, '0', 0, 0, 0, '0', '0', 0, '0', '7nsjux', '0');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `reference_code` varchar(100) NOT NULL,
  `time_stamp` varchar(100) NOT NULL,
  `amount` bigint(20) NOT NULL DEFAULT '0',
  `bank_name` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fund_account_transactions`
--
ALTER TABLE `fund_account_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_words`
--
ALTER TABLE `game_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_bank_details`
--
ALTER TABLE `pending_bank_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profit` (`profit`);

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
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fund_account_transactions`
--
ALTER TABLE `fund_account_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_words`
--
ALTER TABLE `game_words`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_bank_details`
--
ALTER TABLE `pending_bank_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
