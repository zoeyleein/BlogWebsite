-- Student: JingYi Li, Wei Deng
-- File Name: shortblogs.sql
-- Date of creating: Nov 17 2023
-- Description: This is the database for blogs and users.
-- Written by: JingYi Li, Wei Deng

-- Database: `blog` and php web application user
CREATE DATABASE blog;
GRANT USAGE ON *.* TO 'appuser'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON blog.* TO 'appuser'@'localhost';
FLUSH PRIVILEGES;

USE blog;

CREATE TABLE IF NOT EXISTS `shortblogs` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `comment` varchar(500), 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `shortblogs` (`id`, `title`, `author`, `category`, `content`, `comment`) VALUES
(1, 'Culinary Chronicles: Tasting the World, One Bite at a Time', 'Jaya Lee', 'Food', 'Embark on a gastronomic adventure with us as we explore the diverse flavors the world has to offer. From street food delights to fine dining experiences, join our journey to savor the essence of each destination through its delectable cuisine.', 'Mouthwatering descriptions! Cannot wait to try these culinary delights.'),
(2, 'Wanderlust Unleashed: A Brief Escape', 'Wei Deng', 'Traveling', 'Embark on a journey with us as we explore the hidden gems of the world. From the serene beaches to the bustling streets, our travel escapades are bound to ignite your wanderlust. Join us in discovering the beauty that lies beyond the horizon.', 'Your travel stories are so captivating! I feel like I am on the journey with you.'),
(3, 'Fashion Forward: Embracing Style on the Go', 'Anna Wu', 'Clothing', 'Dive into the world of fashion as we curate the perfect wardrobe for your travels. From comfy yet chic airport attire to Instagram-worthy vacation looks, we have got your style covered. Let s redefine travel fashion and make every journey a runway!', 'Love the fashion inspiration! Traveling in style is an art you have mastered.');

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