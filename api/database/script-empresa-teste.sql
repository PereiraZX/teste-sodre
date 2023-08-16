CREATE DATABASE IF NOT EXISTS empresa;
USE empresa;

-- Criação da tabela cargo
CREATE TABLE cargo (
    id INT NOT NULL AUTO_INCREMENT,
    nome_cargo VARCHAR(255) NOT NULL,
    salario DOUBLE NOT NULL,
    PRIMARY KEY (id)
)
Engine=InnoDB;

-- Criação da tabela funcionario
CREATE TABLE funcionario (
    id INT  AUTO_INCREMENT,
    nome_funcionario VARCHAR(255) NOT NULL,
    rua VARCHAR(100) NOT NULL,
	numero INT NOT NULL,
	cidade VARCHAR(30) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    id_cargo INT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cargo) REFERENCES cargo(id)
)
Engine=InnoDB;



-- Exibição do relátorio 1
SELECT f.id, f.nome_funcionario AS funcionario, c.nome_cargo AS cargo, c.salario AS salario
FROM funcionario AS f  
JOIN cargo AS c ON f.id_cargo = c.id
ORDER BY id DESC;

-- Exibição do relátorio 2
SELECT c.nome_cargo AS Cargo, COUNT(f.id) AS 'Qtde Funcionários', SUM(c.salario) AS 'Total de Salários'
FROM cargo AS c
LEFT JOIN funcionario AS f ON c.id = f.id_cargo
GROUP BY c.id

