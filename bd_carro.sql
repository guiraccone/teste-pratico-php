CREATE DATABASE IF NOT EXISTS db_carros;

USE db_carros;

CREATE table marca(
	idMarca integer primary key auto_increment,
    nome varchar(99) unique
);

insert into marca(nome)value("Chevrolet");

create table imagens(
	idImagem integer primary key auto_increment,
    image_url text
);

insert into imagens(image_url) value("IMG-648659e6084a39.91733827.webp");

CREATE table modelo(
	idModelo integer primary key auto_increment,
    nome varchar(99) unique,
    idMarca integer,
    foreign key(idMarca) references marca(idMarca) ON DELETE CASCADE ON UPDATE CASCADE
);

insert into modelo(nome, idMarca) values("S10", 1);

CREATE table veiculo(
	idVeiculo integer primary key auto_increment,
    nome varchar(99) unique,
    valor float,
    ano integer,
    descricao text,
    idModelo integer,
    foreign key(idModelo) references modelo(idModelo) ON DELETE CASCADE ON UPDATE CASCADE,
    idImagem integer,
    foreign key(idImagem) references imagens(idImagem) ON DELETE CASCADE ON UPDATE CASCADE
);

insert into veiculo(nome, valor, ano, descricao, idModelo, idImagem) values("S10 Cabine Dupla", 129.999, 2020, "A caminhonete S10, da Chevrolet, está disponível em apenas uma versão de cabine simples, a LS 2.8 Turbo Diesel. De cabine dupla são oito versões da pickup: S10 LT 2.5 Flex 4x2 AT, S10 LT 2.5 Flex 4x4 AT, S10 LT 2.8 Turbo Diesel 4x4, S10 LT 2.8 Turbo Diesel 4x4 MT, S10 LTZ 2.5 Flex 4x2 AT, S10 LTZ 2.5 Flex 4x4 AT, S10 LTZ 2.8 Turbo Diesel 4x4 AT e S10 HIGH COUNTRY 2.8 Turbo Diesel 4x4 AT.", 1 ,1 );

CREATE table leads(

	idLead integer primary key auto_increment,
    nome varchar(99),
    email varchar(99),
    telefone varchar(99),
    cidade varchar(99),
    estado varchar(2),
    mensagem text,
    dataLead datetime,
    
    idVeiculo integer,
    foreign key(idVeiculo) references veiculo(idVeiculo) ON DELETE CASCADE ON UPDATE CASCADE
);
