-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 29/03/2018 às 15:03
-- Versão do servidor: 5.5.54-0ubuntu0.12.04.1
-- Versão do PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `c595rede`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `dia` datetime NOT NULL,
  `mobile` int(11) NOT NULL DEFAULT '0' COMMENT '(0 = os dois, 1 = mobile, 2 = desktop)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `banner`
--

INSERT INTO `banner` (`id`, `imagem`, `dia`, `mobile`) VALUES
(46, 'Banner_site_redemall (1).png', '2018-02-14 10:27:53', 2),
(47, 'banner_mobile.png', '2018-03-28 08:57:07', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'perfumaria'),
(2, 'alimentação'),
(3, 'tabacaria'),
(4, 'chaveiro'),
(5, 'agência de turismo'),
(6, 'drogaria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `emails`
--

INSERT INTO `emails` (`id`, `email`) VALUES
(1, 'lukas_tf@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lojas`
--

CREATE TABLE `lojas` (
  `id` int(10) UNSIGNED NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(4000) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `lojas`
--

INSERT INTO `lojas` (`id`, `imagem`, `nome`, `descricao`, `telefone`, `categoria_id`) VALUES
(22, 'Imagem_lojas_cantinhodagula.png', 'Cantinho da Gula', 'A franquia dos hambúrgueres mais saborosos do Brasil.', '99999', 2),
(23, 'Imagem_lojas_CVC (1).png', 'CVC', 'Na loja CVC você encontrará uma equipe totalmente especializada para atendimento em viagens. Instalada em um uma ótima localização, é uma excelente opção para você comprar a sua viagem a preços arrasadores. ..\r\n\r\nA CVC possui a maior oferta de produtos e serviço de turismo na América Latina, com mais de 1.000 opções de roteiros nacionais e internacionais em viagens aéreas, terrestres e marítimas. Além disso, você pode reservar diárias em hotéis, comprar passagens aéreas, fazer cruzeiros, alugar carros e adquirir ingressos para atrações conhecidas mundialmente. ..\r\n\r\nA CVC ainda oferece a melhor estrutura de atendimento aos turistas que desembarcam nos principais destinos do Brasil e do exterior como Porto Seguro, Natal, Fortaleza, Serra Gaúcha, Costa do Sauípe, Buenos Aires, Santiago, Orlando, Miami, Punta Cana, Cancún, Nova York. Se você deseja explorar outros lugares como Bonito, Pantanal, Cairo, Istambul, Bora Bora, Londres e Dubai também terá à disposição toda a infraestrutura que só a CVC tem. ..\r\n\r\nEscolha seu próximo destino e boa viagem!', '000000000', 5),
(24, 'Imagem_lojas_danup.png', 'Danup', 'Chaveiro', '0000000000', 4),
(25, 'Imagem_lojas_drogalife.png', 'Droga Life', 'Farmacia', '000000000', 6),
(26, 'Imagem_lojas_floralie.png', 'Floralie', 'Perfumaria', '0000000000000', 1),
(27, 'Imagem_lojas_japalovers.png', 'Japalovers', 'Restaurante Japonês', '00000000000', 2),
(28, 'Imagem_lojas_tabacariamoi.png', 'Tabacaria Moi', 'Empresa tradicional com quase 50 anos de história. ..\r\n\r\nHoje além da completa linha de artigos de tabacaria, atua também no segmento de Cutelaria (facas, canivetes, espadas), Hookah Shop (narguilés e acessórios) e Head Shop (sedas, dichavadores, isqueiros). ..\r\n\r\nA loja também conta com artigos variados para tereré e chimarrão, além de chapéus, bonés, lanternas e presentes em geral.', '00000000000000', 3),
(29, 'Imagem_lojas_tuttiilbene.png', 'Tutti il Bene', 'Massas in box', '00000000', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) UNSIGNED NOT NULL,
  `imagem` varchar(50) NOT NULL,
  `dia` datetime NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `noticias`
--

INSERT INTO `noticias` (`id`, `imagem`, `dia`, `titulo`, `texto`) VALUES
(32, 'tuti_bene.png', '2018-03-23 16:40:58', 'Tutti il Bene inaugura sua primeira unidade em Rio Preto', 'A Tutti il Bene vai inaugurar na Rede Mall Belvedere seu primeiro restaurante. A marca chega ao mercado de massas in box com a promessa de entregar aos consumidores um sabor caseiro em suas receitas. Segundo Devanir Franzoni, proprietário do restaurante, o diferencial está no processo de preparo das receitas: “Nosso segredo está no modo como preparamos as massas e os molhos. Fazemos tudo de forma artesanal, com ingredientes de alta qualidade, frescos e selecionados. Nossas massas e molhos são armazenados em recipientes separados, em temperatura adequada para cada produto, para que não altere a qualidade e o sabor dos mesmos.”. ..\r\nVale conferir!'),
(33, 'tabacaria_moi.png', '2018-03-28 17:46:18', 'Tabacaria Moi abre mais uma unidade ', 'A Tabacaria Moi, a mais tradicional de Rio Preto, escolheu a Rede Mall Belvedere para inaugurar sua 2ª unidade na cidade. No mercado desde 1969, a marca comercializa produtos tradicionais e contemporâneos, e é considerada excelência em atendimento nesse segmento. ..\r\n\r\n“Escolhemos a região por acreditar que tem um excelente público em potencial e que estava à espera de um grande empreendimento como a Rede Mall Belvedere. Nossa expectativa é a melhor possível e por isso estamos investindo e preparando uma loja moderna, cheia de novidades e variedades no ramo de tabacaria, cutelaria, narguilé e presentes.” – Fernando Moi, proprietário da Tabacaria.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `publicidades`
--

CREATE TABLE `publicidades` (
  `id` int(11) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `dia` datetime NOT NULL,
  `mobile` int(11) NOT NULL DEFAULT '0' COMMENT '(0 = os dois, 1 = mobile, 2 = desktop)',
  `lugar` int(11) NOT NULL DEFAULT '0' COMMENT '(0 = inicio, 1 = dentro-loja, 2 = dentro-noticia, 3 = pesquisar-loja)',
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `publicidades`
--

INSERT INTO `publicidades` (`id`, `imagem`, `dia`, `mobile`, `lugar`, `link`) VALUES
(43, 'cantinho_gula.png', '2018-03-23 14:25:00', 2, 0, ''),
(44, 'cantinho_gula_mobile.png', '2018-03-28 09:11:50', 1, 0, ''),
(50, 'cantinho_gula_mobile.png', '2018-03-28 19:35:50', 1, 2, ''),
(51, 'tuti_novidade_desktop.png', '2018-03-28 19:35:50', 2, 2, ''),
(52, 'cantinho_gula_mobile.png', '2018-03-28 19:41:07', 1, 3, ''),
(53, 'cantinho_gula_loja_desktop.png', '2018-03-28 19:41:07', 2, 3, ''),
(56, 'Banner_site_redemall.png', '2018-03-29 13:38:32', 1, -1, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
(1, 'marketing', '$2y$10$eGOO1AtMBupZcsOsZgi2rudk5JFaE5XL9EBq1Z1fMbGpCyJqtYBKK');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `lojas`
--
ALTER TABLE `lojas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `publicidades`
--
ALTER TABLE `publicidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de tabela `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `lojas`
--
ALTER TABLE `lojas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de tabela `publicidades`
--
ALTER TABLE `publicidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `lojas`
--
ALTER TABLE `lojas`
  ADD CONSTRAINT `lojas_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
