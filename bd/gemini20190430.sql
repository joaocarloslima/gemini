-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 10.129.76.12
-- Tempo de geração: 30/04/2019 às 23:00
-- Versão do servidor: 5.6.26-log
-- Versão do PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `gemini`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alternativas`
--

CREATE TABLE IF NOT EXISTS `alternativas` (
`idAlternativa` int(11) NOT NULL,
  `texto` varchar(200) DEFAULT NULL,
  `idQuestao` int(11) NOT NULL,
  `correta` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Fazendo dump de dados para tabela `alternativas`
--

INSERT INTO `alternativas` (`idAlternativa`, `texto`, `idQuestao`, `correta`) VALUES
(1, 'Nome, Tamanho e CÃ¡lculo', 1, 0),
(2, 'Entrada, Processamento e SaÃ­da', 1, 1),
(3, 'Entrada, Nome e FunÃ§Ã£o', 1, 0),
(4, 'Argumentos, Processo e EndereÃ§o', 1, 0),
(5, 'Infinitas', 2, 0),
(6, '1024', 2, 0),
(7, '525479', 2, 0),
(8, '1048576', 2, 1),
(9, 'FunÃ§Ã£o Destaque( )', 3, 0),
(10, 'Auto Soma', 3, 0),
(11, 'FormataÃ§Ã£o Condicional', 3, 1),
(12, 'ValidaÃ§Ã£o de Dados', 3, 0),
(13, 'MED', 4, 1),
(14, 'MEDIANA', 4, 0),
(15, 'MEDIA', 4, 0),
(16, 'MEDIANA_VALORES', 4, 0),
(17, 'FunÃ§Ã£o Ã‰.ERRO( )', 5, 0),
(18, 'FormataÃ§Ã£o Condicional', 5, 0),
(19, 'Filtro e ClassificaÃ§Ã£o', 5, 0),
(20, 'ValidaÃ§Ã£o de Dados', 5, 1),
(21, '=MÃ‰DIA(1; 1; 2; 3; 5)', 6, 0),
(22, '=MÃ‰DIA(2; 3; 5; 7; 11)', 6, 1),
(23, '=MÃ‰DIA.PRIMOS(5)', 6, 0),
(24, '=MÃ‰DIA(2, 3, 5, 7, 11)', 6, 0),
(25, '=MAIOR(A:A)', 7, 0),
(26, '=MÃXIMO(A1)', 7, 0),
(27, '=MÃXIMO(A:A)', 7, 1),
(28, '=MAIOR(altura)', 7, 0),
(29, '=RAIZ($D5)', 8, 1),
(30, '=RAIZ(D$5)', 8, 0),
(31, '=RAIZ(D)', 8, 0),
(32, '=RAIZ($D$5)', 8, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE IF NOT EXISTS `alunos` (
`idAluno` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `foto` varchar(200) NOT NULL DEFAULT 'assets/img/default-avatar.png',
  `perfilAprendizagem` varchar(200) DEFAULT NULL,
  `perfilJogador` varchar(200) DEFAULT NULL,
  `engajamento` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `alunos`
--

INSERT INTO `alunos` (`idAluno`, `nome`, `email`, `senha`, `foto`, `perfilAprendizagem`, `perfilJogador`, `engajamento`) VALUES
(2, 'JoÃ£o Carlos Lima', 'joaocarloslima@me.com', 'efa09caf0435264ae27db89bbb9bed6c', 'assets/img/alunos/foto_aluno1556318934.jpg', 'Auditivo', 'Disruptor', 3.78),
(3, 'Karina Oliveira', 'karina@gmail.com', '202cb962ac59075b964b07152d234b70', 'assets/img/default-avatar.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos_conquistas`
--

