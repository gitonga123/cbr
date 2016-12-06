ALTER TABLE `disease_symptom_combination`
  ADD CONSTRAINT `disease_symptom_combination_ibfk_1` FOREIGN KEY (`symptom_id`) REFERENCES `symptom` (`symptom_id`),
  ADD CONSTRAINT `disease_symptom_combination_ibfk_2` FOREIGN KEY (`disease_id`) REFERENCES `disease` (`disease_id`);
