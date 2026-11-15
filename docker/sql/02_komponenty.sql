SET NAMES utf8mb4;

DROP TABLE IF EXISTS `zostava_pocitaca`;
DROP TABLE IF EXISTS `komponenty`;

CREATE TABLE `komponenty` (
    `id`      INT(11)      NOT NULL AUTO_INCREMENT,
    `nazov`   VARCHAR(100) NOT NULL,
    `vyrobca` VARCHAR(100) NOT NULL,
    `popis`   VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `zostava_pocitaca` (
    `id`          INT(11) NOT NULL AUTO_INCREMENT,
    `pocitacId`   INT(11) NOT NULL,
    `komponentId` INT(11) NOT NULL,
    `mnozstvo`    INT(11) NOT NULL DEFAULT 1,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uq_pocitac_komponent` (`pocitacId`, `komponentId`),
    CONSTRAINT `fk_zostava_pocitac` FOREIGN KEY (`pocitacId`) REFERENCES `pocitace` (`id`) ON DELETE CASCADE,
    CONSTRAINT `fk_zostava_komponent` FOREIGN KEY (`komponentId`) REFERENCES `komponenty` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `komponenty` (`nazov`, `vyrobca`, `popis`)
VALUES ('Ryzen 5 7600', 'AMD', '6 jadier, do 5,1 GHz'),
       ('Ryzen 7 7800X3D', 'AMD', '8 jadier, 3D V-Cache'),
       ('Core i3-12100', 'Intel', '4 jadrá, do 4,3 GHz'),
       ('Core i9-14900K', 'Intel', '24 jadier, do 6,0 GHz'),
       ('N100', 'Intel', 'úsporný 4-jadrový procesor'),
       ('GeForce RTX 4060', 'NVIDIA', '8 GB GDDR6'),
       ('GeForce RTX 5070', 'NVIDIA', '12 GB GDDR7'),
       ('Fury Beast 16 GB DDR5', 'Kingston', '5600 MHz'),
       ('Fury Beast 32 GB DDR5', 'Kingston', '5600 MHz'),
       ('Value 8 GB DDR4', 'Crucial', '3200 MHz'),
       ('990 EVO 1 TB', 'Samsung', 'NVMe SSD'),
       ('990 PRO 2 TB', 'Samsung', 'NVMe SSD'),
       ('NV2 500 GB', 'Kingston', 'NVMe SSD');

INSERT INTO `zostava_pocitaca` (`pocitacId`, `komponentId`, `mnozstvo`)
VALUES (1, 1, 1), (1, 6, 1), (1, 8, 2), (1, 11, 1),
       (2, 3, 1), (2, 10, 2), (2, 13, 1),
       (3, 2, 1), (3, 7, 1), (3, 9, 2), (3, 12, 1),
       (4, 1, 1), (4, 8, 1), (4, 11, 1),
       (5, 5, 1), (5, 10, 1), (5, 13, 1),
       (6, 4, 1), (6, 7, 1), (6, 9, 4), (6, 12, 1);