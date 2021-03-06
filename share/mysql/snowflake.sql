
DROP TABLE IF EXISTS `sf_vote`;

DROP TABLE IF EXISTS `sf_user`;

CREATE TABLE `sf_user` (
  `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
  `login` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY(`id`)
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;

CREATE TABLE `sf_vote` (
  `id` INT UNSIGNED AUTO_INCREMENT NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  `vote` TINYINT UNSIGNED NOT NULL,
  `dt` DATETIME NOT NULL,
  PRIMARY KEY(`id`),
  UNIQUE KEY `user_id_index` (`user_id`),
  FOREIGN KEY (`user_id`) REFERENCES `sf_user`(`id`) ON DELETE CASCADE
) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
