--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.3.148.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 18.07.2020 12:48:07
-- Версия сервера: 5.5.5-10.1.28-MariaDB
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE mytask;

--
-- Удалить таблицу "users"
--
DROP TABLE IF EXISTS users;

--
-- Удалить таблицу "user_roles"
--
DROP TABLE IF EXISTS user_roles;

--
-- Удалить таблицу "user_contact_groups"
--
DROP TABLE IF EXISTS user_contact_groups;

--
-- Удалить таблицу "roles"
--
DROP TABLE IF EXISTS roles;

--
-- Удалить таблицу "oauth_refresh_tokens"
--
DROP TABLE IF EXISTS oauth_refresh_tokens;

--
-- Удалить таблицу "oauth_personal_access_clients"
--
DROP TABLE IF EXISTS oauth_personal_access_clients;

--
-- Удалить таблицу "oauth_clients"
--
DROP TABLE IF EXISTS oauth_clients;

--
-- Удалить таблицу "oauth_auth_codes"
--
DROP TABLE IF EXISTS oauth_auth_codes;

--
-- Удалить таблицу "oauth_access_tokens"
--
DROP TABLE IF EXISTS oauth_access_tokens;

--
-- Удалить таблицу "migrations"
--
DROP TABLE IF EXISTS migrations;

--
-- Удалить таблицу "groups"
--
DROP TABLE IF EXISTS groups;

--
-- Удалить таблицу "contacts"
--
DROP TABLE IF EXISTS contacts;

--
-- Установка базы данных по умолчанию
--
USE mytask;

--
-- Создать таблицу "contacts"
--
CREATE TABLE contacts (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  phone varchar(25) DEFAULT NULL,
  photo varchar(105) DEFAULT NULL,
  address varchar(105) DEFAULT NULL,
  second_number varchar(25) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id),
  INDEX IDX_contacts (name, phone),
  INDEX IDX_contacts_name (name),
  INDEX IDX_contacts_phone (phone)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Создать таблицу "groups"
