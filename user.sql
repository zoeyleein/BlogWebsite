
--
-- Database: `demo` and php web application user
CREATE DATABASE user;
-- GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
-- GRANT ALL PRIVILEGES ON demo.* TO 'appuser'@'localhost';
-- FLUSH PRIVILEGES;

USE user;
--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Jaya Lee', 'jayalee@gmail.com', jayaleee),
(2, 'Anna Cheng', 'anna@gmail.com', annacheng);

