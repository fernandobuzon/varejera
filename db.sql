-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: rdo
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `baixa`
--

DROP TABLE IF EXISTS `baixa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `baixa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `motivo` varchar(250) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_baixa_produto` (`id_produto`),
  KEY `fk_baixa_integrante` (`id_integrante`),
  CONSTRAINT `fk_baixa_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_baixa_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='Baixas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `banda`
--

DROP TABLE IF EXISTS `banda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_genero` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `contato` varchar(100) DEFAULT NULL,
  `link` varchar(240) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_banda_genero` (`id_genero`),
  CONSTRAINT `fk_banda_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Bandas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `consig`
--

DROP TABLE IF EXISTS `consig`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_parceiro` int(11) NOT NULL,
  `obs` varchar(500) NOT NULL,
  `baixado` tinyint(1) NOT NULL DEFAULT '0',
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_consig_integrante` (`id_integrante`),
  KEY `fk_consig_produto` (`id_produto`),
  KEY `fk_consig_parceiro` (`id_parceiro`),
  CONSTRAINT `fk_consig_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_consig_parceiro` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id`),
  CONSTRAINT `fk_consig_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COMMENT='Consignações';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `conta`
--

DROP TABLE IF EXISTS `conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `detalhes` varchar(240) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Contas Financeiras';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `despesa`
--

DROP TABLE IF EXISTS `despesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `despesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Despesas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `entrada`
--

DROP TABLE IF EXISTS `entrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `qtde` int(11) NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `ocasiao` varchar(200) DEFAULT NULL,
  `id_parceiro` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL DEFAULT '0.00',
  `fiado` tinyint(1) NOT NULL DEFAULT '0',
  `quitado` date DEFAULT NULL,
  `obs` varchar(300) DEFAULT NULL,
  `recebido` tinyint(1) NOT NULL DEFAULT '0',
  `id_troca` int(11) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_entrada_parceiro` (`id_parceiro`),
  KEY `fk_entrada_integrante` (`id_integrante`),
  KEY `fk_entrada_produto` (`id_produto`),
  KEY `fk_entrada_troca` (`id_troca`),
  CONSTRAINT `fk_entrada_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_entrada_parceiro` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id`),
  CONSTRAINT `fk_entrada_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  CONSTRAINT `fk_entrada_troca` FOREIGN KEY (`id_troca`) REFERENCES `troca` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1 PACK_KEYS=0 COMMENT='Entrada de produtos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `estudio`
--

DROP TABLE IF EXISTS `estudio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estudio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) NOT NULL,
  `contato` varchar(240) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Estúdios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) NOT NULL,
  `data` date NOT NULL,
  `local` varchar(240) NOT NULL,
  `horario` varchar(15) NOT NULL,
  `ingresso` decimal(11,2) NOT NULL DEFAULT '0.00',
  `concluido` tinyint(4) NOT NULL DEFAULT '0',
  `apagado` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Eventos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Gêneros';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `gravacao`
--

DROP TABLE IF EXISTS `gravacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gravacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_estudio` int(11) NOT NULL,
  `id_banda` int(11) NOT NULL,
  `nome` varchar(240) NOT NULL,
  `data_i` date NOT NULL,
  `data_f` date DEFAULT NULL,
  `valor` decimal(11,2) NOT NULL DEFAULT '0.00',
  `obs` varchar(10000) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_gravacao_estudio` (`id_estudio`),
  KEY `fk_gravacao_banda` (`id_banda`),
  CONSTRAINT `fk_gravacao_banda` FOREIGN KEY (`id_banda`) REFERENCES `banda` (`id`),
  CONSTRAINT `fk_gravacao_estudio` FOREIGN KEY (`id_estudio`) REFERENCES `estudio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Gravações';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `integrante`
--

DROP TABLE IF EXISTS `integrante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `integrante` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_integrante_conta` (`id_conta`),
  CONSTRAINT `fk_integrante_conta` FOREIGN KEY (`id_conta`) REFERENCES `conta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=20 COMMENT='Integrantes da Distro/Banda';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `investimento`
--

DROP TABLE IF EXISTS `investimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `obs` varchar(250) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_investimento_integrante` (`id_integrante`),
  CONSTRAINT `fk_investimento_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COMMENT='Investimentos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mov_conta`
