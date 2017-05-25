CREATE TABLE `users` (
	`id` int NOT NULL AUTO_INCREMENT,
	`user_name` varchar(50) NOT NULL,
	`dt_registry` DATETIME NOT NULL,
	`email` varchar(64) NOT NULL,
	`password` varchar(64) NOT NULL,
	`avatar_path` varchar(100) DEFAULT NULL,
	`contacts` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `lots` (
	`id` int NOT NULL AUTO_INCREMENT,
	`lot_name` varchar(100) NOT NULL,
	`user_id` int NOT NULL,
	`dt_add` DATETIME NOT NULL,
	`description` varchar(1500) NOT NULL,
	`img_path` varchar(500) NOT NULL,
	`start_price` int NOT NULL,
	`dt_close` DATETIME NOT NULL,
	`step_bet` int NOT NULL,
	`fav_count` int DEFAULT NULL,
	`category_id` int NOT NULL,
	`winner_user_id` int DEFAULT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `categories` (
	`id` int NOT NULL AUTO_INCREMENT,
	`name` char(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `bets` (
	`id` int NOT NULL AUTO_INCREMENT,
	`dt_add` DATETIME NOT NULL,
	`bet` int NOT NULL,
	`user_id` int NOT NULL,
	`lot_id` int NOT NULL,
	PRIMARY KEY (`id`)
);

ALTER TABLE `lots` ADD CONSTRAINT `lots_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `lots` ADD CONSTRAINT `lots_fk1` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`);

ALTER TABLE `lots` ADD CONSTRAINT `lots_fk2` FOREIGN KEY (`winner_user_id`) REFERENCES `users`(`id`);

ALTER TABLE `bets` ADD CONSTRAINT `bets_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `bets` ADD CONSTRAINT `bets_fk1` FOREIGN KEY (`lot_id`) REFERENCES `lots`(`id`);

