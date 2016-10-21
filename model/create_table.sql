
CREATE TABLE `event`(
`event_id` varchar(11) NOT NULL,
`band_id` varchar(11)  DEFAULT NULL,
`band_name` varchar(50) DEFAULT NULL,
`description` varchar(500) DEFAULT NULL,
`type_event` varchar(30) DEFAULT NULL,
`n_participants` varchar(3) DEFAULT NULL,
`date_event` varchar(10) DEFAULT NULL,
`type_access` varchar(20) DEFAULT NULL,
`date_ticket` varchar(10) DEFAULT NULL,
`openning` varchar(5) DEFAULT NULL,
`start` varchar(5) DEFAULT NULL,
`end` varchar(5) DEFAULT NULL,
`poster` varchar(200) DEFAULT NULL,
PRIMARY KEY (`event_id`),
UNIQUE KEY `uniq1` (`event_id`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
