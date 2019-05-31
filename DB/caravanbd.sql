-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Maio-2019 às 12:06
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caravanbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `cpf`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, '323.434.345-54', 'Zake Coster', 'zac@gmail.com', '12)98182-3233', '12345678'),
(3, '482.531.303-74', 'brayan', 'brayan@gmail.com', '(12)98233-3421', '999999999'),
(4, '543.534.656-32', 'Mateus Leonardo', 'Mateus@gmail.com', '(12)99192-9394', '88888888'),
(5, '00000000000', 'admin', 'admin', '12 991872346', 'admin'),
(7, '47462846284', 'jhonatan luiz chagas', 'jhonatan@gmail.com', '3123', '5555'),
(8, '2342', 'jho', 'jhonatann@gmail.com', '323', '88888888'),
(9, '12213213213213', 'pinguelano', 'pinguelano@gmail.com', '12981827621', '123'),
(10, '828283848588', 'Ligia', 'ligia@gmail.com', '12988888888', '123'),
(11, '', 'jhonatan luiz chagas', '', '284762736', '123131'),
(12, '12313121123', 'jho', 'jho@gmail.com', '1231231', 'jho'),
(13, '4583821931', 'marcos', 'marcos@gmail.com', '123123', '123'),
(14, '12435243523', 'joao victor azevedo', 'joao@gmail.com', '1231445676', '12345'),
(15, '76427836487264', '42424234', 'admin2342234@131.com', '27347284782', 'admin'),
(16, '458.509.308-76', 'jhonatan luiz chagas', 'jonatapqt01@gmail.com', '12 981827621', '4444'),
(17, '827.463.260-51', 'Gabriel Cristie Custodio Narciso', 'bielcristie@gmail.com', '12 98199999', 'petterquill');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `req` int(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`req`, `nome`, `email`, `mensagem`) VALUES
(1, 'jhonatan luiz chagas', 'jonatapqt01@gmail.com', 'Não Haver'),
(2, 'Guilherme Dnizetti', 'guilhermetecnologias@gmail.com', 'Olá, posso trabalhar para vocês?'),
(3, 'jhonatan luiz chagas', 'jonatapqt01@gmail.com', 'adfsdfas'),
(4, '', '', 'thbth'),
(5, '', '', ''),
(6, 'jhonatan luiz chagas', 'jonatapqt01@gmail.com', 'xzcvxzcv'),
(7, 'bdbxcb', 'jonatapqt01@gmail.com', 'xcbbcv'),
(8, 'jsfhios', 'shfsf@aodop.sod', 'ashdoaishd'),
(9, 'Ligia', 'ligia.brezolin@gmail.com', 'hdjhskjdhsdhjs');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes`
--

CREATE TABLE `pacotes` (
  `req` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cod_viagem` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pacotes`
--

INSERT INTO `pacotes` (`req`, `id_cliente`, `cod_viagem`, `quantidade`) VALUES
(49, 5, 8, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `login` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`login`, `nome`, `sobrenome`, `cpf`, `senha`, `tipo`) VALUES
('admin', 'admin', 'admin', 'xxx.xxx.xxx-xx', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagens`
--

