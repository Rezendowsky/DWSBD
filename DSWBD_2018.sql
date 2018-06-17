-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Jun-2018 às 20:20
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dswbd_2018`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `idConsulta` int(11) NOT NULL,
  `dataConsulta` date DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `fkCronograma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cronograma`
--

CREATE TABLE `cronograma` (
  `idCronograma` int(11) NOT NULL,
  `inicioHora` datetime DEFAULT NULL,
  `terminoHora` datetime DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numero` char(10) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cep` char(10) DEFAULT NULL,
  `fkPessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `fkPessoa`) VALUES
(3, 'av genoveva rezende carneiro', '70', 'vila bela', 'morrinhos', 'go', '75650000', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `salario` varchar(45) NOT NULL,
  `fkPessoa` int(11) NOT NULL,
  `fkEndereco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `idPaciente` int(11) NOT NULL,
  `peso` decimal(10,0) DEFAULT NULL,
  `altura` decimal(10,0) DEFAULT NULL,
  `tipoSanguineo` char(2) DEFAULT NULL,
  `fkPessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cpf` char(11) NOT NULL,
  `sexo` char(1) NOT NULL,
  `nascimento` date NOT NULL,
  `telefone` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`idPessoa`, `nome`, `cpf`, `sexo`, `nascimento`, `telefone`) VALUES
(3, 'Giovani', '09154321964', 'M', '1995-05-16', '981036694'),
(4, 'Giovani', '65373342769', 'M', '1995-05-16', '981036694'),
(5, 'Giovani', '93494465703', 'M', '1995-05-16', '981036694'),
(6, 'Giovani', '34522224206', 'M', '1995-05-16', '981036694'),
(7, 'Giovani', '42210053510', 'M', '1995-05-16', '981036694'),
(8, 'teste', '1235677', 'M', '0000-00-00', 'teste'),
(9, 'teste', '12345678', 'M', '0000-00-00', 'teste'),
(10, 'Giovani', '31909214230', 'M', '1995-05-16', '981036694'),
(13, 'giovani', '78419543012', 'M', '1995-05-16', '12345678'),
(14, 'giovani', '44788031884', 'M', '1995-05-16', '12345678'),
(15, 'giovani', '31420649825', 'M', '1995-05-16', '12345678'),
(17, 'giovani', '12025784201', 'M', '1995-05-16', '12345678'),
(18, 'giovani', '71642584657', 'M', '1995-05-16', '12345678'),
(19, 'giovani', '81662343787', 'M', '1995-05-16', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idConsulta`);

--
-- Indexes for table `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`idCronograma`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `fkPessoaEndereco` (`fkPessoa`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD KEY `fkPessoaFuncionario` (`fkPessoa`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idPaciente`),
  ADD KEY `fkPessoaPaciente` (`fkPessoa`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`idPessoa`),
  ADD UNIQUE KEY `cpf` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idConsulta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `idCronograma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idPaciente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `idPessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fkPessoaEndereco` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `fkPessoaFuncionario` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `fkPessoaPaciente` FOREIGN KEY (`fkPessoa`) REFERENCES `pessoa` (`idPessoa`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