--

DROP TABLE IF EXISTS `mov_conta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mov_conta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_conta_orig` int(11) NOT NULL,
  `id_conta_dest` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_mov_conta_integrante` (`id_integrante`),
  KEY `fk_mov_conta_orig` (`id_conta_orig`),
  KEY `fk_mov_conta_dest` (`id_conta_dest`),
  CONSTRAINT `fk_mov_conta_dest` FOREIGN KEY (`id_conta_dest`) REFERENCES `conta` (`id`),
  CONSTRAINT `fk_mov_conta_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_mov_conta_orig` FOREIGN KEY (`id_conta_orig`) REFERENCES `conta` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 PACK_KEYS=0 COMMENT='Movimentação entre contas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mov_despesa`
--

DROP TABLE IF EXISTS `mov_despesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mov_despesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_despesa` int(11) NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL DEFAULT '0.00',
  `pg` tinyint(1) NOT NULL DEFAULT '1',
  `id_saida` int(11) DEFAULT NULL,
  `obs` varchar(240) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_mov_despesa_despesa` (`id_despesa`),
  KEY `fk_mov_despesa_integrante` (`id_integrante`),
  KEY `fk_mov_despesa_saida` (`id_saida`),
  CONSTRAINT `fk_mov_despesa_despesa` FOREIGN KEY (`id_despesa`) REFERENCES `despesa` (`id`),
  CONSTRAINT `fk_mov_despesa_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_mov_despesa_saida` FOREIGN KEY (`id_saida`) REFERENCES `saida` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 PACK_KEYS=0 COMMENT='Movimentação de Despesas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mov_produto`
--

DROP TABLE IF EXISTS `mov_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mov_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_integrante_dest` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_mov_produto_integrante` (`id_integrante`),
  KEY `fk_mov_produto_integrante_dest` (`id_integrante_dest`),
  KEY `fk_mov_produto_produto` (`id_produto`),
  CONSTRAINT `fk_mov_produto_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  CONSTRAINT `fk_mov_produto_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_mov_produto_integrante_dest` FOREIGN KEY (`id_integrante_dest`) REFERENCES `integrante` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Movimentação entre integrantes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pagamento`
--

DROP TABLE IF EXISTS `pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_gravacao` int(11) NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(11,2) NOT NULL DEFAULT '0.00',
  `apagado` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_pagamento_gravacao` (`id_gravacao`),
  KEY `fk_pagamento_integrante` (`id_integrante`),
  CONSTRAINT `fk_pagamento_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_pagamento_gravacao` FOREIGN KEY (`id_gravacao`) REFERENCES `gravacao` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `parceiro`
--

DROP TABLE IF EXISTS `parceiro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parceiro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) NOT NULL,
  `contato` varchar(240) DEFAULT NULL,
  `endereco` varchar(240) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `distro` int(1) NOT NULL DEFAULT '0',
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1 COMMENT='Parceiros de negociações';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patrocinador`
--

DROP TABLE IF EXISTS `patrocinador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patrocinador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) NOT NULL,
  `contato` varchar(240) DEFAULT NULL,
  `link` varchar(240) DEFAULT NULL,
  `endereco` varchar(240) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COMMENT='Patrocinadores';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `patrocinio`
--

DROP TABLE IF EXISTS `patrocinio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patrocinio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_patrocinador` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL DEFAULT '0.00',
  `pg` tinyint(4) NOT NULL DEFAULT '0',
  `obs` varchar(1000) NOT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `id_producao` int(11) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_patrocinio_integrante` (`id_integrante`),
  KEY `fk_patrocinio_patrocinador` (`id_patrocinador`),
  KEY `fk_patrocinio_evento` (`id_evento`),
  KEY `fk_patrocinio_producao` (`id_producao`),
  CONSTRAINT `fk_patrocinio_producao` FOREIGN KEY (`id_producao`) REFERENCES `producao` (`id`),
  CONSTRAINT `fk_patrocinio_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`),
  CONSTRAINT `fk_patrocinio_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_patrocinio_patrocinador` FOREIGN KEY (`id_patrocinador`) REFERENCES `patrocinador` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Patrocínios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `producao`
