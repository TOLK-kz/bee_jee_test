CREATE TABLE beejee1.tsk_data
(
  id        int(10) unsigned NOT NULL AUTO_INCREMENT,
  username varchar(100)  NOT NULL,
  email     varchar(320)  NOT NULL,
  text_ru   varchar(1000) NOT null,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
)
  ENGINE=InnoDB
  DEFAULT CHARSET=utf8
  COLLATE =utf8_general_ci;

