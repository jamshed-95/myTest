--
-- Скрипт сгенерирован Devart dbForge Studio 2019 for MySQL, Версия 8.1.22.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 17.07.2020 16:35:21
-- Версия сервера: 5.5.5-10.2.6-MariaDB-log
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
USE mytest;

--
-- Удалить таблицу `contacts`
--
DROP TABLE IF EXISTS contacts;

--
-- Удалить таблицу `contact_lists`
--
DROP TABLE IF EXISTS contact_lists;

--
-- Удалить таблицу `groups`
--
DROP TABLE IF EXISTS groups;

--
-- Удалить таблицу `migrations`
--
DROP TABLE IF EXISTS migrations;

--
-- Удалить таблицу `oauth_access_tokens`
--
DROP TABLE IF EXISTS oauth_access_tokens;

--
-- Удалить таблицу `oauth_auth_codes`
--
DROP TABLE IF EXISTS oauth_auth_codes;

--
-- Удалить таблицу `oauth_clients`
--
DROP TABLE IF EXISTS oauth_clients;

--
-- Удалить таблицу `oauth_personal_access_clients`
--
DROP TABLE IF EXISTS oauth_personal_access_clients;

--
-- Удалить таблицу `oauth_refresh_tokens`
--
DROP TABLE IF EXISTS oauth_refresh_tokens;

--
-- Удалить таблицу `roles`
--
DROP TABLE IF EXISTS roles;

--
-- Удалить таблицу `users`
--
DROP TABLE IF EXISTS users;

--
-- Удалить таблицу `user_roles`
--
DROP TABLE IF EXISTS user_roles;

--
-- Установка базы данных по умолчанию
--
USE mytest;

--
-- Создать таблицу `user_roles`
--
CREATE TABLE user_roles (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  role_id int(11) DEFAULT NULL,
  status int(11) DEFAULT 1,
  created_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  updated_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `IDX_user_roles` для объекта типа таблица `user_roles`
--
ALTER TABLE user_roles
ADD INDEX IDX_user_roles (user_id, role_id);

--
-- Создать индекс `IDX_user_roles_status` для объекта типа таблица `user_roles`
--
ALTER TABLE user_roles
ADD INDEX IDX_user_roles_status (status);

--
-- Создать индекс `IDX_user_roles_user_id` для объекта типа таблица `user_roles`
--
ALTER TABLE user_roles
ADD INDEX IDX_user_roles_user_id (user_id);

--
-- Создать таблицу `users`
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
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 18,
AVG_ROW_LENGTH = 2730,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `IDX_users` для объекта типа таблица `users`
--
ALTER TABLE users
ADD INDEX IDX_users (login, password);

--
-- Создать индекс `UK_users_login` для объекта типа таблица `users`
--
ALTER TABLE users
ADD UNIQUE INDEX UK_users_login (login);

--
-- Создать таблицу `roles`
--
CREATE TABLE roles (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `oauth_refresh_tokens`
--
CREATE TABLE oauth_refresh_tokens (
  id varchar(100) NOT NULL,
  access_token_id varchar(100) NOT NULL,
  revoked tinyint(1) NOT NULL,
  expires_at datetime DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `oauth_refresh_tokens_access_token_id_index` для объекта типа таблица `oauth_refresh_tokens`
--
ALTER TABLE oauth_refresh_tokens
ADD INDEX oauth_refresh_tokens_access_token_id_index (access_token_id);

--
-- Создать таблицу `oauth_personal_access_clients`
--
CREATE TABLE oauth_personal_access_clients (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  client_id int(10) UNSIGNED NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 3,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `oauth_personal_access_clients_client_id_index` для объекта типа таблица `oauth_personal_access_clients`
--
ALTER TABLE oauth_personal_access_clients
ADD INDEX oauth_personal_access_clients_client_id_index (client_id);

--
-- Создать таблицу `oauth_clients`
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
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 6,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `oauth_clients_user_id_index` для объекта типа таблица `oauth_clients`
--
ALTER TABLE oauth_clients
ADD INDEX oauth_clients_user_id_index (user_id);

--
-- Создать таблицу `oauth_auth_codes`
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
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `oauth_access_tokens`
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
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать индекс `oauth_access_tokens_user_id_index` для объекта типа таблица `oauth_access_tokens`
--
ALTER TABLE oauth_access_tokens
ADD INDEX oauth_access_tokens_user_id_index (user_id);

--
-- Создать таблицу `migrations`
--
CREATE TABLE migrations (
  id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  migration varchar(255) NOT NULL,
  batch int(11) NOT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Создать таблицу `groups`
--
CREATE TABLE groups (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать таблицу `contact_lists`
--
CREATE TABLE contact_lists (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_id int(11) DEFAULT NULL,
  contact_id int(11) DEFAULT NULL,
  group_id int(11) DEFAULT 1,
  created_at timestamp NULL DEFAULT '0000-00-00 00:00:00',
  updated_at varchar(255) DEFAULT NULL,
  status int(11) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `IDX_contact_lists` для объекта типа таблица `contact_lists`
--
ALTER TABLE contact_lists
ADD INDEX IDX_contact_lists (user_id, group_id);

--
-- Создать индекс `IDX_contact_lists_contact` для объекта типа таблица `contact_lists`
--
ALTER TABLE contact_lists
ADD INDEX IDX_contact_lists_contact (contact_id);

--
-- Создать таблицу `contacts`
--
CREATE TABLE contacts (
  id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(50) DEFAULT NULL,
  phone varchar(25) DEFAULT NULL,
  photo varchar(105) DEFAULT NULL,
  address varchar(105) DEFAULT NULL,
  second_number varchar(25) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8,
COLLATE utf8_general_ci;

--
-- Создать индекс `IDX_contacts` для объекта типа таблица `contacts`
--
ALTER TABLE contacts
ADD INDEX IDX_contacts (name, phone);

--
-- Создать индекс `IDX_contacts_name` для объекта типа таблица `contacts`
--
ALTER TABLE contacts
ADD INDEX IDX_contacts_name (name);

--
-- Создать индекс `IDX_contacts_phone` для объекта типа таблица `contacts`
--
ALTER TABLE contacts
ADD INDEX IDX_contacts_phone (phone);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;