-- SCALA SALVATORE GAETANO O46001744

CREATE DATABASE hw1;
USE hw1;

CREATE TABLE utenti
(
    nome VARCHAR(30),
    cognome VARCHAR(30),
    email varchar(50),
    nickname VARCHAR(30) primary key,

    password_utente VARCHAR (20),
    conferma_password VARCHAR(30)
) ENGINE = 'INNODB';