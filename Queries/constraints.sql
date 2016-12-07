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
