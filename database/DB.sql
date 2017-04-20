DROP DATABASE IF EXISTS CLASSCLOCK;
CREATE DATABASE IF NOT EXISTS CLASSCLOCK;

USE CLASSCLOCK;

CREATE TABLE IF NOT EXISTS Disciplina(
 id                 INT           NOT NULL  AUTO_INCREMENT,
 nome               VARCHAR(45)   NOT NULL,
 sigla              VARCHAR(5)    NOT NULL  UNIQUE,
 qtdProf            INT           NOT NULL,
 status             BOOLEAN       NOT NULL  DEFAULT TRUE,
 PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Grau (
  id    INT         NOT NULL AUTO_INCREMENT,
  nome  VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO Grau (nome) VALUES ('Bacharel'),('Especialização (Pós-Graduação)'),('Licenciatura'),('Técnico'),('Tecnólogo');

CREATE TABLE IF NOT EXISTS Periodo (
	id		INT			NOT NULL AUTO_INCREMENT,
	nome	VARCHAR(20)	NOT NULL,
	PRIMARY KEY (id)
);

INSERT INTO Periodo (nome) VALUES ('Matutino'),('Vespertino'),('Noturno'),('Integral');

CREATE TABLE IF NOT EXISTS Curso (
  id            INT         NOT NULL AUTO_INCREMENT,
  nome          VARCHAR(45) NOT NULL,
  sigla         VARCHAR(5)  NOT NULL  UNIQUE,
  qtdSemestres  INT         NOT NULL,
  grau          INT         NOT NULL,
  `status`      BOOLEAN     NOT NULL  DEFAULT TRUE,
  PRIMARY KEY (id),
  CONSTRAINT fk_curso_grau
    FOREIGN KEY (grau) REFERENCES Grau(id)
);

CREATE TABLE IF NOT EXISTS Curso_tem_disciplina (
   idDisciplina INT NOT NULL,
   idCurso      INT NOT NULL,
   CONSTRAINT fk_disciplina_curso
    FOREIGN KEY (idDisciplina) REFERENCES Disciplina(id),
   CONSTRAINT fk_curso_disciplina
    FOREIGN KEY (idCurso) REFERENCES Curso(id)
 );

CREATE TABLE IF NOT EXISTS Curso_tem_Periodo (
	 idCurso			INT NOT NULL,
	 idPeriodo		INT NOT NULL,
	 PRIMARY KEY (idCurso,idPeriodo),
	 CONSTRAINT fk_curso_periodo
	 	FOREIGN KEY (idCurso) REFERENCES Curso(id),
	 CONSTRAINT fk_periodo_curso
	 	FOREIGN KEY (idPeriodo) REFERENCES Periodo(id)
 );

CREATE TABLE IF NOT EXISTS Sala (
	id 					   INT            NOT NULL 			AUTO_INCREMENT,
	nSala 				 VARCHAR(5)     NOT NULL      UNIQUE,
	capMax			 	 INT            NOT NULL,
	tipo 				   VARCHAR(45)    NOT NULL,
	`status` 			 BOOLEAN        NOT NULL      DEFAULT TRUE,
	PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS Contrato(
	id					INT           NOT NULL 			AUTO_INCREMENT,
  nome 				VARCHAR(45) 	NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO Contrato (nome) VALUES ('Exclusiva'),('Integral'),('Parcial');

CREATE TABLE IF NOT EXISTS Nivel (
	id					INT 			    NOT NULL 			AUTO_INCREMENT,
  nome 				VARCHAR(45) 	NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO Nivel (nome) VALUES ('Graduação'),('Pós-Graduação'),('Mestrado'),('Doutorado');

CREATE TABLE IF NOT EXISTS Professor(
	id 					INT 			    NOT NULL 			AUTO_INCREMENT,
  nome 				VARCHAR(255) 	NOT NULL,
  matricula 	CHAR(7)    		NOT NULL			UNIQUE,
  nascimento 	DATE 			    NOT NULL,
  coordenador tinyint(1) 		NOT NULL			DEFAULT 0,
  `status` 		tinyint(1) 		NOT NULL			DEFAULT 1,
  idContrato 	INT 			    NOT NULL,
  idNivel			INT 			    NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(idContrato) REFERENCES Contrato(id),
	FOREIGN KEY(idNivel) REFERENCES Nivel(id)
);

CREATE TABLE IF NOT EXISTS Competencia(
	idProfessor			INT 			    NOT NULL,
  idDisciplina		INT 			    NOT NULL,
  interesse 			tinyint(1) 		NOT NULL			DEFAULT 0,
  lecionando      tinyint(1)    NOT NULL,
  PRIMARY KEY(idProfessor, idDisciplina),
  FOREIGN KEY(idProfessor) REFERENCES Professor(id),
  FOREIGN KEY(idDisciplina) REFERENCES Disciplina(id)
);

create TABLE if not EXISTS Relatorio(
  id            INT             NOT NULL      AUTO_INCREMENT,
  nome          VARCHAR(255)    NOT NULL,
  data          DATE            NOT NULL,
  result        INT             NOT NULL,
  PRIMARY KEY(id)
);
