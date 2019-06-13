-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2019 às 03:08
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
  `login` varchar(200) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`idAdmin`, `login`, `senha`) VALUES
(1, 'admin', '$2y$10$sN/bZUu4gCDVQ4UcKK3ZLeGvPZloRYLPmTBvFVftzKmVha5doBFhK');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carta_cobranca`
--

CREATE TABLE `tb_carta_cobranca` (
  `idCartaCobranca` int(9) NOT NULL,
  `idServico` int(9) NOT NULL,
  `vencimentoCartaCobranca` date NOT NULL,
  `descricaoCartaCobranca` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_checklist_servico`
--

CREATE TABLE `tb_checklist_servico` (
  `idChecklistServico` int(9) NOT NULL,
  `idServico` int(9) NOT NULL,
  `descricaoChecklistServico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'LetÃ­cia Luiza Caldeira', '373.853.200-58', '(61) 991217644', 'leticialuizacaldeira@cfaraujo.eng.br', ''),
(2, 'Isis Fabiana Campos', '252.479.124-62', '(27) 989330359', 'isisfabianacampos@prodam.am.gov.br', ''),
(3, 'Carlos Fernando Lopes', '479.106.683-92', '(31) 994253919', 'carlosfernandolopes-73@kaynak.com.br', ''),
(4, 'Juan Mateus Nunes', '132.486.495-85', '(84) 989974960', 'juanmateusnunes@djapan.com.br', ''),
(5, 'Bento Benjamin Juan Viana', '175.824.532-80', '(68) 987924492', 'bentobenjaminjuanviana-88@rafaeladson.com', ''),
(6, 'Gabrielly Evelyn Bianca da Costa', '398.638.088-49', '(86) 992862747', 'gabriellyevelynbiancadacosta@fictor.com.br', ''),
(7, 'Igor Lorenzo Vieira', '830.174.095-70', '(63) 985402768', 'igorlorenzovieira-72@itelefonica.com.br', ''),
(8, 'Raimundo MÃ¡rio Danilo Nogueira', '198.320.048-45', '(95) 997608404', 'raimundomariodanilonogueira@verdana.com.br', ''),
(9, 'Luiza Francisca Monteir', '107.816.220-42', '(11) 999904925', 'luizafranciscamonteiro_@nextel.com.br', ''),
(10, 'OtÃ¡vio Marcos Fernando Pires', '483.487.302-14', '(82) 982720798', 'otaviomarcosfernandopires@bds.com.br', ''),
(11, 'Vitor Eduardo BenÃ­cio Jesus', '906.727.415-12', '(21) 992607206', 'vitoreduardobeniciojesus@advogadosempresariais.com.br', ''),
(12, 'Raquel Laura Rocha', '204.799.444-66', '204.799.444-66', 'raquellaurarocha@otlokk.com', ''),
(13, 'Vinicius Thomas Ruan AragÃ£o', '210.269.918-89', '210.269.918-89', 'viniciusthomasruanaragao-88@yahool.com', ''),
(14, 'Carla LetÃ­cia Bernardes', '794.467.853-67', '794.467.853-67', 'ccarlaleticiabernardes@tecvap.com.br', ''),
(15, 'Elza Luiza dos Santos', '466.755.193-36', '466.755.193-36', 'elzaluizadossantos@novadeliveri.com.br', '');

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
(7, 'Tonin Busetto', '(54) 35221848', 'tonin@busetto.com.br', '99700-438', 'RS', 'Erechim', 'Centro', 'Rua JoÃ£o Massignam', 265);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_materiais_servico`
--

CREATE TABLE `tb_materiais_servico` (
  `idMaterialServico` int(9) NOT NULL,
  `idMaterial` int(9) NOT NULL,
  `idServico` int(9) NOT NULL,
  `quantidadeTotalMateriais` int(9) NOT NULL,
  `valorTotalMaterial` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 2, 'Cimento Todas As Obras 50kg CPII Z 32R', 'Votoran', '19.90'),
(2, 1, 'Telha Ondulada De Fibrocimento 244x110cm 5mm Residencial Cinza', 'Brasilit', '37.90'),
(3, 4, 'Cimento CP II Z 32 50kg', 'Nacional', '18.90'),
(4, 5, 'Bloco CerÃ¢mico 11,5x14x24cm', 'Nova Conquista', '0.59'),
(5, 6, 'Areia Media Ensacada 20kg', 'AB Areias', '3.49'),
(6, 7, 'Telha Cumeeira De CerÃ¢mica 41x26cm Vermelha Resinada', 'Barrobello', '1.79'),
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
(21, 1, 'Gesso 20kg', 'Argos', '21.90');

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
  `metroQuadradoServico` varchar(255) NOT NULL,
  `valorMaoDeObraServico` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `tb_carta_cobranca`
--
ALTER TABLE `tb_carta_cobranca`
  ADD PRIMARY KEY (`idCartaCobranca`),
  ADD KEY `fk_tb_carta_cobranca_tb_servico1_idx` (`idServico`);

--
-- Indexes for table `tb_checklist_servico`
--
ALTER TABLE `tb_checklist_servico`
  ADD PRIMARY KEY (`idChecklistServico`),
  ADD KEY `fk_tb_checklist_servico_tb_servico1_idx` (`idServico`);

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
-- AUTO_INCREMENT for table `tb_carta_cobranca`
--
ALTER TABLE `tb_carta_cobranca`
  MODIFY `idCartaCobranca` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_checklist_servico`
--
ALTER TABLE `tb_checklist_servico`
  MODIFY `idChecklistServico` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `idCliente` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_fornecedor`
--
ALTER TABLE `tb_fornecedor`
  MODIFY `idFornecedor` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_materiais_servico`
--
ALTER TABLE `tb_materiais_servico`
  MODIFY `idMaterialServico` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `idMaterial` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_servico`
--
ALTER TABLE `tb_servico`
  MODIFY `idServico` int(9) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_carta_cobranca`
--
ALTER TABLE `tb_carta_cobranca`
  ADD CONSTRAINT `fk_tb_carta_cobranca_tb_servico1` FOREIGN KEY (`idServico`) REFERENCES `tb_servico` (`idServico`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_checklist_servico`
--
ALTER TABLE `tb_checklist_servico`
  ADD CONSTRAINT `fk_tb_checklist_servico_tb_servico1` FOREIGN KEY (`idServico`) REFERENCES `tb_servico` (`idServico`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
