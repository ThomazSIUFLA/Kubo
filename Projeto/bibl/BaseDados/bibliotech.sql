-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Ago-2020 às 04:24
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bibliotech`
--

CREATE SCHEMA IF NOT EXISTS bibliotech;

USE bibliotech;



--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `cargo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(4) NOT NULL,
  `idUsuario` int(4) NOT NULL,
  `turma` varchar(4) NOT NULL,
  `nomeResp` varchar(50) NOT NULL,
  `telResp` varchar(11) NOT NULL,
  `numMatricula` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `idUsuario`, `turma`, `nomeResp`, `telResp`, `numMatricula`) VALUES
(5, 6, '5-C', 'jao', '3598659865', '123456'),
(6, 7, '5-C', 'quinzinho', '35989865986', '789'),
(7, 9, '1-A', 'Thomaz Flanklin de Souza Jorge', '35998275473', '123123'),
(8, 11, '2-B', 'Tonhão', '31958741235', '987845');

-- --------------------------------------------------------

--
-- Estrutura da tabela `bibliotecario`
--

CREATE TABLE `bibliotecario` (
  `idBibliotecario` int(4) NOT NULL,
  `turno` char(1) NOT NULL,
  `idUsuario` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `bibliotecario`
--

INSERT INTO `bibliotecario` (`idBibliotecario`, `turno`, `idUsuario`) VALUES
(1, 'm', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `editora`
--

CREATE TABLE `editora` (
  `idEditora` int(11) NOT NULL,
  `nomeEditora` varchar(30) NOT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `site` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `editora`
--

INSERT INTO `editora` (`idEditora`, `nomeEditora`, `cnpj`, `telefone`, `email`, `site`) VALUES
(1, 'Editora Moderna nova', NULL, NULL, NULL, NULL),
(4, 'Editora antiga', NULL, NULL, NULL, NULL),
(6, 'Editora futuro', NULL, NULL, NULL, NULL),
(7, 'vava', NULL, NULL, NULL, NULL),
(18, 'nova editora', NULL, NULL, NULL, NULL),
(36, 'Thomaz Franklin', '12', '35998275473', 'tume.tf@gmail.com', 'semsite.com.br'),
(37, 'nome', 'cnpj', '88', 'a@b', 'www.vaga.com.br'),
(56, 'Cássica', '01201201201201', '11223344556', 'classica@classica.com', 'classica.com.br'),
(57, 'Clássica', '12312312312312', '11998877665', 'classica@classica.com', 'classica.com.br'),
(58, 'Ártemis', '55558888884444', '115968958', 'artemis@artemis.com', 'artemis.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimo`
--

CREATE TABLE `emprestimo` (
  `idEmprestimo` int(6) NOT NULL,
  `idUsuario` int(4) NOT NULL,
  `dataEmprestimo` date NOT NULL,
  `dataVencimento` date NOT NULL,
  `dataDevolucao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimo`
--

INSERT INTO `emprestimo` (`idEmprestimo`, `idUsuario`, `dataEmprestimo`, `dataVencimento`, `dataDevolucao`) VALUES
(1, 11, '2020-08-18', '2020-08-30', NULL),
(2, 11, '2020-07-18', '2020-07-28', '2020-08-20'),
(3, 11, '2020-08-05', '2020-08-10', '0000-00-00'),
(4, 7, '2020-05-05', '2020-05-19', '2020-05-18'),
(5, 7, '2020-03-05', '2020-03-15', '2020-06-18'),
(6, 6, '2020-07-15', '2020-09-10', '2020-08-20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `codLivro` int(4) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `codEditora` int(4) DEFAULT NULL,
  `anoPublic` int(4) NOT NULL,
  `edicao` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`codLivro`, `isbn`, `titulo`, `codEditora`, `anoPublic`, `edicao`) VALUES
(24, '$isbn', 'ah é mesmo', 3, 1987, 5),
(32, '123456', 'livro 2 novo', 1, 1987, 2),
(33, '1234567', 'livro 3 novo', 2, 1910, 2),
(34, '12345678', 'livro 4 novo', 1, 1910, 3),
(35, '123456789', 'livro 5', 13, 1910, 2),
(36, '1234567890', 'livro 6', 1, 1910, 2),
(37, '45665412332', 'livro louco', 1, 2020, 2),
(38, '987350924875', 'katakata', 1, 1980, 4),
(39, '456789', 'kakak', 1, 2010, 2),
(41, '5454', 'livrinho', 1, 2001, 2),
(42, '984567894516', 'tempo bom', 1, 1954, 1),
(43, '444444444', 'livro 10', 1, 1988, 5),
(44, '111222', 'livro 11', 1, 1955, 1),
(45, '3', 'Mg14095068', 1, 2010, 3),
(46, '2', 'harry potter e a pedra filosofal', 1, 2000, 3),
(47, '23', 'harry potter retorno do rei', 6, 2016, 3),
(48, '5858', 'livro 71', 1, 2003, 3),
(49, '33', 'livivivivivvivivivibbb bb', 1, 1997, 2),
(50, '8', 'livro loucolksjfg', 4, 1978, 4),
(51, '147852369', 'livrinho', 18, 2020, 1),
(52, '548796', 'Dom Casmurro', 37, 1954, 2),
(53, '123654', 'Dom Quixote', 57, 2010, 50),
(54, '1258963', 'Guerra e Paz', 57, 2011, 32),
(55, '145632', 'A Montanha Mágica', 57, 2012, 29),
(56, '369852', 'Cem anos de solidão', 57, 2013, 42),
(57, '5214785', 'Ulisses', 57, 2014, 36),
(58, '47856922', 'Em busca do tempo perdido', 57, 2015, 53),
(59, '365214789', 'A Divina Comédia', 57, 2016, 78),
(60, '5410236', 'O Homem sem Qualidades', 57, 2016, 31),
(61, '59632014', 'O Processo', 57, 2017, 63),
(62, '596321025', 'O Som e a Fúria', 57, 2018, 68),
(63, '256321455', 'Crime e Castigo', 57, 2020, 81),
(64, '75321590', 'Orgulho e Preconceito', 57, 2009, 75),
(65, '589654785', 'Anna Kariênina', 57, 2008, 97),
(66, '3654885200', 'Grande Sertão: Veredas', 57, 2007, 58),
(67, '159632489', 'O Leopardo', 57, 2006, 51),
(68, '7411258886', 'Édipo Rei', 57, 2006, 74),
(69, '2365987411', '1984', 57, 2005, 67),
(70, '4589632102', 'O Castelo', 57, 2005, 77),
(71, '125632145', 'As Asas da Pomba', 57, 2006, 79),
(72, '12589654780', 'Ilíada e Odisséia', 57, 2004, 91),
(73, '2356987452', 'A Vida e as Opiniões do Cavalheiro Tristam Shandy', 57, 2003, 121),
(74, '5957515325', 'Doutor Fausto', 57, 2007, 55),
(75, '2123262544', 'Lolita', 57, 2015, 54),
(76, '32632589', 'Enquanto Agonizo', 57, 2016, 63),
(77, '45487954', 'A Morte de Virgílio', 57, 2011, 52),
(78, '369854545', 'Os Lusíadas', 57, 2003, 135),
(79, '23658741258', 'O Homem Invisível', 57, 2003, 81),
(80, '1256324789', 'Hamlet', 58, 2001, 158),
(81, '4589632157', 'Finnegans Wake', 58, 2015, 73);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livrosemprestimo`
--

CREATE TABLE `livrosemprestimo` (
  `idEmprestimo` int(4) NOT NULL,
  `codLivro` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livrosemprestimo`
--

INSERT INTO `livrosemprestimo` (`idEmprestimo`, `codLivro`) VALUES
(1, 46),
(1, 47),
(2, 42),
(3, 37),
(4, 32),
(4, 34),
(4, 50),
(4, 51),
(5, 50),
(6, 39),
(6, 52);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(4) NOT NULL,
  `tipo` char(3) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `endereco` varchar(250) NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nascimento` date NOT NULL,
  `dataCadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `tipo`, `nome`, `telefone`, `endereco`, `email`, `senha`, `nascimento`, `dataCadastro`) VALUES
(1, 'bib', 'thomaz', '35008274773', 'rua salvador 21 primavera luminarias', 'a@b', '123', '1988-01-29', '2020-08-17'),
(6, 'alu', 'joaquim jose da silva xavier', '3500827354', 'Rua Salvador Ferreira Diniz nº 20 , Bairro: baaa, Luminárias', 'tumetf@email.com', '123', '0000-00-00', '2020-08-18'),
(7, 'alu', 'fulano', '35998989897', 'Primavera nº 1 , Bairro: baaa, LUMINARIAS', 'a@gh.fgh', '123', '2003-06-19', '2020-08-19'),
(8, 'alu', 'Cristiano Roberto Ferreira', '35999771273', '16 de julho nº 25 , Bairro: centro, Luminárias', 'tume@email.com', '123', '1970-10-15', '2020-08-19'),
(9, 'alu', 'Cassilda DE FÁTIMA', '35000075473', 'Rua Salvador Ferreira Diniz nº 40 , Bairro: bbb, Luminárias', 'cassilds@yahoo.com.br', '123', '1984-05-13', '2020-08-19'),
(10, 'alu', 'George Orwell', '300075473', 'Rua Salvador Ferreira Diniz nº 20 , Bairro: Primavera, Luminárias', 'go@com', '123', '1988-01-29', '2020-08-19'),
(11, 'alu', 'antonio', '3598887456', 'Av brasil nº 154 ap 105, Bairro: centro, varginha', 't@a', '123', '2010-02-18', '2020-08-19');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD KEY `fk_admUsu` (`idUsuario`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`),
  ADD KEY `fk_idUsuario` (`idUsuario`);

--
-- Índices para tabela `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD PRIMARY KEY (`idBibliotecario`),
  ADD KEY `fk_idUsuBibl` (`idUsuario`);

--
-- Índices para tabela `editora`
--
ALTER TABLE `editora`
  ADD PRIMARY KEY (`idEditora`);

--
-- Índices para tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD PRIMARY KEY (`idEmprestimo`),
  ADD KEY `fk_usuario_emp` (`idUsuario`);

--
-- Índices para tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`codLivro`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Índices para tabela `livrosemprestimo`
--
ALTER TABLE `livrosemprestimo`
  ADD PRIMARY KEY (`idEmprestimo`,`codLivro`),
  ADD KEY `fk_liv_empo` (`codLivro`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `bibliotecario`
--
ALTER TABLE `bibliotecario`
  MODIFY `idBibliotecario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `editora`
--
ALTER TABLE `editora`
  MODIFY `idEditora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  MODIFY `idEmprestimo` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `codLivro` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admUsu` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD CONSTRAINT `fk_idUsuBibl` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `emprestimo`
--
ALTER TABLE `emprestimo`
  ADD CONSTRAINT `fk_usuario_emp` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Limitadores para a tabela `livrosemprestimo`
--
ALTER TABLE `livrosemprestimo`
  ADD CONSTRAINT `fk_emprestimoLivro` FOREIGN KEY (`idEmprestimo`) REFERENCES `emprestimo` (`idEmprestimo`),
  ADD CONSTRAINT `fk_liv_empo` FOREIGN KEY (`codLivro`) REFERENCES `livros` (`codLivro`);
  
DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsereAluno` (IN `anome` VARCHAR(50), IN `atipo` CHAR(3), IN `atelefone` VARCHAR(11), IN `aendereco` VARCHAR(250), IN `aemail` VARCHAR(30), IN `asenha` VARCHAR(20), IN `aturma` CHAR(3), IN `anomeResponsavel` VARCHAR(50), IN `atelResponsavel` VARCHAR(11), IN `amatricula` VARCHAR(8), IN `anasc` DATE, IN `acadastro` DATE)  BEGIN
 DECLARE cod INT(4);
 INSERT INTO usuario(tipo, nome, telefone, endereco, email, senha, nascimento, dataCadastro) 
 VALUES (atipo, anome, atelefone, aendereco, aemail, asenha, anasc, acadastro);
 SELECT idUsuario FROM usuario WHERE email=aemail INTO cod;
 INSERT INTO aluno(idUsuario, turma, nomeResp, telResp, numMatricula) VALUES (cod, aturma, anomeResponsavel, atelResponsavel, amatricula);
END$$

DELIMITER ;

-- --------------------------------------------------------  
  
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
