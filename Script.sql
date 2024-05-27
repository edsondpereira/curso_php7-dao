CREATE DATABASE bdcomissao
USE bdcomissao

CREATE TABLE tbvendedor
(
idvendedor INT(4) AUTO_INCREMENT PRIMARY KEY,
vendedor VARCHAR(60) NOT NULL,
email VARCHAR(30) NOT NULL,
contato VARCHAR(15) NOT NULL,
situacao CHAR(1) DEFAULT 'A'
)

CREATE TABLE tbcomissao
(
idcomissao INT(4) AUTO_INCREMENT PRIMARY KEY,
idcomissao_vendedor INT(4) NOT NULL,
data DATE NOT NULL,
valor_venda DECIMAL(10,2) NOT NULL,
percentual_comissao DECIMAL(6,2) NOT NULL,
FOREIGN KEY(idcomissao_vendedor) REFERENCES tbvendedor(idvendedor)
)

CREATE TABLE tbusuarios
(
idusuario INT(4) AUTO_INCREMENT PRIMARY KEY,
usuario VARCHAR(30) NOT NULL,
senha VARCHAR(20) NOT NULL,
nivel INT(1) NULL
)

INSERT INTO tbusuarios (usuario, senha, nivel)
VALUES ('admin', '123',1)

SELECT tbcomissao.idcomissao, tbcomissao.idcomissao_vendedor, tbvendedor.vendedor, 
tbcomissao.data, tbcomissao.valor_venda, tbcomissao.percentual_comissao FROM tbcomissao
INNER JOIN tbvendedor ON tbvendedor.idvendedor = tbcomissao.idcomissao_vendedor

SELECT * FROM tbusuarios WHERE usuario = 'operador' AND senha='456'

