/*
Navicat MySQL Data Transfer

Source Server         : Xampp
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : masterbook_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-21 23:29:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `acces_document_scategorie`
-- ----------------------------
DROP TABLE IF EXISTS `acces_document_scategorie`;
CREATE TABLE `acces_document_scategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_scat_doc` int(11) NOT NULL,
  `id_pers` int(11) NOT NULL,
  `id_niveau_doc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of acces_document_scategorie
-- ----------------------------
INSERT INTO `acces_document_scategorie` VALUES ('37', '1', '1', '5');
INSERT INTO `acces_document_scategorie` VALUES ('3', '1', '2', '1');
INSERT INTO `acces_document_scategorie` VALUES ('9', '9', '5', '8');
INSERT INTO `acces_document_scategorie` VALUES ('5', '1', '5', '4');
INSERT INTO `acces_document_scategorie` VALUES ('6', '1', '6', '4');
INSERT INTO `acces_document_scategorie` VALUES ('7', '18', '3', '6');
INSERT INTO `acces_document_scategorie` VALUES ('8', '18', '4', '6');
INSERT INTO `acces_document_scategorie` VALUES ('10', '9', '6', '8');
INSERT INTO `acces_document_scategorie` VALUES ('11', '10', '5', '10');
INSERT INTO `acces_document_scategorie` VALUES ('12', '10', '6', '10');
INSERT INTO `acces_document_scategorie` VALUES ('13', '10', '1', '11');
INSERT INTO `acces_document_scategorie` VALUES ('14', '9', '1', '9');
INSERT INTO `acces_document_scategorie` VALUES ('15', '3', '5', '12');
INSERT INTO `acces_document_scategorie` VALUES ('16', '3', '6', '12');
INSERT INTO `acces_document_scategorie` VALUES ('17', '3', '1', '13');
INSERT INTO `acces_document_scategorie` VALUES ('18', '4', '5', '14');
INSERT INTO `acces_document_scategorie` VALUES ('19', '4', '6', '14');
INSERT INTO `acces_document_scategorie` VALUES ('20', '4', '1', '15');
INSERT INTO `acces_document_scategorie` VALUES ('21', '5', '1', '16');
INSERT INTO `acces_document_scategorie` VALUES ('22', '6', '5', '17');
INSERT INTO `acces_document_scategorie` VALUES ('23', '6', '6', '17');
INSERT INTO `acces_document_scategorie` VALUES ('24', '7', '1', '19');
INSERT INTO `acces_document_scategorie` VALUES ('25', '8', '3', '20');
INSERT INTO `acces_document_scategorie` VALUES ('26', '8', '4', '20');
INSERT INTO `acces_document_scategorie` VALUES ('27', '8', '1', '21');
INSERT INTO `acces_document_scategorie` VALUES ('28', '11', '1', '22');
INSERT INTO `acces_document_scategorie` VALUES ('29', '12', '1', '23');
INSERT INTO `acces_document_scategorie` VALUES ('30', '13', '1', '24');
INSERT INTO `acces_document_scategorie` VALUES ('31', '14', '1', '25');
INSERT INTO `acces_document_scategorie` VALUES ('32', '15', '1', '27');
INSERT INTO `acces_document_scategorie` VALUES ('58', '16', '1', '44');
INSERT INTO `acces_document_scategorie` VALUES ('34', '17', '5', '29');
INSERT INTO `acces_document_scategorie` VALUES ('35', '17', '6', '29');
INSERT INTO `acces_document_scategorie` VALUES ('36', '17', '1', '30');
INSERT INTO `acces_document_scategorie` VALUES ('38', '19', '3', '31');
INSERT INTO `acces_document_scategorie` VALUES ('39', '19', '4', '31');
INSERT INTO `acces_document_scategorie` VALUES ('40', '19', '1', '32');
INSERT INTO `acces_document_scategorie` VALUES ('41', '20', '3', '33');
INSERT INTO `acces_document_scategorie` VALUES ('42', '20', '4', '33');
INSERT INTO `acces_document_scategorie` VALUES ('43', '20', '1', '34');
INSERT INTO `acces_document_scategorie` VALUES ('44', '21', '3', '35');
INSERT INTO `acces_document_scategorie` VALUES ('45', '21', '4', '35');
INSERT INTO `acces_document_scategorie` VALUES ('46', '21', '1', '36');
INSERT INTO `acces_document_scategorie` VALUES ('47', '22', '5', '37');
INSERT INTO `acces_document_scategorie` VALUES ('48', '22', '6', '37');
INSERT INTO `acces_document_scategorie` VALUES ('49', '22', '1', '38');
INSERT INTO `acces_document_scategorie` VALUES ('50', '18', '1', '7');
INSERT INTO `acces_document_scategorie` VALUES ('53', '23', '7', '41');
INSERT INTO `acces_document_scategorie` VALUES ('54', '4', '3', '15');
INSERT INTO `acces_document_scategorie` VALUES ('59', '16', '3', '43');
INSERT INTO `acces_document_scategorie` VALUES ('60', '1', '10', '5');
INSERT INTO `acces_document_scategorie` VALUES ('61', '1', '12', '5');
INSERT INTO `acces_document_scategorie` VALUES ('62', '3', '12', '13');
INSERT INTO `acces_document_scategorie` VALUES ('63', '11', '12', '22');
INSERT INTO `acces_document_scategorie` VALUES ('64', '10', '12', '11');
INSERT INTO `acces_document_scategorie` VALUES ('65', '7', '12', '19');
INSERT INTO `acces_document_scategorie` VALUES ('66', '5', '12', '16');

-- ----------------------------
-- Table structure for `active`
-- ----------------------------
DROP TABLE IF EXISTS `active`;
CREATE TABLE `active` (
  `id_active` int(11) NOT NULL AUTO_INCREMENT,
  `structure` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `date_enr` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_fin` varchar(255) NOT NULL,
  `active` varchar(1) NOT NULL,
  PRIMARY KEY (`id_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of active
-- ----------------------------
INSERT INTO `active` VALUES ('1', 'MasterSolut', 'contact@mastersolut.com', '1', '2017-02-21 19:41:45', '24-02-2017', '1');

-- ----------------------------
-- Table structure for `chat`
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pers` int(11) NOT NULL,
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  `vu` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chat
-- ----------------------------
INSERT INTO `chat` VALUES ('1', '7', '3', 'hello', '2015-02-06 09:31:38', '0', '1', '1');
INSERT INTO `chat` VALUES ('2', '3', '7', 'SLT', '2015-02-06 09:31:45', '0', '1', '1');
INSERT INTO `chat` VALUES ('3', '1', '7', 'Viens dans mon bureau stp', '2015-02-09 09:12:05', '0', '1', '1');
INSERT INTO `chat` VALUES ('4', '1', '7', 'Il faut retourner voir togotelecom', '2015-02-09 09:23:35', '0', '1', '1');
INSERT INTO `chat` VALUES ('5', '3', '7', 'lol', '2015-02-09 09:37:53', '0', '1', '1');
INSERT INTO `chat` VALUES ('6', '7', '3', 'b', '2015-02-09 09:38:24', '0', '1', '1');
INSERT INTO `chat` VALUES ('7', '3', '7', 'nnnnn', '2015-02-09 09:38:52', '0', '1', '1');
INSERT INTO `chat` VALUES ('8', '4', '7', 'test', '2015-02-09 09:43:03', '0', '1', '1');
INSERT INTO `chat` VALUES ('9', '7', '4', 'ces pas toi!!!', '2015-02-09 09:43:27', '0', '1', '1');
INSERT INTO `chat` VALUES ('10', '3', '7', 'BONJOUR', '2015-02-17 10:57:07', '0', '1', '1');
INSERT INTO `chat` VALUES ('11', '7', '3', 'bjr lol cmen va? ton ami la parl trop', '2015-02-17 11:30:54', '0', '1', '1');
INSERT INTO `chat` VALUES ('12', '3', '7', 'ok', '2015-02-18 09:59:20', '0', '1', '1');
INSERT INTO `chat` VALUES ('13', '7', '3', 'vtre chef dit detre a lecoute pr le telphone qe la CEB doit call today pr le contrat parcq les blancs doivent venir pr  la mision la semaine prochaine hihihiihi', '2015-02-25 10:27:46', '0', '1', '1');
INSERT INTO `chat` VALUES ('14', '3', '7', 'bien notÃ© !', '2015-02-25 10:28:36', '0', '1', '1');
INSERT INTO `chat` VALUES ('15', '7', '3', 'merci lol', '2015-02-25 10:30:08', '0', '1', '1');
INSERT INTO `chat` VALUES ('16', '7', '3', 'merci lol', '2015-02-25 10:30:20', '0', '1', '1');
INSERT INTO `chat` VALUES ('17', '7', '3', '', '2015-02-25 10:30:25', '0', '1', '1');
INSERT INTO `chat` VALUES ('18', '7', '3', '', '2015-02-25 10:30:26', '0', '1', '1');
INSERT INTO `chat` VALUES ('19', '7', '3', 'merci lol', '2015-02-25 10:30:34', '0', '1', '1');
INSERT INTO `chat` VALUES ('20', '3', '7', 'slt', '2015-02-27 08:37:27', '0', '1', '0');
INSERT INTO `chat` VALUES ('21', '9', '3', 'bjr', '2015-03-10 09:56:18', '0', '1', '1');
INSERT INTO `chat` VALUES ('22', '3', '9', 'Bienvenue dans eManage !', '2015-03-10 10:01:15', '0', '1', '0');
INSERT INTO `chat` VALUES ('23', '1', '9', 'test', '2015-05-18 10:55:12', '0', '0', '0');
INSERT INTO `chat` VALUES ('24', '1', '9', 'ok', '2015-05-18 10:57:38', '0', '0', '0');
INSERT INTO `chat` VALUES ('25', '1', '9', 'cool', '2015-05-18 10:59:30', '0', '0', '0');
INSERT INTO `chat` VALUES ('26', '1', '3', 'ok cool', '2015-05-18 11:59:25', '0', '1', '1');
INSERT INTO `chat` VALUES ('27', '4', '3', 'slt', '2015-05-18 15:42:26', '0', '1', '1');
INSERT INTO `chat` VALUES ('28', '4', '1', 'ok', '2015-05-18 15:43:18', '0', '1', '1');
INSERT INTO `chat` VALUES ('29', '1', '4', 'bon', '2015-05-18 15:43:27', '0', '1', '1');
INSERT INTO `chat` VALUES ('30', '1', '4', 'ok', '2015-05-28 15:58:45', '0', '1', '1');
INSERT INTO `chat` VALUES ('31', '3', '10', 'Bienvenue sur eManage !', '2015-07-06 14:56:55', '0', '1', '1');
INSERT INTO `chat` VALUES ('32', '10', '4', 'bienvenu sur emanage', '2015-07-06 14:58:05', '0', '1', '1');
INSERT INTO `chat` VALUES ('33', '10', '3', 'jetai lÃ  avant toi dc bienvenu a toi pluto', '2015-07-06 14:58:35', '0', '1', '1');
INSERT INTO `chat` VALUES ('34', '3', '10', 'yolooooo lol', '2015-07-06 14:59:15', '0', '1', '1');
INSERT INTO `chat` VALUES ('35', '10', '3', 'ok looooo', '2015-07-06 15:06:33', '0', '1', '1');
INSERT INTO `chat` VALUES ('36', '1', '10', 'allo', '2015-07-14 09:48:22', '0', '1', '1');
INSERT INTO `chat` VALUES ('37', '1', '10', 'Peux tu venir tout de suite', '2015-07-14 09:48:34', '0', '1', '1');
INSERT INTO `chat` VALUES ('38', '1', '3', 'Je pense que le tchat a soucis', '2015-07-14 09:49:40', '0', '1', '1');
INSERT INTO `chat` VALUES ('39', '1', '3', 'la montre du serveur n\\\'est pas Ã  l\\\'heure', '2015-07-14 09:50:10', '0', '1', '1');
INSERT INTO `chat` VALUES ('40', '10', '1', 'ok j\\\'arrive', '2015-07-14 09:52:31', '0', '1', '0');
INSERT INTO `chat` VALUES ('41', '4', '10', 'slt', '2015-07-14 10:14:36', '0', '1', '1');
INSERT INTO `chat` VALUES ('42', '3', '1', 'Ok, je vais regardÃ© ', '2015-07-14 10:14:56', '0', '1', '1');
INSERT INTO `chat` VALUES ('43', '1', '3', 'Merci', '2015-07-14 10:15:15', '0', '1', '1');
INSERT INTO `chat` VALUES ('44', '10', '4', 'oui slt', '2015-07-14 10:15:32', '0', '1', '1');
INSERT INTO `chat` VALUES ('45', '4', '10', 'ok  tout marche le test', '2015-07-14 10:16:13', '0', '1', '1');
INSERT INTO `chat` VALUES ('46', '10', '4', 'lol', '2015-07-14 09:18:11', '0', '1', '1');
INSERT INTO `chat` VALUES ('47', '10', '3', 'cc', '2015-07-14 09:21:09', '0', '1', '1');
INSERT INTO `chat` VALUES ('48', '3', '10', 'lol', '2015-07-14 09:21:19', '0', '1', '1');
INSERT INTO `chat` VALUES ('49', '3', '10', 'yay', '2015-07-14 09:21:51', '0', '1', '1');
INSERT INTO `chat` VALUES ('50', '3', '4', 'Bjr', '2015-07-14 17:23:27', '0', '1', '1');
INSERT INTO `chat` VALUES ('51', '10', '3', 'moi je trouv kil te dribl san k t n la persoi pa', '2015-07-23 09:30:05', '0', '1', '1');
INSERT INTO `chat` VALUES ('52', '12', '4', 'Slt', '2017-02-15 02:47:12', '0', '0', '0');
INSERT INTO `chat` VALUES ('53', '12', '10', 'ssss', '2017-02-15 02:48:41', '0', '1', '0');
INSERT INTO `chat` VALUES ('54', '12', '10', '', '2017-02-15 02:48:44', '0', '1', '0');
INSERT INTO `chat` VALUES ('55', '12', '10', 'ccc', '2017-02-15 02:49:42', '0', '1', '0');
INSERT INTO `chat` VALUES ('56', '10', '4', 'ok', '2017-02-15 02:52:58', '0', '0', '0');

-- ----------------------------
-- Table structure for `courrier_arrivee`
-- ----------------------------
DROP TABLE IF EXISTS `courrier_arrivee`;
CREATE TABLE `courrier_arrivee` (
  `id_arrivee` int(11) NOT NULL AUTO_INCREMENT,
  `date_arrivee` date NOT NULL,
  `noms_arrivee` varchar(255) CHARACTER SET utf8 NOT NULL,
  `objets_arrivee` varchar(255) CHARACTER SET utf8 NOT NULL,
  `datesurlalettre_arrivee` date NOT NULL,
  `numsurlalettre_arrivee` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fichier_arrivee` varchar(255) NOT NULL,
  `ordre_arrivee` int(11) NOT NULL,
  `enregistreur` int(11) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_arrivee`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of courrier_arrivee
-- ----------------------------
INSERT INTO `courrier_arrivee` VALUES ('1', '2017-02-15', 'Courrier arrivÃ©e', 'Reponse au demande de renouvellement', '2017-02-14', 'CA-1205', '1487175226.pdf', '1', '12', '1');
INSERT INTO `courrier_arrivee` VALUES ('2', '2017-02-15', 'Partipation au sommet de l\' UA', 'Partipation au sommet de l\' UA', '2017-02-13', 'CA-1040', '1487176907.pdf', '1', '12', '1');

-- ----------------------------
-- Table structure for `courrier_depart`
-- ----------------------------
DROP TABLE IF EXISTS `courrier_depart`;
CREATE TABLE `courrier_depart` (
  `id_depart` int(11) NOT NULL AUTO_INCREMENT,
  `date_depart` date NOT NULL,
  `noms_depart` varchar(255) NOT NULL,
  `objets_depart` varchar(255) NOT NULL,
  `nbpieces_depart` int(11) NOT NULL,
  `recepteur_depart` varchar(255) NOT NULL,
  `ordre_depart` int(11) NOT NULL,
  `fichier_depart` varchar(255) NOT NULL,
  `enregistreur` int(11) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_depart`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of courrier_depart
-- ----------------------------
INSERT INTO `courrier_depart` VALUES ('1', '2017-02-07', 'Lettre de demande de renouvellement', 'Revoulementlll', '3', 'Ministere de la pllanification', '1', '11487169971.pdf', '12', '1');
INSERT INTO `courrier_depart` VALUES ('2', '2017-02-15', 'Appel d\'offre', 'Appel d\'offre', '2', 'PASCRENA', '2', '21487171323.pdf', '12', '1');

-- ----------------------------
-- Table structure for `courrier_recommandation`
-- ----------------------------
DROP TABLE IF EXISTS `courrier_recommandation`;
CREATE TABLE `courrier_recommandation` (
  `id_courrier_recommandation` int(11) NOT NULL AUTO_INCREMENT,
  `id_courrier` int(11) NOT NULL,
  `id_pers` int(11) NOT NULL,
  `recommandation` text NOT NULL,
  `type_courrier` varchar(255) NOT NULL,
  PRIMARY KEY (`id_courrier_recommandation`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of courrier_recommandation
-- ----------------------------
INSERT INTO `courrier_recommandation` VALUES ('5', '2', '14', '                                        Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.\r\n                                  \r\n                                  \r\n                  ', 'A');
INSERT INTO `courrier_recommandation` VALUES ('6', '1', '14', '                         ASQS           \r\n                  ', 'A');

-- ----------------------------
-- Table structure for `courrier_scanne`
-- ----------------------------
DROP TABLE IF EXISTS `courrier_scanne`;
CREATE TABLE `courrier_scanne` (
  `id_courrier_scanne` int(11) NOT NULL AUTO_INCREMENT,
  `id_courrier` int(11) NOT NULL,
  `fichier` varchar(255) NOT NULL,
  `libfichier` varchar(255) NOT NULL,
  `type_courrier` varchar(255) NOT NULL,
  PRIMARY KEY (`id_courrier_scanne`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of courrier_scanne
-- ----------------------------

-- ----------------------------
-- Table structure for `departement`
-- ----------------------------
DROP TABLE IF EXISTS `departement`;
CREATE TABLE `departement` (
  `id_departement` int(11) NOT NULL AUTO_INCREMENT,
  `lib_departement` varchar(255) NOT NULL,
  `desc_departement` text NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_departement`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of departement
-- ----------------------------
INSERT INTO `departement` VALUES ('1', 'Departement Informatique', 'departement informatique:Logiciel et reseau', '0', '2014-08-18 17:33:21');
INSERT INTO `departement` VALUES ('2', 'DIRECTION', 'Direction GÃ©nÃ©rale', '1', '2014-08-22 14:01:10');
INSERT INTO `departement` VALUES ('3', 'TECHNIQUE', 'Service Technique', '0', '2014-08-22 14:01:40');
INSERT INTO `departement` VALUES ('4', 'MARKETING & COMMERCIAL', 'Service marketing et commercial', '0', '2014-08-22 14:02:15');
INSERT INTO `departement` VALUES ('5', 'SERVICE', 'Services de l\\\'entreprise', '1', '2014-08-22 16:11:21');
INSERT INTO `departement` VALUES ('6', 'RESSOURCES HUMAINES ET COMPTABILITE', 'Ressources Humaines et ComptabilitÃ©', '1', '2015-03-09 10:25:19');

-- ----------------------------
-- Table structure for `destinataire`
-- ----------------------------
DROP TABLE IF EXISTS `destinataire`;
CREATE TABLE `destinataire` (
  `id_pers` int(11) NOT NULL,
  `id_msg` int(11) NOT NULL,
  `lu` varchar(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id_pers`,`id_msg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of destinataire
-- ----------------------------
INSERT INTO `destinataire` VALUES ('13', '1', 'o');
INSERT INTO `destinataire` VALUES ('12', '2', 'n');
INSERT INTO `destinataire` VALUES ('12', '3', 'n');
INSERT INTO `destinataire` VALUES ('14', '4', 'o');
INSERT INTO `destinataire` VALUES ('14', '5', 'o');
INSERT INTO `destinataire` VALUES ('12', '6', 'o');
INSERT INTO `destinataire` VALUES ('14', '7', 'n');

-- ----------------------------
-- Table structure for `destinataireemailing`
-- ----------------------------
DROP TABLE IF EXISTS `destinataireemailing`;
CREATE TABLE `destinataireemailing` (
  `id_pers` int(11) NOT NULL,
  `id_msg` int(11) NOT NULL,
  `lu` varchar(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id_pers`,`id_msg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of destinataireemailing
-- ----------------------------
INSERT INTO `destinataireemailing` VALUES ('3', '1', 'n');
INSERT INTO `destinataireemailing` VALUES ('13', '1', 'n');
INSERT INTO `destinataireemailing` VALUES ('13', '2', 'n');

-- ----------------------------
-- Table structure for `destinatairesms`
-- ----------------------------
DROP TABLE IF EXISTS `destinatairesms`;
CREATE TABLE `destinatairesms` (
  `id_pers` int(11) NOT NULL,
  `id_msg` int(11) NOT NULL,
  `lu` varchar(1) NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id_pers`,`id_msg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of destinatairesms
-- ----------------------------

-- ----------------------------
-- Table structure for `document`
-- ----------------------------
DROP TABLE IF EXISTS `document`;
CREATE TABLE `document` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_doc` varchar(255) NOT NULL,
  `date_doc` date NOT NULL,
  `fichier_doc` varchar(255) NOT NULL,
  `type_doc` int(11) NOT NULL,
  `etat_doc` varchar(1) NOT NULL DEFAULT 'n',
  `pour_id_niveau_doc` int(11) NOT NULL,
  `par_id_niveau_doc` int(11) NOT NULL,
  `suggestion_doc` text NOT NULL,
  `corriger_doc` varchar(1) NOT NULL DEFAULT 'n',
  `auteur_doc_transfert` int(11) NOT NULL,
  `lastmod` int(11) NOT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document
-- ----------------------------
INSERT INTO `document` VALUES ('1', 'Fiche technique d\\\'administration CIFOP TOGO', '2015-02-18', 'documentpdf/1424255282_3_16.pdf', '16', 'n', '0', '0', '', 'n', '3', '1424257101');
INSERT INTO `document` VALUES ('2', 'Fiche technique d\\\'administration ESAG-ITNDE', '2015-05-13', 'documentpdf/1431511694_3_16.pdf', '16', 'n', '0', '0', '', 'n', '3', '1431515560');
INSERT INTO `document` VALUES ('3', 'okp', '2015-05-28', 'documentpdf/1432815705_1_18.pdf', '18', 'n', '0', '0', '', 'n', '1', '1432815705');

-- ----------------------------
-- Table structure for `document_categorie`
-- ----------------------------
DROP TABLE IF EXISTS `document_categorie`;
CREATE TABLE `document_categorie` (
  `id_cat_doc` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_cat_doc` varchar(255) NOT NULL,
  `indice_cat_doc` int(11) NOT NULL,
  `id_type_doc` int(11) NOT NULL,
  `visible_cat_doc` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_cat_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document_categorie
-- ----------------------------
INSERT INTO `document_categorie` VALUES ('1', 'ActivitÃ©', '1', '1', '1');
INSERT INTO `document_categorie` VALUES ('2', 'RÃ©union', '2', '1', '1');
INSERT INTO `document_categorie` VALUES ('3', 'Mission', '3', '1', '1');
INSERT INTO `document_categorie` VALUES ('4', 'Visites commerciales', '4', '1', '1');
INSERT INTO `document_categorie` VALUES ('5', 'Contrat', '1', '2', '1');
INSERT INTO `document_categorie` VALUES ('6', 'Fiche', '2', '2', '1');
INSERT INTO `document_categorie` VALUES ('7', 'Prestation', '1', '3', '1');

-- ----------------------------
-- Table structure for `document_scategorie`
-- ----------------------------
DROP TABLE IF EXISTS `document_scategorie`;
CREATE TABLE `document_scategorie` (
  `id_scat_doc` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_scat_doc` varchar(255) NOT NULL,
  `fichier_scat_doc` varchar(255) NOT NULL,
  `indice_scat_doc` int(11) NOT NULL,
  `id_cat_doc` int(11) NOT NULL,
  `id_grpe` int(11) NOT NULL,
  `visible_scat_doc` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_scat_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document_scategorie
-- ----------------------------
INSERT INTO `document_scategorie` VALUES ('1', 'DÃ©claration d\\\'une activitÃ©', '1407173968_3_.docx', '1', '1', '7', '1');
INSERT INTO `document_scategorie` VALUES ('3', 'Suivi d\\\'une activitÃ©', '1407174216_3_.docx', '2', '1', '7', '1');
INSERT INTO `document_scategorie` VALUES ('4', 'Rapport d\\\'activitÃ©', '1407174310_3_.docx', '3', '1', '7', '1');
INSERT INTO `document_scategorie` VALUES ('5', 'Convocation de rÃ©union', '1407173860_3_.docx', '1', '2', '5', '1');
INSERT INTO `document_scategorie` VALUES ('6', 'Compte rendu de rÃ©union', '1407173831_3_.docx', '2', '2', '7', '1');
INSERT INTO `document_scategorie` VALUES ('7', 'Ordre de mission', '1407174103_3_.docx', '1', '3', '5', '1');
INSERT INTO `document_scategorie` VALUES ('8', 'Rapport de mission', '1407174199_3_.docx', '2', '3', '7', '1');
INSERT INTO `document_scategorie` VALUES ('9', 'Planning des visites hebdomadaires', '1407174164_3_.docx', '1', '4', '7', '1');
INSERT INTO `document_scategorie` VALUES ('10', 'Suivi d\\\'une visite', '1407340949_3_.docx', '2', '4', '7', '1');
INSERT INTO `document_scategorie` VALUES ('11', 'Contrat d\\\'assistance, de mise Ã  jour et de maintenance de plateforme web', '1407173921_3_.docx', '1', '5', '5', '1');
INSERT INTO `document_scategorie` VALUES ('12', 'Contrat d\\\'achat de nom de domaine et d\\\'hÃ©bergement', '1407173889_3_.docx', '2', '5', '5', '1');
INSERT INTO `document_scategorie` VALUES ('13', 'Contrat de crÃ©ation de plateforme web', '1407173950_3_.docx', '3', '5', '5', '1');
INSERT INTO `document_scategorie` VALUES ('14', 'Fiche de recueil d\\\'informations pour l\\\'achat de nom de domaine et d\\\'hÃ©bergement', '1407174039_3_.docx', '1', '6', '5', '1');
INSERT INTO `document_scategorie` VALUES ('15', ' Fiche de recueil d\\\'informations pour la crÃ©ation d\\\'une plateforme web', '1407174059_3_.docx', '2', '6', '5', '1');
INSERT INTO `document_scategorie` VALUES ('16', 'Fiche technique d\\\'administration d\\\'une plateforme web', '1407174085_3_.docx', '3', '6', '5', '1');
INSERT INTO `document_scategorie` VALUES ('17', 'Fiche de recueil d\\\'informations de besoins technologiques d\\\'une sociÃ©tÃ©', '1407174008_3_.docx', '1', '7', '5', '1');
INSERT INTO `document_scategorie` VALUES ('18', 'DÃ©claration d\\\'une activitÃ©', '1408961495_1_.docx', '1', '1', '6', '1');
INSERT INTO `document_scategorie` VALUES ('19', 'Suivi d\\\'une activitÃ©', '1408963949_1_.docx', '2', '1', '6', '1');
INSERT INTO `document_scategorie` VALUES ('20', 'Rapport d\\\'activitÃ©', '1408964043_1_.docx', '3', '1', '6', '1');
INSERT INTO `document_scategorie` VALUES ('21', 'Compte rendu de rÃ©union', '1408964153_1_.docx', '2', '2', '6', '1');
INSERT INTO `document_scategorie` VALUES ('22', 'Rapport de mission', '1408964238_1_.docx', '2', '3', '6', '1');
INSERT INTO `document_scategorie` VALUES ('23', 'Compte rendu de rÃ©union', '1420829529_1_.docx', '1', '2', '8', '1');

-- ----------------------------
-- Table structure for `document_type`
-- ----------------------------
DROP TABLE IF EXISTS `document_type`;
CREATE TABLE `document_type` (
  `id_type_doc` int(11) NOT NULL AUTO_INCREMENT,
  `intitule_type_doc` varchar(255) NOT NULL,
  `indice_type_doc` int(11) NOT NULL,
  `visible_type_doc` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_type_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of document_type
-- ----------------------------
INSERT INTO `document_type` VALUES ('1', 'Administratif', '1', '1');
INSERT INTO `document_type` VALUES ('2', 'Web', '2', '1');
INSERT INTO `document_type` VALUES ('3', 'Prestation', '3', '1');

-- ----------------------------
-- Table structure for `entre_echange`
-- ----------------------------
DROP TABLE IF EXISTS `entre_echange`;
CREATE TABLE `entre_echange` (
  `id_grpe` int(11) NOT NULL,
  `autre_grpe` int(11) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of entre_echange
-- ----------------------------
INSERT INTO `entre_echange` VALUES ('3', '1', 'sms');
INSERT INTO `entre_echange` VALUES ('3', '4', 'emailing');
INSERT INTO `entre_echange` VALUES ('3', '1', 'emailing');
INSERT INTO `entre_echange` VALUES ('3', '4', 'sms');
INSERT INTO `entre_echange` VALUES ('3', '3', 'sms');
INSERT INTO `entre_echange` VALUES ('3', '2', 'sms');
INSERT INTO `entre_echange` VALUES ('3', '4', 'mail');
INSERT INTO `entre_echange` VALUES ('3', '3', 'mail');
INSERT INTO `entre_echange` VALUES ('3', '2', 'mail');
INSERT INTO `entre_echange` VALUES ('3', '1', 'mail');
INSERT INTO `entre_echange` VALUES ('3', '1', 'chat');
INSERT INTO `entre_echange` VALUES ('3', '2', 'chat');
INSERT INTO `entre_echange` VALUES ('3', '3', 'chat');
INSERT INTO `entre_echange` VALUES ('3', '4', 'chat');
INSERT INTO `entre_echange` VALUES ('7', '7', 'chat');
INSERT INTO `entre_echange` VALUES ('7', '6', 'chat');
INSERT INTO `entre_echange` VALUES ('7', '9', 'mail');
INSERT INTO `entre_echange` VALUES ('7', '8', 'mail');
INSERT INTO `entre_echange` VALUES ('6', '7', 'chat');
INSERT INTO `entre_echange` VALUES ('6', '6', 'chat');
INSERT INTO `entre_echange` VALUES ('6', '9', 'mail');
INSERT INTO `entre_echange` VALUES ('6', '8', 'mail');
INSERT INTO `entre_echange` VALUES ('5', '8', 'chat');
INSERT INTO `entre_echange` VALUES ('5', '7', 'chat');
INSERT INTO `entre_echange` VALUES ('5', '6', 'chat');
INSERT INTO `entre_echange` VALUES ('5', '10', 'mail');
INSERT INTO `entre_echange` VALUES ('8', '7', 'chat');
INSERT INTO `entre_echange` VALUES ('8', '6', 'chat');
INSERT INTO `entre_echange` VALUES ('8', '9', 'mail');
INSERT INTO `entre_echange` VALUES ('8', '8', 'mail');
INSERT INTO `entre_echange` VALUES ('5', '9', 'mail');
INSERT INTO `entre_echange` VALUES ('5', '8', 'mail');
INSERT INTO `entre_echange` VALUES ('6', '5', 'chat');
INSERT INTO `entre_echange` VALUES ('6', '10', 'mail');
INSERT INTO `entre_echange` VALUES ('9', '8', 'sms');
INSERT INTO `entre_echange` VALUES ('9', '7', 'sms');
INSERT INTO `entre_echange` VALUES ('9', '6', 'sms');
INSERT INTO `entre_echange` VALUES ('9', '5', 'sms');
INSERT INTO `entre_echange` VALUES ('9', '10', 'mail');
INSERT INTO `entre_echange` VALUES ('9', '6', 'chat');
INSERT INTO `entre_echange` VALUES ('9', '5', 'chat');
INSERT INTO `entre_echange` VALUES ('9', '10', 'sms');
INSERT INTO `entre_echange` VALUES ('9', '9', 'sms');
INSERT INTO `entre_echange` VALUES ('9', '9', 'mail');
INSERT INTO `entre_echange` VALUES ('9', '8', 'mail');
INSERT INTO `entre_echange` VALUES ('9', '7', 'mail');
INSERT INTO `entre_echange` VALUES ('9', '6', 'mail');
INSERT INTO `entre_echange` VALUES ('9', '5', 'mail');
INSERT INTO `entre_echange` VALUES ('5', '5', 'chat');
INSERT INTO `entre_echange` VALUES ('5', '5', 'sms');
INSERT INTO `entre_echange` VALUES ('7', '5', 'chat');
INSERT INTO `entre_echange` VALUES ('7', '10', 'mail');
INSERT INTO `entre_echange` VALUES ('8', '5', 'chat');
INSERT INTO `entre_echange` VALUES ('8', '10', 'mail');
INSERT INTO `entre_echange` VALUES ('8', '7', 'mail');
INSERT INTO `entre_echange` VALUES ('8', '6', 'mail');
INSERT INTO `entre_echange` VALUES ('8', '5', 'mail');
INSERT INTO `entre_echange` VALUES ('6', '7', 'mail');
INSERT INTO `entre_echange` VALUES ('6', '6', 'mail');
INSERT INTO `entre_echange` VALUES ('6', '5', 'mail');
INSERT INTO `entre_echange` VALUES ('7', '7', 'mail');
INSERT INTO `entre_echange` VALUES ('7', '6', 'mail');
INSERT INTO `entre_echange` VALUES ('7', '5', 'mail');
INSERT INTO `entre_echange` VALUES ('10', '5', 'mail');
INSERT INTO `entre_echange` VALUES ('10', '6', 'mail');
INSERT INTO `entre_echange` VALUES ('10', '7', 'mail');
INSERT INTO `entre_echange` VALUES ('10', '8', 'mail');
INSERT INTO `entre_echange` VALUES ('10', '9', 'mail');
INSERT INTO `entre_echange` VALUES ('10', '10', 'mail');
INSERT INTO `entre_echange` VALUES ('10', '5', 'chat');
INSERT INTO `entre_echange` VALUES ('10', '6', 'chat');
INSERT INTO `entre_echange` VALUES ('10', '7', 'chat');
INSERT INTO `entre_echange` VALUES ('10', '8', 'chat');
INSERT INTO `entre_echange` VALUES ('10', '9', 'chat');
INSERT INTO `entre_echange` VALUES ('10', '10', 'chat');
INSERT INTO `entre_echange` VALUES ('9', '7', 'chat');
INSERT INTO `entre_echange` VALUES ('9', '8', 'chat');
INSERT INTO `entre_echange` VALUES ('9', '9', 'chat');
INSERT INTO `entre_echange` VALUES ('9', '10', 'chat');
INSERT INTO `entre_echange` VALUES ('8', '8', 'chat');
INSERT INTO `entre_echange` VALUES ('8', '9', 'chat');
INSERT INTO `entre_echange` VALUES ('8', '10', 'chat');
INSERT INTO `entre_echange` VALUES ('7', '8', 'chat');
INSERT INTO `entre_echange` VALUES ('7', '9', 'chat');
INSERT INTO `entre_echange` VALUES ('7', '10', 'chat');
INSERT INTO `entre_echange` VALUES ('6', '8', 'chat');
INSERT INTO `entre_echange` VALUES ('6', '9', 'chat');
INSERT INTO `entre_echange` VALUES ('6', '10', 'chat');
INSERT INTO `entre_echange` VALUES ('5', '7', 'mail');
INSERT INTO `entre_echange` VALUES ('5', '6', 'mail');
INSERT INTO `entre_echange` VALUES ('5', '5', 'mail');
INSERT INTO `entre_echange` VALUES ('5', '9', 'chat');
INSERT INTO `entre_echange` VALUES ('5', '10', 'chat');

-- ----------------------------
-- Table structure for `groupe`
-- ----------------------------
DROP TABLE IF EXISTS `groupe`;
CREATE TABLE `groupe` (
  `id_grpe` int(11) NOT NULL AUTO_INCREMENT,
  `lib_grpe` varchar(255) NOT NULL,
  `desc_grpe` text NOT NULL,
  `id_departement` int(11) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_grpe`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groupe
-- ----------------------------
INSERT INTO `groupe` VALUES ('5', 'DIRECTION GENERALE', 'Direction gÃ©nÃ©rale', '2', '1', '2014-08-22 14:03:25');
INSERT INTO `groupe` VALUES ('6', 'SERVICE TECHNIQUE', 'Service Technique', '5', '1', '2014-08-22 14:44:13');
INSERT INTO `groupe` VALUES ('7', 'SERVICE MARKETING & COMMERCIAL', 'Service marketing & commercial', '5', '1', '2014-08-22 16:15:15');
INSERT INTO `groupe` VALUES ('8', 'SECRETARIAT', 'SECRÃ‰TARIAT ', '5', '1', '2015-01-09 17:43:04');
INSERT INTO `groupe` VALUES ('9', 'ADMINISTRATION WEB', 'ADMINISTRATION WEB', '5', '1', '2015-02-18 09:52:45');
INSERT INTO `groupe` VALUES ('10', 'RH & COMPTABILITE', 'Ressources Humaines et ComptabilitÃ©', '6', '1', '2015-03-09 10:26:21');
INSERT INTO `groupe` VALUES ('12', 'Administrateur', 'Administrateur', '5', '1', '2017-02-15 12:02:23');

-- ----------------------------
-- Table structure for `groupecontact`
-- ----------------------------
DROP TABLE IF EXISTS `groupecontact`;
CREATE TABLE `groupecontact` (
  `id_grpe` int(11) NOT NULL AUTO_INCREMENT,
  `lib_grpe` varchar(255) NOT NULL,
  `desc_grpe` text NOT NULL,
  `id_departement` int(11) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_grpe`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groupecontact
-- ----------------------------
INSERT INTO `groupecontact` VALUES ('1', 'Famille', 'Ma Famille TSIVANYO Marc', '0', '1', '2015-05-26 19:57:49');
INSERT INTO `groupecontact` VALUES ('2', 'Developpeur Laravel', 'Developpeur web en PHP', '0', '1', '2017-02-16 10:34:57');
INSERT INTO `groupecontact` VALUES ('3', 'Collegue', 'Mes collegues', '0', '1', '2017-02-16 10:39:49');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `objet_msg` text NOT NULL,
  `texte_msg` text NOT NULL,
  `date_msg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `attache_msg` text NOT NULL,
  `token` text NOT NULL,
  `id_pers` int(11) NOT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', 'REPONSE TEST', 'Test   \r\n                ', '2017-02-15 18:26:19', '5d4614bc75c9085783c7d1c1b8267c46.pdf', 'b9db00c7cf5d623172b756d3e67161a0', '12');
INSERT INTO `message` VALUES ('2', 'Test', 'Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.', '2017-02-16 09:35:39', 'fddfebd74618a8770cd880ea0ed3f7d6.pdf', 'cc5f12a0e6df413346af0f48a720d75a', '13');
INSERT INTO `message` VALUES ('3', 'Test', 'Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.Sed lobortis dui ut odio tempor blandit. Suspendisse scelerisque mi nec nunc gravida quis mollis lacus dignissim. Donec mauris sapien, pellentesque at porta id, varius eu tellus.', '2017-02-16 09:42:43', '', 'cc5f12a0e6df413346af0f48a720d75a', '13');
INSERT INTO `message` VALUES ('4', 'TEST', '                                          \r\n                tesrs', '2017-02-18 13:56:33', '', '96b6c87e5d38775f3fe45566bb259484', '12');
INSERT INTO `message` VALUES ('5', 'TEST', 'DÃ©mo', '2017-02-18 22:53:07', '', '423f39a5ab2dee0a76d90ab570d01419', '12');
INSERT INTO `message` VALUES ('6', 'salutation', '                                          \r\n                bonjour frere', '2017-02-19 10:34:23', '', '44b32ee6b1c778f190782e105f735a56', '14');
INSERT INTO `message` VALUES ('7', 'Reponse ', 'Bonjour Frere                                          \r\n                ', '2017-02-19 10:35:10', '', '61f1fefa03e8c0e8113661122afb61ec', '12');

-- ----------------------------
-- Table structure for `messageemailing`
-- ----------------------------
DROP TABLE IF EXISTS `messageemailing`;
CREATE TABLE `messageemailing` (
  `id_msg` int(11) NOT NULL AUTO_INCREMENT,
  `objet_msg` text NOT NULL,
  `texte_msg` text NOT NULL,
  `date_msg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `attache_msg` text NOT NULL,
  `token` text NOT NULL,
  `id_pers` int(11) NOT NULL,
  PRIMARY KEY (`id_msg`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of messageemailing
-- ----------------------------
INSERT INTO `messageemailing` VALUES ('1', 'REPONSE TEST', 'Test', '2017-02-16 10:48:02', '', 'aee94197f6c62d7637bf831e5f50d3be', '12');
INSERT INTO `messageemailing` VALUES ('2', 'TEST2', 'include(\'config.php\');\r\ninclude(\'header.php\');include(\'config.php\');\r\ninclude(\'header.php\');include(\'config.php\');\r\ninclude(\'header.php\');include(\'config.php\');\r\ninclude(\'header.php\');', '2017-02-16 10:55:06', '', 'aee94197f6c62d7637bf831e5f50d3be', '12');

-- ----------------------------
-- Table structure for `niveau_document`
-- ----------------------------
DROP TABLE IF EXISTS `niveau_document`;
CREATE TABLE `niveau_document` (
  `id_niveau_doc` int(11) NOT NULL AUTO_INCREMENT,
  `niveau_doc` varchar(255) NOT NULL,
  `indice_niveau_doc` int(11) NOT NULL,
  `id_scat_doc` int(11) NOT NULL,
  PRIMARY KEY (`id_niveau_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of niveau_document
-- ----------------------------
INSERT INTO `niveau_document` VALUES ('4', 'Service Commercial & marketing', '1', '1');
INSERT INTO `niveau_document` VALUES ('13', 'Direction gÃ©nÃ©rale', '2', '3');
INSERT INTO `niveau_document` VALUES ('5', 'Direction gÃ©nÃ©rale', '2', '1');
INSERT INTO `niveau_document` VALUES ('6', 'Service Technique', '1', '18');
INSERT INTO `niveau_document` VALUES ('7', 'Direction gÃ©nÃ©rale', '2', '18');
INSERT INTO `niveau_document` VALUES ('8', 'Service Commercial & marketing', '1', '9');
INSERT INTO `niveau_document` VALUES ('9', 'Direction gÃ©nÃ©rale', '2', '9');
INSERT INTO `niveau_document` VALUES ('10', 'Service Commercial & marketing', '1', '10');
INSERT INTO `niveau_document` VALUES ('11', 'Direction gÃ©nÃ©rale', '2', '10');
INSERT INTO `niveau_document` VALUES ('12', 'Service Commercial & marketing', '1', '3');
INSERT INTO `niveau_document` VALUES ('14', 'Service Commercial & marketing', '1', '4');
INSERT INTO `niveau_document` VALUES ('15', 'Direction gÃ©nÃ©rale', '2', '4');
INSERT INTO `niveau_document` VALUES ('16', 'Direction gÃ©nÃ©rale', '1', '5');
INSERT INTO `niveau_document` VALUES ('17', 'Service Commercial & marketing', '1', '6');
INSERT INTO `niveau_document` VALUES ('18', 'Direction gÃ©nÃ©rale', '2', '6');
INSERT INTO `niveau_document` VALUES ('19', 'Direction gÃ©nÃ©rale', '1', '7');
INSERT INTO `niveau_document` VALUES ('20', 'Service Technique', '1', '8');
INSERT INTO `niveau_document` VALUES ('21', 'Direction gÃ©nÃ©rale', '2', '8');
INSERT INTO `niveau_document` VALUES ('22', 'Direction gÃ©nÃ©rale', '1', '11');
INSERT INTO `niveau_document` VALUES ('23', 'Direction gÃ©nÃ©rale', '1', '12');
INSERT INTO `niveau_document` VALUES ('24', 'Direction gÃ©nÃ©rale', '1', '13');
INSERT INTO `niveau_document` VALUES ('25', 'Direction gÃ©nÃ©rale', '1', '14');
INSERT INTO `niveau_document` VALUES ('43', 'Administration WEB', '1', '16');
INSERT INTO `niveau_document` VALUES ('27', 'Direction gÃ©nÃ©rale', '2', '15');
INSERT INTO `niveau_document` VALUES ('29', 'Service Commercial & marketing', '1', '17');
INSERT INTO `niveau_document` VALUES ('30', 'Direction gÃ©nÃ©rale', '2', '17');
INSERT INTO `niveau_document` VALUES ('31', 'Service Technique', '1', '19');
INSERT INTO `niveau_document` VALUES ('32', 'Direction gÃ©nÃ©rale', '2', '19');
INSERT INTO `niveau_document` VALUES ('33', 'Service Technique', '1', '20');
INSERT INTO `niveau_document` VALUES ('34', 'Direction gÃ©nÃ©rale', '2', '20');
INSERT INTO `niveau_document` VALUES ('35', 'Service Technique', '1', '21');
INSERT INTO `niveau_document` VALUES ('36', 'Direction gÃ©nÃ©rale', '2', '21');
INSERT INTO `niveau_document` VALUES ('37', 'Service Commercial & marketing', '1', '22');
INSERT INTO `niveau_document` VALUES ('38', 'Direction gÃ©nÃ©rale', '2', '22');
INSERT INTO `niveau_document` VALUES ('41', 'Secretariat', '1', '23');
INSERT INTO `niveau_document` VALUES ('44', 'Direction GÃ©nÃ©rale', '2', '16');

-- ----------------------------
-- Table structure for `person`
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id_pers` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `login_pers` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd_pers` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `tel` varchar(15) NOT NULL,
  `cel` varchar(15) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `id_grpe` int(11) NOT NULL,
  `smsactif` int(11) NOT NULL,
  `emailingactif` int(11) NOT NULL,
  `connecte` int(11) NOT NULL,
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pers`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES ('14', 'TEST', 'test', 'test', 'test', 'avatar.jpg', '228 90 33 74 53', '', '', 'marctsivanyo@gmail.com', 'Adidogome', '1', '8', '0', '1', '1', '2017-02-18 13:41:02');
INSERT INTO `person` VALUES ('13', 'MasterSolut', 'admin', 'admin', 'mastersolut', 'avatar.jpg', '228 90 08 67 17', '', '', 'contact@mastersolut.com', 'AdidogomÃ©, Assiyeye', '1', '5', '0', '1', '1', '2017-02-15 14:52:20');
INSERT INTO `person` VALUES ('12', 'Marc TSIVANYO', 'admin10', 'admin10', 'admin', '12.PNG', '228 90 33 74 53', '', '', 'marctsivanyo@gmail.com', 'LomÃ©-TOGO', '1', '12', '1', '1', '0', '2017-02-14 17:02:05');

-- ----------------------------
-- Table structure for `personcontact`
-- ----------------------------
DROP TABLE IF EXISTS `personcontact`;
CREATE TABLE `personcontact` (
  `id_pers` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `login_pers` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pwd_pers` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'avatar.jpg',
  `tel` varchar(15) NOT NULL,
  `cel` varchar(15) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `visible` int(1) NOT NULL DEFAULT '1',
  `id_grpe` int(11) NOT NULL,
  `smsactif` int(11) NOT NULL,
  `emailingactif` int(11) NOT NULL,
  `connecte` int(11) NOT NULL,
  `maj` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pers`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of personcontact
-- ----------------------------
INSERT INTO `personcontact` VALUES ('1', 'Marc TSIVANYO', '', '', '', 'avatar.jpg', '228 90 33 74 53', '+228 90 33 74 5', '', 'marctsivanyo@gmail.com', 'LomÃ©-TOGO', '1', '1', '0', '1', '0', '2017-02-16 10:21:50');
INSERT INTO `personcontact` VALUES ('2', 'AVOKPO', '', '', '', 'avatar.jpg', '228 90 33 74 53', '228 90 33 74 53', '', 'yaocarlosavokpo@rocketmail.com', 'AdidogomÃ©-Sagbado', '1', '2', '1', '1', '0', '2017-02-16 10:47:19');

-- ----------------------------
-- Table structure for `sactive`
-- ----------------------------
DROP TABLE IF EXISTS `sactive`;
CREATE TABLE `sactive` (
  `id_code` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `duree` varchar(11) NOT NULL,
  `active` varchar(1) NOT NULL,
  PRIMARY KEY (`id_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sactive
-- ----------------------------
INSERT INTO `sactive` VALUES ('1', '9t5en4dpdm', 'tdihkfg1tw', '1', '0');
INSERT INTO `sactive` VALUES ('2', ' vqan0bcyi1', 'ur7i9t7rd0', '12', '1');

-- ----------------------------
-- Table structure for `table_acces`
-- ----------------------------
DROP TABLE IF EXISTS `table_acces`;
CREATE TABLE `table_acces` (
  `id_grpe` int(11) NOT NULL,
  `autre_grpe` int(11) NOT NULL,
  `session` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of table_acces
-- ----------------------------
INSERT INTO `table_acces` VALUES ('7', '7', 'document');
INSERT INTO `table_acces` VALUES ('7', '7', 'chat');
INSERT INTO `table_acces` VALUES ('5', '5', 'visiteur');
INSERT INTO `table_acces` VALUES ('7', '7', 'visiteur');
INSERT INTO `table_acces` VALUES ('12', '12', 'mail');
INSERT INTO `table_acces` VALUES ('7', '7', 'mail');
INSERT INTO `table_acces` VALUES ('5', '5', 'mail');
INSERT INTO `table_acces` VALUES ('5', '5', 'contactextern');
INSERT INTO `table_acces` VALUES ('6', '6', 'mail');
INSERT INTO `table_acces` VALUES ('6', '6', 'chat');
INSERT INTO `table_acces` VALUES ('8', '8', 'visiteur');
INSERT INTO `table_acces` VALUES ('8', '8', 'contactextern');
INSERT INTO `table_acces` VALUES ('8', '8', 'mail');
INSERT INTO `table_acces` VALUES ('6', '6', 'visiteur');
INSERT INTO `table_acces` VALUES ('6', '6', 'document');
INSERT INTO `table_acces` VALUES ('9', '9', 'mail');
INSERT INTO `table_acces` VALUES ('9', '9', 'emailing');
INSERT INTO `table_acces` VALUES ('9', '9', 'sms');
INSERT INTO `table_acces` VALUES ('9', '9', 'chat');
INSERT INTO `table_acces` VALUES ('9', '9', 'visiteur');
INSERT INTO `table_acces` VALUES ('9', '9', 'courrier');
INSERT INTO `table_acces` VALUES ('9', '9', 'para');
INSERT INTO `table_acces` VALUES ('9', '9', 'document');
INSERT INTO `table_acces` VALUES ('10', '10', 'chat');
INSERT INTO `table_acces` VALUES ('10', '10', 'mail');
INSERT INTO `table_acces` VALUES ('5', '5', 'courrier');
INSERT INTO `table_acces` VALUES ('5', '5', 'chat');
INSERT INTO `table_acces` VALUES ('12', '12', 'contactextern');
INSERT INTO `table_acces` VALUES ('12', '12', 'emailing');
INSERT INTO `table_acces` VALUES ('12', '12', 'chat');
INSERT INTO `table_acces` VALUES ('12', '12', 'visiteur');
INSERT INTO `table_acces` VALUES ('12', '12', 'courrier');
INSERT INTO `table_acces` VALUES ('12', '12', 'para');
INSERT INTO `table_acces` VALUES ('5', '5', 'emailing');
INSERT INTO `table_acces` VALUES ('8', '8', 'courrier');

-- ----------------------------
-- Table structure for `transfert_document`
-- ----------------------------
DROP TABLE IF EXISTS `transfert_document`;
CREATE TABLE `transfert_document` (
  `id_transfert` int(11) NOT NULL AUTO_INCREMENT,
  `id_doc` int(11) NOT NULL,
  `pourqui` int(11) NOT NULL,
  `parqui` int(11) NOT NULL,
  PRIMARY KEY (`id_transfert`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of transfert_document
-- ----------------------------
INSERT INTO `transfert_document` VALUES ('1', '1', '1', '3');
INSERT INTO `transfert_document` VALUES ('2', '2', '1', '3');
INSERT INTO `transfert_document` VALUES ('3', '3', '3', '1');

-- ----------------------------
-- Table structure for `visiteur`
-- ----------------------------
DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE `visiteur` (
  `id_visiteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom_visiteur` varchar(255) NOT NULL,
  `societe_visiteur` varchar(255) NOT NULL,
  `contact_visiteur` varchar(255) NOT NULL,
  `motif_visiteur` text NOT NULL,
  `message_visiteur` text NOT NULL,
  `person_visiteur` int(11) NOT NULL,
  `type_visiteur` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `enregistreur` int(11) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_visiteur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visiteur
-- ----------------------------
INSERT INTO `visiteur` VALUES ('1', 'AVOKPO Carlos', 'MasterSolut', '99 43 97 56', 'Demande de renseignement', 'Reprise du projet de Manwin24', '13', 'telephone', '2017-02-15 15:00:21', '12', '1');
INSERT INTO `visiteur` VALUES ('2', 'Marc', 'MASTERSOLuT', '90337453', 'dÃ©monstration de msolut Ã©change', 'DÃ©monstration pratiqe', '12', 'arrivee', '2017-02-18 13:49:59', '14', '1');
INSERT INTO `visiteur` VALUES ('3', 'AVOKPO Carlos', 'MasterSolut', '99 43 97 56', 'Suivi des activitÃ©s', 'Repasser ', '14', 'telephone', '2017-02-18 13:51:25', '12', '1');
INSERT INTO `visiteur` VALUES ('4', 'adokanu kodzo', 'nsia', '92287213', 'mon imprimante est bourrÃ©', 'passez aprÃ¨s me voir', '12', 'telephone', '2017-02-19 10:19:23', '14', '1');