CREATE TABLE `viagens` (
  `cod` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagens` varchar(535) NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `detalhes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `viagens`
--

INSERT INTO `viagens` (`cod`, `nome`, `origem`, `destino`, `preco`, `imagens`, `hotel`, `detalhes`) VALUES
(1, 'Copacabana', 'Cruzeiro, São Paulo, Brasil', 'Rio De Janeiro, Rio De Janeiro, Brasil', '5000.00', 'imagens/viagens/Copacabana/icone.jpeg * imagens/viagens/Copacabana/viagem0.jpeg, imagens/viagens/Copacabana/viagem1.jpeg, imagens/viagens/Copacabana/viagem2.jpeg, imagens/viagens/Copacabana/viagem3.jpeg * imagens/viagens/Copacabana/hotel0.jpeg, imagens/viagens/Copacabana/hotel1.jpeg, imagens/viagens/Copacabana/hotel2.jpeg, imagens/viagens/Copacabana/hotel3.jpeg', 'Hotel Ri', '4 dias e 3 noites em Copacabana.\r\nPasseio turístico até o Cristo Redentor.\r\n\r\n<b>Hotéis:</b>\r\nHotéis perto da região costeira e bares, com preço médio. Café da manhã incluso. \r\n\r\n<b>Local:</b>\r\nO Rio de Janeiro é uma grande cidade brasileira à beira-mar, famosa pelas praias de Copacabana e Ipanema, pela estátua de 38 metros de altura do Cristo Redentor, no topo do Corcovado, e pelo Pão de Açúcar, um pico de granito com teleféricos até seu cume. A cidade também é conhecida pelas grandes favelas. O empolgante Carnaval, com carros alegóricos,fantasias extravagantes e sambistas, é considerado o maior do mundo.'),
(2, 'Caribe', 'Taubaté, São Paulo, Brasil', 'La Costa Del Coco, Punta Cana', '3500.00', 'imagens/viagens/Caribe/icone.jpeg * imagens/viagens/Caribe/viagem0.jpeg, imagens/viagens/Caribe/viagem1.jpeg, imagens/viagens/Caribe/viagem2.jpeg * imagens/viagens/Caribe/hotel0.jpeg, imagens/viagens/Caribe/hotel1.jpeg, imagens/viagens/Caribe/hotel2.jpeg', 'Paradisus', 'Excursão de 5 dias no Resort de La Costa del Coco.\r\nGuias turísticos para passeios.\r\n\r\n<b>Hotéis:</b>\r\nHotéis 5 estrelas, perto das praias, com café e lual inclusos.\r\n\r\n<b>Local:</b>\r\nPunta Cana, região que corresponde ao extremo leste da República Dominicana, é banhada pelo Mar do Caribe e pelo Oceano Atlântico. A região é conhecida pelo seu trecho de 32 quilômetros de praias e águas límpidas. A área de Bávaro e Punta Cana combinam-se para formar o que é conhecido como La Costa del Coco, uma área com luxuosos resorts all-inclusive. A região é muito procurada para atividades como tirolesa, windsurfe, caiaque e vela.'),
(3, 'Cape Town', 'Guarulhos (Aeroporto Internacional), São Paulo, Brasil', 'África Do Sul - Cape Town E Área Do Parque Kruger', '4000.00', 'imagens/viagens/Turismo Cultural/icone.jpeg * imagens/viagens/Turismo Cultural/viagem0.jpeg, imagens/viagens/Turismo Cultural/viagem1.jpeg, imagens/viagens/Turismo Cultural/viagem2.jpeg * imagens/viagens/Turismo Cultural/hotel0.jpeg, imagens/viagens/Turismo Cultural/hotel1.jpeg, imagens/viagens/Turismo Cultural/hotel2.jpeg', 'The Kingdom Resort', 'Passeio com guia turístico pela selva local.\r\nFestas noturnas.\r\nCombo casal.\r\nCriança até 10 anos não paga.\r\n\r\n<b>Hotéis:</b> \r\n3 estrelas, com serviço de quarto excelente e ótima localização. Café da tarde incluso.\r\n\r\n<b>Local:</b>\r\nA Cidade do Cabo é uma cidade portuária na costa sudoeste da África do Sul, em uma península ao pé da imponente Montanha da Mesa. Bondes sobem lentamente até o topo plano da montanha, que ostenta vistas panorâmicas da cidade, do agitado porto e dos barcos a caminho da ilha Robben, famosa prisão na qual Nelson Mandela foi encarcerado e que agora é um museu.\r\nTrilhas de caminhada cruzam as encostas e também sobem a montanha pelas florestas e pelos gramados bem cuidados do Jardim Botânico Nacional Kirstenbosch, pelo exuberante subúrbio produtor de vinho de Constantia e pela íngreme Garganta de Platteklip. '),
(4, 'Paris', 'São Paulo (Aeroporto Internacional), Brasil', 'Torre Eiffel, Paris', '10000.00', 'imagens/viagens/Paris/icone.jpeg * imagens/viagens/Paris/viagem0.jpeg, imagens/viagens/Paris/viagem1.jpeg, imagens/viagens/Paris/viagem2.jpeg * imagens/viagens/Paris/hotel0.jpeg, imagens/viagens/Paris/hotel1.jpeg, imagens/viagens/Paris/hotel2.jpeg', 'The Peninsula', 'Cidade da Paixão, especialmente reservada para você que deseja presentear seu parceiro.\r\nCombo Romântico: Jantar em restaurante a escolha do casal, passeio exclusivo pela Torre Eiffel.\r\n\r\n<b>Hotéis:</b> \r\n3, 4 e 5 estrelas, com combos para casais, localizado perto de pontos turísticos. Café à moda francesa incluso.\r\n\r\n<b>Local:</b> \r\nParis, a capital da França, é uma importante cidade europeia e um centro mundial de arte, moda, gastronomia e cultura. Sua paisagem urbana do século XIX é cortada por avenidas largas e pelo rio Sena. A cidade é conhecida por monumentos como a Torre Eiffel e a Catedral de Notre-Dame, uma construção gótica do século XII, sendo famosa também pela culturados cafés e por lojas de estilistas famosos na Rue du Faubourg Saint-Honoré.'),
(5, 'Londres', 'Guarulhos (Aeroporto Internacional), São Paulo, Brasil', 'Londres, Inglaterra ', '12000.00', 'imagens/viagens/Londres/icone.jpeg * imagens/viagens/Londres/viagem0.jpeg, imagens/viagens/Londres/viagem1.jpeg * imagens/viagens/Londres/hotel0.jpeg, imagens/viagens/Londres/hotel1.jpeg, imagens/viagens/Londres/hotel2.jpeg', 'Fair Little Lady', '5 dias de pura alegria\r\n\r\n<b>Hotéis:</b> \r\n4 estrelas, perto dos pontos turísticos. Jantar incluído.\r\n\r\n<b>Local:</b>\r\nLondres, capital da Inglaterra e do Reino Unido, é uma cidade do século 21 com uma história que remonta a era romana. Seu centro abriga as sedes importante do Parlamento, a famosa torre do relógio Big Bem e a Abadia de Westminster, local de coroação dos monarcas britânicos. Do outro lado do rio Tâmisa, a roda gigante London Eye tem vista panorâmica do complexo cultural da margem sul e de toda a cidade.'),
(6, 'China', 'Rio De Janeiro (Aeroporto Rio), Brasil', 'Pequim, China ', '12000.00', 'imagens/viagens/China/icone.jpeg * imagens/viagens/China/viagem0.jpeg, imagens/viagens/China/viagem1.jpeg, imagens/viagens/China/viagem2.jpeg, imagens/viagens/China/viagem3.jpeg * imagens/viagens/China/hotel0.jpeg, imagens/viagens/China/hotel1.jpeg, imagens/viagens/China/hotel2.jpeg', 'Beijing Palace', '5 dias e 4 noites nesse lindo País.\r\n\r\n<b>Hotéis:</b>\r\nHotéis 4 e 5 estrelas, perto do centro da cidade. Almoço incluso.\r\n\r\n<b>Local:</b>\r\nA China é uma nação muito populosa da Ásia Oriental cuja ampla paisagem abrange pradarias, desertos, montanhas, lagos, rios e mais de 14.000 km de litoral. A capital Pequim combina a arquitetura moderna com locais históricos, como o complexo de palácios da Cidade Proibida e a Praça da Paz Celestial. Xangai é um centro financeiro global repleto de arranha-céus. A emblemática Muralha da China corta a região norte do país de leste a oeste.'),
(7, 'Disney', 'Guarulhos (Aeroporto Internacional), Brasil', 'Disney (Orlando), Florida', '2749.00', 'imagens/viagens/Disney/icone.jpeg * imagens/viagens/Disney/viagem0.jpeg, imagens/viagens/Disney/viagem1.jpeg, imagens/viagens/Disney/viagem2.jpeg, imagens/viagens/Disney/viagem3.jpeg * imagens/viagens/Disney/hotel0.jpeg, imagens/viagens/Disney/hotel1.jpeg, imagens/viagens/Disney/hotel2.jpeg', 'Seralago Hotel', '7 dias e 6 noites.\r\nCrianças ate 3 anos não paga.\r\nAproveite essa oportunidade.\r\n\r\n<b>Hotéis:</b>\r\nLocalizados perto do parque temático. Crianças até 10 anos pagam a metade. Café da manhã incluso e serviço de quarto excelente. \r\n\r\n<b>Local:</b>\r\nThe Walt Disney Company, conhecida simplesmente como Disney, é uma companhia multinacional estadunidense de mídia de massa sediada no Walt Disney Studios, em Burbank, Califórnia. Os parques são divididos em Walt Disney Parks and Resorts, The Walt Disney Studios, Disney Media Network, Disney Consumer Products, e Disney Interactive Media Group.'),
(8, 'Tóquio', 'Rio De Janeiro (Aeroporto Rio), Brasil', 'Tóquio, Japão', '5000.00', 'imagens/viagens/Tóquio/icone.jpeg * imagens/viagens/Tóquio/viagem0.jpeg, imagens/viagens/Tóquio/viagem1.jpeg, imagens/viagens/Tóquio/viagem2.jpeg * imagens/viagens/Tóquio/hotel0.jpeg, imagens/viagens/Tóquio/hotel1.jpeg, imagens/viagens/Tóquio/hotel2.jpeg, imagens/viagens/Tóquio/hotel3.jpeg', 'LUNGWOOD', '5 dias e 4 noites nesse lindo País.\r\nPasseio Turístico pelas redondezas.\r\n\r\n<b>Hotéis:</b>\r\n4 e 5 estrelas, com excelente atendimento e serviço de quarto. Localizado a poucos quilômetros do centro. Café da manhã incluso.\r\n\r\n<b>Local:</b>\r\nTóquio, a movimentada capital do Japão, combina o estilo ultramoderno com o tradicional, desde arranha-céus iluminados por neon a templos históricos. O opulento santuário xintoísta Meiji é conhecido por seu altíssimo portão e pelas florestas circundantes. O Palácio Imperial fica localizado em meio a jardins públicos. Os muitos museus da cidade oferecemexposições que variam de arte clássica (no Museu Nacional de Tóquio) a um teatro kabuki reconstruído (no Museu Edo-Tokyo).'),
(9, 'Miami', 'São José, São Paulo, Brasil', 'Miami, Flóriada', '7000.00', 'imagens/viagens/Miami/icone.jpeg * imagens/viagens/Miami/viagem0.jpeg, imagens/viagens/Miami/viagem1.jpeg, imagens/viagens/Miami/viagem2.jpeg, imagens/viagens/Miami/viagem3.jpeg * imagens/viagens/Miami/hotel0.jpeg, imagens/viagens/Miami/hotel1.jpeg, imagens/viagens/Miami/hotel2.jpeg', 'Loews Hotel', 'Miami Beach, 4 dias e 3 noites.\r\n\r\n<b>Hotéis:</b>\r\nSão 5 estrelas, nos melhores locais, com melhor atendimento e almoço incluído.\r\n\r\n<b>Local:</b>\r\nMiami é uma cidade internacional no extremo sudeste da Flórida. Sua influência cubana se reflete nos cafés e lojas de charutos que ocupam a CalleOcho, em Little Havana. Nas águas de cor azul-turquesa da BiscayneBay ficam Miami Beach e South Beach, um bairro glamouroso conhecido por suas construções coloridas em art déco, areia branca, hotéis para surfistas e casas noturnas famosas.'),
(10, 'Bahamas', 'Guarulhos, São Paulo, Brasil', 'Bahamas, Caribe', '10000.00', 'imagens/viagens/Bahamas/icone.jpeg * imagens/viagens/Bahamas/viagem0.jpeg, imagens/viagens/Bahamas/viagem1.jpeg, imagens/viagens/Bahamas/viagem2.jpeg * imagens/viagens/Bahamas/hotel0.jpeg, imagens/viagens/Bahamas/hotel1.jpeg', 'Hamas', '7 dias e 6 noites em Bahamas.\r\nPasseios incríveis para você e toda sua família.\r\n\r\n<b>Hotéis:</b>\r\n4 e 5 estrelas, com suítes de vista para o mar da ilha. Café da manhã incluso.\r\n\r\n<b>Local:</b>\r\nAs Bahamas são um arquipélago no Oceano Atlântico cujo terreno tem origem nos corais. O país tem mais de 700 ilhas e ilhotas, muitas desabitadas e outras cheias de resorts. A Grand Bahama, mais ao norte, e a Paradise Island, com muitos hotéis de grande porte, são as mais conhecidas. Há locais para mergulho, como a enorme Barreira de Coral de Andros, o Thunderball Grotto (locação de filmes de James Bond) e os jardins de corais negros de Bimini.'),
(11, 'Hong Kong', 'Rio De Janeiro (Aeroporto Rio), Brasil', 'Hong Kong, China', '16000.00', 'imagens/viagens/Hong Kong/icone.jpeg * imagens/viagens/Hong Kong/viagem0.jpeg, imagens/viagens/Hong Kong/viagem1.jpeg, imagens/viagens/Hong Kong/viagem2.jpeg * imagens/viagens/Hong Kong/hotel0.jpeg, imagens/viagens/Hong Kong/hotel1.jpeg, imagens/viagens/Hong Kong/hotel2.jpeg', 'Hong-Kong-Ocean', '2 semanas em Hong Kong.\r\nLugares impressionantes para visitar.\r\n\r\n<b>Hotéis: </b>\r\nServiços de hotelaria 5 estrelas, com atendimento de primeira e jantar incluso.\r\n\r\n<b>Local:</b>\r\nHong Kong, ex-colônia britânica, é um território autônomo no sudeste da China. Seu centro urbano vibrante e densamente povoado é também um porto importante e um centro financeiro global de destaque, com um horizonte marcado por arranha-céus. O distrito comercial exibe monumentos arquitetônicos como a Torre do Bank of China. \r\n'),
(12, 'Santiago', 'São Paulo (Aeroporto Internacional), Brasil', 'Santiago, Chile ', '7000.00', 'imagens/viagens/Santiago/icone.jpeg * imagens/viagens/Santiago/viagem0.jpeg, imagens/viagens/Santiago/viagem1.jpeg, imagens/viagens/Santiago/viagem2.jpeg, imagens/viagens/Santiago/viagem3.jpeg * imagens/viagens/Santiago/hotel0.jpeg, imagens/viagens/Santiago/hotel1.jpeg, imagens/viagens/Santiago/hotel2.jpeg', 'Armanas', '1 semana no Chile, com passeios exclusivos.\r\nCrianças até 3 anos não pagam.\r\n\r\n<b>Hotéis:</b>\r\nServiços de hotelaria 3 estrelas, e café da manhã incluso.\r\n\r\n<b>Local:</b> \r\nSantiago é a maior cidade e capital do Chile, fica em um vale circundado pelos Andes cobertos pela neve e cadeia de montanhas chilena. A Plaza de Armas, o coração do centro velho colonial da cidade, abriga 2 pontos turísticos históricos neoclássicos: o Palacio de la Real Audiencia de 1808, e a Catedral metropolitana do século 18.'),
(13, 'Roma', 'Rio De Janeiro (Aeroporto Rio), Brasil', 'Roma, Itália', '8000.00', 'imagens/viagens/Roma/icone.jpeg * imagens/viagens/Roma/viagem0.jpeg, imagens/viagens/Roma/viagem1.jpeg, imagens/viagens/Roma/viagem2.jpeg, imagens/viagens/Roma/viagem3.jpeg * imagens/viagens/Roma/hotel0.jpeg, imagens/viagens/Roma/hotel1.jpeg, imagens/viagens/Roma/hotel2.jpeg', 'Jarck', '6 dias e 5 noites em Roma.\r\n\r\n<b>Hotéis:</b>\r\nHotel três estrelas com preço médio. Café da manhã incluso.\r\n\r\n<b>Local:</b>\r\nÉ uma cidade cosmopolita, enorme e uma comuna especial da Itália, com mais de 3.000 anos de arte, como o Coliseu e fórum romano arquitetura e cultura influentes no mundo todo. É a capital do país e cidade sede do Vaticano também. '),
(14, 'Porto Seguro', 'São José (Aeroporto), São Paulo, Brasil', 'Porto Seguro, Bahia, Brasil', '10000.00', 'imagens/viagens/Porto Seguro/icone.png * imagens/viagens/Porto Seguro/viagem0.jpeg, imagens/viagens/Porto Seguro/viagem1.jpeg, imagens/viagens/Porto Seguro/viagem2.jpeg, imagens/viagens/Porto Seguro/viagem3.jpeg * imagens/viagens/Porto Seguro/hotel0.jpeg, imagens/viagens/Porto Seguro/hotel1.jpeg, imagens/viagens/Porto Seguro/hotel2.jpeg, imagens/viagens/Porto Seguro/hotel3.jpeg, imagens/viagens/Porto Seguro/hotel4.jpeg', 'Resort Lincon ', '10 dias e 9 noites na Bahia.\r\nPasseios pelo maravilhoso mar da Bahia.\r\nPasseios Turísticos pelas redondezas.\r\n\r\n<b>Hotéis:</b>\r\n4 estrelas de preço médio, com almoço incluso. Guia turístico no passeio.\r\n\r\n<b>Local:</b>\r\nPorto Seguro é uma estância turística costeira no estado brasileiro da Bahia. Possui aproximadamente 90km de praias tropicais, incluindo a popular Praia de Taperapuãn. A cidade é também conhecida pela vibrante vida noturna, centrada no passeio repleto de bares, Passarela do Álcool.  \r\n'),
(15, 'Beach Park', 'Guarulhos, São Paulo, Brasil', 'Beach Park, Ceará, Brasil', '7500.00', 'imagens/viagens/Beach Park/icone.jpeg * imagens/viagens/Beach Park/viagem0.jpeg, imagens/viagens/Beach Park/viagem1.jpeg, imagens/viagens/Beach Park/viagem2.jpeg * imagens/viagens/Beach Park/hotel0.jpeg, imagens/viagens/Beach Park/hotel1.jpeg, imagens/viagens/Beach Park/hotel2.jpeg, imagens/viagens/Beach Park/hotel3.jpeg', 'Cearasil', '1 semana no Ceará, almoço incluso e café da tarde incluso.\r\nPasseio de Jeep pelo deserto do Ceará.  \r\nTurismo Cultural.\r\n\r\n<b>Hotéis:</b> \r\nHotel com atividades interativas com crianças, com localização próxima ao parque. Café da manhã incluso. Criança menor de seis anos metade do preço.\r\n\r\n<b>Local:</b> \r\nBeach Park fica localizado em Fortaleza, é um complexo turístico no litoral, na praia de Porto das Dunas, município de Aquiraz, a 26 quilômetros de Fortaleza. Seu parque aquático é considerado o maior da América Latina.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`req`);

--
-- Indexes for table `pacotes`
--
ALTER TABLE `pacotes`
  ADD PRIMARY KEY (`req`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `viagens`
--
ALTER TABLE `viagens`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `req` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pacotes`
--
ALTER TABLE `pacotes`
  MODIFY `req` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
