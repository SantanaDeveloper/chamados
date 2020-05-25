-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 25/05/2020 às 20:18
-- Versão do servidor: 10.3.22-MariaDB-1ubuntu1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tickets`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `call_histories`
--

CREATE TABLE `call_histories` (
  `id` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `answer` text NOT NULL,
  `status` varchar(30) NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `call_histories`
--

INSERT INTO `call_histories` (`id`, `id_ticket`, `id_user`, `answer`, `status`, `updated`) VALUES
(2, 3, 1, '---', 'Pending', '2020-05-25 11:23:16'),
(7, 6, 1, '---', 'Pending', '2020-05-25 20:17:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `status` enum('Pending','Waiting','Solved','Canceled') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `tickets`
--

INSERT INTO `tickets` (`id`, `id_user`, `title`, `description`, `created`, `status`) VALUES
(3, 1, 'Cade a internet?', 'Não funciona....', '2020-05-25 11:23:16', 'Pending'),
(6, 1, 'Lucas nao ve', '123', '2020-05-25 20:17:29', 'Pending');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(180) NOT NULL,
  `rank` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rank`) VALUES
(1, 'João Paulo Santana', 'santanadeveloper@outlook.com', '$2y$08$pHrkfOh3HDRipiv1N55u0.Riw6aIjVwfEgFeaLHkNDVbAoQK1YBXG', 'Admin'),
(2, 'Lucas gabriel', 'lucas@gmail.com', '$2y$08$usV8ZijVou0z8vnPHpsTuuwJwNWgGhlU4STlnBO12DHxxXNovtXX6', 'Usuário');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `call_histories`
--
ALTER TABLE `call_histories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `call_histories`
--
ALTER TABLE `call_histories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
