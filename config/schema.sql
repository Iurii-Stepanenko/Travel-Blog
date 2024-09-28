DROP TABLE `category_post`;
#---
DROP TABLE IF EXISTS `category`;
#---
DROP TABLE IF EXISTS `post`;
#---
DROP TABLE IF EXISTS `author`;
#---
DROP TABLE IF EXISTS `daily_statistics`;
#---
CREATE TABLE `category` (
    `category_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Category ID',
    `name` varchar(127) NOT NULL COMMENT 'Name',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Entity';
#---
CREATE TABLE `post` (
    `post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Post ID',
    `title` varchar(127) NOT NULL COMMENT 'Title',
    `url` varchar(127) NOT NULL COMMENT 'URL',
    `description` varchar(4095) DEFAULT NULL COMMENT 'Description',
    `author_id` int unsigned NOT NULL COMMENT 'Author ID',
    `publication_date` datetime NOT NULL COMMENT 'Publication Date',
    `total_views` int unsigned DEFAULT NULL COMMENT 'Total Views',
    `total_likes` int unsigned DEFAULT NULL COMMENT 'Total Likes',
    PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Post Entity';
#---
CREATE TABLE `author` (
    `author_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Author ID',
    `firstname` varchar(127) DEFAULT NULL COMMENT 'First Name',
    `lastname` varchar(127) DEFAULT NULL COMMENT 'First Name',
    `nickname` varchar(127) DEFAULT NULL COMMENT 'Nickname',
    `email` varchar(127) DEFAULT NULL COMMENT 'Email',
    PRIMARY KEY (`author_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Author Entity';
#---
CREATE TABLE `daily_statistics` (
    `id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `date` date NOT NULL COMMENT 'Date',
    `views` int unsigned DEFAULT NULL COMMENT 'Daily Views',
    `likes` int unsigned DEFAULT NULL COMMENT 'Daily Likes',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Daily Statistics Entity';
#---
INSERT INTO `category` (`name`, `url`)
VALUES ('Ukraine', 'ukraine'),
       ('Denmark', 'denmark'),
       ('Poland', 'poland'),
       ('France', 'france'),
       ('Spain', 'spain');
#---
INSERT INTO `post` (`title`, `url`, `description`, `author_id`, `publication_date`,`total_views`,`total_likes`)
VALUES ('Post 1', 'post-1', 'Lorem ipsum dolor sit amet', 1, '2024-06-01 12:07:47', null, null),
       ('Post 2', 'post-2', 'Lorem ipsum dolor sit amet', 2, '2024-06-03 13:07:47', null, null),
       ('Post 3', 'post-3', 'Lorem ipsum dolor sit amet', 3, '2024-06-07 14:07:47', null, null),
       ('Post 4', 'post-4', 'Lorem ipsum dolor sit amet', 4, '2024-06-12 15:07:47', null, null),
       ('Post 5', 'post-5', 'Lorem ipsum dolor sit amet', 5, '2024-06-15 16:07:47', null, null),
       ('Post 6', 'post-6', 'Lorem ipsum dolor sit amet', 2, '2024-06-16 17:07:47', null, null),
       ('Post 7', 'post-7', 'Lorem ipsum dolor sit amet', 3, '2024-06-25 12:07:47', null, null),
       ('Post 8', 'post-8', 'Lorem ipsum dolor sit amet', 4, '2024-06-29 18:07:47', null, null),
       ('Post 9', 'post-9', 'Lorem ipsum dolor sit amet', 5, '2024-07-01 12:07:47', null, null),
       ('Post 10', 'post-10', 'Lorem ipsum dolor sit amet', 1, '2024-07-10 12:07:47', null, null),
       ('Post 11', 'post-11', 'Lorem ipsum dolor sit amet', 2, '2024-07-12 11:07:47', null, null),
       ('Post 12', 'post-12', 'Lorem ipsum dolor sit amet', 3, '2024-07-19 10:07:47', null, null),
       ('Post 13', 'post-13', 'Lorem ipsum dolor sit amet', 4, '2024-07-25 09:07:47', null, null),
       ('Post 14', 'post-14', 'Lorem ipsum dolor sit amet', 5, '2024-07-28 16:07:47', null, null),
       ('Post 15', 'post-15', 'Lorem ipsum dolor sit amet', 1, '2024-07-30 19:07:47', null, null);
#---
INSERT INTO `author` (`firstname`, `lastname`, `nickname`, `email`)
VALUES ('Jane', 'Dou', 'JD', 'janedou@example.com'),
       ('Jake', 'Noboby', 'Jk_NB', 'jaknobody@example.com'),
       ('Silvia', 'Smith', 'Silvia1985', 'silvia1985@example.com'),
       ('James', 'Sweet', null, 'jamessmith@example.com'),
       ('Iurii', 'Stepanenko', 'Iuriis', 'uzik.fk11@gmail.com');
#---
INSERT INTO `daily_statistics` (`post_id`, `date`, `views`, `likes`)
VALUES (1, '2024-07-29', 3, 1),
       (2, '2024-07-29', 7, 2),
       (3, '2024-07-29', 3, 1),
       (4, '2024-07-29', 7, 2),
       (5, '2024-07-29', 3, 1),
       (6, '2024-07-29', 7, 2),
       (7, '2024-07-29', 3, 1),
       (8, '2024-07-29', 7, 2),
       (9, '2024-07-29', 3, 1),
       (10, '2024-07-29', 7, 2),
       (11, '2024-07-29', 3, 1),
       (12, '2024-07-29', 7, 2),
       (13, '2024-07-29', 3, 1),
       (14, '2024-07-29', 7, 2),
       (15, '2024-07-29', 3, 1),
       (1, '2024-07-30', 3, 1),
       (2, '2024-07-30', 7, 2),
       (3, '2024-07-30', 3, 1),
       (4, '2024-07-30', 7, 2),
       (5, '2024-07-30', 3, 1),
       (6, '2024-07-30', 7, 2),
       (7, '2024-07-30', 3, 1),
       (8, '2024-07-30', 7, 2),
       (9, '2024-07-30', 3, 1),
       (10, '2024-07-30', 7, 2),
       (11, '2024-07-30', 3, 1),
       (12, '2024-07-30', 7, 2),
       (13, '2024-07-30', 3, 1),
       (14, '2024-07-30', 7, 2),
       (15, '2024-07-30', 3, 1);
#---
CREATE TABLE `category_post` (
    `category_post_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `post_id` int unsigned NOT NULL COMMENT 'Post ID',
    `category_id` int unsigned NOT NULL COMMENT 'Category ID',
    PRIMARY KEY (`category_post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Category Post';
#---
ALTER TABLE `category_post`
    ADD CONSTRAINT `FK_CATEGORY_ID` FOREIGN KEY (`category_id`)
        REFERENCES `category` (`category_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `FK_POST_ID` FOREIGN KEY (`post_id`)
        REFERENCES `post` (`post_id`) ON DELETE CASCADE;
#---
INSERT INTO `category_post` (`category_id`, `post_id`)
VALUES (1, 1), (1, 2), (1, 3),
       (2, 4), (2, 5), (2, 6),
       (3, 7), (3, 8), (3, 9),
       (4, 10), (4, 11), (4, 12),
       (5, 13), (5, 14), (5, 15);