-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 05-Dez-2017 às 16:26
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Attacks`
--

CREATE TABLE `Attacks` (
  `attack_name` varchar(30) NOT NULL,
  `attack_attack` int(11) DEFAULT NULL,
  `attack_damage` int(11) DEFAULT NULL,
  `attack_range` int(11) DEFAULT NULL,
  `attack_ammo` int(11) DEFAULT NULL,
  `attack_used` int(11) DEFAULT NULL,
  `Character_char_name` varchar(45) NOT NULL,
  `Character_char_playername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Attacks`
--

INSERT INTO `Attacks` (`attack_name`, `attack_attack`, `attack_damage`, `attack_range`, `attack_ammo`, `attack_used`, `Character_char_name`, `Character_char_playername`) VALUES
('Madruga\'s Crush-A-Head\'s Oblit', 999999, 9999999, 1, 999999, 0, 'Seu Madruga', 'usuario1'),
('Madruga\'s Painful Pinch On The', 99999999, 99999999, 1, 99999, 0, 'Seu Madruga', 'usuario1'),
('Round House Kick', 99999999, 999999999, 999999999, 999999999, 0, 'Chuck Norris', 'usuario1'),
('Susanoo', 9999999, 99999999, 99999999, 0, 0, 'Uchiha Madara', 'usuario2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Attributes`
--

