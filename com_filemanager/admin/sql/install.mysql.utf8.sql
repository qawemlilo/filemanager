CREATE TABLE `#__fm_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `title` varchar(4) NOT NULL,
  `cell` int(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `fax` int(10) NOT NULL,  `address` text NOT NULL,
  `subscribe` tinyint(1) NOT NULL,
   PRIMARY KEY  (`id`),   KEY `#__users` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

