-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 10.129.76.12
-- Tempo de geração: 26/04/2019 às 22:07
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
  `texto` varchar(200) NOT NULL,
  `idQuestao` int(11) NOT NULL,
  `correta` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `perfilAprendizagem` varchar(200) NOT NULL,
  `perfilJogador` varchar(200) NOT NULL,
  `engajamento` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos_conquistas`
--

CREATE TABLE IF NOT EXISTS `alunos_conquistas` (
`idAlunosConquistas` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idConquista` int(11) NOT NULL,
  `obtidaEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `resposta` text NOT NULL,
  `anexo` varchar(250) NOT NULL,
  `feedback` text,
  `feedbackVisualizadoEm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos_respostas`
--

CREATE TABLE IF NOT EXISTS `alunos_respostas` (
`idResposta` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idAlternativa` int(11) NOT NULL,
  `selecionada` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `log`
--

CREATE TABLE IF NOT EXISTS `log` (
`idLog` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `idAluno` int(11) NOT NULL,
  `acao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `matriculas`
--

CREATE TABLE IF NOT EXISTS `matriculas` (
`idMatricula` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `missoes`
--

CREATE TABLE IF NOT EXISTS `missoes` (
`idMissao` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `liberada` tinyint(4) NOT NULL,
  `ordem` tinyint(4) NOT NULL,
  `idTurma` int(11) NOT NULL,
  `levelMinimo` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
`idQuestao` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `idFase` int(11) NOT NULL,
  `idElemento` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE IF NOT EXISTS `turmas` (
`idTurma` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `sigla` varchar(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `turmas`
--

INSERT INTO `turmas` (`idTurma`, `descricao`, `sigla`) VALUES
(1, '1a Série ETIM Administração', '1C'),
(2, '1a Série ETIM Química', '1D');

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
 ADD PRIMARY KEY (`idAlunosFases`), ADD KEY `idAluno` (`idAluno`), ADD KEY `idFase` (`idFase`);

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
MODIFY `idAlternativa` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `alunos_conquistas`
--
ALTER TABLE `alunos_conquistas`
MODIFY `idAlunosConquistas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `alunos_fases`
--
ALTER TABLE `alunos_fases`
MODIFY `idAlunosFases` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `alunos_respostas`
--
ALTER TABLE `alunos_respostas`
MODIFY `idResposta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `conquistas`
--
ALTER TABLE `conquistas`
MODIFY `idConquista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de tabela `fases`
--
ALTER TABLE `fases`
MODIFY `idFase` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `matriculas`
--
ALTER TABLE `matriculas`
MODIFY `idMatricula` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `missoes`
--
ALTER TABLE `missoes`
MODIFY `idMissao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `questionario_aprendizagem`
--
ALTER TABLE `questionario_aprendizagem`
MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `questionario_engajamento`
--
ALTER TABLE `questionario_engajamento`
MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `questionario_jogador`
--
ALTER TABLE `questionario_jogador`
MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `questoes`
--
ALTER TABLE `questoes`
MODIFY `idQuestao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `tempo_acesso`
--
ALTER TABLE `tempo_acesso`
MODIFY `idAcesso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
