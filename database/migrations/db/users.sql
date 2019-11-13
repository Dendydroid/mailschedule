ALTER TABLE `users`  ADD `name` VARCHAR(255) NOT NULL  AFTER `updated_at`,  ADD `email` VARCHAR(255) NOT NULL  AFTER `name`,  ADD `password` VARCHAR(255) NOT NULL  AFTER `email`;
ALTER TABLE `users` ADD `timezone` VARCHAR(255) NOT NULL AFTER `password`;
