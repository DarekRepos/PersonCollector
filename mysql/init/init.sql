CREATE TABLE IF NOT EXISTS persons (
                                       id INT(11) AUTO_INCREMENT PRIMARY KEY,
                                       firstname VARCHAR(55) NOT NULL,
                                       lastname VARCHAR(155) NOT NULL,
                                       age INT(3) UNSIGNED NOT NULL
)  ENGINE=INNODB;