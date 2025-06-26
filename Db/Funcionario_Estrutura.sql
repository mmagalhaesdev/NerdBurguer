create database Funcionario;
use Funcionario;
create table funcionario(
	id int auto_increment primary key,
    nome varchar(100),
    email varchar(100),
    senha varchar(100),
    cpf varchar(14),
    rg varchar(11),
    data_nascimento date,
    telefone varchar(11),
    estado_civil varchar(100),
    endereco varchar(100),
	cargo	varchar(100),
	data_admissao date,
    salario	int,
    jornada_trabalho int,
    tipo_contrato varchar(100)
);
insert into funcionario(nome,email,senha,cpf,rg,data_nascimento,telefone,estado_civil,endereco,cargo,data_admissao,salario,jornada_trabalho,tipo_contrato) values
('Nome', 'email','senha','cpf','rg','data_nascimento','telefone','estado_civil','endereço','cargo','data_admissão',0,0,'tipo_contrato');
select * from funcionario;