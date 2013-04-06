CREATE TABLE `requestlogs` (
	`requestlog_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`created` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	`method` VARCHAR(255) NOT NULL,
	`id` INT(10) NOT NULL,
	`classname` VARCHAR(255) NOT NULL,
	`methodname` VARCHAR(255) NOT NULL,
	`params` TEXT NOT NULL,
	`response` TEXT NOT NULL,
	`session` TEXT NULL,
	PRIMARY KEY (`requestlog_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
