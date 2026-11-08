SET NAMES utf8mb4;

DROP TABLE IF EXISTS `pocitace`;
CREATE TABLE `pocitace` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nazov` VARCHAR(100) NOT NULL,
    `popis` VARCHAR(255) DEFAULT NULL,
    `cena` DECIMAL(10,2) NOT NULL,
    `sklad`INT(11) NOT NULL DEFAULT 0,
    `obrazok` VARCHAR(300) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pocitace` (`nazov`, `popis`, `cena`, `sklad`, `obrazok`)
VALUES ('Herný PC', 'RTX 4060 · 32 GB DDR5', 999.00, 5, NULL),
       ('Kancelársky PC', 'Intel i3 · 16 GB DDR4', 449.00, 12, NULL),
       ('Herný Dragon Pro', 'RTX 5070 · 64 GB DDR5', 2089.00, 2, NULL),
       ('Študentský PC', 'Ryzen 5 · 16 GB DDR5', 649.00, 8, NULL),
       ('Mini PC', 'Intel N100 · 8 GB DDR4', 279.90, 15, NULL),
       ('Workstation Pro', 'Intel i9 · 128 GB DDR5', 3499.00, 1, NULL);