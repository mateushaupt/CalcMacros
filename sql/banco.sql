DROP DATABASE calcMacros;

CREATE DATABASE IF NOT EXISTS calcMacros;

USE calcMacros;

CREATE TABLE IF NOT EXISTS usuario (usuario_id INT NOT NULL AUTO_INCREMENT,
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
                                    PRIMARY KEY (usuario_id));

INSERT INTO USUARIO VALUES (1, 'Francisco Cleber', 'vrido', 'megafrancisco@gmail.com', 18, 'masculino', 175, 70, 'gPeso', 'avancado');