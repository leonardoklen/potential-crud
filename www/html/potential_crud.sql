/*
Connection Name: potential_crud
Hostname: localhost
Port: 3306
Username: leonardo
Password: 123
*/

create schema potential_crud;
use potential_crud;

CREATE TABLE desenvolvedores (
  id integer PRIMARY KEY NOT NULL AUTO_INCREMENT,
  nome varchar(150) NOT NULL,
  sexo char NOT NULL,
  idade integer NOT NULL,
  hobby varchar(150) NOT NULL,
  dataNascimento date NOT NULL
)
