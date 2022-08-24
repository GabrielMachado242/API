 -- criando a tabela com todos as informações necessarias para o fornecedor
 create table fornecedor(
cnpj integer not null,
nome varchar (30) not null,
sobrenome varchar (30) not null,
senha varchar (16) not null,
telefone INTEGER,
email varchar (30) ,
nasc date,
primary key (cnpj)	 
);
-- inserindo um valor para teste na tabela fornecedor
INSERT into fornecedor (cnpj, nome, sobrenome, senha, telefone, email, nasc) 
VALUES ('125487654','Irineu', 'Mendes', 'senha123456', '97854124', ' IrineuMends@gmail.com', '05/08/1987');

-- vendo informaçoes da tabela fornecedor
SELECT * FROM fornecedor;

-- criando a tabela produto
CREATE TABLE produto(
id_produto serial NOT NULL PRIMARY KEY ,
id_fornecedor INTEGER, 	
nome varchar (30) NOT NULL,
marca varchar (30),
peso FLOAT,
preco FLOAT,	
tipo varchar (30),
FOREIGN KEY (id_fornecedor)  REFERENCES fornecedor (cnpj)  
	ON UPDATE CASCADE
	ON DELETE CASCADE
);

SELECT * FROM produto;

--criando a tabela estabelecimento
CREATE TABLE estabelecimento(
id_produto integer,
endereco varchar (30) NOT NULL,
numero integer NOT NULL,
telefone integer,
FOREIGN KEY  (id_produto) REFERENCES produto(id_produto)
	ON DELETE CASCADE
	ON UPDATE CASCADE
	
);

SELECT * FROM estabelecimento;

DROP TABLE estabelecimento CASCADE;