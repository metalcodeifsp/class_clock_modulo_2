DROP DATABASE IF EXISTS prof;
CREATE DATABASE IF NOT EXISTS prof;

USE prof;

CREATE TABLE IF NOT EXISTS Disciplina(
 id                 INT           NOT NULL  AUTO_INCREMENT,
 nome               VARCHAR(45)   NOT NULL,
 sigla              VARCHAR(5)    NOT NULL  UNIQUE,
 PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS FENC (
  id      INT         NOT NULL AUTO_INCREMENT,
  nome    VARCHAR(45) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO FENC (nome) VALUES
('Ensino Técnico / Médio'),
('Graduação'),
('Pós-graduação lato sensu'),
('Pós-graduação stricto sensu');

CREATE TABLE IF NOT EXISTS Curso (
  id            INT         NOT NULL AUTO_INCREMENT,
  nome          VARCHAR(45) NOT NULL,
  sigla         VARCHAR(5)  NOT NULL  UNIQUE,
  fenc          INT         NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_curso_fenc
    FOREIGN KEY (fenc) REFERENCES FENC(id)
);

CREATE TABLE IF NOT EXISTS Curso_tem_disciplina (
   idDisciplina INT NOT NULL,
   idCurso      INT NOT NULL,
   CONSTRAINT fk_disciplina_curso
    FOREIGN KEY (idDisciplina) REFERENCES Disciplina(id),
   CONSTRAINT fk_curso_disciplina
    FOREIGN KEY (idCurso) REFERENCES Curso(id)
 );

CREATE TABLE IF NOT EXISTS Contrato(
	id					INT           NOT NULL 			AUTO_INCREMENT,
  nome 				VARCHAR(45) 	NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO Contrato (nome) VALUES ('Integral'),('Parcial');

CREATE TABLE IF NOT EXISTS Professor(
	id 					INT 			    NOT NULL 			AUTO_INCREMENT,
  nome 				VARCHAR(255) 	NOT NULL,
  idContrato 	INT 			    NOT NULL,
  PRIMARY KEY(id),
  FOREIGN KEY(idContrato) REFERENCES Contrato(id)
);

CREATE TABLE IF NOT EXISTS Professor_Leciona_Diciplina(
	idProfessor			INT 			    NOT NULL,
  idDisciplina		INT 			    NOT NULL,
  PRIMARY KEY(idProfessor, idDisciplina),
  FOREIGN KEY(idProfessor) REFERENCES Professor(id),
  FOREIGN KEY(idDisciplina) REFERENCES Disciplina(id)
);
