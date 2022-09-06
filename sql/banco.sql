DROP DATABASE calcMacros;

CREATE DATABASE IF NOT EXISTS calcMacros;

USE calcMacros;

CREATE TABLE IF NOT EXISTS usuario (
    usuario_id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    email VARCHAR(120) NOT NULL,
    idade INT(10) NOT NULL,
    sexo VARCHAR(100) NOT NULL,
    altura DECIMAL(10,2) NOT NULL,
    peso DECIMAL(10,2) NOT NULL,
    objetivo VARCHAR(100) NOT NULL,
    atvfisica VARCHAR(100) NOT NULL,
    caloria INT NOT NULL,
    proteina INT NOT NULL,
    carboidrato INT NOT NULL,
    gordura INT NOT NULL,
    refeicao_id INT NOT  NULL,
    PRIMARY KEY (usuario_id)
);

CREATE TABLE IF NOT EXISTS refeicao(
    refeicao_id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    PRIMARY KEY (refeicao_id)
);

CREATE TABLE IF NOT EXISTS alimento(
    alimento_id INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    porcao INT NOT NULL,
    unidade_medida VARCHAR(100) NOT NULL,
    caloria INT NOT NULL,
    proteina INT NOT NULL,
    carboidrato INT NOT NULL,
    gordura INT NOT NULL,
    PRIMARY KEY (alimento_id)
);

CREATE TABLE IF NOT EXISTS alimento_refeicao(
    alimento__refeicao_id INT NOT NULL AUTO_INCREMENT,
    refeicao_id INT NOT NULL,
    alimento_id INT NOT NULL,
    PRIMARY KEY (alimento__refeicao_id),
    FOREIGN KEY (refeicao_id) REFERENCES refeicao(refeicao_id) ON DELETE CASCADE,
    FOREIGN KEY (alimento_id) REFERENCES alimento(alimento_id) ON DELETE CASCADE
);