--
CREATE TABLE groups (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  user_id int(11) DEFAULT NULL,
  status int(11) DEFAULT 1,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 4
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Создать таблицу "migrations"
--
CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  migration varchar(255) NOT NULL,
  batch int(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу "oauth_access_tokens"
--
CREATE TABLE oauth_access_tokens (
  id varchar(100) NOT NULL,
  user_id bigint(20) DEFAULT NULL,
  client_id int(10) UNSIGNED NOT NULL,
  name varchar(255) DEFAULT NULL,
  scopes text DEFAULT NULL,
  revoked tinyint(1) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  expires_at datetime DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX oauth_access_tokens_user_id_index (user_id)
)
ENGINE = INNODB
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу "oauth_auth_codes"
--
CREATE TABLE oauth_auth_codes (
  id varchar(100) NOT NULL,
  user_id bigint(20) NOT NULL,
  client_id int(10) UNSIGNED NOT NULL,
  scopes text DEFAULT NULL,
  revoked tinyint(1) NOT NULL,
  expires_at datetime DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу "oauth_clients"
--
CREATE TABLE oauth_clients (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id bigint(20) DEFAULT NULL,
  name varchar(255) NOT NULL,
  secret varchar(100) NOT NULL,
  redirect text NOT NULL,
  personal_access_client tinyint(1) NOT NULL,
  password_client tinyint(1) NOT NULL,
  revoked tinyint(1) NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  provider varchar(255) DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX oauth_clients_user_id_index (user_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 6
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу "oauth_personal_access_clients"
--
CREATE TABLE oauth_personal_access_clients (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  client_id int(10) UNSIGNED NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX oauth_personal_access_clients_client_id_index (client_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу "oauth_refresh_tokens"
--
CREATE TABLE oauth_refresh_tokens (
  id varchar(100) NOT NULL,
  access_token_id varchar(100) NOT NULL,
  revoked tinyint(1) NOT NULL,
  expires_at datetime DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX oauth_refresh_tokens_access_token_id_index (access_token_id)
)
ENGINE = INNODB
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу "roles"
--
CREATE TABLE roles (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB
AUTO_INCREMENT = 3
AVG_ROW_LENGTH = 8192
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Создать таблицу "user_contact_groups"
--
CREATE TABLE user_contact_groups (
  id int(11) NOT NULL AUTO_INCREMENT,
  contact_id int(11) DEFAULT NULL,
  group_id int(11) DEFAULT 1,
  created_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  updated_at timestamp NULL DEFAULT NULL,
  status int(11) DEFAULT 1,
  PRIMARY KEY (id),
  INDEX IDX_contact_lists (group_id),
  INDEX IDX_contact_lists_contact (contact_id)
)
ENGINE = INNODB
AUTO_INCREMENT = 7
AVG_ROW_LENGTH = 16384
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Создать таблицу "user_roles"
--
CREATE TABLE user_roles (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  role_id int(11) DEFAULT NULL,
  status int(11) DEFAULT 1,
  created_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id),
  INDEX IDX_user_roles (user_id, role_id),
  INDEX IDX_user_roles_status (status),
  INDEX IDX_user_roles_user_id (user_id)
)
ENGINE = INNODB
CHARACTER SET utf8
COLLATE utf8_general_ci;

--
-- Создать таблицу "users"
--
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  login varchar(25) NOT NULL,
  password varchar(96) NOT NULL,
  phone varchar(15) DEFAULT NULL,
  created_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  status int(11) DEFAULT 1,
  remember_token varchar(96) DEFAULT NULL,
  PRIMARY KEY (id),
  INDEX IDX_users (login, password),
  UNIQUE INDEX UK_users_login (login)
)
ENGINE = INNODB
AUTO_INCREMENT = 19
AVG_ROW_LENGTH = 2730
CHARACTER SET utf8
COLLATE utf8_general_ci;

-- 
-- Вывод данных для таблицы contacts
--
-- Таблица mytask.contacts не содержит данных

-- 
-- Вывод данных для таблицы groups
--
INSERT INTO groups VALUES
(1, 'Общая группа', 1, 1),
(2, 'дом', 1, 1),
(3, 'работа', 1, 1);

-- 
-- Вывод данных для таблицы migrations
--
-- Таблица mytask.migrations не содержит данных

-- 
-- Вывод данных для таблицы oauth_access_tokens
--
-- Таблица mytask.oauth_access_tokens не содержит данных

-- 
-- Вывод данных для таблицы oauth_auth_codes
--
-- Таблица mytask.oauth_auth_codes не содержит данных

-- 
-- Вывод данных для таблицы oauth_clients
--
-- Таблица mytask.oauth_clients не содержит данных

-- 
-- Вывод данных для таблицы oauth_personal_access_clients
--
-- Таблица mytask.oauth_personal_access_clients не содержит данных

-- 
-- Вывод данных для таблицы oauth_refresh_tokens
--
-- Таблица mytask.oauth_refresh_tokens не содержит данных

-- 
-- Вывод данных для таблицы roles
--
-- Таблица mytask.roles не содержит данных

-- 
-- Вывод данных для таблицы user_contact_groups
--
INSERT INTO user_contact_groups VALUES
(2, 1, 1, '0000-00-00 00:00:00', NULL, NULL),
(3, 3, 1, '0000-00-00 00:00:00', NULL, 1),
(4, 4, 1, '2020-07-18 06:52:18', '2020-07-18 06:52:18', 1),
(5, 5, 2, '2020-07-18 06:52:44', '2020-07-18 06:52:44', 1),
(6, 6, 3, '2020-07-18 06:53:26', '2020-07-18 06:53:26', 1);

-- 
-- Вывод данных для таблицы user_roles
--
-- Таблица mytask.user_roles не содержит данных

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'jamshed', 'jamshed@mail.ru', 'jm', '$2y$10$b0IV2xtz.Eu0ppa45SeHceXcqbTRaOUSMP4WT6ssVzn/M5I7nplzm', '928933320', '2020-07-17 13:53:27', '2020-07-17 13:53:27', 1, NULL);
-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
