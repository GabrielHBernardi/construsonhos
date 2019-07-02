-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Jul-2019 às 22:06
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construsonhos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `idAdmin` int(9) NOT NULL,
  `login` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`idAdmin`, `login`, `senha`) VALUES
(1, 'admin', '$2y$10$sN/bZUu4gCDVQ4UcKK3ZLeGvPZloRYLPmTBvFVftzKmVha5doBFhK');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `idCliente` int(9) NOT NULL,
  `nomeCliente` varchar(255) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `telefoneCliente` varchar(16) NOT NULL,
  `emailCliente` varchar(255) NOT NULL,
  `senhaCliente` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`idCliente`, `nomeCliente`, `cpfCliente`, `telefoneCliente`, `emailCliente`, `senhaCliente`) VALUES
(1, 'LetÃ­cia Luiza Caldeira', '373.853.200-58', '(61) 991217644', 'leticia@gmail.com', '$2y$10$2vSuFPPNxEFI4efNh4iMn.FBcG7WwMrwEfIoZ8IuZZN6q3vtazD2O'),
(2, 'Isis Fabiana Campos', '252.479.124-62', '(27) 989330359', 'isis@gmail.com', '$2y$10$2vSuFPPNxEFI4efNh4iMn.FBcG7WwMrwEfIoZ8IuZZN6q3vtazD2O'),
(3, 'Carlos Fernando Lopes', '479.106.683-92', '(31) 994253919', 'carlos@gmail.com', '$2y$10$aMZVGhhyZbwOe8m3CjiFx.FjnPXxiqBlhhgYoD//HozNBiYJoWNY6'),
(4, 'Juan Mateus Nunes', '132.486.495-85', '(84) 989974960', 'juan@gmail.com', '$2y$10$2vSuFPPNxEFI4efNh4iMn.FBcG7WwMrwEfIoZ8IuZZN6q3vtazD2O'),
(5, 'Bento Benjamin Juan Viana', '175.824.532-80', '(68) 987924492', 'bento@gmail.com', '$2y$10$2vSuFPPNxEFI4efNh4iMn.FBcG7WwMrwEfIoZ8IuZZN6q3vtazD2O'),
(6, 'Gabrielly Evelyn Bianca da Costa', '398.638.088-49', '(86) 992862747', 'gabs12@gmail.com', '$2y$10$2vSuFPPNxEFI4efNh4iMn.FBcG7WwMrwEfIoZ8IuZZN6q3vtazD2O'),
(7, 'Igor Lorenzo Vieira', '830.174.095-70', '(63) 985402768', 'igorlorenzovieira-72@itelefonica.com.br', ''),
(8, 'Raimundo MÃ¡rio Danilo Nogueira', '198.320.048-45', '(95) 997608404', 'raimundomariodanilonogueira@verdana.com.br', ''),
(9, 'Luiza Francisca Monteir', '107.816.220-42', '(11) 999904925', 'luizafranciscamonteiro_@nextel.com.br', ''),
(10, 'OtÃ¡vio Marcos Fernando Pires', '483.487.302-14', '(82) 982720798', 'otaviomarcosfernandopires@bds.com.br', ''),
(11, 'Vitor Eduardo BenÃ­cio Jesus', '906.727.415-12', '(21) 992607206', 'vitoreduardobeniciojesus@advogadosempresariais.com.br', ''),
(12, 'Raquel Laura Rocha', '204.799.444-66', '204.799.444-66', 'raquellaurarocha@otlokk.com', ''),
(13, 'Vinicius Thomas Ruan AragÃ£o', '210.269.918-89', '210.269.918-89', 'viniciusthomasruanaragao-88@yahool.com', ''),
(14, 'Carla LetÃ­cia Bernardes', '794.467.853-67', '794.467.853-67', 'ccarlaleticiabernardes@tecvap.com.br', ''),
(15, 'Elza Luiza dos Santos', '466.755.193-36', '466.755.193-36', 'elza@elza.com', '$2y$10$2vSuFPPNxEFI4efNh4iMn.FBcG7WwMrwEfIoZ8IuZZN6q3vtazD2O'),
(16, 'JoÃ£o Paulo', '833.699.610-91', '(54) 991873014', 'joaop@gmail.com', '$2y$10$GZM91FFbi43xLnG9o8dz0uu24EOoTjnowC4oiKmVqPJEndgXPzxfq'),
(17, 'AntÃ´nio Souza', '096.162.480-90', '(54) 991873014', 'antonio@antonio.com', '$2y$10$C53XBFMrBtIrZ0x7Nm4ITuxR/GZf8.n/DxyRABAGn8IwXlliD43Pa'),
(18, 'Cliente de teste', '379.374.920-74', '(54) 991873014', 'cliente@teste.com', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE `tb_fornecedor` (
  `idFornecedor` int(9) NOT NULL,
  `nomeFornecedor` varchar(255) NOT NULL,
  `telefoneFornecedor` varchar(16) NOT NULL,
  `emailFornecedor` varchar(255) NOT NULL,
  `cepFornecedor` varchar(9) NOT NULL,
  `estadoFornecedor` varchar(2) NOT NULL,
  `cidadeFornecedor` varchar(255) NOT NULL,
  `bairroFornecedor` varchar(255) NOT NULL,
  `ruaFornecedor` varchar(255) NOT NULL,
  `numeroFornecedor` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`idFornecedor`, `nomeFornecedor`, `telefoneFornecedor`, `emailFornecedor`, `cepFornecedor`, `estadoFornecedor`, `cidadeFornecedor`, `bairroFornecedor`, `ruaFornecedor`, `numeroFornecedor`) VALUES
(1, 'Bigolin Materiais de ConstruÃ§Ã£o', '(54) 35201411', 'bigolin@bigolin.com.br', '99700-398', 'RS', 'Erechim', 'Centro', 'Rua Nelson Ehlers', 81),
(2, 'Carvalho Materiais de ConstruÃ§Ã£o e Acabamentos', '(54) 35222700', 'carvalho@carvalho.com.br', '99700-432', 'RS', 'Erechim', 'Centro', 'Rua Marcos OchÃ´a', 253),
(3, 'Esquadrias Michelin', '(54) 33211097', 'esquadrias@michelin.com.br', '99700-400', 'RS', 'Erechim', 'Centro', 'Rua Carlos Kehlers', 386),
(4, 'Lojas taQi', '(54) 35226092', 'lojas@taqi.com.br', '99700-036', 'RS', 'Erechim', 'Centro', 'Avenida Germano Hoffmann', 89),
(5, 'Lojas Quero-Quero', '(54) 35204500', 'lojas@queroquero.com.br', '99700-428', 'RS', 'Erechim', 'Centro', 'PraÃ§a JÃºlio de Castilhos', 129),
(6, 'Redemac Griebler', '(54) 33211140', 'redemac@griebler.com.br', '99700-438', 'RS', 'Erechim', 'Centro', 'Rua JoÃ£o Massignam', 192),
(7, 'Tonin Busetto', '(54) 35221848', 'tonin@busetto.com.br', '99700-438', 'RS', 'Erechim', 'Centro', 'Rua JoÃ£o Massignam', 265),
(8, 'Fornecedor de Teste', '(54) 991873014', 'fornecedor@teste.com', '99700-428', 'RS', 'Erechim', 'Centro', 'PraÃ§a JÃºlio de Castilhos', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_imagem`
--

CREATE TABLE `tb_imagem` (
  `idImagem` int(9) NOT NULL,
  `nomeImagem` varchar(255) NOT NULL,
  `idServico` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_imagem`
--

INSERT INTO `tb_imagem` (`idImagem`, `nomeImagem`, `idServico`) VALUES
(1, 'cozinha1.jpg', 1),
(2, 'cozinha2.jpg', 1),
(3, 'cozinha1.jpg', 2),
(4, 'cozinha1.jpg', 3),
(5, 'cozinha2.jpg', 3),
(6, 'cozinha1.jpg', 4),
(7, 'cozinha1.jpg', 6),
(8, 'cozinha1.jpg', 9),
(9, 'cozinha2.jpg', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item_servico`
--

CREATE TABLE `tb_item_servico` (
  `idItemServico` int(9) NOT NULL,
  `idServico` int(9) NOT NULL,
  `descricaoItemServico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_item_servico`
--

INSERT INTO `tb_item_servico` (`idItemServico`, `idServico`, `descricaoItemServico`) VALUES
(9, 1, 'Colocar lajota na cozinha'),
(10, 1, 'Pintar a cozinha'),
(11, 2, 'Item 1'),
(12, 2, 'Item 2'),
(13, 2, 'item 3'),
(14, 3, 'Item 1'),
(15, 3, 'Item 2'),
(16, 4, 'Item 1'),
(17, 4, 'Item 2'),
(18, 5, 'Item 1'),
(19, 5, 'Item 2'),
(20, 6, 'Item 1'),
(21, 7, 'Item 2'),
(22, 8, 'Item 1'),
(23, 9, 'item');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_materiais_servico`
--

CREATE TABLE `tb_materiais_servico` (
  `idMaterialServico` int(9) NOT NULL,
  `idMaterial` int(9) NOT NULL,
  `idServico` int(9) NOT NULL,
  `quantidadeTotalMateriais` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_materiais_servico`
--

INSERT INTO `tb_materiais_servico` (`idMaterialServico`, `idMaterial`, `idServico`, `quantidadeTotalMateriais`) VALUES
(10, 8, 1, 1),
(11, 20, 1, 1),
(12, 15, 1, 1),
(13, 1, 2, 1),
(14, 18, 3, 2),
(15, 15, 4, 1),
(16, 15, 5, 3),
(17, 13, 6, 2),
(18, 15, 7, 1),
(19, 15, 8, 2),
(20, 19, 9, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_material`
--

CREATE TABLE `tb_material` (
  `idMaterial` int(9) NOT NULL,
  `idFornecedor` int(9) NOT NULL,
  `nomeMaterial` varchar(255) NOT NULL,
  `marcaMaterial` varchar(255) NOT NULL,
  `valorUnitarioMaterial` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_material`
--

INSERT INTO `tb_material` (`idMaterial`, `idFornecedor`, `nomeMaterial`, `marcaMaterial`, `valorUnitarioMaterial`) VALUES
(1, 2, 'Cimento TAO 50kg CPII Z 32R', 'Votoran', '19.90'),
(2, 1, 'Telha Ondulada De Fibrocimento 244x110cm 5mm Residencial Cinza', 'Brasilit', '37.90'),
(3, 4, 'Cimento CP II Z 32 50kg', 'Nacional', '18.90'),
(4, 5, 'Bloco CerÃ¢mico 11,5x14x24cm', 'Nova Conquista', '0.59'),
(5, 6, 'Areia Media Ensacada 20kg', 'AB Areias', '3.49'),
(6, 7, 'Telha Cumeeira De CerÃ¢mica 41x26cm Vermelha Resinada', 'Barrobello', '1.89'),
(7, 3, 'Escada Extensiva De AlumÃ­nio 2-15 degraus', 'Botafogo', '719.90'),
(8, 1, 'Telha Romana De CerÃ¢mica 40x23cm 10mm Realeza Vermelha Resinada', 'Barrobello', '1.19'),
(9, 4, 'Manta LÃ­quida Impermeabilizante 15kg', 'Bautech', '219.90'),
(10, 5, 'Manta LÃ­quida 18kg Branca', 'Quartzolit', '189.90'),
(11, 1, 'Cola Para RodapÃ© Pote 1kg', 'Santa Luzia', '35.91'),
(12, 6, 'Gesso 1kg', 'Argos', '1.99'),
(13, 2, 'Resina Acrilica Multiuso Acqua 900ml Incolor', 'Hydronorth', '19.90'),
(14, 6, 'Pedra Ensacada 20kg', 'AB Areias', '3.49'),
(15, 7, 'Adesivo Resinado Durepoxi 50g Branco', 'Loctite', '6.29'),
(16, 4, 'Resina AcrÃ­lica Base Ãgua Incolor 3,6lt', 'Suvinil', '107.91'),
(17, 5, 'Impermeabilizante Para Parede 18kg', 'Quartzolit', '189.90'),
(18, 1, 'Cola Prego Liquido 400g', 'Quartzolit', '41.90'),
(19, 2, 'Espuma Expansiva 500ml', 'Cascola', '46.90'),
(20, 2, 'Cimento Comum 1kg', 'Argos', '1.99'),
(21, 8, 'Material de teste', 'Teste', '1.99'),
(22, 8, 'Material de teste', 'Teste', '1.98');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servico`
--

CREATE TABLE `tb_servico` (
  `idServico` int(9) NOT NULL,
  `idCliente` int(9) NOT NULL,
  `tipoServico` varchar(255) NOT NULL,
  `dataServico` varchar(255) NOT NULL,
  `statusServico` varchar(255) NOT NULL,
  `cepServico` varchar(9) NOT NULL,
  `estadoServico` varchar(2) NOT NULL,
  `cidadeServico` varchar(255) NOT NULL,
  `bairroServico` varchar(255) NOT NULL,
  `ruaServico` varchar(255) NOT NULL,
  `numeroServico` int(9) NOT NULL,
  `valorMaoDeObraServico` decimal(10,2) NOT NULL,
  `valorMaterialServico` decimal(10,2) NOT NULL,
  `comprovantePagamentoServico` varchar(255) NOT NULL,
  `statusPagamentoServico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_servico`
--

INSERT INTO `tb_servico` (`idServico`, `idCliente`, `tipoServico`, `dataServico`, `statusServico`, `cepServico`, `estadoServico`, `cidadeServico`, `bairroServico`, `ruaServico`, `numeroServico`, `valorMaoDeObraServico`, `valorMaterialServico`, `comprovantePagamentoServico`, `statusPagamentoServico`) VALUES
(1, 17, 'Reforma', '02/07/2019 - 02/07/2019', 'ConcluÃ­do', '99704-254', 'RS', 'Erechim', 'Linho', 'Rua Francisco Ferdinando Losina', 20, '399.99', '0.00', 'comprovante.png', 'Em anÃ¡lise'),
(2, 1, 'ConstruÃ§Ã£o', '02/07/2019 - 02/07/2019', 'Em andamento', '99700-036', 'RS', 'Erechim', 'Centro', 'Avenida Germano Hoffmann', 20, '20.00', '0.00', '', 'ServiÃ§o ainda nÃ£o concluÃ­do'),
(3, 2, 'ManutenÃ§Ã£o ElÃ©trica', '02/07/2019 - 02/07/2019', 'Aceito', '99700-438', 'RS', 'Erechim', 'Centro', 'Rua JoÃ£o Massignam', 20, '100.00', '0.00', '', 'ServiÃ§o ainda nÃ£o concluÃ­do'),
(4, 3, 'ManutenÃ§Ã£o HidrÃ¡ulica', '01/07/2019 - 02/07/2019', 'Aguardando aprovaÃ§Ã£o do cliente', '99700-400', 'RS', 'Erechim', 'Centro', 'Rua Carlos Kehlers', 14, '50.00', '0.00', '', 'ServiÃ§o ainda nÃ£o concluÃ­do'),
(5, 4, 'ConstruÃ§Ã£o', '30/06/2019 - 01/07/2019', 'Cancelado/Recusado', '99700-438', 'RS', 'Erechim', 'Centro', 'Rua JoÃ£o Massignam', 877, '999.99', '0.00', '', 'ServiÃ§o ainda nÃ£o concluÃ­do'),
(6, 7, 'Reforma', '02/07/2019 - 02/07/2019', 'ConcluÃ­do', '99700-036', 'RS', 'Erechim', 'Centro', 'Avenida Germano Hoffmann', 11, '99.99', '0.00', '', 'ServiÃ§o ainda nÃ£o concluÃ­do'),
(7, 12, 'ConstruÃ§Ã£o', '02/07/2019 - 02/07/2019', 'Aguardando retorno da construtora', '99700-036', 'RS', 'Erechim', 'Centro', 'Avenida Germano Hoffmann', 20, '99.99', '0.00', '', 'ServiÃ§o ainda nÃ£o concluÃ­do'),
(8, 6, 'ManutenÃ§Ã£o ElÃ©trica', '02/07/2019 - 02/07/2019', 'Aguardando aprovaÃ§Ã£o do cliente', '99704-254', 'RS', 'Erechim', 'Linho', 'Rua Francisco Ferdinando Losina', 13, '42.35', '0.00', '', 'ServiÃ§o ainda nÃ£o concluÃ­do'),
(9, 10, 'ManutenÃ§Ã£o ElÃ©trica', '02/07/2019 - 02/07/2019', 'Cancelado/Recusado', '99700-438', 'RS', 'Erechim', 'Centro', 'Rua JoÃ£o Massignam', 2, '10.11', '0.00', '', 'ServiÃ§o ainda nÃ£o concluÃ­do');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  ADD PRIMARY KEY (`idFornecedor`);

--
-- Indexes for table `tb_imagem`
--
ALTER TABLE `tb_imagem`
  ADD PRIMARY KEY (`idImagem`);

--
-- Indexes for table `tb_item_servico`
--
ALTER TABLE `tb_item_servico`
  ADD PRIMARY KEY (`idItemServico`),
  ADD KEY `fk_tb_checklist_servico_tb_servico1_idx` (`idServico`);

--
-- Indexes for table `tb_materiais_servico`
--
ALTER TABLE `tb_materiais_servico`
  ADD PRIMARY KEY (`idMaterialServico`),
  ADD KEY `fk_tb_materiais_servico_tb_material1_idx` (`idMaterial`),
  ADD KEY `fk_tb_materiais_servico_tb_servico1_idx` (`idServico`);

--
-- Indexes for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`idMaterial`),
  ADD KEY `fk_material_fornecedor_idx` (`idFornecedor`);

--
-- Indexes for table `tb_servico`
--
ALTER TABLE `tb_servico`
  ADD PRIMARY KEY (`idServico`),
  ADD KEY `fkCliente` (`idCliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `idAdmin` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `idCliente` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  MODIFY `idFornecedor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_imagem`
--
ALTER TABLE `tb_imagem`
  MODIFY `idImagem` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_item_servico`
--
ALTER TABLE `tb_item_servico`
  MODIFY `idItemServico` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_materiais_servico`
--
ALTER TABLE `tb_materiais_servico`
  MODIFY `idMaterialServico` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `idMaterial` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_servico`
--
ALTER TABLE `tb_servico`
  MODIFY `idServico` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_item_servico`
--
ALTER TABLE `tb_item_servico`
  ADD CONSTRAINT `fk_tb_checklist_servico_tb_servico1` FOREIGN KEY (`idServico`) REFERENCES `tb_servico` (`idServico`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_materiais_servico`
--
ALTER TABLE `tb_materiais_servico`
  ADD CONSTRAINT `fk_tb_materiais_servico_tb_material1` FOREIGN KEY (`idMaterial`) REFERENCES `tb_material` (`idMaterial`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_materiais_servico_tb_servico1` FOREIGN KEY (`idServico`) REFERENCES `tb_servico` (`idServico`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_material`
--
ALTER TABLE `tb_material`
  ADD CONSTRAINT `fk_material_fornecedor` FOREIGN KEY (`idFornecedor`) REFERENCES `tb_fornecedor` (`idFornecedor`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_servico`
--
ALTER TABLE `tb_servico`
  ADD CONSTRAINT `fkCliente` FOREIGN KEY (`idCliente`) REFERENCES `tb_cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
