-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 10:33 PM
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
(1, 'zDjfBR', '507198949', '01-Oct-2018 08:36:03 PM', '500'),
(2, 'zDjfBR', '836929142', '01-Oct-2018 08:37:21 PM', '1000'),
(3, 'zDjfBR', '357035950', '02-Oct-2018 03:21:52 PM', '1000'),
(4, 'zDjfBR', '423726937', '02-Oct-2018 03:22:08 PM', '1000'),
(5, 'zDjfBR', '795165226', '02-Oct-2018 09:48:55 PM', '1000'),
(6, 'NXKNyt', '3420588', '10-Oct-2018 11:23:23 AM', '500'),
(7, 'pvo8ka', '300394152', '10-Oct-2018 12:57:54 PM', '1000'),
(8, 'pvo8ka', '380011296', '10-Oct-2018 06:03:18 PM', '1000'),
(9, 'pvo8ka', '247677863', '14-Oct-2018 05:05:27 PM', '100'),
(10, 'pvo8ka', '789366815', '25-Oct-2018 09:37:37 PM', '100'),
(11, 's8YYzF', '921143762', '29-Oct-2018 02:30:02 PM', '100'),
(12, 's8YYzF', '685684969', '29-Oct-2018 11:30:09 PM', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(10) UNSIGNED NOT NULL,
  `game_id` varchar(100) NOT NULL,
  `words` varchar(10000) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `started` varchar(100) NOT NULL DEFAULT '0',
  `start_time` varchar(100) NOT NULL,
  `current_word` varchar(100) NOT NULL,
  `number_of_players` varchar(100) NOT NULL DEFAULT '0',
  `game_ended` varchar(100) NOT NULL DEFAULT '0',
  `winner` varchar(150) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_id`, `words`, `amount`, `started`, `start_time`, `current_word`, `number_of_players`, `game_ended`, `winner`) VALUES
(1, 'Er6U9X', '[\"engage\",\"made\",\"stadium\",\"around\",\"commercial\",\"start\",\"domain\",\"teacher\",\"worse\",\"standard\",\"pass\",\"england\",\"treatment\",\"change\",\"developer\",\"fail\",\"building\",\"follower\",\"brand\",\"everyone\",\"prefect\",\"ethics\",\"potential\",\"arena\",\"football\",\"machine\",\"agile\",\"starting\",\"police\",\"kingsmen\",\"development\",\"mandate\",\"award\",\"healthy\",\"organ\",\"cancer\",\"principal\",\"estate\",\"remember\",\"capital\",\"anatomy\",\"astronaut\",\"calendar\",\"camera\",\"started\"]', '0', '1', '1539692677000', 'engage', '1', '1', 'pvo8ka'),
(2, '2Cg3Vy', '[\"cancer\",\"arena\",\"everyone\",\"reality\",\"astronaut\",\"engage\",\"fail\",\"sniper\",\"approve\",\"developer\",\"prefect\",\"sample\",\"modified\",\"degree\",\"customer\",\"follower\",\"kingsmen\",\"award\",\"encourage\",\"mobility\",\"choose\",\"string\",\"potential\",\"riches\",\"machine\",\"anatomy\",\"football\",\"camera\",\"received\",\"culture\",\"made\",\"anger\",\"master\",\"brand\",\"partner\",\"wednesday\",\"started\",\"standard\",\"worse\",\"principal\",\"archive\",\"repeat\",\"stadium\",\"command\",\"envelope\"]', '0', '1', '1539693574000', 'cancer', '1', '0', '0'),
(4, 'NC0qYk', '[\"partner\",\"weight\",\"principal\",\"award\",\"courses\",\"fail\",\"started\",\"encourage\",\"domain\",\"camera\",\"soldier\",\"time\",\"around\",\"treatment\",\"street\",\"degree\",\"chapter\",\"everyone\",\"string\",\"follower\",\"length\",\"method\",\"ethics\",\"england\",\"developer\",\"anatomy\",\"article\",\"stadium\",\"anger\",\"death\",\"remember\",\"calendar\",\"sample\",\"agile\",\"riches\",\"education\",\"founder\",\"wealth\",\"archive\",\"standard\",\"building\",\"arena\",\"acting\",\"received\",\"worse\"]', '0', '1', '1539897559000', 'partner', '1', '0', '0'),
(5, 'WDsWnF', '[\"potential\",\"encourage\",\"remember\",\"weight\",\"anger\",\"street\",\"domain\",\"modified\",\"healthy\",\"envelope\",\"courses\",\"economy\",\"pass\",\"development\",\"background\",\"christmas\",\"acting\",\"soldier\",\"arena\",\"calendar\",\"mobility\",\"engage\",\"starting\",\"simple\",\"amongst\",\"estate\",\"sister\",\"start\",\"started\",\"agile\",\"approve\",\"everyone\",\"article\",\"treatment\",\"prefect\",\"astronaut\",\"england\",\"received\",\"lecture\",\"generate\",\"football\",\"anatomy\",\"developer\",\"leader\",\"customer\"]', '0', '1', '1540499899000', 'potential', '1', '0', '0'),
(11, 'tdRNje', '[\"started\",\"principal\",\"made\",\"wealth\",\"christmas\",\"soldier\",\"anger\",\"command\",\"mandate\",\"standard\",\"partner\",\"cancer\",\"engage\",\"astronaut\",\"potential\",\"award\",\"agile\",\"machine\",\"police\",\"internal\",\"charity\",\"practice\",\"football\",\"builder\",\"calendar\",\"mobility\",\"envelope\",\"sample\",\"generate\",\"master\",\"repeat\",\"education\",\"death\",\"article\",\"android\",\"time\",\"capital\",\"approve\",\"customer\",\"pass\",\"length\",\"courses\",\"everyone\",\"building\",\"riches\"]', '0', '1', '1540556244000', 'started', '1', '0', '0'),
(19, 'MZh1I3', '[\"soldier\",\"start\",\"sister\",\"award\",\"background\",\"command\",\"wednesday\",\"brand\",\"founder\",\"remember\",\"riches\",\"around\",\"commercial\",\"approve\",\"follower\",\"ethics\",\"sample\",\"repeat\",\"healthy\",\"stadium\",\"method\",\"street\",\"envelope\",\"principal\",\"education\",\"kingsmen\",\"everyone\",\"domain\",\"charity\",\"everyone\",\"string\",\"article\",\"chapter\",\"machine\",\"christmas\",\"weight\",\"calendar\",\"amongst\",\"development\",\"organ\",\"generate\",\"anatomy\",\"received\",\"starting\",\"partner\"]', '0', '1', '1540772390000', 'soldier', '1', '0', '0'),
(20, 'ey2wnh', '[\"stadium\",\"degree\",\"soldier\",\"leader\",\"master\",\"capital\",\"started\",\"founder\",\"education\",\"astronaut\",\"received\",\"pass\",\"length\",\"amongst\",\"archive\",\"internal\",\"teacher\",\"simple\",\"monday\",\"football\",\"made\",\"camera\",\"worse\",\"anger\",\"follower\",\"ethics\",\"developer\",\"riches\",\"kingsmen\",\"time\",\"generate\",\"treatment\",\"arena\",\"acting\",\"standard\",\"remember\",\"weight\",\"sniper\",\"method\",\"mobility\",\"development\",\"wealth\",\"england\",\"builder\",\"everyone\"]', '0', '1', '1540818999000', 'stadium', '1', '0', '0'),
(21, 'kjgprj', '[\"received\",\"wednesday\",\"chapter\",\"agile\",\"remember\",\"brand\",\"simple\",\"commercial\",\"domain\",\"degree\",\"background\",\"estate\",\"prefect\",\"school\",\"england\",\"time\",\"change\",\"teacher\",\"amongst\",\"soldier\",\"pass\",\"developer\",\"economy\",\"christmas\",\"sniper\",\"acting\",\"building\",\"lecture\",\"treatment\",\"anatomy\",\"mandate\",\"length\",\"award\",\"encourage\",\"command\",\"sample\",\"sister\",\"cancer\",\"development\",\"everyone\",\"machine\",\"organ\",\"ethics\",\"article\",\"customer\"]', '1000', '1', '1540819277000', 'received', '2', '1', 'pvo8ka'),
(22, 'p43Dhf', '[\"wednesday\",\"start\",\"teacher\",\"weight\",\"choose\",\"commercial\",\"started\",\"aged\",\"generate\",\"capital\",\"partner\",\"lecture\",\"anger\",\"arena\",\"potential\",\"background\",\"follower\",\"method\",\"cancer\",\"made\",\"manner\",\"chapter\",\"wealth\",\"principal\",\"customer\",\"police\",\"command\",\"degree\",\"pass\",\"street\",\"estate\",\"england\",\"mandate\",\"ethics\",\"building\",\"camera\",\"stadium\",\"development\",\"economy\",\"culture\",\"mobility\",\"monday\",\"approve\",\"everyone\",\"fail\"]', '0', '1', '1540852110000', 'wednesday', '1', '0', '0'),
(23, 'QlaDOE', '[\"building\",\"pass\",\"teacher\",\"riches\",\"death\",\"organ\",\"seattle\",\"award\",\"calendar\",\"brand\",\"time\",\"string\",\"cancer\",\"aged\",\"reality\",\"command\",\"acting\",\"article\",\"choose\",\"christmas\",\"prefect\",\"follower\",\"amongst\",\"customer\",\"lecture\",\"economy\",\"treatment\",\"repeat\",\"everyone\",\"sniper\",\"engage\",\"ethics\",\"capital\",\"encourage\",\"length\",\"football\",\"kingsmen\",\"anger\",\"practice\",\"made\",\"monday\",\"camera\",\"large\",\"astronaut\",\"healthy\"]', '1000', '1', '1540852217000', 'building', '2', '1', 'pvo8ka'),
(28, 'bAXlMT', '[\"made\",\"estate\",\"calendar\",\"astronaut\",\"ranger\",\"economy\",\"received\",\"reality\",\"monday\",\"sister\",\"anger\",\"organ\",\"customer\",\"ethics\",\"internal\",\"development\",\"start\",\"time\",\"practice\",\"soldier\",\"prefect\",\"mobility\",\"pass\",\"large\",\"length\",\"engage\",\"everyone\",\"acting\",\"string\",\"modified\",\"school\",\"article\",\"building\",\"approve\",\"death\",\"everyone\",\"charity\",\"culture\",\"courses\",\"mandate\",\"worse\",\"manner\",\"seattle\",\"commercial\",\"domain\"]', '0', '1', '1541276886000', 'made', '1', '0', '0'),
(29, 'gL_0p6', '[\"remember\",\"approve\",\"string\",\"master\",\"anger\",\"method\",\"archive\",\"monday\",\"start\",\"standard\",\"brand\",\"time\",\"worse\",\"sample\",\"school\",\"made\",\"soldier\",\"amongst\",\"agile\",\"generate\",\"partner\",\"culture\",\"potential\",\"riches\",\"treatment\",\"started\",\"anatomy\",\"starting\",\"lecture\",\"sister\",\"sniper\",\"principal\",\"seattle\",\"encourage\",\"repeat\",\"large\",\"mobility\",\"stadium\",\"background\",\"police\",\"machine\",\"everyone\",\"camera\",\"charity\",\"modified\"]', '0', '1', '1541533425000', 'remember', '1', '0', '0');

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

--
-- Dumping data for table `game_words`
--

INSERT INTO `game_words` (`id`, `game_id`, `user_id`, `username`, `word`, `point`, `gender`, `time_stamp`) VALUES
(44, 'NC0qYk', 'pvo8ka', 'player1', 'part', '20', 'm', '2018-10-18 21:19:29'),
(45, 'NC0qYk', 'pvo8ka', 'player1', 'near', '20', 'm', '2018-10-18 21:19:36'),
(46, 'NC0qYk', 'pvo8ka', 'player1', 'light', '25', 'm', '2018-10-18 21:19:43'),
(47, 'NC0qYk', 'pvo8ka', 'player1', 'course', '20', 'm', '2018-10-18 21:19:54'),
(48, 'NC0qYk', 'pvo8ka', 'player1', 'force', '17', 'm', '2018-10-18 21:20:02'),
(49, 'NC0qYk', 'pvo8ka', 'player1', 'start', '25', 'm', '2018-10-18 21:20:23'),
(354, 'MZh1I3', 'pvo8ka', 'player1', 'sis', '10', 'm', '2018-10-29 00:20:04'),
(355, 'MZh1I3', 'pvo8ka', 'player1', 'sis', '0', 'm', '2018-10-29 00:20:04'),
(356, 'ey2wnh', 'pvo8ka', 'player1', 'agree', '25', 'm', '2018-10-29 13:16:50'),
(357, 'ey2wnh', 'pvo8ka', 'player1', 'sold', '20', 'm', '2018-10-29 13:16:56'),
(358, 'ey2wnh', 'pvo8ka', 'player1', 'load', '20', 'm', '2018-10-29 13:16:59'),
(359, 'ey2wnh', 'pvo8ka', 'player1', 'loader', '30', 'm', '2018-10-29 13:17:01'),
(360, 'ey2wnh', 'pvo8ka', 'player1', 'loaded', '30', 'm', '2018-10-29 13:17:05'),
(361, 'ey2wnh', 'pvo8ka', 'player1', 'read', '20', 'm', '2018-10-29 13:17:10'),
(362, 'ey2wnh', 'pvo8ka', 'player1', 'reader', '30', 'm', '2018-10-29 13:17:12'),
(363, 'ey2wnh', 'pvo8ka', 'player1', 'reads', '25', 'm', '2018-10-29 13:17:16'),
(364, 'ey2wnh', 'pvo8ka', 'player1', 'dear', '20', 'm', '2018-10-29 13:17:21'),
(365, 'ey2wnh', 'pvo8ka', 'player1', 'start', '25', 'm', '2018-10-29 13:17:43'),
(366, 'ey2wnh', 'pvo8ka', 'player1', 'found', '25', 'm', '2018-10-29 13:17:48'),
(367, 'ey2wnh', 'pvo8ka', 'player1', 'nation', '30', 'm', '2018-10-29 13:17:58'),
(368, 'ey2wnh', 'pvo8ka', 'player1', 'ass', '15', 'm', '2018-10-29 13:18:12'),
(535, 'bAXlMT', 'pvo8ka', 'player1', 'state', '17', 'm', '2018-11-03 20:28:23'),
(536, 'bAXlMT', 'pvo8ka', 'player1', 'rest', '13', 'm', '2018-11-03 20:28:34'),
(537, 'bAXlMT', 'pvo8ka', 'player1', 'range', '25', 'm', '2018-11-03 20:28:43'),
(538, 'bAXlMT', 'pvo8ka', 'player1', 'ranges', '30', 'm', '2018-11-03 20:28:49'),
(539, 'bAXlMT', 'pvo8ka', 'player1', 'atom', '20', 'm', '2018-11-03 20:28:53'),
(540, 'bAXlMT', 'pvo8ka', 'player1', 'astronomy', '45', 'm', '2018-11-03 20:28:57'),
(541, 'bAXlMT', 'pvo8ka', 'player1', 'day', '15', 'm', '2018-11-03 20:29:07'),
(542, 'bAXlMT', 'pvo8ka', 'player1', 'receiver', '40', 'm', '2018-11-03 20:29:09'),
(543, 'bAXlMT', 'pvo8ka', 'player1', 'real', '20', 'm', '2018-11-03 20:29:11'),
(544, 'bAXlMT', 'pvo8ka', 'player1', 'sis', '10', 'm', '2018-11-03 20:29:33'),
(545, 'bAXlMT', 'pvo8ka', 'player1', 'rage', '13', 'm', '2018-11-03 20:29:39'),
(546, 'bAXlMT', 'pvo8ka', 'player1', 'org', '10', 'm', '2018-11-03 20:29:41'),
(547, 'bAXlMT', 'pvo8ka', 'player1', 'sis', '0', 'm', '2018-11-03 20:29:50'),
(548, 'bAXlMT', 'pvo8ka', 'player1', 'custom', '30', 'm', '2018-11-03 20:30:03'),
(549, 'bAXlMT', 'pvo8ka', 'player1', 'inter', '25', 'm', '2018-11-03 20:30:06'),
(550, 'bAXlMT', 'pvo8ka', 'player1', 'the', '15', 'm', '2018-11-03 20:30:08'),
(551, 'bAXlMT', 'pvo8ka', 'player1', 'art', '15', 'm', '2018-11-03 20:30:32');

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

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `user_id`, `reference_code`, `time_stamp`, `amount`, `bank_name`, `account_name`, `account_number`, `type`, `payment_date`) VALUES
(1, 'pvo8ka', '140930746', '18-Oct-2018 04:11:06 PM', 1000, 'United Bank for Africa Plc', 'Kosisochukwu Eric Agogbuo', '2093954338', 'account_balance', '06-Nov-2018 10:30:51 PM'),
(2, 'pvo8ka', '140930746', '18-Oct-2018 04:11:06 PM', 1000, 'United Bank for Africa Plc', 'Kosisochukwu Eric Agogbuo', '2093954338', 'account_balance', '06-Nov-2018 10:31:00 PM');

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
(1, 'Player Three', '1998-10-17', 'm', 'player3@gmail.com', 'player3', 'player3', '9bfa2e4d079e2fc42c31cf1080991b1c', '07084419530', '1539171468', '1', 'ffivZP', '2BwM', 'h3GKpNcFTm6Psv4J', '6XiaNycy6eulSl4F', '0', '0', '0', '0', 0, 12000, '0', '0', '0', '0', '0', '0', '0', '0', '_8ypgE', 1200, 0, '_8ypge', 0, 19, 0, '0', 'Sunday 14th of October 2018 12:07:11 PM', 0, '0'),
(2, 'Player Two', '1998-10-17', 'f', 'player2@gmail.com', 'player2', 'player2', '9bfa2e4d079e2fc42c31cf1080991b1c', '08060087603', '1539171555', '1', 's8YYzF', 'tCGa', 'pCNvLRXpEKBSgNrK', 'VPoUjq1_LmnEWIf6', '7', 'Fidelity Bank Nigeria', 'Fidelia Onyeocha', '3984944495', 0, 8200, '0', '0', '0', '0', '0', '0', '0', '0', 'QlaDOE', 1883, 118, 'qladoe', 3, 21, 1000, 'Sunday 14th of October 2018 12:07:11 PM :N1000', 'Monday 29th of October 2018 11:32:11 PM', 0, '0'),
(3, 'Player One', '1998-10-17', 'm', 'player1@gmail.com', 'player1', 'player1', '9bfa2e4d079e2fc42c31cf1080991b1c', '07084461956', '1539171632', '1', 'pvo8ka', 'Jvli', 'sB2v2oalNhps2JHC', '4Csd0fn0e2Nbxh91', '7', 'United Bank for Africa Plc', 'kosisochukwu eric agogbuo', '2093954338', 4408, 6200, 'realkosieric', 'Kosi', 'Just a regular guy', '0', '0', '0', '0', '0', '0', 35327, 941, '0', 52, 63, 12000, 'Thursday 8th of November 2018 09:48:56 PM :N0', 'Thursday 8th of November 2018 09:48:56 PM', 0, '0');

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
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `user_id`, `reference_code`, `time_stamp`, `amount`, `bank_name`, `account_name`, `account_number`, `type`) VALUES
(1, 'pvo8ka', '140930746', '18-Oct-2018 04:11:06 PM', 1000, 'United Bank for Africa Plc', 'Kosisochukwu Eric Agogbuo', '2093954338', 'account_balance'),
(2, 'pvo8ka', '381063308', '06-Nov-2018 10:27:57 AM', 1000, 'United Bank for Africa Plc', 'Kosisochukwu Eric Agogbuo', '2093954338', 'account_balance'),
(3, 'pvo8ka', '788762880', '06-Nov-2018 10:38:21 AM', 1500, 'United Bank for Africa Plc', 'Kosisochukwu Eric Agogbuo', '2093954338', 'account_balance'),
(4, 'pvo8ka', '482396329', '06-Nov-2018 10:38:46 AM', 2300, 'United Bank for Africa Plc', 'Kosisochukwu Eric Agogbuo', '2093954338', 'account_balance'),
(5, 's8YYzF', '204516084', '06-Nov-2018 10:42:38 AM', 1800, 'Fidelity Bank Nigeria', 'Fidelia Onyeocha', '3984944495', 'account_balance');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `game_words`
--
ALTER TABLE `game_words`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pending_bank_details`
--
ALTER TABLE `pending_bank_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
