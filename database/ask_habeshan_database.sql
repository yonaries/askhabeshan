SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ask_habeshan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE IF NOT EXISTS `admin_info` (
  `Username` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`Username`, `Password`) VALUES
('98d34c1758b15b5a359b69c2b08c5767', '98d34c1758b15b5a359b69c2b08c5767');

-- =================================================================

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(7) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `feedback_txt` varchar(120) NOT NULL,
  `star` varchar(1) NOT NULL,
  `Date` varchar(30) NOT NULL,
  
  PRIMARY KEY (`feedback_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feedback_txt`, `star`, `Date`) VALUES
(2, 8, 'Thanks Rohan', '5', '30-9-2013 11:34');

-- ===========================================================

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category`(
`category_id` int(8) NOT NULL AUTO_INCREMENT,
`category_name` varchar(30) NOT NULL,
`category_descript` text NOT NULL,

  PRIMARY KEY (`category_id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- ----------------------------------------------

-- 
-- Dumping Data into the category table
--

INSERT INTO `category` (`category_id`, `category_name`, `category_descript` ) VALUES
(23, 'Flutter Developers', 'Descussion space for flutter developers' );


-- ================================================================

--
-- Table structure for table `space`
--

CREATE TABLE IF NOT EXISTS `space`(
`space_id` int(7) NOT NULL AUTO_INCREMENT,
`space_name` varchar(30) NOT NULL,
`space_descript` text NOT NULL,
`space_created` varchar(30) NOT NULL,

  PRIMARY KEY (`space_id`)
)ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `space` (`space_id`, `space_name`, `space_descript`, `space_created`) VALUES
(92, 'Flutter Developers', 'Descussion space for flutter developers', '30-9-2013 11:34');


-- --------------------------------------------------------

--
-- Table structure for table `space_cover_pic`
--

CREATE TABLE IF NOT EXISTS `space_cover_pic` (
  `cover_id` int(7) NOT NULL AUTO_INCREMENT,
  `space_id` int(7) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`cover_id`),
  KEY `space_id` (`space_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `space_cover_pic`
--

INSERT INTO `space_cover_pic` (`cover_id`, `space_id`, `image`) VALUES
(7, 8, '999584_496501817111249_1587007043_n.jpg');

-- ----------------------------------------------------------------------

--
-- Table structure for table `space_post`
--

CREATE TABLE IF NOT EXISTS `space_post` (
  `space_post_id` int(10) NOT NULL AUTO_INCREMENT,
  `space_id` int(7) NOT NULL,
  `category_id` varchar(8) NOT NULL,
  `user_id` int(7) NOT NULL,
  `post_txt` text NOT NULL,
  `post_pic` varchar(150) ,
  `post_audio` varchar(150) ,
  `post_video` varchar(150),
  `time` varchar(30) NOT NULL,
  
  PRIMARY KEY (`space_post_id`),
  KEY `user_id` (`user_id`),
  KEY `space_id` (`space_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `space_post`
--

INSERT INTO `space_post` (`space_post_id`,`space_id`, `user_id`,`category_id`, `post_txt`,`post_pic`,`post_audio`,`post_video`, `time`) VALUES
(1, 92, 8, 23, 'In what way flutter is better than react native? ','','','', '30-9-2013 11:35');

-- =========================================================================

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(7) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Birthday_Date` varchar(11) NOT NULL,
  `Join_Date` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Name`, `Email`, `Password`, `Gender`, `Birthday_Date`, `Join_Date`) VALUES
