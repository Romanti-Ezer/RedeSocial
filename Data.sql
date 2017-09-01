create database rede_social;
use rede_social;
create table usuario(
id_usuario int(20) not null auto_increment,
nome varchar(50) not null,
email varchar(50) not null,
senha varchar(30) not null,
img varchar(200) default 'src/profile_pic.png',
descricao varchar(500),
nome_escola varchar(50),
local_escola varchar(50),
local_casa varchar(50),
relacao varchar(30),
primary key (id_usuario)
) default charset=utf8;

INSERT INTO `usuario` (`id_usuario`, `nome`, `email`, `senha`, `img`, `descricao`, `nome_escola`, `local_escola`, `local_casa`, `relacao`) VALUES
	(1, 'Romanti-Ezer Gomes dos Santos', 'romanti123gds@yahoo.com.br', 'Romanti10', 'src/profile_pic.png', 'Minha filosofia de vida é sempre tentar melhorar e aprender cada mais. Gosto muito de pesquisar sobre coisas que não conheço, como tecnologias e linguagens.', 'Fatec Americana', 'Americana', 'Sumaré - SP', 'Solteiro'),
	(2, 'Victor Menezes', 'victor@gmail.com.br', 'Victor1001', 'src/profile_pic.png', 'Adoro assistir séries e filmes. Me convida pro cinema que eu vou.', 'UNICAMP', 'Campinas', 'Campinas - SP', 'Solteiro'),
	(3, 'Leticia Rodrigues', 'le.rodrigues86@hotmail.com', 'Lele2001', 'src/profile_pic.png', 'Gosto muito de instrumentos. Música me encanta, por isso toco 4 instrumentos atualmente e cada dia quero aprender mais sobre eles e sobre novos instrumentos.', 'Etec Polivalente', 'Americana', 'Santa Bárbara D\'oeste', 'Casada'),
	(4, 'Rodrigo Campos Silva', 'rodrigo.1993@outlook.com', 'CoxinhaFrango', 'src/profile_pic.png', 'Meus filhos são a razão do meu viver. Presente de Deus ', NULL, NULL, 'Nova Odessa', 'Casado');
