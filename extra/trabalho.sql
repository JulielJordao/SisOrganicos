create database sisSolucoesAgriOrganica DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use sisSolucoesAgriOrganica;

create table if not exists familia (
 codFamilia int (11) not null auto_increment primary key,
 nomFamilia varchar(50) not null
);

create table if not exists planta (
codPlanta int(11) not null auto_increment primary key,
nomPopular varchar(50) not null,
nomCientifico varchar(50) not null,
codFamilia int (11) not null,
descricao varchar(256),
clima varchar(20),
regOrigem varchar(50),
referencias varchar(256),
numAcessos int(15),
datInsercao datetime
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists planta_problema(
codPlantaProblema int(11) not null auto_increment primary key,
codDoenca int(11) not null,
codPlanta int(11) not null
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists doenca_praga(
codDoenca int(11) not null auto_increment primary key,
nomPopular varchar(50) not null,
nomCientifico varchar(50) not null,
codTipo int (11),
referencias varchar(256),
numAcessos int (15),
descricao varchar(256),
datInsercao datetime
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists agente_causador (
codCausador int(11) not null auto_increment primary key,
nomCausador varchar(256)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists solucao (
codSolucao int (11) not null auto_increment primary key,
codPlantaProblema int(11) not null,
descricao varchar(512),
referencias varchar(256) ,
numAcessos int (15),
condFavoravel varchar(256),
datInsercao datetime
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists analises(
codAnalise int (11) not null auto_increment primary key,
notaAnalise int (2) not null,
descricao varchar(256),
codSolucao int (11)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists solucao_produto(
codSolProduto int(11) not null auto_increment primary key,
codProduto int (11) not null,
codSolucao int (11) not null
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists produto(
codProduto int(11) not null auto_increment primary key,
nomProduto varchar(50) not null
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists produto_composicao(
codProdComp int(11) not null auto_increment primary key,
codProduto int(11) not null,
codComposicao int(11) not null
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists composicao(
codComposicao int(11) not null auto_increment primary key,
nomComposicao varchar(50) not null
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists produto_empresa(
codProdEmpresa int(11) not null auto_increment primary key,
inscricao varchar(32) not null,
disponivel boolean not null,
codProduto int(11) not null,
codEmpresa int(11) not null
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists empresa(
codEmpresa int(11) not null auto_increment primary key,
cnpj int(15) not null,
cidade varchar(50) not null,
pais varchar(50) not null,
endereco varchar(50) not null,
telefone int(11) not null,
nomResponsavel varchar(50) not null,
email varchar(50) not null,
login varchar(15) not null,
senha varchar(15) not null
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists pagamentos(
codPagamento int(11) not null auto_increment primary key,
datPagamento date,
valPagamento decimal(5,2) not null,
descricao varchar(256),
datVencimento date,
sitPagamento boolean,
codEmpresa int(11) not null,
codControle int(11),
qtdAnuncios int(3),
meioPagamento varchar(15)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists controle_anuncio_mes(
codAnuMes int(11) not null auto_increment primary key,
codProdEmpresa int(11) not null,
codControle int(11),
numAcessos int(11),
datEncerramento date,
codPagamento int(11),
visibilidade int(1)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

create table if not exists controle_anuncio(
codControle int(11) not null auto_increment primary key,
periodoAbertura date,
periodoFechamento date,
numAcessos int(11),
restricao boolean not null
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

alter table planta
add foreign key (codFamilia)
references familia(codFamilia);

alter table planta_problema
add foreign key (codPlanta)
references planta(codPlanta);

alter table planta_problema
add foreign key (codDoenca)
references doenca_praga(codDoenca);

alter table doenca_praga
add foreign key (codTipo)
references agente_causador(codCausador);

alter table solucao
add foreign key (codPlantaProblema)
references planta_problema(codPlantaProblema);

alter table analises
add foreign key (codSolucao)
references solucao(codSolucao);

alter table solucao_produto
add foreign key(codSolucao)
references solucao(codSolucao);

alter table solucao_produto
add foreign key(codProduto)
references produto(codProduto);

alter table produto_composicao
add foreign key(codProduto)
references produto(codProduto);

alter table produto_composicao
add foreign key(codComposicao)
references composicao(codComposicao);

alter table produto_empresa
add foreign key(codProduto)
references produto(codProduto);

alter table produto_empresa
add foreign key(codEmpresa)
references empresa(codEmpresa);

alter table pagamentos
add foreign key (codEmpresa)
references empresa(codEmpresa);

alter table controle_anuncio_mes
add foreign key (codProdEmpresa)
references produto_empresa(codProdEmpresa);

alter table controle_anuncio_mes
add foreign key (codPagamento)
references pagamentos(codPagamento);

alter table controle_anuncio_mes
add foreign key (codControle)
references controle_anuncio(codControle);

insert into agente_causador(nomCausador)
value ("Fungo");

insert into agente_causador(nomCausador)
value ("Bactéria");

insert into familia(nomFamilia)
value ("Solanaceae");
