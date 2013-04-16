CREATE TABLE IF NOT EXISTS `#__fm_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `title` varchar(4) NOT NULL,
  `cell` int(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `fax` int(10) NOT NULL,  `address` text NOT NULL,
  `subscribe` tinyint(1) NOT NULL,  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`),   KEY `#__users` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;CREATE TABLE IF NOT EXISTS `#__fm_types` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `label` varchar(40) NOT NULL,   PRIMARY KEY  (`id`)) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;CREATE TABLE IF NOT EXISTS `#__fm_uploads` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `clientid` int(11) NOT NULL,  `typeid` int(11) NOT NULL,  `filename` varchar(40) NOT NULL,  `ext` varchar(4) NOT NULL,  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,   PRIMARY KEY  (`id`),   KEY `#__fm_clients` (`clientid`),   KEY `#__fm_types` (`typeid`)) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;INSERT INTO `#__fm_clients` (`id`, `userid`, `title`, `cell`, `phone`, `fax`, `address`, `subscribe`) VALUES(1, 46, 'Mr', 724014072, 312073946, 312435435, '31 Galway Road\r\nMayville\r\nDurban\r\n4001', 0);INSERT INTO `#__fm_types` (`id`, `label`) VALUES(1, 'Correspondence'),(2, 'Investment Tracker'),(4, 'Doc');

