-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Jan-2019 às 21:33
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `foto` varchar(200) NOT NULL DEFAULT 'assets/img/default-avatar.png',
  `perfilAprendizagem` varchar(200) NOT NULL,
  `perfilJogador` varchar(200) NOT NULL,
  `engajamento` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`idAluno`, `nome`, `email`, `senha`, `foto`, `perfilAprendizagem`, `perfilJogador`, `engajamento`) VALUES
(17, 'Leticia Oliveira', 'leoliveira@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Visual', 'Empreendedor', '4.00'),
(20, 'Marcela Leal', 'marcela@gmail.com', '202cb962ac59075b964b07152d234b70', 'assets/img/alunos/foto_aluno1548272146.jpg', 'Leitor Escritor', 'Filantropo', '4.00'),
(21, 'Joao Carlos Lima', 'joaocarloslima@me.com', '202cb962ac59075b964b07152d234b70', 'assets/img/alunos/foto_aluno1547042415.jpg', 'Auditivo', 'EspÃ­rito Livre', '1.78'),
(23, 'Karina Oliveira Carneiro Lima', 'karina@gmail.com', '202cb962ac59075b964b07152d234b70', 'assets/img/alunos/foto_aluno1547042640.jpg', 'Leitor Escritor', '', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_fases`
--

CREATE TABLE `alunos_fases` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `alunos_fases`
--

INSERT INTO `alunos_fases` (`idAlunosFases`, `idAluno`, `idFase`, `iniciadoEm`, `finalizadoEm`, `xp`, `resposta`, `anexo`, `feedback`, `feedbackVisualizadoEm`) VALUES
(6, 20, 3, '2019-01-08 10:19:22', '2019-01-09 10:57:50', 10, '', '', NULL, NULL),
(7, 20, 1, '2019-01-09 10:49:05', '2019-01-09 10:51:25', 10, '', '', NULL, NULL),
(8, 20, 2, '2019-01-09 10:56:13', '2019-01-09 10:59:13', 10, '', '', NULL, NULL),
(9, 21, 1, '2019-01-09 11:13:28', '2019-01-09 11:13:55', 10, '', '', NULL, NULL),
(14, 23, 10, '2019-01-22 19:36:29', '2019-01-22 19:36:37', NULL, 'Pobremas resolvidos', '', NULL, NULL),
(15, 23, 12, '2019-01-22 20:13:04', '2019-01-22 20:13:18', NULL, 'tirei 120', '', NULL, NULL),
(16, 23, 13, '2019-01-22 20:14:18', '2019-01-22 20:14:23', NULL, 'JÃ¡ fiz', '', NULL, NULL),
(17, 23, 14, '2019-01-23 16:54:45', '2019-01-23 16:54:51', 23, 'ok', '', 'muito bem', '2019-01-24 11:00:00'),
(18, 20, 13, '2019-01-23 17:32:01', '2019-01-23 17:32:21', NULL, 'Eu fiz, segue anexo', 'atividades/atividade1548271941.pdf', NULL, NULL),
(19, 20, 14, '2019-01-23 17:32:30', '2019-01-23 17:32:38', 5, 'tem print nÃ£o', '', 'sem print fica difÃ­cil avaliar.', NULL),
(20, 20, 16, '2019-01-23 17:32:46', '2019-01-23 17:32:54', 13, 'Sou muito mala e sou direta', '', 'top mesmo', NULL);

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
  `idMissao` int(11) NOT NULL,
  `anexo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fases`
--

INSERT INTO `fases` (`idFase`, `nome`, `descricao`, `tipo`, `prazo`, `xp`, `idMissao`, `anexo`) VALUES
(1, 'Questionario de Perfil de Aprendizagem', '', 'Estrutural', '0000-00-00 00:00:00', 10, 0, ''),
(2, 'Questionario de Perfil de Jogador', '', 'Estrutural', '0000-00-00 00:00:00', 10, 0, ''),
(3, 'Questionario de Engajamento', '', 'Estrutural', '0000-00-00 00:00:00', 10, 0, ''),
(6, 'Seminário', 'seminário', 'Atividade', '2019-01-29 00:00:00', 20, 48, ''),
(7, 'Questionario', 'Esse questionÃ¡rio Ã© top da balada', 'QuestionÃ¡rio', '2019-02-06 12:00:00', 55, 46, ''),
(8, 'AnÃ¡lise de problemas comuns', 'FaÃ§a uma anÃ¡lise de 5 defeitos que foram reportados a vocÃª nos Ãºltimos anos, relacionando com possÃ­veis soluÃ§Ãµes.', '1', '2019-01-12 12:00:00', 8, 0, ''),
(10, 'AnÃ¡lise de Problemas', 'FaÃ§a uma anÃ¡lise de 5 defeitos que foram reportados a vocÃª nos Ãºltimos anos, relacionando com possÃ­veis soluÃ§Ãµes.', 'Atividade', '2018-01-12 12:00:00', 15, 47, ''),
(11, 'QuestionÃ¡rio sobre hardware', 'Teste seus conhecimentos sobre o que hÃ¡ de mais moderno em peÃ§as de computadores.', 'QuestionÃ¡rio', '2019-01-20 09:00:00', 10, 47, ''),
(12, 'Simulador de Defeitos', 'Resolva problemas em um ambiente virtual e ganha peÃ§as para montar o seu computador. Quanto mais pontos fizer maior serÃ¡ sua nota.', 'Atividade', '2019-01-25 20:30:00', 20, 47, ''),
(13, 'ExercÃ­cio Etiquetas', 'Atividade de criaÃ§Ã£o de etiquetas', 'Atividade', '2019-02-15 10:30:00', 15, 46, 'anexos/arquivo1547501614.pdf'),
(14, 'Simulador', 'Resolva e envie o print', 'Atividade', '2018-01-20 12:00:00', 23, 46, 'anexos/arquivo1547496787.pdf'),
(16, 'ExercÃ­cio Mala Direta', 'Construa uma mala direta para a o envio de convites para a reuniÃ£o de pais da ETEC IrmÃ£ Agostina', 'Atividade', '2019-01-22 10:30:00', 13, 46, 'anexos/arquivo1548164142.pdf');

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
(29, '2018-11-29 15:44:11', 15, 'alterar perfil'),
(30, '2018-12-11 18:07:56', 1, 'login'),
(31, '2018-12-11 18:12:26', 1, 'responder questionario engajamento'),
(32, '2018-12-11 20:43:06', 1, 'responder questionario jogador'),
(33, '2018-12-12 13:01:05', 1, 'responder questionario jogador'),
(34, '2018-12-12 13:20:57', 1, 'responder questionario jogador'),
(35, '2018-12-12 13:22:59', 1, 'responder questionario jogador'),
(36, '2018-12-12 13:56:50', 1, 'responder questionario jogador'),
(37, '2018-12-12 14:06:43', 1, 'responder questionario jogador'),
(38, '2018-12-14 09:49:19', 1, 'login'),
(39, '2018-12-14 09:51:13', 1, 'logout'),
(40, '2018-12-14 09:53:02', 1, 'login'),
(41, '2018-12-14 11:51:28', 1, 'login'),
(42, '2018-12-17 18:06:07', 1, 'login'),
(43, '2018-12-17 18:08:08', 1, 'responder questionario engajamento'),
(44, '2018-12-17 18:08:39', 1, 'responder questionario engajamento'),
(45, '2018-12-17 18:13:45', 1, 'responder questionario engajamento'),
(46, '2018-12-17 18:22:21', 1, 'responder questionario engajamento'),
(47, '2018-12-17 18:34:13', 1, 'responder questionario engajamento'),
(48, '2018-12-17 18:45:32', 1, 'responder questionario engajamento'),
(49, '2018-12-17 18:51:09', 1, 'responder questionario engajamento'),
(50, '2018-12-17 19:08:57', 1, 'responder questionario engajamento'),
(51, '2018-12-17 19:15:11', 1, 'responder questionario jogador'),
(52, '2018-12-18 12:01:06', 1, 'login'),
(53, '2018-12-18 12:01:20', 1, 'login'),
(54, '2018-12-18 12:03:54', 1, 'login'),
(55, '2018-12-18 12:04:03', 1, 'login'),
(56, '2018-12-18 12:04:50', 1, 'logout'),
(57, '2018-12-18 12:04:59', 1, 'login'),
(58, '2018-12-18 12:16:30', 1, 'logout'),
(59, '2018-12-18 12:16:50', 1, 'login'),
(60, '2018-12-18 12:23:35', 1, 'alterar perfil'),
(61, '2018-12-18 12:24:03', 1, 'logout'),
(62, '2018-12-18 12:24:13', 1, 'login'),
(63, '2018-12-18 12:26:15', 1, 'alterar perfil'),
(64, '2018-12-18 12:26:25', 1, 'logout'),
(65, '2018-12-18 12:26:45', 16, 'criar conta'),
(66, '2018-12-18 12:26:57', 16, 'login'),
(67, '2018-12-18 13:31:13', 16, 'alterar perfil'),
(68, '2018-12-18 13:33:30', 16, 'logout'),
(69, '2018-12-18 13:33:40', 1, 'login'),
(70, '2018-12-18 13:39:39', 1, 'alterar perfil'),
(71, '2018-12-18 13:41:19', 1, 'alterar perfil'),
(72, '2018-12-18 13:42:31', 1, 'alterar perfil'),
(73, '2018-12-18 13:43:55', 1, 'alterar perfil'),
(74, '2018-12-18 13:44:26', 1, 'alterar perfil'),
(75, '2018-12-18 13:45:50', 1, 'alterar perfil'),
(76, '2018-12-18 13:46:05', 1, 'alterar perfil'),
(77, '2018-12-18 13:46:17', 1, 'alterar perfil'),
(78, '2018-12-18 13:55:29', 1, 'alterar perfil'),
(79, '2018-12-18 13:55:51', 1, 'alterar perfil'),
(80, '2018-12-18 13:56:06', 1, 'logout'),
(81, '2018-12-18 13:56:16', 16, 'login'),
(82, '2018-12-18 13:58:31', 16, 'alterar perfil'),
(83, '2018-12-18 15:29:14', 16, 'alterar perfil'),
(84, '2018-12-18 15:41:01', 16, 'alterar perfil'),
(85, '2018-12-18 15:44:36', 16, 'alterar perfil'),
(86, '2018-12-18 15:51:03', 16, 'logout'),
(87, '2018-12-18 15:51:19', 16, 'login'),
(88, '2018-12-18 15:51:42', 16, 'logout'),
(89, '2018-12-18 15:51:51', 1, 'login'),
(90, '2018-12-18 15:54:35', 1, 'logout'),
(91, '2018-12-18 15:54:42', 16, 'login'),
(92, '2018-12-18 16:11:49', 16, 'logout'),
(93, '2018-12-18 16:11:57', 1, 'login'),
(94, '2018-12-27 13:50:28', 1, 'login'),
(95, '2018-12-27 14:15:46', 1, 'login professor'),
(96, '2018-12-27 14:18:57', 1, 'logout professor'),
(97, '2018-12-28 11:37:14', 17, 'criar conta'),
(98, '2018-12-28 11:38:03', 17, 'logout'),
(99, '2018-12-28 11:42:39', 20, 'criar conta'),
(100, '2018-12-28 11:45:40', 20, 'logout'),
(101, '2018-12-28 13:28:46', 20, 'login'),
(102, '2018-12-28 13:29:03', 20, 'responder questionario engajamento'),
(103, '2018-12-28 13:29:14', 20, 'alterar perfil'),
(104, '2018-12-28 13:29:39', 20, 'logout'),
(105, '2018-12-28 14:09:19', 20, 'login'),
(106, '2019-01-02 13:00:18', 21, 'criar conta'),
(107, '2019-01-02 13:07:54', 21, 'responder questionario engajamento'),
(108, '2019-01-02 13:09:57', 21, 'logout'),
(109, '2019-01-02 13:10:01', 20, 'login'),
(110, '2019-01-02 13:10:31', 20, 'responder questionario engajamento'),
(111, '2019-01-02 13:10:44', 20, 'logout'),
(112, '2019-01-02 13:10:52', 21, 'login'),
(113, '2019-01-02 13:11:16', 21, 'responder questionario engajamento'),
(114, '2019-01-02 13:17:58', 21, 'responder questionario jogador'),
(115, '2019-01-02 13:18:40', 21, 'logout'),
(116, '2019-01-02 13:18:51', 20, 'login'),
(117, '2019-01-02 13:19:38', 20, 'responder questionario jogador'),
(118, '2019-01-02 15:38:51', 20, 'responder questionario aprendizagem'),
(119, '2019-01-02 16:00:54', 20, 'responder questionario aprendizagem'),
(120, '2019-01-02 16:25:29', 20, 'responder questionario aprendizagem'),
(121, '2019-01-02 16:32:41', 20, 'logout'),
(122, '2019-01-02 16:32:49', 21, 'login'),
(123, '2019-01-02 16:35:16', 21, 'responder questionario aprendizagem'),
(124, '2019-01-02 16:36:18', 21, 'logout'),
(125, '2019-01-02 16:36:26', 17, 'login'),
(126, '2019-01-02 16:36:36', 17, 'responder questionario engajamento'),
(127, '2019-01-02 16:36:49', 17, 'responder questionario aprendizagem'),
(128, '2019-01-02 16:37:39', 17, 'responder questionario jogador'),
(129, '2019-01-02 16:43:37', 17, 'responder questionario jogador'),
(130, '2019-01-04 16:14:30', 1, 'logout'),
(131, '2019-01-04 16:14:43', 20, 'login'),
(132, '2019-01-04 16:54:31', 20, 'responder questionario engajamento'),
(133, '2019-01-04 16:59:18', 20, 'responder questionario engajamento'),
(134, '2019-01-08 09:44:41', 20, 'login'),
(135, '2019-01-08 10:09:34', 20, 'iniciou fase '),
(136, '2019-01-08 10:11:43', 20, 'iniciou fase '),
(137, '2019-01-08 10:16:36', 20, 'concluiu fase '),
(138, '2019-01-08 10:16:37', 20, 'responder questionario engajamento'),
(139, '2019-01-08 10:19:04', 20, 'concluiu fase '),
(140, '2019-01-08 10:19:06', 20, 'responder questionario engajamento'),
(141, '2019-01-08 10:19:22', 20, 'iniciou fase '),
(142, '2019-01-08 10:19:31', 20, 'concluiu fase '),
(143, '2019-01-08 10:19:32', 20, 'responder questionario engajamento'),
(144, '2019-01-09 10:43:33', 20, 'login'),
(145, '2019-01-09 10:49:05', 20, 'iniciou fase '),
(146, '2019-01-09 10:51:25', 20, 'concluiu fase '),
(147, '2019-01-09 10:51:35', 20, 'responder questionario aprendizagem'),
(148, '2019-01-09 10:56:13', 20, 'iniciou fase '),
(149, '2019-01-09 10:57:50', 20, 'concluiu fase '),
(150, '2019-01-09 10:57:51', 20, 'responder questionario jogador'),
(151, '2019-01-09 10:59:13', 20, 'concluiu fase '),
(152, '2019-01-09 10:59:14', 20, 'responder questionario jogador'),
(153, '2019-01-09 11:10:00', 20, 'logout'),
(154, '2019-01-09 11:10:07', 21, 'login'),
(155, '2019-01-09 11:13:28', 21, 'iniciou fase '),
(156, '2019-01-09 11:13:55', 21, 'concluiu fase '),
(157, '2019-01-09 11:13:56', 21, 'responder questionario aprendizagem'),
(158, '2019-01-09 11:43:41', 21, 'alterar perfil'),
(159, '2019-01-09 11:49:25', 21, 'alterar foto de perfil'),
(160, '2019-01-09 11:50:40', 21, 'alterar foto de perfil'),
(161, '2019-01-09 11:51:16', 21, 'alterar foto de perfil'),
(162, '2019-01-09 11:52:08', 21, 'alterar foto de perfil'),
(163, '2019-01-09 11:53:13', 21, 'alterar foto de perfil'),
(164, '2019-01-09 11:58:56', 21, 'alterar foto de perfil'),
(165, '2019-01-09 12:00:15', 21, 'alterar foto de perfil'),
(166, '2019-01-09 12:00:55', 21, 'logout'),
(167, '2019-01-09 12:01:21', 22, 'criar conta'),
(168, '2019-01-09 12:03:33', 22, 'logout'),
(169, '2019-01-09 12:03:51', 23, 'criar conta'),
(170, '2019-01-09 12:04:00', 23, 'alterar foto de perfil'),
(171, '2019-01-10 17:29:20', 23, 'iniciou fase '),
(172, '2019-01-10 17:30:13', 23, 'iniciou fase '),
(173, '2019-01-10 17:30:26', 23, 'iniciou fase '),
(174, '2019-01-10 17:35:01', 23, 'concluiu fase '),
(175, '2019-01-10 17:35:03', 23, 'responder questionario aprendizagem'),
(176, '2019-01-11 09:20:26', 23, 'logout'),
(177, '2019-01-11 09:20:37', 23, 'login'),
(178, '2019-01-11 17:06:55', 23, 'login'),
(179, '2019-01-22 11:18:10', 23, 'login'),
(180, '2019-01-22 11:18:23', 23, 'logout'),
(181, '2019-01-22 11:55:27', 23, 'login'),
(182, '2019-01-22 15:13:46', 23, 'alterar perfil'),
(183, '2019-01-22 18:48:08', 23, 'iniciou fase '),
(184, '2019-01-22 19:15:39', 23, 'concluiu atividade '),
(185, '2019-01-22 19:19:33', 23, 'concluiu atividade '),
(186, '2019-01-22 19:20:52', 23, 'concluiu atividade '),
(187, '2019-01-22 19:21:18', 23, 'concluiu atividade '),
(188, '2019-01-22 19:21:51', 23, 'concluiu atividade '),
(189, '2019-01-22 19:23:08', 23, 'concluiu atividade '),
(190, '2019-01-22 19:24:48', 23, 'concluiu atividade '),
(191, '2019-01-22 19:36:29', 23, 'iniciou fase '),
(192, '2019-01-22 19:36:37', 23, 'concluiu atividade '),
(193, '2019-01-22 20:13:04', 23, 'iniciou fase '),
(194, '2019-01-22 20:13:18', 23, 'concluiu atividade '),
(195, '2019-01-22 20:14:19', 23, 'iniciou fase '),
(196, '2019-01-22 20:14:23', 23, 'concluiu atividade '),
(197, '2019-01-23 16:53:58', 23, 'login'),
(198, '2019-01-23 16:54:45', 23, 'iniciou fase '),
(199, '2019-01-23 16:54:52', 23, 'concluiu atividade '),
(200, '2019-01-23 17:31:37', 23, 'logout'),
(201, '2019-01-23 17:31:46', 20, 'login'),
(202, '2019-01-23 17:32:01', 20, 'iniciou fase '),
(203, '2019-01-23 17:32:22', 20, 'concluiu atividade '),
(204, '2019-01-23 17:32:31', 20, 'iniciou fase '),
(205, '2019-01-23 17:32:38', 20, 'concluiu atividade '),
(206, '2019-01-23 17:32:46', 20, 'iniciou fase '),
(207, '2019-01-23 17:32:54', 20, 'concluiu atividade '),
(208, '2019-01-23 17:35:46', 20, 'alterar foto de perfil'),
(209, '2019-01-23 20:04:22', 1, 'logout'),
(210, '2019-01-23 20:04:31', 23, 'login');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `idMatricula` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `idTurma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`idMatricula`, `idAluno`, `idTurma`) VALUES
(1, 17, 1),
(2, 20, 2),
(3, 21, 2),
(4, 22, 2),
(5, 23, 2);

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
  `idTurma` int(11) NOT NULL,
  `levelMinimo` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `missoes`
