INSERT INTO `curso`
(`id`, `nome`, `sigla`, `qtdSemestres`, `grau`, `status`)
 VALUES
 ('1', 'Gestão_Financeira', 'GEF', '3', '2', '1'),
 ('2', 'Análise_e_Desenvolvimento_de_Sistemas', 'ADS', '6', '5', '1'),
 ('3', 'Engenharia_Civil', 'ENC', '12', '1', '1'),
 ('4', 'Física', 'FIS', '8', '3', '1'),
 ('5', 'Matemática', 'MAT', '8', '3', '1'),
 ('6', 'Processos_Gerenciais', 'PRG', '5', '5', '1'),
 ('7', 'Administração', 'ADM', '3', '4', '1'),
 ('8', 'Aquicultura', 'AQI', '3', '4', '1'),
 ('9', 'Edificações', 'EDI', '4', '4', '1'),
 ('10', 'Informática_Integrada_ao_Ensino_Médio', 'IEM', '6', '4', '1'),
 ('11', 'Informática_para_internet', 'IPI', '3', '4', '1'),
 ('12', 'Meio_Ambiente', 'MEA', '3', '4', '1');

INSERT INTO `disciplina`
(`id`, `nome`, `sigla`, `qtdProf`, `status`)
VALUES
('1', 'test1', 't1', '2', '1'),
('2', 'test2', 't2', '1', '1');

INSERT INTO `curso_tem_disciplina`
(`idDisciplina`, `idCurso`)
VALUES
('1', '1'),
('1', '2'),
('1', '3'),
('1', '4'),
('1', '5'),
('1', '6'),
('2', '7'),
('2', '8'),
('2', '9'),
('2', '10'),
('2', '11'),
('2', '12');

INSERT INTO `professor`
(`id`, `nome`, `matricula`, `nascimento`, `coordenador`, `status`, `idContrato`, `idNivel`)
VALUES
('1', 'test1', '111', '2017-04-01', '0', '1', '1', '1'),
('2', 'test2', '222', '2017-04-02', '0', '1', '2', '1');

INSERT INTO `competencia`
(`idProfessor`, `idDisciplina`, `interesse`, `lecionando`)
VALUES
('1', '1', '0', '1'),
('2', '2', '0', '1');
