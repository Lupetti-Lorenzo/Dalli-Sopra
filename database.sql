CREATE USER 'Carra' IDENTIFIED BY 'Carra';
SET PASSWORD for 'Carra' = 'CarraxGameplayer01abcd';
GRANT SELECT, INSERT, DELETE ON Dalli.Galleria TO 'Carra';
ALTER USER 'Carra' IDENTIFIED WITH mysql_native_password BY 'CarraxGameplayer01abcd'; 

CREATE USER 'Client' IDENTIFIED BY 'Client';
SET PASSWORD for 'Client' = 'Client';
GRANT SELECT ON Dalli.Galleria TO 'Client';
ALTER USER 'Client' IDENTIFIED WITH mysql_native_password BY 'Client'; 


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



