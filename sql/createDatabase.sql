-- DO NOT RUN THIS PLEASE - JS


/*
////////////////////////////
////////////////////////////
*/

-- CREATE DATABASE SuperArrows2;

-- use SuperArrows2;

-- DROP TABLE IF EXISTS 'Rounds';
-- create table Rounds (
--     ID  int not null AUTO_INCREMENT,
--     StartDate  datetime not null,
--     EndDate  datetime not null,
--     PRIMARY KEY ( ID )
-- );

-- DROP TABLE IF EXISTS 'Users';
-- create table Users(
--     ID  int(11) not null AUTO_INCREMENT,
--     FirstName varchar(30),
--     LastName varchar(30),
--     Username varchar(15),
--     Password varchar(50),
--     Salt char(16),
--     Email  varchar(256),
--     AccType char(1),
--     Points int(11),
--     RegisterDate datetime,
--     IP varchar(50),
--     PRIMARY KEY ( ID )
-- );

-- DROP TABLE IF EXISTS 'Players';
-- create table Players(
--     ID  int(11) not null AUTO_INCREMENT,
--     FirstName  varchar(50),
--     LastName varchar(50),
--     PRIMARY KEY ( ID )
-- );

-- DROP TABLE IF EXISTS 'Matches';
-- create table Matches(
--     ID  int(11) not null AUTO_INCREMENT,
--     MatchDateTime datetime,
--     RoundID int(11) not null,
--     PRIMARY KEY ( ID ),
--     FOREIGN KEY ( RoundID ) REFERENCES Rounds( ID )
-- );

-- DROP TABLE IF EXISTS 'PlayerMatchLinks';
-- create table PlayerMatchLinks(
--     ID int(11) not null AUTO_INCREMENT,
--     PlayerID  int(11) not null,
--     MatchID  int(11) not null,
--     Score int(11),
--     No180s int(11),
--     PRIMARY KEY ( ID ),
--     FOREIGN KEY ( PlayerID ) REFERENCES Players( ID ),
--     FOREIGN KEY ( MatchID ) REFERENCES Matches( ID )
-- );

-- DROP TABLE IF EXISTS 'Predictions';
-- create table Predicitons(
--     ID  int(11) not null AUTO_INCREMENT,
--     PlayerMatchLinkID  int(11) not null,
--     UserID int(11) not null,
--     Score  int(11),
--     No180s int(11),
--     PRIMARY KEY ( ID ),
--     FOREIGN KEY ( PlayerMatchLinkID ) REFERENCES PlayerMatchLinks( ID ),
--     FOREIGN KEY ( UserID ) REFERENCES Users( ID )
-- );