CREATE TABLE IF NOT EXISTS `alunos_conquistas` (
`idAlunosConquistas` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idConquista` int(11) NOT NULL,
  `obtidaEm` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Fazendo dump de dados para tabela `alunos_conquistas`
--

INSERT INTO `alunos_conquistas` (`idAlunosConquistas`, `idAluno`, `idConquista`, `obtidaEm`) VALUES
(1, 2, 1, '2019-04-30 19:51:02'),
(2, 2, 1, '2019-04-30 19:51:10'),
(3, 2, 1, '2019-04-30 19:51:14'),
(4, 2, 1, '2019-04-30 19:51:20'),
(5, 2, 2, '2019-04-30 19:51:24'),
(6, 2, 1, '2019-04-30 19:51:26'),
(7, 2, 1, '2019-04-30 19:51:27'),
(8, 2, 1, '2019-04-30 19:51:29'),
(9, 2, 1, '2019-04-30 19:51:33'),
(10, 2, 1, '2019-04-30 19:51:38'),
(11, 2, 1, '2019-04-30 19:51:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos_fases`
--

CREATE TABLE IF NOT EXISTS `alunos_fases` (
`idAlunosFases` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idFase` int(11) NOT NULL,
  `iniciadoEm` datetime NOT NULL,
  `finalizadoEm` datetime DEFAULT NULL,
  `xp` int(11) DEFAULT NULL,
  `resposta` text,
  `anexo` varchar(250) DEFAULT NULL,
  `feedback` text,
  `feedbackVisualizadoEm` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Fazendo dump de dados para tabela `alunos_fases`
--

INSERT INTO `alunos_fases` (`idAlunosFases`, `idAluno`, `idFase`, `iniciadoEm`, `finalizadoEm`, `xp`, `resposta`, `anexo`, `feedback`, `feedbackVisualizadoEm`) VALUES
(12, 2, 3, '2019-04-30 11:59:54', '2019-04-30 11:59:58', 10, NULL, NULL, NULL, NULL),
(13, 2, 1, '2019-04-30 12:00:15', '2019-04-30 12:00:21', 10, NULL, NULL, NULL, NULL),
(14, 2, 2, '2019-04-30 12:04:46', '2019-04-30 12:05:13', 10, NULL, NULL, NULL, NULL),
(15, 2, 5, '2019-04-30 18:40:50', '2019-04-30 18:42:03', 48, 'feito', 'atividades/atividade1556660523.xlsx', 'muito bem', '2019-04-30 19:48:29'),
(22, 2, 4, '2019-04-30 19:47:30', '2019-04-30 19:48:13', 26, NULL, NULL, NULL, '2019-04-30 19:48:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos_respostas`
--

CREATE TABLE IF NOT EXISTS `alunos_respostas` (
`idResposta` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idAlternativa` int(11) NOT NULL,
  `selecionada` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Fazendo dump de dados para tabela `alunos_respostas`
--

INSERT INTO `alunos_respostas` (`idResposta`, `idAluno`, `idAlternativa`, `selecionada`) VALUES
(1, 2, 1, 0),
(2, 2, 2, 1),
(3, 2, 3, 0),
(4, 2, 4, 0),
(5, 2, 5, 0),
(6, 2, 6, 0),
(7, 2, 7, 0),
(8, 2, 8, 1),
(9, 2, 9, 0),
(10, 2, 10, 0),
(11, 2, 11, 0),
(12, 2, 12, 1),
(13, 2, 13, 1),
(14, 2, 14, 0),
(15, 2, 15, 0),
(16, 2, 16, 0),
(17, 2, 17, 0),
(18, 2, 18, 0),
(19, 2, 19, 0),
(20, 2, 20, 1),
(21, 2, 21, 0),
(22, 2, 22, 1),
(23, 2, 23, 0),
(24, 2, 24, 0),
(25, 2, 25, 0),
(26, 2, 26, 0),
(27, 2, 27, 1),
(28, 2, 28, 0),
(29, 2, 29, 1),
(30, 2, 30, 0),
(31, 2, 31, 0),
(32, 2, 32, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `conquistas`
--

CREATE TABLE IF NOT EXISTS `conquistas` (
`idConquista` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `cor` varchar(100) NOT NULL,
  `totalPassos` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Fazendo dump de dados para tabela `conquistas`
--

INSERT INTO `conquistas` (`idConquista`, `nome`, `descricao`, `imagem`, `cor`, `totalPassos`) VALUES
(1, '1.1 Identificar', 'Identificar Sistemas Operacionais e Aplicativos úteis para a área', 'visibility', 'rose', 30),
(2, '1.2 Operar', 'Operar sistemas operacionais básicos', 'touch_app', 'primary', 30),
(3, '1.3 Utilizar', 'Utilizar aplicativos de informática gerais e específicos', 'laptop_mac', 'danger', 30),
(4, '1.4 Pesquisar', 'Pesquisar novas ferramentas e aplicativos', 'search', 'success', 30),
(5, '2.1 Publicar', 'Utilizar usar blogs, sites e redes sociais para divulgação', 'language', 'warning', 30),
(6, '2.2 Nuvem', 'Identificar e utilizar ferramentas de armazenamento em nuvem', 'cloud', 'info', 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `fases`
--

CREATE TABLE IF NOT EXISTS `fases` (
`idFase` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `prazo` datetime NOT NULL,
  `xp` int(11) NOT NULL,
  `idMissao` int(11) NOT NULL,
  `anexo` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `fases`
--

INSERT INTO `fases` (`idFase`, `nome`, `descricao`, `tipo`, `prazo`, `xp`, `idMissao`, `anexo`) VALUES
(1, 'Questionario de Perfil de Aprendizagem', '', 'Estrutural', '0000-00-00 00:00:00', 10, 0, ''),
(2, 'Questionario de Perfil de Jogador', '', 'Estrutural', '0000-00-00 00:00:00', 10, 0, ''),
(3, 'Questionario de Engajamento', '', 'Estrutural', '0000-00-00 00:00:00', 10, 0, ''),
(4, 'QuestionÃ¡rio sobre FunÃ§Ãµes', 'QuestionÃ¡rio bÃ¡sico sobre funÃ§Ãµes essenciais do Excel', 'QuestionÃ¡rio', '2019-07-01 22:30:00', 30, 4, ''),
(5, 'ExercÃ­cio Planilha Nota Fiscal', 'Crie uma planilha para registro de vendas de produtos e emissÃ£o de nota fiscal. A soluÃ§Ã£o deve conter uma planilha para cadastro de clientes, uma outra planilha para cadastro dos produtos e uma planilha onde serÃ£o registradas as vendas. Nessa Ãºltima planilha, o usuÃ¡rio deve digitar o CPF do cliente e a planilha deve preencher os demais dados. Depois disso ele digita os cÃ³digos dos produtos e as quantidades e a planilha calcula todos os valores da nota fiscal. No arquivo anexo, vocÃª pode ver um exemplo da planilha.', 'Atividade', '2019-07-01 22:00:00', 60, 4, 'anexos/arquivo1556660403.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`idLog` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `idAluno` int(11) NOT NULL,
  `acao` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Fazendo dump de dados para tabela `log`
--

INSERT INTO `log` (`idLog`, `data`, `idAluno`, `acao`) VALUES
(1, '2019-04-26 20:03:38', 2, 'iniciou fase '),
(2, '2019-04-26 20:03:46', 2, 'concluiu fase '),
(3, '2019-04-26 20:03:47', 2, 'responder questionario engajamento'),
(4, '2019-04-26 20:03:53', 2, 'iniciou fase '),
(5, '2019-04-26 20:03:59', 2, 'concluiu fase '),
(6, '2019-04-26 20:04:01', 2, 'responder questionario aprendizagem'),
(7, '2019-04-26 20:15:25', 2, 'iniciou fase '),
(8, '2019-04-30 11:48:02', 2, 'login'),
(9, '2019-04-30 11:52:58', 2, 'concluiu fase '),
(10, '2019-04-30 11:53:01', 2, 'responder questionario jogador'),
(11, '2019-04-30 11:59:54', 2, 'iniciou fase '),
(12, '2019-04-30 11:59:58', 2, 'concluiu fase '),
(13, '2019-04-30 12:00:00', 2, 'responder questionario engajamento'),
(14, '2019-04-30 12:00:15', 2, 'iniciou fase '),
(15, '2019-04-30 12:00:21', 2, 'concluiu fase '),
(16, '2019-04-30 12:00:22', 2, 'responder questionario aprendizagem'),
(17, '2019-04-30 12:04:46', 2, 'iniciou fase '),
(18, '2019-04-30 12:05:13', 2, 'concluiu fase '),
(19, '2019-04-30 12:05:14', 2, 'responder questionario jogador'),
(20, '2019-04-30 17:13:14', 2, 'login'),
(21, '2019-04-30 18:40:50', 2, 'iniciou fase '),
(22, '2019-04-30 18:42:03', 2, 'concluiu atividade '),
(23, '2019-04-30 19:17:12', 2, 'iniciou fase '),
(24, '2019-04-30 19:18:26', 2, 'concluiu fase '),
(25, '2019-04-30 19:25:05', 2, 'concluiu fase '),
(26, '2019-04-30 19:33:18', 2, 'concluiu fase '),
(27, '2019-04-30 19:34:27', 2, 'concluiu fase '),
(28, '2019-04-30 19:34:30', 2, 'concluiu fase '),
(29, '2019-04-30 19:37:17', 2, 'concluiu fase '),
(30, '2019-04-30 19:40:09', 2, 'concluiu fase '),
(31, '2019-04-30 19:41:48', 2, 'concluiu fase '),
(32, '2019-04-30 19:41:57', 2, 'concluiu fase '),
(33, '2019-04-30 19:41:58', 2, 'concluiu fase '),
(34, '2019-04-30 19:42:00', 2, 'concluiu fase '),
(35, '2019-04-30 19:42:08', 2, 'concluiu fase '),
(36, '2019-04-30 19:42:09', 2, 'concluiu fase '),
(37, '2019-04-30 19:42:11', 2, 'concluiu fase '),
(38, '2019-04-30 19:43:38', 2, 'concluiu fase '),
(39, '2019-04-30 19:47:30', 2, 'iniciou fase '),
(40, '2019-04-30 19:48:13', 2, 'concluiu fase '),
(41, '2019-04-30 19:53:13', 3, 'criar conta');

-- --------------------------------------------------------

--
-- Estrutura para tabela `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
`idMatricula` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `matriculas`
--

INSERT INTO `matriculas` (`idMatricula`, `idAluno`, `idTurma`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `missoes`
--

CREATE TABLE IF NOT EXISTS `missoes` (
`idMissao` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `liberada` tinyint(4) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `levelMinimo` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `missoes`
--

INSERT INTO `missoes` (`idMissao`, `nome`, `descricao`, `liberada`, `idTurma`, `levelMinimo`, `imagem`) VALUES
(3, 'Dominar os GrÃ¡ficos', 'Nessa missÃ£o iremos descobrir diversos tipos de grÃ¡ficos. Quais sÃ£o as situaÃ§Ãµes que devemos utilizar cada um deles. TambÃ©m vamos aprender a interpretar dados e evitar erros comuns na visualizaÃ§Ã£o de dados.', 1, 1, 2, 'assets/img/missoes/img_missao1556655173.jpg'),
(4, 'FunÃ§Ãµes do Excel', 'Nessa missÃ£o vamos aprender a utilizar diversas funÃ§Ãµes bÃ¡sicas do excel. Iremos aplicar esses conhecimentos em situaÃ§Ãµes reais, construindo planilhas para resolver problemas do dia a dia. Ao superarmos as fases dessas missÃµes, seremos muito mais produtivos no uso do Excel.', 1, 1, 1, 'assets/img/missoes/img_missao1556655403.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
`idProfessor` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `professores`
--

INSERT INTO `professores` (`idProfessor`, `nome`, `login`, `senha`) VALUES
(1, 'Joao Carlos Lima', 'joaocarloslima', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questionario_aprendizagem`
--

CREATE TABLE IF NOT EXISTS `questionario_aprendizagem` (
`idQuestionario` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `q1` varchar(1) NOT NULL,
  `q2` varchar(1) NOT NULL,
  `q3` varchar(1) NOT NULL,
  `q4` varchar(1) NOT NULL,
  `q5` varchar(1) NOT NULL,
  `q6` varchar(1) NOT NULL,
  `q7` varchar(1) NOT NULL,
  `q8` varchar(1) NOT NULL,
  `q9` varchar(1) NOT NULL,
  `q10` varchar(1) NOT NULL,
  `q11` varchar(1) NOT NULL,
  `q12` varchar(1) NOT NULL,
  `q13` varchar(1) NOT NULL,
  `q14` varchar(1) NOT NULL,
  `q15` varchar(1) NOT NULL,
  `q16` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `questionario_aprendizagem`
--

INSERT INTO `questionario_aprendizagem` (`idQuestionario`, `idAluno`, `data`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`) VALUES
(2, 2, '2019-04-30 12:00:22', 'K', 'R', 'A', 'A', 'R', 'V', 'A', 'K', 'V', 'A', 'R', 'K', 'A', 'A', 'A', 'K');

-- --------------------------------------------------------

--
-- Estrutura para tabela `questionario_engajamento`
--

CREATE TABLE IF NOT EXISTS `questionario_engajamento` (
`idQuestionario` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `q1` int(11) NOT NULL,
  `q2` int(11) NOT NULL,
  `q3` int(11) NOT NULL,
  `q4` int(11) NOT NULL,
  `q5` int(11) NOT NULL,
  `q6` int(11) NOT NULL,
  `q7` int(11) NOT NULL,
  `q8` int(11) NOT NULL,
  `q9` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `questionario_engajamento`
--

INSERT INTO `questionario_engajamento` (`idQuestionario`, `idAluno`, `data`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`) VALUES
(2, 2, '2019-04-30 12:00:00', 4, 4, 4, 4, 4, 4, 4, 4, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `questionario_jogador`
--

CREATE TABLE IF NOT EXISTS `questionario_jogador` (
`idQuestionario` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `q01` int(11) NOT NULL,
  `q02` int(11) NOT NULL,
  `q03` int(11) NOT NULL,
  `q04` int(11) NOT NULL,
  `q05` int(11) NOT NULL,
  `q06` int(11) NOT NULL,
  `q07` int(11) NOT NULL,
  `q08` int(11) NOT NULL,
  `q09` int(11) NOT NULL,
  `q10` int(11) NOT NULL,
  `q11` int(11) NOT NULL,
  `q12` int(11) NOT NULL,
  `q13` int(11) NOT NULL,
  `q14` int(11) NOT NULL,
  `q15` int(11) NOT NULL,
  `q16` int(11) NOT NULL,
  `q17` int(11) NOT NULL,
  `q18` int(11) NOT NULL,
  `q19` int(11) NOT NULL,
  `q20` int(11) NOT NULL,
  `q21` int(11) NOT NULL,
  `q22` int(11) NOT NULL,
  `q23` int(11) NOT NULL,
  `q24` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `questionario_jogador`
--

INSERT INTO `questionario_jogador` (`idQuestionario`, `idAluno`, `data`, `q01`, `q02`, `q03`, `q04`, `q05`, `q06`, `q07`, `q08`, `q09`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `q22`, `q23`, `q24`) VALUES
(2, 2, '2019-04-30 12:05:14', 3, 4, 3, 4, 5, 4, 4, 3, 4, 3, 4, 5, 5, 3, 1, 2, 3, 4, 4, 3, 3, 2, 5, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
`idQuestao` int(11) NOT NULL,
  `enunciado` text,
  `idFase` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `questoes`
--

INSERT INTO `questoes` (`idQuestao`, `enunciado`, `idFase`) VALUES
(1, 'Uma funÃ§Ã£o do Excel possui essencialmente:', 4),
(2, 'Quantas linhas tem uma planilha do Excel?', 4),
(3, 'Um analista de negÃ³cios deseja destacar os valores de uma planilha de aÃ§Ãµes, de forma a observar aÃ§Ãµes que estÃ£o com valores acima da mÃ©dia. Qual recurso ele deve utilizar?', 4),
(4, 'Qual Ã© a funÃ§Ã£o que calcula a mediana de um conjunto de valores?', 4),
(5, 'Qual recurso deve ser utilizado para impedir que usuÃ¡rio digitem valores errados em uma cÃ©lula?', 4),
(6, 'Qual das seguintes funÃ§Ãµes calcula a mÃ©dia dos 5 primeiros nÃºmeros primos?', 4),
(7, 'Na coluna A de uma planilha, temos as alturas de todos os alunos da sala. Qual funÃ§Ã£o retorna a altura do aluno mais alto?', 4),
(8, 'Considere a funÃ§Ã£o =RAIZ(D5). Como devemos alterar essa funÃ§Ã£o para que, ao copiar a funÃ§Ã£o para as cÃ©lulas do lado, a referÃªncia continue na coluna D?', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
`idRanking` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `posicao` int(11) NOT NULL,
  `xp` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Fazendo dump de dados para tabela `ranking`
--

INSERT INTO `ranking` (`idRanking`, `idAluno`, `posicao`, `xp`, `data`) VALUES
(1, 2, 1, 104, '2019-04-30'),
(22, 3, 2, 0, '2019-04-30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tempo_acesso`
--

CREATE TABLE IF NOT EXISTS `tempo_acesso` (
`idAcesso` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `data` date NOT NULL,
  `dataLogin` datetime NOT NULL,
  `dataLogout` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Fazendo dump de dados para tabela `tempo_acesso`
--

INSERT INTO `tempo_acesso` (`idAcesso`, `idAluno`, `data`, `dataLogin`, `dataLogout`) VALUES
(1, 2, '2019-04-26', '2019-04-26 20:03:38', '2019-04-26 20:04:01'),
(2, 2, '2019-04-26', '2019-04-26 20:15:25', '2019-04-26 20:15:25'),
(3, 2, '2019-04-30', '2019-04-30 11:48:03', '2019-04-30 12:05:14'),
(4, 2, '2019-04-30', '2019-04-30 17:13:14', '2019-04-30 17:13:14'),
(5, 2, '2019-04-30', '2019-04-30 18:40:50', '2019-04-30 18:42:03'),
(6, 2, '2019-04-30', '2019-04-30 19:17:12', '2019-04-30 19:48:13'),
(7, 3, '2019-04-30', '2019-04-30 19:53:13', '2019-04-30 19:53:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE IF NOT EXISTS `turmas` (
`idTurma` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `sigla` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `turmas`
--

INSERT INTO `turmas` (`idTurma`, `descricao`, `sigla`) VALUES
(1, '1a Série ETIM Quimica', '1DA'),
(2, '1a Série ETIM Química', '1DB'),
(3, '1a Série ETIM Administração', '1CA'),
(4, '1a Série ETIM Administração', '1CB');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `alternativas`
--
ALTER TABLE `alternativas`
 ADD PRIMARY KEY (`idAlternativa`);

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
 ADD PRIMARY KEY (`idAluno`);

--
-- Índices de tabela `alunos_conquistas`
--
ALTER TABLE `alunos_conquistas`
 ADD PRIMARY KEY (`idAlunosConquistas`), ADD KEY `idAluno` (`idAluno`), ADD KEY `idMedalha` (`idConquista`);

--
-- Índices de tabela `alunos_fases`
--
ALTER TABLE `alunos_fases`
 ADD PRIMARY KEY (`idAlunosFases`), ADD UNIQUE KEY `idAluno_2` (`idAluno`,`idFase`), ADD KEY `idAluno` (`idAluno`), ADD KEY `idFase` (`idFase`);

--
-- Índices de tabela `alunos_respostas`
--
ALTER TABLE `alunos_respostas`
 ADD PRIMARY KEY (`idResposta`), ADD UNIQUE KEY `idAluno` (`idAluno`,`idAlternativa`);

--
-- Índices de tabela `conquistas`
--
ALTER TABLE `conquistas`
 ADD PRIMARY KEY (`idConquista`);

--
-- Índices de tabela `fases`
--
ALTER TABLE `fases`
 ADD PRIMARY KEY (`idFase`), ADD KEY `idMissao` (`idMissao`);

--
-- Índices de tabela `log`
--
ALTER TABLE `log`
 ADD PRIMARY KEY (`idLog`), ADD KEY `idAluno` (`idAluno`);

--
-- Índices de tabela `matriculas`
--
ALTER TABLE `matriculas`
 ADD PRIMARY KEY (`idMatricula`), ADD KEY `idAluno` (`idAluno`), ADD KEY `idTurma` (`idTurma`);

--
-- Índices de tabela `missoes`
--
ALTER TABLE `missoes`
 ADD PRIMARY KEY (`idMissao`), ADD KEY `idTurma` (`idTurma`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
 ADD PRIMARY KEY (`idProfessor`);

--
-- Índices de tabela `questionario_aprendizagem`
--
ALTER TABLE `questionario_aprendizagem`
 ADD PRIMARY KEY (`idQuestionario`);

--
-- Índices de tabela `questionario_engajamento`
--
ALTER TABLE `questionario_engajamento`
 ADD PRIMARY KEY (`idQuestionario`), ADD KEY `idAluno` (`idAluno`);

--
-- Índices de tabela `questionario_jogador`
--
ALTER TABLE `questionario_jogador`
 ADD PRIMARY KEY (`idQuestionario`), ADD KEY `idAluno` (`idAluno`);

--
-- Índices de tabela `questoes`
--
ALTER TABLE `questoes`
 ADD PRIMARY KEY (`idQuestao`), ADD KEY `idFase` (`idFase`);

--
-- Índices de tabela `ranking`
--
ALTER TABLE `ranking`
 ADD PRIMARY KEY (`idRanking`), ADD UNIQUE KEY `idAluno` (`idAluno`,`data`);

--
-- Índices de tabela `tempo_acesso`
--
ALTER TABLE `tempo_acesso`
 ADD PRIMARY KEY (`idAcesso`), ADD KEY `data` (`data`), ADD KEY `idAluno` (`idAluno`);

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
 ADD PRIMARY KEY (`idTurma`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `alternativas`
--
ALTER TABLE `alternativas`
MODIFY `idAlternativa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `alunos_conquistas`
--
ALTER TABLE `alunos_conquistas`
MODIFY `idAlunosConquistas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de tabela `alunos_fases`
--
ALTER TABLE `alunos_fases`
MODIFY `idAlunosFases` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de tabela `alunos_respostas`
--
ALTER TABLE `alunos_respostas`
MODIFY `idResposta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de tabela `conquistas`
--
ALTER TABLE `conquistas`
MODIFY `idConquista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `fases`
--
ALTER TABLE `fases`
MODIFY `idFase` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT de tabela `matriculas`
--
ALTER TABLE `matriculas`
MODIFY `idMatricula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `missoes`
--
ALTER TABLE `missoes`
MODIFY `idMissao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `questionario_aprendizagem`
--
ALTER TABLE `questionario_aprendizagem`
MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `questionario_engajamento`
--
ALTER TABLE `questionario_engajamento`
MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `questionario_jogador`
--
ALTER TABLE `questionario_jogador`
MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `questoes`
--
ALTER TABLE `questoes`
MODIFY `idQuestao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de tabela `ranking`
--
ALTER TABLE `ranking`
MODIFY `idRanking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de tabela `tempo_acesso`
--
ALTER TABLE `tempo_acesso`
MODIFY `idAcesso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
