CREATE TABLE `Feedback` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `feedback` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8

CREATE TABLE `Accounts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `UTORid` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `logintype` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8

CREATE TABLE `Mark` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `UTORid` char(50) NOT NULL,
  `quiz1` int(10) DEFAULT NULL,
  `quiz2` int(10) DEFAULT NULL,
  `quiz3` int(10) DEFAULT NULL,
  `midterm` int(100) DEFAULT NULL,
  `assignment1` int(100) DEFAULT NULL,
  `assignment2` int(100) DEFAULT NULL,
  `assignment3` int(100) DEFAULT NULL,
  `final` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8

CREATE TABLE `Remark` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `utorid` varchar(20) NOT NULL,
  `remarkreq` varchar(20) DEFAULT NULL,
  `message` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8
