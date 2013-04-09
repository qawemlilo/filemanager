DROP TABLE IF EXISTS `#__fm_users`, `#__fm_files`;
 
CREATE TABLE `#__fm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(4) NOT NULL,
  `cell` int(12) NOT NULL,
  `tel` int(13) NOT NULL,
  `fax` int(13) NOT NULL,
  `subscribe` int(1) NOT NULL default 1,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__fm_users` (`user_id`, `title`, `cell`, `tel`, `fax`) VALUES
(42, 'mr', 729826523, 316722345, 316722776);

CREATE TABLE `#__fm_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
   `name` varchar(40) NOT NULL,
  `file_url` varchar(100) NOT NULL,
  `file_type` varchar(10) NOT NULL,
  `ts` timestamp NOT NULL default CURRENT_TIMESTAMP,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


INSERT INTO `#__fm_files` (`user_id`, `name`, `file_url`, `file_type`) VALUES
(42, 'test.pdf', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'tracker'),
(42, 'test.pdf', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'doc'),
(42, 'test.pdf', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'corresp'),
(42, 'test.pdf2', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'corresp'),
(42, 'test.pdf3', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'corresp'),
(42, 'test.pdf4', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'corresp'),
(43, 'test.pdf', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'tracker'),
(43, 'test.pdf', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'doc'),
(43, 'test.pdf', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'corresp'),
(43, 'test.pdf2', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'corresp'),
(43, 'test.pdf3', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'corresp'),
(43, 'test.pdf4', 'http://www.sanatural.co.za/media/radio/afrikaans/SNP_25M00_149_A_R.mp3', 'corresp');

