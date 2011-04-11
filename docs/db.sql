-- Database example for the Zend_Acl and Zend_Auth use case
-- by Enrico Zimuel (enrico@zimuel.it)

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE `permissions` (
  `id` int(11) NOT NULL auto_increment,
  `id_role` int(11) NOT NULL,
  `id_resource` int(11) NOT NULL,
  `permission` enum('allow','deny') NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



INSERT INTO `permissions` (`id`, `id_role`, `id_resource`, `permission`) VALUES 
(1, 3, 1, 'allow'),
(2, 2, 2, 'allow'),
(3, 2, 3, 'deny');



CREATE TABLE `resources` (
  `id` int(11) NOT NULL auto_increment,
  `resource` varchar(128) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



INSERT INTO `resources` (`id`, `resource`) VALUES 
(1, '*/*/*'),
(3, 'home/index/menu'),
(2, 'home/*/*');



CREATE TABLE `roles` (
  `id` int(11) NOT NULL auto_increment,
  `role` varchar(40) NOT NULL,
  `id_parent` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;



INSERT INTO `roles` (`id`, `role`, `id_parent`) VALUES 
(3, 'admin', 2),
(2, 'user', 1),
(1, 'guest', 0);



CREATE TABLE `users` (
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id_role` int(11) NOT NULL,
  `ldap` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  USING BTREE (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



INSERT INTO `users` (`username`, `password`, `id_role`, `ldap`) VALUES 
('admin', '13956c93ab56025e9397ab69957418989ebab847', 3, 0),
('enrico', 'ed64662ef2d8425bc7654e5d7a09fee0788b72ec', 2, 0);

