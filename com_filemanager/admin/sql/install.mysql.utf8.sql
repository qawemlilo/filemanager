CREATE TABLE IF NOT EXISTS `#__fm_clients` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `userid` int(11) NOT NULL,  `created_by` int(11) NOT NULL,  `title` varchar(4) NOT NULL default '',  `cell` int(10) NOT NULL default 0,  `phone` int(10) NOT NULL default 0,  `fax` int(10) NOT NULL default 0,  `address` text NOT NULL default '',  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,   PRIMARY KEY  (`id`),   KEY `#__users` (`userid`, `created_by`)) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;CREATE TABLE IF NOT EXISTS `#__fm_types` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `label` varchar(40) NOT NULL,  `created_by` int(11) NOT NULL,   PRIMARY KEY  (`id`),   KEY `#__users` (`created_by`)) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;CREATE TABLE IF NOT EXISTS `#__fm_uploads` (  `id` int(11) NOT NULL AUTO_INCREMENT,  `clientid` int(11) NOT NULL,  `created_by` int(11) NOT NULL,  `typeid` int(11) NOT NULL,  `filename` varchar(40) NOT NULL,  `ext` varchar(4) NOT NULL,  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,   PRIMARY KEY  (`id`),   KEY `#__fm_clients` (`clientid`),   KEY `#__fm_types` (`typeid`),   KEY `#__users` (`created_by`)) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;