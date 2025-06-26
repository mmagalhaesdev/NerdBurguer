create database Cliente;
use Cliente;
create table clientes(
	id int auto_increment primary key,
    nome varchar(100),
    email varchar(100),
    senha varchar(10),
    endereco varchar(100),
    compra varchar(100),
    entregador varchar(100),
    hora_pedido varchar(5)
);
insert into clientes (nome,email,senha,endereco,compra,entregador,hora_pedido) values
('Nome','email','senha','endereco','','','');
select * from clientes;

