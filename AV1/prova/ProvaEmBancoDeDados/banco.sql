CREATE DATABASE IF NOT EXISTS `3daw`;
USE `3daw`;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL
);

CREATE TABLE perguntas (
    id VARCHAR(50) PRIMARY KEY,
    pergunta VARCHAR(255) NOT NULL
);

CREATE TABLE respostas (
    id_pergunta VARCHAR(50) NOT NULL,
    id_resposta INT NOT NULL,
    resposta VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_pergunta, id_resposta),
    FOREIGN KEY (id_pergunta) REFERENCES perguntas(id)
);