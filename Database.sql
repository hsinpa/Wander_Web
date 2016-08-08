CREATE TABLE Level
(
_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
star int NOT NULL,
coin int,
hero varchar(255),
username varchar(255),
guid varchar(255)
)

CREATE TABLE Sale
(
_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
round int NOT NULL,
product varchar(255),
magic_type varchar(255),
quote_quantity int,
sale_quantity int
price int,
level_id int,
FOREIGN KEY (level_id) REFERENCES Level(_Id)
)

CREATE TABLE PrepareRecord
(
_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
record text,
round int,
level_id int,
FOREIGN KEY (level_id) REFERENCES Level(_Id)
)

CREATE TABLE Interaction (
_id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
name text,
count int,
level_id int,
create_time timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (level_id) REFERENCES Level(_Id)
)
