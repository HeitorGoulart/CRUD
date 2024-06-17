CREATE DATABASE grafico;

USE grafico;

create table cidades(
	estado varchar(25) not null,
    cidade varchar(60) not null
);

CREATE TABLE dados(
    id INT AUTO_INCREMENT PRIMARY KEY,
    dataDia date NOT NULL,
    tempMax int(2) NOT NULL,
    tempMin int(2) NOT NULL,
    volumeMm double(2,1) NOT NULL
);