CREATE DATABASE Dalli;
USE Dalli;

CREATE TABLE Galleria (
    ID SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    descrizione VARCHAR(512) NOT NULL,
    tipo VARCHAR(10) NOT NULL,
    dimensioni  BIGINT NOT NULL,
    immagine MEDIUMBLOB NOT NULL
);