CREATE TABLE `Attributes` (
  `att_strength` int(11) DEFAULT '0',
  `att_dexterity` int(11) DEFAULT '0',
  `att_constituition` int(11) DEFAULT '0',
  `att_intelligence` int(11) DEFAULT '0',
  `att_wisdom` int(11) DEFAULT '0',
  `att_charisma` int(11) DEFAULT '0',
  `att_inspiration` int(11) NOT NULL,
  `att_proficiencybonus` int(11) NOT NULL,
  `att_passiveperception` int(11) NOT NULL,
  `Character_char_name` varchar(45) NOT NULL,
  `Character_char_playername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Attributes`
--

INSERT INTO `Attributes` (`att_strength`, `att_dexterity`, `att_constituition`, `att_intelligence`, `att_wisdom`, `att_charisma`, `att_inspiration`, `att_proficiencybonus`, `att_passiveperception`, `Character_char_name`, `Character_char_playername`) VALUES
(11, 10, 14, 9, 11, 16, 9999, 9, 9, 'Chuck Norris', 'usuario1'),
(18, 18, 18, 18, 18, 18, 999, 999, 999, 'Seu Madruga', 'usuario1'),
(15, 3, 3, 9, 12, 17, 0, 0, 0, 'Uchiha Madara', 'usuario2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Character`
--

CREATE TABLE `Character` (
  `char_name` varchar(45) NOT NULL,
  `char_level` int(11) NOT NULL,
  `char_class` varchar(45) NOT NULL,
  `char_background` varchar(45) NOT NULL,
  `char_playername` varchar(45) NOT NULL,
  `char_exppoints` int(11) NOT NULL,
  `char_alignment` varchar(45) NOT NULL,
  `char_advgroup` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Character`
--

INSERT INTO `Character` (`char_name`, `char_level`, `char_class`, `char_background`, `char_playername`, `char_exppoints`, `char_alignment`, `char_advgroup`) VALUES
('Chuck Norris', 99999, 'Deus', 'Ranger', 'usuario1', 2147483647, 'Neutro neutro Neutro', 'Matador de Deuses'),
('Seu Madruga', 999, 'Humano Supremo', 'Trabalhador desempregado', 'usuario1', 99999, 'Neutro CaÃ³tico', 'Vila do Chaves'),
('Uchiha Madara', 99, 'Ninja', 'Putasso', 'usuario2', 999, 'CaÃ³tico pra caralho', 'ClÃ£ Uchiha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Features`
--

CREATE TABLE `Features` (
  `features_information` varchar(800) DEFAULT NULL,
  `Character_char_name` varchar(45) NOT NULL,
  `Character_char_playername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Features`
--

INSERT INTO `Features` (`features_information`, `Character_char_name`, `Character_char_playername`) VALUES
('InvencÃ­vel|\"NÃ£o preciso falar nada aos perdedores\"|', 'Chuck Norris', 'usuario1'),
('', 'Seu Madruga', 'usuario1'),
('\"HASHIRAMAAAAAAA\"|', 'Uchiha Madara', 'usuario2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `InventAndEquip`
--

CREATE TABLE `InventAndEquip` (
  `equip_c` varchar(45) DEFAULT NULL,
  `equip_s` varchar(45) DEFAULT NULL,
  `equip_e` varchar(45) DEFAULT NULL,
  `equip_g` varchar(45) DEFAULT NULL,
  `equip_p` varchar(45) DEFAULT NULL,
  `equip_information` varchar(800) DEFAULT NULL,
  `Character_char_name` varchar(45) NOT NULL,
  `Character_char_playername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `InventAndEquip`
--

INSERT INTO `InventAndEquip` (`equip_c`, `equip_s`, `equip_e`, `equip_g`, `equip_p`, `equip_information`, `Character_char_name`, `Character_char_playername`) VALUES
('9999999', '999999', '999999', '999999', '999999', 'MÃ£o limpa|', 'Chuck Norris', 'usuario1'),
('0', '0', '0', '0', '0', '', 'Seu Madruga', 'usuario1'),
('0', '0', '0', '0', '0', 'Puta lequÃ£o daora do carai|', 'Uchiha Madara', 'usuario2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Player`
--

CREATE TABLE `Player` (
  `player_login` varchar(15) NOT NULL,
  `player_email` varchar(60) NOT NULL,
  `player_pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Player`
--

INSERT INTO `Player` (`player_login`, `player_email`, `player_pwd`) VALUES
('1234', '1234@1234', '1234'),
('usuario1', 'user@user', '1234'),
('usuario2', '11@11', '1234');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ProfAndLang`
--

CREATE TABLE `ProfAndLang` (
  `profandlang_information` varchar(800) DEFAULT NULL,
  `Character_char_name` varchar(45) NOT NULL,
  `Character_char_playername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ProfAndLang`
--

INSERT INTO `ProfAndLang` (`profandlang_information`, `Character_char_name`, `Character_char_playername`) VALUES
('', 'Chuck Norris', 'usuario1'),
('Faz tudo|', 'Seu Madruga', 'usuario1'),
('', 'Uchiha Madara', 'usuario2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SavingThrows`
--

CREATE TABLE `SavingThrows` (
  `sv_strength` int(11) DEFAULT NULL,
  `sv_dexterity` int(11) DEFAULT NULL,
  `sv_constituition` varchar(45) DEFAULT NULL,
  `sv_intelligence` int(11) DEFAULT NULL,
  `sv_wisdom` int(11) DEFAULT NULL,
  `sv_charisma` int(11) DEFAULT NULL,
  `Character_char_name` varchar(45) NOT NULL,
  `Character_char_playername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `SavingThrows`
--

INSERT INTO `SavingThrows` (`sv_strength`, `sv_dexterity`, `sv_constituition`, `sv_intelligence`, `sv_wisdom`, `sv_charisma`, `Character_char_name`, `Character_char_playername`) VALUES
(9, 9, '9', 9, 9, 0, 'Chuck Norris', 'usuario1'),
(999, 999, '999', 999, 999, 999, 'Seu Madruga', 'usuario1'),
(26, 65, '65', 65, 65, 1, 'Uchiha Madara', 'usuario2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Skills`
--

CREATE TABLE `Skills` (
  `skills_acrobatics` int(11) DEFAULT '0',
  `skills_animalhand` int(11) DEFAULT '0',
  `skills_arcana` int(11) DEFAULT '0',
  `skills_athletics` int(11) DEFAULT '0',
  `skills_decepticon` int(11) DEFAULT '0',
  `skills_history` int(11) DEFAULT '0',
  `skills_insight` int(11) DEFAULT '0',
  `skills_intimidation` int(11) DEFAULT '0',
  `skills_investigation` int(11) DEFAULT '0',
  `skills_medicine` int(11) DEFAULT '0',
  `skills_nature` int(11) DEFAULT '0',
  `skills_percepticon` int(11) DEFAULT '0',
  `skills_performance` int(11) DEFAULT '0',
  `skills_persuasion` int(11) DEFAULT '0',
  `skills_religion` int(11) DEFAULT '0',
  `skills_sleightofhand` int(11) DEFAULT '0',
  `skills_stealth` int(11) DEFAULT '0',
  `skills_survival` int(11) DEFAULT '0',
  `Character_char_name` varchar(45) NOT NULL,
  `Character_char_playername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Skills`
--

INSERT INTO `Skills` (`skills_acrobatics`, `skills_animalhand`, `skills_arcana`, `skills_athletics`, `skills_decepticon`, `skills_history`, `skills_insight`, `skills_intimidation`, `skills_investigation`, `skills_medicine`, `skills_nature`, `skills_percepticon`, `skills_performance`, `skills_persuasion`, `skills_religion`, `skills_sleightofhand`, `skills_stealth`, `skills_survival`, `Character_char_name`, `Character_char_playername`) VALUES
(0, 9, 9, 9, 9, 0, 9, 0, 9, 99, 9, 9, 99, 99, 99, 9, 9, 9, 'Chuck Norris', 'usuario1'),
(0, 999, 999, 999, 999, 999, 999, 999, 999, 999, 999, 999, 999, 999, 999, 999, 999, 997, 'Seu Madruga', 'usuario1'),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Uchiha Madara', 'usuario2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Status`
--

CREATE TABLE `Status` (
  `status_currenthitpoints` int(11) DEFAULT NULL,
  `status_armorclass` int(11) DEFAULT NULL,
  `status_maxhp` int(11) DEFAULT NULL,
  `status_temphp` int(11) DEFAULT NULL,
  `status_initiate` int(11) DEFAULT NULL,
  `status_speed` int(11) DEFAULT NULL,
  `status_vision` int(11) DEFAULT NULL,
  `Character_char_name` varchar(45) NOT NULL,
  `Character_char_playername` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Status`
--

INSERT INTO `Status` (`status_currenthitpoints`, `status_armorclass`, `status_maxhp`, `status_temphp`, `status_initiate`, `status_speed`, `status_vision`, `Character_char_name`, `Character_char_playername`) VALUES
(9, 99, 9, 99, 999999, 99999999, 99999999, 'Chuck Norris', 'usuario1'),
(10000, 20, 100, 100, 999, 999, 999, 'Seu Madruga', 'usuario1'),
(200, 999, 99, 99, 99, 99, 10000, 'Uchiha Madara', 'usuario2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attacks`
--
ALTER TABLE `Attacks`
  ADD PRIMARY KEY (`attack_name`,`Character_char_name`,`Character_char_playername`),
  ADD KEY `fk_Attacks_Character1_idx` (`Character_char_name`,`Character_char_playername`);

--
-- Indexes for table `Attributes`
--
ALTER TABLE `Attributes`
  ADD PRIMARY KEY (`Character_char_name`,`Character_char_playername`);

--
-- Indexes for table `Character`
--
ALTER TABLE `Character`
  ADD PRIMARY KEY (`char_name`,`char_playername`),
  ADD KEY `fk_Character_1_idx` (`char_playername`);

--
-- Indexes for table `Features`
--
ALTER TABLE `Features`
  ADD PRIMARY KEY (`Character_char_name`,`Character_char_playername`);

--
-- Indexes for table `InventAndEquip`
--
ALTER TABLE `InventAndEquip`
  ADD PRIMARY KEY (`Character_char_name`,`Character_char_playername`);

--
-- Indexes for table `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`player_login`),
  ADD UNIQUE KEY `player_email_UNIQUE` (`player_email`);

--
-- Indexes for table `ProfAndLang`
--
ALTER TABLE `ProfAndLang`
  ADD PRIMARY KEY (`Character_char_name`,`Character_char_playername`);

--
-- Indexes for table `SavingThrows`
--
ALTER TABLE `SavingThrows`
  ADD PRIMARY KEY (`Character_char_name`,`Character_char_playername`);

--
-- Indexes for table `Skills`
--
ALTER TABLE `Skills`
  ADD PRIMARY KEY (`Character_char_name`,`Character_char_playername`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`Character_char_name`,`Character_char_playername`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Attacks`
--
ALTER TABLE `Attacks`
  ADD CONSTRAINT `fk_Attacks_Character1` FOREIGN KEY (`Character_char_name`,`Character_char_playername`) REFERENCES `Character` (`char_name`, `char_playername`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Attributes`
--
ALTER TABLE `Attributes`
  ADD CONSTRAINT `fk_Attributes_Character1` FOREIGN KEY (`Character_char_name`,`Character_char_playername`) REFERENCES `Character` (`char_name`, `char_playername`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Character`
--
ALTER TABLE `Character`
  ADD CONSTRAINT `fk_Character_1` FOREIGN KEY (`char_playername`) REFERENCES `Player` (`player_login`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Features`
--
ALTER TABLE `Features`
  ADD CONSTRAINT `fk_Features_Character1` FOREIGN KEY (`Character_char_name`,`Character_char_playername`) REFERENCES `Character` (`char_name`, `char_playername`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `InventAndEquip`
--
ALTER TABLE `InventAndEquip`
  ADD CONSTRAINT `fk_InventAndEquip_Character1` FOREIGN KEY (`Character_char_name`,`Character_char_playername`) REFERENCES `Character` (`char_name`, `char_playername`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ProfAndLang`
--
ALTER TABLE `ProfAndLang`
  ADD CONSTRAINT `fk_ProfAndLang_Character1` FOREIGN KEY (`Character_char_name`,`Character_char_playername`) REFERENCES `Character` (`char_name`, `char_playername`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `SavingThrows`
--
ALTER TABLE `SavingThrows`
  ADD CONSTRAINT `fk_SavingThrows_Character1` FOREIGN KEY (`Character_char_name`,`Character_char_playername`) REFERENCES `Character` (`char_name`, `char_playername`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Skills`
--
ALTER TABLE `Skills`
  ADD CONSTRAINT `fk_Skills_Character1` FOREIGN KEY (`Character_char_name`,`Character_char_playername`) REFERENCES `Character` (`char_name`, `char_playername`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Status`
--
ALTER TABLE `Status`
  ADD CONSTRAINT `fk_Status_Character1` FOREIGN KEY (`Character_char_name`,`Character_char_playername`) REFERENCES `Character` (`char_name`, `char_playername`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
