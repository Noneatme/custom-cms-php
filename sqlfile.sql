-- MySQL dump 10.13  Distrib 5.1.73, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Noneatme_dbs_propstei
-- ------------------------------------------------------
-- Server version	5.1.73-1

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
-- Table structure for table `tblbenutzer`
--

DROP TABLE IF EXISTS `tblbenutzer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblbenutzer` (
  `BenutzerID` int(11) NOT NULL AUTO_INCREMENT,
  `Benutzername` varchar(200) NOT NULL DEFAULT '-',
  `Passwort` varchar(200) NOT NULL DEFAULT '-',
  `PasswortSalt` varchar(50) NOT NULL DEFAULT '-' COMMENT 'Salz fuer das Passwort',
  `RechteGemeinde` varchar(254) NOT NULL COMMENT 'Gemeinderechte der Person',
  `RechteGlobal` varchar(254) NOT NULL COMMENT 'Globale Rechte',
  `RechteFuerGemeinden` varchar(254) NOT NULL COMMENT 'Betreute Gemeinden.',
  PRIMARY KEY (`BenutzerID`),
  UNIQUE KEY `Benutzername` (`Benutzername`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblbenutzer`
--


--
-- Table structure for table `tblgemeinde`
--

DROP TABLE IF EXISTS `tblgemeinde`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblgemeinde` (
  `GemID` int(3) NOT NULL AUTO_INCREMENT,
  `Name` varchar(35) DEFAULT NULL,
  `Adresse` varchar(55) DEFAULT NULL,
  `Telefon` varchar(25) DEFAULT NULL,
  `Fax` varchar(25) DEFAULT NULL,
  `Informationen` text NOT NULL,
  `Kirchenvorstand` text NOT NULL,
  `UeberPLZ` varchar(64) NOT NULL,
  PRIMARY KEY (`GemID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgemeinde`
--


--
-- Table structure for table `tblgemeindeneuigkeiten`
--

DROP TABLE IF EXISTS `tblgemeindeneuigkeiten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblgemeindeneuigkeiten` (
  `NeuigkeitID` int(11) NOT NULL AUTO_INCREMENT,
  `GemeindeID` int(11) NOT NULL,
  `Titel` varchar(200) NOT NULL,
  `Inhalt` text NOT NULL,
  `Datum` varchar(55) NOT NULL DEFAULT '- - -' COMMENT 'Varchar, da man DATE schlecht Interpretieren kann',
  PRIMARY KEY (`NeuigkeitID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgemeindeneuigkeiten`
--


--
-- Table structure for table `tblort`
--

DROP TABLE IF EXISTS `tblort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblort` (
  `PLZ` int(6) NOT NULL,
  `Ort` varchar(35) NOT NULL DEFAULT '',
  `Anzeigen` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Ort`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblort`
--


--
-- Table structure for table `tblpersonendaten`
--

DROP TABLE IF EXISTS `tblpersonendaten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblpersonendaten` (
  `PersID` int(13) NOT NULL,
  `EMail` varchar(55) NOT NULL DEFAULT '-',
  `Telefon` varchar(25) NOT NULL DEFAULT '-',
  `Anrede` varchar(35) NOT NULL DEFAULT '-',
  `Vorname` varchar(55) NOT NULL DEFAULT '-',
  `Nachname` varchar(55) NOT NULL DEFAULT '-',
  `PLZ` int(6) NOT NULL DEFAULT '0',
  `Adresse` varchar(125) NOT NULL DEFAULT '-',
  `Fax` varchar(25) NOT NULL,
  `LastSeen` varchar(64) NOT NULL DEFAULT '-',
  PRIMARY KEY (`PersID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpersonendaten`
--

--
-- Table structure for table `tblsystem`
--

DROP TABLE IF EXISTS `tblsystem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblsystem` (
  `Hauptseite` text NOT NULL,
  `WirUeberUns` text NOT NULL,
  `Impressum` text NOT NULL,
  `LinksText` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsystem`
--

LOCK TABLES `tblsystem` WRITE;
/*!40000 ALTER TABLE `tblsystem` DISABLE KEYS */;
INSERT INTO `tblsystem` VALUES ('<center><br /> Willkommen auf dem Internetauftritt der Propstei Bad Gandersheim! Klicken Sie auf einen Menuepunkt auf der linken Seite. Falls Sie einen Benutzeraccount besitzen, koennen Sie sich auf dem Unteren Teil dieser Website einloggen.</center><center></center>\r\n<p>&nbsp;</p>\r\n<h2><strong>Aktuelles: </strong></h2>\r\n<p><strong>23. September 2014: &nbsp;</strong></p>\r\n<p>Einloggfehler behoben, alle Personen k&ouml;nnen sich nun wieder richtig einloggen.</p>\r\n<p>Au&szlig;erdem wurden folgende &Auml;nderungen vorgenommen:</p>\r\n<p>- Neues Design</p>\r\n<p>- Benutzeraccounts aktualisiert</p>\r\n<p>- Fehler behoben, indem die ausgew&auml;hlte Gemeinde nicht beim Klick auf \"Impressum\" unregistriert wird</p>\r\n<p>- Neuen Text-Editor f&uuml;r Beitr&auml;ge und Bearbeitungen in der Administrationsoberfl&auml;che hinzugef&uuml;gt</p>\r\n<p>- Systemadministrationsoberfl&auml;che hinzugef&uuml;gt f&uuml;r Systemadministratoren</p>\r\n<p>-&gt; Logs Hinzugef&uuml;gt</p>\r\n<p>-&gt; Datenbankmanagement hinzugef&uuml;gt</p>\r\n<h3>24. September 2014:</h3>\r\n<p>- Protokollfunktion aktiviert</p>\r\n<p>-&gt; Protokolle Hochladen, Betrachten, Entfernen, Schreiben</p>\r\n<p>-&gt; Mit Benutzerrechten</p>\r\n<p>&nbsp;</p>\r\n<p>Folgendes funktioniert noch <span style=\"text-decoration: underline;\"><strong>nicht und wird noch gemacht:&nbsp;</strong></span></p>\r\n<p>&nbsp;</p>','Diese Seite steht momentan leer.<br>\r\nSie kann in der AdminstrationsoberflÃ¤che geÃ¤ndert werden.<br>												','<h3 id=\"impressum\">Ihr pers&ouml;nliches Impressum</h3>\r\n<h1>Impressum</h1>\r\n<p>Angaben gem&auml;&szlig; &sect; 5 TMG:<br /><br /></p>\r\n<p>Herr Max Mustermann<br /> Musteradresse<br /> Mustertelefon<br /> Musterinternetseite</p>\r\n<h2>Vertreten durch:</h2>\r\n<p>[Vertreten durch: Max Mustermann]</p>\r\n<h2>Kontakt:</h2>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>Telefon: -</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>Telefax: -</p>\r\n</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p>E-Mail: -</p>\r\n</td>\r\n<td>&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<h2>Verantwortlich f&uuml;r den Inhalt nach &sect; 55 Abs. 2 RStV:</h2>\r\n<p>**********************<br /> **********************<br /> **********************<br /> <br /> **********************<br /> **********************<br /> **********************</p>\r\n<p>&nbsp;</p>\r\n<p>Quelle: <em><a href=\"http://www.e-recht24.de/impressum-generator.html\" rel=\"nofollow\">http://www.e-recht24.de</a></em></p>\r\n<h3 id=\"disclaimer\">Ihr pers&ouml;nlicher Disclaimer:</h3>\r\n<h1>Haftungsausschluss (Disclaimer)</h1>\r\n<p><strong>Haftung f&uuml;r Inhalte</strong></p>\r\n<p>Als Diensteanbieter sind wir gem&auml;&szlig; &sect; 7 Abs.1 TMG f&uuml;r eigene Inhalte auf diesen Seiten nach den allgemeinen Gesetzen verantwortlich. Nach &sect;&sect; 8 bis 10 TMG sind wir als Diensteanbieter jedoch nicht verpflichtet, &uuml;bermittelte oder gespeicherte fremde Informationen zu &uuml;berwachen oder nach Umst&auml;nden zu forschen, die auf eine rechtswidrige T&auml;tigkeit hinweisen. Verpflichtungen zur Entfernung oder Sperrung der Nutzung von Informationen nach den allgemeinen Gesetzen bleiben hiervon unber&uuml;hrt. Eine diesbez&uuml;gliche Haftung ist jedoch erst ab dem Zeitpunkt der Kenntnis einer konkreten Rechtsverletzung m&ouml;glich. Bei Bekanntwerden von entsprechenden Rechtsverletzungen werden wir diese Inhalte umgehend entfernen.</p>\r\n<p><strong>Haftung f&uuml;r Links</strong></p>\r\n<p>Unser Angebot enth&auml;lt Links zu externen Webseiten Dritter, auf deren Inhalte wir keinen Einfluss haben. Deshalb k&ouml;nnen wir f&uuml;r diese fremden Inhalte auch keine Gew&auml;hr &uuml;bernehmen. F&uuml;r die Inhalte der verlinkten Seiten ist stets der jeweilige Anbieter oder Betreiber der Seiten verantwortlich. Die verlinkten Seiten wurden zum Zeitpunkt der Verlinkung auf m&ouml;gliche Rechtsverst&ouml;&szlig;e &uuml;berpr&uuml;ft. Rechtswidrige Inhalte waren zum Zeitpunkt der Verlinkung nicht erkennbar. Eine permanente inhaltliche Kontrolle der verlinkten Seiten ist jedoch ohne konkrete Anhaltspunkte einer Rechtsverletzung nicht zumutbar. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Links umgehend entfernen.</p>\r\n<p><strong>Urheberrecht</strong></p>\r\n<p>Die durch die Seitenbetreiber erstellten Inhalte und Werke auf diesen Seiten unterliegen dem deutschen Urheberrecht. Die Vervielf&auml;ltigung, Bearbeitung, Verbreitung und jede Art der Verwertung au&szlig;erhalb der Grenzen des Urheberrechtes bed&uuml;rfen der schriftlichen Zustimmung des jeweiligen Autors bzw. Erstellers. Downloads und Kopien dieser Seite sind nur f&uuml;r den privaten, nicht kommerziellen Gebrauch gestattet. Soweit die Inhalte auf dieser Seite nicht vom Betreiber erstellt wurden, werden die Urheberrechte Dritter beachtet. Insbesondere werden Inhalte Dritter als solche gekennzeichnet. Sollten Sie trotzdem auf eine Urheberrechtsverletzung aufmerksam werden, bitten wir um einen entsprechenden Hinweis. Bei Bekanntwerden von Rechtsverletzungen werden wir derartige Inhalte umgehend entfernen.</p>\r\n<p><em>Quellenangaben: <a href=\"http://www.e-recht24.de/muster-disclaimer.html\" target=\"_blank\" rel=\"nofollow\">eRecht24 Disclaimer</a>, <a href=\"http://www.e-recht24.de/muster-disclaimer.html\" target=\"_blank\" rel=\"nofollow\">eRecht24 Disclaimer</a></em></p>\r\n<h3 id=\"disclaimer\">Ihre pers&ouml;nliche Datenschutzerkl&auml;rung:</h3>\r\n<h1>Datenschutzerkl&auml;rung:</h1>\r\n<p><strong>Datenschutz</strong></p>\r\n<p>Die Nutzung unserer Webseite ist in der Regel ohne Angabe personenbezogener Daten m&ouml;glich. Soweit auf unseren Seiten personenbezogene Daten (beispielsweise Name, Anschrift oder eMail-Adressen) erhoben werden, erfolgt dies, soweit m&ouml;glich, stets auf freiwilliger Basis. Diese Daten werden ohne Ihre ausdr&uuml;ckliche Zustimmung nicht an Dritte weitergegeben.</p>\r\n<p>Wir weisen darauf hin, dass die Daten&uuml;bertragung im Internet (z.B. bei der Kommunikation per E-Mail) Sicherheitsl&uuml;cken aufweisen kann. Ein l&uuml;ckenloser Schutz der Daten vor dem Zugriff durch Dritte ist nicht m&ouml;glich.</p>\r\n<p>Der Nutzung von im Rahmen der Impressumspflicht ver&ouml;ffentlichten Kontaktdaten durch Dritte zur &Uuml;bersendung von nicht ausdr&uuml;cklich angeforderter Werbung und Informationsmaterialien wird hiermit ausdr&uuml;cklich widersprochen. Die Betreiber der Seiten behalten sich ausdr&uuml;cklich rechtliche Schritte im Falle der unverlangten Zusendung von Werbeinformationen, etwa durch Spam-Mails, vor.</p>\r\n<p>&nbsp;<strong>Daten, die gesammelt Werden</strong></p>\r\n<p>Falls Sie sie auf dieser Website einen Benutzeraccount besitzen, werden die pers&ouml;nlichen Angaben von Ihnen (Name, Adresse, Wohnort, Telefonnummere, Fax, E-Mail) in unserer Datenbank gespeichert und genaustens Kontrolliert. Die Daten werde nicht an andere Personen, Unternehmen oder Organisatoren weitergegeben.<br />Zu Sicherheitszwecken wird jede Aktivt&auml;t des Benutzers genaustens Protokolliert. Dazu wird au&szlig;erdem Ihre IP-Adresse, mit der sie die Aktivit&auml;t im Rahmen Ihres Benutzerkontos t&auml;tigen, aufgezeichnet. Die Protokolle k&ouml;nnen ausschlie&szlig;lich vom Systemadministrator eingesehen werden und werden nicht an dritte weitergegeben.</p>\r\n<p><em>Quellenangaben: <a href=\"http://www.e-recht24.de/muster-datenschutzerklaerung.html\" target=\"_blank\" rel=\"nofollow\">eRecht24 Datenschutzerkl&auml;rung</a></em></p>','<center style=\"font-size: 11px; font-weight: normal;\"></center>\r\n<h2>Diese Seite steht momentan leer.</h2>\r\n<h4>Sie kann in der Administrationsoberfl&auml;che ge&auml;ndert werden.</h4>\r\n<p style=\"font-size: 11px; font-weight: normal;\">&nbsp;</p>');
/*!40000 ALTER TABLE `tblsystem` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-23 14:48:30
