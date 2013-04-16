CREATE TABLE IF NOT EXISTS `#__fm_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL,
  `typeid` int(11) NOT NULL,
  `filename` varchar(40) NOT NULL,
  `ext` varchar(4) NOT NULL,
  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`),
   KEY `#__fm_clients` (`clientid`),
   KEY `#__fm_types` (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;