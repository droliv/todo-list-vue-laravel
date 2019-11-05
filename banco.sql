CREATE DATABASE bancotasks;
USE bancotasks;

CREATE TABLE tasks(
codigo int(10) AUTO_INCREMENT,
titulo varchar(30) NOT NULL,
descricao varchar(50),
PRIMARY KEY (codigo)
);
