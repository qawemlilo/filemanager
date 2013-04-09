DROP TABLE IF EXISTS `#__quantumfp`;
 
CREATE TABLE `#__quantumfp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `views` varchar(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
 
INSERT INTO `#__quantumfp` (`views`) VALUES
        ('Quantum FP'),
        ('Upload Files'),
		('User Details');
