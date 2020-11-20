-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 12:58 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text NOT NULL,
  `category_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`) VALUES
(1, 'Javascript', 'JS'),
(2, 'CSS', 'CSS\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(20) NOT NULL,
  `sender_id` int(20) NOT NULL,
  `recipient_id` int(20) NOT NULL,
  `message_body` text NOT NULL,
  `status` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_message` text NOT NULL,
  `comment_topic` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_message`, `comment_topic`, `comment_by`, `comment_date`) VALUES
(1, '<p>Use the tags <code>&lt;script&gt;&lt;/script&gt;</code></p>\n', 2, 11, '2020-11-09 18:23:47'),
(2, '<p>Use the <code>.class{ </code>} tag</p>\n', 3, 10, '2020-11-12 03:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

CREATE TABLE `issues` (
  `issue_id` int(20) NOT NULL,
  `issue_by` int(20) NOT NULL,
  `issue_name` text NOT NULL,
  `issue_desc` text NOT NULL,
  `issue_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `issue_by`, `issue_name`, `issue_desc`, `issue_date`) VALUES
(13, 10, 'Profile not working', 'I am trying to update my profile but it seems there is an error\r\n', '2020-11-15'),
(15, 7, 'Issue', 'Issue one\r\n', '2020-11-15'),
(16, 10, 'Issue two', 'I have another issue\r\n', '2020-11-15'),
(17, 10, 'Issue Three', 'Of course I have another issue', '2020-11-15'),
(18, 10, 'Issue Four', 'Yes yes yes', '2020-11-17'),
(19, 10, 'Issue Five', 'Another Issue', '2020-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `reply_to` int(11) NOT NULL,
  `reply_by` int(11) NOT NULL,
  `reply_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_subject` text NOT NULL,
  `topic_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `topic_category` int(11) NOT NULL,
  `topic_by` int(11) NOT NULL,
  `topic_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_category`, `topic_by`, `topic_description`) VALUES
(1, '', '2020-10-27 17:30:08', 1, 7, ''),
(2, 'How to add javascript to a file', '2020-11-09 18:23:00', 1, 11, '<p>How do I add a js file to a file</p>\n'),
(3, 'How to do a css class selection', '2020-11-12 03:07:02', 2, 10, '<p>How can I perform manipulations on a class using css?</p>\n'),
(4, 'How to add an AJAX function using JavaScript', '2020-11-12 03:21:45', 1, 10, '<p>How can I be able to add an AJAX function using JS?</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` text NOT NULL,
  `user_name` text NOT NULL,
  `user_email` text NOT NULL,
  `user_password` text NOT NULL,
  `user_about` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `user_name`, `user_email`, `user_password`, `user_about`, `user_image`, `date_created`) VALUES
(1, '', '', 'name@gmail.com', '1234', '', '', '2020-09-30 21:00:00'),
(2, '', '', 'cypkyalo17@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '2020-09-30 21:00:00'),
(3, '', '', 'name1@gmail.com', 'd3d9446802a44259755d38e6d163e820', '', '', '2020-10-01 17:55:23'),
(4, '', '', 'job@gmail.com', 'd3d9446802a44259755d38e6d163e820', '', '', '2020-10-01 17:59:48'),
(5, 'Mark', 'Biran', 'name@gmail.com', '7b7a53e239400a13bd6be6c91c4f6c4e', '', '', '2020-10-01 18:10:41'),
(6, 'John', 'Job', 'john@gmail.com', '$2y$10$FitD0vBSYo3GqZ6mhS1jeeyl1kKF2F3yO/nMQfhMXrNC.WJKur5PK', '', '', '2020-10-02 11:46:22'),
(7, 'John', 'Cage', 'cage@strathmore.edu', '$2y$10$Qg3ZwpEc/4589M0wVWyer.dnLW3CTfJuDBnxFEqTw2HXCb1dcxz4a', '', '', '2020-10-02 11:54:03'),
(9, 'Mark', 'Job', 'mark@gmail.com', '$2y$10$y2J1bPkBG2GNqYrsGw9v1ObEQF5hhSCyE0K9QUggrFlJUzTjCMEpS', '', '', '2020-10-12 13:23:20'),
(10, 'Cyprian', 'Kyalo', 'cypkyalo17@gmail.com', '$2y$10$3AQN6vPMFRCQQCSOi4cesuTDxEPbn63uE3mrb5NcN05ibLe0a97He', 'This is a student', '1605603531.jpg', '2020-11-17 08:58:51'),
(11, 'Mark', 'Job', 'markjob@gmail.com', '123', '', '', '2020-11-11 17:20:02'),
(14, 'Rees Alumasa', 'RAlumasa@Rees', 'reesalumasa@gmail.com', '$2y$10$OQcnd6NpmYom1owtPPvZweLYgWNmhJwjBOa1ottvexdlFms8y5aq2', '', '', '2020-11-12 03:28:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `sender_id` (`sender_id`,`recipient_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_topic` (`comment_topic`,`comment_by`),
  ADD KEY `comment_by` (`comment_by`);

--
-- Indexes for table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `issue_by` (`issue_by`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `reply_to` (`reply_to`,`reply_by`),
  ADD KEY `reply_by` (`reply_by`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_category` (`topic_category`,`topic_by`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `issues`
--
ALTER TABLE `issues`
  MODIFY `issue_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`comment_topic`) REFERENCES `topics` (`topic_id`);

--
-- Constraints for table `issues`
--
ALTER TABLE `issues`
  ADD CONSTRAINT `issues_ibfk_1` FOREIGN KEY (`issue_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`reply_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`reply_to`) REFERENCES `comments` (`comment_id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_category`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
