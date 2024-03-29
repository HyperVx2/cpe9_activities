--
-- Database: `voting_system`
--

CREATE DATABASE voting_system;
USE voting_system;

--
-- Table: `users`
--

CREATE TABLE voting_system.users (
    id INT UNIQUE AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    firstName VARCHAR(50) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    program VARCHAR(15) NOT NULL,
    yearLevel TINYINT(1) NOT NULL,
    voted TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

--
-- Table: `votes`
--

CREATE TABLE voting_system.votes (
    id INT UNIQUE AUTO_INCREMENT,
    username VARCHAR(10) NOT NULL,
    yearLevel TINYINT(1) NOT NULL,
    president VARCHAR(50),
    vpresident VARCHAR(50),
    rep VARCHAR(255),
    PRIMARY KEY (id)
);


--
-- Table: `candidates`
--

CREATE TABLE voting_system.candidates (
    id INT UNIQUE AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    party VARCHAR(25) NOT NULL DEFAULT "IND",
    program VARCHAR(15),
    position VARCHAR(15) NOT NULL,
    PRIMARY KEY (id)
);