(8, 'Amit Dodiya', 'amit.ad1i4@yahoo.com', 'myfaceback', 'Male', '14-1-1994', '18-9-2013 22:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_notice`
--

CREATE TABLE IF NOT EXISTS `users_notice` (
  `notice_id` int(7) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `notice_txt` varchar(120) NOT NULL,
  `notice_time` varchar(30) NOT NULL,
  PRIMARY KEY (`notice_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_notice`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int(7) NOT NULL,
  `job` varchar(100) NOT NULL,
  `school_or_collage` varchar(100) NOT NULL,
  `current_city` varchar(100) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `Instagram_ID` varchar(100) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `job`, `school_or_collage`, `current_city`, `website`, `Instagram_ID`) VALUES
(8, '', 'vccm', 'Rajkot',    'www.wix.com/amitad1i4/amit', 'www.facebook.com/Amit.000002');

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE IF NOT EXISTS `user_post` (
  `post_id` int(7) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `post_txt` text NOT NULL,
  `post_pic` varchar(150) ,
  `post_audio` varchar(150) ,
  `post_video` varchar(150),
  `post_time` varchar(30) NOT NULL,
  `category_id` varchar(8) NOT NULL,
  
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`post_id`, `user_id`, `post_txt`, `post_pic`, `post_audio`, `post_video`, `post_time`, `category_id`) VALUES
(46, 8, 'Is it only me or you guys love this site too?', '', '', '', '18-9-2013 22:10', 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_comment`
--

CREATE TABLE IF NOT EXISTS `user_post_answers` (
  `answer_id` int(7) NOT NULL AUTO_INCREMENT,
  `post_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_post_comment`
--
INSERT INTO `user_post_answers`(`answer_id`,`post_id`,`user_id`, `answer`) VALUES
(34,46,8,'Who doesnot man, it is so clean and nit.');

-- --------------------------------------------------------
--
-- Table structure for table `user_post_comment`
--

CREATE TABLE IF NOT EXISTS `user_reply` (
  `reply_id` int(7) NOT NULL AUTO_INCREMENT,
  `post_id` int(7) NOT NULL,
  `answer_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `reply` text NOT NULL,
  
  PRIMARY KEY (`reply_id`),
  KEY `user_id` (`user_id`),
  KEY `answer_id` (`answer_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_post_comment`
--
INSERT INTO `user_post_answers`(`reply_id`,`answer_id`,`post_id`,`user_id`, `reply`) VALUES
(96,34,46,8,'Who doesnot man, it is so clean and nit.');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_status`
--

-- CREATE TABLE IF NOT EXISTS `user_post_status` (
--   `status_id` int(7) NOT NULL AUTO_INCREMENT,
--   `post_id` int(7) NOT NULL,
--   `user_id` int(7) NOT NULL,
--  `status` varchar(7) NOT NULL,
--  PRIMARY KEY (`status_id`),
--  KEY `user_id` (`user_id`)
-- ) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `user_post_status`
-- 


-- --------------------------------------------------------

--
-- Table structure for table `user_profile_pic`
--

CREATE TABLE IF NOT EXISTS `user_profile_pic` (
  `profile_id` int(7) NOT NULL AUTO_INCREMENT,
  `user_id` int(7) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_profile_pic`
--

INSERT INTO `user_profile_pic` (`profile_id`, `user_id`, `image`) VALUES
(6, 8, 'my.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_secret_quotes`
--

CREATE TABLE IF NOT EXISTS `user_security_questions` (
  `user_id` int(7) NOT NULL,
  `Question1` varchar(50) NOT NULL,
  `Answer1` varchar(20) NOT NULL,
  `Question2` varchar(50) NOT NULL,
  `Answer2` varchar(20) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_secret_quotes`
--

INSERT INTO `user_security_questions` (`user_id`, `Question1`, `Answer1`, `Question2`, `Answer2`) VALUES
(8, 'what is the first name of your oldest nephew?', 'Eden', 'who is your all-time favorite movie?', 'Avenegers');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE IF NOT EXISTS `user_status` (
  `user_id` int(7) NOT NULL,
  `status` varchar(8) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user_id`, `status`) VALUES
(8, 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `user_warning`
--

-- CREATE TABLE IF NOT EXISTS `user_warning` (
--  `user_id` int(7) NOT NULL,
--  `warning_txt` varchar(200) NOT NULL,
--  KEY `user_id` (`user_id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_warning`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `space_post`
--
ALTER TABLE `space_post`
  ADD CONSTRAINT `space_post_ibfk_1` FOREIGN KEY (`space_id`) REFERENCES `space` (`space_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `space_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `space_post_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `users_notice`
--
ALTER TABLE `users_notice`
  ADD CONSTRAINT `users_notice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `space_cover_pic`
--
ALTER TABLE `space_cover_pic`
  ADD CONSTRAINT `space_cover_pic_ibfk_1` FOREIGN KEY (`space_id`) REFERENCES `space` (`space_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post`
--
ALTER TABLE `user_post`
  ADD CONSTRAINT `user_post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post_answer`
--
ALTER TABLE `user_post_answers`
  ADD CONSTRAINT `user_post_answers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_post_answers_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `user_post` (`post_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_reply`
--
ALTER TABLE `user_reply`
  ADD CONSTRAINT `user_reply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_reply_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `user_post` (`post_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_reply_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `user_post_answers` (`answer_id`) ON DELETE CASCADE;
  

--
-- Constraints for table `user_post_status`
--
-- ALTER TABLE `user_post_status`
--  ADD CONSTRAINT `user_post_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
--  ADD CONSTRAINT `user_post_status_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_post` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  ADD CONSTRAINT `user_profile_pic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_security_questions`
--
ALTER TABLE `user_security_questions`
  ADD CONSTRAINT `user_security_questions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_status`
--
ALTER TABLE `user_status`
  ADD CONSTRAINT `user_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_status_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_warning`
--
-- ALTER TABLE `user_warning`
--  ADD CONSTRAINT `user_warning_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
