USE `challengedb`;

DROP TABLE IF EXISTS `exads_test`;
CREATE TABLE `exads_test` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `age` int NOT NULL,
  `job_title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `exads_design_test`;
CREATE TABLE `exads_design_test` (
  `design_id` int NOT NULL AUTO_INCREMENT,
  `design_name` varchar(100) NOT NULL,
  `split_percent` int NOT NULL,
  PRIMARY KEY (`design_id`)
);

INSERT INTO `exads_design_test` (`design_id`, `design_name`, `split_percent`) 
VALUES
(1,	'Design 1',	50),
(2,	'Design 2',	25),
(3,	'Design 3',	25);