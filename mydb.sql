create database mydb;
use mydb;

create table USUARIO
(
ID mediumint not null auto_increment primary key, 
CPF numeric(11) not null,
NOME varchar(80) not null,
SEXO char(1) not null,
NOME_M varchar(80) not null,
LOGIN char(6) not null,
SENHA char(8) not null,
TEL_CEL char(16),
TEL_FIX char(16),
ENDERECO varchar (50),
status_USUARIO varchar(30) not null,
DT_ULT_VAL timestamp not null,
DATA_NASC date not null,
TIPO_USUARIO char(6) not null);

insert into usuario (CPF, NOME, SEXO, NOME_M, LOGIN, SENHA, TEL_CEL, TEL_FIX, ENDERECO, status_USUARIO, DT_ULT_VAL, DATA_NASC, TIPO_USUARIO)
values
(12345678909 ,'maria da silva sei la','M','fulana da silva sei la','login1', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(98765432100 ,'Maria da silva sei la','M','fulana da silva sei la','login2', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(45678912345 ,'João da silva sei la','F','fulana da silva sei la','login3', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(32165498780 ,'Mario da silva sei la','F','fulana da silva sei la','login4', '123senha', '(+55)12-31231231','(+55)44-34434312','Irineu', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(55555555555 ,'Marcos da silva sei la','M','fulana da silva sei la','login5', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(99999999999 ,'Julia da silva sei la','F','fulana da silva sei la','login6', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(88888888888 ,'Rafael da silva sei la','F','fulana da silva sei la','login7', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(77777777777 ,'Rafaela da silva sei la','M','fulana da silva sei la','login8', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(66666666666 ,'Paula da silva sei la','F','fulana da silva sei la','login9', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','COMUM'),
(3333333333 ,'admin da silva sei la','F','fulana da silva sei la','admin1', '123senha', '(+55)12-31231231','(+55)44-34434312','Rua - sei la das quantas', 'ATIVO', current_timestamp, '1997-05-15','MASTER');

create table TABELA_TIPOS_USUARIO
(
TIPO_USUARIO char(6) primary key,
TIPO_DESC char(100) not null
);

insert into TABELA_TIPOS_USUARIO values 
('COMUM', 'usuario comum'),
('MASTER', 'usuario master');

alter table USUARIO add constraint FK_TIPOUSUARIO foreign key (TIPO_USUARIO) references TABELA_TIPOS_USUARIO (TIPO_USUARIO);