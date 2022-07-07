-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Jul-2022 às 05:15
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `animesonline`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `link_banner1` varchar(550) DEFAULT NULL,
  `link_banner2` varchar(550) DEFAULT NULL,
  `link_banner3` varchar(550) DEFAULT NULL,
  `href_banner1` varchar(550) DEFAULT NULL,
  `href_banner2` varchar(550) DEFAULT NULL,
  `href_banner3` varchar(550) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`link_banner1`, `link_banner2`, `link_banner3`, `href_banner1`, `href_banner2`, `href_banner3`) VALUES
('https://www.papeiseparede.com.br/1307-large_default/papel-de-parede-paisagem-natural-e-nuvens.jpg.webp', 'https://www.papeiseparede.com.br/1307-large_default/papel-de-parede-paisagem-natural-e-nuvens.jpg.webp', 'https://www.papeiseparede.com.br/1307-large_default/papel-de-parede-paisagem-natural-e-nuvens.jpg.webp', '#', '#', '#');

-- --------------------------------------------------------

--
-- Estrutura da tabela `episodios`
--

CREATE TABLE `episodios` (
  `id_anime` varchar(220) NOT NULL,
  `episodio` varchar(220) NOT NULL,
  `link_embed` varchar(520) NOT NULL,
  `postado` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `episodios`
--

INSERT INTO `episodios` (`id_anime`, `episodio`, `link_embed`, `postado`) VALUES
('7', '1', 'https://www.cartacapital.com.br/wp-content/uploads/2019/12/arassari.jpg', 'Vinicius');

-- --------------------------------------------------------

--
-- Estrutura da tabela `temporadas`
--

CREATE TABLE `temporadas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(220) NOT NULL,
  `descricao` varchar(520) NOT NULL,
  `temporada` varchar(220) NOT NULL,
  `link` varchar(520) NOT NULL,
  `ano` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `temporadas`
--

INSERT INTO `temporadas` (`id`, `titulo`, `descricao`, `temporada`, `link`, `ano`) VALUES
(6, 'Teste PHP', 'Isso é um teste pfvr n repare pfvr sério pfvr', '1', 'https://devtechnosys.com/insights/wp-content/uploads/2022/03/What-is-PHP.gif', '2022'),
(7, 'Php 2', 'PHP PHP PHP', '2', 'https://i.stack.imgur.com/VtaCs.gif', '2022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) DEFAULT NULL,
  `senha` varchar(220) NOT NULL,
  `descricao` varchar(220) NOT NULL,
  `created` date NOT NULL,
  `modified` date DEFAULT NULL,
  `expiravip` date DEFAULT NULL,
  `staff` varchar(220) DEFAULT NULL,
  `auth` varchar(220) NOT NULL,
  `vip` varchar(220) DEFAULT NULL,
  `img` varchar(520) DEFAULT NULL,
  `cor_aura` varchar(50) DEFAULT NULL,
  `cor_aura2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `descricao`, `created`, `modified`, `expiravip`, `staff`, `auth`, `vip`, `img`, `cor_aura`, `cor_aura2`) VALUES
(13, 'Vinicius', '', '91656bc4b7d4a2a3029ecb4d952982e7', 'Site', '2022-07-03', '2022-07-06', '2005-07-05', '1', '800196267946955', '1', 'https://c.tenor.com/OqxNHzXPoVwAAAAC/bingus.gif', '#e100ff', '#00ffe1'),
(17, 'Mauricio', '', '202cb962ac59075b964b07152d234b70', 'Eu amo Nome do seu site', '2022-07-06', '2022-07-06', NULL, NULL, '930524818599437', NULL, 'https://cdn-icons-png.flaticon.com/512/634/634741.png', '', NULL),
(18, 'Guimaraes', '', '202cb962ac59075b964b07152d234b70', 'Eu amo Nome do seu site', '2022-07-06', NULL, NULL, NULL, '63539416593404', NULL, 'https://cdn-icons-png.flaticon.com/512/634/634741.png', '#15ff00', NULL),
(19, 'Jair Bolsonaro', '', '202cb962ac59075b964b07152d234b70', 'Eu amo Nome do seu site', '2022-07-06', '2022-07-06', NULL, '0', '21515149214193', '1', 'https://i.redd.it/vley6wjk5oz61.png', '#15ff00', '#15ff00'),
(20, '123', '', '202cb962ac59075b964b07152d234b70', 'Eu amo Nome do seu site', '2022-07-06', '2022-07-06', NULL, NULL, '271622148349427', NULL, 'https://cdn-icons-png.flaticon.com/512/634/634741.png', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