--

INSERT INTO `missoes` (`idMissao`, `nome`, `descricao`, `liberada`, `ordem`, `idTurma`, `levelMinimo`, `imagem`) VALUES
(46, 'Trabalho AcadÃªmico', 'A divulgaÃ§Ã£o de uma pesquisa Ã© parte fundamento do seu desenvolvimento. Para isso, Ã© importante seguir certas normas e padrÃµes. Nessa missÃ£o vocÃª deve formatar um trabalho acadÃªmico seguindo as normas da ABNT', 1, 0, 2, 1, 'assets/img/missoes/img_missao1547150037.jpg'),
(47, 'Hardware BÃ¡sico e ManutenÃ§Ã£o', 'Conhecer as partes do computador Ã© fundamental para entender o seu funcionamento e eventualmente resolver problemas de funcionamento. Nessa missÃ£o vocÃª deverÃ¡ usar suas habilidades para concertar um computador.', 1, 0, 2, 1, 'assets/img/missoes/img_missao1547150171.jpg'),
(48, 'Power Point', 'Uma imagem vale mais que mil palavras. Uma boa apresentaÃ§Ã£o pode fazer toda a diferenÃ§a e valorizar imensamente o seu conteÃºdo. Aprenda a criar apresentaÃ§Ã£o profissionais que irÃ£o deixar a sua audiÃªncia de queixo caÃ­do. Aprenda com grandes lendas dos palcos as melhores tÃ©cnicas para encantar o pÃºblico.', 1, 0, 2, 2, 'assets/img/missoes/img_missao1547150312.jpg'),
(49, 'PortifÃ³lio de Produtos', 'Mostre ao mundo todo o seu potencial criando um portfÃ³lio online com todos os seus trabalhos e projetos desenvolvidos', 1, 0, 2, 2, 'assets/img/missoes/img_missao1547206263.jpg');

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

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`idProfessor`, `nome`, `login`, `senha`) VALUES
(1, 'Joao Carlos Lima', 'joaocarloslima', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario_aprendizagem`
--

CREATE TABLE `questionario_aprendizagem` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questionario_aprendizagem`
--

INSERT INTO `questionario_aprendizagem` (`idQuestionario`, `idAluno`, `data`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`) VALUES
(6, 20, '2019-01-09 10:51:34', 'R', 'R', 'R', 'R', 'V', 'K', 'V', 'K', 'R', 'R', 'A', 'K', 'R', 'K', 'A', 'A'),
(7, 21, '2019-01-09 11:13:56', 'A', 'V', 'K', 'A', 'A', 'A', 'A', 'A', 'K', 'V', 'R', 'A', 'V', 'K', 'V', 'R'),
(8, 23, '2019-01-10 17:35:02', 'R', 'K', 'K', 'R', 'R', 'V', 'R', 'R', 'V', 'A', 'V', 'K', 'R', 'R', 'A', 'A');

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

--
-- Extraindo dados da tabela `questionario_engajamento`
--

INSERT INTO `questionario_engajamento` (`idQuestionario`, `idAluno`, `data`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`) VALUES
(5, 21, '2019-01-02 13:11:16', 1, 1, 1, 1, 3, 2, 2, 4, 1),
(6, 17, '2019-01-02 16:36:36', 4, 4, 4, 4, 4, 4, 4, 4, 4),
(11, 20, '2019-01-08 10:19:32', 4, 4, 4, 4, 4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `questionario_jogador`
--

CREATE TABLE `questionario_jogador` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `questionario_jogador`
--

INSERT INTO `questionario_jogador` (`idQuestionario`, `idAluno`, `data`, `q01`, `q02`, `q03`, `q04`, `q05`, `q06`, `q07`, `q08`, `q09`, `q10`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q21`, `q22`, `q23`, `q24`) VALUES
(1, 21, '2019-01-02 13:17:58', 4, 4, 4, 2, 2, 2, 5, 5, 5, 4, 4, 4, 4, 1, 5, 2, 1, 5, 1, 1, 1, 1, 5, 4),
(4, 17, '2019-01-02 16:43:37', 4, 4, 3, 3, 3, 3, 2, 1, 1, 1, 2, 2, 1, 1, 1, 1, 3, 2, 3, 3, 3, 3, 3, 3),
(6, 20, '2019-01-09 10:59:14', 1, 2, 2, 3, 3, 3, 3, 1, 1, 5, 5, 2, 5, 3, 5, 5, 4, 4, 4, 4, 3, 1, 2, 2);

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
-- Estrutura da tabela `tempo_acesso`
--

CREATE TABLE `tempo_acesso` (
  `idAcesso` int(11) NOT NULL,
  `idAluno` int(11) NOT NULL,
  `data` date NOT NULL,
  `dataLogin` datetime NOT NULL,
  `dataLogout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tempo_acesso`
--

INSERT INTO `tempo_acesso` (`idAcesso`, `idAluno`, `data`, `dataLogin`, `dataLogout`) VALUES
(9, 1, '2018-12-18', '2018-12-18 12:26:15', '2018-12-18 12:46:17'),
(10, 16, '2018-12-18', '2018-12-18 12:26:45', '2018-12-18 13:33:30'),
(11, 1, '2018-12-18', '2018-12-18 13:46:05', '2018-12-18 13:56:06'),
(12, 16, '2018-12-18', '2018-12-18 13:56:16', '2018-12-18 13:58:31'),
(13, 1, '2018-12-17', '2018-12-17 09:00:00', '2018-12-17 10:30:00'),
(14, 1, '2018-12-16', '2018-12-16 08:00:00', '2018-12-16 09:00:00'),
(15, 1, '2018-12-15', '2018-12-15 09:00:00', '2018-12-15 09:12:00'),
(16, 1, '2018-12-07', '2018-12-07 14:00:00', '2018-12-07 14:40:00'),
(17, 16, '2018-12-18', '2018-12-18 15:29:14', '2018-12-18 15:29:14'),
(18, 16, '2018-12-18', '2018-12-18 15:41:01', '2018-12-18 15:54:42'),
(19, 1, '2018-12-18', '2018-12-18 15:51:51', '2018-12-18 15:54:35'),
(20, 16, '2018-12-18', '2018-12-18 16:11:49', '2018-12-18 16:11:49'),
(21, 1, '2018-12-18', '2018-12-18 16:11:57', '2018-12-18 16:11:57'),
(22, 1, '2018-12-27', '2018-12-27 13:50:28', '2018-12-27 13:50:28'),
(23, 1, '2018-12-27', '2018-12-27 14:15:46', '2018-12-27 14:18:57'),
(24, 17, '2018-12-28', '2018-12-28 11:37:14', '2018-12-28 11:38:03'),
(25, 20, '2018-12-28', '2018-12-28 11:42:39', '2018-12-28 11:45:40'),
(26, 20, '2018-12-28', '2018-12-28 13:28:46', '2018-12-28 13:29:39'),
(27, 20, '2018-12-28', '2018-12-28 14:09:19', '2018-12-28 14:09:19'),
(28, 21, '2019-01-02', '2019-01-02 13:00:18', '2019-01-02 13:18:40'),
(29, 20, '2019-01-02', '2019-01-02 13:10:01', '2019-01-02 13:19:38'),
(30, 20, '2019-01-02', '2019-01-02 15:38:51', '2019-01-02 15:38:51'),
(31, 20, '2019-01-02', '2019-01-02 16:00:54', '2019-01-02 16:00:54'),
(32, 20, '2019-01-02', '2019-01-02 16:25:29', '2019-01-02 16:32:41'),
(33, 21, '2019-01-02', '2019-01-02 16:32:49', '2019-01-02 16:36:18'),
(34, 17, '2019-01-02', '2019-01-02 16:36:26', '2019-01-02 16:43:37'),
(35, 1, '2019-01-04', '2019-01-04 16:14:30', '2019-01-04 16:14:30'),
(36, 20, '2019-01-04', '2019-01-04 16:14:43', '2019-01-04 16:14:43'),
(37, 20, '2019-01-04', '2019-01-04 16:54:31', '2019-01-04 16:59:18'),
(38, 20, '2019-01-08', '2019-01-08 09:44:41', '2019-01-08 09:44:41'),
(39, 20, '2019-01-08', '2019-01-08 10:09:34', '2019-01-08 10:19:32'),
(40, 20, '2019-01-09', '2019-01-09 10:43:33', '2019-01-09 11:10:00'),
(41, 21, '2019-01-09', '2019-01-09 11:10:07', '2019-01-09 11:13:56'),
(42, 21, '2019-01-09', '2019-01-09 11:43:41', '2019-01-09 12:00:55'),
(43, 22, '2019-01-09', '2019-01-09 12:01:21', '2019-01-09 12:03:33'),
(44, 23, '2019-01-09', '2019-01-09 12:03:51', '2019-01-09 12:04:00'),
(45, 23, '2019-01-10', '2019-01-10 17:29:20', '2019-01-10 17:35:03'),
(46, 23, '2019-01-11', '2019-01-11 09:20:26', '2019-01-11 09:20:37'),
(47, 23, '2019-01-11', '2019-01-11 17:06:55', '2019-01-11 17:06:55'),
(48, 23, '2019-01-22', '2019-01-22 11:18:10', '2019-01-22 11:18:23'),
(49, 23, '2019-01-22', '2019-01-22 11:55:27', '2019-01-22 11:55:27'),
(50, 23, '2019-01-22', '2019-01-22 15:13:46', '2019-01-22 15:13:46'),
(51, 23, '2019-01-22', '2019-01-22 18:48:08', '2019-01-22 18:48:08'),
(52, 23, '2019-01-22', '2019-01-22 19:15:39', '2019-01-22 19:24:48'),
(53, 23, '2019-01-22', '2019-01-22 19:36:29', '2019-01-22 19:36:37'),
(54, 23, '2019-01-22', '2019-01-22 20:13:04', '2019-01-22 20:14:23'),
(55, 23, '2019-01-23', '2019-01-23 16:53:58', '2019-01-23 16:54:52'),
(56, 23, '2019-01-23', '2019-01-23 17:31:37', '2019-01-23 17:31:37'),
(57, 20, '2019-01-23', '2019-01-23 17:31:46', '2019-01-23 17:35:46'),
(58, 1, '2019-01-23', '2019-01-23 20:04:22', '2019-01-23 20:04:22'),
(59, 23, '2019-01-23', '2019-01-23 20:04:31', '2019-01-23 20:04:31');

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
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`idTurma`, `descricao`, `sigla`) VALUES
(1, '1a Série ETIM Administração', '1C'),
(2, '1a Série ETIM Química', '1D');

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
  ADD PRIMARY KEY (`idAlunosFases`),
  ADD KEY `idAluno` (`idAluno`),
  ADD KEY `idFase` (`idFase`);

--
-- Indexes for table `alunos_medalhas`
--
ALTER TABLE `alunos_medalhas`
  ADD PRIMARY KEY (`idAlunosMedalhas`),
  ADD KEY `idAluno` (`idAluno`),
  ADD KEY `idMedalha` (`idMedalha`);

--
-- Indexes for table `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`idConquista`);

--
-- Indexes for table `fases`
--
ALTER TABLE `fases`
  ADD PRIMARY KEY (`idFase`),
  ADD KEY `idMissao` (`idMissao`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idLog`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`idMatricula`),
  ADD KEY `idAluno` (`idAluno`),
  ADD KEY `idTurma` (`idTurma`);

--
-- Indexes for table `medalhas`
--
ALTER TABLE `medalhas`
  ADD PRIMARY KEY (`idMedalha`),
  ADD KEY `idFase` (`idFase`);

--
-- Indexes for table `missoes`
--
ALTER TABLE `missoes`
  ADD PRIMARY KEY (`idMissao`),
  ADD KEY `idTurma` (`idTurma`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`idProfessor`);

--
-- Indexes for table `questionario_aprendizagem`
--
ALTER TABLE `questionario_aprendizagem`
  ADD PRIMARY KEY (`idQuestionario`);

--
-- Indexes for table `questionario_engajamento`
--
ALTER TABLE `questionario_engajamento`
  ADD PRIMARY KEY (`idQuestionario`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `questionario_jogador`
--
ALTER TABLE `questionario_jogador`
  ADD PRIMARY KEY (`idQuestionario`),
  ADD KEY `idAluno` (`idAluno`);

--
-- Indexes for table `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`idQuestao`),
  ADD KEY `idFase` (`idFase`);

--
-- Indexes for table `tempo_acesso`
--
ALTER TABLE `tempo_acesso`
  ADD PRIMARY KEY (`idAcesso`),
  ADD KEY `data` (`data`),
  ADD KEY `idAluno` (`idAluno`);

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
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `alunos_fases`
--
ALTER TABLE `alunos_fases`
  MODIFY `idAlunosFases` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
  MODIFY `idFase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `idLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `idMatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medalhas`
--
ALTER TABLE `medalhas`
  MODIFY `idMedalha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `missoes`
--
ALTER TABLE `missoes`
  MODIFY `idMissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questionario_aprendizagem`
--
ALTER TABLE `questionario_aprendizagem`
  MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questionario_engajamento`
--
ALTER TABLE `questionario_engajamento`
  MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `questionario_jogador`
--
ALTER TABLE `questionario_jogador`
  MODIFY `idQuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questoes`
--
ALTER TABLE `questoes`
  MODIFY `idQuestao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempo_acesso`
--
ALTER TABLE `tempo_acesso`
  MODIFY `idAcesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `idTurma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
