create database raciono;
use raciono;

CREATE TABLE usuario(id_user int(4) primary key not null auto_increment,
					nome_user varchar(80) not null,
                    email_user varchar(90) not null unique,
					senha_user varchar(16) not null,
					liberado_user char(3) null);
                    
CREATE TABLE adm(id_adm int(2) primary key not null auto_increment,
				email_adm varchar(90) not null unique,
				nome_adm varchar(80) not null,
				senha_adm varchar (16) not null);
                

CREATE TABLE gerente(id_gerente int(2) primary key not null auto_increment,
					nome_gerente varchar(80) not null,
                    email_gerente varchar(90)not null unique,
                    senha_gerente varchar (16) not null);
                    

CREATE TABLE jornalist(id_jornalist int (3) primary key not null auto_increment,
						nome_jornalist varchar(80) not null,
                        email_jornalist varchar(90) not null,
                        senha_jornalist varchar(16) not null,
                        liberado_jornalist char(3) null);
                        

CREATE TABLE materias (id_materia int(3) primary key not null auto_increment,
						id_jornalist int not null,
						imagem varchar(100) not null unique,
						manchete varchar(100) not null,
						previa varchar(200) not null,
					FOREIGN KEY (id_jornalist) REFERENCES jornalist(id_jornalist)
);

CREATE TABLE paragrafos (id int(3) primary key not null auto_increment,
						id_materia int(3),
						ordem int(3) not null,
						subtitulo varchar(100) not null,
						texto text not null,
						FOREIGN KEY (id_materia) REFERENCES materias(id_materia)
);

INSERT INTO adm VALUES (1, 'adm@gmail.com', 'Administradô', 'senha');
 
