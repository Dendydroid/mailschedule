ALTER TABLE `messages`  ADD `message` VARCHAR(255) NOT NULL  AFTER `updated_at`,  ADD `to_user` VARCHAR(255) NOT NULL  AFTER `message`,  ADD `send_at` VARCHAR(255) NOT NULL  AFTER `to_user`;
