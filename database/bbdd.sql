DROP TABLE IF EXISTS `animes`;
CREATE TABLE `animes` (
  `anime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapters` smallint(6) NOT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animeFLV` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `myAnimeList` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`anime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'sagiri',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_name_email_unique` (`name`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hair` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `characters_anime_foreign` (`anime`),
  CONSTRAINT `characters_anime_foreign` FOREIGN KEY (`anime`) REFERENCES `animes` (`anime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `anime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_anime_foreign` (`anime`),
  CONSTRAINT `comments_anime_foreign` FOREIGN KEY (`anime`) REFERENCES `animes` (`anime`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `custom`;
CREATE TABLE `custom` (
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user`,`anime`),
  KEY `custom_anime_foreign` (`anime`),
  CONSTRAINT `custom_anime_foreign` FOREIGN KEY (`anime`) REFERENCES `animes` (`anime`),
  CONSTRAINT `custom_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `dates`;
CREATE TABLE `dates` (
  `anime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_new_chapter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`anime`),
  CONSTRAINT `dates_anime_foreign` FOREIGN KEY (`anime`) REFERENCES `animes` (`anime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `genre_animes`;
CREATE TABLE `genre_animes` (
  `anime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`anime`,`genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `social`;
CREATE TABLE `social` (
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `following` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`user`,`following`),
  KEY `social_following_foreign` (`following`),
  CONSTRAINT `social_following_foreign` FOREIGN KEY (`following`) REFERENCES `users` (`name`),
  CONSTRAINT `social_user_foreign` FOREIGN KEY (`user`) REFERENCES `users` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `anime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chapter` int(11) NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`anime`,`chapter`),
  KEY `admin_fk` (`admin`),
  CONSTRAINT `admin_fk` FOREIGN KEY (`admin`) REFERENCES `users` (`name`),
  CONSTRAINT `videos_anime_foreign` FOREIGN KEY (`anime`) REFERENCES `animes` (`anime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
