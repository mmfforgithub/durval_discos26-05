CREATE DATABASE IF NOT EXISTS durval;
USE durval;

CREATE TABLE artista(
    idArtista INT AUTO_INCREMENT PRIMARY KEY,
    nome_artista VARCHAR(100)
);

CREATE TABLE disco(
    idDisco INT AUTO_INCREMENT PRIMARY KEY,
    nome_disco VARCHAR(100),
    valor INT,
    idArtista INT,
    FOREIGN KEY (idArtista) REFERENCES artista(idArtista)    
);

CREATE TABLE cliente(
    idCliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(25),
    telefone VARCHAR(15)
);

CREATE TABLE venda(
  idVenda INT AUTO_INCREMENT PRIMARY KEY,
  data_de_venda date,
  idDisco INT,
  idCliente INT,
  FOREIGN KEY (idDisco) REFERENCES disco(idDisco),
  FOREIGN KEY (idCliente) REFERENCES cliente(idCliente)
);


