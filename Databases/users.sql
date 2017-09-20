CREATE TABLE users (
    id int not null auto_increment,
    firstname varchar(30),
    secondname varchar(30),
    username varchar(15),
    acctype char(1) not null,
    pointswon int,
    PRIMARY KEY(id)
);
