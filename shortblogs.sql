-- Database: `blog` and php web application user
CREATE DATABASE blog;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON blog.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE blog;

-- Table structure for table `shortblogs`
-- CREATE TABLE IF NOT EXISTS `shortblogs` (
--   `id` int(100) NOT NULL AUTO_INCREMENT,
--   `user_id` int(100) NOT NULL,
--   `author` varchar(100) NOT NULL,
--   `category` varchar(255) NOT NULL,
--   `content` varchar(1000) NOT NULL,
--   PRIMARY KEY (`id`),
--   CONSTRAINT `fk_shortblogs_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;
CREATE TABLE IF NOT EXISTS `shortblogs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- Dumping data for table `shortblogs`
-- INSERT INTO `shortblogs` (`id`, `user_id`, `author`, `category`, `content`) VALUES
-- (1, 1, 'Jaya Lee', 'Clothing', 'This is the first short blog'),
-- (2, 2, 'Wei Deng', 'Food', 'This is the second short blog'),
-- (3, 1, 'Jaya Lee', 'Travelling', 'This is the third short blog');
INSERT INTO `shortblogs` (`id`, `author`, `category`, `content`) VALUES
(1, 'Roland Mendel', 'Clothing', 'This is the first short blog'),
(2, 'Victoria Ashworth', 'Food', 'This is the second short blog'),
(3, 'Martin Blank', 'Travelling', 'This is the third short blog');

-- Table structure for table `user`
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4;

-- Dumping data for table `user`
INSERT INTO `user` (`id`, `author`, `email`, `password`) VALUES
(1, 'Jaya Lee', 'jayalee@gmail.com', 'jayaleee'),
(2, 'Wei Deng', 'anna@gmail.com', 'weidengg');