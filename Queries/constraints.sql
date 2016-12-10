ALTER TABLE `disease_symptom_combination`
  ADD CONSTRAINT `disease_symptom_combination_ibfk_1` FOREIGN KEY (`symptom_id`) REFERENCES `symptom` (`symptom_id`),
  ADD CONSTRAINT `disease_symptom_combination_ibfk_2` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`disease_id`);

CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);

//Chat Messages
CREATE TABLE `s_chat_messages` (
`id` INT(11) NOT NULL AUTO_INCREMENT ,
`user` VARCHAR(255) NOT NULL ,
`message` VARCHAR(255) NOT NULL ,
`when` INT(11) NOT NULL ,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE VIEW chat_message AS
    SELECT 
        ch.id, ch.user, ch.message, ch.when, ch.user_id
    FROM
        s_chat_messages ch
            INNER JOIN
        store_session se ON ch.user_id = se.user_id
            INNER JOIN
        users sa ON sa.user_id = se.user_id

CREATE TABLE `privatemessage` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE private_message_send (
    msg_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    sender INT NOT NULL,
    receiver INT NOT NULL,
    message TEXT NOT NULL,
    timestamp VARCHAR(100),
    status VARCHAR(100)
)
CREATE TABLE reply_message_send (
    reply_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    msg_id INT NOT NULL,
    message TEXT NOT NULL,
    sendto INT NOT NULL
);