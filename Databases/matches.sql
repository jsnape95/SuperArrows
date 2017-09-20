CREATE TABLE matches (
    id int not null auto_increment,
    matchdate date,
    player1 int not null,
    player2 int not null,
    result int not null,
    PRIMARY KEY(id),
    FOREIGN KEY player1, player2 REFERENCES players(id) 
);
