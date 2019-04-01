CREATE DATABASE  IF NOT EXISTS `recruit` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `recruit`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: recruit
-- ------------------------------------------------------
-- Server version	5.5.59

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
-- Table structure for table `educationqual`
--

DROP TABLE IF EXISTS `educationqual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educationqual` (
  `userId` int(11) NOT NULL,
  `instiId` int(11) NOT NULL,
  `qualId` int(11) NOT NULL,
  `aggregate` decimal(4,2) NOT NULL,
  PRIMARY KEY (`userId`,`instiId`,`qualId`),
  KEY `edQualToInsti_idx` (`instiId`),
  KEY `edQualToQual_idx` (`qualId`),
  CONSTRAINT `edQualToInsti` FOREIGN KEY (`instiId`) REFERENCES `institute` (`instiId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `edQualToUser` FOREIGN KEY (`userId`) REFERENCES `employeeinfo` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `edQualToQual` FOREIGN KEY (`qualId`) REFERENCES `qualification` (`qualId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `educationqual` WRITE;
/*!40000 ALTER TABLE `educationqual` DISABLE KEYS */;
/*!40000 ALTER TABLE `educationqual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eeapplied`
--

DROP TABLE IF EXISTS `eeapplied`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eeapplied` (
  `jobId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `description` varchar(500) NOT NULL DEFAULT '',
  `salary` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`jobId`,`userId`),
  KEY `jobId_idx` (`jobId`),
  KEY `appliedToEmployee_idx` (`userId`),
  CONSTRAINT `appliedToJob` FOREIGN KEY (`jobId`) REFERENCES `job` (`jobId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `appliedToEmployee` FOREIGN KEY (`userId`) REFERENCES `employeeinfo` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `eeapplied` WRITE;
/*!40000 ALTER TABLE `eeapplied` DISABLE KEYS */;
/*!40000 ALTER TABLE `eeapplied` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeeinfo`
--

DROP TABLE IF EXISTS `employeeinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeeinfo` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `dob` date NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userId_UNIQUE` (`userId`),
  UNIQUE KEY `userName_UNIQUE` (`userName`),
  CONSTRAINT `eeInfoToLogin` FOREIGN KEY (`userName`) REFERENCES `logininfo` (`userName`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `employeeinfo` WRITE;
/*!40000 ALTER TABLE `employeeinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `employeeinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employerinfo`
--

DROP TABLE IF EXISTS `employerinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employerinfo` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `orgId` int(11) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userName_UNIQUE` (`userName`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `contact_UNIQUE` (`contact`),
  KEY `emprToOrg_idx` (`orgId`),
  CONSTRAINT `emprToOrg` FOREIGN KEY (`orgId`) REFERENCES `organization` (`orgId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `emprToLogin` FOREIGN KEY (`userName`) REFERENCES `logininfo` (`userName`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `employerinfo` WRITE;
/*!40000 ALTER TABLE `employerinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `employerinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experience`
--

DROP TABLE IF EXISTS `experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experience` (
  `expId` int(11) NOT NULL AUTO_INCREMENT,
  `startDate` date NOT NULL,
  `userId` int(11) NOT NULL,
  `endDate` date DEFAULT NULL,
  `jobType` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `isEmployed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`expId`,`userId`),
  UNIQUE KEY `expId_UNIQUE` (`expId`),
  KEY `expToUserId_idx` (`userId`),
  CONSTRAINT `expToUserId` FOREIGN KEY (`userId`) REFERENCES `employeeinfo` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `experience` WRITE;
/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expskill`
--

DROP TABLE IF EXISTS `expskill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expskill` (
  `expId` int(11) NOT NULL,
  `skillId` int(11) NOT NULL,
  PRIMARY KEY (`expId`,`skillId`),
  KEY `expSkillToSkill_idx` (`skillId`),
  CONSTRAINT `expSkillToExp` FOREIGN KEY (`expId`) REFERENCES `experience` (`expId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `expSkillToSkill` FOREIGN KEY (`skillId`) REFERENCES `skill` (`skillId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `expskill` WRITE;
/*!40000 ALTER TABLE `expskill` DISABLE KEYS */;
/*!40000 ALTER TABLE `expskill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instiqual`
--

DROP TABLE IF EXISTS `instiqual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instiqual` (
  `instiId` int(11) NOT NULL,
  `qualId` int(11) NOT NULL,
  PRIMARY KEY (`instiId`,`qualId`),
  KEY `instiQualToQual_idx` (`qualId`),
  CONSTRAINT `instiQualToInsti` FOREIGN KEY (`instiId`) REFERENCES `institute` (`instiId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `instiQualToQual` FOREIGN KEY (`qualId`) REFERENCES `qualification` (`qualId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `instiqual` WRITE;
/*!40000 ALTER TABLE `instiqual` DISABLE KEYS */;
/*!40000 ALTER TABLE `instiqual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institute`
--

DROP TABLE IF EXISTS `institute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institute` (
  `instiId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY (`instiId`),
  UNIQUE KEY `instiId_UNIQUE` (`instiId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `institute` WRITE;
/*!40000 ALTER TABLE `institute` DISABLE KEYS */;
/*!40000 ALTER TABLE `institute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date DEFAULT NULL,
  `salary` int(11) NOT NULL DEFAULT '0',
  `location` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`jobId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobby`
--

DROP TABLE IF EXISTS `jobby`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobby` (
  `jobId` int(11) NOT NULL,
  `employerID` int(11) NOT NULL,
  PRIMARY KEY (`jobId`,`employerID`),
  KEY `jobByToEmprInfo_idx` (`employerID`),
  CONSTRAINT `jobByToJob` FOREIGN KEY (`jobId`) REFERENCES `job` (`jobId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jobByToEmprInfo` FOREIGN KEY (`employerID`) REFERENCES `employerinfo` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jobby` WRITE;
/*!40000 ALTER TABLE `jobby` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobskill`
--

DROP TABLE IF EXISTS `jobskill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobskill` (
  `skillId` int(11) NOT NULL,
  `jobId` int(11) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`skillId`,`jobId`),
  KEY `jobSkillToJob_idx` (`jobId`),
  CONSTRAINT `jobSkillToSkill` FOREIGN KEY (`skillId`) REFERENCES `skill` (`skillId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `jobSkillToJob` FOREIGN KEY (`jobId`) REFERENCES `job` (`jobId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `jobskill` WRITE;
/*!40000 ALTER TABLE `jobskill` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobskill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logininfo`
--

DROP TABLE IF EXISTS `logininfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logininfo` (
  `userName` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`userName`),
  UNIQUE KEY `userName_UNIQUE` (`userName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `logininfo` WRITE;
/*!40000 ALTER TABLE `logininfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `logininfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `orgId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `addr` varchar(300) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`orgId`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `contact_UNIQUE` (`contact`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualification`
--

DROP TABLE IF EXISTS `qualification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualification` (
  `qualId` int(11) NOT NULL AUTO_INCREMENT,
  `degree` varchar(50) NOT NULL,
  `domain` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`qualId`),
  UNIQUE KEY `qualId_UNIQUE` (`qualId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `qualification` WRITE;
/*!40000 ALTER TABLE `qualification` DISABLE KEYS */;
/*!40000 ALTER TABLE `qualification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `skill` (
  `skillId` int(11) NOT NULL AUTO_INCREMENT,
  `skill` varchar(45) NOT NULL,
  PRIMARY KEY (`skillId`),
  UNIQUE KEY `skillId_UNIQUE` (`skillId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userskill`
--

DROP TABLE IF EXISTS `userskill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userskill` (
  `userId` int(11) NOT NULL,
  `skillId` int(11) NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`,`skillId`),
  KEY `userSkillToSkill_idx` (`skillId`),
  CONSTRAINT `userSkillToUser` FOREIGN KEY (`userId`) REFERENCES `employeeinfo` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `userSkillToSkill` FOREIGN KEY (`skillId`) REFERENCES `skill` (`skillId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `userskill` WRITE;
/*!40000 ALTER TABLE `userskill` DISABLE KEYS */;
/*!40000 ALTER TABLE `userskill` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
