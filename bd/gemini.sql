-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2018 às 14:18
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gemini`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `idAluno` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `perfilAprendizagem` varchar(200) NOT NULL,
  `perfilJogador` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`idAluno`, `nome`, `email`, `senha`, `foto`, `perfilAprendizagem`, `perfilJogador`) VALUES
(1, 'Joao Carlos Lima', 'joaocarlos@ufabc.com', '827ccb0eea8a706c4c34a16891f84e7b', '', '', ''),
(2, 'Carlos', 'carlos@ufabc.com', '4587', '', '', ''),
(3, 'Pedro', 'pedro@ufabc.com', '789', '', '', ''),
(4, 'Carla', 'carla@ufabc.com', '874', '', '', ''),
(5, 'Joao Carlos', 'j@b.c', '123456', '', '', ''),
(6, 'Joao Carlos', 'joaocarlos', '1911d4n1', '', '', ''),
(7, 'asd', 'joaocarlos@c', '1911d4n1', '', '', ''),
(8, 'Ana', 'cris@b', 'md5(123456)', '', '', ''),
(9, 'Silvia', 'silvali@b.c', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(10, 'Silvia', 'silvali@b.c', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(11, 'Priscila', 'pri@d', '202cb962ac59075b964b07152d234b70', '', '', ''),
(12, 'Priscila Vieira', 'priscila@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(13, 'Priscila Vieira', 'priscila@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', ''),
(14, 'Silvia Regina Santos', 'silvia@etec.so', '827ccb0eea8a706c4c34a16891f84e7b', '', '', ''),
(15, 'Silvia Regina Gomes', 'silvia@etec.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_fases`
--

CREATE TABLE `alunos_fases` (
  `idAlunosFases` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idFase` int(11) NOT NULL,
  `iniciadoEm` datetime NOT NULL,
  `finalizadoEm` datetime NOT NULL,
  `xp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_medalhas`
--

CREATE TABLE `alunos_medalhas` (
  `idAlunosMedalhas` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idMedalha` int(11) NOT NULL,
  `obtidaEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `idConquista` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `totalPassos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fases`
--

CREATE TABLE `fases` (
  `idFase` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `prazo` datetime NOT NULL,
  `xp` int(11) NOT NULL,
  `idMissao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feedbacks`
--

CREATE TABLE `feedbacks` (
  `idFeedback` int(11) NOT NULL,
  `idAlunoFase` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `visualizadoEm` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `idLog` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `idAluno` int(11) NOT NULL,
  `acao` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `log`
--

INSERT INTO `log` (`idLog`, `data`, `idAluno`, `acao`) VALUES
(1, '0000-00-00 00:00:00', 1, 'login'),
(2, '2018-11-29 11:28:24', 1, 'login'),
(3, '2018-11-29 11:35:22', 1, 'logout'),
(4, '2018-11-29 11:41:11', 1, 'logout'),
(5, '2018-11-29 11:43:23', 1, 'login'),
(6, '2018-11-29 11:46:41', 1, 'logout'),
(7, '2018-11-29 12:02:22', 1, 'logout'),
(8, '2018-11-29 12:02:53', 1, 'logout'),
(9, '2018-11-29 12:04:35', 1, 'logout'),
(10, '2018-11-29 12:04:46', 1, 'login'),
(11, '2018-11-29 12:05:01', 1, 'logout'),
(12, '2018-11-29 12:13:36', 15, 'criar conta'),
(13, '2018-11-29 15:29:21', 15, 'alterar perfil'),
(14, '2018-11-29 15:30:05', 15, 'alterar perfil'),
(15, '2018-11-29 15:30:20', 15, 'alterar perfil'),
(16, '2018-11-29 15:31:25', 15, 'alterar perfil'),
(17, '2018-11-29 15:31:44', 15, 'alterar perfil'),
(18, '2018-11-29 15:32:48', 15, 'alterar perfil'),
(19, '2018-11-29 15:33:01', 15, 'alterar perfil'),
(20, '2018-11-29 15:33:11', 15, 'alterar perfil'),
(21, '2018-11-29 15:33:25', 15, 'alterar perfil'),
(22, '2018-11-29 15:34:25', 15, 'alterar perfil'),
(23, '2018-11-29 15:34:36', 15, 'alterar perfil'),
(24, '2018-11-29 15:34:50', 15, 'alterar perfil'),
(25, '2018-11-29 15:38:04', 15, 'alterar perfil'),
(26, '2018-11-29 15:41:44', 15, 'alterar perfil'),
(27, '2018-11-29 15:42:03', 15, 'alterar perfil'),
(28, '2018-11-29 15:42:37', 15, 'alterar perfil'),
(29, '2018-11-29 15:44:11', 15, 'alterar perfil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `idMatricula` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medalhas`
--

CREATE TABLE `medalhas` (
  `idMedalha` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(250) NOT NULL,
  `idFase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `missoes`
--

CREATE TABLE `missoes` (
  `idMissao` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `liberada` tinyint(4) NOT NULL,
  `ordem` tinyint(4) NOT NULL,
  `idTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `idProfessor` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario_engajamento`
--

CREATE TABLE `questionario_engajamento` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE `questoes` (
  `idQuestao` int(11) NOT NULL,
  `enunciado` text NOT NULL,
  `alternativaA` varchar(250) NOT NULL,
  `alternativaB` varchar(250) NOT NULL,
  `alternativaC` varchar(250) NOT NULL,
  `alternativaD` varchar(250) NOT NULL,
  `alternativaCorreta` varchar(1) NOT NULL,
  `dificuldade` int(11) NOT NULL,
  `idFase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `idTurma` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `sigla` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`idAluno`);

--
-- Indexes for table `alunos_fases`
--
ALTER TABLE `alunos_fases`
  ADD PRIMARY KEY (`idAlunosFases`);

--
-- Indexes for table `alunos_medalhas`
--
ALTER TABLE `alunos_medalhas`
  ADD PRIMARY KEY (`idAlunosMedalhas`);

--
-- Indexes for table `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`idConquista`);

--
-- Indexes for table `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`idFase`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`idFeedback`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idLog`);

--
-- Indexes for table `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`idMatricula`);

--
-- Indexes for table `medalhas`
--
ALTER TABLE `medalhas`
  ADD PRIMARY KEY (`idMedalha`);

--
-- Indexes for table `missoes`
--
ALTER TABLE `missoes`
  ADD PRIMARY KEY (`idMissao`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`idProfessor`);

--
-- Indexes for table `questionario_engajamento`
--
ALTER TABLE `questionario_engajamento`
  ADD PRIMARY KEY (`idQuestionario`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`idQuestao`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`idTurma`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `alunos_fases`
--
ALTER TABLE `alunos_fases`
  MODIFY `idAlunosFases` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `alunos_medalhas`
--
ALTER TABLE `alunos_medalhas`
  MODIFY `idAlunosMedalhas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `idConquista` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fases`
--
ALTER TABLE `fases`
  MODIFY `idFase` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `idFeedback` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `idMatricula` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medalhas`
--
ALTER TABLE `medalhas`
  MODIFY `idMedalha` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `missoes`
--
ALTER TABLE `missoes`
  MODIFY `idMissao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questionario_engajamento`
--
ALTER TABLE `questionario_engajamento`
  MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `idQuestao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