--

DROP TABLE IF EXISTS `producao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apagado` tinyint(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Produções';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `id_banda` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `obs` varchar(200) DEFAULT NULL,
  `apagado` tinyint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `fk_produto_tipo` (`id_tipo`),
  KEY `fk_produto_banda` (`id_banda`),
  CONSTRAINT `fk_produto_banda` FOREIGN KEY (`id_banda`) REFERENCES `banda` (`id`),
  CONSTRAINT `fk_produto_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=32 COMMENT='Cadastro de produtos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `retirada`
--

DROP TABLE IF EXISTS `retirada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `retirada` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtde` int(11) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_retirada_integrante` (`id_integrante`),
  KEY `fk_retirada_produto` (`id_produto`),
  CONSTRAINT `fk_retirada_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_retirada_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1 PACK_KEYS=0 COMMENT='Retirada de produtos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reuniao`
--

DROP TABLE IF EXISTS `reuniao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reuniao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `ata` varchar(10000) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_reuniao_evento` (`id_evento`),
  CONSTRAINT `fk_reuniao_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Reuniões';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `saida`
--

DROP TABLE IF EXISTS `saida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `qtde` int(11) NOT NULL DEFAULT '1',
  `id_integrante` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `ocasiao` varchar(200) DEFAULT NULL,
  `id_parceiro` int(11) NOT NULL,
  `valor` decimal(11,2) NOT NULL DEFAULT '0.00',
  `fiado` tinyint(1) NOT NULL DEFAULT '0',
  `quitado` date DEFAULT NULL,
  `obs` varchar(300) DEFAULT NULL,
  `id_troca` int(11) DEFAULT NULL,
  `id_consig` int(11) DEFAULT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idx_saida_produto` (`id_produto`),
  KEY `fk_saida_integrante` (`id_integrante`),
  KEY `fk_saida_parceiro` (`id_parceiro`),
  KEY `fk_saida_troca` (`id_troca`),
  KEY `fk_saida_consig` (`id_consig`),
  CONSTRAINT `fk_saida_consig` FOREIGN KEY (`id_consig`) REFERENCES `consig` (`id`),
  CONSTRAINT `fk_saida_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_saida_parceiro` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id`),
  CONSTRAINT `fk_saida_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`),
  CONSTRAINT `fk_saida_troca` FOREIGN KEY (`id_troca`) REFERENCES `troca` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=106 COMMENT='Saída de produtos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tarefa`
--

DROP TABLE IF EXISTS `tarefa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `andamento` varchar(10000) NOT NULL,
  `conclusao` date DEFAULT NULL,
  `valor_pg` decimal(11,2) NOT NULL DEFAULT '0.00',
  `valor_total` decimal(11,2) NOT NULL DEFAULT '0.00',
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_tarefa_integrante` (`id_integrante`),
  KEY `fk_tarefa_evento` (`id_evento`),
  CONSTRAINT `fk_tarefa_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`),
  CONSTRAINT `fk_tarefa_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Tarefas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(240) NOT NULL,
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Tipo de produtos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `troca`
--

DROP TABLE IF EXISTS `troca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `id_integrante` int(11) NOT NULL,
  `id_parceiro` int(11) NOT NULL,
  `pago` decimal(11,2) NOT NULL DEFAULT '0.00',
  `recebido` decimal(11,2) NOT NULL DEFAULT '0.00',
  `apagado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_troca_integrante` (`id_integrante`),
  KEY `fk_troca_parceiro` (`id_parceiro`),
  CONSTRAINT `fk_troca_integrante` FOREIGN KEY (`id_integrante`) REFERENCES `integrante` (`id`),
  CONSTRAINT `fk_troca_parceiro` FOREIGN KEY (`id_parceiro`) REFERENCES `parceiro` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COMMENT='Troca de produtos';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-15 20:00:04
