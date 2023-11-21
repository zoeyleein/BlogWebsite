
--
-- Database: `demo` and php web application user
CREATE DATABASE demo;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON demo.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE demo;
--
-- Table structure for table `shortblogs`
--

CREATE TABLE IF NOT EXISTS `shortblogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `shortblogs`
--

INSERT INTO `shortblogs` (`id`, `author`, `category`, `content`) VALUES
(1, 'Roland Mendel', 'Clothing', 'This is the first short blog'),
(2, 'Victoria Ashworth', 'Food', 'This is the second short blog'),
(3, 'Martin Blank', 'Travelling', 'This is the third short blog');

